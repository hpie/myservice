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
<script src="<?php echo BASE_URL ?>assets/adminassets/jquery/dist/jquery.min.js"></script>
<script src="<?php echo ASSETS_FRONT; ?>plugins/common/common.min.js"></script>
<script src="<?php echo ASSETS_FRONT; ?>js/custom.min.js"></script>
<script src="<?php echo ASSETS_FRONT; ?>js/settings.js"></script>
<script src="<?php echo ASSETS_FRONT; ?>js/gleek.js"></script>
<script src="<?php echo ASSETS_FRONT; ?>js/styleSwitcher.js"></script>
<script src="<?php echo ASSETS_FRONT; ?>plugins/sweetalert/js/sweetalert.min.js"></script>
<?php if ($TITLE === TITLE_COMPLAIN_ASSIGN_FORM || $TITLE===TITLE_ADD_TICKET) { ?>
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

<?php if ($TITLE===TITLE_CLOSE_COMPLAIN_READONLY_LIST || $TITLE===TITLE_COMPLAIN_READONLY_LIST || $TITLE === TITLE_CANCLED_COMPLAIN_LIST || $TITLE === TITLE_COMPLAIN_LIST || $TITLE===TITLE_ASSIGNED_COMPLAIN_LIST || $TITLE === TITLE_REVISIT_COMPLAIN_LIST || $TITLE === TITLE_EXECUTEIVE_ASSIGNED_COMPLAIN_LIST || $TITLE === TITLE_ACCEPT_COMPLAIN_LIST || $TITLE === TITLE_RESOLVED_COMPLAIN_LIST) { ?>
<!-- Datatables -->
<script src="<?php echo BASE_URL ?>assets/adminassets/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo ASSETS_FRONT; ?>plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/adminassets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/adminassets/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo BASE_URL ?>assets/adminassets/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo BASE_URL; ?>/assets/front/js/dataTables.responsive.min.js"></script>
<?php } ?>
 <!--Circle progress -->
<script src="<?php echo ASSETS_FRONT; ?>plugins/circle-progress/circle-progress.min.js"></script>
<!-- Pignose Calender -->
<!--<script src="<?php //echo ASSETS_FRONT; ?>plugins/moment/moment.min.js"></script>-->

<script>
    $(document).ready(function () {
        if (<?php
if (isset($_SESSION['changeStatus'])) {
    echo $_SESSION['changeStatus'];
}else{echo 0;}
?> == 1) {
           swal("Hey, Good job !!", "Complain status changed successfully..!", "success");
<?php $_SESSION['changeStatus'] = 0; ?>
        }
        
if (<?php
if (isset($_SESSION['addData'])) {
    echo $_SESSION['addData'];
}else{echo 0;}
?> == 1) {
            swal("Hey, Good job !!", "Data added successfully..!", "success");
<?php $_SESSION['addData'] = 0; ?>
        }          
        
        if (<?php
if (isset($_SESSION['assignComplain'])) {
    echo $_SESSION['assignComplain'];
}else{echo 0;}
?> == 1) {
            swal("Hey, Good job !!", "Complain assigned successfully..!", "success");
<?php $_SESSION['assignComplain'] = 0; ?>
        } 
    });
</script>
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
                        {"data": "address"},                                               
                        {"data": "service_item_id"},
                        {"data": "service_type_id"},
                        {"data": "Assign"},
                        {"data": "service_desc"},
                        {"data": "ticket_status"}
                       
                    ]
                });
            }          
        });
    </script>
<?php } ?>  
<?php if ($TITLE === TITLE_COMPLAIN_READONLY_LIST || $TITLE === TITLE_CLOSE_COMPLAIN_READONLY_LIST) { ?>
    <script>
        $(document).ready(function () {               
            fill_datatable();
            function fill_datatable(year = '',month = '',taxtype='',searchFromToDate='')
            
            { 
                var monumber=<?php echo $_SESSION['adminDetails']['employee_mobile_number']; ?>;
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
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/complainListReadonly.php' ?>",
                        'data': {
                            year:year,
                            month:month,
                            taxtype:taxtype,
                            searchFromToDate:searchFromToDate,
                            status:status,
                            monumber:monumber
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
                        {"data": "service_desc"},
                        {"data": "ticket_status"}
                       
                    ]
                });
            }          
        });
    </script>
