        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          
          <div class="row">
          	<div class="col-lg-6">
              <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                  <?= validation_errors(); ?>
                </div>
              <?php endif; ?>
              <?= $this->session->flashdata('message'); ?>
          		<a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalBaru">Tambah Menu</a>
          		<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Menu</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach($menu as $m) : ?>
				    <tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= $m['menu']; ?></td>
				      <td>
				      	<a class="badge badge-pill badge-success" href="">Edit</a>
				      	<a class="badge badge-pill badge-danger" href="">Hapus</a>
				      </td>
				    </tr>
				    <?php $i++; ?>
					<?php endforeach; ?>
				  </tbody>
				</table>
          	</div>
          </div>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="modalBaru" tabindex="-1" role="dialog" aria-labelledby="modalBaruLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalBaruLabel">Tambah Menu Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu'); ?>" method="post">
      	<div class="modal-body">
    		  <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama Menu">
      	</div>
        <div class="modal-body">
          <input type="text" class="form-control" id="alias" name="alias" placeholder="Nama Alias Menu">
        </div>
       	<div class="modal-footer">
     	  	<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
       		<button type="submit" class="btn btn-primary">Tambah</button>
      	</div>
      </form>
    </div>
  </div>
</div>