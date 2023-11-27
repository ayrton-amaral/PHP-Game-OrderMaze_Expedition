<?php
    include_once __DIR__ . '\..\..\db\Select.php';
    include_once __DIR__ . '\..\..\db\Update.php';

    if(isset($_POST["send"])){
        session_start();

        $errorMessages = [
            "username" => "",
            "password" => "",
            "confirmPassword" => "",
        ];

        $_SESSION['pw-update-form'] = True;
        $_SESSION['username'] = $_POST["username"];
        $_SESSION['password'] = $_POST["password"];
        $_SESSION['confirmPassword'] = $_POST["confirmPassword"];

        if(strlen($_POST["username"]) < 8) {
            $errorMessages["username"] = "Username must contain at least 8 characters.";
        }
        else {
            if(getPlayerByUserName($_POST["username"]) == null){
                $errorMessages["username"] = "Username not registered.";
            }
        }

        if(strlen($_POST["password"]) < 8){
            $errorMessages["password"] = "Password must contain at least 8 characters.";
        }

        if($_POST["confirmPassword"] != $_POST["password"]){
            $errorMessages["confirmPassword"] = "Password and Confirm Password do not match!";
        
        }

        foreach($errorMessages as $error){
            if($error != ""){
                $_SESSION['error_msg_pw'] = $errorMessages;
                header("Location: /php-final-project/public/form/pw-update-form.php");
                exit();
            }
        }
        
        $playerFound = getPlayerByUserName($_POST["username"]);
        updatePassword($_POST["password"], $playerFound['registrationOrder']);

        header("Location: /php-final-project/public/form/signin-form.php");
        exit();
    }
?>