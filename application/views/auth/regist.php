  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat Akun</h1>
              </div>
              <?= $this->session->flashdata('message'); ?>
              <form method="post" action="<?= base_url('auth/regist'); ?>">
                <h5>Info Akun:</h5>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nspp" name="nspp" placeholder="Nomor Statistik Lembaga" value="<?= set_value('nspp');?>">
                  <?= form_error('nspp', '<small class="text-danger pl-3">', '</small>');?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email');?>">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>');?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Kata Sandi">
                     <?= form_error('password1', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Kata Sandi">
                  </div>
                </div>
                <hr>
                <h5>Profil Operator:</h5>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="nip" name="nip" placeholder="NIP/NoPeg" value="<?= set_value('nip');?>">
                  <?= form_error('nip', '<small class="text-danger pl-3">', '</small>');?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name');?>">
                  <?= form_error('name', '<small class="text-danger pl-3">', '</small>');?>
                </div>
                 <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="almt" name="almt" placeholder="Alamat" value="<?= set_value('almt');?>">
                     <?= form_error('almt', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="tgl_lhr" name="tgl_lhr" placeholder="Tanggal Lahir" onfocus="(this.type='date')" value="<?= set_value('tgl_lhr');?>">
                    <?= form_error('tgl_lhr', '<small class="text-danger pl-3">', '</small>');?>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="telp" name="telp" placeholder="No. Telepon/HP" value="<?= set_value('telp');?>">
                  <?= form_error('tgl_lhr', '<small class="text-danger pl-3">', '</small>');?>
                </div>
                <button type="submit" class="btn btn-success btn-user btn-block">
                  Daftar Akun
                </button>
              </form>
              <hr>
               <div class="text-center">
                  <a class="small" href="<?php echo base_url('auth/forgot_password'); ?>">Lupa Kata Sandi?</a>
                </div>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth');?>">Sudah Punya Akun? Masuk</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?php echo base_url('auth'); ?>">Kembali</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>