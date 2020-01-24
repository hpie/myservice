<!--**********************************
          Footer start
      ***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright &copy; Designed & Developed by <a href="https://hpie.in">Hpie</a> 2018</p>
    </div>
</div>
<!--**********************************
    Footer end
***********************************-->
</div>
<!--**********************************
    Main wrapper end
***********************************-->

<!--**********************************
    Scripts
***********************************-->
<script src="<?php echo BASE_URL ?>assets/jquery/dist/jquery.min.js"></script>
<script src="<?php echo ASSETS_FRONT; ?>plugins/common/common.min.js"></script>
<script src="<?php echo ASSETS_FRONT; ?>js/custom.min.js"></script>
<script src="<?php echo ASSETS_FRONT; ?>js/settings.js"></script>
<script src="<?php echo ASSETS_FRONT; ?>js/gleek.js"></script>
<script src="<?php echo ASSETS_FRONT; ?>js/styleSwitcher.js"></script>



<?php if ($TITLE === TITLE_COMPLAIN_ASSIGN_FORM) { ?>

    <script src="<?php echo ASSETS_FRONT; ?>plugins/validation/jquery.validate.min.js"></script>
    <script src="<?php echo ASSETS_FRONT; ?>plugins/validation/jquery.validate-init.js"></script>
    <script src="<?php echo ASSETS_FRONT; ?>plugins/moment/moment.js"></script>
    <script src="<?php echo ASSETS_FRONT; ?>plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>    
   
    <!-- Date Picker Plugin JavaScript -->
    <script src="<?php echo ASSETS_FRONT; ?>plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="<?php echo ASSETS_FRONT; ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo ASSETS_FRONT; ?>plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="<?php echo ASSETS_FRONT; ?>js/plugins-init/form-pickers-init.js"></script>

    
<?php } ?>

<?php if ($TITLE === TITLE_COMPLAIN_LIST) { ?>
<!-- Datatables -->
<script src="<?php echo BASE_URL ?>assets/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo ASSETS_FRONT; ?>plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo BASE_URL; ?>/assets/front/js/dataTables.responsive.min.js"></script>
<?php } ?>
 <!--Circle progress -->-->
<script src="<?php echo ASSETS_FRONT; ?>plugins/circle-progress/circle-progress.min.js"></script>
<!-- Pignose Calender -->
<!--<script src="<?php echo ASSETS_FRONT; ?>plugins/moment/moment.min.js"></script>-->

<?php if ($TITLE === TITLE_COMPLAIN_LIST) { ?>
    <script>
        $(document).ready(function () {
            fill_datatable();
            function fill_datatable(year = '',month = '',taxtype='',searchFromToDate='')
            {   var status = $('#status').val();      
                $('#example').DataTable({
                    responsive: {
                        details: {
                            type: 'column',
                            target: 'tr'
                        }
                    },
                    columnDefs: [{
                            className: 'control',
                            orderable: false,
                            targets: 0
                        }],
                    "processing": true,
                    "serverSide": true,
                    "paginationType": "full_numbers",
                    "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
                    "ajax": {
                        'type': 'POST',
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/complainListManager.php' ?>",
                        'data': {
                            year:year,
                            month:month,
                            taxtype:taxtype,
                            searchFromToDate:searchFromToDate,
                            status:status
                        }
                    },
                    "columns": [
                        {"data": "index"},
                        {"data": "ticket_id"},
                        {"data": "customer_mobile_number"},
                        {"data": "appointment_date"},
                        {"data": "appointment_time_range"},
                        {"data": "location_longitude"},
                        {"data": "location_latitude"},                       
                        {"data": "service_item_id"},
                        {"data": "service_type_id"},
                        {"data": "Assign"},
                        {"data": "service_desc"},
                        {"data": "ticket_status"},
                        {"data": "invoice_amount"}
                    ]
                });
            }
//            $('#searchYear').click(function () {
//                var year = $('#dp4').val();                
//                if (year != '')
//                {
//                    $('#example').DataTable().destroy();
//                    fill_datatable(year,'');
//                } else
//                {
//                    alert('Select Year');
//                    $('#example').DataTable().destroy();
//                    fill_datatable();
//                }
//            });
//            $('#searchMonth').click(function () {
//                var month = $('#dp5').val();               
//                if (month != '')
//                {
//                    $('#example').DataTable().destroy();
//                    fill_datatable('',month);
//                } else
//                {
//                    alert('Select Month');
//                    $('#example').DataTable().destroy();
//                    fill_datatable();
//                }
//            });
//            $('#searchTaxType').click(function () {
//                var taxtype = $('#selectTaxType').children("option:selected").val();                             
//                if (taxtype != '')
//                {
//                    $('#example').DataTable().destroy();
//                    fill_datatable('','',taxtype);
//                } else
//                {
//                    alert('Select Tax Type');
//                    $('#example').DataTable().destroy();
//                    fill_datatable();
//                }
//            });
//            $('#searchFromToDate').click(function () {
//                var searchFromToDate = $('.single_cal1').val();               
//                if (searchFromToDate != '')
//                {
//                    $('#example').DataTable().destroy();
//                    fill_datatable('','','',searchFromToDate);
//                } else
//                {
//                    alert('Select Proper Date');
//                    $('#example').DataTable().destroy();
//                    fill_datatable();
//                }
//            });           
        });
    </script>
<?php } ?>  

</body>

</html>