    <?php if (uri_string() !== 'backend/login'
              && uri_string() !== 'backend/register') { ?>
      <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 <a href="#">Medicamp</a>.</strong>
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
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <?= script_tag('assets/js/bootstrap.bundle.min.js') ?>
    <!-- Tempusdominus Bootstrap 4 -->
    <?= script_tag('assets/js/tempusdominus-bootstrap-4.min.js') ?>
    <!-- overlayScrollbars -->
    <?= script_tag('assets/js/jquery.overlayScrollbars.min.js') ?>
    <!-- daterangepicker -->
    <?= script_tag('assets/js/moment.min.js') ?>
    <?= script_tag('assets/js/daterangepicker.js') ?>
    <!-- AdminLTE App -->
    <?= script_tag('assets/js/adminlte.js') ?>
  </body>
</html>