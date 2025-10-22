<?php

#This Script allows you to register a template on the system. 
$Grid_Template = ""; 
$Template_Name = "shop.template";
$Template_Theme = "Oaklyn";
$title = "paragraph";
$element_structure = [
        "element" => '<{element.tag} {element.event} style="{element.style}" class="{element.class}">{element.innerTEXT}</{element.tag}>',
        "tag" => 'p',
        "event" => '',
        "style" => 'font-size:20rem;', 
        "class" => 'introduction', 
        "innerTEXT" => 'SAMPLE TEXT',
];
$element_skeleton = json_encode($element_structure,JSON_PRETTY_PRINT);

# SQL 
$sql = "INSERT INTO `tblelements_structure` (`element_skeleton`,`title`) VALUES ('{$element_skeleton}','{$title}');"; 

@include_once dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."module.database.php"; 
$file = dirname(__FILE__).DIRECTORY_SEPARATOR."core.database" ;
$wbulder_data = new database_manager();
$wbulder_data->override_connection($file);
$wbulder_data->query($sql);       
?> 