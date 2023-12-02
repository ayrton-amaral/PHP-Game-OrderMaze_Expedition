<html>
<head>
  <?php 
    include_once __DIR__ . '\..\template\head.php' ;

    session_start();

    function feedbackMessages($inputId){
      return empty($_SESSION["error_msg_pw"]) ? "" : $_SESSION["error_msg_pw"][$inputId];
    }
  ?>

  <title>Change password</title>

  <style>
    body{
        background-color: #8F3AC6;
    }

    #buttonSubmit{
        background-color: #F7A52D;
        color:white;
        margin-top:10px;
     }

     .fw-normal{
        color: white;
        padding-top:30px;
      }

      .form-floating {
        padding: 5px;
      }
      
  </style>
</head>

<body>
    <main class="form-signin w-100 m-auto">
        <form action=<?= FEATURES . "pw-update.php" ?> method="post">
          <h1 class="h3 mb-3 fw-normal" id="changePassword">Change Password</h1>
          <div class="form-floating">
            <input type="text" class="form-control" id="username" name="username" placeholder="username">
            <label for="floatingInput">Username</label>
          </div>

          <div id="ajaxUsernameMsg" class="fw-bold mx-2 ajaxValidationMsg">
            <?php echo feedbackMessages("username") ?>
          </div>

          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="New Password">
            <label for="floatingPassword">New Password</label>
          </div>

          <div id="ajaxPasswordMsg" class="fw-bold mx-2 ajaxValidationMsg">
            <?php echo feedbackMessages("password") ?>
          </div>

          <div class="form-floating">
            <input type="password" class="form-control" id="floatingConfirmPassword" name="confirmPassword" placeholder="Confirm Password">
            <label for="floatingPassword">Confirm Password</label>
          </div>
      
          <div id="ajaxConfirmPasswordMsg" class="fw-bold mx-2 ajaxValidationMsg">
            <?php echo feedbackMessages("confirmPassword") ?>
          </div>

          <button class="btn btn-primary w-100 py-2 border-0" id= "buttonSubmit" type="submit" name="send">Edit</button>

        </form>

        <button class="btn btn-primary w-100 py-2 border-0" onclick="window.location.href = 'signin-form.php';" style = "background-color: #5775FF; margin-bottom: 15px;">Login</button>
    </main>

  <script type="text/javascript" src="..\assets\js\main.js"></script>
  <script type="text/javascript" src="..\assets\js\signup-onkeyup\uname-pw-ajax.js"></script>
  <script type="text/javascript" src="..\assets\js\signup-onkeyup\pcode1-ajax.js"></script>
  <script type="text/javascript" src="..\assets\js\signup-onkeyup\pcode2-ajax.js"></script>
</body>
</html>
<?php include_once __DIR__ . '\..\template\footer.php' ; ?>
