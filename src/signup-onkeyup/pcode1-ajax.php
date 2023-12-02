<?php
if(isset($_GET['text'])){
    $password = $_GET['text'];

    if (strlen($password) < 8) {
        echo "Password must contain at least 8 characters.";
    } else {
        echo "";
    }
}
?>