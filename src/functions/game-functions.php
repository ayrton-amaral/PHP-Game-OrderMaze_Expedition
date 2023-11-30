
<?php 

//generate unique random letters - uppercase or lowercase decided randomly
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

//generate unique random numbers
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



// generate sequence of numbers or letters according to the level
function generateSequence($currentLevel) {

    if ($currentLevel === 1 || $currentLevel === 2 || $currentLevel === 5) {
        $generatedSequence = generateRandomLetters();
    } elseif ($currentLevel === 3 || $currentLevel === 4 || $currentLevel === 6) {
        $generatedSequence = generateRandomNumbers();
    }

    return $generatedSequence;
}



// generate sequence of numbers or letters according to the level
function generateInstruction($currentLevel) {

    if ($currentLevel == 1 ){
        $gameInstruction = "Ascending order 6 letters:";
    } 
    elseif ($currentLevel == 2 ){
        $gameInstruction = "Descending order 6 letters:";
    }
    elseif ($currentLevel == 3 ){
        $gameInstruction = "Ascending order 6 numbers:";
    }
    elseif ($currentLevel == 4 ){
        $gameInstruction = "Descending order 6 numbers:";
    }
    elseif ($currentLevel == 5 ){
        $gameInstruction = "Identify the first and last letter:";
    }
    elseif ($currentLevel == 6 ){
        $gameInstruction = "Identify the smallest and largest number:";
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
        $incorrectAnswer = "Result: Incorrect. </br> Your letters/numbers were right, but they were not arranged in the correct order.";
    } 
    elseif ($correctValues == 0){
        $incorrectAnswer = "Result: Incorrect </br>  All your letters/numbers were different from ours.";
    } 
    elseif ($correctValues == 4 && ($level == 5 || $level == 6)){
        $incorrectAnswer = "Result: Incorrect </br>  All your letters/numbers were different from ours.";
    } 
    else {
        $incorrectAnswer = "Result: Incorrect </br>  Some of your letters/numbers were different from ours.";
    } 

    return $incorrectAnswer;

}

?>
