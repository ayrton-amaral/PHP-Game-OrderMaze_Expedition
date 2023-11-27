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
    }
    .buttonSubmit{
      background-color: #5775FF;
      color: white;
      margin-top: 26px;
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
    .buttonCancel {
      background-color: #5775FF;
      color: white;
      margin-top: 24px;
      border: 0px;
      padding: 12px;
      font-size: 18px; 
      border-radius: 5px;
      position: fixed;
      bottom: 0;
      right: 0;
      margin-right: 80px;
      margin-bottom: 20px;
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
    <div class="d-flex flex-row-reverse my-4">
      <div class="toast align-items-center border-0 show" 
        style="background-color: #8F3AC6; color:white"  
        role="alert" aria-live="assertive" 
        aria-atomic="true" id="myToast">
        <div class="d-flex">
          <div class="toast-body"><?=$gameMessage ?></div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    </div>
  </div>
  <div class="container" style="margin-top: 5%;">
    <form id="game" action=<?= FEATURES . "game.php" ?> method="post">
      <div class="container text-center">
        <h1 id="level" >Level <?=$currentLevel ?></h1>  
        <h2 id="gameInstruction" style = "margin-bottom:3%;"><?=$gameInstruction ?></h1>
        <h2 id="sequence"><?php foreach ($generatedSequence as $digit) { echo $digit . "  ";}?></h2>
            <?php  
              if ($currentLevel == 1 || $currentLevel == 2 ||$currentLevel == 3 ||$currentLevel == 4 ){

            ?>
            <div class="row justify-content-center ">
              <div class="col-md-1 col-sm-2">
                <input type="text" class="form-control form-control-lg" name="l1" id="l1" maxlength="3">
              </div>
              <div class="col-md-1 col-sm-2">
                <input type="text" class="form-control form-control-lg" name="l2" id="l2" maxlength="3">
              </div>
              <div class="col-md-1 col-sm-2">
                <input type="text" class="form-control form-control-lg" name="l3" id="l3" maxlength="3">
              </div>
              <div class="col-md-1 col-sm-2">
                <input type="text" class="form-control form-control-lg" name="l4" id="l4" maxlength="3">
              </div>
              <div class="col-md-1 col-sm-2">
                <input type="text" class="form-control form-control-lg" name="l5" id="l5" maxlength="3">
              </div>
              <div class="col-md-1 col-sm-2">
                <input type="text" class="form-control form-control-lg" name="l6" id="l6" maxlength="3">
              </div>
            </div>
            <?php  
              }
              elseif ($currentLevel == 5 || $currentLevel == 6 ){
                
            ?>
            <div class="row justify-content-center ">
              <div class="col-md-1 col-sm-2">
                <input type="text" class="form-control form-control-lg"  name="l1" id="l1" maxlength="3">
              </div>
              <div class="col-md-1 col-sm-2">
                <input type="text" class="form-control form-control-lg"  name="l2" id="l2" maxlength="3">
              </div>
            </div>
            <?php  
              }
              
                
            ?>
      </div>
      
        <div class="row justify-content-center">
          <div class="col-md-2 col-sm-10">
            <button id="game" class="buttonSubmit" type="submit" name="send">Submit answer</button>
          </div>
        </div>
          <div class="col-md-2 col-sm-10">
            <form id="cancel" method="get">
              <button id="cancel" class="buttonCancel" type="submit" name="cancel" formaction="<?= FEATURES . "cancel.php" ?>">Cancel</button>
            </form>
          </div>
   
   
      
    </form>
    <script>
      function hideToast(){
        document.getElementById("myToast").classList.remove("show");
      }
      setTimeout(function() { hideToast(); }, 5000);
    </script>
</body>

</html>