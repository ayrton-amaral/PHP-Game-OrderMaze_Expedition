<?php
include_once __DIR__ . '\..\..\db\Insert.php';

session_start();

if(!empty($_SESSION['user'])) {
    createScore("incomplete", 6 - $_SESSION['lives'], $_SESSION['user']['registrationOrder']);
}

session_destroy();

header("Location: /php-final-project/public/form/signin-form.php");
?>