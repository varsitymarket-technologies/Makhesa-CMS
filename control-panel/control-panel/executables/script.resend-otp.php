<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    # Creating The User Account 
    @include_once (dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "systemctrl.php";
    @include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "scripts.php";

    $auth = USER_CODE; 
    $otp = create_account_otp(); 
    $sql = "UPDATE tbluser SET `otp` = '{$otp}' WHERE (`auth` = '{$auth}')"; 
    $e = execute_sql_query($sql);
    
    $sql = "SELECT * FROM tblusers WHERE (`otp` = '{$otp}') AND (`auth` = '{$auth}')"; 
    $results = $db->query($sql); 
    if (isset($results[0])){
        echo json_encode(['success' => true, 'message' => 'Account Created']);
        die(0); 
    }
    __error("Cannot Create User OTP"); 
}
?>