<?php include_once __DIR__ . '\..\..\src\features\history.php'; ?>
<html>
<head>
<?php include_once __DIR__ . '\..\template\head.php' ; ?>

<title>History</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    
    </style>
</head>
<body>
    <?php include_once __DIR__ . '\..\template\nav.php' ; ?>
    <div class="container">
        <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <h1 class="h3 mb-3 fw-normal title" >You rock!!! Congratulations! </h1>
        </div>
        <div class="col-1"></div>
        </div>
    </div>
    <div class ="stars-container">
        <i id = "stars" class="bi bi-star"></i>
        <i id = "stars" class="bi bi-star"></i>
        <i id = "stars" class="bi bi-star"></i>
        <i id = "stars" class="bi bi-star"></i>
        <i id = "stars" class="bi bi-star"></i>
    </div>


</body>
</html>
