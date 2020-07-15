<section id="inner-title" class="inner-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-6">
        <h2>Berita</h2>
      </div>
      <div class="col-md-6 col-lg-6">
        <div class="breadcrumbs">
          <ul>
            <li>Current Page:</li>
            <li><a href="index.php">Home</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Berita</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
            
<section id="section14" class="section-margine blog-list">
  <div class="container">
    <div class="row">
     <div class="col-md-9 col-lg-9">
       <div class="section-14-box">
        <?= img($news['img_path'], FALSE, ['class' => 'img-responsive'])  ?>  
          <h3><?=$title?></a></h3>
          <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="comments">
              <a class=""><i class="fa fa-calendar"> &nbsp; 
              <?= date('Y-m-d', strtotime($news['updated'])) ?></i> </a>
                <!-- <a class=""><i class="fa fa-user"></i> rkwebdes</a> -->
              </div>
            </div>
          </div>
          <p><?= $news ['body']?> </p>
          <div class="comment-form-container wow fadeInLeft">
         </div>
        </div>
      </div>
   
      <!-- view title news on side -->
      <div class="section-14-box"> 
          <h4 class="underline">BERITA</h4>
          <?php foreach ($allNews as $data) :?>
          <ul>
            <li><a href="<?= $data ['slug']?>"><?= $data['title'] ?></a></li>
         
          </ul>
          <?php endforeach?>
         
       </div>
      </div>
    </div>
  </div>
</section>
