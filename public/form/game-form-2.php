<html>

<head>
  <?php
  include_once __DIR__ . '\..\template\head.php';
  ?>
  <title>Game</title>
  <style>
    body {
      background-color: #8F3AC6;
      height: 100vh;
    }

    .game-form {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin-top: 10%;
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
    #buttonCancel {
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
  </style>
</head>

<body onload="startGame()">
  <?php include_once __DIR__ . '\..\template\nav.php'; ?>

  <div class="container" style="margin-top: 10%;">
    <form>
      <div class="container text-center">
        <h1>Level 1</h1>
        <h2>Order 6 letters in ascending order</h1>
        <h2>A - A - A - A - A - A</h1>
            
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