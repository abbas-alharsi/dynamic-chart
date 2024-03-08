<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row mb-2 mt-5">
            <div class="col-6">
                <i class="fa-solid fa-square-poll-vertical"></i> Penjualan
            </div>
            <div class="col-6">
                <select class="form-select float-end mb-2 year-options" style="width:100px" id="yearOptions" onchange="changeSalesChart()">
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                </select>
                <select class="form-select float-end mb-2 me-2 chart-options" style="width:150px" id="chartOptions" onchange="changeSalesChart()">
                    <option value="bar">Bar Chart</option>
                    <option value="line">Line Chart</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <canvas id="myChart"></canvas>
            </div>
        </div>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
    <script>
        window.onload = function() {
            let salesRow;
            const date = new Date()
            let year = date.getFullYear()
            let month = (date.getMonth()+1).toString().padStart(2,"0");
            $(`.month-options option[value="${month}"]`).prop('selected', true)
            $(`.year-options option[value="${year}"]`).prop('selected', true)

            try{
                salesRow = `<?php echo json_encode($salesRow);?>`
            } finally {
                let salesRowJSON = JSON.parse(salesRow)
                salesChart(salesRowJSON, 'bar')
            }
        }
        let baseUrl = '<?php echo base_url();?>'
        //DAILY CHART
        let chartData = {
            labels: [],
            datasets: [
                {
                    label: "Penjualan",
                    backgroundColor: ['#0DA2FD'],
                    borderColor: ['#0DA2FD'],
                    data: []
                }
            ]
        }

        const config = {
            type: 'bar',
            data: chartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        }

        const ctx = document.getElementById('myChart').getContext('2d')
        const myChart = new Chart(ctx, config)

        const salesChart = (rows, chartType) => {
            let dateArray = []
            let salesArray = []
            rows.map( row => {
                dateArray.push(row.month)
                salesArray.push(row.total)
            })
            chartData.labels = dateArray
            chartData.datasets[0].data = salesArray
            config.type = chartType
            myChart.update()
        }

        changeSalesChart = () => {
            let year = $('#yearOptions').val()
            let chartType = $('#chartOptions').val()
            $.ajax(
                {
                    url: `${baseUrl}getdata/${year}`,
                    method: 'get',
                    success: data => {
                        let res = JSON.parse(data)
                        try{
                            salesChart(res.data, chartType)
                        } finally {
                            if(res.status == 'error') {
                                alert(res.msg)
                            }
                        }
                    }
                }
            )
        }
    </script>
</body>
</html>
