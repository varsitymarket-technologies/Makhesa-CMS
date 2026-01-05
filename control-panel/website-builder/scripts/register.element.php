<?php

#This Script allows you to register an element on the system. 
$element_structure = [
        "element" => '<{element.tag} {element.event} style="{element.style}" class="{element.class}">{element.innerTEXT}</{element.tag}>',
        "tag" => 'p',
        "event" => '',
        "style" => 'font-size:20rem;', 
        "class" => 'introduction', 
        "innerTEXT" => 'Testing The Elemental Structure',
];
$element_id = "paragraph";
$element_skeleton = json_encode($element_structure,JSON_PRETTY_PRINT);

# SQL 
$sql = "INSERT INTO `tblelements_cell` (`element_id`,`element_data`) VALUES ('{$element_id}','{$element_skeleton}');"; 

@include_once dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."module.database.php"; 
$file = dirname(__FILE__).DIRECTORY_SEPARATOR."core.database" ;
$wbulder_data = new database_manager();
$wbulder_data->override_connection($file);
$wbulder_data->query($sql);       
?> 