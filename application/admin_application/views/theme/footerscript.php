<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo $this->config->item('assets_url');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!-- Sparkline -->
<!-- JQVMap -->
<!-- jQuery Knob Chart -->
<script src="<?php echo $this->config->item('assets_url');?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo $this->config->item('assets_url');?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<!-- Summernote -->
<script src="<?php echo $this->config->item('assets_url');?>plugins/summernote/summernote-bs4.min.js"></script>

<!-- overlayScrollbars -->
<!-- AdminLTE App -->
<script src="<?php echo $this->config->item('assets_url');?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $this->config->item('assets_url');?>dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo $this->config->item('assets_url');?>dist/js/pages/dashboard.js"></script>
<script type="text/javascript">
  $("#log_out").attr("href", "<?php echo base_url('login/logout'); ?>")
  $(function($) {
 
    // this script needs to be loaded on every page where an ajax POST may happen
    $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });
 
 
  // now write your ajax script 
 
});
</script>
<script>
  $(function () {
    $("#data-table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script type="text/javascript">
  $('.delete').click(function(event) {
    event.preventDefault();
    var r=confirm("Are you sure you want to delete?");
    if (r==true)   {  
       window.location = $(this).attr('href');
    }

});
  
  $('.active-inactive').click(function(event) {
    event.preventDefault();
    var r=confirm("Are you sure to change the status?");
    if (r==true)   {  
       //window.location = $(this).attr('href');
       window.location.href= $(this).data("target");
    }

});
</script>
</body>
</html>
