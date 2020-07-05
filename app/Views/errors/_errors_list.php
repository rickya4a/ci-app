<?php $errors = session()->getFlashdata('errors');
if (!empty($errors)): ?> <!-- error handler -->
<div class="alert alert-danger" role="alert">
  <ul class="fa-ul">
    <?php foreach ($errors as $error) : ?>
        <li><i class="fa-li fa fa-times"></i> <?= esc($error) ?></li>
    <?php endforeach ?>
  </ul>
</div>
<?php endif ?>