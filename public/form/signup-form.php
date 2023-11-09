<html>
<head>
    <?php include_once __DIR__ . '\..\template\head.php' ; ?>
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
            <input type="firstName" class="form-control" id="floatingInput" placeholder="First Name">
            <label for="floatingInput">First Name</label>
          </div>
          <div class="form-floating">
            <input type="lastName" class="form-control" id="floatingInput" placeholder="Last Name">
            <label for="floatingInput">Last Name</label>
          </div>
          <div class="form-floating">
            <input type="username" class="form-control" id="floatingInput" placeholder="username">
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating">
            <input type="password1" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          <div class="form-floating">
            <input type="confirmpassword" class="form-control" id="floatingPassword" placeholder="Confirm Password">
            <label for="floatingPassword">Confirm Password</label>
          </div>
      
          <button class="btn btn-primary w-100 py-2" id= "buttonSubmit" type="submit">Create account</button>

        </form>
        <button class="btn btn-primary w-100 py-2" onclick="window.location.href = 'signin-form.php';" id= "btnLogin">Login</button>

      </main>

</body>
</html>
