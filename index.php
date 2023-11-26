<?php
session_start();
if (empty($_SESSION["user"])){
    //Redirect to the login form
    header('Location: public/form/signin-form.php'); 
}
else {
    //Redirect to the appropriate game form level
    //header('Location: public/form/game-form.php');
    header("Location: /php-final-project/src/features/game.php");
}
