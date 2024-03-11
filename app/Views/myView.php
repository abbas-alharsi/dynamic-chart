<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row mb-2 mt-5">
            <div class="col-6">
                Penjualan
            </div>
            <div class="col-6">
                <select id="yearOptions" onchange="changeSalesChart()" class="form-select float-end mb-2 year-options" style="width:100px">
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                </select>
                <select id="chartOptions" onchange="changeSalesChart()" class="form-select float-end mb-2 me-2 chart-options" style="width:150px">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
    <script>
        window.onload = function() {
            let salesRow
            const date = new Date()
            let year = date.getFullYear()
            $(`.year-options option[value="${year}"]`).prop('selected', true)

            try{
                salesRow = `<?php echo json_encode($salesRow);?>`
            } finally {
                let salesRowJSON = JSON.parse(salesRow)
                salesChart(salesRowJSON, 'bar')
            }
        }
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
        let config = {
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
            rows.map(row => {
                dateArray.push(row.month)
                salesArray.push(row.total)
            })
            chartData.labels = dateArray
            chartData.datasets[0].data = salesArray
            config.type = chartType
            myChart.update()
        }

        let baseUrl = `<?php echo base_url();?>`

        const changeSalesChart = () => {
            let year = $('#yearOptions').val()
            let chartType = $('#chartOptions').val()
            $.ajax(
                {
                    url: `${baseUrl}update-chart/${year}`,
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