        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          
          <div class="row">
          	<div class="col-lg">
              <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                  <?= validation_errors(); ?>
                </div>
              <?php endif; ?>

              <?= $this->session->flashdata('message'); ?>
          		<a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalSubBaru">Tambah Sub-Menu</a>
          		<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Judul/Nama</th>
              <th scope="col">Menu</th>
              <th scope="col">Url</th>
              <th scope="col">Ikon</th>
              <th scope="col">Aktif</th>
				      <th scope="col">Aksi</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach($submenu as $sm) : ?>
				    <tr>
				      <th scope="row"><?= $i; ?></th>
				      <td><?= $sm['judul']; ?></td>
              <td><?= $sm['menu']; ?></td>
              <td><?= $sm['url']; ?></td>
              <td><?= $sm['icon']; ?></td>
              <td><?= $sm['aktif']; ?></td>
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
<div class="modal fade" id="modalSubBaru" tabindex="-1" role="dialog" aria-labelledby="modalSubBaruLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalSubBaruLabel">Tambah Sub-Menu Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/submenu'); ?>" method="post">
      	<div class="modal-body">
          <div class="form-group">
    		    <input type="text" class="form-control" id="judul" name="judul" placeholder="Nama Sub-Menu">
          </div>
          <div class="form-group">
            <select name="id_menu" id="id_menu" class="form-control">
              <option value="">Pilih Menu</option>
              <?php foreach($menu as $m) : ?>
                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="url" name="url" placeholder="Url Sub-Menu">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="icon" name="icon" placeholder="Ikon Sub-Menu">
          </div>
           <div class="form-group">
             <div class="form-check">
               <input type="checkbox" class="form-check-input" value="1" name="aktif" id="aktif" checked>
               <label for="aktif" class="form-check-label">
                 Aktif?
               </label>
             </div>
           </div>
      	</div>
       	<div class="modal-footer">
     	  	<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
       		<button type="submit" class="btn btn-primary">Tambah</button>
      	</div>
      </form>
    </div>
  </div>
</div>