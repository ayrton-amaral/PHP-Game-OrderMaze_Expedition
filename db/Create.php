<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "kidsgames";

$conn = new mysqli($hostname, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $database";

if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
}
else {
    echo "Error creating database: " . $conn->error;
}

$conn->select_db($database);

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
        result ENUM('réussite', 'échec', 'incomplet'),
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

$sql_insert =   "INSERT INTO player(fName, lName, userName, registrationTime)
                VALUES('Patrick','Saint-Louis', 'sonic12345', NOW());

                INSERT INTO player(fName, lName, userName, registrationTime)
                VALUES('Marie','Jourdain', 'asterix2023', NOW());

                INSERT INTO player(fName, lName, userName, registrationTime)
                VALUES('Jonathan','David', 'pokemon527', NOW());

                INSERT INTO authenticator(passCode, registrationOrder)
                VALUES('$2y$10$AMyb4cbGSWSvEcQxt91ZVu5r5OV7/3mMZl7tn8wnZrJ1ddidYfVYW', 1);

                INSERT INTO authenticator(passCode, registrationOrder)
                VALUES('$2y$10$Lpd3JsgFW9.x2ft6Qo9h..xmtm82lmSuv/vaQKs9xPJ4rhKlMJAF.', 2);

                INSERT INTO authenticator(passCode, registrationOrder)
                VALUES('$2y$10$FRAyAIK6.TYEEmbOHF4JfeiBCdWFHcqRTILM7nF/7CPjE3dNEWj3W', 3);

                INSERT INTO score(scoreTime, result, livesUsed, registrationOrder)
                VALUES(NOW(), 'réussite', 4, 1);

                INSERT INTO score(scoreTime, result, livesUsed, registrationOrder)
                VALUES(NOW(), 'échec', 6, 2);

                INSERT INTO score(scoreTime, result, livesUsed, registrationOrder)
                VALUES(NOW(), 'incomplet', 5, 3);";

if ($conn->multi_query($sql_insert)) {
    echo "Initial data inserted successfully.\n";
} else {
    echo "Error inserting initla data: " . $conn->error;
}

$conn->close();
?>