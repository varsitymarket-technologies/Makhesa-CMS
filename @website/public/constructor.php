<?php
// constructor.php

#   TITLE   : Public Site Application   
#   DESC    : This Constructs The Site Website Application 
#   PROPRIETOR: VARSITYMARKET_TECHNOLOGIES
#   VERSION : 1.0.1.1
#   AUTHOR  : HARDY HASTINGS  
#   RELEASE : 2025/06/29

# Include The Source Scripts 
include_once dirname(__FILE__).DIRECTORY_SEPARATOR."source.scripts";

# Include The Site Libraries
include_once dirname(__FILE__).DIRECTORY_SEPARATOR."library";


#Include The Themes Scripts 
include_once dirname(__FILE__).DIRECTORY_SEPARATOR."themes";


# Create The Website Interface
$interface = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."themes".DIRECTORY_SEPARATOR.__ACTIVE_THEME__.DIRECTORY_SEPARATOR."web.interface";
@include_once $interface; 

?>