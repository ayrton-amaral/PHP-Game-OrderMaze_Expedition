<?php
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password == $confirmPassword) {
        echo "Password and Confirm Password match!";
    } else {
        echo "Password and Confirm Password do not match!";
    }
?>
