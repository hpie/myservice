<!-- page content -->
<div class="right_col">
    <div class="">      
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Add Employee</h2>                    
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left" method="post" name="addEmployee" action="<?php echo ADMIN_ADD_EMPLOYEE_LINK; ?>">                                                                                                                                                                                                  
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role_code">Employee Role
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <select class="form-control" name="role_code" required="">                                              
                                        <option class="" value="" selected="" disabled=""i>Select Employee Role Code</option>       
                                        <?php
                                        if ($result) {
                                            foreach ($result as $row) {
                                                ?>
                                                <option class="" value="<?php echo $row['role_code']; ?>"><?php echo $row['role_code']; ?></option>   
                                                <?php
                                            }
                                        }
                                        ?>                                           
                                    </select>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_fname">First name<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="employee_fname" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_mname">Middle name<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="employee_mname" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_lname">Last name<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="employee_lname" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_mobile_number">Mobile No.<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="employee_mobile_number" placeholder="10 Digit customer contact number" maxlength="10" minlength="10" onkeypress="return isNumberKey(event)" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_email">Email<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="email" name="employee_email" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_password">Password<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="password" name="employee_password" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_gender">Gender
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <select class="form-control" name="employee_gender" required="">                                              
                                        <option class="" value="" selected="" disabled="">Select Gender</option>       
                                        <option value="Male">Male</option>                                                                                       
                                        <option value="Female">Female</option>                                                                                       
                                    </select>
                                </div>
                            </div>  
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_dob">DOB<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="employee_dob" id="dp3" readonly="" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>                          
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_address">Address
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <textarea name="employee_address"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_city">City<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="employee_city" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>   
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_state">State<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="employee_state" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>     
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="employee_country">Country<span class="required">*</span>
                                </label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="employee_country" required="required" class="form-control col-md-7 col-xs-12">
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