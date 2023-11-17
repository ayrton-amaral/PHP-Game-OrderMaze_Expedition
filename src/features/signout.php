<?php
session_start();
session_destroy();
header("Location: /php-final-project/public/form/signin-form.php");
?>
