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
        <h3 class="card-title">Users</h3>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects table-responsive">
          <thead>
            <tr>
              <th style="width: 1%">
                #
              </th>
              <th style="width: 20%">
                Name
              </th>
              <th style="width: 30%">
                Email
              </th>
              <th>
                Username
              </th>
              <th style="width: 20%">
                Phone
              </th>
              <th style="width: 20%">
                Gender
              </th>
              <th style="width: 20%">
                Date of Birth
              </th>
              <th style="width: 20%">
                Address
              </th>
              <th style="width: 20%">
                ID No.
              </th>
              <th style="width: 20%"></th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; foreach ($users as $row): ?>
              <tr>
                <td><?= $i ?></td>
                <td><?= $row->name ?></td>
                <td><?= $row->email ?></td>
                <td><?= $row->username ?></td>
                <td><?= $row->phone ?></td>
                <td><?= $row->sex ?></td>
                <td><?= date('d-m-Y', strtotime($row->date_of_birth)) ?></td>
                <td><?= $row->address ?></td>
                <td><?= $row->id_no ?></td>
                <td class="project-actions text-right">
                  <div class="row">
                    <a
                      class="btn btn-danger btn-sm"
                      href="<?= base_url('backend/users/delete/'.$row->id) ?>"
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