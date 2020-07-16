<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?= $this->include('backend/templates/_section_header') ?>

  <!-- Main content -->
  <section class="content">
    <?php echo form_open_multipart(
      'backend/news/edit/'.$news['slug'],
      'id="myform"') ?>
      <?= csrf_field() ?>
      <div class="row">
        <div class="col-md-12">
          <!-- Error handler -->
          <?php echo view('errors/_errors_backend_form'); ?>

          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">News</h3>

              <div class="card-tools">
                <button
                  type="button"
                  class="btn btn-tool"
                  data-card-widget="collapse"
                  data-toggle="tooltip"
                  title="Collapse"
                ><i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">News Title</label>
                <input
                  type="text"
                  id="inputName"
                  name="title"
                  value="<?php if (!empty($news['title']))
                    echo $news['title'] ?>"
                  class="form-control"
                />
              </div>
              <div class="form-group">
                <label for="inputName">News Body</label>
                <textarea class="textarea"
                  placeholder="Place some text here"
                  name="body"
                  style="width: 100%;
                    height: 200px;
                    font-size: 11px;
                    line-height: 18px;
                    border: 1px solid #dddddd;
                    padding: 10px;"
                >
                  <?php if (!empty($news['body']))
                    echo $news['body'] ?>
                </textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Image</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input
                      type="file"
                      class="custom-file-input"
                      name="image"
                      id="exampleInputFile"
                    />
                    <label
                      class="custom-file-label"
                      for="exampleInputFile"
                    >Choose file</label>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a
            href="<?php echo base_url('backend/news') ?>"
            class="btn btn-danger"
          >Cancel</a>
          <input
            type="submit"
            value="Create"
            class="btn btn-success float-right"
          />
        </div>
      </div>
    <?php echo form_close() ?>
  </section>
  <!-- /.content -->
</div>