<?php } ?>  
<?php if ($TITLE === TITLE_ASSIGNED_COMPLAIN_LIST) { ?>
    <script>
        $(document).ready(function () {       
//            alert('hi')
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
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/complainAssignedListManager.php' ?>",
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
                        {"data": "address"},                        
                        {"data": "service_item_id"},
                        {"data": "service_type_id"},
                        {"data": "Assign"},
                        {"data": "service_desc"},
                        {"data": "ticket_status"},
                         {"data": "appointment_status"}                        
                    ]
                });
            }    
            $(document).on('click', '.btn_approve_reject', function () {
            
                var self = $(this);                               
                if (!confirm('Are you sure want to close ticket?'))
                    return;
                self.attr('disabled', 'disabled');

                var data = {
                    'ticket_id': self.data('id'),
                    'ticket_status': self.data('status')
                };
                $.ajax({
                    type: "POST",
                    url: "<?php echo EMPLOYEE_CHANGE_STATUS_TICKET_LINK; ?>",
                    data: data,
                    success: function (res) {
                        var res = $.parseJSON(res);
                        if (res.suceess) {
                            location.reload();
                        }
                    }
                });
            });        
        });
    </script>
<?php } ?>
     <?php if ($TITLE === TITLE_EXECUTEIVE_ASSIGNED_COMPLAIN_LIST) { ?>
    <script>
        $(document).ready(function () { 
//            alert('hi')
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
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/complainAssignedListExecutive.php' ?>",
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
                        {"data": "sa_appointment_date"},
                        {"data": "sa_appointment_time_range"},
                        {"data": "address"},                                              
                        {"data": "service_item_id"},
                        {"data": "service_type_id"},
                        {"data": "Assign"},
                        {"data": "service_desc"},
                        {"data": "ticket_status"},
                        {"data": "appointment_status"}
                    ]
                });
            }  
              $(document).on('click', '.btn_approve_reject', function () {
            
                var self = $(this);                               
                if (!confirm('Are you sure want to close ticket?'))
                    return;
                self.attr('disabled', 'disabled');

                var data = {
                    'appointment_id': self.data('appoid'),
                    'appointment_status': self.data('appostatus')
                };
                $.ajax({
                    type: "POST",
                    url: "<?php echo EMPLOYEE_CHANGE_STATUS_APPOINTMENT_LINK; ?>",
                    data: data,
                    success: function (res) {
                        var res = $.parseJSON(res);
                        if (res.suceess) {
//                            alert('#id_'+self.data('id'));
//                            $('#id_'+self.data('id')).parents("tr").remove();
//                            swal("Hey, Good job !!", "Complain closed successfully..!", "success");
                            location.reload();
                        }
                    }
                });
            });        
        });
    </script>
<?php } ?>  
      <?php if ($TITLE === TITLE_ACCEPT_COMPLAIN_LIST) { ?>
    <script>
        $(document).ready(function () { 
//            alert('hi')
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
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/complainAcceptedListExecutive.php' ?>",
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
                        {"data": "sa_appointment_date"},
                        {"data": "sa_appointment_time_range"},
                        {"data": "address"},                                              
                        {"data": "service_item_id"},
                        {"data": "service_type_id"},
                        {"data": "Assign"},
                        {"data": "service_desc"},
                        {"data": "ticket_status"},
                        {"data": "appointment_status"}
                    ]
                });
            }  
            $(document).on('click', '.btn_approve_reject', function () { 
                var self = $(this);                               
                if (!confirm('Are you sure want to procced?'))
                    return;
                    self.attr('disabled', 'disabled');                
                    var appointment_id=self.data('appoid');
                    var ticket_id=self.data('id');
                    var appointment_status=self.data('status');
                    var ticket_status=self.data('appostatus');                
                    window.location.href="<?php echo EXECUTIVE_CHANGE_STATUS_APPOINTMENT_LINK; ?>"+ticket_id+"/"+ticket_status+"/"+appointment_id+"/"+appointment_status;   
            });        
        });
    </script>
