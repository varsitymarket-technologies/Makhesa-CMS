<?php
// Set headers for debugging
header('Content-Type: text/plain');

// Get the raw POST data
$jsonData = file_get_contents('php://input');

// Decode the JSON into an associative array
$data = json_decode($jsonData, true);

if ($data) {
    echo "--- Element Inspected ---\n";
    echo "Tag: " . ($data['tagName'] ?: 'None') . "\n";
    echo "ID: " . ($data['id'] ?: 'None') . "\n";
    
    echo "\nDetected Inline Styles:\n";
    if (empty($data['inlineStyles'])) {
        echo "No inline styles found.\n";
    } else {
        foreach ($data['inlineStyles'] as $property => $value) {
            echo "{$property}: {$value};\n";
        }
    }
    $r = [
        "id"=>$data['anchorId'],
        "style"=>$data['rawCssText'],
    ]; 
    $r = json_encode($r,JSON_PRETTY_PRINT); 

    @file_put_contents('@input.style.tile.source',$r); 
} else {
    echo "No data received.";
}
?>