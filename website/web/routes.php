<?php
@include_once "scripts.php";

$M = [
    "create-website" => "pages" . DIRECTORY_SEPARATOR . "cp.sites.create.page.php",
    "dashboard" => "pages" . DIRECTORY_SEPARATOR . "store.dashboard.page.php",
    "website-manager" => "pages" . DIRECTORY_SEPARATOR . "cp.sites.manager.page.php",
    "websites" => "pages" . DIRECTORY_SEPARATOR . "cp.sites.home.page.php",
    "login" => "pages" . DIRECTORY_SEPARATOR . "cp.security.signin.page.php",
    "authentication" => "pages" . DIRECTORY_SEPARATOR . "cp.authentication.page.php",
    "faq" => "pages" . DIRECTORY_SEPARATOR . "cp.faq.page.php",
    "contact-form" => "pages" . DIRECTORY_SEPARATOR . "cp.contact-form.page.php",
    "category" => "pages" . DIRECTORY_SEPARATOR . "cp.category.page.php",
    
    '404' => "hub".DIRECTORY_SEPARATOR."production".DIRECTORY_SEPARATOR."blocks".DIRECTORY_SEPARATOR."404.page.blade",
    'about' => "hub".DIRECTORY_SEPARATOR."production".DIRECTORY_SEPARATOR."blocks".DIRECTORY_SEPARATOR."about.page.blade",
    'shop' => "hub".DIRECTORY_SEPARATOR."production".DIRECTORY_SEPARATOR."blocks".DIRECTORY_SEPARATOR."shop.page.blade",


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
@include_once "interface.php";
?>
