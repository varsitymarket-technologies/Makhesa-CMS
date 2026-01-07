<?php

// The file you want to monitor for changes
$targetFile = '@input.builder.source'; 

// Get the timestamp provided by the JavaScript (0 if first time)
$lastKnownTime = isset($_GET['last_time']) ? (int)$_GET['last_time'] : 0;

if (file_exists($targetFile)) {
    $currentMtime = filemtime($targetFile);

    // Only send data if the file has been updated since the last check
    if ($currentMtime > $lastKnownTime) {
        $e = file_get_contents($targetFile); 
        echo json_encode([
            'changed' => true,
            'newTimestamp' => $currentMtime,
            'content' => $e
        ]);
    } else {
        // Nothing changed
        echo json_encode(['changed' => false]);
    }
} else {
    echo json_encode(['error' => 'File not found']);
}
?>
