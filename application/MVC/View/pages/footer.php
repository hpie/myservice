<!-- footer content -->
<footer>
    <div class="pull-right">
        <h4>Designe by <a href="http://www.codexives.com">Codexives.com</a></h4>
    </div>
    <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>
<div id="ApprovedstatusModal" class="modal main_popup fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close press_no" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button> 
                <h4 class="modal-title" id="myModalLabel" style="">Confirmation!</h4>
            </div>
            <div class="modal-body">
                <p style="">Are you sure you want to <strong id="modelboxstatus" style="color: #0c97fe;">Approved?</strong></p>
            </div>
            <div class="modal-footer" style="border-top: 1px solid #0c97fe;"> <button type="button" class="btn btn-default press_no" data-dismiss="modal">No</button> <button type="button" class="btn btn-primary press_yes" data-id="0" data-value="none">Yes</button> </div>
        </div>
    </div>
</div>
<!-- jQuery -->

<script src="<?php echo BASE_URL ?>assets/jquery/dist/jquery.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/icheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo BASE_URL ?>assets/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="<?php echo BASE_URL ?>assets/nprogress/nprogress.js"></script>

<!-- DateJS -->
<script src="<?php echo BASE_URL ?>assets/moment/min/moment.min.js"></script>
<!-- PNotify -->
<script src="<?php echo BASE_URL ?>assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo BASE_URL ?>assets/pnotify/dist/pnotifyadmin.js"></script>    
<!-- bootstrap-wysiwyg -->
<script src="<?php echo BASE_URL ?>assets/editor/jquery.hotkeys.js"></script>
<script src="<?php echo BASE_URL ?>assets/editor/prettify.js"></script>
<!-- Datatables -->
<script src="<?php echo BASE_URL ?>assets/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js" ></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js" type="text/javascript" ></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>


<!--<script src="<?php echo BASE_URL; ?>/assets/front/js/jquery.dataTables.min.js" type="text/javascript"></script>-->
<script type="text/javascript" language="javascript" src="<?php echo BASE_URL; ?>/assets/front/js/dataTables.responsive.min.js"></script>
<!--Slider--> 
<!-- ECharts -->
<script src="<?php echo BASE_URL ?>assets/echarts/dist/echarts.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/echarts/map/js/world.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?php echo BASE_URL ?>assets/build/js/custom.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/moment/moment.min.js"></script>
<!--<script src="<?php echo BASE_URL; ?>assets/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>-->
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
<script>

//    $(function () {
//        $('input[name="datefilter"]').daterangepicker({
//            autoUpdateInput: false,
//            locale: {
//                cancelLabel: 'Clear'
//            }
//        });
//        $('input[name="datefilter"]').on('apply.daterangepicker', function (ev, picker) {
//            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' To ' + picker.endDate.format('MM/DD/YYYY'));
//        });
//        $('input[name="datefilter"]').on('cancel.daterangepicker', function (ev, picker) {
//            $(this).val('');
//        });
//
//    });
    $(document).ready(function () {

        if (<?php
if (isset($_SESSION['existrecordMobile'])) {
    echo $_SESSION['existrecordMobile'];
}
?> == 1) {
            var d = new PNotify({
                title: 'Mobile number allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
<?php echo $_SESSION['existrecordMobile'] = 0; ?>;
        }
        if (<?php
if (isset($_SESSION['existrecordEmail'])) {
    echo $_SESSION['existrecordEmail'];
}
?> == 1) {
            var d = new PNotify({
                title: 'Email allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
<?php echo $_SESSION['existrecordEmail'] = 0; ?>;
        }


        if (<?php
if (isset($_SESSION['dataupdate'])) {
    echo $_SESSION['dataupdate'];
}
?> == 1) {
            var d = new PNotify({
                title: 'Data updated successfully',
                type: 'success',
                styling: 'bootstrap3'
            });
<?php echo $_SESSION['dataupdate'] = 0; ?>;
        }


        if (<?php
if (isset($_SESSION['addData'])) {
    echo $_SESSION['addData'];
}
?> == 1) {
            var d = new PNotify({
                title: 'Add data successfully',
                type: 'success',
                styling: 'bootstrap3'
            });
<?php echo $_SESSION['addData'] = 0; ?>;
        }


        if (<?php
if (isset($_SESSION['addEmployee'])) {
    echo $_SESSION['addEmployee'];
}
?> == 1) {
            var d = new PNotify({
                title: 'Add data successfully',
                type: 'success',
                styling: 'bootstrap3'
            });
<?php echo $_SESSION['addEmployee'] = 0; ?>;
        }
        if (<?php
if (isset($_SESSION['assignComplain'])) {
    echo $_SESSION['assignComplain'];
}
?> == 1) {
            var d = new PNotify({
                title: 'Appointment assigned successfully',
                type: 'success',
                styling: 'bootstrap3'
            });
<?php echo $_SESSION['assignComplain'] = 0; ?>;
        }
//        $('#dp4').datepicker({
//            format: 'yyyy',
//            viewMode: 'years', 
//            minViewMode: 'years'         
//        }); 
<?php if ($TITLE === TITLE_ADD_EMPLOYEE) { ?>
            $('#dp3').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                endDate: new Date()
            });
<?php } ?>
<?php if ($TITLE === TITLE_COMPLAIN_LIST || $TITLE === TITLE_COMPLAIN_ASSIGN_FORM || $TITLE === TITLE_ADD_TICKET) { ?>
            $('#dp4').datepicker({
                format: 'yyyy',
                viewMode: 'years',
                minViewMode: 'years',
                autoclose: true
            });
            $('#dp3').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
            $('#dp5').datepicker({
                dateFormat: 'MM yy',
                format: 'mm-yyyy',
                viewMode: 'months',
                minViewMode: 'months',
                autoclose: true
            });

            $('#datetimepicker3').datetimepicker({
                format: 'HH:mm'
            });
            $('#datetimepicker4').datetimepicker({
                format: 'HH:mm'
            });


<?php } ?>
    });
</script>
<script>
    $(document).ready(function () {
        $(".myTable").DataTable({
            dom: "Bfrtip",
            buttons: [
                {
                    extend: "copy",
                    className: "btn-sm"
                },
                {
                    extend: "csv",
                    className: "btn-sm"
                },
                {
                    extend: "excel",
                    className: "btn-sm"
                },
                {
                    extend: "pdfHtml5",
                    className: "btn-sm"
                },
                {
                    extend: "print",
                    className: "btn-sm"
                },
            ],
            "ordering": false,
            "pageLength": 20,
            "orderable": false,
            "bLengthChange": false,
            "paging": true,
            "info": false,
            "bFilter": true,
            "bSort": false,
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function (row) {
                            var data = row.data();
                            return 'Details for ' + data[0] + ' ' + data[1];
                        }
                    }),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            }
        });

        $('.single_cal1').daterangepicker({
//            placeholder: "Select from to date",
            singleClasses: "picker_1",
            maxDate: new Date(),
            locale: {
                format: 'YYYY-MM-DD'
            }
        }, function (start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
        });
        $('.single_cal1').on('apply.daterangepicker', function (ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' To ' + picker.endDate.format('YYYY-MM-DD'));
        });
        $('.single_cal1').val('');
    });
