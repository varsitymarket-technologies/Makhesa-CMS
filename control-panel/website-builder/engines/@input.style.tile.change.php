<?php
$style_contents = json_decode(file_get_contents(dirname(__FILE__).'/@input.style.tile.source'),JSON_PRETTY_PRINT);
$style_data = $style_contents['style'] ?? null; 
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

        function parseCSS($cssData){
            $e = ""; 
            foreach ($cssData as $key => $value) {
                # code...
                $e .= $key.": ".$value."; "; 
            }
            return $e; 
        }

$style_css = parseInlineCss($style_data); 
//$style_css[$edt_item] = $edt_value; 

foreach ($_POST as $key => $value) {
    $clean_key = htmlspecialchars($key);
    $clean_value = htmlspecialchars($value);
    $clean_key = substr($clean_key,8);
    $style_css[$clean_key] = $clean_value; 
}

$e = []; 
$e['id'] = $style_contents['id']; 
$e['style'] = parseCSS($style_css); 
if (isset($_POST)) {
    $e = json_encode($e,JSON_PRETTY_PRINT); 
    @file_put_contents(dirname(__FILE__).'/@input.style.tile.source',$e); 
} else {
    echo "No data received.";
}
?>