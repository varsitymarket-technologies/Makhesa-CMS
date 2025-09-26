<?php 
#Configure Website Footer Blade 

$blade = dirname(__FILE__).DIRECTORY_SEPARATOR."hub".DIRECTORY_SEPARATOR."production".DIRECTORY_SEPARATOR."blocks".DIRECTORY_SEPARATOR."header-signature-blade.block";
if (file_exists($blade)){
    @include_once $blade; 
}

?>