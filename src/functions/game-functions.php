
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


/*
//another way to generate random letters
function generateRandomLetters() {
    $randomLetters = [];

    while (count($randomLetters) < 6) {
        $randomLetter = chr(rand(65, 90)); // ASCII values for uppercase letters

        if (!in_array($randomLetter, $randomLetters)) {
            $randomLetters[] = $randomLetter;
        }
    }

    return $randomLetters;
}

*/
?>
