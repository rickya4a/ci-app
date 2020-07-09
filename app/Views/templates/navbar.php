<?php
$page = service('page');
$session = service('session');
 ?>

<!-- nav HTML -->
<header>
  <div class="top-header">
    <div class="container">
      <div class="row ">
        <ul class="contact-detail2 col-md-6 pull-left">
          <li> <a href="#" target="_blank"><i class="fa fa-mobile"></i>Telp (021) 888 888 88</a> </li>
          <li> <a href="#" target="_blank"><i class="fa fa-envelope-o"></i> Klinik@gmail.com</a> </li>
        </ul>
        <div class="social-links col-md-6 pull-right">
          <ul class="social-icons pull-right">
            <li> <a href="http://facebook.com" target="_blank"><i class="fa fa-facebook"></i></a> </li>
            <li> <a href="http://twitter.com" target="_blank"><i class="fa fa-twitter"></i></a> </li>
            <li> <a href="http://pinterest.com" target="_blank"><i class="fa fa-pinterest"></i></a> </li>
            <li> <a href="http://dribble.com/" target="_blank"><i class="fa fa-skype"></i></a> </li>
            <li> <a href="http://pinterest.com" target="_blank"><i class="fa fa-dribbble"></i></a> </li>
            <input class="search_input" type="text" name="" placeholder="Search...">
            <a href="#" class="search_icon"><i class="fa fa-search icon"></i></a>
          </ul>
        </div>
      </div>
    </div>
  </div>
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
          <li class="<?php $page->active('/')?>">
            <a href="<?php echo base_url('/') ?>"
            >Home</a>
          </li>
          <li class="<?php $page->active('about')?>">
            <a href="<?php echo base_url('about') ?>"
            >Profil</a>
          </li>
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
              <li><a href="#">Pemeriksaan & Pengobatan</a></li>
              <li><a href="#">Vaksin (Vendor)</a></li>
              <li><a href="#">Fisioterapi</a></li>
              <li><a href="#">Konsultasi Gizi</a></li>
              <li><a href="#">Konsultasi Psikologi Mengenai ABK</a></li>
              <li><a href="#">Asesmen Perkembangan & Psikotes</a></li>
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
          </li>
          <?php if (!empty($session->username)): ?>
            <li class="dropdown">
            <a
              href="#"
              class="dropdown-toggle"
              data-toggle="dropdown"
              role="button"
              aria-expanded="false"
            >Booking<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class="<?php $page->active('examination')?>">
              <a href="<?php echo base_url('examination')?>">
              Booking Pemeriksaan</a></li>
              <li><a href="#">Booking Konsultasi</a></li>
              <li class="divider"></li>
            </ul>
            <li>
              <a
                href="<?php echo base_url('users/logout')?>"
              >Log Out (<?php echo $session->username ?>)</a>
            </li>
          <?php else: ?>
            <li>
              <a
                href="#loginModal"
                data-toggle="modal"
              >Login</a>
            </li>
          <?php endif ?>
      </div>
    </div>
  </nav>
</header>
<!-- end nav HTML -->

<?php if(empty($session->username)): ?>
<!-- modal HTML -->
<?php echo view('users/login') ?>
<!-- end modal HTML -->
<?php endif ?>