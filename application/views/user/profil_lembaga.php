        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <a href="<?php echo base_url('user/print_company'); ?>" class="btn btn-primary">Cetak</a>
          <table class="table">
            <tr>
              <th>Nama</th>
              <td><?php echo $company['nama_ponpes']; ?></td>
            </tr>
            <tr>
              <th>Alamat</th>
              <td><?php echo $company['alamat']; ?></td>
            </tr>
            <tr>
              <th>Jumlah Tenaga</th>
              <td><?php echo $company['jumlah_tenaga']; ?></td>
            </tr>
            <tr>
              <th>Jumlah Santri</th>
              <td><?php echo $company['jumlah_santri']; ?></td>
            </tr>
            <tr>
              <th>Keterangan</th>
              <td><?php echo $company['id_daerah']; ?></td>
            </tr>
            <tr>
              <th>Kecamatan</th>
              <td><?php echo $company['id_kecamatan'];?></td>
            </tr>
            <tr>
              <th>Tanggal Berdiri</th>
              <td><?php echo (date("d M Y", strtotime($company['tgl_berdiri'])));?></td>
            </tr>            
          </table>
      
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->