<?php

function import_module($string){
    $path = dirname(__FILE__).DIRECTORY_SEPARATOR.'web'.DIRECTORY_SEPARATOR.$string ;
    @include_once $path ;
}


?>