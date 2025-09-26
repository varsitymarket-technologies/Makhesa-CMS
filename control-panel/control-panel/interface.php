<?php

function get_page_map()
{
  return [
    "dashboard" => "pages" . DIRECTORY_SEPARATOR . "store.dashboard.page.php",
    "create-website" => "pages" . DIRECTORY_SEPARATOR . "cp.sites.create.page.php",
    "website-manager" => "pages" . DIRECTORY_SEPARATOR . "cp.sites.manager.page.php",
    "websites" => "pages" . DIRECTORY_SEPARATOR . "cp.sites.home.page.php",
    "login" => "pages" . DIRECTORY_SEPARATOR . "cp.security.signin.page.php",
    "authentication" => "pages" . DIRECTORY_SEPARATOR . "cp.authentication.page.php",

    "faq" => "pages" . DIRECTORY_SEPARATOR . "cp.faq.page.php",
    "contact-form" => "pages" . DIRECTORY_SEPARATOR . "cp.contact-form.page.php",
    "category" => "pages" . DIRECTORY_SEPARATOR . "cp.category.page.php",
    '404' => "pages" . DIRECTORY_SEPARATOR . "cp.error.404.page.php",
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

    "profile" => "pages" . DIRECTORY_SEPARATOR . "cp.profile.account.page.php",
  ];
}

function get_internal_page()
{
  return map_page()[2];
}
#This is where the Interface Pages Come In 
$page_map = get_page_map();
$internal_page = get_internal_page() ?? $_POST['page_request'];
if (empty($internal_page)) {
  $internal_page = "dashboard";
}
$r_page = dirname(__FILE__) . DIRECTORY_SEPARATOR . $page_map[$internal_page] ?? dirname(__FILE__) . $page_map["404"];

#Lock The User From Free Access 
if ((!isset($_COOKIE['user_code']))) {
  $authentiction_pages = [
    "login" => '',
    "signup" => '',
    "confirm-account" => "",
    "authentication" => "",
    "reset-password" => "",
  ];

  if (key_exists($internal_page, $authentiction_pages)) {
    $r_page = dirname(__FILE__) . DIRECTORY_SEPARATOR . $page_map[$internal_page];
  } else {
    $r_page = dirname(__FILE__) . DIRECTORY_SEPARATOR . $page_map["login"];
  }
}

if (is_dir($r_page)) {
  $r_page = "lost-file";
}

$user = $_COOKIE['user_code']; 

if (file_exists($r_page)) {
  include_once "blade.header.php";
  include_once "blade.header.enlist.php";
  include_once "blade.navbar.php";
  include_once $r_page;
  include_once "blade.footer.php";
} else {
  include_once dirname(__FILE__) . DIRECTORY_SEPARATOR . $page_map["404"];
}
?>