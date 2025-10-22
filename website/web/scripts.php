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
