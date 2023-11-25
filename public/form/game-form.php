<html>
<head>
<?php 
include_once __DIR__ . '\..\template\head.php';
?>
 <title>Game</title>
    <style>
   .game-form {
      background-color: #8F3AC6;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
    #buttonSubmit {
      background-color: #F7A52D;
      color: white;
      margin-top: 24px;
      border: 0px;
      padding: 12px;
      font-size: 18px; 
      border-radius: 5px;
      margin-left: auto;
      margin-right: auto;
      display: block;
    }
    .form-floating {
      padding: 5px;
    }
    #displayRandom {
      font-size: 42px;
      text-align: center;
    }
    </style>
</head>
<body onload="startGame()">
  <?php include_once __DIR__ . '\..\template\nav.php' ; ?>
  <div class="game-form">
    <p id="displayRandom"></p>
        <form>
          <h1 id="level"></h1>
          <div class="form-floating">
            <input type="text">
          </div>
          <button id = "buttonSubmit" onclick="checkAnswer(event)" >Submit answer</button>
        </form>
  </div>
</body>
</html>

<script>

  let currentLevel = 1;
  let correctGenerated = [];
  let userAnswer = [];

  function startGame() {
    if (currentLevel === 1) {
      correctGenerated = generateRandomLetters(6);
      setupForm("Order 6 letters in ascending order");
    } else if (currentLevel === 2) {
      correctGenerated = generateRandomLetters(6)
      setupForm("Order 6 letters in descending order");
    } else if (currentLevel === 3) {
      correctGenerated = generateRandomNumbers(6);
      setupForm("Order 6 numbers in ascending order");
    } else if (currentLevel === 4) {
      correctGenerated = generateRandomNumbers(6)
      setupForm("Order 6 numbers in descending order");
    } else if (currentLevel === 5) {
      correctGenerated = generateRandomLetters(6);
      setupForm("Identify the first (smallest) and last letter (largest)");
    } else if (currentLevel === 6) {
      correctGenerated = generateRandomNumbers(6);
      setupForm("Identify the smallest and largest number");
    }
    displayRandom();
    showInputFields();
  }
  // change the statement of the question each level
  function setupForm(title) {
        document.getElementById("level").textContent = title;
  }

  //show input fields according to the level
  function showInputFields() {
        const inputFields = document.querySelector(".form-floating");
        inputFields.innerHTML = '';

        if (currentLevel === 5 || currentLevel === 6) {
            for (let i = 0; i < 2; i++) {
                const input = document.createElement("input");
                input.type = "text";
                input.classList.add("input-field");
                inputFields.appendChild(input);
            }
        } else {
            for (let i = 0; i < 6; i++) {
                const input = document.createElement("input");
                input.type = "text";
                input.classList.add("input-field");
                inputFields.appendChild(input);
            }
        }
  }

  function generateRandomNumbers(length) {
    let sequence = [];
    while (sequence.length < length) {
      // random numbers from 0 to 100
        const randomNumber = Math.floor(Math.random() * 101); 
        // check if the random number already exists
        if (!sequence.includes(randomNumber)) {
            sequence.push(randomNumber);
        }
    }
    return sequence;
  }

  function generateRandomLetters(length) {
    // random will decide if it will have uppercase or lowercase
    const useUppercase = Math.round(Math.random()) === 0;
    // if 1 will give uppercase, if 0 lowercase
    const characters = useUppercase ? 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' : 'abcdefghijklmnopqrstuvwxyz';
    
    let sequence = [];
    while (sequence.length < length) {
        const randomIndex = Math.floor(Math.random() * characters.length);
        const randomChar = characters[randomIndex];
        // check if the random letter already exists
        if (!sequence.includes(randomChar)) {
            sequence.push(randomChar);
        }
    }
    return sequence;
  }
  //display random numbers or letters
  function displayRandom() {
        const displayElement = document.getElementById("displayRandom");
        displayElement.textContent = correctGenerated.join(' ');
  }
  
  //check the answers received from user
  function checkAnswer() {
    event.preventDefault();
    const inputFields = document.querySelectorAll(".input-field");
    userSequence = Array.from(inputFields).map(input => input.value);

    if (currentLevel === 1) {
       // ascending order
       correctGenerated.sort();
    } else if (currentLevel === 2) {
      //descending order
      correctGenerated.sort().reverse();
    }else if (currentLevel === 3) {
    // ascending order for numbers
    correctGenerated = correctGenerated.sort((a, b) => a - b);
    } else if (currentLevel === 4) {
    // descending order for numbers
    correctGenerated = correctGenerated.sort((a, b) => b - a);
    } else if (currentLevel === 5) {
      // sorting and getting the first and last letter of the array
      correctGenerated = correctGenerated.sort();
      correctGenerated = [correctGenerated[0], correctGenerated[correctGenerated.length - 1]];

    } else if (currentLevel === 6) {
      correctGenerated = [Math.min(...correctGenerated), Math.max(...correctGenerated)];
    }

    const elementType = typeof correctGenerated[0];

    if (elementType === 'number') {
    // convert user input to numbers to compare with the random array of numbers
    userSequence = userSequence.map(value => Number(value));
    }

    if (arraysEqual(correctGenerated, userSequence)) {
      currentLevel++;
      alert("Correct!");
      if (currentLevel <= 6) {
        startGame();
      } else {
        alert("You completed all levels! Game Over.");
      }
    }
    else {
      alert("Incorrect! Game Over.");
    }
}
//compare the array received from user with the correct answer
function arraysEqual(arr1, arr2) {
        return arr1.length === arr2.length && arr1.every((value, index) => value === arr2[index]);
}
</script>