<?php
// constructor.php

#   TITLE   : Preview Site Application   
#   DESC    : This Constructs The Site Preview. To make it compatible with changing themes and plugins on runtime. 
#   PROPRIETOR: VARSITYMARKET_TECHNOLOGIES
#   VERSION : 1.0.1.1
#   AUTHOR  : HARDY HASTINGS  
#   RELEASE : 2025/06/29

define("PAGE_INDEX",2); 
define("__DEBUG_PREVIEW__",true);

#Include The Theme Scripts
include_once dirname(__FILE__).DIRECTORY_SEPARATOR."themes"; 

# Include The Source Scripts 
include_once dirname(__FILE__).DIRECTORY_SEPARATOR."scripts";

# Include The Site Libraries
include_once dirname(__FILE__).DIRECTORY_SEPARATOR."library";

# Create The Website Interface
$interface = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."themes".DIRECTORY_SEPARATOR.__ACTIVE_THEME__.DIRECTORY_SEPARATOR."web.interface";
@include_once $interface; 

$element_tool = dirname(__FILE__).DIRECTORY_SEPARATOR."@element.extension"; 
@include_once $element_tool; 


$mode = ex(3) ?? null; 
if ($mode == null){$mode = "preview"; }
$construct_page = dirname(__FILE__).DIRECTORY_SEPARATOR."@element.".$mode.".tool.extension"; 
if (file_exists($construct_page)){
    @include_once $construct_page;
} 

# Include The Element Inspector 
# $element_tool = dirname(__FILE__).DIRECTORY_SEPARATOR."@element.style.tool.extension"; 
# @include_once $element_tool; 
?>