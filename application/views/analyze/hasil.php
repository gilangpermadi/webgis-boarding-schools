        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <a href="<?php echo base_url('analyze/print'); ?>" target="_blank" class="btn btn-primary">Cetak</a>
          <div class="table table-responsive-sm mt-4">
              <table class="table table-bordered" id="table-result">
                <thead>
                  <tr class="text-center">
                    <th>No.</th>
                    <th>Nama Pesantren</th>
                    <th>Jumlah Santri</th>
                    <th>Jumlah Tenaga</th>
                    <th>Jumlah Unit</th>
                    <th>Kelompok</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($hasil as $val) { ?>
                    <tr class="text-center">
                      <th><?php echo $no++; ?></th>
                      <td><?php echo $val['nama_ponpes']; ?></td>
                      <td><?php echo round($val['jumlah_santri'], 4); ?></td>
                      <td><?php echo round($val['jumlah_tenaga'], 4); ?></td>
                      <td><?php echo round($val['jumlah_unit'], 4); ?></td>
                      <td><?php if($val['max'] == 'C1'){ echo 'Besar'; } elseif ($val['max'] == 'C2') { echo 'Menengah'; } else { echo 'Kecil'; } ?></td>
                      <td>
                        <a class="badge badge-pill badge-info" href="<?php echo base_url('analyze/cluster_detail/') . $val['id_hasil']; ?>">Detil</a>
                      </td>
                    </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
            </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->