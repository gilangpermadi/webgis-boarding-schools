        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <div class="row">
            <div class="col-lg-8">
              <?= form_open_multipart('user/edit'); ?>
                <div class="form-group row">
                  <label for="email" class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" readonly="true">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="name" class="col-sm-3 col-form-label">Nama Lengkap</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['nama']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="image" class="col-sm-3 col-form-label">Gambar</label>
                  <div class="col-sm-9">
                    <div class="row">
                      <div class="col-sm-3">
                        <img src="<?php echo base_url('assets/img/profile/') . $user['gambar']; ?>" class="img-thumbnail">
                      </div>
                      <div class="col-sm-8">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="image" name="image">
                          <label for="image" class="custom-file-label">Pilih Gambar</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group-row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->