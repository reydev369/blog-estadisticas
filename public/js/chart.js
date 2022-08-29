console.log("chart.js is running")


let graphic = document.getElementById("graphic").getContext('2d');
let url = "/masvisitados/chart";
var Visits = new Array();
var Posts = new Array();

$.get(url, function (response) {
    response.forEach(function (data) {
        Posts.push(data.title);
        Visits.push(data.total_visits);
    });


    var chart = new Chart(graphic, {
        type: "bar",
        data: {
            labels: Posts,
            datasets: [{
                label: 'Estadisticas de los artículos',
                data: Visits,
                backgroundColor: [
                    'rgba(255, 99, 132)',
                    'rgba(255, 159, 64)',
                    'rgba(255, 205, 86)',
                    'rgba(75, 192, 192)',
                    'rgba(54, 162, 235)',
                ]
            }]
        },
        options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          },


    });
});

