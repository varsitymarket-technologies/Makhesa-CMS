<?php 
#Welcome To Another Round Of The Failed Website Builder Project 

#Call The Blocks Engine 
$e = ex(3); 

#For The Code Editor 
# Restart The Page Residual File
$dir = dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."@website".DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR."pages".DIRECTORY_SEPARATOR; 
$page = $dir.hash("sha256",$e).".pages"; 

$residual_file = dirname(__FILE__).DIRECTORY_SEPARATOR."engines".DIRECTORY_SEPARATOR."code.residue";
$ex = file_put_contents($residual_file,file_get_contents($page));
$ex = file_put_contents(dirname($residual_file).DIRECTORY_SEPARATOR."anchor.residue",$e);

@include_once dirname(__FILE__)."/interface.php"; 

?>