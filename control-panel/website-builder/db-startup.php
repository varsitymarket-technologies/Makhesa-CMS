<?php 
@include_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."module.database.php"; 
$file = dirname(__FILE__).DIRECTORY_SEPARATOR."scripts".DIRECTORY_SEPARATOR."core.database" ;
#die($file);  
$wb_builder = new database_manager();
$wb_builder->override_connection($file);

$wb_builder->createTable("tbltheme", [
    'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT',
    "interface" => "TEXT NOT NULL",
    "style"=>"TEXT NOT NULL",
    "script"=>"TEXT NOT NULL",
]); 

$wb_builder->createTable("tbltemplates", [
    'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT',
    "title" => "TEXT NOT NULL", 
    "data" => "TEXT NOT NULL",
    "theme"=>"INTEGER"
]); 

#A Canvas Is A Blank Board. The Page Sits On The Empty Canvas, Layers and Structures For The Canvas, Then You will notice the individual elements. 
$wb_builder->createTable("tblboard", [
    'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT',
    "theme" => "TEXT NOT NULL",
    "style"=>"TEXT NOT NULL",
    "script"=>"TEXT NOT NULL",
]); 

$wb_builder->createTable('tblcanvas',[
    'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT',
    'board' => 'INTEGER',
    "title" => 'TEXT', 
    "seo" => 'TEXT',  
]);

$wb_builder->createTable('tblLayer', [
    'id' => "INTEGER PRIMARY KEY AUTOINCREMENT", 
    "layer_id"=> "TEXT NOT NULL",
    'layer_data' => "TEXT NOT NULL", 
    'canvas' => 'INTEGER'
]); 

# All Individual Elements In The Canvas 
$wb_builder->createTable('tblelements_cell', [
    'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT',
    'element_id' => 'TEXT NOT NULL',
    'element_data' => 'TEXT NOT NULL',
]); 

$wb_builder->createTable('tblelements_structure', [
    'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT',
    # Foreign Key To tblemenets_cell.element_id
    'element_skeleton' => 'TEXT NOT NULL',
    # Structure Of Element To Always Guide System To Refer
]); 

?>