<?php

$theme_id = "agency"; 
$block_id = $_POST['id']?? null; 
$theme_dir = dirname(dirname(dirname(dirname(__FILE__)))); 
$theme_dir .= "/@website/themes/".$theme_id."/init/blocks/".$block_id.".card"; 
$targetFile = dirname(__FILE__).'/@input.builder.source'; 

if (file_exists($theme_dir)){
    #Read The File 
    $e = file_get_contents($theme_dir); 
    file_put_contents($targetFile,$e); 
    #Make Sure The Permissions are set for CRUD operations
    echo "Block Template Copied"; 
}
?>
   