<div class="page-header" style="background: url(assets/img/banner1.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Post A Complain</h2>                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end intro section -->
</div>
<!-- Page Header End -->
<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9 col-md-offset-2">                
                <div class="page-ads box">
                    <form class="form-ad" action="" method="post">
                        <?php if(isset($_SESSION['userDetails']['customer_mobile_number'])){ ?>                        
                        <div class="form-group is-empty">
                            <label class="control-label" for="customer_mobile_number">Customer Mobile No.</label>                                
                            <input type="text" name="customer_mobile_number" placeholder="10 Digit customer contact number" maxlength="10" minlength="10" onkeypress="return isNumberKey(event)" required="required" class="form-control" readonly="" value="<?php echo $_SESSION['userDetails']['customer_mobile_number']; ?>">                                
                            <span class="material-input"></span>
                        </div>   
                        <?php }else{ ?>
                        <div class="form-group is-empty">
                            <label class="control-label" for="customer_mobile_number">Customer Mobile No.</label>                                
                            <input type="text" name="customer_mobile_number" placeholder="10 Digit customer contact number" maxlength="10" minlength="10" onkeypress="return isNumberKey(event)" required="required" class="form-control">                                
                            <span class="material-input"></span>
                        </div>   
                        <?php } ?>
                        <div class="form-group is-empty">
                            <label class="control-label" for="appointment_date">Appointment Date
                            </label>                                
                            <input type="text" name="appointment_date" id="mdate" readonly="" required="required" class="form-control">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">                                                            
                                <label class="control-label">Appointment Time Range From
                                </label>                                                                                                             
                                <input type='text' class="form-control timepicker" name="appointment_time_range1" required="" /> 
                                <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">                                
                                <label class="control-label">Appointment Time Range To
                                </label>                                                                                                             
                                <input type='text' class="form-control timepicker" name="appointment_time_range2" required="" />   
                                <span class="material-input"></span>                            
                        </div>                                            
                        <input type="hidden" name="location_latitude" id="latclicked">
                        <input type="hidden" name="location_longitude" id="longclicked">
                        <div class="form-group is-empty">
                            <label class="control-label">Location
                                </label>                                                                                                             
                            <div class="" style="height: 300px;">                                                           
                                    <div id="map"></div> 
                                    <span class="material-input"></span>
                            </div>                            
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label" for="location">Location
                            </label>                                
                            <input type="text" readonly="" id="location" name="address" class="form-control">   
                            <span class="material-input"></span>
                        </div>                            
                        <div class="form-group is-empty">
                            <label class="control-label" for="item_make_code">Service Item Make<span class="required">*</span>
                            </label>                                
                            <select class="form-control" required="" name="item_make_code" id="item_make_code">                                              
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
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label" for="service_item_id">Service Item
                            </label>                                
                            <select class="form-control" name="service_item_id" required="" id="service_item_id">                                              
                                <option class="" value="" selected="" disabled=""i>Select Service Item</option>                                                                                  
                            </select>
                            <span class="material-input"></span>                                
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label" for="service_type_id">Service Type
                            </label>

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
                            <span class="material-input"></span>
                        </div>                           
                        <div class="form-group is-empty">
                            <label class="control-label" for="service_item_serial">Item serial no.
                            </label>                                
                            <input type="text" name="service_item_serial" class="form-control">       
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label" for="service_item_iswarrenty">Warranty
                            </label>                                
                            <select class="form-control" name="service_item_iswarrenty" id="service_item_iswarrenty" required="">                                              
                                <option class="" value="" selected="" disabled=""i>Select Item Warranty</option>       
                                <option class="" value="NO">NO</option>   
                                <option class="" value="YES">YES</option>   
                            </select>
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label" for="service_item_warrentydt">Warranty Date
                            </label>

                            <input type="text" name="service_item_warrentydt" id="mdate1" class="form-control">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label" for="service_item_purchasedt">Purchase Date
                            </label>
                            <input type="text" name="service_item_purchasedt" id="mdate2" readonly="" class="form-control">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label" for="service_item_billno">Bill no.
                            </label>                               
                            <input type="text" name="service_item_billno" class="form-control">
                            <span class="material-input"></span>
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label" for="service_item_storename">Store Name
                            </label>                                
                            <input type="text" name="service_item_storename" class="form-control">
                            <span class="material-input"></span>
                        </div>                                                                                    
                        <div class="form-group is-empty">
                            <br>
                            <label class="control-label" for="service_desc">Ticket Notes
                            </label><br>                                
                            <textarea name="service_desc" style="width:100%" rows="5"></textarea>
                            <span class="material-input"></span>
                        </div> 
                        <input type="submit" class="btn btn-common" value="Submit Complain" name="submit">                            
                    </form>                                        
                </div>
            </div>
        </div>
    </div>
</section>