<?php } ?>  
    <?php if ($TITLE === TITLE_REVISIT_COMPLAIN_LIST) { ?>
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
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/complainRevisitListManager.php' ?>",
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
                        {"data": "sa_appointment_date"},
                        {"data": "sa_appointment_time_range"},
                        {"data": "address"},                                              
                        {"data": "service_item_id"},
                        {"data": "service_type_id"},
                        {"data": "Assign"},
                        {"data": "service_desc"},
                        {"data": "ticket_status"},
                        {"data": "appointment_status"}
                    ]
                });
            }  
              $(document).on('click', '.btn_approve_reject', function () {            
                var self = $(this);                               
                if (!confirm('Are you sure want to close ticket?'))
                    return;
                self.attr('disabled', 'disabled');

                var data = {
                    'ticket_id': self.data('id'),
                    'ticket_status': self.data('status')
                };
                $.ajax({
                    type: "POST",
                    url: "<?php echo EMPLOYEE_CHANGE_STATUS_TICKET_LINK; ?>",
                    data: data,
                    success: function (res) {
                        var res = $.parseJSON(res);
                        if (res.suceess) {
//                            alert('#id_'+self.data('id'));
//                            $('#id_'+self.data('id')).parents("tr").remove();
//                            swal("Hey, Good job !!", "Complain closed successfully..!", "success");
                            location.reload();
                        }
                    }
                });
            });        
        });
    </script>
<?php } ?>  
      <?php if ($TITLE === TITLE_RESOLVED_COMPLAIN_LIST) { ?>
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
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/complainResolvedListManager.php' ?>",
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
                        {"data": "sa_appointment_date"},
                        {"data": "sa_appointment_time_range"},
                        {"data": "address"},                                              
                        {"data": "service_item_id"},
                        {"data": "service_type_id"},
                        {"data": "Assign"},
                        {"data": "service_desc"},
                        {"data": "ticket_status"},
                        {"data": "appointment_status"}
                    ]
                });
            }  
            $(document).on('click', '.btn_approve_reject', function () {
            
                var self = $(this);                               
                if (!confirm('Are you sure want to close ticket?'))
                    return;
                self.attr('disabled', 'disabled');                
                var ticket_id=self.data('id');             
                window.location.href="<?php echo MANAGER_CLOSE_TICKET_LINK; ?>"+ticket_id;   
            });        
        });
    </script>
<?php } ?>  
      <?php if ($TITLE === TITLE_CANCLED_COMPLAIN_LIST) { ?>
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
                        'url': "<?php echo BASE_URL . '/assets/front/DataTablesSrc-master/complainCancledListManager.php' ?>",
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
                        {"data": "sa_appointment_date"},
                        {"data": "sa_appointment_time_range"},
                        {"data": "address"},                                              
                        {"data": "service_item_id"},
                        {"data": "service_type_id"},
                        {"data": "Assign"},
                        {"data": "service_desc"},
                        {"data": "ticket_status"},
                        {"data": "appointment_status"}
                    ]
                });
            }  
              $(document).on('click', '.btn_approve_reject', function () {
            
                var self = $(this);                               
                if (!confirm('Are you sure want to close ticket?'))
                    return;
                self.attr('disabled', 'disabled');

                var data = {
                    'ticket_id': self.data('id'),
                    'ticket_status': self.data('status')
                };
                $.ajax({
                    type: "POST",
                    url: "<?php echo EMPLOYEE_CHANGE_STATUS_TICKET_LINK; ?>",
                    data: data,
                    success: function (res) {
                        var res = $.parseJSON(res);
                        if (res.suceess) {
                            location.reload();
                        }
                    }
                });                               
            });        
        });
    </script>
<?php } ?>  
    <?php if ($TITLE === TITLE_ADD_TICKET) { ?> 
    <script>
    $(document).ready(function () {
        
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
        
        
        $('#service_item_iswarrenty').on('change', function() {
            if(this.value==='YES'){                
//                $('#dp6').prop('required',true);                
                $("#mdate1").attr("required",true);
            }
            else{
                $('#mdate1').removeAttr('required');
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