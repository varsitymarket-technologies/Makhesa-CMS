<?php
// @media.media.php

#   TITLE   : Media Scripts File   
#   DESC    : All images are stored in a database and only can be called using their hash id. The systeM is configured to use this format for security reasons
#   PROPRIETOR: VARSITYMARKET_TECHNOLOGIES
#   VERSION : 1.0.1.1
#   AUTHOR  : HARDY HASTINGS  
#   RELEASE : 2025/10/20

include_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR ."config.php";
@include_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "scripts.php";


$media_request = site_path(2) ?? false;
if (empty($media_request)) {
    http_response_code(404);
    die(0);
}

$db = __DATABASE_WEBSITE__;
$sql = "SELECT * FROM gallery WHERE (`hash` = '{$media_request}') LIMIT 1";
$image_data = __DATABASE_WEBSITE__->query($sql)[0];
$currentImage = $image_data['image_path'] ?? '404.jpg';
$curr_path = (dirname(__FILE__)) . DIRECTORY_SEPARATOR;
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
        // Add more image types if needed
    }


    $mimeType = mime_content_type($imagePath); // Dynamically get the MIME type

    // 1. Check if the file exists and get the MIME type
    if (!file_exists($imagePath)) {
        http_response_code(404);
        die('Image not found.');
    }

    // Initialize the GD image resource variable
    $sourceImage = null;

    // 2. Load the image using the appropriate GD function based on MIME type
// This replaces the simple readfile() logic with GD loading.

    if ($mimeType === 'image/jpeg' || $mimeType === 'image/jpg') {
        $sourceImage = imagecreatefromjpeg($imagePath);
    } elseif ($mimeType === 'image/png') {
        $sourceImage = imagecreatefrompng($imagePath);
    } elseif ($mimeType === 'image/gif') {
        $sourceImage = imagecreatefromgif($imagePath);
    } else {
        // If it's not a supported GD type, fall back to the original readfile logic
        // or stop execution, depending on requirements.
        header('Content-Type: ' . $mimeType);
        header('Content-Length: ' . filesize($imagePath));
        readfile($imagePath);
        exit(0);
    }

    // 3. Handle GD loading error
    if ($sourceImage === false) {
        http_response_code(500);
        die("Could not load image using GD for type: $mimeType");
    }

    // 4. Set the Content-Type header
    header('Content-Type: ' . $mimeType);

    // 5. Output the image using the appropriate GD function
// This replaces the readfile() output with GD output.

    if ($mimeType === 'image/jpeg' || $mimeType === 'image/jpg') {
        // Quality parameter (0-100) can be added here if needed: imagejpeg($sourceImage, null, 90);
        imagejpeg($sourceImage);
    } elseif ($mimeType === 'image/png') {
        // Compression parameter (0-9) can be added here if needed: imagepng($sourceImage, null, 9);
        imagepng($sourceImage);
    } elseif ($mimeType === 'image/gif') {
        imagegif($sourceImage);
    }

    // 6. Clean up resources
    imagedestroy($sourceImage);

    exit(0);


    // Set the Content-Type header
    header('Content-Type: ' . $mimeType);

    // Set Content-Length header for better download management by browser (optional but good practice)
    header('Content-Length: ' . filesize($imagePath));

    // Output the image file directly to the browser
    readfile($imagePath);
    exit(0);

    // Read the file content
    $imageData = file_get_contents($imagePath);
    // Encode the binary data to Base64
    $base64Image = base64_encode($imageData);
    $dataUri = "data:$mimeType;base64,$base64Image";

    echo $dataUri;

    exit; // Stop script execution after sending the file
} else {
    // If image file not found or not readable, output a generic error or a placeholder
    header("HTTP/1.0 404 Not Found");
    echo "Image not found or not accessible.";
    exit;
}
