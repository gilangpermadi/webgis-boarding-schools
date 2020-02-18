        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Iterasi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $iterasi; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fab fa-rev fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          <table class="table table-responsive-sm">
            <thead>
              <tr>
                <th>No.</th>
                <?php for($i = 1; $i <= $cluster; $i++): ?>
                  <th>Cluster <?=$i?></th>
                <?php endfor; ?>
                <th>Maksimum Cluster</th>
              </tr>
            </thead>

            <tbody>
              <?php $no = 1;
              foreach ($hasil as $val) { ?>
                <tr>
                  <th><?php echo $no++; ?></th>
                  <td><?php echo $val['c1']; ?></td>
                  <td><?php echo $val['c2']; ?></td>
                  <td><?php echo $val['c3']; ?></td>
                  <td><?php echo $val['max']; ?></td>
                </tr>
              <?php } ?>
              
            </tbody>
          </table>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->