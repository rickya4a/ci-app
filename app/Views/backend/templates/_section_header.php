<?php $uri = service('uri') ?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1><?= esc($title) ?></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="<?php echo base_url('backend/dashboard') ?>"
            >Home</a>
          </li>
          <li class="breadcrumb-item active">
            <?= ucfirst($uri->getSegment(2)) ?>
          </li>
        </ol>
      </div><!-- /.col -->
    </div>
  </div><!-- /.container-fluid -->
</section>