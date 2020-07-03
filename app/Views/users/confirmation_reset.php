<section id="section16" class="section16">
  <div class="container">
    <div class="row">
      <?php echo form_open('users/confirmation-reset') ?>
        <?= csrf_field() ?>
        <div class="col-md-6 col-lg-6">

          <div class="control-group form-group">
            <div class="controls">
              <label> Username</label>
              <input
                class="form-control"
                id="username"
                type="text"
                name="username"
                value="<?= esc($user->username) ?>"
                readonly
              />
            </div>
          </div>

          <div class="control-group form-group">
            <div class="controls">
              <label> Password</label>
              <input
                class="form-control"
                id="password"
                type="password"
                name="password"
                placeholder="Password"
              />
            </div>
          </div>

          <div class="control-group form-group">
            <div class="controls">
              <label> Confirmation Password</label>
              <input
                class="form-control"
                id="confirm_password"
                type="password"
                name="confirm_password"
                placeholder="Confirmation Password"
              />
            </div>
          </div>

          <button
            type="submit"
            name="submit"
            class="btn btn-primary"
          >Submit</button>
      <?php echo form_close() ?>
    </div>
  </div>
</section>