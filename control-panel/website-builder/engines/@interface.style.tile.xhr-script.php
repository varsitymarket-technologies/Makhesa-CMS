<?php

#This will be the interface card algoritm 
@include_once "@interface.style.tile.tool";

// The file you want to monitor for changes
$targetFile = '@input.style.tile.source'; 

// Get the timestamp provided by the JavaScript (0 if first time)
$lastKnownTime = isset($_GET['last_time']) ? (int)$_GET['last_time'] : 0;

if (file_exists($targetFile)) {
    $currentMtime = filemtime($targetFile);

    // Only send data if the file has been updated since the last check
    if ($currentMtime > $lastKnownTime) {

        function parseInlineCss($cssString) {
            $styles = [];

            // 1. Remove trailing semicolon and split by semicolon
            // Use array_filter to ignore empty segments if someone typed "color:red;;"
            $pairs = array_filter(explode(';', $cssString));

            foreach ($pairs as $pair) {
                // 2. Split each pair by the first colon
                if (strpos($pair, ':') !== false) {
                    list($property, $value) = explode(':', $pair, 2);

                    // 3. Trim whitespace and add to the array
                    $styles[trim($property)] = trim($value);
                }
            }

            return $styles;
        }

        $rawInline = json_decode(file_get_contents($targetFile), JSON_PRETTY_PRINT)['style'];
        $parsedArray = parseInlineCss($rawInline);
        $e = ""; 
        foreach ($parsedArray as $key => $value) {
            $e .= @construct_inspector_tile($key,'{'.$key.'.value}',$value); 
        }

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
