<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?= $this->include('backend/templates/_section_header') ?>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="col-md-12">
      <!-- Error handler -->
      <?php echo view('errors/_errors_backend'); ?>

    </div>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">News</h3>

        <div class="card-tools">
          <a
            href="<?php echo base_url('backend/news/create') ?>"
            class="btn btn-primary"
            data-toggle="tooltip"
            title="Add Entry"
          >Add Entry</a>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects table-responsive">
          <thead>
            <tr>
              <th style="width: 1%">
                #
              </th>
              <th style="width: 20%">
                News Title
              </th>
              <th style="width: 30%">
                Body
              </th>
              <th>
                Image
              </th>
              <th style="width: 20%">
                Updated
              </th>
              <th style="width: 20%"></th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; foreach ($news as $row): ?>
              <tr>
                <td><?= $i ?></td>
                <td><?= $row['title'] ?></td>
                <td><?= word_limiter($row['body'], 8) ?></td>
                <td><?= img(
                  $row['img_path'],
                  FALSE,
                  ['class' => 'table-avatar']) ?>
                </td>
                <td><?= date('Y-m-d H:i:s', strtotime($row['updated'])) ?></td>
                <td class="project-actions text-right">
                  <div class="row">
                    <a
                      class="btn btn-info btn-sm"
                      href="<?= base_url('backend/news/edit/'.$row['slug']) ?>">
                      <i class="fas fa-pencil-alt">
                      </i>
                      Edit
                    </a>
                    &nbsp;
                    <a
                      class="btn btn-danger btn-sm"
                      href="<?= base_url('backend/news/delete/'.$row['id']) ?>"
                    >
                      <i class="fas fa-trash">
                      </i>
                      Delete
                    </a>
                  </div>
                </td>
              </tr>
            <?php $i++; endforeach ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>