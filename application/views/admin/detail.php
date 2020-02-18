        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <table class="table">
            <tr>
              <th>Nama</th>
              <td><?php echo $detail['nama_ponpes']; ?></td>
            </tr>
            <tr>
              <th>Alamat</th>
              <td><?php echo $detail['alamat']; ?></td>
            </tr>
            <tr>
              <th>Jumlah Tenaga</th>
              <td><?php echo $detail['jumlah_tenaga']; ?></td>
            </tr>
            <tr>
              <th>Jumlah Santri</th>
              <td><?php echo $detail['jumlah_santri']; ?></td>
            </tr>
            <tr>
              <th>Wilayah</th>
              <td><?php if($detail['id_daerah'] == 1){
                echo 'Kabupaten';
              } else {
                echo 'Kota';
              } ?></td>
            </tr>
            <tr>
              <th>Kecamatan</th>
              <td><?php echo $detail['id_kecamatan'];?></td>
            </tr>
            <tr>
              <th>Tanggal Berdiri</th>
              <td><?php echo (date("d M Y", strtotime($detail['tgl_berdiri'])));?></td>
            </tr>
            <tr>
              <th>Jumlah Unit</th>
              <td><?php echo $detail['jumlah_unit']; ?></td>
            </tr>
          </table>
          <div class="text text-center">
            <small>Data diperbarui oleh <strong><?php echo $detail['pengupdate'] ?></strong> sejak tanggal <strong><?= date('d F Y', $detail['tgl_update']); ?></strong></small>
          </div>
      
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->