<?php 
include_once '../../src/features/signout-timeout.php';

if(empty($_SESSION["user"])){
    header('Location: signin-form.php'); 
} else {
    $_SESSION['start'] = time(); 
    $_SESSION['expire'] = $_SESSION['start'] + (900) ;//900 = 15 minutes 
}
?>

<!-- #F7A52D  5775FF-->
<nav class="navbar navbar-expand-lg" style="background-color: #5775FF;" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" style="color: white;" href="<?= INDEX ?>">OrderMaze Expedition</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link" href="<?= MESSAGE . 'history-table.php' ?>">History</a>
                </li>
            </ul>
            <span class="navbar-text mx-4" id="showCountDownDate"></span>
            <form class="d-flex my-2 my-lg-0" role="search" action="<?=FEATURES . 'signout.php'?>" method="get">
                <button class="btn btn-sm btn-light" type="submit" style = "color:#5775FF;">Sign Out</button>
            </form>
        </div>
    </div>
</nav>

<input id="sessionExpire" type="hidden" value=<?=$_SESSION["expire"] *1000; ?>>

<script>
  var countDownDate = document.getElementById("sessionExpire").value;;
  var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("showCountDownDate").innerHTML = minutes + ":" + seconds;
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("showCountDownDate").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>