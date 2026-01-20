<?php 
class commerce_services{
    public $databae; 

    function __construct(){
        @include_once "module.database.php"; 
        $db_source = new database_manager(); 
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
}

?>