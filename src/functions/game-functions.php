<?php 
// Generate unique random letters - uppercase or lowercase decided randomly
function generateRandomLetters() {
    $isLowercase = rand(0, 1) == 1;
    $letters = $isLowercase ? range('a', 'z') : range('A', 'Z');
    $randomLetters = [];

    while (count($randomLetters) < 6) {
        $randomLetter = $letters[array_rand($letters)];

        if (!in_array($randomLetter, $randomLetters)) {
            $randomLetters[] = $randomLetter;
        }
    }

    return $randomLetters;
}

// Generate unique random numbers
function generateRandomNumbers() {
    $randomNumbers = [];

    while (count($randomNumbers) < 6) {
        $randomNumber = rand(0, 100);

        if (!in_array($randomNumber, $randomNumbers)) {
            $randomNumbers[] = $randomNumber;
        }
    }

    return $randomNumbers;
}

// Generate sequence of numbers or letters according to the level
function generateSequence($currentLevel) {

    if ($currentLevel === 1 || $currentLevel === 2 || $currentLevel === 5) {
        $generatedSequence = generateRandomLetters();
    } elseif ($currentLevel === 3 || $currentLevel === 4 || $currentLevel === 6) {
        $generatedSequence = generateRandomNumbers();
    }

    return $generatedSequence;
}

// Generate sequence of numbers or letters according to the level
function generateInstruction($currentLevel) {

    if ($currentLevel == 1 ){
        $gameInstruction = "Sort the 6 letters in Ascending Order:";
    } 
    elseif ($currentLevel == 2 ){
        $gameInstruction = "Sort the 6 letters in Descending Order:";
    }
    elseif ($currentLevel == 3 ){
        $gameInstruction = "Sort the 6 numbers in Ascending Order:";
    }
    elseif ($currentLevel == 4 ){
        $gameInstruction = "Sort the 6 numbers in Descending Order:";
    }
    elseif ($currentLevel == 5 ){
        $gameInstruction = "Insert the first and last letter in Ascending Order:";
    }
    elseif ($currentLevel == 6 ){
        $gameInstruction = "Insert the smallest and largest number in Ascending Order:";
    }

    return $gameInstruction;
}

// Function to check if two arrays are equal
function arraysEqual($arr1, $arr2) {
    return count($arr1) == count($arr2) && array_values($arr1) == array_values($arr2);
}

function incorrectAnswer($arr1, $arr2, $level) {
    $correctValues = 0;
    sort($arr1);
    sort($arr2);
    
    foreach ($arr1 as $key => $value) {

        if ($value == $arr2[$key]) {
            $correctValues++;
        }
    }

    if ($correctValues == 6 ){
        $incorrectAnswer = "Result: Incorrect. </br> Your inputs were correct, but they were not arranged in the requested order.";
    } 
    elseif ($correctValues == 0){
        $incorrectAnswer = "Result: Incorrect </br>  All of your inputs were incorrect.";
    } 
    elseif ($correctValues == 4 && ($level == 5 || $level == 6)){
        $incorrectAnswer = "Result: Incorrect </br>  All of your inputs were incorrect.";
    } 
    else {
        $incorrectAnswer = "Result: Incorrect </br>  Some of your inputs were incorrect.";
    } 

    return $incorrectAnswer;
}
?>