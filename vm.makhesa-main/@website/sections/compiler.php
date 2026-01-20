<?php 
// compiler.php

#   TITLE   : @blocks.index   
#   DESC    : This Constructs The Site Website Blocks 
#   PROPRIETOR: VARSITYMARKET_TECHNOLOGIES
#   VERSION : 1.0.1.1
#   AUTHOR  : HARDY HASTINGS  
#   RELEASE : 2026/01/04

@include_once dirname(dirname(dirname(__FILE__)))."/function.php";

$card = ex(3);
$active_theme = ex(2);  

define("THEME__",$active_theme); 
define("CARD__",$card); 
define("THEME_DIR__",(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."themes".DIRECTORY_SEPARATOR ); 

function compile_block(){
    $template_file = THEME_DIR__.THEME__."/init/blocks/".CARD__.".card";
    $e = file_get_contents($template_file); 
    @$e = compile_script($e); 
}

function prevent_card($e){
    //pass; 
    return null; 
}

function block_styles($path){
    echo "<style>".file_get_contents(THEME_DIR__.THEME__."/".$path)."</style>"; return true; 
}

function block_scripts($path){
    echo "<script>".file_get_contents(THEME_DIR__.THEME__."/".$path)."</script>"; return true; 
}


$interface_guide = file_get_contents(THEME_DIR__.THEME__."/web.interface"); 
$clean_interface = str_ireplace(['construct_page();','use_card','__HEADER__','use_style','use_script'],['compile_block();','prevent_card','prevent_card','block_styles','block_scripts'],$interface_guide); 
$e = compile_script($clean_interface); 
die(0); 
?>