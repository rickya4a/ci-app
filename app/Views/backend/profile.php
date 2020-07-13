<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?= $this->include('backend/templates/_section_header') ?>

  <!-- Main content -->
  <section class="content">
    <?php echo form_open_multipart('backend/settings/'.$admin->username, 'id="myform"') ?>
      <?= csrf_field() ?>
      <div class="row">
        <div class="col-md-12">
          <!-- Error handler -->
          <?php echo view('errors/_errors_backend_form'); ?>

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Admin</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Username</label>
                <input
                  type="text"
                  id="inputName"
                  name="username"
                  value="<?php if (!empty($admin->username)) echo $admin->username ?>"
                  class="form-control"
                />
              </div>
              <div class="form-group">
                <label for="inputName">Name</label>
                <input
                  type="text"
                  id="inputName"
                  name="name"
                  value="<?php if (!empty($admin->name)) echo $admin->name ?>"
                  class="form-control"
                />
              </div>
              <div class="form-group">
                <label for="inputName">Password</label>
                <input
                  type="password"
                  id="inputName"
                  name="password"
                  class="form-control"
                />
              </div>
              <div class="form-group">
                <label for="inputName">Confirm Password</label>
                <input
                  type="password"
                  id="inputName"
                  name="confirm_password"
                  class="form-control"
                />
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="<?php echo base_url('backend/dashboard') ?>" class="btn btn-danger">Cancel</a>
          <input type="submit" value="Submit" class="btn btn-success float-right">
        </div>
      </div>
    <?php echo form_close() ?>
  </section>
  <!-- /.content -->
</div>