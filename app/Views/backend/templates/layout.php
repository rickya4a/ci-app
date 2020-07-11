<?php if (!empty(session('isAdmin'))): ?>
  <?= $this->include('backend/templates/header') ?>
  <div class="wrapper">
    <?= $this->include('backend/templates/navbar') ?>
    <?= $this->include('backend/templates/sidebar') ?>
    <?php echo $content ?>
    <?= $this->include('backend/templates/footer') ?>
  </div>
<?php else: ?>
  <?= $this->include('backend/templates/header') ?>
  <?php echo $content ?>
  <?= $this->include('backend/templates/footer') ?>
<?php endif ?>