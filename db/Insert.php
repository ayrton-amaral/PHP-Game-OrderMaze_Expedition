<?php 
include_once 'Database.php';

function createPlayer($fname, $lname, $userName, $password) {

    $mysqli = new mysqli(HOST, USER, PASS, DB);
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }
    $sqlCreateUser = "INSERT INTO player (fName, lName, userName, registrationTime) VALUES ('$fname', '$lname', '$userName', now());";
    $mysqli->query($sqlCreateUser);
    $createdId = $mysqli->insert_id;
    $passCode=password_hash($password, PASSWORD_DEFAULT);
    $mysqli->query("INSERT INTO authenticator(passCode, registrationOrder) VALUES('$passCode', $createdId)");
    $mysqli->close();

}

createPlayer("teste3","teste2", "teste5","teste2");
?>