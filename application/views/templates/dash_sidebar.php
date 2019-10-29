  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user') ?>">
        Jogja TV
      </a>

      <!-- Nav Item - Profile -->
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user'); ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Administrator
        </div>

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('surat'); ?>">
            <i class="far fa-envelope"></i>
            <span>Manajemen Surat</span></a>

            <a class="nav-link" href="<?= base_url('user/lihatAkun'); ?>">
              <i class="fas fa-fw fa-user"></i>
              <span>Manajemen Akun</span>
            </a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
            System
          </div>

          <!-- Nav Item - Logout -->
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout') ?>"  data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-fw fa-sign-out-alt"></i>
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
