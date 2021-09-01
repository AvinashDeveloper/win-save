<style>


   div#example_wrapper > .row:last-child {
    position: absolute;
    bottom: 10px;
}
 div#example_wrapper > .row:first-child {
    position: absolute;
    top: 10px;
    display: flex;
    width: 93%;
    flex-direction: row;
}
div.dataTables_wrapper div.dataTables_info {
    display: inline-block;
    white-space: nowrap;
}
div#example_length {
    float: left;
}
div#example_filter
{
    float:right;
}
.table-responsive {
    display: inline-block;
    width: 100%;
    overflow-x: auto;
    margin: 30px 0px;
}    
    
</style>

<!--  <script type="text/javascript" src="<?php echo base_url();  ?>venders/admin/assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();  ?>venders/admin/assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();  ?>venders/admin/assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();  ?>venders/admin/assets/js/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();  ?>venders/admin/assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
 <script type="text/javascript" src="<?php echo base_url();  ?>venders/admin/assets/js/modernizr/modernizr.js"></script>
<script type="text/javascript" src="<?php echo base_url();  ?>venders/admin/assets/js/modernizr/css-scrollbars.js"></script>
 <script type="text/javascript" src="<?php echo base_url();  ?>venders/admin/assets/js/script.js"></script>
<script src="<?php echo base_url();  ?>venders/admin/assets/js/pcoded.min.js"></script>
<script src="<?php echo base_url();  ?>venders/admin/assets/js/vartical-demo.js"></script>
<script src="<?php echo base_url();  ?>venders/admin/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
 -->
  <script src="<?php echo base_url();?>venders/dist-assets/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>venders/dist-assets/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>venders/dist-assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>venders/dist-assets/js/scripts/script.min.js"></script>
    <script src="<?php echo base_url();?>venders/dist-assets/js/scripts/sidebar.large.script.min.js"></script>
     <script src="<?php echo base_url();?>venders/dist-assets/js/plugins/echarts.min.js"></script>
    <script src="<?php echo base_url();?>venders/dist-assets/js/scripts/echart.options.min.js"></script>
    <script src="<?php echo base_url();?>venders/dist-assets/js/scripts/dashboard.v1.script.min.js?v=15"></script>
        <script src="<?php echo base_url();?>venders/dist-assets/js/plugins/datatables.min.js"></script>
    <script src="<?php echo base_url();?>venders/dist-assets/js/scripts/datatables.script.min.js"></script>
<script>
	$(document).ready(function() {
    $('#example').DataTable();
} );



$(document).ready(function() {
    $('table.display').DataTable();
} );
</script>

 <script>
     setTimeout(function() {
  $('#successMessage').fadeOut('fast');
}, 1000); // <-- time in milliseconds




    </script>
</body>

</html>