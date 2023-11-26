<?php 
include_once __DIR__ . '\..\functions\game-functions.php';

session_start();

if(isset($_POST["send"])){

    $currentLevel = $_SESSION['level'];
    $currentLives = $_SESSION['lives'];
    $correctAnswer = $_SESSION['generatedSequence'];
    $userAnswer = $_SESSION['userAnswer'];


    //generate the correct answer for each level
    if ($currentLevel == 1 || $currentLevel == 3) {
        // Ascending order for numbers or letters
        sort($correctAnswer);
    } elseif ($currentLevel == 2 || $currentLevel == 4) {
        // Descending order for numbers or letters
        rsort($correctAnswer);
    } elseif ($currentLevel == 5 || $currentLevel == 6) {
        // Identify the smallest and largest number
        sort($correctAnswer);
        $correctAnswer = [min($correctAnswer), max($correctAnswer)];
    }

    //compare the correct answer with the user answer and treats it
    if (arraysEqual($correctAnswer, $userAnswer)) {
        $currentLevel++;
        echo "Correct!";

        if ($currentLevel <= 6) {
            //startGame();
            $_SESSION['level'] = $currentLevel;
            $_SESSION['generatedSequence'] = generateSequence($currentLevel);
            header("Location: /php-final-project/public/form/game-form.php");
            exit();
        } else {
            echo "You completed all levels! Congratulations.";
            header("Location: /php-final-project/public/public/message/game-won.php");
            exit();
        }
    } 
    else {
        $currentLives--;
        echo "Incorrect!";

        if ($currentLives > 0) {
            //startGame();
            $_SESSION['level'] = $currentLevel;
            $_SESSION['generatedSequence'] = generateSequence($currentLevel);
            $_SESSION['lives'] = $currentLives;
            header("Location: /php-final-project/public/form/game-form.php");
            exit();
        } else {
            echo "You've spent all your lives. Game over.";
            header("Location: /php-final-project/public/public/message/game-over.php");
            exit();
        }
    }


} 
else {

    $currentLevel = 1;
    $currentLives = 6;

    $_SESSION['level'] = $currentLevel;
    $_SESSION['generatedSequence'] = generateSequence($currentLevel);
    $_SESSION['lives'] = $currentLives;

    header("Location: /php-final-project/public/form/game-form.php");
    exit();

}


function generateSequence($currentLevel) {
    //global $currentLevel, $generatedSequence;

    if ($currentLevel === 1 || $currentLevel === 2 || $currentLevel === 5) {
        $generatedSequence = generateRandomLetters();
    } elseif ($currentLevel === 3 || $currentLevel === 4 || $currentLevel === 6) {
        $generatedSequence = generateRandomNumbers();
    }

    return $generatedSequence;
}


?>