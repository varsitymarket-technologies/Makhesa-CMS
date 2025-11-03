<?php

#Include The Themes Scripts 
include_once dirname(__FILE__).DIRECTORY_SEPARATOR."themes";

# Include The Source Scripts 
include_once dirname(__FILE__).DIRECTORY_SEPARATOR."source.scripts";


define('__SOURCE_PAGE__','testing');

$theme_dir = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."themes".DIRECTORY_SEPARATOR.__ACTIVE_THEME__.DIRECTORY_SEPARATOR;
$interface = $theme_dir."web.interface";
@include_once $interface;
?>