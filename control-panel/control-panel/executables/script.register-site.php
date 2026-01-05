<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $domain = $_POST['domain']; 
    $server = $_POST['server']; 
    $website = $_POST['website']; 
    #Get All The Website Form Data 

    if (empty($domain) || empty($server) || empty($website)) {
        echo "Please fill in data fields";
        #echo json_encode(['success' => true, 'message' => 'FAQ added successfully!']);
    } else {

        $status = "deployed"; 
        $status = hash("sha256",$status); 

        $scripts_file = (dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "scripts.php";
        include_once $scripts_file; 

        $domain = base_encryption($domain); 
        $server = base_encryption($server); 

        #Check For Server Limits 
        $sql = "INSERT INTO `tblwebservices` (`domain`,`server`,`status`,`user_code`) VALUES ('{$domain}','{$server}','{$status}','".__USER_CODE__."')"; 
        $e = $db->query($sql); 
        echo json_encode(['success' => true, 'message' => 'Website Has Been Registered']);
        die(0); 
    }
}
