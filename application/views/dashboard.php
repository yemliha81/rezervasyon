<?php include('includes/header1.php');?>
<style>
   .charts{
        display:grid;
        grid-template-columns: 1fr 1fr;
        gap:20px;
        width:100%;
        margin-bottom:30px;
    }
   .totals{
        display:grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap:20px;
        width:100%;
        margin-bottom:30px;
    }
    .totals{
      font-size:24px;
    }
    .font-big{
      font-size:60px;
    }
    .totals > div{
      border:1px solid #ddd;
      border-radius:10px;
      padding:30px;
      color:#FFFFFF;
    }
    .bg-1{
      background:#aa0c8d;
    }
    .bg-2{
      background:#0c8aaa;
    }
    .bg-3{
      background:#e14c0b;
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

        chart.draw(data, options);

        var data2 = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Yiyecek',     11],
          ['İçecek',      2],
          ['Rezervasyon',  11],
        ]);

        var options2 = {
          title: 'Satışlar',
          is3D: true,
        };

        var chart2 = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart2.draw(data2, options2);
      }
   
      
       
      
    </script>
<div class="x-content">
    <?php include('includes/left_nav1.php');?>

    <div class="page-content">
        <div class="main-content">
            <div class="welcome-div">
              <div class="totals">
                <div class="customers bg-1">
                  <div class="font-big">
                    <span class="lnr lnr-user"></span> <span><?php echo $customers;?></span>
                  </div>
                    <div>Müşteriler</div>
                </div>
                <div class="res_today bg-2">
                  <div class="font-big">
                      <span class="lnr lnr-calendar-full"></span> <span><?php echo $today;?></span>
                    </div>
                      <div>Bugünkü Rezervasyonlar</div>
                </div>
                <div class="res_total bg-3">
                    <div class="font-big">
                        <span class="lnr lnr-calendar-full"></span> <span><?php echo $total;?></span>
                    </div>
                    <div>
                      Toplam Rezervasyonlar
                    </div>
                </div>
              </div>
                <div class="charts">
                    <div id="curve_chart" style="width: 100%; height: 400px; background:#3beddc; padding:20px;"></div>
                    <div id="piechart_3d" style="width: 100%; height: 400px; background:#3beddc; padding:20px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php');?>