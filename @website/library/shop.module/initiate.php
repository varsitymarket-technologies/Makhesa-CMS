<?php 
// initiate.php

#   TITLE   : Library Initiation   
#   DESC    : Website functionalities are restricted to the user who enables these services. This Initiate Page Makes The Libraries To Load on system.  
#   PROPRIETOR: VARSITYMARKET_TECHNOLOGIES
#   VERSION : 1.0.1.1
#   AUTHOR  : HARDY HASTINGS  
#   RELEASE : 2025/06/29

class __SHOP_MODULE__ {
    public $databae; 
    function __construct(){
        if (!defined("__DATABASE_WEBSITE__")){
            @include_once dirname(dirname(dirname(dirname(__FILE__)))).DIRECTORY_SEPARATOR."config.php"; 
            $db_source = __DATABASE_WEBSITE__; 
        }
        $db_source = __DATABASE_WEBSITE__; 
        $this->database_connection($db_source); 
    }

    function explaination(){
        return "This Is The Eccommerce Service Kit. This Holds Algorithms For The Commerce Prompts"; 
    }

    function title(){
        return "E-Commerce Service Plugins"; 
    }

    function currency(){
        return "R";
    }

    function database_connection($data_connection){
        $this->database = $data_connection; 
    }

    function shop(){
        $sql = "SELECT * FROM `products`"; 
        $data = $this->database->query($sql); 
        $products = [];
        if (isset($data[0])){
            foreach ($data as $key => $value) {
                $products[$value['id']] = $value;
                # code...
            }
        }
        return $products;
    }

    function categories(){
        $sql = "SELECT * FROM `categories`"; 
        $data = $this->database->query($sql); 
        $products = [];
        if (isset($data[0])){
            foreach ($data as $key => $value) {
                $products[$value['id']] = $value;
                # code...
            }
        }
        return $products;
    }

    function category($id){
        $sql = "SELECT * FROM `categories` WHERE (`id` = '{$id}')"; 
        $data = $this->database->query($sql); 
        $category = [];
        if (isset($data[0])){
            foreach ($data as $key => $value) {
                $category[] = $value;
                # code...
            }
        }
        return $category;
    }

    function products($id){
        $sql = "SELECT * FROM `products` WHERE (`id` = '{$id}')"; 

        $data = $this->database->query($sql); 
        $products = [];
        if (isset($data[0])){
            foreach ($data as $key => $value) {
                $products = $value;
                # code...
            }
        }
        return $products;
    }

    function record_wishlist($product_id,$quantity=1,$user_id="GHOST"){
        if ($user_id == "GHOST"){
            #Create a New GHOST UNIQUE ID
        }

        $sql = "INSERT INTO `wishlist`('product_id', ) VALUES (); "; 
    }
}
?>