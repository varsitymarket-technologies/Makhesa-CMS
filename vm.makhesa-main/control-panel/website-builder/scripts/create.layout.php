<?php

#This Script allows you to register a template on the system. 
$Grid_Template = ""; 
$Grid_Template = '
    <{element.tag} {element.event} style="{element.style}" class="{element.class}" id="error-404">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        {element.data}
      </div>
    </{element.tag}>'; 

$element_structure = [
        "element" => $Grid_Template,
        "tag" => 'section',
        "event" => '',
        "style" => '', 
        "class" => 'error-404 section', 
        "data" => "", 
];
$element_skeleton = json_encode($element_structure,JSON_PRETTY_PRINT);

$canvas_id = "";
$layer_name = "404-Section" ;
$layer_id = hash("sha256",$layer_name);

# SQL 
$sql = "INSERT INTO `tblLayer` (`layer_data`,`layer_id`,`canvas`) VALUES ('{$element_skeleton}','{$layer_id}','{$canvas_id}');"; 

@include_once dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."module.database.php"; 
$file = dirname(__FILE__).DIRECTORY_SEPARATOR."core.database" ;
$wbulder_data = new database_manager();
$wbulder_data->override_connection($file);
$wbulder_data->query($sql);        
?> 