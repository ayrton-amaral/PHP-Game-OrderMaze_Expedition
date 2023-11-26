
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

// Function to check if two arrays are equal
function arraysEqual($arr1, $arr2) {
    return count($arr1) == count($arr2) && array_values($arr1) == array_values($arr2);
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
function generateMessage($currentLevel) {

    if ($currentLevel == 1 ){
        $gameInstruction = "Order 6 letters in ascending order:";
    } 
    elseif ($currentLevel == 2 ){
        $gameInstruction = "Order 6 letters in descending order:";
    }
    elseif ($currentLevel == 3 ){
        $gameInstruction = "Order 6 numbers in ascending order:";
    }
    elseif ($currentLevel == 4 ){
        $gameInstruction = "Order 6 numbers in descending order:";
    }
    elseif ($currentLevel == 5 ){
        $gameInstruction = "Identify the first (smallest) and last letter (largest):";
    }
    elseif ($currentLevel == 6 ){
        $gameInstruction = "Identify the smallest and largest number:";
    }

    return $gameInstruction;
}



?>
