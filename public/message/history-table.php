<?php include_once __DIR__ . '\..\..\src\features\history.php'; ?>
<html>
<head>
<?php include_once __DIR__ . '\..\template\head.php' ; ?>

<title>History</title>
<style>
    body {
        background-color: #8F3AC6;
    }
    
    .title {
        color: white;
        padding-top: 30px;
    }
    
    </style>
</head>
<body>
    <?php include_once __DIR__ . '\..\template\nav.php' ; ?>
    <div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <h1 class="h3 mb-3 fw-normal title" >History</h1>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Outcome of the game</th>
                <th scope="col">Number of lives used</th>
                <th scope="col">Date and time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach(getHistories() as $history) { ?>
                    <tr>
                        <th scope="row"><?php echo $history['id'] ?></th>
                        <td><?=$history['fName'] ?></td>
                        <td><?=$history['lName'] ?></td>
                        <td><?=$history['result'] ?></td>
                        <td><?=$history['livesUsed'] ?></td>
                        <td><?=$history['scoreTime'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            </table>

    </div>
    <div class="col-1"></div>
    </div>


</body>
</html>
