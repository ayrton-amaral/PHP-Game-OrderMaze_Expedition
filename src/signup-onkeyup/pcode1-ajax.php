<?php
    if(isset($_GET['password'])){
        $password = $_GET['password'];

        if (strlen($password) < 8) {
            echo "Password must contain at least 8 characters.";
        } else {
            echo "";
        }
    }
?>