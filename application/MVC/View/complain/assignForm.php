<!-- page content -->
<div class="right_col">
    <div class="">      
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Assign Executive</h2>                    
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" method="post" name="assignexecutive" action="<?php echo ADMIN_ASSIGN_EXECUTIVE_ADD_LINK; ?>">                                                                                                                                                                      
                            <input type="hidden" name="ticket_id" value="<?php echo $ticketId; ?>">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_id">Executive
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
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="appointment_date	">Appointment Date<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="appointment_date" id="dp3" readonly="" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $resultTicket['appointment_date']; ?>">
                                </div>
                            </div>

            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Appointment Time Range<span class="text-danger">*</span>
                </label>                                                                                                             
                <div class='col-md-2 col-sm-3 col-xs-3'>
                    <input type='text' class="form-control col-md-7 col-xs-12" id='datetimepicker3' value="<?php echo $fromtotime[0]; ?>" name="appointment_time_range1" required="" />                                       
                </div>
                <div class='col-md-2 col-sm-3 col-xs-3'>
                    
                    <input type='text' class="form-control col-md-7 col-xs-12" id='datetimepicker4' value="<?php echo $fromtotime[1]; ?>" name="appointment_time_range2" required="" />                   
                </div>
            </div>
<!--                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="appointment_time_range">Appointment Time Range<span class="text-danger">*</span>
                                </label>                                                                                                             
                                <div class="col-md-2 col-sm-3 col-xs-3" data-autoclose="true">
                                    <input class="form-control" placeholder="From Time" value="<?php //echo $fromtotime[0]; ?>" name="appointment_time_range1" required="">
                                    <input type="text" name="appointment_time_range1" id="datetimepicker3" readonly="" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $fromtotime[0]; ?>">
                                </div>                                    
                                <div class="col-md-2 col-sm-3 col-xs-3 input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                    <input class="form-control timepicker" name="appointment_time_range2" value="<?php echo $fromtotime[1]; ?>" placeholder="To Time" required="">
                                </div>
                            </div>-->

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="appointment_notes">Appointment Notes
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <textarea name="appointment_notes"></textarea>
                                </div>
                            </div>                                                       
                            <div class="ln_solid" style="visibility: hidden"></div>
                            <div class="form-group">
                                <div class="col-md-8 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Assign</button>
                                </div>
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>                       
    </div>
</div>