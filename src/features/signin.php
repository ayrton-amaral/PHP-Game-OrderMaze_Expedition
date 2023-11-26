<?php
include_once __DIR__ . '\..\..\db\Select.php';
if(isset($_POST["send"])){
    session_start();
    $errorMessages = "";

    $_SESSION['username'] = $_POST["username"];

    if(strlen($_POST["username"]) == 0){
        $errorMessages = "Username is required.";
    }
    else {
        $user = getPlayerByUserName($_POST["username"]);
        if($user == null){
            $errorMessages = "Username not found.";
        } else {
            var_dump($user);
            $authenticator = getPassCode($user["registrationOrder"]);
            echo "<br/>";
            var_dump($authenticator);
            if($authenticator == null){
                $errorMessages = "Invalid password.";
            } else {
                if(!password_verify($_POST["password"],  $authenticator["passCode"])){
                    $errorMessages = "Invalid password.";
                } else {
                    $_SESSION['user'] = $user;
                    $_SESSION['start'] = time(); 
                    //900 = 15 minutes 
                    $_SESSION['expire'] = $_SESSION['start'] + (900) ;
                    header("Location: /php-final-project/src/features/game.php");
                    //header("Location: /php-final-project/public/form/game-form.php");
                    exit();
                }
            }
        }
    }

    if(strlen($errorMessages) > 0){
        $_SESSION['singin_error_msg'] = $errorMessages;
        header("Location: /php-final-project/public/form/signin-form.php");
        exit();
    }

}

?>