<?php
/**
 * Single-file PHP script for Git/CDN-based file synchronization.
 *
 * This script downloads a JSON manifest, compares file hashes, and
 * fetches and replaces patched files from a public GitHub repository CDN.
 */

// --- CONFIGURATION ---
// !!! ADJUST THESE VALUES FOR YOUR REPOSITORY !!!

// The URL of the remote JSON manifest file on the GitHub CDN (raw.githubusercontent.com)
// Example: https://raw.githubusercontent.com/username/repo-name/main/manifest.json
const MANIFEST_URL = 'YOUR_REMOTE_MANIFEST_URL_HERE';

// The base URL for downloading individual raw files.
// Use the format: https://raw.githubusercontent.com/username/repo-name/main/
const GITHUB_CDN_BASE = 'YOUR_CDN_BASE_URL_HERE';

// The directory where all files should be saved locally, relative to this script.
// This path replaces the common parts of the 'path' field in your JSON.
const LOCAL_PROJECT_ROOT = __DIR__ . '/'; 
// Alternatively, if files should go into a specific directory: __DIR__ . '/project_files/';

// The name of the local manifest file to store the current state.
const LOCAL_MANIFEST_FILE = 'local_sync_manifest.json';

// --- MAIN EXECUTION ---

echo "🚀 Starting File Synchronization...\n\n";

// 1. Fetch the remote manifest.
$remoteManifest = fetchRemoteManifest(MANIFEST_URL);

if (!$remoteManifest) {
    exit("🔴 Error: Could not fetch the remote manifest. Exiting.\n");
}

echo "✅ Remote manifest fetched successfully.\n";

// 2. Load the local manifest for comparison.
$localManifest = loadLocalManifest(LOCAL_PROJECT_ROOT . LOCAL_MANIFEST_FILE);
echo "✅ Local manifest loaded.\n";

// 3. Process the files and sync.
$newLocalManifest = processFiles($remoteManifest, $localManifest);

// 4. Save the updated local manifest.
if (saveLocalManifest(LOCAL_PROJECT_ROOT . LOCAL_MANIFEST_FILE, $newLocalManifest)) {
    echo "\n\n🎉 Synchronization complete! Local manifest updated.\n";
} else {
    echo "\n\n⚠️ Synchronization finished, but saving the local manifest failed.\n";
}

// --- FUNCTIONS ---

/**
 * Fetches the JSON manifest from the remote URL.
 * @param string $url The remote URL of the manifest.
 * @return array|null The decoded JSON array, or null on failure.
 */
function fetchRemoteManifest(string $url): ?array
{
    $content = @file_get_contents($url);
    if ($content === false) {
        return null;
    }
    // Assuming the JSON structure is a single array of file objects
    $manifest = json_decode($content, true);
    return is_array($manifest) ? $manifest : null;
}

/**
 * Loads the existing local manifest file.
 * @param string $filePath The path to the local manifest file.
 * @return array The decoded local manifest (an associative array by 'name'), or an empty array.
 */
function loadLocalManifest(string $filePath): array
{
    if (!file_exists($filePath)) {
        return [];
    }
    $content = file_get_contents($filePath);
    $manifest = json_decode($content, true);
    
    // Convert the array of objects into an associative array indexed by 'name' for faster lookup
    $indexedManifest = [];
    if (is_array($manifest)) {
        foreach ($manifest as $file) {
            if (isset($file['name'])) {
                $indexedManifest[$file['name']] = $file;
            }
        }
    }
    return $indexedManifest;
}

/**
 * Iterates through the remote manifest, compares hashes, and syncs files.
 * @param array $remoteManifest The remote file manifest.
 * @param array $localManifest The current local file manifest (indexed by 'name').
 * @return array The new manifest data to be saved locally.
 */
