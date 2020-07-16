<section id="section14" class="section-margine blog-list">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-lg-9">
        <div class="section-14-box">
          <?= img($news['img_path'], false, ['class' => 'img-responsive']) ?>
          <h3><?= esc($title) ?></h3>
          <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="comments">
                <a class=""><i class="fa fa-calendar"> &nbsp;
                <?= date('d F Y H:i', strtotime($news['updated'])) ?></i>
                </a>
              </div>
            </div>
          </div>
          <div class="comment-form-container wow fadeInLeft">
            <p><?= $news['body'] ?></p>
          </div>
        </div>
      </div>

      <!-- view title news on side -->
      <div class="section-14-box">
        <h4 class="underline">BERITA</h4>
        <?php foreach ($allNews as $data) :?>
        <ul>
          <li>
            <a href="<?= esc($data['slug']) ?>">
              <?= esc($data['title']) ?>
            </a>
          </li>
        </ul>
        <?php endforeach?>
      </div>
    </div>
  </div>
</section>
