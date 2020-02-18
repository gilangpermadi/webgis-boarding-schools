        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <h3>Dataset</h3>
          
              <a href="<?php echo base_url('analyze/preproccessing'); ?>">
                <button class="btn btn-primary mt-2 mb-2">Perbarui Dataset</button>
              </a>
            
            
              <a href="<?php echo base_url('analyze/showResult'); ?>">
                <button class="btn btn-info mt-2 mb-2">Lihat Hasil</button>
              </a>
            
          
          <?= $this->session->flashdata('message'); ?>
          <div class="row mt-4">
            <div class="col-lg-10"> 
            
              <table class="table table-bordered" id="alternatif">
                <thead>
                  <tr style="text-align: center;">
                    <th rowspan="2" class="text text-center align-middle">No.</th>
                    <th rowspan="2" class="text text-center align-middle">Nama PonPes</th>
                    <th colspan="4" class="text text-center">Kriteria</th>
                  </tr>
                  <tr>
                    <?php foreach ($kriteria as $k) { ?>
                      <th><?php echo $k['nama_kriteria']; ?></th>
                    <?php } ?>      
                  </tr>
                </thead>
                <tbody class="text-center">
                 <?php foreach ($alternatif as $value) { ?>
                    <tr>
                      <th><?php echo $value['id_alternatif']; ?></th>
                      <td><?php echo $value['nama_ponpes']; ?></td>
                      <td><?php echo $value['x1']; ?></td>
                      <td><?php echo $value['x2']; ?></td>
                      <td><?php echo $value['x3']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="border col-sm-2">
              <h4 class="text text-center">Ketentuan</h4>
              <form action="<?php echo base_url('analyze/result') ?>" method="post">
                <div class="form-group">
                  <label for="jcluster">Jumlah Cluster</label>
                  <input type="text" class="form-control" id="jcluster" name="jcluster" placeholder="Jumlah Cluster" value="3" readonly="true">
                </div>
                <div class="form-group">
                  <label for="maxIterasi">Maksimum Iterasi</label>
                  <input type="text" class="form-control" id="maxIter" name="maxIter" placeholder="Maksimum Iterasi" value="100">
                </div>
                <div class="form-group">
                  <label for="bobot">Bobot</label>
                  <input type="text" class="form-control" id="bobot" name="bobot" placeholder="Nilai bobot" value="2">
                </div>
                <div class="form-group">
                  <label for="epsilon">Nilai Error Terkecil (Epsilon)</label>
                  <input type="text" class="form-control" id="epsilon" name="epsilon" placeholder="Nilai error terkecil" value="0.00001">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary" <?php if (count($alternatif) < 4){ echo 'disabled'; } ?>>Proses</button>
                </div>
              </form>
            </div>
          </div>
          

          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->