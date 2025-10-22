<?php 
@include_once "module.database.php"; 

$db->createTable('tblsupport', [
    'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT',
    'subject' => 'TEXT NOT NULL',
    'description' => 'TEXT NOT NULL',
    'user_code' => 'TEXT NOT NULL',
    'status' => 'TEXT',
    'created_at' => 'DATE DEFAULT CURRENT_DATE'
]); 

$db->createTable('tblusers', [
    'id'=> 'INTEGER PRIMARY KEY AUTOINCREMENT',
    'username' => 'VARCHAR(50) NOT NULL UNIQUE',
    'email' => 'VARCHAR(100) NOT NULL UNIQUE',
    'password_hash' => 'VARCHAR(255) NOT NULL',
    'created_at' =>  'TIMESTAMP DEFAULT CURRENT_TIMESTAMP', 
    'password' => 'TEXT',
    'auth' => 'TEXT',
    'otp' => 'TEXT',
]); 

$db->createTable('tblsupport_chats', [
    'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT',
    'client_data' => 'TEXT',
    'response' => 'TEXT',
    'client_code' => 'TEXT',
    'support_ref' => 'TEXT NOT NULL',
    'session' => 'DATE DEFAULT CURRENT_DATE',
    'admin_code' => 'TEXT',
]); 

//execute_sql_query("DROP TABLE tbltransactions"); 
//$db->query("DROP TABLE tbltransactions"); 

$db->createTable('tbltransactions', [
    'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT',
    'amount' => 'TEXT',
    'description' => 'TEXT',
    'user_code' => 'TEXT NOT NULL',
    'date' => 'DATE DEFAULT CURRENT_DATE',
]); 

$db->query("DROP TABLE tblwebservices");

$db->createTable('tblwebservices', [
    'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT',
    'domain' => 'TEXT',
    'server' => 'TEXT',
    'status' => 'TEXT',
    'user_code' => 'TEXT NOT NULL',
    'date' => 'DATE DEFAULT CURRENT_DATE',
]); 


# Database Startup for the E-Commerce Secton 

$db->createTable('categories',[
    'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT',
    'name' => 'TEXT',
    'image' => 'TEXT',
]); 

$db->createTable('brands',[
    'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT',
    'name' => 'TEXT',
    'image' => 'TEXT',
]); 

$db->createTable('products', [
    'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT',
    'title' => 'TEXT',
    'image' => 'TEXT',
    'description' => 'TEXT',
    'price' => 'TEXT',
    'sku' => 'TEXT',
    'stock' => 'TEXT',
    'category' => 'TEXT',
    'brand' => 'TEXT NOT NULL',
    'sale_price' => 'TEXT NOT NULL',
    'source' => 'TEXT NOT NULL',
    'date' => 'DATE DEFAULT CURRENT_DATE',
]); 


$db->createTable('gallery', [
    'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT',
    'title' => 'TEXT',
    'image_path' => 'TEXT',
    'description' => 'TEXT',
    'hash' => 'TEXT',
    'date' => 'DATE DEFAULT CURRENT_DATE',
]); 

$db->createTable('menu',[
    'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT', 
    'title' => 'TEXT', 
    'data_node' => 'TEXT', 
]); 


$db->createTable('faq',[
    'id' => 'INTEGER PRIMARY KEY AUTOINCREMENT', 
    'question' => 'TEXT', 
    'response' => 'TEXT', 
    'category' => 'TEXT', 
]); 
 
?>