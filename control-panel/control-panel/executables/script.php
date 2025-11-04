<?php
define("USER_CODE", retrieve_user_code()); 
include_once dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "package-manager.php";
include_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . "database".DIRECTORY_SEPARATOR."client.module.php";
include_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR ."config.php";

#$db = new database_manager();
$db = __DATABASE_WEBSITE__;

function retrieve_user_code() {
    if (isset($_COOKIE['user_code'])) {
        return $_COOKIE['user_code'];
    } elseif (isset($_SESSION['user_code'])) {
        return $_SESSION['user_code'];
    } else {
        return false; // or handle as needed
    }
}

function create_url_authentication_code($token){
    #Generating Url Authentication Code 
    $e = "encryption_workflow_procedure";
    if (!function_exists($e)){
        trigger_error("Encryption Module Missing"); 
    }
    $data = $e("encrypt",$token,"AUTHENTICATION");
    return "lv-".$data;  
}

function register_user_code($data){
    $_SESSION["user_code"] = stateless_encryption($data);
    setcookie("user_code", $data);
}

function create_account_otp(){
    $random_log = "1234567890123456789001234567890";
    $limit = 6; 
    $e = substr(str_shuffle(str_shuffle($random_log)),0,$limit);  
    return $e; 
}

function create_account_auth(){
    global $db; 
    $random_log = "1234567890QWERTYUIOPASDFGHJKLZXCVBNM";
    $limit = 30; 
    $flag = false; 
    $code = null; 
    while ($flag == false) {
        $code = substr(str_shuffle(str_shuffle($random_log)),0,$limit); 
        $sql = "SELECT * FROM users WHERE (auth = '{$code}')";
        $db_module = __DATABASE_LOGS__;
        $e = $db_module->query($sql);
        if (isset($e[0])){
            $flag = true; 
            return $code; 
        }
    }
    die(0); 
}

function credentials_exists($section,$data){
    $code = base64_encode($data); 
    $sql = "SELECT * FROM users WHERE ({$section} = '{$code}')";
    $db_module = __DATABASE_LOGS__;
    $e = $db_module->query($sql);
    if (isset($e[0])){
        return true; 
    }
    return false; 
}

function get_input($data){
    $e = $_POST[$data] ?? false; 
    return $e; 
}   
function verify_email($data){
    #Verify The Email Used 
    $email = $data; 
    // First, check if the email is a valid string.
    if (!is_string($email)) {
        return false;
    }
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

if (function_exists(function: '__error') !== true){    
    function __error($description) {
        echo $description;
        return die(0);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $page = isset($_POST['request']) ? $_POST['request'] : '';
    // Now you can use $page as needed
    $executable_map = [
        "create-site" => "script.create-site.php",
        "delete-site" => "script.delete-site.php",
        "update-site" => "script.update-site.php",
        "create-faq" => "script.create-faq.php",
        "delete-faq" => "script.delete-faq.php",
        "update-faq" => "script.update-faq.php",  

        "create-user" => "script.create-account.php",
        "connect-user" => "script.connect-account.php",
        "confirm-account" => "script.confirm-otp.php",

        "create-ticket" => "script.create-ticket.php",

        "create-category" => "script.create-category.php",
        "create-product" => "script.create-product.php",
        
        "register-website" => "script.register-site.php",

        "create-menu"=>"script.create-menu.php",

    ];
    
    if (array_key_exists($page, $executable_map)) {
        $file_path = dirname(__FILE__) . DIRECTORY_SEPARATOR . $executable_map[$page];
        if (file_exists($file_path)) {
            include_once $file_path;
        } else {
            echo "File not found: " . htmlspecialchars($file_path);
        }
    } else {
        echo "Invalid request.";
    }
}

if (function_exists('slugify') == false){
    function slugify($string)
    {
        // Convert to lowercase
        $string = strtolower($string);

        // Replace non-letter or digits by hyphen
        $string = preg_replace('~[^\pL\d]+~u', '-', $string);

        // Transliterate characters to ASCII
        $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);

        // Remove unwanted characters
        $string = preg_replace('~[^-\w]+~', '', $string);

        // Trim hyphens from the start and end
        $string = trim($string, '-');

        // Return the slug
        return $string;
    }
}


?>