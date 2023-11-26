<html>

<head>
  <?php
  include_once __DIR__ . '\..\template\head.php';
  ?>
  <title>Game</title>
  <style>
    body {
      background-color: #F7A52D;
      height: 100vh;
    }
   .game-form {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin-top: 10%;
    }
    #buttonSubmit,#buttonCancel {
      background-color: #5775FF;
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
    #level{
      color: black;
    }



    </style>
</head>

<body >
  <?php include_once __DIR__ . '\..\template\nav.php'; 
      $currentLevel = $_SESSION['level'];
      $currentLives = $_SESSION['lives'];
      $generatedSequence = $_SESSION['generatedSequence'];
      $gameInstruction = $_SESSION['gameInstruction'];
    
  ?>

  <div class="container" style="margin-top: 10%;">
    <form action=<?= FEATURES . "game.php" ?> method="post">
      <div class="container text-center">
        <h1 id="level" >Level <?=$currentLevel ?></h1>  
      
        <h2 id="gameInstruction"><?=$gameInstruction ?></h1>
        <h2 id="sequence"><?php 
          foreach ($generatedSequence as $digit) {
            echo $digit . "  ";
          }
          ?></h1>
            <?php  
              if ($currentLevel == 1 || $currentLevel == 2 ||$currentLevel == 3 ||$currentLevel == 4 ){

            ?>
            <div class="row justify-content-center ">
              <div class="col-1">
                <input type="text" class="form-control form-control-lg" id="l1" maxlength="1">
              </div>
              <div class="col-1">
                <input type="text" class="form-control form-control-lg" id="l1" maxlength="1">
              </div>
              <div class="col-1">
                <input type="text" class="form-control form-control-lg" id="l1" maxlength="1">
              </div>
              <div class="col-1">
                <input type="text" class="form-control form-control-lg" id="l1" maxlength="1">
              </div>
              <div class="col-1">
                <input type="text" class="form-control form-control-lg" id="l1" maxlength="1">
              </div>
              <div class="col-1">
                <input type="text" class="form-control form-control-lg" id="l1" maxlength="1">
              </div>
            </div>
            <?php  
              }
              elseif ($currentLevel == 5 || $currentLevel == 6 ){
                
            ?>
            <div class="row justify-content-center ">
              <div class="col-1">
                <input type="text" class="form-control form-control-lg" id="l1" maxlength="1">
              </div>
              <div class="col-1">
                <input type="text" class="form-control form-control-lg" id="l1" maxlength="1">
              </div>
            </div>
            <?php  
              }
              
                
            ?>
      </div>
      <div class="container text-center">
        <div class="row justify-content-center">
          <div class="col-2">
            <button id="buttonSubmit" onclick="checkAnswer(event)">Submit answer</button>
          </div>
          <div class="col-2">
            <button id="buttonCancel" onclick="checkAnswer(event)">Cancel</button>
          </div>
      </div>
    </form>
  </div>
</body>

</html>