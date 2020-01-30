<div class="content-body">

<!--    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>-->
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                    <div class="card-title">
                                    <h4>Complain Information</h4>
                    </div>
                        <hr>
                    <div class="row">                                        
                    <div class="col-md-4 offset-md-2">                                        
                        <p style="margin-left: 3%;" class="text-muted"><strong><i class="fa fa-phone margin-r-5"></i> &nbsp;&nbsp;Customer Mobile Number :</strong>  <?php echo $resultTicket['customer_mobile_number']; ?></p>
                                                                
                        <p style="margin-left: 3%;" class="text-muted"><strong><i class="fa fa-calendar margin-r-5"></i>&nbsp;&nbsp;Appointment Date :</strong> <?php echo $resultTicket['appointment_date']; ?> </p>
                        
                        <p style="margin-left: 3%;" class="text-muted"><strong><i class="fa fa-clock-o margin-r-5"></i>&nbsp;&nbsp;Appointment Time :</strong> <?php echo $resultTicket['appointment_time_range']; ?> </p>
                        
                    </div> 
                    <div class="col-md-4">                                        
                        <p style="margin-left: 3%;" class="text-muted"><strong><i class="fa fa-map-marker margin-r-5"></i> &nbsp;&nbsp;Appointment address :</strong>  <?php echo $resultTicket['address']; ?></p>
                        
                        <p style="margin-left: 3%;" class="text-muted"><strong><i class="fa fa-phone margin-r-5"></i>&nbsp;&nbsp;Service Item :</strong> <?php echo $resultTicket['service_item_id']; ?> </p>
                        
                        <p style="margin-left: 3%;" class="text-muted"><strong><i class="fa fa-phone margin-r-5"></i>&nbsp;&nbsp;Service Type :</strong> <?php echo $resultTicket['service_type_id']; ?> </p>
                        
                        <p style="margin-left: 3%;" class="text-muted"><strong><i class="fa fa-pencil-square margin-r-5"></i>&nbsp;&nbsp;Service description :</strong> <?php echo $resultTicket['service_desc']; ?> </p>
                        
                    </div>  
                        </div>
                        
                        <div class="form-validation">
                            <div class="card-title">
                                <h4>Assign Executive</h4>                    
                            </div>
                            <hr>
                            <form class="form-valide" name="assignexecutive" method="post" action="<?php echo FRONT_EMPLOYEE_ASSIGN_EXECUTIVE_ADD_LINK; ?>">
                                <input type="hidden" name="ticket_id" value="<?php echo $ticketId; ?>">                                
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12 offset-md-2" for="employee_id">Executive<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <select class="form-control" name="employee_id" required="">
                                            <option class="" value="" selected="" disabled=""i>Select Tax Executive</option>       
                                            <?php
                                            if ($executiveRes) {
                                                foreach ($executiveRes as $row) {
                                                    ?>
                                                    <option class="" value="<?php echo $row['employee_id']; ?>"><?php echo $row['employee_fname'] . ' ' . $row['employee_mname'] . ' ' . $row['employee_lname']; ?></option>   
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>                                                                                                
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12 offset-md-2" for="appointment_date">Appointment Date <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" placeholder="2017-06-04" value="<?php echo $resultTicket['appointment_date']; ?>" id="mdate" name="appointment_date" required="">
                                    </div>
                                </div>                                                            
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12 offset-md-2" for="appointment_time_range">Appointment Time Range<span class="text-danger">*</span>
                                    </label>                                                                                                             
                                    <div class="col-md-2 col-sm-3 col-xs-3" data-autoclose="true">
                                        <input class="form-control timepicker" placeholder="From Time" value="<?php echo $fromtotime[0]; ?>" name="appointment_time_range1" required="">
                                    </div>                                    
                                    <div class="col-md-2 col-sm-3 col-xs-3 input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                        <input class="form-control timepicker" name="appointment_time_range2" value="<?php echo $fromtotime[1]; ?>" placeholder="To Time" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12 offset-md-2" for="appointment_notes">Appointment Notes
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <textarea class="form-control" name="appointment_notes" rows="5" placeholder="appointment notes"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary form-control col-md-6">Assign</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>