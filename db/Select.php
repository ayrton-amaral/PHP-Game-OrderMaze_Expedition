<?php 
include_once 'Database.php';

function getAllPlayers(){
    $mysqli = new mysqli(HOST, USER, PASS, DB);

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    $result = $mysqli->query("SELECT * FROM player");

    // Associative array
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    // Free result set
    $result->free_result();
    $mysqli->close();

    return $rows;
}

function getPlayerByUserName($username){
    $mysqli = new mysqli(HOST, USER, PASS, DB);
    $result = $mysqli->query("SELECT * FROM player where username = '$username'");

    // Associative array
    $rows = $result->fetch_assoc();

    // Free result set
    $result->free_result();
    $mysqli->close();

    return $rows;
}

function getPassCode($registrationOrder){
    $mysqli = new mysqli(HOST, USER, PASS, DB);
    $result = $mysqli->query("SELECT * FROM authenticator where registrationOrder = $registrationOrder");

    // Associative array
    $rows = $result->fetch_assoc();

    // Free result set
    $result->free_result();
    $mysqli->close();

    return $rows;
}

function getHistory(){
    $mysqli = new mysqli(HOST, USER, PASS, DB);

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    $result = $mysqli->query("SELECT * FROM history order by scoreTime desc");

    // Associative array
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    // Free result set
    $result->free_result();
    $mysqli->close();
    
    return $rows;
}
?>
