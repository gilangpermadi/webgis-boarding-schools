        <!-- Begin Page Content -->
        <div class="container-fluid">

        	<!-- Page Heading -->
        	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        	<div class="row">
        		<div class="col-xl-3 col-md-6 mb-4">
        			<div class="card border-left-info shadow h-100 py-2">
        				<div class="card-body">
        					<div class="row no-gutters align-items-center">
        						<div class="col mr-2">
        							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Operator</div>
        							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalUser['stts']; ?></div>
        						</div>
        						<div class="col-auto">
        							<i class="fas fa-user fa-2x text-gray-300"></i>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        		<div class="col-xl-3 col-md-6 mb-4">
        			<div class="card border-left-info shadow h-100 py-2">
        				<div class="card-body">
        					<div class="row no-gutters align-items-center">
        						<div class="col mr-2">
        							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Pondok Pesantren</div>
        							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalData; ?></div>
        						</div>
        						<div class="col-auto">
        							<i class="fas fa-database fa-2x text-gray-300"></i>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        		<div class="col-xl-3 col-md-6 mb-4">
        			<div class="card border-left-info shadow h-100 py-2">
        				<div class="card-body">
        					<div class="row no-gutters align-items-center">
        						<div class="col mr-2">
        							<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Teranalisa</div>
        							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalAnalyze; ?></div>
        						</div>
        						<div class="col-auto">
        							<i class="fas fa-check-square fa-2x text-gray-300"></i>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
            <div id="cluster" height="200"></div>
        </div>
        <!-- /.container-fluid -->

    </div>
      <!-- End of Main Content -->

  <?php
  /* Mengambil query report*/
  foreach($chartHasil as $result){
        $cluster[] = $result['max']; //ambil bulan
        $value[] = (float)$result['nilai'];//ambil nilai
        
      }
      
      /* end mengambil query*/

      ?>

            <script type="text/javascript">
        $(function () {
          $('#cluster').highcharts({
            chart: {
              type: 'column',
              margin: 75,
              options3d: {
                enabled: false,
                alpha: 10,
                beta: 25,
                depth: 70
              }
            },
            title: {
              text: 'Laporan Hasil Pengelompokkan',
              style: {
                fontSize: '18px',
                fontFamily: 'Verdana, sans-serif'
              }
            },
            subtitle: {
             text: 'Clustering',
             style: {
              fontSize: '15px',
              fontFamily: 'Verdana, sans-serif'
            }
          },
          plotOptions: {
            column: {
              depth: 25
            }
          },
          credits: {
            enabled: false
          },
          xAxis: {
            categories:  <?php echo json_encode($cluster);?>
          },
          exporting: { 
            enabled: false 
          },
          yAxis: {
            title: {
              text: 'Jumlah'
            },
          },
          tooltip: {
           formatter: function() {
             return 'Pondok Pesantren yang berada di kelompok <b>' + this.x + '</b> berjumlah <b>' + Highcharts.numberFormat(this.y,0) + '</b>, di '+ this.series.name;
           }
         },
         series: [{
          name: 'Laporan Hasil',
          data: <?php echo json_encode($value);?>,
          shadow : true,
          dataLabels: {
            enabled: true,
            color: '#045396',
            align: 'center',
            formatter: function() {
             return Highcharts.numberFormat(this.y, 0);
                }, // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                  fontSize: '13px',
                  fontFamily: 'Verdana, sans-serif'
                }
              }
            }]
          });
        });
      </script>