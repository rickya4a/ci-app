<!-- Error handler -->
<?php echo view('errors/_errors_list'); ?>
<!-- Error handler -->

<section id="section16" class="section16">
  <div class="container">
    <div class="row">
      <?php echo form_open('users/reset-password') ?>
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
              placeholder="Username"
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
  </div>
</section>