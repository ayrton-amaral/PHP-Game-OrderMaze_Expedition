<?php 

if(isset($_GET['flname'])){
    $flname = $_GET['flname'];
    
    //pattern for Must start with a letter a-z or A-Z
    $pattern = '/^[a-zA-Z]/';
    
    if (preg_match($pattern, $flname)) {
        echo "";
    } else {
        echo "Must start with a letter a-z or A-Z";
    }
    
 }



?>