<?php

@include_once (dirname(dirname(dirname(__FILE__)))). DIRECTORY_SEPARATOR."control-panel".DIRECTORY_SEPARATOR."control-panel".DIRECTORY_SEPARATOR."systemctrl.php";

define("__ECOMMERCE_SERVICE__",build_commerce_service()) ;
define("__HEADER_QUERY__", map_page()); 
#Builder Access 
define('__import_scripts__',construct_scripts());
define('__import_styles__',construct_styles());


function build_commerce_service(){
    $module_file = dirname( dirname( dirname(__FILE__))).DIRECTORY_SEPARATOR."control-panel".DIRECTORY_SEPARATOR."module.commerce.php";
    @include_once $module_file;
    #$t = new commerce_services(); 
    #echo $t->title() ;
    #die(0);
    $module = "commerce_services";
    if (class_exists($module)){
        $e = new $module();
        return $e;
    }
}

function e($data){
    echo $data ; 
    return true ; 
}

function _web_media_($url){
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
        #$dataUri = '/@media/'.$currentImage;
        return $dataUri;
    } 
} 

function use_template($template,$search,$replace){
    $template_file = dirname(__FILE__).DIRECTORY_SEPARATOR."hub".DIRECTORY_SEPARATOR."production".DIRECTORY_SEPARATOR."templates".DIRECTORY_SEPARATOR.$template.".guide"; 
    if (file_exists($template_file)){
        $template_data = file_get_contents($template_file); 
        $data = str_ireplace($search, $replace, $template_data); 
        return $data; 
    }
    return null; 
}

function construct_styles(){
    $styles_data = null ; 
    foreach ($styles_data as $key => $value) {
        $style = $value; 
        @use_style($style); 
    }
    return null; 
}

function construct_scripts() {
    $scripts_data = null ;

    return null ;
}
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
