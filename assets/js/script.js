/* globals Chart:false, feather:false */

// (function () {
//     'use strict'
  
//     feather.replace({ 'aria-hidden': 'true' })
  
//     // Graphs
//     var ctx = document.getElementById('myChart')
//     // eslint-disable-next-line no-unused-vars
//     var myChart = new Chart(ctx, {
//       type: 'line',
//       data: {
//         labels: [
//           'Sunday',
//           'Monday',
//           'Tuesday',
//           'Wednesday',
//           'Thursday',
//           'Friday',
//           'Saturday'
//         ],
//         datasets: [{
//           data: [
//             15339,
//             21345,
//             18483,
//             24003,
//             23489,
//             24092,
//             12034
//           ],
//           lineTension: 0,
//           backgroundColor: 'transparent',
//           borderColor: '#007bff',
//           borderWidth: 4,
//           pointBackgroundColor: '#007bff'
//         }]
//       },
//       options: {
//         scales: {
//           yAxes: [{
//             ticks: {
//               beginAtZero: false
//             }
//           }]
//         },
//         legend: {
//           display: false
//         }
//       }
//     })
//   })()

  window.addEventListener("scroll", function(){ 
    var header = document.querySelector("header");
    header.classList.toggle("sticky", window.scrollY > 0) 
  })

  var slideIndex = 1 ;
  showSlide(slideIndex);

  function nextslide(n){
      showSlide(slideIndex += n);
  }

  function showSlide(n){
    var i;
    var slides = document.getElementsByClassName("imgslide");

    if (n > slides.length) {
      slideIndex = 1
    }

    if (n < 1) {
      slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++){
      slides[i].style.display = "none";
    }
    slides[slideIndex - 1].style.display = "block";
  }

  

  
  