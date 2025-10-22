<?php
@include_once dir(__FILE__).DIRECTORY_SEPARATOR."scripts.php";

$M = [
    "create-website" => "pages" . DIRECTORY_SEPARATOR . "cp.sites.create.page.php",
    "dashboard" => "pages" . DIRECTORY_SEPARATOR . "store.dashboard.page.php",
    "website-manager" => "pages" . DIRECTORY_SEPARATOR . "cp.sites.manager.page.php",
    "websites" => "pages" . DIRECTORY_SEPARATOR . "cp.sites.home.page.php",
    "login" => "pages" . DIRECTORY_SEPARATOR . "cp.security.signin.page.php",
    "authentication" => "pages" . DIRECTORY_SEPARATOR . "cp.authentication.page.php",
    "faq" => "pages" . DIRECTORY_SEPARATOR . "cp.faq.page.php",
    "contact-form" => "pages" . DIRECTORY_SEPARATOR . "cp.contact-form.page.php",

    '404' => "hub".DIRECTORY_SEPARATOR."production".DIRECTORY_SEPARATOR."blocks".DIRECTORY_SEPARATOR."404.page.blade",
    'categories' => "hub".DIRECTORY_SEPARATOR."production".DIRECTORY_SEPARATOR."blocks".DIRECTORY_SEPARATOR."category.page.blade",
    'about' => "hub".DIRECTORY_SEPARATOR."production".DIRECTORY_SEPARATOR."blocks".DIRECTORY_SEPARATOR."about.page.blade",
    'shop' => "hub".DIRECTORY_SEPARATOR."production".DIRECTORY_SEPARATOR."blocks".DIRECTORY_SEPARATOR."shop.page.blade",
    'product' => "hub".DIRECTORY_SEPARATOR."production".DIRECTORY_SEPARATOR."blocks".DIRECTORY_SEPARATOR."product.page.blade",


    'media' => "pages" . DIRECTORY_SEPARATOR . "cp.media-library.page.php",
    'inventory' => "pages" . DIRECTORY_SEPARATOR . "cp.inventory.page.php",
    'settings' => "pages" . DIRECTORY_SEPARATOR . "cp.settings.page.php",
    'email-configuration' => "pages" . DIRECTORY_SEPARATOR . "cp.email-settings.page.php",
    'web-services' => "pages" . DIRECTORY_SEPARATOR . 'cp.web-services.page.php',
    'support' => "pages" . DIRECTORY_SEPARATOR . 'cp.support.page.php',
    'wallet' => "pages" . DIRECTORY_SEPARATOR . 'cp.wallet.page.php',
    "signup" => "pages" . DIRECTORY_SEPARATOR . "cp.security.signup.page.php",
    "confirm-account" => "pages" . DIRECTORY_SEPARATOR . "cp.security.confirmation.page.php",
    "quit" => "pages" . DIRECTORY_SEPARATOR . "cp.quit-session.page.php",
    "reset-password" => "pages" . DIRECTORY_SEPARATOR . "cp.security.reset.account.page.php",
];

file_put_contents(__DIR__."/hub/production/assets/page_map.json",json_encode($M,JSON_PRETTY_PRINT));

@include_once (dirname(dirname(dirname(__FILE__)))). DIRECTORY_SEPARATOR."control-panel".DIRECTORY_SEPARATOR."control-panel".DIRECTORY_SEPARATOR."systemctrl.php";
$page_request = map_page()[1] ;
$map_file = dirname(__FILE__).DIRECTORY_SEPARATOR."hub".DIRECTORY_SEPARATOR."production".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."page_map.json";
$map = json_decode(file_get_contents($map_file),JSON_PRETTY_PRINT) ;

$page_construct = $map[$page_request] ; 
if (isset($map[$page_request])){
  $page_construct = dirname(__FILE__).DIRECTORY_SEPARATOR.$map[$page_request] ;
}else{
  $page_construct = dirname(__FILE__).DIRECTORY_SEPARATOR.$map["404"] ;
}

include_once "web.interface.php";
?>
