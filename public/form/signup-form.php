<html>
<head>
    <?php include_once __DIR__ . '\..\template\head.php' ; ?>
    <script type="text/javascript" src="..\assets\js\main.js"></script>
    <script type="text/javascript" src="..\assets\js\signup-onkeyup\fname-ajax.js"></script>
    <script type="text/javascript" src="..\assets\js\signup-onkeyup\lname-ajax.js"></script>
    <script type="text/javascript" src="..\assets\js\signup-onkeyup\pcode2-ajax.js"></script>
    <title>SignUp</title>
    <style>
      body{
        background-color: #8F3AC6;
      }
    
      #buttonSubmit{
        background-color: #F7A52D;
        color:white;
        margin-top:10px;
        border: 0px;


      }
      #signUp{
        color: white;
        padding-top:30px;
      }
      .form-floating {
        padding: 5px;
      }
      #btnLogin{
        background-color: #5775FF;
        border: 0px;
      }
        
    </style>
</head>
<body>

    <main class="form-signin w-100 m-auto">
        <form>
          <h1 class="h3 mb-3 fw-normal" id="signUp">Sign Up</h1>
          <div class="form-floating">
            <input type="firstName" class="form-control" id="fname" name="fname" placeholder="First Name" onkeyup="ajaxFName()">
            <label for="fname">First Name</label>
          </div>
          <div id="ajaxFNameMsg"></div>
          <div class="form-floating">
            <input type="lastName" class="form-control" id="lname" name="lname" placeholder="Last Name" onkeyup="ajaxLName()">
            <label for="lname">Last Name</label>
          </div>
          <div id="ajaxLNameMsg"></div>
          <div class="form-floating">
            <input type="username" class="form-control" id="username" name="username" placeholder="username">
            <label for="username">Username</label>
          </div>
          <div class="form-floating">
            <input type="password1" class="form-control" id="floatingPassword" name="password" placeholder="Password" onkeyup="ajaxConfirmPassword()">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="form-floating">
            <input type="confirmpassword" class="form-control" id="floatingConfirmPassword" name="confirmPassword" placeholder="Confirm Password" onkeyup="ajaxConfirmPassword()">
            <label for="floatingConfirmPassword">Confirm Password</label>
          </div>
          <div id="ajaxConfirmPasswordMsg"></div>
      
          <button class="btn btn-primary w-100 py-2" id= "buttonSubmit" type="submit">Create account</button>

        </form>
        <button class="btn btn-primary w-100 py-2" onclick="window.location.href = 'signin-form.php';" id= "btnLogin">Login</button>

      </main>

</body>
</html>
