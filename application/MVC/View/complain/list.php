<style>
    form.example button {
        float: right;
        width: 20%;
    }   
    form.example input[type=text] {
        float: left;
        width: 77%;
    }
    form.example select{
        float: left;
        width: 77%;
    }
</style>
<!-- page content -->
<div class="right_col">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Open Complain List</h3>
            </div>              
        </div>
        <div class="clearfix"></div>
        <div class="row">            
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <input type="hidden" id="status" value="<?php echo 'OPEN'; ?>">
                    <div class="x_title">
                        <div class="col-md-3 col-xs-3">
                            <form class="example">
                                <input type="text" id="dp4" class="form-control" placeholder="select Year">
                                <button type="button" class="btn-sm" id="searchYear"><i class="fa fa-search"></i></button>                                
                            </form>                              
                        </div>
                        <div class="col-md-3 col-xs-3">
                            <form class="example">
                                <input type="text" id="dp5" class="form-control" placeholder="select Month">
                                <button type="button" class="btn-sm" id="searchMonth"><i class="fa fa-search"></i></button>                                
                            </form>                                                                                    
                        </div>
                        <div class="col-md-3 col-xs-3">                                                   
                            <form class="example">
                            <select class="form-control" id="selectTaxType" required="">                                            
                                <option value="" selected="" disabled=""i>Select Tax Type</option>
                                <?php foreach ($taxTypeList as $row){ ?>
                                <option value="<?php echo $row['tax_type_id']; ?>" ><?php echo $row['tax_type_name']; ?></option> 
                                <?php } ?>
                            </select>
                            <button type="button" class="btn-sm" id="searchTaxType"><i class="fa fa-search"></i></button>                            
                            </form>
                        </div>
                                                
                        <div class="col-md-3 col-xs-3">
                            <form class="example">                                                                                                
                                <input type="text" class="form-control single_cal1" placeholder="From Date - To Date">
                                <button type="button" class="btn-sm" id="searchFromToDate"><i class="fa fa-search"></i></button>                                
                            </form>                              
                        </div>                                                
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">                    					
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Index</th> 
                                    <th>Ticket ID</th> 
                                    <th>Mobile No.</th> 
                                    <th>Appointment Date</th> 
                                    <th>Appointment Time</th>                                    
                                    <th>Address</th>                                    
                                    <th>Service Item</th>
                                    <th>Service Type</th>
                                    <th>Action</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Index</th> 
                                    <th>Ticket ID</th> 
                                    <th>Mobile No.</th> 
                                    <th>Appointment Date</th> 
                                    <th>Appointment Time</th> 
                                     <th>Address</th>                                    
                                    <th>Service Item</th>
                                    <th>Service Type</th>
                                    <th>Action</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                </tr>
                            </tfoot>
                        </table>					
                    </div>
                </div>
            </div>
        </div>      
    </div>
</div>
<!-- /page content -->

