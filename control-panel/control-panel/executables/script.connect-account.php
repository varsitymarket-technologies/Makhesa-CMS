<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = get_input('authenticate_username') ?? __error("Missing Data Input");
    $password = get_input('authenticate_password') ?? __error("Missing Data Input");

    @include_once (dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "systemctrl.php";
    @include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "scripts.php";



    #Verify Email and Username Combination 
    if (!credentials_exists('username', $username)) {
        __error("Account Does Not Exists");
    }


    $module = new scripts_packages();
    $username = base64_encode($username);
    #echo($username); 
    
    #Base64 Username Fix 
    $username = $username.""; 

    $sql = "SELECT * FROM tblusers WHERE (`username` = '{$username}')"; 
    $results = $db->query($sql); 
    if (isset($results[0])){
        $data = $results[0]; 
        $system_password = $data['password'];
        $system_password = simple_encryption_procedure("decrypt",$system_password,$data['auth']);  
        $e = (hash("sha256",simple_encryption_procedure("encrypt",$password,$data['auth']))); 
        if (hash("sha256",$password) == hash("sha256",$system_password)){
            #__error("Passwords Match"); 
            $link = "authentication/lv-".encryption_workflow_procedure("encrypt",$data['auth'],"AUTHENTICATION")."/"; 
            echo json_encode(['authentication'=>true,"source"=>$link]); 
            exit(0); 

            if ($data['otp'] == AUTH_LOCK){
                register_user_code($data['auth']);
                echo json_encode(['success' => true, 'message' => 'Account Connected']);
                die(0); 
            }else{
                register_user_code($data['auth']); 
                echo json_encode(['confirmation' => true, 'message' => 'Confirm OTP To activate account']);
                die(0); 
                #Redirect To OTP Confirmation Page
            }
        }
        __error("Account Combination Invalid"); 
    }else{
        __error("Account Isnt Registered On The System"); 
    }

    print_r($results); 
    die(0); 

    $password = simple_encryption_procedure("encrypt", $password, $auth);
    $password_hash = hash("sha256", $password);

    $sql = "INSERT INTO tblusers (`username`,`email`,`password_hash`,`password`,`auth`,`otp`) VALUES ('{$username}','{$email}','{$password_hash}','{$password}','{$auth}','{$otp}');";
    #Create The User Account 
    $e = execute_sql_query($sql);
    if ($e) {
        @register_user_code($auth);
        echo json_encode(['success' => true, 'message' => 'Account Created']);
        die(0);
    }
}
?>