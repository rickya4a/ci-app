<?php
$error = session()->getFlashdata('error');
$success = session()->getFlashdata('success');
if (!empty($error)): ?> <!-- error handler -->
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-ban"></i> Uh-oh!</h5>
    <?= esc($error) ?>
  </div>
<?php elseif (!empty($success)): ?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Hooray!</h5>
    <?= esc($success) ?>
  </div>
<?php endif ?>