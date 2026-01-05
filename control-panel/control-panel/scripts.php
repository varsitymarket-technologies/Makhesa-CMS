<?php
include_once dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "package-manager.php";

#For Debuging Purposes 


define("__USER_CODE__", retrieve_code());
include_once "config.php";

if (function_exists(function: '__error') !== true) {
    function __error($description)
    {
        echo $description;
    }

}

function base_encryption($string)
{
    $module = new scripts_packages();
    $e = simple_encryption_procedure("encrypt", $string, "ENCRYPTION_KEYS");
    return $e;
}

function base_decryption($string)
{
    $module = new scripts_packages();
    $e = simple_encryption_procedure("decrypt", $string, "ENCRYPTION_KEYS");
    return $e;
}

function simple_encryption($string)
{
    return base64_encode($string);
}

function simple_decryption($string)
{
    return base64_decode($string);
}

function retrieve_code()
{
    $key = "LEVIDOC";
    return hash("sha256", $key);
}

function create_support_ticket_id()
{
    $module = new scripts_packages();
    $module->activate_database();
    $sql = "SELECT MAX(id) AS last_id FROM tblsupport;";
    $exec = $module->database->query($sql);
    $ticket_num = ($exec[0]['last_id'] + 1);
    return $ticket_num;
}

function execute_sql_query($sql)
{
    $module = __DATABASE_WEBSITE__;
    $ouput = $module->query($sql);
    return $output;
    
    #Filter SQL Statement 
    $module = new scripts_packages();
    $module->activate_database();
    $output = $module->database->query($sql);
    if (is_array($output)) {
        return true;
    }
    return $output;
}

function record_transaction($description,$amount){
    $amount = base64_encode($amount);
    $description = base_encryption($description);  
    $user = __USER_CODE__; 
    $sql = "INSERT INTO `tbltransactions` ('amount','description','user_code') VALUES ('{$amount}','{$description}','{$user}')";
    $e = execute_sql_query($sql); 
    return $e; 
}
function createYocoCheckout(string $secretKey, int $amount, string $currency, string $successUrl, string $cancelUrl, string $failureUrl): ?array {
    $curl = curl_init();

    $data = [
        "amount" => $amount,
        "currency" => $currency,
        "successUrl" => $successUrl,
        "cancelUrl" => $cancelUrl,
        "failureUrl" => $failureUrl
    ];

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://payments.yoco.com/api/checkouts",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($data),
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer " . $secretKey,
            "Content-Type: application/json"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    curl_close($curl);

    if ($err) {
        // Handle cURL error
        error_log("cURL Error #: " . $err);
        return null;
    } else {
        $responseData = json_decode($response, true);

        if ($http_code >= 200 && $http_code < 300) {
            return $responseData;
        } else {
            // Handle API error
            error_log("Yoco API Error: " . print_r($responseData, true));
            return null;
        }
    }
}

function yoco_checkout($amount){
    $amount = $amount * 100;     
    // Example usage:
    $secretKey = "TESTING THIS"; // Replace with your actual secret key
    $currency = "ZAR";
    $successUrl = "https://example.com/success";
    $cancelUrl = "https://example.com/cancel";
    $failureUrl = "https://example.com/failure";

    $checkoutResponse = createYocoCheckout($secretKey, $amount, $currency, $successUrl, $cancelUrl, $failureUrl);
    return $checkoutResponse['redirectUrl'] ?? trigger_error("Could Not Create Checkout"); 
}

//$e = record_transaction("FREE CREDITS",210); 
//$e = record_transaction("Website Package: Starter",-210); 
//$e = record_transaction("Account Recharge",600); 


if (function_exists('get_admin_url') == false) {


    function get_admin_url()
    {
        $pwd = dirname(dirname(dirname(__FILE__)));
        $file_path = $pwd . "/control-panel/bin/dependencies/gateways.pxy";
        $default_route = "vm-admin";
        if (file_exists($file_path)) {
            #Encryption Class  
            try {
                @include_once $pwd . "/control-panel/bin/encryption.source.pack.php";
                $enc = "stateless_encryption";
                $e = $enc(file_get_contents($file_path), "decryption");
                return $e;
            } catch (\Throwable $th) {
                die($th);
                return $default_route;
            }
        } else {
            return $default_route;
        }
    }

}
?>