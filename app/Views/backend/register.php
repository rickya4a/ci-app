<!-- Error handler -->
<?php echo view('errors/_errors_list'); ?>
<!-- Error handler -->

<?php echo form_open('backend/register', 'id="myform"') ?>
  <?= csrf_field() ?>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <div class="form-group">
    <label for="confirm_password">Confirm Password</label>
    <input type="password" class="form-control" id="password" name="confirm_password">
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
<?php echo form_close() ?>