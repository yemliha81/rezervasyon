<?php include('includes/header1.php');?>
<style>
    .charts{
        display:grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap:20px;
    }
</style>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Satışlar', 'Müşteriler'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Şirket Performansı',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        var chart2 = new google.visualization.LineChart(document.getElementById('curve_chart2'));
        var chart3 = new google.visualization.LineChart(document.getElementById('curve_chart3'));

        chart.draw(data, options);
        chart2.draw(data, options);
        chart3.draw(data, options);
      }
    </script>
<div class="x-content">
    <?php include('includes/left_nav1.php');?>

    <div class="page-content">
        <div class="main-content">
            <div class="welcome-div">
                <div class="charts">
                    <div id="curve_chart" style="width: 100%; height: 300px; background:#3beddc; padding:20px;"></div>
                    <div id="curve_chart2" style="width: 100%; height: 300px; background:#3beddc; padding:20px;"></div>
                    <div id="curve_chart3" style="width: 100%; height: 300px; background:#3beddc; padding:20px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>