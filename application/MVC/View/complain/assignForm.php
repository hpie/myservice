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