<?php

if (!function_exists('map_page')){    
    function map_page(){
        $sys_token = parse_url($_SERVER['REQUEST_URI'])['path'];
        $sys_token = explode("/",$sys_token);

        return $sys_token; 
    }

}


function _media_($url){
     $media_hash = explode('/@media/',$url)[1];
     $db = __DATABASE__;
     $sql = "SELECT * FROM gallery WHERE (`hash` = '{$media_hash}') LIMIT 1";
     $image_data = $db->query($sql)[0];
    $currentImage = $image_data['image_path'] ?? '404.jpg';
    $curr_path = dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR."@media".DIRECTORY_SEPARATOR;
    $imagePath = $curr_path . $currentImage;

// Check if the file actually exists and is readable
    if (file_exists($imagePath) && is_readable($imagePath)) {

        // Determine the MIME type based on the file extension
        $extension = pathinfo($currentImage, PATHINFO_EXTENSION);
        #$mimeType = 'application/octet-stream'; // Default generic type

        $mimeType = 'image/jpg';
        
        switch (strtolower($extension)) {
            case 'jpg':
                $mimeType = 'image/jpg';
                break;
            case 'jpeg':
                $mimeType = 'image/jpeg';
                break;
            case 'png':
                $mimeType = 'image/png';
                break;
            case 'gif':
                $mimeType = 'image/gif';
                break;
            case 'webp':
                $mimeType = 'image/webp';
                break;
                // Add more image types if needed
        }

        // Read the file content
        $imageData = file_get_contents($imagePath);
        // Encode the binary data to Base64
        $base64Image = base64_encode($imageData);
        $dataUri = "data:$mimeType;base64,$base64Image";
        return $dataUri;
    } 
}

function seal_signature($data=null,$action="Read"){
    #Action Is Based On File Commands
    #Action = Read, Insert
    $file = dirname(__FILE__).DIRECTORY_SEPARATOR."seal.signature";
    if ($action == "Insert"){ 
        $e = file_put_contents($file,$data);
        return true;
    }else {
        $e = file_get_contents($file);
        return $e;
    }

}

function fetchUrlContent($url) {
    // 1. Initialize cURL session
    $ch = curl_init();

    // 2. Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url);

    // CRITICAL: Tells cURL to return the response data as a string 
    // instead of printing it directly to the browser/terminal.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

    // Highly recommended: Follow any redirects (HTTP 301, 302, etc.)
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 

    // Optional: Set a timeout (in seconds)
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    // 3. Execute the cURL request
    $content = curl_exec($ch);

    // 4. Check for errors
    if (curl_errno($ch)) {
        // Log the error (optional)
        error_log("cURL Error: " . curl_error($ch));
        $content = false;
    }

    // 5. Close the cURL session
    curl_close($ch);

    return $content;
}

if (!defined("MEDIA_PATH")) {
    define("MEDIA_PATH", dirname(__FILE__).DIRECTORY_SEPARATOR."@media".DIRECTORY_SEPARATOR);
}

if (!defined("__DOMAIN_NAME__")) {
    define("__DOMAIN_NAME__",$_SERVER['HTTP_HOST']); 
}

if (!defined("__PROTOCOL__")) {
    define("__PROTOCOL__",isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://");
}
if (!defined("__URL__")) {
        define("__URL__",__PROTOCOL__.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); 
}
if (!defined("__PAGE__")) {
    define("__PAGE__",__PROTOCOL__.__DOMAIN_NAME__."/".map_page()[1]."/");
}

if (!defined("__CURRENCY_SIGN__")) {
    define("__CURRENCY_SIGN__","R");
}

if (!defined("__WALLET_AMOUNT__")) {
    define("__WALLET_AMOUNT__",299.00);
}

if (!defined("__USERNAME__")){
    define("__USERNAME__","Hastings"); 
}


include_once "config.php"; 

@include_once dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."database".DIRECTORY_SEPARATOR."client.module.php" ?? trigger_error("FAILED TO LOAD DATABASE MANAGER", E_USER_ERROR);
$db = new database_manager();
function _script($file)
{
    if (file_exists($file)) {
        include_once $file;
    }
}

function _e($data)
{
    echo $data;
}

function set_page($title){
    echo "<script>document.title = '{$title}'; </script>"; 
}
function cookie_session($data){
    
}

function change_page($change, $data_sets = false)
{
    if ($data_sets == false) {
        $location = __PAGE__ . $change . "/";
        return $location;
    } else {
        $location = __PAGE__ . $change . "/" . base64_encode($data_sets) . "/";
        return $location;
    }
}

function get_media_hash_from_link($path) {
    $parts = explode('@media/', $path);
    $stringToHash = end($parts); // Get the last element of the array
    if (empty($stringToHash)) {
        return false;
    }
    return $stringToHash; 
}
