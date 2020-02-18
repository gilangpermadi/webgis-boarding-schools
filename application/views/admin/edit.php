        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <form action="<?= base_url('admin/update_data'); ?>" method="post">
            <div class="body">
              <div class="row mb-3">
                <div class="col-lg-4">
                  <label for="nspp">NSPP:</label>
                  <input type="hidden" name="id" id="id" value="<?php echo $pontren['id_ponpes']; ?>">
                  <input type="hidden" name="updater" id="updater" value="<?php echo $user['email']; ?>">
                  <input type="text" class="form-control" id="nspp" name="nspp" placeholder="Masukkan NSPP" value="<?php echo $pontren['nspp']; ?>">
                </div>
                <div class="col-lg-8">
                  <label for="nama">Nama Pondok Pesantren:</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Pondok Pesantren" value="<?php echo $pontren['nama_ponpes']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" rows="4"><?php echo $pontren['alamat']; ?></textarea>
              </div>
              <div class="row mb-3">
                <div class="col-lg-4">
                  <label for="kecamatan">Kecamatan:</label>
                  <select name="kecamatan" id="kecamatan" class="form-control">
                    <option value="<?php echo $pontren['id_kecamatan']; ?>">Pilih Kecamatan</option>
                    <?php foreach($dataKecamatan as $kecamatan) : ?>
                      <option value="<?= $kecamatan['id_kecamatan']; ?>" <?php echo $kecamatan['id_kecamatan'] == $pontren['id_kecamatan'] ? "selected" : null ?>><?= $kecamatan['kec']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="col-lg-8">
                  <label for="lat">
                    Lokasi Koordinat : <a href="http://www.latlong.net" class="tooltip-test" target="_blank">Cari koordinat</a>
                  </label>
                  <div class="row">
                    <div class="col-8 col-lg-6">
                      <input type="text" class="form-control" id="lat" name="lat" placeholder="Latitude" value="<?php echo $pontren['lat']; ?>">
                    </div>
                    <div class="col-4 col-lg-6">
                      <input type="text" class="form-control" id="lon" name="lon" placeholder="Longitude" value="<?php echo $pontren['lon']; ?>">
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="tanggal">Tanggal Berdiri:</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $pontren['tgl_berdiri']; ?>">
              </div>

              <div class="form-group">
                <label for="yayasan">Nama Yayasan</label>
                <input type="text" class="form-control" id="yayasan" name="yayasan" placeholder="Masukkan Nama Yayasan" value="<?php echo $pontren['yayasan']; ?>">
              </div>
              <div class="row mb-2">
                <div class="col-sm-3">
                  <ul class="list-group">
                    <a href="" data-toggle="modal" data-target="#modalUnit"><li class="list-group-item font-weight-bold list-group-item-dark d-flex justify-content-between align-items-center">Unit Pendidikan <span class="badge badge-primary badge-pill"><?php echo $pontren['jumlah_unit']; ?></span></li></a> 
                  </ul>
                </div>
                <div class="col-sm-7">
                  <div class="form-group">
                    <select multiple name="program[]" id="program" class="form-control" size="5">
                      <option value="TPQ/LPQ">TPQ/LPQ</option>
                      <option value="Diniyah">Diniyah</option>
                      <option value="PP. Umum">PP. Umum</option>
                      <option value="PP. Wajar DIKDAS">PP. Wajar DIKDAS</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="form-group">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addOptionModal" onclick="document.getElementById('nilai').value = ''">
                      Tambah Unit
                    </button>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-8 col-lg-6">
                  <label for="jsantri">Jumlah Santri</label>
                  <input type="text" class="form-control" id="jsantri" name="jsantri" placeholder="Masukkan Jumlah Santri" value="<?php echo $pontren['jumlah_santri']; ?>">
                </div>
                <div class="col-4 col-lg-6">
                  <label for="jtenaga">Jumlah Ketenagaan</label>
                  <input type="text" class="form-control" id="jtenaga" name="jtenaga" placeholder="Masukkan Jumlah Tenaga" value="<?php echo $pontren['jumlah_tenaga']; ?>">
                </div>
              </div>

              <div class="form-group mt-3">
                <label for="daerah">Keterangan:</label>
                <select name="daerah" id="daerah" class="form-control">
                  <option value="">Pilih Jenis Daerah</option>
                  <?php foreach($dataDaerah as $drh) : ?>
                    <option value="<?= $drh['id_daerah']; ?>" <?php echo $drh['id_daerah'] == $pontren['id_daerah'] ? "selected" : null ?>><?= $drh['jenis_daerah']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </form>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Detail Modal -->
      <div class="modal fade" id="modalUnit" tabindex="-1" role="dialog" aria-labelledby="modalUnitLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalUnitLabel">Unit Pendidikan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             <ul class="list-group">
              <?php foreach ($ponpes_unit as $unit) { ?>
                <li class="list-group-item"><?php echo $unit['nama_unit']; ?></li>
              <?php } ?>
            </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
          </div>
        </div>
      </div>
    </div>