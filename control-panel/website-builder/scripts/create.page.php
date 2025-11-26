<?php
include_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . "config.php";
function ew($description)
{
  echo "<script>window.alert(`" . $description . "`); </script>";
  global $flag;
  $flag = false;
  return "";
}
;

$flag = true;

$page_name = $_POST['edt-page-title'] ?? ew("Missing Page Title");
$page_description = $_POST['edt-page-description'] ?? ew("Missing Page Description");
$theme_id = $_POST['edt-page-theme'] ?? ew("Missing Page Title");
$page_url = $_POST['edt-page-url'] ?? ew("Missing Page Title");
$page_template = $_POST['edt-page-template'] ?? ew("Missing Page Title");
$starter_file = dirname(dirname(dirname(dirname(__FILE__)))) . '\@website\themes\\' . $theme . '\init\pages\\' . $page_template;
@$starter_file = file_get_contents($starter_file) ?? "";
$page_template = $starter_file;
$keywords = $_POST['edt-page-keyword'] ?? ew("Missing Page Keywords");
if (strlen($page_name) < 2) {
  ew("Name Is Too Short");
}

if (strlen($page_url) < 1) {
  ew("Page Url Is Invalid");
}
if ($flag !== false) {
  #Check If Url Already Exists 
  $sql = "SELECT * FROM `tblcanvas` WHERE (`url` = '{$page_url}')";
  $result = __DATABASE_ENGINE__->query($sql);

  if (is_array($result)) {
    if (!empty($result)) {

      ew("Page Already Exists");
      die(0);

    }
  }
  $seo_data = json_encode(
    ["description" => $page_description]
    ,
    JSON_PRETTY_PRINT
  );
  $sql = "INSERT INTO `tblcanvas` (`url`,`board`,`title`,'seo',`keywords`,'description') VALUES ('{$page_url}','{$theme_id}', '{$page_name}', '{$seo_data}','{$keywords}','{$page_description}')";

  __DATABASE_ENGINE__->query($sql);

  $sql = "SELECT * FROM `tblcanvas` WHERE (`url` = '{$page_url}')";
  $e = __DATABASE_ENGINE__->query($sql);
  $canvas = $e[0];
  #Create The Editor Page 
  $file = dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . "@website" . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "pages" . DIRECTORY_SEPARATOR;
  $file .= hash('sha256', $canvas['id']) . ".page";
  # echo $canvas['id'];
  $e = file_put_contents($file, $page_template);
  echo "<script>window.location=`/".__ADMIN_URL__."/vm-editor/pages/`</script>"; 
  # ew("Page Created");
}

?>