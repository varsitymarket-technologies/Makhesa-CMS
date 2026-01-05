<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    # Creating The User Account 
    @include_once (dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "systemctrl.php";
    @include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "scripts.php";

    $otp = get_input("otp_code") ?? __error("Missing Input Code"); 
    $auth = USER_CODE;     
    if ($auth == false){
        __error("Try Accessing Your Account To Verify It"); 
    }
    $sql = "SELECT * FROM tblusers WHERE (`auth` = '{$auth}')"; 
    $results = $db->query($sql); 
    if (isset($results[0])){
        $system_code = $results[0]['otp'];  
        if ($system_code == $otp){
            echo json_encode(['success' => true, 'message' => 'Account Verified']);
            die(0); 
        }
        __error("Code is invalid");
    }
    __error("Cannot Create User OTP"); 
}
?>