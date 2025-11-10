<?php
// constructor.php

#   TITLE   : Preview Site Application   
#   DESC    : This Constructs The Site Preview. To make it compatible with changing themes and plugins on runtime. 
#   PROPRIETOR: VARSITYMARKET_TECHNOLOGIES
#   VERSION : 1.0.1.1
#   AUTHOR  : HARDY HASTINGS  
#   RELEASE : 2025/06/29

define("PAGE_INDEX",2); 
define("__ACTIVE_THEME__","2023");
define("__DEBUG_PREVIEW__",true);

# Include The Source Scripts 
include_once dirname(__FILE__).DIRECTORY_SEPARATOR."scripts";

# Include The Site Libraries
include_once dirname(__FILE__).DIRECTORY_SEPARATOR."library";

# Create The Website Interface
$interface = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."themes".DIRECTORY_SEPARATOR.__ACTIVE_THEME__.DIRECTORY_SEPARATOR."web.interface";
@include_once $interface; 

?>