function processFiles(array $remoteManifest, array $localManifest): array
{
    $updatedFiles = [];
    $newManifest = [];
    
    foreach ($remoteManifest as $remoteFile) {
        $fileName = $remoteFile['name'];
        $remoteHash = $remoteFile['hash'] ?? '';
        
        $localFile = $localManifest[$fileName] ?? null;
        $localHash = $localFile['hash'] ?? '';
        
        $relativeFilePath = getRelativePath($remoteFile['path']);
        $localSavePath = LOCAL_PROJECT_ROOT . $relativeFilePath;

        // 1. Check if the hash has changed or the file is new.
        if ($remoteHash && $remoteHash !== $localHash) {
            
            echo "-> 🔄 Updating: **{$fileName}** (Hash changed or new file)\n";
            
            $cdnUrl = GITHUB_CDN_BASE . str_replace('\\', '/', $relativeFilePath); // Use forward slashes in URL
            
            if (downloadAndSaveFile($cdnUrl, $localSavePath)) {
                echo "   -> **SUCCESS**: Downloaded and saved to `{$localSavePath}`.\n";
                $updatedFiles[] = $fileName;
            } else {
                echo "   -> **FAILED**: Could not download file from {$cdnUrl}.\n";
                // Keep the old manifest entry if update failed
                if ($localFile) {
                    $newManifest[] = $localFile; 
                }
                continue; // Skip updating the hash if download failed
            }
        } elseif ($localFile) {
            // 2. Hash matches, no action needed, but include in the new manifest.
            echo "-> 🟢 Skipped: **{$fileName}** (Hash matches).\n";
        } else {
            // 3. File skipped for some other reason (e.g., missing hash in remote manifest)
            echo "-> ❓ Skipped: **{$fileName}** (No hash to compare, assuming up-to-date).\n";
        }
        
        // Always add the remote file object to the new manifest (which now has the current hash)
        $newManifest[] = $remoteFile;
    }
    
    if (empty($updatedFiles)) {
        echo "\n✨ All files are up-to-date. No files were patched.\n";
    }
    
    return $newManifest;
}

/**
 * Helper to determine the relative path for CDN/Local use.
 * This is a highly simplified helper based on your example paths.
 * You MUST adjust this function based on the exact path mapping you need!
 * @param string $fullPath The full local path from the JSON.
 * @return string The relative path to append to CDN_BASE and LOCAL_PROJECT_ROOT.
 */
function getRelativePath(string $fullPath): string
{
    // WARNING: This logic is very specific to your provided example paths.
    // It attempts to strip the 'C:\\Users\\Hastings\\Documents\\vm.makhesa/' part.
    // In a real application, you should store the relative path directly in the JSON.
    $rootToStrip = 'C:\Users\Hastings\Documents\vm.makhesa/';
    
    // Normalize slashes for comparison
    $normalizedPath = str_replace('\\', '/', $fullPath);
    $normalizedRoot = str_replace('\\', '/', $rootToStrip);
    
    // Find the position of the part you want to keep
    $pos = strpos($normalizedPath, $normalizedRoot);
    
    if ($pos !== false) {
        // Return the path AFTER the root segment
        return substr($normalizedPath, $pos + strlen($normalizedRoot));
    }
    
    // Fallback: If stripping fails, just use the last part as the relative path.
    return basename($fullPath);
}

/**
 * Downloads a file from the CDN and saves it to the local disk.
 * @param string $url The full CDN URL of the file.
 * @param string $savePath The full local path where the file should be saved.
 * @return bool True on success, false on failure.
 */
function downloadAndSaveFile(string $url, string $savePath): bool
{
    $fileContent = @file_get_contents($url);
    
    if ($fileContent === false) {
        return false;
    }
    
    // Ensure the destination directory exists
    $dir = dirname($savePath);
    if (!is_dir($dir) && !mkdir($dir, 0777, true)) {
        return false;
    }
    
    // Save the file content
    if (file_put_contents($savePath, $fileContent) === false) {
        return false;
    }
    
    return true;
}

/**
 * Saves the current state of the manifest to a local file.
 * @param string $filePath The path to the local manifest file.
 * @param array $manifestData The manifest data to save.
 * @return bool True on success, false on failure.
 */
function saveLocalManifest(string $filePath, array $manifestData): bool
{
    // Use JSON_PRETTY_PRINT for readability
    $jsonContent = json_encode($manifestData, JSON_PRETTY_PRINT);
    if ($jsonContent === false) {
        return false;
    }
    
    return file_put_contents($filePath, $jsonContent) !== false;
}