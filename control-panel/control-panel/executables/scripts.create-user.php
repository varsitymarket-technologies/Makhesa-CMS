<?php
@include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "scripts.php";
#Include The Main Script File 

#Receive User Inputs 
$username = $_POST['username'] ?? __error("Missing Username"); 
$email = $_POST['email'] ?? __error("Missing Email"); 
$password = $_POST['password'] ?? __error("Missing Password"); 
$confirm_password = $_POST['confirm_password'] ?? __error("Missing Password"); 
$image = $_POST['image'] ?? __error("Missing Image"); 

$first_name = $_POST['first_name'] ?? '';
$second_name = $_POST['second_name'] ?? ''; 

# Verify Password 
if (hash("sha256",$password) !== hash("sha256",$confirm_password)){
    __error("Passwords Do Not Match"); 
}

# Check For Username 
if (credentials_exists('username', base64_encode($username))){
    __error("Username Already Taken"); 
}

# Check For Email 
if (credentials_exists('email', base64_encode($email))){
    __error("Email Already Taken"); 
}


# Encodiung Encryption and Hashing 
$username = base64_encode($username); 
$email = base64_encode($email); 
$password_hash = hash("sha256",base64_encode($password)); 
$password = $password_hash; 

$sql = "INSERT INTO `users` 
('first_name','last_name','email','username','password_hash','is_active','role','img') VALUES 
('{$first_name}','{$second_name}','{$email}','{$username}','{$password}','active','user','{$image}')";

$e = $db->query($sql); 

$website_name = $_POST['website-name'] ?? __error("Missing Website Name");
$website_domain = $_POST['website-domain'] ?? __error("Missing Website Domain");
$website_template = $_POST['website-template'] ?? "blank";

#From Engine Module 

__error("Website Engine Is Offline");
