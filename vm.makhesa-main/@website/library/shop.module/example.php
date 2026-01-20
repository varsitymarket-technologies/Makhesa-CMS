<?php 
@include_once "initiate.php"; 
$shop_module = new __SHOP_MODULE__(); 

$e = $shop_module->products(1); 
print_r($e); 

#Recording To Wishlist 
$product_id = 1;

#Adding Items To The Wishlist 
$quantity = 5; 
$customer = 'HASTINGS'; 

$shop_module->record_wishlist(); 

$shop_module->get_wishlist($wishlist_id); 

$shop_module->wishlist(); 

?>