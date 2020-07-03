<?php $session = \Config\Services::session() ?>

<!-- nav HTML -->
<nav class="navbar navbar-default navbar-menu">
  <div class="container">
    <div class="navbar-header">
      <button
        type="button"
        class="navbar-toggle"
        data-toggle="collapse"
        data-target=".navbar-collapse"
      >
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url('/') ?>">
        <div class="logo-text">
          <span><samp>K</samp>Klinik</span>
        </div>
      </a>
    </div>
    <div
      class="collapse navbar-collapse"
      id="bs-example-navbar-collapse-1"
      data-hover="dropdown"
      data-animations="fadeIn"
    >
      <ul
        class="nav navbar-nav navbar-right-dropdown-menu multi-level"
        class="right"
      >
        <li class="<?php if (uri_string() === '/')
          echo 'active';
         ?>">
          <a href="<?php echo base_url('/') ?>">Home</a>
        </li>
        <li><a href="aboutus.html">Profil</a></li>
        <li><a href="services.html">Konten </a></li>
        <li class="dropdown">
          <a
            href="#"
            class="dropdown-toggle"
            data-toggle="dropdown"
            role="button"
            aria-expanded="false"
          >Produk<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">USG</a></li>
            <li><a href="#">Vaksin (Vendor)</a></li>
            <li><a href="#">Fisioterapi</a></li>
            <li><a href="#">Gigi</a></li>
            <li class="divider"></li>
            <li class="dropdown-submenu">
              <a tabindex="-1" href="#">Kulit (Perawatan Wanita)</a>
              <ul class="dropdown-menu">
                <li><a tabindex="-1" href="#">Facial</a></li>
                <li><a tabindex="-1" href="#">Body SPA</a></li>
                <li><a tabindex="-1" href="#">Message</a></li>
                <li><a tabindex="-1" href="#">Ratus</a></li>
              </ul>
            </li>
            <li><a href="#">Visit Terapi Untuk Anak</a></li>
          </ul>
        </li>
        <li><a href="contact.html">Dokter Umum/MCU</a></li>
        <li><a href="contact.html">Tentang Kami</a></li>
        <?php if (!empty($session->username)): ?>
          <li>
            <a
              href="<?php echo base_url('users/logout')?>"
            >Log Out(<?php echo $session->username ?>)</a>
          </li>
        <?php else: ?>
          <li>
            <a
              href="#loginModal"
              data-toggle="modal"
            >Booking Pemeriksaan</a>
          </li>
        <?php endif ?>
    </div>
  </div>
</nav>
<!-- end nav HTML -->

<?php if(empty($session->username)): ?>
<!-- modal HTML -->
<?php echo view('users/login') ?>
<!-- end modal HTML -->
<?php endif ?>