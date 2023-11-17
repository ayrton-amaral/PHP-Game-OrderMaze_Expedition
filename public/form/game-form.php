<?php 
include_once '../../src/features/signout-timeout.php';
//session_start();
if(empty($_SESSION["user"])){
    header('Location: signin-form.php'); 
}
echo "Game"  . "<br>";
?>

<input id="countDownDate" type="hidden" value=<?=$_SESSION["expire"] *1000; ?>>
<p id="demo"></p>

<script>
  // Set the date we're counting down to
  var countDownDate = document.getElementById("countDownDate").value;;
  // Update the count down every 1 second
  var x = setInterval(function() {
  // Get today's date and time
  var now = new Date().getTime();
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = minutes + ":" + seconds;
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>