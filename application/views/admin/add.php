        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
              <?= validation_errors(); ?>
            </div>
          <?php endif; ?>
          <form action="<?= base_url('admin/add_data'); ?>" method="post">
            <div class="body">
              <div class="row mb-3">
                <div class="col-lg-4">
                  <label for="nspp">NSPP</label>
                  <input type="hidden" name="id" id="id" value="<?php echo $getCode; ?>">
                  <input type="hidden" name="updater" id="updater" value="<?php echo $user['email']; ?>">
                  <input type="text" class="form-control" id="nspp" name="nspp" placeholder="Masukkan NSPP" onfocus="true">
                </div>
                <div class="col-lg-8">
                  <label for="nama">Nama Pondok Pesantren</label>
                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Pondok Pesantren">
                </div>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" rows="4"></textarea>
              </div>
              <div class="row mb-3">
                <div class="col-lg-6">
                  <label for="kecamatan">Kecamatan</label>
                  <select name="kecamatan" id="kecamatan" class="form-control">
                    <option value="">Pilih Kecamatan</option>
                    <?php foreach($dataKecamatan as $kecamatan) : ?>
                      <option value="<?= $kecamatan['id_kecamatan']; ?>"><?= $kecamatan['kec']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="col-lg-6">
                  <label for="lat">Garis Bujur & Lintang (Latitude & Longitude): <a href="http://www.latlong.net" class="tooltip-test" target="_blank">Cari koordinat</a></label>
                  <div class="row">
                    <div class="col-8 col-lg-6">
                      <input type="text" class="form-control" id="lat" name="lat" placeholder="Latitude">
                    </div>
                    <div class="col-4 col-lg-6">
                      <input type="text" class="form-control" id="lon" name="lon" placeholder="Longitude">
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="tanggal">Tanggal Berdiri</label>
                <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Berdiri" onfocus="(this.type='date')" id="tanggal" name="tanggal">
              </div>

              <div class="form-group">
                <label for="yayasan">Nama Yayasan</label>
                <input type="text" class="form-control" id="yayasan" name="yayasan" placeholder="Masukkan Nama Yayasan">
              </div>
              <label for="program">Unit Pendidikan</label>
              <div class="row">
                <div class="col-sm-10">
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
                  <input type="text" class="form-control" id="jsantri" name="jsantri" placeholder="Masukkan Jumlah Santri">
                </div>
                <div class="col-4 col-lg-6">
                  <label for="jtenaga">Jumlah Tenaga</label>
                  <input type="text" class="form-control" id="jtenaga" name="jtenaga" placeholder="Masukkan Jumlah Tenaga">
                </div>
              </div>

              <div class="form-group mt-3">
                <label for="daerah">Wilayah</label>
                <select name="daerah" id="daerah" class="form-control">
                  <option value="">Pilih Wilayah</option>
                  <?php foreach($dataDaerah as $daerah) : ?>
                    <option value="<?= $daerah['id_daerah']; ?>"><?= $daerah['jenis_daerah']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->