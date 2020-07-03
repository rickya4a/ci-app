<?php if (session('success')): ?>
  <p class="success alert alert-success">
    <i class="fa fa-check"></i>
    Anda berhasil melakukan registrasi
  </p>
<?php elseif(session('error')): ?>
  <p class="error alert alert-danger">
    <i class="fa fa-times"></i>
    <?php echo session('error') ?>
  </p>
<?php endif ?>

<section id="slider" class="">
  <!-- Carousel -->
  <div id="main-slide" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ol class="carousel-indicators visible-lg visible-md">
        <li data-target="#main-slide" data-slide-to="0" class="active"></li>
       <li data-target="#main-slide" data-slide-to="1"></li>
       <li data-target="#main-slide" data-slide-to="2"></li>
    </ol><!--/ Indicators end-->

    <!-- Carousel inner -->
    <div class="carousel-inner">

      <div class="item active" style="background-image:url(images/slide/1.jpg)">
            <div class="slider-content text-left">
               <div class="col-md-12">
                   <!-- <h2 class="slide-title effect2">Empowering People</h2>
                   <h3 class="slide-sub-title effect3">To Improve Their Lives</h3>
                   <p class="slider-description lead effect3">Praesent convallis tortor et enim laoreet, vel consectetur purus latoque.</p>
                   <p class="effect3">
                    <a href="#" class="slider btn btn-primary">Our Service</a>
                    <a href="#" class="slider btn btn-secondary">About Us</a>
                   </p>       -->
               </div>
            </div>
       </div><!--/ Carousel item 1 end -->


      <div class="item" style="background-image:url(images/slide/2.jpg)">
            <div class="slider-content">
               <div class="col-md-12 text-center">
                   <!-- <h2 class="slide-title effect4">Of care every day</h2>
                   <h3 class="slide-sub-title effect5">Higher standards</h3>
                   <p>
                    <a href="#" class="slider btn btn-primary">Our Services</a>
                   </p>       -->
               </div>
            </div>
       </div><!--/ Carousel item 2 end -->


       <div class="item" style="background-image:url(images/slide/3.jpg)">
            <div class="slider-content text-right">
               <div class="col-md-12">
                   <!-- <h2 class="slide-title effect6">To better healthcare</h2>
                   <h3 class="slide-sub-title effect7">Leading the way</h3>
                   <p class="slider-description lead effect7">Praesent convallis tortor et enim laoreet, vel consectetur purus latoque.</p>
                   <p>
                    <a href="#" class="slider btn btn-primary">Consultation</a>
                    <a href="#" class="slider btn btn-primary border">Know More</a>
                   </p>       -->
               </div>
            </div>
        </div><!--/ Carousel item 3 end -->

    </div><!-- Carousel inner end-->

    <!-- Controllers -->
    <a class="left carousel-control" href="#main-slide" data-slide="prev">
        <span><i class="fa fa-angle-left"></i></span>
    </a>
    <a class="right carousel-control" href="#main-slide" data-slide="next">
        <span><i class="fa fa-angle-right"></i></span>
    </a>
  </div><!--/ Carousel end -->
</section>

<section id="section1" class="section-margine">
  <div class="container">
    <div class="row ">
      <div class="col-lg-14 col-md-4  col-sm-4 ">
        <div class="section-1-box wow bounceIn">
          <div id="box-layanan">
            <br />
            <a href="pickup.php"><i class="fa fa-search fa-5x"></a></i>
            <p><h4><strong>Dokter Kami</strong> </h4></p>
            <br />
            <p class="text-center">Pilih Berdasarkan Nama, Spesialis dan Lainya</p>
            <a href="pickup.php" button class="btn btn-primary" type button="submit">Cari Dokter</button></a>
          </div>
        </div>
      </div>

      <div class="col-lg-14 col-md-4  col-sm-4 ">
        <div class="section-1-box wow bounceIn">
          <div id="box-layanan">
            <br />
            <a href="pickup.php"><i class="fa fa-map-marker fa-5x"></a></i>
            <p><h4><strong>Klinik Kami</strong> </h4> </p>
            <br />
            <p class="text-center">Temukan Kami</p>
            <br />
            <a href="pickup.php" button class="btn btn-primary" type button="submit">Cari Klinik</button></a>
          </div>
        </div>
      </div>

      <div class="col-lg-14 col-md-4  col-sm-4 ">
        <div class="section-1-box wow bounceIn">
            <div id="box-layanan">
                <br>
                <a href="pickup.php"><i class="fa fa-ambulance fa-5x"></a></i>
                <p><h4><strong>Ambulace</strong> </h4></p>
                <br>
                <p class="text-center">Dapatkan Bantuan Gawat Darurat Medis Dari Klinik Kami</p>
                <a href="pickup.php" button class="btn btn-danger" type button="submit">Ambulance (021) 888 888 88 </button></a>
                </div>
                </p>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section  id="section5" class="section-5 section-margine">
  <div class="container">
    <div class="row my-team">
      <div class="col-md-12">
        <header class="title-head">
          <h2>Produk Kami</h2>

          <div class="line-heading">
            <span class="line-left"></span>
            <span class="line-middle">+</span>
            <span class="line-right"></span>
          </div>
        </header>
      </div>
      <div class="col-md-3 col-sm-6 my-team-member wow fadeInUp">
        <div class="my-member-img">
          <img src="images/team/1.jpg" class="img-responsive" alt="team01">
        </div>
        <div class="my-team-detail text-center">
          <h4 class="my-member-name"><a href ="#">TEST</a></h4>
        </div>
      </div>
    </div>
  </div>
</section>