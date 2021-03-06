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

<script src="<?php echo BASE_URL ?>assets/adminassets/jquery/dist/jquery.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/adminassets/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/adminassets/icheck/icheck.min.js"></script>
<!-- NProgress -->
<script src="<?php echo BASE_URL ?>assets/adminassets/nprogress/nprogress.js"></script>
<!-- DateJS -->
<script src="<?php echo BASE_URL ?>assets/adminassets/moment/min/moment.min.js"></script>
<!-- PNotify -->
<script src="<?php echo BASE_URL ?>assets/adminassets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo BASE_URL ?>assets/pnotify/dist/pnotifyadmin.js"></script>    

<!-- Datatables -->
<script src="<?php echo BASE_URL ?>assets/adminassets/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/adminassets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/adminassets/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/adminassets/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>

<script src="<?php echo BASE_URL ?>assets/adminassets/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<link href="<?php echo BASE_URL ?>assets/adminassets/datepicker/bootstrap-datepicker.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo BASE_URL ?>assets/adminassets/datepicker/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<!-- Custom Theme Scripts -->
<script src="<?php echo BASE_URL ?>assets/adminassets/build/js/custom.min.js"></script>
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
<script>
    $(document).ready(function () {

        if (<?php
if (isset($_SESSION['existrecordMobile'])) {
    echo $_SESSION['existrecordMobile'];
}else{echo 0;}
?> == 1) {
            var d = new PNotify({
                title: 'Mobile number allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
<?php $_SESSION['existrecordMobile'] = 0; ?>
        }
        if (<?php
if (isset($_SESSION['existrecordEmail'])) {
    echo $_SESSION['existrecordEmail'];
}else{echo 0;}
?> == 1) {
            var d = new PNotify({
                title: 'Email allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
<?php $_SESSION['existrecordEmail'] = 0; ?>
        }


        if (<?php
if (isset($_SESSION['dataupdate'])) {
    echo $_SESSION['dataupdate'];
}else{echo 0;}
?> == 1) {
            var d = new PNotify({
                title: 'Data updated successfully',
                type: 'success',
                styling: 'bootstrap3'
            });
<?php $_SESSION['dataupdate'] = 0; ?>
        }
        if (<?php
if (isset($_SESSION['addData'])) {
    echo $_SESSION['addData'];
}else{echo 0;}
?> == 1) {
            var d = new PNotify({
                title: 'Add data successfully',
                type: 'success',
                styling: 'bootstrap3'
            });
<?php $_SESSION['addData'] = 0; ?>
        }

        if (<?php
if (isset($_SESSION['addEmployee'])) {
    echo $_SESSION['addEmployee'];
}else{echo 0;}
?> == 1) {
            var d = new PNotify({
                title: 'Add data successfully',
                type: 'success',
                styling: 'bootstrap3'
            });
<?php $_SESSION['addEmployee'] = 0; ?>
        }
        if (<?php
if (isset($_SESSION['assignComplain'])) {
    echo $_SESSION['assignComplain'];
}else{echo 0;}
?> == 1) {
            var d = new PNotify({
                title: 'Appointment assigned successfully',
                type: 'success',
                styling: 'bootstrap3'
            });
<?php $_SESSION['assignComplain'] = 0; ?>
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
            $('#dp6').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                endDate: new Date()
            });
             $('#dp7').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                endDate: new Date()
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

            $('#item_make_code').on('change', function () {                        
            var urlReq = '<?php echo AJAX_ITEM_LIST_LINK ?>';
            var id = this.value;            
            $.ajax({
                type: "POST",
                dataType: "json",
                data: {'id': id},
                url: urlReq,
                success: function (_returnData) {
                    if (_returnData.result == "success") {
                        $('#service_item_id option').remove();
                        $('#service_item_id').append('<option class="" value="" selected="" disabled=""i>Select Service Item</option>');
                        $.each(_returnData.commodity, function (key, value) {                          
                            $('#service_item_id').append($("<option></option>").attr("value", value['item_code']).text(value['item_name']+' ['+value['item_code']+']'));
                        });                        
                    }
                }
            });                  
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
<?php if ($TITLE === TITLE_CUSTOMER_LIST) { ?>
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
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/customerList.php' ?>",
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
                        {"data": "customer_mobile_number"},
                        {"data": "customer_fname"},
                        {"data": "customer_mname"},
                        {"data": "customer_lname"},
                        {"data": "customer_email"},
                        {"data": "customer_address"},                        
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
                        {"data": "item_name"},
//                        {"data": "item_make_code"},
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
    <script>
    $(document).ready(function () {
        $('#service_item_iswarrenty').on('change', function() {
            if(this.value==='YES'){                
//                $('#dp6').prop('required',true);                
                $("#dp6").attr("required",true);
            }
            else{
                $('#dp6').removeAttr('required');
            }
        });
    });
    </script>
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