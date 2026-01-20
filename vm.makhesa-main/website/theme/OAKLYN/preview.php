<?php
@include_once "page.meta.php";

# Create The Website Preview 

#Import The Database 
$module_file = dirname(dirname(__FILE__)) .DIRECTORY_SEPARATOR. "database".DIRECTORY_SEPARATOR."client.module.php";
@include_once $module_file; 
$site_database = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR."control-panel".DIRECTORY_SEPARATOR."website-builder".DIRECTORY_SEPARATOR."scripts".DIRECTORY_SEPARATOR."core.database"; 

$preview_db = new database_manager();
$preview_db->override_connection($site_database); 

$title = "testing-code";
$sql = "SELECT * FROM `tbltheme` WHERE (`title` = '{$title}');";
$theme_data = $preview_db->query($sql);

$page_interface = $theme_data[0]['interface'];

$preview_file = "preview.page";
if (file_exists($preview_file)){
    $preview_data = file_get_contents($preview_file);
    if ($preview_data == $page_interface){
        @include_once $preview_file;
    }else{
        echo "Updating Preview";
        echo "<script></script";
        file_put_contents($preview_file,$page_interface);
    }
}else{
    echo "Creating Preview";
    file_put_contents($preview_file,$page_interface);
}
die(0);

$converted_code = str_ireplace(["<?php","?>"],["[code]","[\code]"],$page_interface);
$sets = explode(PHP_EOL,$converted_code);

$site_data = "";
$exec_flag = false;
$exec_code = "";
foreach ($sets as $key => $value) {
    $site_data = $value;
    if (str_contains($value,"[code]")){
        $exec_flag = true;
        $exec_code .= "";
        echo strstr(substr( strstr($value,'[code]'),strlen('[code]')),'[\code]',true)."\n";
        #$code = strstr();
        $exec_code = "";
    }else if (str_contains($value,"[\code]")){
        $exec_code = "";
    }else{
        #print($value);
    }
    #$e = eval($exec_code);
    # code...
}
die(0);

?> 
