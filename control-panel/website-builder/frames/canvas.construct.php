<?php

class Canvas_construct
{
    public $database;

    public function __construct()
    {
        @include_once dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "module.database.php";
        $file = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "scripts" . DIRECTORY_SEPARATOR . "core.database";
        $wbulder_data = new database_manager();
        $wbulder_data->override_connection($file);
        $this->database = $wbulder_data;
    }

    public function create_page(){
        $template = '
        e(\'<!DOCTYPE html><html lang="en"><head>\');
         
        e(\'</head><body>\');
        e(\'<!-- Scroll Top -->
                <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
                <!-- Preloader -->
                <div id="preloader"></div>
        \');
        use_script(\'assets/vendor/bootstrap/js/bootstrap.bundle.min.js\');
        use_script(\'assets/vendor/php-email-form/validate.js\');
        use_script(\'assets/vendor/swiper/swiper-bundle.min.js\');
        use_script(\'assets/vendor/aos/aos.js\');
        use_script(\'assets/vendor/glightbox/js/glightbox.min.js\');
        use_script(\'assets/vendor/drift-zoom/Drift.min.js\');
        use_script(\'assets/vendor/purecounter/purecounter_vanilla.js\');
        use_script(\'assets/js/main.js\');
        e(\'</body></html>\');';
        return $template;
    }
}

function e($data){
    echo "\n".$data;
}

function use_script($source){
    $dir = dirname(dirname(dirname(__DIR__))).DIRECTORY_SEPARATOR."website".DIRECTORY_SEPARATOR."";
    $e = file_get_contents($dir.$source);
    e("<script>".$e."</script>");
    return $e ;
}

$e = new Canvas_construct();
eval($e->create_page());

?>