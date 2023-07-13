<!DOCTYPE html>
<html>

<head>
    <title>Real-time Height Chart</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>
</head>

<body>
    <div style="width: 75%;">
        <canvas id="myChart"></canvas>
    </div>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chartData = {
            labels: [],
            datasets: [{
                label: 'Tinggi',
                data: [],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };
        var myChart = new Chart(ctx, {
            type: 'line',
            data: chartData,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        setInterval(function() {
            $.ajax({
                url: '<?= base_url('welcome/get_data'); ?>',
                dataType: 'json',
                success: function(data) {
                    myChart.data.labels.push(data.waktu);
                    myChart.data.datasets[0].data.push(data.tinggi);
                    myChart.update();
                    console.log(data);
                }
            });
        }, 5000);
    </script>
</body>

</html>