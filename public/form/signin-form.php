<?php session_start(); ?>

<html>
<head>
  <?php include_once __DIR__ . '\..\template\head.php'; ?>

  <title>SignIn</title>

  <style>
    body{
      background-color: #5775FF;
    }

    .display-5{
      color:white;
      margin-bottom:0!important;
    }
    
    .form-floating {
      padding: 5px;
    }

    #buttonSubmit {
      background-color: #F7A52D;
      color:white;
      margin-top:10px;
    }

    .fw-normal{
      color: white;
    }
    
    #buttonRegister{
      background-color: #8F3AC6;
    }
   
  </style>
</head>

<body>
  
  <img src="..\assets\img\Logo for OrderMaze Expedition.png" alt="OrderMaze Expedition logo" class = "logo">
 
  <h1 class="display-5 text-center">Let's play!</h1>

    <main class="form-signin w-100 m-auto">
        <form action=<?= FEATURES . "signin.php" ?> method="post">
          <h1 class="h3 mb-3 fw-normal" id="signIn">Please sign in</h1>
      
          <div class="form-floating">
            <input type="username" class="form-control" id="floatingInput" placeholder="Username" name="username" value="<?= empty($_SESSION['username']) ? "" :  $_SESSION['username'] ?>">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" value="<?= empty($_SESSION['password']) ? "" :  $_SESSION['password'] ?>">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="fw-bold mx-2" style="color: #FBBE62">
            <?php if (!empty($_SESSION["signin_error_msg"])) { echo $_SESSION["signin_error_msg"] . "<br/>";} ?>
          </div>
      
          <button class="btn btn-primary w-100 py-2 border-0" id="buttonSubmit" type="submit"  name="send">Sign in</button>

        </form>
        <button class="btn btn-primary w-100 py-2 border-0" id= "buttonRegister" onclick="window.location.href = 'signup-form.php';">Register</button>

      </main>
      <div class="d-flex justify-content-center forgotPass">
        <a href="pw-update-form.php" class="h6">Forgot password?</a>
    </div>
</body>
</html>
<?php include_once __DIR__ . '\..\template\footer.php' ; ?>

<?php
  if (!empty($_SESSION["signin_error_msg"])) { unset($_SESSION['signin_error_msg']);}
  if (!empty($_SESSION["username"])) { unset($_SESSION['username']);}
  if (!empty($_SESSION["password"])) { unset($_SESSION['password']);}
?>