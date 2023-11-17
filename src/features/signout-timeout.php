<?php
session_start();
$now = time();
if($now > $_SESSION['expire']) { 
    session_destroy(); 
    header("Location: /php-final-project/public/form/signin-form.php");
} 
?>
