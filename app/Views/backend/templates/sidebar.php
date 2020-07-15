<?php $page = service('page'); ?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url('backend/dashboard') ?>" class="brand-link">
    <?= img([
      'src'   => 'assets/images/Admin.png',
      'alt'   => 'Medicamp',
      'class' => 'brand-image elevation-3',
      'style' => 'opacity: .8']) ?>
    <span class="brand-text font-weight-light">Admin JMH</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img
          src="<?php echo base_url('assets/images/avatar.png') ?>"
          class="img-circle elevation-2"
          alt="User Image"
        />
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= session('name') ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul
        class="nav nav-pills nav-sidebar flex-column"
        data-widget="treeview"
        role="menu"
        data-accordion="false"
      >
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?php echo base_url('backend/dashboard') ?>"
            class="nav-link <?php echo $page->active('backend/dashboard') ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('backend/news') ?>"
            class="nav-link <?php echo $page->active('backend/news') ?>">
            <i class="nav-icon fas fa-book"></i>
            <p>Pages</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('backend/users') ?>"
            class="nav-link <?php echo $page->active('backend/users') ?>">
            <i class="nav-icon fas fa-user"></i>
            <p>User</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>