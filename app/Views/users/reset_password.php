<?php $errors = session()->getFlashdata('errors');
if (!empty($errors)): ?> <!-- error handler -->
  <div class="alert alert-danger" role="alert">
    <ul class="fa-ul">
      <?php foreach ($errors as $error) : ?>
          <li><i class="fa-li fa fa-times"></i> <?= esc($error) ?></li>
      <?php endforeach ?>
    </ul>
  </div>
<?php endif ?> <!-- error handler -->

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