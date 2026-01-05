<?php

 
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if (true){ 
    # Input From User 
    $menu_order = $_POST['menu_order'] ; 
    $e_menu = explode(",",$menu_order); 
    $menu_id = $_POST['menu_id']; 
  
    if (empty($menu_order)) {
        echo "Menu Order is Empty";
        die(0);
        #echo json_encode(['success' => true, 'message' => 'FAQ added successfully!']);
    } 





    $sql = "SELECT * FROM `menu` WHERE (`id` == '{$menu_id}')"; 
    if (!defined('__DATABASE_WEBSITE__')){
        include_once dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR ."config.php";
    }
    $db = __DATABASE_WEBSITE__;
    $result = $db->query($sql);
    if (isset($result[0])){
        $menu_data = $result[0]['data_node'];
        $menu_name = $result[0]['title']; 
        $menu_data = json_decode($menu_data,JSON_PRETTY_PRINT);  

        $x_menu = $menu_data[$menu_name]; 
        $x_count = 0; 
        
        foreach ($e_menu as $key => $value) {
            $e1 = $x_menu[$value - 1]; 
            $e2 = $x_menu[$x_count];
            
            $x_menu[$x_count ] = $e2; 
            $x_menu[$value - 1] = $e2; 

            $x_count ++; 
        }

        $menu_data[$menu_name] = $x_menu;
        $menu_data = json_encode($menu_data,JSON_PRETTY_PRINT);
        $sql = "UPDATE `menu` SET `data_node` = '{$menu_data}' WHERE (`title` = '{$menu_name}')";
        $db->query($sql);
        echo json_encode(['success' => true, 'message' => 'Menu Item Added!']);
        die(0); 
        

    }else{
        #Warning Menu Already Exists 
        echo "Menu Item Does Not Exists";
        die(0);

    }

}