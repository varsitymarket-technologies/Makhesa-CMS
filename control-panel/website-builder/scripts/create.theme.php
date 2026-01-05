<?php
$Template_Theme = "Oaklyn";

$interface_data = '';
$styles_data = '';
$script_data = '';
$title = '';
$decsription = ""; 
$tag_data = ""; 
$module_data = ""; 
$distributor_data = ""; 

#Example With Test Data 
$interface_data = '
<!DOCTYPE html>
<html lang="en">

<head>
  <?php @import_module("header.blade.php"); ?>
</head>
<body>
  <?php  @import_module(__DIR__.DIRECTORY_SEPARATOR."hub".DIRECTORY_SEPARATOR."production".DIRECTORY_SEPARATOR."blocks".DIRECTORY_SEPARATOR."header-blade.block"); ?>

  <!-- Page Contents -->
  <?php @import_module($page_construct); ?>
  <!-- Footer Blade --> 
  <?php @import_module("footer.blade.php")?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Preloader -->
  <div id="preloader"></div>
  <?php __import_scripts__ ?>

</body>

</html>';


$styles = ['assets/vendor/swiper/swiper-bundle.min.css','assets/vendor/bootstrap-icons/bootstrap-icons.css','assets/vendor/bootstrap/css/bootstrap.min.css','assets/css/main.css','assets/vendor/drift-zoom/drift-basic.css','assets/vendor/glightbox/css/glightbox.min.css'];
$script = [];
$tags = ['e-commerce','vm.editor'];
$modules = ['vm.editor'];

$styles_data = json_encode($styles,JSON_PRETTY_PRINT);
$script_data = json_encode($script,JSON_PRETTY_PRINT);
$title = 'testing-code';
$decsription = "This Is Us Testing The Website Preview"; 
$tag_data = json_encode($tags,JSON_PRETTY_PRINT);
$module_data = json_encode($modules,JSON_PRETTY_PRINT); 
$distributor_data = "Levidoc.Agency"; 


# SQL 
$sql = "INSERT INTO `tbltheme` 
(`interface`,`style`,`script`,`title`,`description`,`tags`,`modules`,`distrubutor`) VALUES 
('{$interface_data}','{$styles_data}','{$script_data}','{$title}','{$decsription}','{$tag_data}', '{$module_data}','{$distributor_data}');"; 

print($sql) ;
@include_once dirname(dirname(dirname(__FILE__))).DIRECTORY_SEPARATOR."module.database.php"; 
$file = dirname(__FILE__).DIRECTORY_SEPARATOR."core.database" ;
$wbulder_data = new database_manager();
$wbulder_data->override_connection($file);
$wbulder_data->query($sql);       
?> 