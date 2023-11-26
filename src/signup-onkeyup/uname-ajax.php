<?php 
include_once __DIR__ . '\..\..\db\Select.php';
if(isset($_GET['text'])){
    $username = $_GET['text'];
    
    if (strlen($username) < 8) {
        echo "Username must contain at least 8 characters.";
    } else {
        $resultList = getPlayerByUserName($username);
        if($resultList != null){
            echo "Username already registered";
        }
        else {
            echo "";
        }
    }
    
 }
