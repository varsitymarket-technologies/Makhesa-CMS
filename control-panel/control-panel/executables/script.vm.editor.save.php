<?php 
@include_once (dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "systemctrl.php";
@include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "scripts.php";

$otp = get_input("otp_code") ?? __error("Missing Input Code"); 

$block_page = "Contact Us" ; 
$block_data = ""; 

$path = dirname(dirname(dirname(dirname(__FILE__))))."" ; 
$seo = json_encode([
    'description'=>'The SEO Tags For The Specofic Web Page'
],JSON_PRETTY_PRINT); 

$destination = $path.DIRECTORY_SEPARATOR."website".DIRECTORY_SEPARATOR."web".DIRECTORY_SEPARATOR."hub".DIRECTORY_SEPARATOR."structure".DIRECTORY_SEPARATOR; 
$theme = "OAKLYN";  
$inhouse_style = "" ;  
$inhouse_script = "";  
$board_index = 1;   
$sql = "INSERT INTO `tblboard` (`theme`,`style`,`script`) VALUES ('{$theme}','{$inhouse_style}','{$inhouse_script}');  ";  
$sql = "INSERT INTO `tblcanvas` (`title` , `seo`, `board`) VALUES ('{$block_page}','{$seo}','{$board_index}'); " ; 
$sql = "INSERT INTO ";   
file_put_contents($destination.(slugify($block_page)).".block.code",$block_data);   
?> 
