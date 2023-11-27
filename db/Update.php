<?php
    include_once 'Database.php';

    function updatePassword($password, $registrationOrder) {

        $mysqli = new mysqli(HOST, USER, PASS, DB);
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sqlUpdatePassword = "UPDATE authenticator SET passCode='$password' WHERE registrationOrder=$registrationOrder;";
        $mysqli->query($sqlUpdatePassword);
        $mysqli->close();
    }

?>