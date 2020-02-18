        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <div class="row">
            <div class="col-sm-4">
              <h3 class="text text-center">Info Akun</h3>
              <div class="card mb-3 mt-4" style="max-width: 540px;">
                <div class="row no-gutters">
                  <div class="col-md-4">
                    <img src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>" class="card-img" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title"><?= $user['nama']; ?></h5>
                      <p class="card-text"><?= $user['email']; ?></p>
                      <p class="card-text"><small class="text-muted">Bergabung sejak <?= date('d F Y', $user['tgl_buat']); ?></small></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-auto">
                  Akun ini sedang menunggu persetujuan admin?
                </div>
              </div>
              <div class="row">
                <div class="col-auto">
                  <a class="btn btn-success" href="<?php echo base_url('admin/user_acc/') . $user['id']; ?>">Terima</a>
                </div>
                <div class="col-auto">
                  <a class="btn btn-danger" href="<?php echo base_url('admin/user_dec/') . $user['id']; ?>">Tolak</a>
                </div>
              </div>
            </div>
            <div class="col-sm-8">
              <h3 class="text text-center">Profil Operator</h3>
              <table class="table table-bordered mt-4">
                <tr>
                  <th>NIP/NoPeg</th>
                  <td><?php echo $user['nip']; ?></td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td><?php echo $user['almt']; ?></td>
                </tr>
                <tr>
                  <th>Tanggal Lahir</th>
                  <td><?php echo (date("d M Y", strtotime($user['tgl_lhr'])));?></td>
                </tr>
                <tr>
                  <th>No. Telepon</th>
                  <td><?php echo $user['telp']; ?></td>
                </tr>
                <tr>
                  <th>Aktivasi Email</th>
                  <td><?php if($user['is_active'] == 1){ ?>
                    <span class="badge badge-success">Akun teraktivasi</span>
                  <?php } else { ?>
                    <span class="badge badge-danger">Akun belum teraktivasi</span>
                  <?php }
                  ?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->