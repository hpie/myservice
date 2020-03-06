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
                        <div class="form-validation">
                            <form class="form-valide" name="assignexecutive" method="post" action="<?php echo EMPLOYEE_ADD_TICKET_LINK; ?>">                                                               
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12 offset-md-2" for="customer_mobile_number">Customer Mobile No.<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <input type="text" name="customer_mobile_number" placeholder="10 Digit customer contact number" maxlength="10" minlength="10" onkeypress="return isNumberKey(event)" required="required" class="form-control">
                                    </div>
                                </div>                                
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12  offset-md-2" for="appointment_date">Appointment Date <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" placeholder="2017-06-04" id="mdate" name="appointment_date" required="">
                                    </div>
                                </div>                                                            
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12  offset-md-2" for="appointment_time_range">Appointment Time Range<span class="text-danger">*</span>
                                    </label>                                                                                                             
                                    <div class="col-md-2 col-sm-3 col-xs-3" data-autoclose="true">
                                        <input class="form-control timepicker" placeholder="From Time"  name="appointment_time_range1" required="">
                                    </div>                                    
                                    <div class="col-md-2 col-sm-3 col-xs-3 input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                        <input class="form-control timepicker" name="appointment_time_range2" placeholder="To Time" required="">
                                    </div>
                                </div>                                                                                               
                                <input type="hidden" name="location_latitude" id="latclicked">
                                <input type="hidden" name="location_longitude" id="longclicked">

                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12  offset-md-2" for="address">Location<span class="text-danger">*</span>
                                    </label>                                                                
                                    <div class="col-md-4 col-sm-6 col-xs-12" style="height: 300px;">                           
                                        <div id="map"></div> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12  offset-md-2" for="location">Location<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <input type="text" readonly="" id="location" name="address" class="form-control">
                                    </div>
                                </div>
<!--                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12  offset-md-2" for="item_make_code">Service Item Make<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <select class="form-control" required="">                                              
                                            <option class="" value="" selected="" disabled=""i>Select Service Item Make</option>       
                                            <?php
                                            if ($serviceItemMake) {
                                                foreach ($serviceItemMake as $row) {
                                                    ?>
                                                    <option class="" value="<?php echo $row['item_make_code']; ?>"><?php echo $row['item_make_code']; ?></option>   
                                                    <?php
                                                }
                                            }
                                            ?>                                           
                                        </select>
                                    </div>
                                </div>-->
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12  offset-md-2" for="service_item_id">Service Item<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <select class="form-control" name="service_item_id" required="">                                              
                                            <option class="" value="" selected="" disabled=""i>Select Service Item</option>       
                                            <?php
                                            if ($serviceItem) {
                                                foreach ($serviceItem as $row) {
                                                    ?>
                                                    <option class="" value="<?php echo $row['item_code']; ?>"><?php echo $row['item_name'].' ['.$row['item_code'].']'; ?></option>                                                         
                                                    <?php
                                                }
                                            }
                                            ?>                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12  offset-md-2" for="service_type_id">Service Type<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <select class="form-control" name="service_type_id" required="">                                              
                                            <option class="" value="" selected="" disabled=""i>Select Service Type</option>       
                                            <?php
                                            if ($serviceType) {
                                                foreach ($serviceType as $row) {
                                                    ?>
                                                    <option class="" value="<?php echo $row['service_type_code']; ?>"><?php echo $row['service_type_code']; ?></option>   
                                                    <?php
                                                }
                                            }
                                            ?>                                           
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12 offset-md-2" for="service_item_serial">Item Serial No.
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <input type="text" name="service_item_serial" placeholder="Item serial no" class="form-control">
                                    </div>
                                </div>                                
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12  offset-md-2" for="service_item_iswarrenty">Warranty<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <select class="form-control" name="service_item_iswarrenty" id="service_item_iswarrenty" required="">                                              
                                            <option class="" value="" selected="" disabled=""i>Select Item Warranty</option>                                                   
                                            <option class="" value="NO">NO</option>   
                                            <option class="" value="YES">YES</option>   
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12  offset-md-2" for="service_item_warrentydt">Warranty Date
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" placeholder="Select Warranty Date" id="mdate1" name="service_item_warrentydt">
                                    </div>
                                </div>                                                            
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12  offset-md-2" for="service_item_purchasedt">Purchase Date
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" placeholder="Select Purchase Date" id="mdate2" name="service_item_purchasedt">
                                    </div>
                                </div>                                                            
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12  offset-md-2" for="service_item_billno">Bill No.
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" placeholder="Bill no." name="service_item_billno">
                                    </div>
                                </div>                                                            
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12  offset-md-2" for="service_item_storename">Store Name
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" placeholder="Store name no." name="service_item_storename">
                                    </div>
                                </div>                                                            
                                                                
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12 offset-md-2" for="service_desc">Ticket Notes
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <textarea name="service_desc" class="form-control"></textarea>
                                    </div>
                                </div>   
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary form-control col-md-6">Submit</button>
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