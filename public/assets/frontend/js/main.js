// navbar

window.addEventListener('scroll',_ => {
    if(scrollY > 200){
        document.getElementById("navbar").classList.remove('bg-white');
        document.getElementById("navbar").classList.add('bg-primary');
        document.querySelector(".navbar-toggler").style.color = "#fff";
        Array.from(document.querySelectorAll('.nav-link')).forEach(link => {
            link.style.color = "#fff"
        })
        document.querySelector(".navbar-brand").style.color = "#fff"
    }
    else{
        document.getElementById("navbar").classList.remove('bg-primary');
        document.getElementById("navbar").classList.add('bg-white');
        document.querySelector(".navbar-toggler").style.color = "#256bf4";
        Array.from(document.querySelectorAll('.nav-link')).forEach(link => {
            link.style.color = "#256bf4"
        })
        document.querySelector(".navbar-brand").style.color = "#256bf4"

    }
})


// Chart js

// const ctx = document.getElementById('myChart').getContext('2d');

// const myChart = new Chart(ctx, {
//     type: 'line',
//     data: {
//         labels: [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31],
//         datasets: [{
//             label: 'APAC RE Index',
//             backgroundColor: "#fff",
//             borderColor: "#256bf4",
//             fill: false,
//             data: [
//                 1200,
//                 600,
//                 2100,
//                 2000,
//                 2200,
//                 1800,
//                 1300
//             ],
//         }]
//     },
//     options: {
//         responsive: true,
//         title: {
//             display: true,
//             text: 'Chart.js Line Chart - Logarithmic'
//         },
//         scales: {
//             xAxes: [{
//                 display: true,
//             scaleLabel: {
//                 display: true,
//                 labelString: 'Date'
//             },

//             }],
//             yAxes: [{
//                 display: true,
//                 scaleLabel: {
//                         display: true,
//                         labelString: 'Index Returns'
//                     },
//                     ticks: {

//                         // forces step size to be 5 units
//                         stepSize: 500
//                     }
//             }]
//         }
//     }
// });




