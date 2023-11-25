<?php 
include_once __DIR__ . '\..\..\db\Select.php';

function getHistories(){
    $histories = getHistory();
    return $histories;
}

?>