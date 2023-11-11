<?php session_start(); ?>
<html>

<head>
  <?php include_once __DIR__ . '\..\template\head.php'; ?>
  <script type="text/javascript" src="..\assets\js\main.js"></script>
  <script type="text/javascript" src="..\assets\js\signup-onkeyup\fname-ajax.js"></script>
  <script type="text/javascript" src="..\assets\js\signup-onkeyup\lname-ajax.js"></script>
  <script type="text/javascript" src="..\assets\js\signup-onkeyup\uname-ajax.js"></script>
  <script type="text/javascript" src="..\assets\js\signup-onkeyup\pcode1-ajax.js"></script>
  <script type="text/javascript" src="..\assets\js\signup-onkeyup\pcode2-ajax.js"></script>
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
        <input type="firstName" class="form-control" id="fname" name="fname" placeholder="First Name" onkeyup="ajaxFName()" value="<?= empty($_SESSION['fname']) ? "" :  $_SESSION['fname'] ?>">
        <label for="fname">First Name</label>
      </div>
      <div id="ajaxFNameMsg">
        <?php if (!empty($_SESSION["error_msg"])) { foreach ($_SESSION["error_msg"]["fname"] as $msg) { echo $msg . "<br/>";} } ?>
      </div>
      <div class="form-floating">
        <input type="lastName" class="form-control" id="lname" name="lname" placeholder="Last Name" onkeyup="ajaxLName()" value="<?= empty($_SESSION['lname']) ? "" :  $_SESSION['lname'] ?>">
        <label for="lname">Last Name</label>
      </div>
      <div id="ajaxLNameMsg">
      <?php if (!empty($_SESSION["error_msg"])) { foreach ($_SESSION["error_msg"]["lname"] as $msg) { echo $msg . "<br/>";} } ?>
      </div>
      <div class="form-floating">
        <input type="username" class="form-control" id="username" name="username" placeholder="username" onkeyup="ajaxUsername()" value="<?= empty($_SESSION['username']) ? "" :  $_SESSION['username'] ?>">
        <label for="username">Username</label>
      </div>
      <div id="ajaxUsernameMsg">
      <?php if (!empty($_SESSION["error_msg"])) { foreach ($_SESSION["error_msg"]["username"] as $msg) { echo $msg . "<br/>";} } ?>
      </div>
      <div class="form-floating">
        <input type="password1" class="form-control" id="floatingPassword" name="password" placeholder="Password" onkeyup="ajaxPassword()" value="<?= empty($_SESSION['password']) ? "" :  $_SESSION['password'] ?>">
        <label for="floatingPassword">Password</label>
      </div>
      <div id="ajaxPasswordMsg">
      <?php if (!empty($_SESSION["error_msg"])) { foreach ($_SESSION["error_msg"]["password"] as $msg) { echo $msg . "<br/>";} } ?>
      </div>
      <div class="form-floating">
        <input type="confirmpassword" class="form-control" id="floatingConfirmPassword" name="confirmPassword" placeholder="Confirm Password" onkeyup="ajaxConfirmPassword()" value="<?= empty($_SESSION['confirmPassword']) ? "" :  $_SESSION['confirmPassword'] ?>">
        <label for="floatingConfirmPassword">Confirm Password</label>
      </div>
      <div id="ajaxConfirmPasswordMsg">
      <?php if (!empty($_SESSION["error_msg"])) { foreach ($_SESSION["error_msg"]["confirmPassword"] as $msg) { echo $msg . "<br/>";} } ?>
      </div>

      <button class="btn btn-primary w-100 py-2" id="buttonSubmit" name="SEND" type="submit">Create account</button>

    </form>
    <button class="btn btn-primary w-100 py-2" onclick="window.location.href = 'signin-form.php';" id="btnLogin">Login</button>

  </main>

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