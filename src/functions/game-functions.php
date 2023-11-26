
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
    return count($arr1) === count($arr2) && array_values($arr1) === array_values($arr2);
}

?>
