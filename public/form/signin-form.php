<html>
  <head>
  <?php
  include_once __DIR__ . '\..\template\head.php' ;
  ?>

      <title>SignIn</title>
      <style>
        body{
          background-color: #5775FF;
        }
        #title{
          padding:30px;
          color:white;
        }
        #changePassword{
          padding-top:5px;
          text-align: center;
          color: white;
        }
        .form-floating {
          padding: 5px;
        }
        #buttonSubmit {
          background-color: #F7A52D;
          color:white;
          margin-top:10px;
          border: 0px;
        }
        #signIn{
          color: white;
          border: 0px;
        }
        #buttonRegister{
          background-color: #8F3AC6;
        }
      </style>
  </head>
  <body>
      <h1 class="display-3 text-center" id="title">Let's play xx!</h1>

      <main class="form-signin w-100 m-auto">
          <form>
            <h1 class="h3 mb-3 fw-normal" id="signIn">Please sign in</h1>
        
            <div class="form-floating">
              <input type="username" class="form-control" id="floatingInput" placeholder="Username">
              <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
              <input type="password1" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
            </div>
        
            <button class="btn btn-primary w-100 py-2" id= "buttonSubmit"type="submit">Sign in</button>

          </form>
          <button class="btn btn-primary w-100 py-2" id= "buttonRegister" onclick="window.location.href = 'signup-form.php';">Register</button>

        </main>
        <div class="d-flex justify-content-center">
          <a href="pw-update-form.php" class="h6" id="changePassword">Forgot password?</a>
      </div>

  </body>
  </html>
