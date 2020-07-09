<!-- Error handler -->
<?php echo view('errors/_errors_list'); ?>
<!-- Error handler -->

<div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Admin</b>Medicamp</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">New Admin</p>

      <?php echo form_open('backend/register', 'id="myform"') ?>
        <?= csrf_field() ?>
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-card"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="confirm_password" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close() ?>

      <a href="<?php echo base_url('backend/login') ?>" class="text-center">Sign In</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>