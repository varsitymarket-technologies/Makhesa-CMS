<?php

if (isset($_COOKIE['user_code'])) {


    setcookie('user_code', "", time() - 420);
    setcookie('user_code', "", time() - 42000);
    setcookie('user_code', "", time() - 42000);
    setcookie('user_code', "", time() - 42000);
    setcookie('user_code', "", time() - 42000);

    unset($_COOKIE['user_code']);
    session_destroy();

    $e = '
<script>
if (confirm("Terminting Session") == true) {
     setTimeout(function() {
      window.location.href = "' . __PROTOCOL__ . __DOMAIN_NAME__ . '";
    }, 2000); 
} else {
    window.location.href = "' . __PROTOCOL__ . __DOMAIN_NAME__ . '"; 
}
</script>
';
    echo $e;

}
?>