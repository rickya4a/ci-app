<?= $this->include('backend/templates/header') ?>

  <?php if (!empty(session('isAdmin'))) { ?>
    <?= $this->include('backend/templates/navbar') ?>
    <?= $this->include('backend/templates/sidebar') ?>
  <?php } ?>

  <?php echo $content ?>

<?= $this->include('backend/templates/footer') ?>