<?php 
#Application Databse Manamagent System 

include_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."control-panel".DIRECTORY_SEPARATOR."blade.header.php";
include_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."control-panel".DIRECTORY_SEPARATOR."blade.header.enlist.php";
include_once "blade.navbar.php";
include_once $r_page;
$page = dirname(__FILE__).DIRECTORY_SEPARATOR."pages".DIRECTORY_SEPARATOR."database-manager.php";
include_once $page;
include_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."control-panel".DIRECTORY_SEPARATOR."blade.footer.php";

?>