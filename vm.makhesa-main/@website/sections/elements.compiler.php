<?php 
// compiler.php

#   TITLE   : @elemet.index   
#   DESC    : This Constructs The Site Website Elements 
#   PROPRIETOR: VARSITYMARKET_TECHNOLOGIES
#   VERSION : 1.0.1.1
#   AUTHOR  : HARDY HASTINGS  
#   RELEASE : 2026/01/11

@include_once dirname(dirname(dirname(__FILE__)))."/function.php";

$element = ex(3);
$active_theme = ex(2);  

define("THEME__",$active_theme); 
define("ELEMENT__",$element); 
define("THEME_DIR__",(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."themes".DIRECTORY_SEPARATOR ); 

@include_once dirname(dirname(dirname(__FILE__))). "/control-panel/website-builder/elements/module.class.php"; 

$node = new element(); 
$node->create($element); 
$node_data = $node->build(); 

function compile_element($data){
    @$e = compile_script("<div style=\"padding:2rem; \">".$data."</div>"); 
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
$clean_interface = str_ireplace(['construct_page();','use_card','__HEADER__','use_style','use_script'],["compile_element('".$node_data."');",'prevent_card','prevent_card','block_styles','block_scripts'],$interface_guide); 
$e = compile_script($clean_interface); 
die(0); 
?>