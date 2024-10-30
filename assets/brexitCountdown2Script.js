
// Set the date we're counting down to
var countDownDate = new Date("Oct 31, 2019 00:00:00").getTime();
//var countDownDate = new Date("dec 25, 2019 00:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
  // Set the id for timer
 // var brexitCountdown = "brexitCountdown";
  //find the offset hours for the UK time change
  var y = new Date();
  var currentOffsetInHours = y.getTimezoneOffset() / 60; 
  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60) + currentOffsetInHours);
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  
  var projectMessage = 'Brexit Countdown: ';
  //comment out the variable above and uncomment the variable below for the Xmas message and change the 'countDownDate' above.
 // var projectMessage = ' Countdown To Christmas: ';


  // Display the result in the element with id="demobrexitCountdown"
  

  document.getElementById("brexitCountdown2").innerHTML = projectMessage + ' ' + days + " days  " + (hours - currentOffsetInHours) + " hours "
  + minutes + " min " + seconds + "s ";



  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("brexitCountdown2").innerHTML = "EXPIRED";
  }
}, 1000);