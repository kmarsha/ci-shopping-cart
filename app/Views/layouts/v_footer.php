  </div>

<!-- jQuery -->
<!-- <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script> -->
<!-- <script src="<?= base_url() ?>/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>/plugins/jquery-validation/additional-methods.min.js"></script> -->

<!-- jQuery UI 1.11.4
<script src="<?= base_url() ?>/plugins/jquery-ui/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?= base_url() ?>/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>/dist/js/pages/dashboard.js"></script>

<script src="<?= base_url() ?>/dist/snackbar.min.js"></script>
<script src="<?= base_url() ?>/dist/init.js"></script>

<script>
  function successNotif(msg) {
    Snackbar.show({
      text: msg,
      showAction: true,
      actionText: 'Dismiss',
      actionTextColor: '#5cb85c',
      backgroundColor: '#232323',
      width: 'auto',
      pos: 'bottom-left'
    });
  }

  function errorNotif(msg) {
    Snackbar.show({
      text: msg,
      showAction: true,
      actionText: 'Dismiss',
      actionTextColor: '#d9534f',
      backgroundColor: '#232323',
      width: 'auto',
      pos: 'bottom-left'
    });
  }

</script>

<?php
    if (session()->has('success')) {
        $msg = session()->getFlashdata('success');
        echo "<script>successNotif('$msg')</script>";
    }

    if (session()->has('error')) {
        $msg = session()->getFlashdata('error');
        echo "<script>errorNotif('$msg')</script>";
    }
?>
</body>
</html>
