<?php $errors_login = session()->getFlashdata('errors_login');?>

<?php if (!empty($errors_login)): ?> <!-- error handler -->
<div class="alert alert-danger" role="alert">
  <ul class="fa-ul">
    <?php foreach ($errors_login as $error) : ?>
        <li><i class="fa-li fa fa-times"></i> <?= esc($error) ?></li>
    <?php endforeach ?>
  </ul>
</div>
<?php endif ?>