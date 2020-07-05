<div id="loginModal" class="modal fade">
  <div class="modal-dialog modal-login">
    <div class="modal-content">
      <div class="modal-header">
        <div class="avatar">
          <img src="<?php echo base_url('assets/images/avatar.png') ?>" alt="Avatar">
        </div>
        <h4 class="modal-title">Member Login</h4>
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-hidden="true"
        >&times;</button>
      </div>
      <div class="modal-body">
        <?php echo form_open('users/auth') ?>

          <!-- Error handler -->
          <?php echo view('errors/_errors_list'); ?>
          <!-- Error handler -->

          <?= csrf_field() ?>
          <div class="form-group">
            <input
              type="text"
              class="form-control"
              name="username"
              placeholder="Username"
            />
          </div>
          <div class="form-group">
            <input
              type="password"
              class="form-control"
              name="password"
              placeholder="Password"
            />
          </div>
          <div class="form-group">
            <button
              type="submit"
              class="btn btn-primary btn-lg btn-block login-btn"
            >Login</button>
          </div>
        <?php echo form_close() ?>
      </div>
      <div class="modal-footer">
        <a href="<?php echo base_url('users/register') ?>"
        >Belum Punya Akun? Daftar</a>
        <br />
        <a href="<?php echo base_url('users/reset-password') ?>"
        >Lupa Password? Reset Password</a>
      </div>
    </div>
  </div>
</div>