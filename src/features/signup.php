<?php 
    include_once __DIR__ . '\..\..\db\Select.php';
    include_once __DIR__ . '\..\..\db\Insert.php';
    if(isset($_POST["SEND"])){
        session_start();
        $errorMessages = [
            "fname" => array(),
            "lname" => array(),
            "username" => array(),
            "password" => array(),
            "confirmPassword" => array(),
        ];
        $_SESSION['singup-form'] = True;
        $_SESSION['fname'] = $_POST["fname"];
        $_SESSION['lname'] = $_POST["lname"];
        $_SESSION['username'] = $_POST["username"];
        $_SESSION['password'] = $_POST["password"];
        $_SESSION['confirmPassword'] = $_POST["confirmPassword"];
    
        if(strlen($_POST["fname"]) == 0){
            array_push($errorMessages["fname"], "First name is required.");
        }
        else if(!preg_match('/^[a-zA-Z]/', $_POST["fname"])) {
            array_push($errorMessages["fname"], "First name Must start with a letter a-z or A-Z.");
        }

        if(strlen($_POST["lname"]) == 0){
            array_push($errorMessages["lname"], "Last name is required.");
        }
        else if(!preg_match('/^[a-zA-Z]/', $_POST["lname"])){
            array_push($errorMessages["lname"], "Last name Must start with a letter a-z or A-Z.");
        }

        if(strlen($_POST["username"]) < 8){
            array_push($errorMessages["username"], "Username must contain at least 8 characters.");
        }
        else {
            if(getPlayerByUserName($_POST["username"]) != null){
                array_push($errorMessages["username"], "Username already registered.");
            }
        }

        if(strlen($_POST["password"]) < 8){
            array_push($errorMessages["password"], "Password must contain at least 8 characters.");
        }

        if($_POST["confirmPassword"] != $_POST["password"]){
            array_push($errorMessages["confirmPassword"], "Password and Confirm Password do not match!");
        }

        //volta para formulario com mensagens de erro
        foreach($errorMessages as $error){
            if(count($error) > 0){
                $_SESSION['error_msg'] = $errorMessages;
                header("Location: /php-final-project/public/form/signup-form.php");
                exit();
            }
        }

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        createPlayer($fname,$lname,$username,$password);
        header("Location: /php-final-project/public/form/signin-form.php");
        exit();

    }

?>