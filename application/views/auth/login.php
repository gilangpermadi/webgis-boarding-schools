  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-lg-7">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Halaman Masuk</h1>
                  </div>
                  <?= $this->session->flashdata('message'); ?>
                  <form method="post" action="<?= base_url('auth'); ?>"> <!-- user -->
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukkan Alamat Email..." value="<?= set_value('email'); ?>">
                      <?= form_error('email', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Kata Sandi">
                      <?= form_error('password', '<small class="text-danger pl-3">', '</small>');?>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">
                      Masuk
                    </button>
                  </form>
                  <hr>
                   <div class="text-center">
                    <a class="small" href="<?php echo base_url('auth/forgot_password'); ?>">Lupa Kata Sandi?</a>
                  </div>
                  <div class="text-center">
                  <a class="small" href="<?= base_url('auth/regist'); ?>">Buat Akun!</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?php echo base_url('welcome'); ?>">Kembali</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>