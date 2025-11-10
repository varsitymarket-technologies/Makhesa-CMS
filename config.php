<?php
#Include Database Client 
@include_once "database" . DIRECTORY_SEPARATOR . "client.module.php";

$db_website = new database_manager();
$db_engine = new database_manager();
$db_email = new database_manager();
$db_register = new database_manager();
$db_logs = new database_manager();

define("__DATABASE_ENV__", construct_database_env());

if (!defined("__cmd__")) {
    /*
    if (!file_exists(__DATABASE_ENV__['root'] . DIRECTORY_SEPARATOR . __DATABASE_ENV__['logs.database'])) {
        @include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "database.connection.php";
        exit(0);
    }
    
    if (!file_exists(__DATABASE_ENV__['root'] . DIRECTORY_SEPARATOR . __DATABASE_ENV__['website.database'])) {
        @include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "database.connection.php";
        exit(0);
    }
    if (!file_exists(__DATABASE_ENV__['root'] . DIRECTORY_SEPARATOR . __DATABASE_ENV__['register.database'])) {
        @include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "database.connection.php";
        exit(0);
    }
    */
}

$db_website->override_connection(__DATABASE_ENV__['root'] . DIRECTORY_SEPARATOR . __DATABASE_ENV__['website.database']);
$db_engine->override_connection(__DATABASE_ENV__['root'] . DIRECTORY_SEPARATOR . __DATABASE_ENV__['engine.database']);
$db_email->override_connection(__DATABASE_ENV__['root'] . DIRECTORY_SEPARATOR . __DATABASE_ENV__['email.database']);
$db_logs->override_connection(__DATABASE_ENV__['root'] . DIRECTORY_SEPARATOR . __DATABASE_ENV__['logs.database']);
$db_register->override_connection(__DATABASE_ENV__['root'] . DIRECTORY_SEPARATOR . __DATABASE_ENV__['register.database']);

function construct_database_env()
{
    $e = [
        'root' => __DIR__ . DIRECTORY_SEPARATOR . "database",
        'website.database' => '__WEBSITE_hDATABASE__.DB',
        'email.database' => '__EMAIL_DATABASE__.DB',
        'logs.database' => '__.DB',
        'engine.database' => '__ENGINE_DATABASE__.DB',
        'register.database' => '__REGISTER_DATABASE__.DB',
    ];
    return $e;
}

define('__DATABASE_WEBSITE__', $db_website);
define('__DATABASE_ENGINE__', $db_engine);
define('__DATABASE_EMAILL__', '');
define('__DATABASE_LOGS__', $db_logs);
define('__DATABASE_REGISTER__', '');

$dir = __DIR__; 

if ((is_writable($dir))){
    $file = uniqid("test.log",).".log"; 
    #Create The File To Test Permissions 
    if (file_put_contents($file,true) !== false){
        unlink($file); 
    } else{    
        @include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "directory.permission.php";
        exit(0);
        echo "Cannot Create The File"; 
        
    }
}else{
    @include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR . "directory.permission.php";
    exit(0);
    echo "System Cannot Read Directory"; 
}


?>