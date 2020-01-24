<!-- page content -->
<div class="right_col">
    <div class="">      
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Service Item Make</h2>                    
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" method="post" name="addItemMake" action="<?php echo ADMIN_ADD_ITEM_MAKE_LINK; ?>">                                                                                                                                                                                                                              
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_make_code">Item Make Code<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="item_make_code" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_make_mobile">Mobile No.<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="item_make_mobile" placeholder="10 Digit mobile number" maxlength="10" minlength="10" onkeypress="return isNumberKey(event)" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_make_phone">Phone No.<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="item_make_phone" placeholder="" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_make_email">Email<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="email" name="item_make_email" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>                                                     
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_make_address">Address
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <textarea name="item_make_address"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_make_city">City<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="item_make_city" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>   
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_make_state">State<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="item_make_state" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>     
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item_make_country">Country<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="item_make_country" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>                          
                            <div class="ln_solid" style="visibility: hidden"></div>
                            <div class="form-group">
                                <div class="col-md-8 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-primary" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>                       
    </div>
</div>