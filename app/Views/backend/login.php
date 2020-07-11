<?php if (session('success')): ?>
  <p class="success alert alert-success">
    <i class="fa fa-check"></i>
    <?php echo session()->getFlashdata('success'); ?>
  </p>
<?php elseif (session('error')): ?>
  <p class="danger alert alert-danger">
    <i class="fa fa-ban"></i>
    <?php echo session()->getFlashdata('error'); ?>
  </p>
<?php endif ?>

<!-- Error handler -->
<?php echo view('errors/_errors_login'); ?>

<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>JMH</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login</p>

      <?php echo form_open('backend/auth', 'id="myform"') ?>
        <?= csrf_field() ?>
        <div class="input-group mb-3">
          <input type="username" name="username" class="form-control" placeholder="Username">
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
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      <?php echo form_close() ?>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
