                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                      <!-- Page Heading -->
                      <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                      <?= $this->session->flashdata('message'); ?>
                      <div class="row">
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Akun terverifikasi</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sttsApproved['stts']; ?></div>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-user-check fa-2x text-gray-300"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                          <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Akun Tertunda</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sttsPending['stts']; ?></div>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-user-lock fa-2x text-gray-300"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="table table-responsive-sm mt-4">
                        <table class="table table-bordered" id="table-user">
                          <thead>
                            <tr style="text-align: center;">
                              <th>#</th>
                              <th>Nama</th>
                              <th>Email</th>                    
                              <th>Lembaga yang dikelola</th>
                              <th>Status</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 0;
                            foreach ($manageUser as $user) {
                              if($user['role_id'] == 2){
                              ?>
                              <tr>
                                <td><?php echo ++$no; ?></td>
                                <td><?php echo $user['nama'];?></td>
                                <td><?php echo $user['email'];?></td>
                                <td><?php echo $user['nama_ponpes'];?></td>
                                <td><?php if($user['status'] == 1){ ?>
                                  <span class="badge badge-pill badge-success">Aktif</span>
                                <?php } else { ?>
                                  <span class="badge badge-pill badge-danger">Tidak Aktif</span>
                                <?php }
                                  ?></td>
                                <td>
                                  <?php if($user['status'] == 0){ ?>
                                    <a class="badge badge-pill badge-primary" href="<?php echo base_url('admin/pratinjau/') . $user['id']; ?>">Pratinjau</a>
                                  <?php } else { ?>
                                    <a class="badge badge-pill badge-primary" href="<?php echo base_url('admin/user_detail/') . $user['id']; ?>">Detail</a>
                                  <?php } ?>
                                </td>
                              </tr>
                            <?php }
                        } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- /.container-fluid -->

                  </div>
      <!-- End of Main Content -->