</script>
<?php if ($TITLE === TITLE_COMPLAIN_LIST) { ?>
    <script>
        $(document).ready(function () {
            fill_datatable();
            function fill_datatable(year = '', month = '', taxtype = '', searchFromToDate = '')
            {
                var status = $('#status').val();
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
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/complainList.php' ?>",
                        'data': {
                            year: year,
                            month: month,
                            taxtype: taxtype,
                            searchFromToDate: searchFromToDate,
                            status: status
                        }
                    },
                    "columns": [
                        {"data": "index"},
                        {"data": "ticket_id"},
                        {"data": "customer_mobile_number"},
                        {"data": "appointment_date"},
                        {"data": "appointment_time_range"},
                        {"data": "address"},                        
                        {"data": "service_item_id"},
                        {"data": "service_type_id"},
                        {"data": "Assign"},
                        {"data": "service_desc"},
                        {"data": "ticket_status"},
                        {"data": "invoice_amount"}
                    ]
                });
            }
            $('#searchYear').click(function () {
                var year = $('#dp4').val();
                if (year != '')
                {
                    $('#example').DataTable().destroy();
                    fill_datatable(year, '');
                } else
                {
                    alert('Select Year');
                    $('#example').DataTable().destroy();
                    fill_datatable();
                }
            });
            $('#searchMonth').click(function () {
                var month = $('#dp5').val();
                if (month != '')
                {
                    $('#example').DataTable().destroy();
                    fill_datatable('', month);
                } else
                {
                    alert('Select Month');
                    $('#example').DataTable().destroy();
                    fill_datatable();
                }
            });
            $('#searchTaxType').click(function () {
                var taxtype = $('#selectTaxType').children("option:selected").val();
                if (taxtype != '')
                {
                    $('#example').DataTable().destroy();
                    fill_datatable('', '', taxtype);
                } else
                {
                    alert('Select Tax Type');
                    $('#example').DataTable().destroy();
                    fill_datatable();
                }
            });
            $('#searchFromToDate').click(function () {
                var searchFromToDate = $('.single_cal1').val();
                if (searchFromToDate != '')
                {
                    $('#example').DataTable().destroy();
                    fill_datatable('', '', '', searchFromToDate);
                } else
                {
                    alert('Select Proper Date');
                    $('#example').DataTable().destroy();
                    fill_datatable();
                }
            });


    //            $(document).on('click', '.btn_approve_reject', function () {
    //                var self = $(this);
    //                var status = self.attr('data-status');
    //                var user_status = 'ACTIVE';
    //                if (status == 1)
    //                    user_status = 'INACTIVE';
    //                if (!confirm('Are you sure want to ' + user_status.toLocaleLowerCase() + ' employee?'))
    //                    return;
    //                self.attr('disabled', 'disabled');
    //                var data = {
    //                    'tax_employee_id': self.data('id'),
    //                    'tax_employee_status': user_status
    //                };
    //                $.ajax({
    //                    type: "POST",
    //                    url: "<?php //echo ADMIN_EMPLOYEE_APPROVE_LINK  ?>",
    //                    data: data,
    //                    success: function (res) {
    //                        var res = $.parseJSON(res);
    //                        if (res.suceess) {
    //                            var title = 'Click to deactivate employee';
    //                            var class_ = 'btn_approve_reject btn btn-success btn-xs';
    //                            var text = 'Active';
    //                            var isactive = 1;
    //
    //                            if (status == 1) {
    //                                title = 'Click to active employee';
    //                                class_ = 'btn_approve_reject btn btn-danger btn-xs';
    //                                text = 'Inactive';
    //                                isactive = 0;
    //                                new PNotify({
    //                                    title: 'Employee InActived Successfully',
    //                                    type: 'success',
    //                                    styling: 'bootstrap3'
    //                                });
    //
    //                            } else {
    //                                new PNotify({
    //                                    title: 'Employee Actived Successfully',
    //                                    type: 'success',
    //                                    styling: 'bootstrap3'
    //                                });
    //                            }
    //                            self.removeClass().addClass(class_);
    //                            self.attr({
    //                                'data-status': isactive,
    //                                'title': title
    //                            });
    //                            self.removeAttr('disabled');
    //                            self.html(text);
    //                        }
    //                    }
    //                });
    //            });
        });
    </script>
