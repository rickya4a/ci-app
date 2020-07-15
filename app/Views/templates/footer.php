    <?php $latestNews = get_latest_news() ?>
    <section id="footer-top" class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-lg-3">
            <div class="footer-top-box">
              <h4>Tentang Kami</h4>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
            </div>
            <div class="footer-top-box">
              <h4>Office Hour</h4>
              <b>Mon-Fri :</b> 09am to 06pm<br/>
              <b>Tues-Wed :</b> Special Appointment
            </div>
          </div>
          <div class="col-md-3 col-lg-3">
            <div class="footer-top-box">
              <h4>Postingan Terbaru</h4>
              <ul>
                <?php foreach ($latestNews as $data) { ?>
                <li>
                  <div class="recent-post-widget">
                    <a href="<?= esc($data['slug']) ?>" class="widget-img-thumb">
                      <?= img($data['img_path'], false, ['class' => 'img-responsive'])  ?>
                    </a>
                    <div class="widget-content">
                      <h5><a href="<?= esc($data['slug']) ?>" class="sidebar-item-title"><?= esc($data['title']) ?></a></h5>
                      <p class="widget-date">Posted: <?= date('d F Y H:i', strtotime($data['updated'])) ?></p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-md-3 col-lg-3">
            <div class="footer-top-box">
              <h4>Tags</h4>
              <div class="tag"><a href="#">Acupuncture</a></div>
              <div class="tag"><a href="#">Mammography</a></div>
              <div class="tag"><a href="#">Neonatology</a></div>
              <div class="tag"><a href="#">Diabetes Education</a></div>
              <div class="tag"><a href="#">Geriatrics</a></div>
              <div class="tag"><a href="#">Kidneys</a></div>
            </div>
          </div>
          <div class="col-md-3 col-lg-3">
            <div class="footer-top-box">
              <h4>Alamat Kami</h4>
              <p><b>Location:</b> <br/>
                <b>Mob: </b><br/>
                <b>Mail: </b></p>
            </div>
            <div class="footer-top-box">
              <h4>Subscribe</h4>
              <div class="cs-form">
                <form action="#" method="post">
                  <div class="input-holder">
                    <input type="email" placeholder="Enter Valid Email Address">
                    <label> <i class="fa fa-location-arrow fa-2x"></i>
                      <input class="submit-bgcolor" type="submit" value="submit">
                    </label>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="footer-bottom" class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-9 col-lg-9">
            <div class="copyright">Copyright &copy; 2016. All Rights Reserved</div>
          </div>
          <div class="col-lg-3">
            <ul class="list-inline social-buttons">
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <?= script_tag('assets/js/jquery.min.js') ?>
    <?= script_tag('assets/js/bootstrap.min.js') ?>
    <?= script_tag('assets/js/jquery.plugin.min.js') ?>
    <?= script_tag('assets/js/jquery.isotope.min.js') ?>
    <?= script_tag('assets/js/jquery.magnific-popup.min.js') ?>
    <?= script_tag('assets/js/bootstrap-dropdownhover.min.js') ?>
    <?= script_tag('assets/js/wow.min.js') ?>
    <?= script_tag('assets/js/waypoints.min.js') ?>
    <?= script_tag('assets/js/jquery.counterup.min.js') ?>
    <?= script_tag('assets/js/main.js') ?>
  </body>
</html>