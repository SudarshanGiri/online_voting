<?php $page='home'; include ('head.php');?>
<body>
    
  
            
    <?php include ('navbar.php');?>

    <?php include ('script.php');?>
    <div class="wrapper">
      <div class="main" >
          <div class="secure">Secured with AES-256 CBC</div>
          <div class="c0">
            Please Login to Vote
          </div>
          <div class="c1">
            <a href="voter-login.php">Login</a> 
          </div>
          <div class="c2">
            <a href="register.php">Register</a> 

          </div>
      </div>
    
    </div>

  
        
      
</body>



<script>// countdown timer
    

    
// Set the date we're counting down to
var countDownDate = new Date("Mar 30, 2021 20:52:25").getTime();

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

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";

  }
}, 1000);


</script>


</html>
