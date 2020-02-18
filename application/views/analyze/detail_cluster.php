        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <?php 
          $ponpes = $this->db->get_where('dataponpes', ['id_ponpes' => $company['id_ponpes']])->row_array();
          $cluster = $this->db->get_where('max_cluster', ['id_cluster' => $company['id_cluster']])->row_array();
           ?>
           <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kelompok</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if($cluster['max'] == 'C1'){ echo 'Besar';} elseif($cluster['max'] == 'C2'){ echo 'Menengah';} else {echo 'Kecil';} ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
          <table class="table">
            <tr>
              <th>Nama</th>
              <td><?php echo $ponpes['nama_ponpes']; ?></td>
            </tr>
            <tr>
              <th>Cluster 1</th>
              <td><?php echo $company['c1']; ?></td>
            </tr>
            <tr>
              <th>Cluster 2</th>
              <td><?php echo $company['c2']; ?></td>
            </tr>
            <tr>
              <th>Cluster 3</th>
              <td><?php echo $company['c3']; ?></td>
            </tr>
            <tr>
              <th>Maksimum</th>
              <td><?php echo $cluster['max']; ?></td>
            </tr>
            
          </table>

      
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->