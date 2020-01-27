<!-- page content -->
<div class="right_col">
    <div class="">      
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Create Ticket</h2>                    
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" method="post" name="addTicket" action="<?php echo ADMIN_ADD_TICKET_LINK; ?>">                                                                                                                                                                                                                              
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="customer_mobile_number">Customer Mobile No.<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="customer_mobile_number" placeholder="10 Digit customer contact number" maxlength="10" minlength="10" onkeypress="return isNumberKey(event)" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="appointment_date">Appointment Date<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="appointment_date" id="dp3" readonly="" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Appointment Time Range<span class="text-danger">*</span>
                                </label>                                                                                                             
                                <div class='col-md-2 col-sm-3 col-xs-3'>
                                    <input type='text' class="form-control col-md-7 col-xs-12" id='datetimepicker3' name="appointment_time_range1" required="" />                                       
                                </div>
                                <div class='col-md-2 col-sm-3 col-xs-3'>

                                    <input type='text' class="form-control col-md-7 col-xs-12" id='datetimepicker4' name="appointment_time_range2" required="" />                   
                                </div>
                            </div>                            
<!--                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="location_latitude">Latitude<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="location_latitude" required="required" id="latclicked" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>-->                             
                            <input type="hidden" name="location_latitude" id="latclicked">
                            <input type="hidden" name="location_longitude" id="longclicked">

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Location<span class="required">*</span>
                                </label>                                                                
                                <div class="col-md-4 col-sm-6 col-xs-12" style="height: 300px;">                           
                                    <div id="map"></div> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="location">Location<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" readonly="" id="location" name="address" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
<!--                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="service_item_id">Service Item<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="service_item_id" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>-->
<!--                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="service_type_id">Service Type<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="service_type_id" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>-->
                            
                            
                            <div class="form-group">
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="service_item_id">Service Item<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <select class="form-control" name="service_item_id" required="">                                              
                                        <option class="" value="" selected="" disabled=""i>Select Service Item</option>       
                                        <?php
                                        if ($serviceItem) {
                                            foreach ($serviceItem  as $row) {
                                                ?>
                                                <option class="" value="<?php echo $row['item_code']; ?>"><?php echo $row['item_code']; ?></option>   
                                                <?php
                                            }
                                        }
                                        ?>                                           
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                 <label class="control-label col-md-3 col-sm-3 col-xs-12" for="service_type_id">Service Type<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <select class="form-control" name="service_type_id" required="">                                              
                                        <option class="" value="" selected="" disabled=""i>Select Service Type</option>       
                                        <?php
                                        if ($serviceType) {
                                            foreach ($serviceType  as $row) {
                                                ?>
                                                <option class="" value="<?php echo $row['service_type_code']; ?>"><?php echo $row['service_type_code']; ?></option>   
                                                <?php
                                            }
                                        }
                                        ?>                                           
                                    </select>
                                </div>
                            </div>
                            
                            
                            
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="service_desc">Ticket Notes
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <textarea name="service_desc"></textarea>
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