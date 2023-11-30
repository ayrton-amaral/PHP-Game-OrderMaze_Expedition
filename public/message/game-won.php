<?php include_once __DIR__ . '\..\..\src\features\history.php'; ?>
<html>
<head>
<?php include_once __DIR__ . '\..\template\head.php' ; ?>

<title>History</title>
<style>
    body {
        background-color: #F7A52D;
    }
    
    .title {
        display: flex;
        justify-content: center;
        align-items: center;
        color: #E5E5E5;
        font-size: 42px;
        padding-top: 25%;
    }
    #stars {
        color: white;
        font-size: 24px; 
        padding:5px;
        
    }
    .stars-container{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #playAgain{
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
    a {
            text-decoration: none;
    }
    
    </style>
</head>
<body>
    <?php include_once __DIR__ . '\..\template\nav.php' ; ?>
    <div class="container">
        <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h1 class="h3 mb-3 fw-normal title" >You rock! Congratulations! </h1>
        </div>
        <div class="col-1"></div>
        </div>
    </div>
    <div class ="stars-container">
        <i id = "stars" class="bi bi-star-fill"></i>
        <i id = "stars" class="bi bi-star-fill"></i>
        <i id = "stars" class="bi bi-star-fill"></i>
        <i id = "stars" class="bi bi-star-fill"></i>
        <i id = "stars" class="bi bi-star-fill"></i>
    </div>
    <div>
        <a href="<?= INDEX ?>">
            <button id="playAgain">Play Again!</button>
        </a>
    </div>

</body>
</html>
