
function renderCharts() {

   // var options = {
   //    series: [70],
   //    chart: {
   //      height: 295,
   //      type: 'radialBar',
   //    },
   //    colors: ['#5b66eb'],
   //    plotOptions: {
   //      radialBar: {
   //        hollow: {
   //          size: '70%',
   //        }
   //      },
   //    },
   //    labels: ['$500.45'],
   //  };
  
   //  var chart = new ApexCharts(document.querySelector("#overview"), options);
   //  chart.render();






   // Lifting
   var options = {
      series: [{
        name: 'series1',
        data: [0, 60, 50, 65, 55, 75, 35, 70, 85, 65, 85, 85, 20, 90, 100]
      }],
      chart: {
        height: 252,
        type: 'area',
        toolbar: {
          show: false
        },
      },
      colors: ['#5b66eb'],
      dataLabels: {
        enabled: false
      },
      stroke: {
        curve: 'straight'
      },
      xaxis: {
        tooltip: {
          enabled: false
        }
      },
      tooltip: {
        x: {
          format: 'dd/MM/yy HH:mm'
        },
      },
    };
  
    var chart = new ApexCharts(document.querySelector("#overall"), options);
    chart.render();


    // Engagement
    var options = {
        series: [{
            name: 'Website Blog',
            type: 'column',
            data: [440, 505, 414, 671, 227, 413, 201, 352, 752, 320, 257, 160]
        }, {
            name: 'Social Media',
            type: 'line',
            data: [223, 642, 335, 727, 343, 152, 417, 300, 322, 22, 100, 20]
        }],
        chart: {
            height: 230,
            type: 'line',
            toolbar: {
                show: false
            }
        },
        colors: ['#5b66eb', '#18a538'],
        legend: {
            show: false
        },
        stroke: {
            width: [0, 4]
        },
        dataLabels: {
            enabled: true,
            enabledOnSeries: [1]
        },
        labels: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan', '10 Jan', '11 Jan', '12 Jan'],
        yaxis: [{
            title: {
                text: '',
            },
        },
        {
            opposite: true,
            title: {
                text: ''
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#engagement"), options);
    chart.render();


    // spark
    var spark1 = {
      chart: {
          id: 'sparkline1',
          type: 'line',
          height: 40,
          sparkline: {
              enabled: true
          },
          group: 'sparklines1'
      },
      series: [{
          name: 'teal',
          data: [2, 0, 5, 7, 6, 8, 9]
      }],
      stroke: {
          curve: 'smooth',
          width: 2,
      },
      markers: {
          size: 0
      },
      tooltip: {
          fixed: {
              enabled: true,
              position: 'right'
          },
          x: {
              show: false
          }
      },
      colors: ['#18a538'], // Solid color applied
      fill: {
          opacity: 1 // No gradient, just solid fill
      },
      xaxis: {
          crosshairs: {
              width: 1
          },
      }
  };

  var spark2 = {
      chart: {
          id: 'sparkline2',
          type: 'line',
          height: 60,
          sparkline: {
              enabled: true
          },
          group: 'sparklines2'
      },
      series: [{
          name: 'teal',
          data: [8, 0, 8, 0]
      }],
      stroke: {
          curve: 'smooth',
          width: 2,
      },
      markers: {
          size: 0
      },
      tooltip: {
          fixed: {
              enabled: true,
              position: 'right'
          },
          x: {
              show: false
          }
      },
      colors: ['#dc3545'], // Solid color applied
      fill: {
          opacity: 1 // No gradient, just solid fill
      },
      xaxis: {
          crosshairs: {
              width: 1
          },
      }
  };
  
  new ApexCharts(document.querySelector("#spark1"), spark1).render();
  new ApexCharts(document.querySelector("#spark2"), spark2).render();

   

}

setTimeout(() => {
    renderCharts();
}, 250);

// Post Activity
// Define the data structure for the calendar
const calendarData = [
    // Week 1
    2, 9, 35, 9, 9, 9, 2,
    // Week 2
    1, 9, 35, 35, 35, 9, 35,
    // Week 3
    9, 35, 9, 9, 35, 35, 9,
    // Week 4 (partial)
    35, 9, 35, 3, 9
];

const grid = document.getElementById('calendar-grid');

// Populate the calendar grid
calendarData.forEach(value => {
    const day = document.createElement('div');
    day.className = `calendar-day value-${value}`;
    day.textContent = value;
    grid.appendChild(day);
});

// Add event listeners
document.querySelectorAll('.calendar-day').forEach(day => {
    day.addEventListener('click', () => {
        alert(`You clicked on value: ${day.textContent}`);
    });
});