<?php
$password = $_GET['password'];
$confirmPassword = $_GET['confirmPassword'];

if ($password == $confirmPassword) {
    echo "";
} else {
    echo "Password and Confirm Password do not match!";
}
?>