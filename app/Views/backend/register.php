<?= \Config\Services::validation()->listErrors(); ?>

<?php echo form_open('backend/register', 'id="myform"') ?>
  <?= csrf_field() ?>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
<?php echo form_close() ?>