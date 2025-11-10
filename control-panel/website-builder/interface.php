<?php 
function _page_($section=1){
    $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

    $x = $_SERVER['REQUEST_URI']; 
    $_xm = explode("/",$x);
    return $_xm[$section]; 
}

$page_action = _page_(3);

$meta = [
    "assets.editor" => "interface.editor.blade.php",
    "sculpt.editor" => "",
    "design.editor" => "",
    "inspect.editor" => "interface.inspector.blade.php",
    "" => "interface.dashboard.blade.php",
    "dashboard" => "interface.inspector.blade.php",
    "text~editor" => "interface.text.blade.php",
    "code-editor" => "vs.code.blade.php",
    "new-page" => "interface.new-page.blade.php",
    "pages" => "interface.pages-list.blade.php", 
    "page" => "interface.pages-info.blade.php", 
];

$page_file = dirname(__FILE__).DIRECTORY_SEPARATOR."engines".DIRECTORY_SEPARATOR.$meta[$page_action];
define("__PAGE_FILE__",$page_file);
@include_once dirname(__FILE__)."/engines/constructor.engine.php"; 
?>