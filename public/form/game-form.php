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
    .buttonSubmit,.buttonCancel {
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
    #message {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin-top: 3%;
      font-size: 24px; 
      font-weight: bold;
      color: #8F3AC6;
    }


    </style>
</head>

<body >
  <?php include_once __DIR__ . '\..\template\nav.php'; 
      $currentLevel = $_SESSION['level'];
      $currentLives = $_SESSION['lives'];
      $generatedSequence = $_SESSION['generatedSequence'];
      $gameInstruction = $_SESSION['gameInstruction'];
      $gameMessage = empty($_SESSION['gameMessage']) ? "" : $_SESSION['gameMessage'];
    
  ?>

  <div class="container">
    <div class="d-flex flex-row-reverse my-4">
      <h4>
        <?php for($i=0; $i<6; $i++) {
          if($i < $currentLives) {
            echo '<i class="bi bi-heart-fill mx-1" style="color: #8F3AC6"></i>';
          } else {
            echo '<i class="bi bi-heart mx-1" style="color: #8F3AC6"></i>';
          }
        }?>

      </h4>
    </div>
  </div>
  <p id="message"><?=$gameMessage ?></p>
  <div class="container" style="margin-top: 10%;">
    <form id="game" action=<?= FEATURES . "game.php" ?> method="post">
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
                <input type="text" class="form-control form-control-lg" name="l1" id="l1" maxlength="3">
              </div>
              <div class="col-1">
                <input type="text" class="form-control form-control-lg" name="l2" id="l2" maxlength="3">
              </div>
              <div class="col-1">
                <input type="text" class="form-control form-control-lg" name="l3" id="l3" maxlength="3">
              </div>
              <div class="col-1">
                <input type="text" class="form-control form-control-lg" name="l4" id="l4" maxlength="3">
              </div>
              <div class="col-1">
                <input type="text" class="form-control form-control-lg" name="l5" id="l5" maxlength="3">
              </div>
              <div class="col-1">
                <input type="text" class="form-control form-control-lg" name="l6" id="l6" maxlength="3">
              </div>
            </div>
            <?php  
              }
              elseif ($currentLevel == 5 || $currentLevel == 6 ){
                
            ?>
            <div class="row justify-content-center ">
              <div class="col-1">
                <input type="text" class="form-control form-control-lg"  name="l1" id="l1" maxlength="3">
              </div>
              <div class="col-1">
                <input type="text" class="form-control form-control-lg"  name="l2" id="l2" maxlength="3">
              </div>
            </div>
            <?php  
              }
              
                
            ?>
      </div>
      <div class="container text-center">
        <div class="row justify-content-center">
          <div class="col-2">
            <button id="game" class="buttonSubmit" type="submit" name="send">Submit answer</button>
          </div>
          <div class="col-2">
            <form id="cancel" method="get">
              <button id="cancel" class="buttonCancel" type="submit" name="cancel" formaction="<?= FEATURES . "cancel.php" ?>">Cancel</button>
            </form>
          </div>
      </div>
    </div>
      
    </form>
</body>

</html>