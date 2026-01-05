<?php 
$config = dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR."config.php";
@include_once $config;
$page = dirname($config).DIRECTORY_SEPARATOR."@website".DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR."pages".DIRECTORY_SEPARATOR."6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b.page";
$page_contents = $_POST['file_content'];
$page_code = file_get_contents(dirname(__FILE__).DIRECTORY_SEPARATOR."anchor.residue") ;
$page = dirname($page).DIRECTORY_SEPARATOR.hash("sha256",$page_code).".page";
$e = file_put_contents($page,$page_contents);

?>