    <?php if (uri_string() !== 'backend/login'
              && uri_string() !== 'backend/register') { ?>
      <footer class="main-footer">
        <strong>Copyright &copy; <?= date('Y') ?> <a href="#">JMH</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
          <b>Version</b> 3.0.5
        </div>
      </footer>
    <?php } ?>

    <!-- jQuery -->
    <?= script_tag('assets/js/jquery.min.js') ?>
    <!-- jQuery UI 1.11.4 -->
    <?= script_tag('assets/js/jquery-ui.min.js') ?>
    <!-- Bootstrap 4 -->
    <?= script_tag('assets/js/bootstrap.bundle.min.js') ?>
    <!-- overlayScrollbars -->
    <?= script_tag('assets/js/jquery.overlayScrollbars.min.js') ?>
    <!-- daterangepicker -->
    <?= script_tag('assets/js/moment.min.js') ?>
    <?= script_tag('assets/js/daterangepicker.js') ?>
    <!-- Tempusdominus Bootstrap 4 -->
    <?= script_tag('assets/js/tempusdominus-bootstrap-4.min.js') ?>
    <!-- AdminLTE App -->
    <?= script_tag('assets/js/adminlte.js') ?>
    <!-- Summernote -->
    <?= script_tag('assets/js/summernote-bs4.min.js') ?>
    <!-- BS custom file input -->
    <?= script_tag('assets/js/bs-custom-file-input.min.js') ?>

    <!-- plugin init -->
    <script>
      $(function () {
        // Summernote
        $('.textarea').summernote()
      })
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script type="text/javascript">
      $(document).ready(function () {
        bsCustomFileInput.init();
      });
    </script>
  </body>
</html>