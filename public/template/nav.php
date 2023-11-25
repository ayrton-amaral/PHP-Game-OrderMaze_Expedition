<?php 
include_once '../../src/features/signout-timeout.php';
if(empty($_SESSION["user"])){
    header('Location: signin-form.php'); 
} else {
    $_SESSION['start'] = time(); 
    $_SESSION['expire'] = $_SESSION['start'] + (900) ;//900 = 15 minutes 
}
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= INDEX ?>">Kids Games</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link" href="<?= MESSAGE . 'history-table.php' ?>">History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
            </ul>
            <span class="navbar-text mx-2" id="showCountDownDate"></span>
            <form class="d-flex my-2 my-lg-0" role="search" action="<?=FEATURES . 'signout.php'?>" method="get">
                <button class="btn btn-sm btn-outline-secondary" type="submit">Sign Out</button>
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