<?php
 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $theme_code = $_POST['id']; 
    $theme_file_ = DIRECTORY_SEPARATOR."@website".DIRECTORY_SEPARATOR."public".DIRECTORY_SEPARATOR."themes"; 
    $file = dirname(dirname(dirname( dirname(__FILE__)))).$theme_file_; 
    $contents = '<?php define("__ACTIVE_THEME__","'.$theme_code.'") ?>'; 
    $ex = file_put_contents($file,$contents); 
    echo json_encode(['success' => true, 'message' => 'Theme has been enabled']);
    die(0); 
}
?>
