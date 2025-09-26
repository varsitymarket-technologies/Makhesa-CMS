<?php

function use_style($style){
    $style_file = dirname(__FILE__).DIRECTORY_SEPARATOR."theme".DIRECTORY_SEPARATOR.$style;
    $e = file_get_contents($style_file); 
    $data = "".$e ;
    echo '
    
    <style>
        '.$data.'
    </style>
    ';
}

function use_script($style){
    $style_file = dirname(__FILE__).DIRECTORY_SEPARATOR."theme".DIRECTORY_SEPARATOR.$style;
    $e = file_get_contents($style_file); 
    $data = "".$e ;
    echo '
    
    <script>
        '.$data.'
    </script>
    ';
}

?>
