<?php

include_once 'Database.php';

$conn = new mysqli(HOST, USER, PASS);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS " . DB;

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
}
else {
    echo "Error creating database: " . $conn->error;
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
    echo "Tables and views created successfully.\n";
} else {
    echo "Error creating tables and views: " . $conn->error;
}

$password1 = password_hash("hellomontreal", PASSWORD_DEFAULT);
$password2 = password_hash("helloquebec", PASSWORD_DEFAULT);
$password3 = password_hash("hellocanada", PASSWORD_DEFAULT);

$sql_insert =   "INSERT INTO player(fName, lName, userName, registrationTime)
                VALUES('Patrick','Saint-Louis', 'sonic12345', NOW());

                INSERT INTO player(fName, lName, userName, registrationTime)
                VALUES('Marie','Jourdain', 'asterix2023', NOW());

                INSERT INTO player(fName, lName, userName, registrationTime)
                VALUES('Jonathan','David', 'pokemon527', NOW());

                INSERT INTO authenticator(passCode, registrationOrder)
                VALUES('$password1', 1);

                INSERT INTO authenticator(passCode, registrationOrder)
                VALUES('$password2', 2);

                INSERT INTO authenticator(passCode, registrationOrder)
                VALUES('$password3', 3);

                INSERT INTO score(scoreTime, result, livesUsed, registrationOrder)
                VALUES(NOW(), 'win', 4, 1);

                INSERT INTO score(scoreTime, result, livesUsed, registrationOrder)
                VALUES(NOW(), 'gameover', 6, 2);

                INSERT INTO score(scoreTime, result, livesUsed, registrationOrder)
                VALUES(NOW(), 'incomplete', 5, 3);";

if ($conn->multi_query($sql_insert)) {
    echo "Initial data inserted successfully.\n";
} else {
    echo "Error inserting initla data: " . $conn->error;
}

$conn->close();
?>