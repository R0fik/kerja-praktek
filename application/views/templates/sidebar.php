 <?php $roleId = $this->session->userdata('role_id'); ?>
 <!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-code"></i>
    </div>
    <div class="sidebar-brand-text mx-3">
      <?php if ($roleId == 1) {
        echo "Welcome Admin";
      } else {
        echo "Welcome User";
      } ?>
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">



    <?php 
      
      $queryMenu = "SELECT `title`,`url` FROM `menu` 
                    WHERE `menu`.`role_id` = $roleId 
                    ORDER BY `menu_id` ASC";
      $menu = $this->db->query($queryMenu)->result_array();

      $idUser = $user['id_user'];
      $cekWork = "SELECT `jam_selesai` FROM `info_peminjam` WHERE `id_user` = $idUser OR `jam_selesai` = NULL ORDER BY `jam_mulai` DESC  LIMIT 1 ";
      $cek = $this->db->query($cekWork)->result_array();
      //echo $cek[0]['jam_selesai'];die;

    ?>

    <?php if ($roleId == 1) : ?>
        <!-- jalankan query menu admin -->
        <?php foreach ($menu as $m) : ?>


          <li class="nav-item">
            <a class="nav-link" href="<?= base_url($m['url']); ?>"><?= $m['title']; ?></a>
          </li>
        <?php endforeach; ?>
    <?php  else :  ?>
        <!-- jalankan query menu user -->
        <?php foreach ($menu as $m) { 

        if (($cek[0]['jam_selesai'] == 0) && ($m['title'] == 'Add Work')) {
          continue;
        } else {  ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url($m['url']); ?>"><?= $m['title']; ?></a>
            </li>
        <?php } ?>
        <?php } ?>
    <?php endif; ?>

    <hr class="sidebar-divider">
    <!-- ######################################################## -->

  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
      <i class="fas fa-sign-out-alt"></i>
      <span>Logout</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->