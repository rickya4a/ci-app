<!-- Error handler -->
<?php echo view('errors/_errors_list'); ?>
<!-- Error handler -->

<section id="section16" class="section16">
  <div class="container">
    <div class="row">
      <div class="row">
        <?php echo form_open('users/register') ?>
          <?= csrf_field() ?>
          <div class="col-md-6 col-lg-6">

            <div class="control-group form-group">
              <div class="controls">
                <label> Nama Lengkap</label>
                <input
                  class="form-control"
                  id="nama_pasien"
                  type="text"
                  name="nama_pasien"
                  placeholder="Nama Lengkap"
                />
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label> Email</label>
                <input
                  class="form-control"
                  id="email"
                  type="email"
                  name="email"
                  placeholder="Email"
                />
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label> Username</label>
                <input
                  class="form-control"
                  id="username"
                  type="text"
                  name="username"
                  placeholder="Username saat login"
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
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label> No Handphone </label>
                <input
                  class="form-control"
                  id="no_hp"
                  type="text"
                  name="no_hp"
                  placeholder="No Handphone"
                />
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                  <option value="laki-laki">Laki-laki</option>
                  <option value="perempuan">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label> Tanggal Lahir </label>
                <input
                  class="form-control"
                  id="tanggal_lahir"
                  type="date"
                  name="tanggal_lahir"
                  placeholder="tanggal Lahir"
                />
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label> Tempat Lahir </label>
                <input
                  class="form-control"
                  id="tempat_lahir"
                  type="text"
                  name="tempat_lahir"
                  placeholder="Tempat Lahir"
                />
              </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-6">
          <div class="control-group form-group">
            <div class="controls">
              <label> Alamat</label>
              <textarea
                class="form-control custom-control"
                id="alamat"
                rows="4"
                name="alamat"
                placeholder="Alamat"
              ></textarea>
            </div>
          </div>

          <div class="control-group form-group">
              <div class="controls">
                <label>Agama</label>
                <select name="agama" class="form-control">
                  <option value="islam">Islam</option>
                  <option value="kristen">Kristen</option>
                  <option value="katolik">Katolik</option>
                  <option value="budha">Budha</option>
                  <option value="hindu">hindu</option>
                  <option value="khonghucu">Khonghucu</option>
                </select>
              </div>
            </div>

            <div class="control-group form-group">
              <div class="controls">
                <label>Status Perkawinan</label>
                <select name="status_perkawinan" class="form-control">
                  <option value="sudah menikah">Sudah Menikah</option>
                  <option value="belum menikah">Belum Menikah</option>
                  <option value="bercererai">Bercererai</option>
                </select>
              </div>
            </div>

          <div class="control-group form-group">
            <div class="controls">
              <label>No KTP </label>
              <input
                class="form-control"
                id="no_ktp"
                type="text"
                name="no_ktp"
                placeholder="No KTP"
              />
            </div>
          </div>
        </div>

      </div>
      <div id="success"></div>
      <!-- For success/fail messages -->
      <button
        type="submit"
        name="submit"
        class="btn btn-primary"
      >SUBMIT</button>
    </div>
  <?php echo form_close() ?>
</section>