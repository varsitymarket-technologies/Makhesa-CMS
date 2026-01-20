<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    # Input From User 
    $menu_name = $_POST['menu_name'] ?? '';
    $menu_caption = $_POST['menu_caption'] ?? '';
    $menu_link = $_POST['menu_link'] ?? '#';

    if (empty($menu_name) || empty($menu_caption)) {
        echo "Please fill in form fields";
        die(0);
        #echo json_encode(['success' => true, 'message' => 'FAQ added successfully!']);
    } 

    $sql = "SELECT * FROM `menu` WHERE (`title` == '{$menu_name}')";
    if (!defined('__DATABASE_WEBSITE__')){
        include_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR ."config.php";
    }
    $db = __DATABASE_WEBSITE__;
    $result = $db->query($sql);
    if (isset($result[0])){
        #Warning Menu Already Exists 
        echo "Menu Item Already Exists";
        die(0);

    }else{
        #$menu_data = [$menu_name=>['caption'=>$menu_caption],'link'=>$menu_link,'node'=>'text'];
        $menu_data[$menu_name][] = [
            "node"=>"text",
            "link"=>$menu_link,
            "caption"=>$menu_caption,
        ];
        $menu_data = json_encode($menu_data,JSON_PRETTY_PRINT);
        $sql = "INSERT INTO `menu` (`title`,`data_node`) VALUES ('{$menu_name}','$menu_data')";
        $db->query($sql);
        echo json_encode(['success' => true, 'message' => 'Menu Item Successfully Created!']);
        die(0); 
    }

}