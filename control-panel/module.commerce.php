<?php 
class commerce_services{
    function explaination(){
        return "This Is The Eccommerce Service Kit. This Holds Algorithms For The Commerce Prompts"; 
    }

    function title(){
        return "E-Commerce Service Plugins"; 
    }

    function currency(){
        return "R";
    }

    function products(){
        $data = [
            "001"=>[
                "image"=>"http://localhost:3000/website/assets/img/product/product-2.webp",
                "name"=>"title",
                "price"=>"R 300.00",
                "category"=>"Example",
            ],
            "002"=>[
                "image"=>"http://localhost:3000/website/assets/img/product/product-5.webp",
                "name"=>"title",
                "price"=>"R 300.00",
                "category"=>"Example",
            ]
        ];
        return $data;
    }
}
?>