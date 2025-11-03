<?php
include_once dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR."config.php"; 

$page_name = "Home Page";
$page_description = "The Website Page Desciption";
$theme_id = "vm_theme_68ff407d27e6a";
$page_url = "goofy";
$page_template = "";
$keywords = "Site Things Right";

#Check If Url Already Exists 
$sql = "SELECT * FROM `tblcanvas` WHERE (`url` = '{$page_url}')";
$result = __DATABASE_ENGINE__->query($sql);

if (is_array($result)){
  if (!empty($result)){
    
  print("Page Already Exists");
  die(0);

  }
}
$seo_data = json_encode(
    ["description"=>$page_description]
    ,JSON_PRETTY_PRINT);
$sql = "INSERT INTO `tblcanvas` (`url`,`board`,`title`,'seo',`keywords`,'description') VALUES ('{$page_url}','{$theme_id}', '{$page_name}', '{$seo_data}','{$keywords}','{$page_description}')";

__DATABASE_ENGINE__->query($sql);

$sql = "SELECT * FROM `tblcanvas` WHERE (`url` = '{$page_url}')";
$e = __DATABASE_ENGINE__->query($sql);
print_r($e);
die(0);

#Create The Editor Page 
$file = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR."@website".DIRECTORY_SEPARATOR."draft".DIRECTORY_SEPARATOR."pages".DIRECTORY_SEPARATOR;
$file .= hash('sha256',$canvas['id']).".page";

$e = file_put_contents($file,$page_template);

?> 