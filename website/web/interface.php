<?php 
@include_once (dirname(dirname(dirname(__FILE__)))). DIRECTORY_SEPARATOR."control-panel".DIRECTORY_SEPARATOR."control-panel".DIRECTORY_SEPARATOR."systemctrl.php";
$page_request = map_page()[1] ;
$map_file = dirname(__FILE__).DIRECTORY_SEPARATOR."hub".DIRECTORY_SEPARATOR."production".DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."page_map.json";
$map = json_decode(file_get_contents($map_file),JSON_PRETTY_PRINT) ;

$page_construct = $map[$page_request] ; 
if (isset($map[$page_request])){
  $page_construct = dirname(__FILE__).DIRECTORY_SEPARATOR.$map[$page_request] ;
}else{
  $page_construct = dirname(__FILE__).DIRECTORY_SEPARATOR.$map["404"] ;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php @include_once "header.blade.php"; ?>
</head>
<body>
  <?php  @include_once __DIR__.DIRECTORY_SEPARATOR."hub".DIRECTORY_SEPARATOR."production".DIRECTORY_SEPARATOR."blocks".DIRECTORY_SEPARATOR."header-blade.block"; ?>

  <!-- Page Contents -->
  <?php @include_once $page_construct; ?>
  <!-- Footer Blade --> 
  <?php @include_once "footer.blade.php" ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Preloader -->
  <div id="preloader"></div>
  <?php
    #<!-- Vendor JS Files -->
    use_script('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');
    use_script('assets/vendor/php-email-form/validate.js');
    use_script('assets/vendor/swiper/swiper-bundle.min.js');
    use_script('assets/vendor/aos/aos.js');
    use_script('assets/vendor/glightbox/js/glightbox.min.js');
    use_script('assets/vendor/drift-zoom/Drift.min.js');
    use_script('assets/vendor/purecounter/purecounter_vanilla.js');

    #<!-- Main JS File -->
    use_script('assets/js/main.js');
  ?>

</body>

</html>