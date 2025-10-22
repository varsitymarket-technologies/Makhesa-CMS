<?php 
$page_action = "text~editor";

$meta = [
    "code~editor" => "interface.editor.blade.php",
    "sculpt.editor" => "",
    "design.editor" => "",
    "text~editor" => "interface.text.blade.php",
];

$page_file = dirname(__FILE__).DIRECTORY_SEPARATOR."engines".DIRECTORY_SEPARATOR.$meta[$page_action];
define("__PAGE_FILE__",$page_file);
@include_once dirname(__FILE__)."/engines/constructor.engine.php"; 
?>