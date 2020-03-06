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
                                <h4></h4>                    
                            </div>
                            <hr>
                            <form class="form-valide" name="statuschange" method="post" action="">                                                                
                                <div class="form-group row">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12 offset-md-2" for="clouser_notes">Closer Notes
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <textarea class="form-control" name="clouser_notes" rows="5" placeholder="clouser notes"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" name="submit" class="btn btn-primary form-control col-md-6">Submit</button>
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