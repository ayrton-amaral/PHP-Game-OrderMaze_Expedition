<?php
include_once 'Database.php';

$conn = new mysqli(HOST, USER, PASS);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS " . DB;

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully" . "<br>";
}
else {
    echo "Error creating database: " . $conn->error . "<br>";
}

$conn->select_db(DB);

$sql_code = "CREATE TABLE IF NOT EXISTS player (
        fName VARCHAR(50) NOT NULL,
        lName VARCHAR(50) NOT NULL,
        userName VARCHAR(20) NOT NULL UNIQUE,
        registrationTime DATETIME NOT NULL,
        id VARCHAR(200) GENERATED ALWAYS AS (CONCAT(UPPER(LEFT(fName,2)),UPPER(LEFT(lName,2)),UPPER(LEFT(userName,3)),CAST(registrationTime AS SIGNED))),
        registrationOrder INTEGER AUTO_INCREMENT,
        PRIMARY KEY (registrationOrder)
        )CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

        CREATE TABLE IF NOT EXISTS authenticator (
        passCode VARCHAR(255) NOT NULL,
        registrationOrder INTEGER,
        FOREIGN KEY (registrationOrder) REFERENCES player(registrationOrder)
        )CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

        CREATE TABLE IF NOT EXISTS score (
        scoreTime DATETIME NOT NULL,
        result ENUM('réussite', 'échec', 'incomplet', 'gameover', 'win', 'incomplete'),
        livesUsed INTEGER NOT NULL,
        registrationOrder INTEGER,
        FOREIGN KEY (registrationOrder) REFERENCES player(registrationOrder)
        )CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

        CREATE VIEW history AS
        SELECT s.scoreTime, p.id, p.fName, p.lName, s.result, s.livesUsed
        FROM player p, score s
        WHERE p.registrationOrder = s.registrationOrder;";

if ($conn->multi_query($sql_code)) {
    echo "Tables and views created successfully." . "<br>";
} else {
    echo "Error creating tables and views: " . $conn->error . "<br>";
}

$conn->close();
?>

<a href="http://localhost/php-final-project/">Go to Sign In</a>