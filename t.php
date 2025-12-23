<?php 

#Construcing The Website Lock; 
$target_file = dirname(__FILE__)."/bin/lock.key";
$module_file = dirname(__FILE__)."/bin\license.innit";   
include_once $module_file; 
$username = 'admin'; 
$password =  "MembersOnly"; 
$domain ='127.0.0.1'; 
$ip = '127.0.0.1';

$module = new license_innit(); 
#Import The Lock File 
$module->import($target_file);

#Capture The Lock Data 
$e = $module->capture(); 

$lusername = $e['authentication']['username']; 
$lpassword = $e['authentication']['password']; 

if ($username !== $lusername){
    //Usernames Dont Match 
    trigger_error('Usernames dont match'); 
}

if ($password !== $lpassword){
    #Passwords Dont Match 
    trigger_error("Invalid Password"); 
}
#Verify Password 
?>