    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-map-marked-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3" href="<?= base_url('')?>">PP Admin</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Menu Kueri -->
      <?php 
      $role_id = $this->session->userdata('role_id');
      $menuKueri = "select `tb_usermenu`.`id`, `menu`
                      from `tb_usermenu` join `tb_access`
                        on `tb_usermenu`.`id` = `tb_access`.`menu_id`
                    where `tb_access`.`role_id` = $role_id
                    order by `tb_access`.`menu_id` asc
                  ";
      $menu = $this->db->query($menuKueri)->result_array();
      ?>

      <!-- Visual Menu / Looping -->
      <?php foreach ($menu as $m) : ?>
           <div class="sidebar-heading">
             <?= $m['menu']; ?>
           </div>

           <!-- Sub-Menu Kueri -->
           <?php
           $menuId = $m['id'];
           $submenuKueri = "select * from `tb_usersubmenu`
           where `id_menu` = $menuId
           and `aktif` = 1
           ";
           $submenu = $this->db->query($submenuKueri)->result_array();
           ?>

           <?php foreach ($submenu as $sm) : ?>
            <?php if ($title == $sm['judul']) : ?>
              <li class="nav-item active">
                <?php else : ?>
                  <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                  <i class="<?= $sm['icon']; ?>"></i>
                  <span><?= $sm['judul']; ?></span></a>
              </li>
           <?php endforeach; ?>
           <hr class="sidebar-divider mt-3">
      <?php endforeach; ?>
      
      <!-- Nav Item - Logout -->
      <li class="nav-item">
        <a class="nav-link pt-0" href="<?= base_url('auth/logout'); ?>">
        <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Keluar</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->