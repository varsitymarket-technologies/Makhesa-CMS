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