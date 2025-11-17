<?php 

# Receive The Authentication Code 

$authenctication_code = map_page()[3] ?? die("<script>.alert('Please Dont Jail Break Things'); </script>");
if (!isset(map_page()[3])){
    die("<script>.alert('Please Dont Jail Break Things'); </script>");
}

try {
    $scripts_file = dirname(__DIR__).DIRECTORY_SEPARATOR."executables".DIRECTORY_SEPARATOR."script.php"; 
    include_once $scripts_file; 
    $data = map_page()[3]; 
    #Generating Url Authentication Code 
    $authentication_code = substr($data,3); 
    $authentication_code = encryption_workflow_procedure("decrypt",$authentication_code,"AUTHENTICATION"); 
    #Register The User
    @register_user_code($authenctication_code);
    @register_user_code($authenctication_code);
    @register_user_code($authenctication_code);
    @register_user_code($authenctication_code);
    #$_COOKIE['user_code'] = $authentication_code; 
    setcookie('user_code', $authentication_code, time() + (86400 * 10), "/");

    $output = '
    <script>alert(`Authentication Success '.$authentication_code.'`); </script>
    '; 
    
    setcookie('user_code', $authentication_code, time() + (86400 * 10), "/");
    setcookie('user_code', $authentication_code, time() + (86400 * 10), "/");
    #echo $output;
    echo "Authenticatig Session";
    sleep(2); 
    echo '<script> window.location.href=`'.__PROTOCOL__.__DOMAIN_NAME__.'/'.__ADMIN_URL__.'/`; </script>'; 

} catch (\Throwable $th) {

    $output = '
    <div class="moadal-full-page" style="transition:none;">
        <script>error_feedback(`Error: '.$th.'`);</script>
    </div>
    '; 
    echo $output; 
}
?>