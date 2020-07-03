<?= \Config\Services::validation()->listErrors(); ?>
<?php echo '<pre>';
print_r($_SESSION);
echo '</pre>'; ?>

<?php echo form_open('backend/auth', 'id="myform"') ?>
  <?= csrf_field() ?>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
<?php echo form_close() ?>