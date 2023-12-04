<?php 
include_once __DIR__ . '\..\..\db\Insert.php';

session_start();

if(!empty($_SESSION['user'])) {
    createScore("incomplete", 6 - $_SESSION['lives'], $_SESSION['user']['registrationOrder']);
    $_SESSION['gameMessage'] = "cancel";
    header("Location: /php-final-project/src/features/game.php");
    exit();
}
?>