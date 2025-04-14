</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <!--<b>Version</b> 3.2.0-->
      <?php if (OBIB_LIBRARY_URL != "") { ?>
            <a href="<?php echo H(OBIB_LIBRARY_URL);?>"><?php echo $headerLoc->getText("footerLibraryHome"); ?></a> |
      <?php }
          if (OBIB_OPAC_URL != "") { ?>
            <a href="<?php echo H(OBIB_OPAC_URL);?>"><?php echo $headerLoc->getText("footerOPAC"); ?></a> |
     <?php } ?>
     <a href="../home/index.php">Admin</a> |
     <a href="javascript:popSecondary('../shared/help.php<?php if (isset($helpPage)) echo "?page=".H(addslashes(U($helpPage))); ?>')"><?php echo $headerLoc->getText("footerHelp"); ?></a>
    </div>
    <?php echo $headerLoc->getText("footerPoweredBy"); ?> <?php echo H(OBIB_CODE_VERSION);?>
    <?php echo $headerLoc->getText("footerDatabaseVersion"); ?> <?php echo H(OBIB_DB_VERSION);?>&nbsp;
    <?php echo $headerLoc->getText("footerCopyright"); ?> &copy; 2002-2024 Dave Stevens, et al.&nbsp;
    <?php echo $headerLoc->getText("footerUnderThe"); ?>
    <a href="../shared/copying.html"><?php echo $headerLoc->getText("footerGPL"); ?></a>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../lib/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../lib/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<!--
<script src="../lib/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../lib/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../lib/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../lib/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../lib/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../lib/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../lib/AdminLTE/plugins/jszip/jszip.min.js"></script>
<script src="../lib/AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../lib/AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../lib/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../lib/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../lib/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
-->
<!-- AdminLTE App -->
<script src="../lib/AdminLTE/dist/js/adminlte.min.js"></script>
<script src="../lib/AdminLTE/dist/js/sidebar.js"></script>

<!-- Prevent Navbar Title FadeOut Script -->
<script src="../js/prevent-title-fadeout.js"></script>

<!--
<script src='//code.jquery.com/jquery-2.0.3.min.js'></script>
<script src='//netdna.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>
-->

</body>
</html>
