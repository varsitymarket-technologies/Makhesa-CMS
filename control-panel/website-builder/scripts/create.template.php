<?php

#This Script allows you to register a template on the system. 
$Grid_Template = ""; 
$Template_Name = "shop.template";
$Template_Theme = "Oaklyn";
$Grid_Template = '
        <div class="col-lg-3 col-md-6">
            <div class="product-item">
              <div class="product-image">
                <div class="product-badge">{PRODUCT_CATEGORY}</div>
                <img src="{PRODUCT_IMAGE}" alt="{PRODUCT_TITLE}" class="img-fluid" loading="lazy">
                <div class="product-actions">
                  <button class="action-btn wishlist-btn">
                    <i class="bi bi-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-info">
                <div class="product-category">{PRODUCT_PRICE}</div>
                <h4 class="product-name"><a href="product-details.html">{PRODUCT_TITLE}</a></h4>
              </div>
            </div>
          </div>'; 

# SQL 
$sql = "INSERT INTO `tbltemplates` (`data`,`theme`,`title`) VALUES ('{$Grid_Template}','{$Template_Theme}','{$Template_Name}');"; 

@include_once dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."module.database.php"; 
$file = dirname(__FILE__).DIRECTORY_SEPARATOR."core.database" ;
$wbulder_data = new database_manager();
$wbulder_data->override_connection($file);
$wbulder_data->query($sql);       
?> 