<?php
#   TITLE   : Scripts Library File
#   DESC    : This is used by the system to handle ajax async functions and task. This will ensure the smooth site operations when runing javascript operations
#   PROPRIETOR: VARSITYMARKET_TECHNOLOGIES
#   VERSION : 1.0.1.1
#   AUTHOR  : HARDY HASTINGS  
#   RELEASE : 2025/10/20

@define("SCRIPT_FILE", dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "control-panel" . DIRECTORY_SEPARATOR . "control-panel" . DIRECTORY_SEPARATOR . "executables" . DIRECTORY_SEPARATOR . "script.php");
if (isset($_GET['request'])) {
    $request = $_GET['request'];
    if ($request == "media-upload") {
        include_once dirname(SCRIPT_FILE) . DIRECTORY_SEPARATOR . "script.media-add.php";
    }
    die(0);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once SCRIPT_FILE ?? trigger_error("Cannot access script file");
} else {

    $e = dirname(SCRIPT_FILE) . DIRECTORY_SEPARATOR . "media-container.php";
    include_once $e;
}
