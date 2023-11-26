<?php 
    include_once __DIR__ . '\..\..\db\Select.php';
    include_once __DIR__ . '\..\..\db\Insert.php';
    if(isset($_POST["SEND"])){
        session_start();
        $errorMessages = [
            "fname" => "",
            "lname" => "",
            "username" => "",
            "password" => "",
            "confirmPassword" => "",
        ];
        $_SESSION['singup-form'] = True;
        $_SESSION['fname'] = $_POST["fname"];
        $_SESSION['lname'] = $_POST["lname"];
        $_SESSION['username'] = $_POST["username"];
        $_SESSION['password'] = $_POST["password"];
        $_SESSION['confirmPassword'] = $_POST["confirmPassword"];
    
        if(!preg_match('/^[a-zA-Z]/', $_POST["fname"])) {
            $errorMessages["fname"] = "Must start with a letter a-z or A-Z.";
        }

        if(!preg_match('/^[a-zA-Z]/', $_POST["lname"])){
            $errorMessages["lname"] = "Must start with a letter a-z or A-Z.";
        }

        if(strlen($_POST["username"]) < 8){
            $errorMessages["username"] = "Username must contain at least 8 characters.";
        }
        else {
            if(getPlayerByUserName($_POST["username"]) != null){
                $errorMessages["username"] = "Username already registered.";
            }
        }

        if(strlen($_POST["password"]) < 8){
            $errorMessages["password"] = "Password must contain at least 8 characters.";
        }

        if($_POST["confirmPassword"] != $_POST["password"]){
            $errorMessages["confirmPassword"] = "Password and Confirm Password do not match!";
        }

        //volta para formulario com mensagens de erro
        foreach($errorMessages as $error){
            if($error != ""){
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