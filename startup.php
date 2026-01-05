<?php 
#Check The Database Installation; 

$dir = dirname(__FILE__).DIRECTORY_SEPARATOR."database";
if (!is_dir($dir)){
    #Display The Startup Application File Page 
    $page = dirname(__FILE__).DIRECTORY_SEPARATOR. "pages".DIRECTORY_SEPARATOR."site.installation.page.php"; 
    @include_once $page; 
    die(0); 

    mkdir($dir); 

    echo "Directory Exists "; 
} 
?>