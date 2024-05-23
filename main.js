// Inisialisasi ApexCharts
document.addEventListener("DOMContentLoaded", function() {
    if (typeof ApexCharts !== 'undefined') {
      var options = {
        chart: {
          type: 'line',
          height: 350
        },
        series: [{
          name: 'sales',
          data: [30,40,35,50,49,60,70,91,125]
        }],
        xaxis: {
          categories: [1991,1992,1993,1994,1995,1996,1997,1998,1999]
        }
      }
  
      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
    }
  });
  
  // Inisialisasi Chart.js
  if (typeof Chart !== 'undefined') {
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
          label: '# of Votes',
          data: [12, 19, 3, 5, 2, 3],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  }
  
  // Inisialisasi ECharts
  if (typeof echarts !== 'undefined') {
    var myChart = echarts.init(document.getElementById('echart'));
    var option = {
      title: {
        text: 'ECharts Example'
      },
      tooltip: {},
      legend: {
        data:['Sales']
      },
      xAxis: {
        data: ["Shirts","Cardigans","Chiffons","Pants","Heels","Socks"]
      },
      yAxis: {},
      series: [{
        name: 'Sales',
        type: 'bar',
        data: [5, 20, 36, 10, 10, 20]
      }]
    };
    myChart.setOption(option);
  }
  
  // Inisialisasi Quill
  if (typeof Quill !== 'undefined') {
    var quill = new Quill('#editor', {
      theme: 'snow'
    });
  }
  
  // Inisialisasi Simple-DataTables
  document.addEventListener("DOMContentLoaded", function() {
    if (typeof simpleDatatables !== 'undefined') {
      var dataTable = new simpleDatatables.DataTable("#datatable");
    }
  });
  
  // Inisialisasi TinyMCE
  if (typeof tinymce !== 'undefined') {
    tinymce.init({
      selector: '#mytextarea'
    });
  }
  
  // Penanganan untuk Log Out Modal
  document.addEventListener('DOMContentLoaded', function() {
    var logoutButton = document.querySelector('[data-target="#logoutModal"]');
    if (logoutButton) {
      logoutButton.addEventListener('click', function() {
        var logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));
        logoutModal.show();
      });
    }
  });
  
  // Penanganan Sidebar Toggle
  document.addEventListener('DOMContentLoaded', function() {
    var toggleSidebarBtn = document.querySelector('.toggle-sidebar-btn');
    if (toggleSidebarBtn) {
      toggleSidebarBtn.addEventListener('click', function() {
        document.body.classList.toggle('toggle-sidebar');
      });
    }
  });
  