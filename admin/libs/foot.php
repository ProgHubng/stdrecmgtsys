<!-- Main Footer -->
  <footer class="main-footer footpara">
  <!-- To the right -->
    <div class="col-md-12 col-sm-12 col-xs-12 pull-top">
    <!-- Default to the left -->
    <p class=""> <span> Ladoke Akintola University  of Techology | Copyright &copy; <?php echo date("Y"); ?></span> All Rights Reserved.</p>
    </div>

  </footer>


<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.0 -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/app.min.js"></script>
<script src="datatables/jquery.dataTables.min.js"></script>
<script src="datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
  $(function(){
    $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
  });
  $.uploadPreview({
      input_field: "#image-upload",
      preview_box: "#image-preview",
      label_field: "#image-label"
    });
</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>

