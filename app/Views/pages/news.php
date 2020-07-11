<div class="section18">
  <div class="row">
    <div class="col-md-8 col-lg-8 wow fadeInUp">
      <div class="textcont">
        <h3><?= $title ?></h3>
        <p><?= $news['body'] ?></p>
      </div>
    </div>
    <div class="col-md-4 col-lg-4 wow fadeInUp" data-wow-delay=".2s">
      <div class="section-18-img">
        <?= img($news['img_path'], FALSE, ['class' => 'img-responsive']) ?>
      </div>
    </div>
  </div>
</div>