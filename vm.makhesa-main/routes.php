<?php
@include_once dirname(__FILE__) . "/function.php";
$rescource_request = ex();
$traffic_request = $rescource_request;


#Execute The Prtocedure To Patch The Website 
procedure_patch(); 

if ($traffic_request == "@media") {
    include_once PWD . DIRECTORY_SEPARATOR . $traffic_request . DIRECTORY_SEPARATOR . "media.php";
    exit();
}

if ($traffic_request == "@rescources") {
    include_once PWD . DIRECTORY_SEPARATOR . $traffic_request . DIRECTORY_SEPARATOR . "sources.php";
    die(0);
}

if ($traffic_request == "@preview") {
    include_once PWD . DIRECTORY_SEPARATOR . "@website" . DIRECTORY_SEPARATOR . "draft".DIRECTORY_SEPARATOR."constructor.php";
    die(0);
}

if ($traffic_request == '$$vm-editor$$'){
    include_once PWD . DIRECTORY_SEPARATOR . "@website" . DIRECTORY_SEPARATOR . "builder".DIRECTORY_SEPARATOR."constructor.php";
    die(0);
}

if ($traffic_request == '@block'){
    include_once PWD . DIRECTORY_SEPARATOR . "@website" . DIRECTORY_SEPARATOR . "sections".DIRECTORY_SEPARATOR."compiler.php";
    die(0);
}
 
if ($traffic_request == "@element"){
    include_once PWD . DIRECTORY_SEPARATOR . "@website" . DIRECTORY_SEPARATOR . "sections".DIRECTORY_SEPARATOR."elements.compiler.php";
    die(0);
}

if ($traffic_request == "@scripts") {
    include_once PWD . DIRECTORY_SEPARATOR . $traffic_request . DIRECTORY_SEPARATOR . "index.php";
    die(0);
}

$error_pages = [
    "404" => dirname(__FILE__) . "/pages/error.404.page.php",
    "000" => dirname(__FILE__) . "/pages/error.000.page.php",
    "500" => dirname(__FILE__) . "/pages/error.500.page.php",
];

#$e = traffic_inspection();

# Control Panel Section 
if ($traffic_request == __ADMIN_URL__) {
    @include_once PWD . "/control-panel/control-panel/index.php";
    die(0);
}

$public_request = hash("sha256", __ADMIN_URL__);

if ($traffic_request == $public_request) {
    @include_once PWD . "/control-panel/control-panel/index.php";
    die(0);
} else {
    lock_proceedure(); 
    #terminate_application(); 
    include_once PWD . DIRECTORY_SEPARATOR . '@website' . DIRECTORY_SEPARATOR . "index.php";
    die(0);

    /*

    #Webstore Section 
    include_once PWD . DIRECTORY_SEPARATOR . "website" . DIRECTORY_SEPARATOR . "web" . DIRECTORY_SEPARATOR . "index.php";
    die(0);


    #Redirect To The Public Request
    $link = __PROTOCOL__ . __DOMAIN_NAME__ . '/' . $public_request . "/";
    header("Location: " . $link);
    die(0);

    */
}
