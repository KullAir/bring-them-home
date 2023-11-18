

let myVar = setInterval(BTHUpdateTimer, 1000);

// Set the target date and time
const targetDate = new Date('2023-10-07T06:20:00+03:00'); // 7 October 2023 06:30 AM Israel time

// Function to calculate the time difference and format it
function getTimePassed(targetDate) {
  const now = new Date();
  const timeDifference = now - targetDate ;

  if (timeDifference <= 0) {
    return "Time has passed";
  }

  const days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
  const hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((timeDifference % (1000 * 60) / 1000));

  var timeObject = {d: days, h: hours, m: minutes, s: seconds }
    
  return timeObject;
}

/*
// Get and display the time passed
const timePassed = getTimePassed(targetDate);
*/

function BTHUpdateTimer(){

  var timeObj = getTimePassed(targetDate);

  for (n in timeObj){
    if (timeObj[n] <10) timeObj[n] = "0"+timeObj[n];
  }

  document.getElementById("bth-number-secounds").innerHTML = timeObj.s;
  document.getElementById("bth-number-minutes").innerHTML = timeObj.m;
  document.getElementById("bth-number-hours").innerHTML = timeObj.h;
  document.getElementById("bth-number-days").innerHTML = timeObj.d;
}


function hideBTHDisplay(){
  
  var element = document.getElementById('bring-them-home');
  var showButton = document.getElementById('bth-show-button');

  element.style.transform = 'translateX(110%)';
  showButton.style.display = "block";

  // Set display to "none" after the animation completes
  setTimeout(function () {
    element.style.display = 'none';
    showButton.style.right = "0";
  }, 500); 
}

function showBTHDisplay(){
  var element = document.getElementById('bring-them-home');
  var showButton = document.getElementById('bth-show-button');
  
  element.style.display = 'block';
  showButton.style.right = "-3rem";

 
  
  setTimeout(function () {
     element.style.transform = 'translateX(0)';
     showButton.style.display = "none";
  }, 250); 

}


document.addEventListener("DOMContentLoaded", function() {
  var buttonHide = document.getElementById('bth-hide-button');
  
  buttonHide.addEventListener('click', function(event){
     
      hideBTHDisplay();
  });

  var buttonShow = document.getElementById('bth-show-button');
  
  buttonShow.addEventListener('click', function(event){
     
      showBTHDisplay();
  });


});


