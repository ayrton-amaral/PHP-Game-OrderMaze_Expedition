<?php
  $fname = "";
  $lname = "";
  $username = "";
  $password = "";
  $confirmPassword = ""; 
  session_start(); 
  if(!empty($_SESSION['singup-form']) && $_SESSION['singup-form'] == true)
  {
    $fname = empty($_SESSION['fname']) ? "" :  $_SESSION['fname'];
    $lname = empty($_SESSION['lname']) ? "" :  $_SESSION['lname'];
    $username = empty($_SESSION['username']) ? "" :  $_SESSION['username'];
    $password = empty($_SESSION['password']) ? "" :  $_SESSION['password'];
    $confirmPassword = empty($_SESSION['fname']) ? "" :  $_SESSION['confirmPassword'];
  }

  
  function feedbackMessages($inputId){
    return empty($_SESSION["error_msg"]) ? "" : $_SESSION["error_msg"][$inputId];
  }
  
  function inputStatus($inputId){
    $status = "";
    if(!empty($_SESSION["error_msg"])){
      $status = $_SESSION["error_msg"][$inputId] == "" ? "is-valid" : "is-invalid";
    }
    return $status;
  }

?>
<html>

<head>
  <?php include_once __DIR__ . '\..\template\head.php'; ?>
  <title>SignUp</title>
  <style>
    body {
      background-color: #8F3AC6;
    }

    #buttonSubmit {
      background-color: #F7A52D;
      color: white;
      margin-top: 10px;
      border: 0px;
    }

    #signUp {
      color: white;
      padding-top: 30px;
    }

    .form-floating {
      padding: 5px;
    }

    #btnLogin {
      background-color: #5775FF;
      border: 0px;
    }
  </style>
</head>

<body>

  <main class="form-signin w-100 m-auto">

    <form action=<?= FEATURES . "signup.php" ?> method="post">
      <h1 class="h3 mb-3 fw-normal" id="signUp">Sign Up</h1>
      <div class="form-floating">
        <input type="firstName" class="form-control <?=inputStatus("fname") ?>" id="fname" name="fname" placeholder="First Name" value="<?=$fname?>">
        <label for="fname">First Name</label>
      </div>
      
      <div id="ajaxFNameMsg" class="text-light fw-bold mx-2">
          <?php echo feedbackMessages("fname") ?>
      </div>
      
      <div class="form-floating">
        <input type="lastName" class="form-control <?=inputStatus("lname") ?>" id="lname" name="lname" placeholder="Last Name" value="<?=$lname?>">
        <label for="lname">Last Name</label>
      </div>
      
      <div id="ajaxLNameMsg" class="text-light fw-bold mx-2">
      <?php echo feedbackMessages("lname") ?>
      </div>
      
      <div class="form-floating">
        <input type="username" class="form-control <?=inputStatus("username") ?>" id="username" name="username" placeholder="username" value="<?=$username?>">
        <label for="username">Username</label>
      </div>
      
      <div id="ajaxUsernameMsg" class="text-light fw-bold mx-2">
      <?php echo feedbackMessages("username") ?>
      </div>
      
      <div class="form-floating">
        <input type="password" class="form-control <?=inputStatus("password") ?>" id="floatingPassword" name="password" placeholder="Password" value="<?=$password?>">
        <label for="floatingPassword">Password</label>
      </div>
      
      <div id="ajaxPasswordMsg" class="text-light fw-bold mx-2">
      <?php echo feedbackMessages("password") ?>
      </div>
      
      <div class="form-floating">
        <input type="password" class="form-control <?=inputStatus("confirmPassword") ?>" id="floatingConfirmPassword" name="confirmPassword" placeholder="Confirm Password" value="<?=$confirmPassword?>">
        <label for="floatingConfirmPassword">Confirm Password</label>
      </div>
      
      <div id="ajaxConfirmPasswordMsg" class="text-light fw-bold mx-2">
      <?php echo feedbackMessages("confirmPassword") ?>
      </div>

      <button class="btn btn-primary w-100 py-2" id="buttonSubmit" name="SEND" type="submit">Create account</button>

    </form>
    <button class="btn btn-primary w-100 py-2" onclick="window.location.href = 'signin-form.php';" id="btnLogin">Login</button>

  </main>

  <script type="text/javascript" src="..\assets\js\main.js"></script>
  <script type="text/javascript" src="..\assets\js\signup-onkeyup\fname-ajax.js"></script>
  <script type="text/javascript" src="..\assets\js\signup-onkeyup\lname-ajax.js"></script>
  <script type="text/javascript" src="..\assets\js\signup-onkeyup\uname-ajax.js"></script>
  <script type="text/javascript" src="..\assets\js\signup-onkeyup\pcode1-ajax.js"></script>
  <script type="text/javascript" src="..\assets\js\signup-onkeyup\pcode2-ajax.js"></script>
</body>

</html>
<?php
  if (!empty($_SESSION["error_msg"])) { unset($_SESSION['error_msg']);}
  if (!empty($_SESSION["fname"])) { unset($_SESSION['fname']);}
  if (!empty($_SESSION["lname"])) { unset($_SESSION['lname']);}
  if (!empty($_SESSION["username"])) { unset($_SESSION['username']);}
  if (!empty($_SESSION["password"])) { unset($_SESSION['password']);}
  if (!empty($_SESSION["confirmPassword"])) { unset($_SESSION['confirmPassword']);}
?>