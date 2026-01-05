<?php
// module.database.php

#   TITLE   : sqllite-database-manager    
#   DESC    : The database package connection pipeline 
#   PROPRIETOR: VARSITYMARKET_TECHNOLOGIES
#   VERSION : 1.0.1.1
#   AUTHOR  : HARDY HASTINGS  
#   RELEASE : 2025/11/13

@include_once dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."database".DIRECTORY_SEPARATOR."client.module.php" ?? trigger_error("FAILED TO LOAD DATABASE MANAGER", E_USER_ERROR);
$db = new database_manager();
?>