<?php } ?>    
<?php if ($TITLE === TITLE_EMPLOYEE_LIST) { ?>
    <script>
        $(document).ready(function () {
            fill_datatable();
            function fill_datatable(year = '', month = '', taxtype = '', searchFromToDate = '')
            {
                var status = $('#status').val();
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
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/employeeList.php' ?>",
                        'data': {
                            year: year,
                            month: month,
                            taxtype: taxtype,
                            searchFromToDate: searchFromToDate,
                            status: status
                        }
                    },
                    "columns": [
                        {"data": "index"},
                        {"data": "employee_id"},
                        {"data": "employee_fname"},
                        {"data": "employee_mname"},
                        {"data": "employee_lname"},
                        {"data": "employee_mobile_number"},
                        {"data": "employee_email"},
                        {"data": "role_code"},
                        {"data": "edit"}
                    ]
                });
            }
        });
    </script>
<?php } ?>    
<?php if ($TITLE === TITLE_ITEM_MAKE_LIST) { ?>
    <script>
        $(document).ready(function () {
            fill_datatable();
            function fill_datatable()
            {
                var status = $('#status').val();
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
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/itemMakeList.php' ?>"
                    },
                    "columns": [
                        {"data": "index"},
                        {"data": "item_make_code"},
                        {"data": "item_make_description"},
                        {"data": "item_make_mobile"},
                        {"data": "item_make_phone"},
                        {"data": "item_make_email"},
                        {"data": "item_make_address"},
                        {"data": "item_make_city"},
                        {"data": "item_make_state"},
                        {"data": "item_make_country"},
                        {"data": "item_status"},
                        {"data": "edit"}
                    ]
                });
            }
        });
    </script>
<?php } ?>   
<?php if ($TITLE === TITLE_ITEM_LIST) { ?>
    <script>
        $(document).ready(function () {
            fill_datatable();
            function fill_datatable()
            {
                var status = $('#status').val();
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
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/itemList.php' ?>"
                    },
                    "columns": [
                        {"data": "index"},
                        {"data": "item_code"},
                        {"data": "item_make_code"},
                        {"data": "item_desc"},
                        {"data": "item_status"},
                        {"data": "edit"}
                    ]
                });
            }
        });
    </script>
  
<?php } ?>
<?php if ($TITLE === TITLE_ADD_TICKET) { ?>    
       <script type="text/javascript">
        var map;        
        function initMap() {                            
            var latitude = 27.7172453; // YOUR LATITUDE VALUE
            var longitude = 85.3239605; // YOUR LONGITUDE VALUE            
            var myLatLng = {lat: latitude, lng: longitude};
            
            map = new google.maps.Map(document.getElementById('map'), {
              center: myLatLng,
              zoom: 14,
              mapTypeId: google.maps.MapTypeId.ROADMAP
               // disable the default map zoom on double click
            });                                           
            var marker = new google.maps.Marker({
              position: myLatLng,
              map: map          
            });                                      
            google.maps.event.addListener(map, 'click', function (event) {
                document.getElementById('latclicked').value = event.latLng.lat();
                document.getElementById('longclicked').value =  event.latLng.lng();        
                var latlng = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        if (results[1]) {
                             document.getElementById('location').value =results[1].formatted_address;        
                        }
                    }
                });
                marker.setMap(null);    
                marker = new google.maps.Marker({
                  position: event.latLng, 
                  map: map, 
                  mapTypeId: google.maps.MapTypeId.ROADMAP,
                  title: event.latLng.lat()+', '+event.latLng.lng()
                });                               
            });            
        }
        </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOo8VS-DubgppGE3b94PsvweQyYqzrKGI&libraries=places&callback=initMap" async defer></script>
    <?php } ?>
</body>
</html>