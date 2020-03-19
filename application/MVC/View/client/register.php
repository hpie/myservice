<!-- Page Header Start change -->

<div class="page-header" style="background: url(assets/img/banner1.jpg); border-top:0">
    <div class="container">
        <div class="row">         
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">SignUp</h2>                    
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- end intro section -->
</div>
<!-- Page Header End -->
<div id="content" class="my-account">
    <div class="container">
       <section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
        	    <div class="form-wrap">                
                    <form role="form" action="<?php echo CLIENT_REGISTER_FORM_LINK; ?>" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">                            
                            <input type="text" name="customer_fname" id="customer_fname" class="form-control" placeholder="Enter your first name" required="">
                        </div>
                        <div class="form-group">                            
                            <input type="text" name="customer_lname" id="customer_lname" class="form-control" placeholder="Enter your last name" required="">
                        </div>                        
                        <div class="form-group">                            
                            <input type="text" name="customer_mobile_number" id="customer_mobile_number" minlength="10" maxlength="10" onkeypress="return isNumberKey(event)" class="form-control" placeholder="10 digit Mobile no" required="">
                        </div>
                        <div class="form-group">                            
                            <input type="email" name="customer_email" id="customer_email" class="form-control" placeholder="Enter Your Email">
                        </div>
                        <div class="form-group">                            
                            <input type="password" name="customer_password" id="customer_password" class="form-control" placeholder="Password" required="">
                        </div>                       
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Sign Up">
                    </form>
                    <a href="javascript:;" class="forget" data-toggle="modal" data-target=".forget-modal">Forgot your password?</a>
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<div class="modal fade forget-modal" tabindex="-1" role="dialog" aria-labelledby="myForgetModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title">Recovery password</h4>
			</div>
			<div class="modal-body">
				<p>Type your email account</p>
				<input type="email" name="recovery-email" id="recovery-email" class="form-control" autocomplete="off">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-custom">Recovery</button>
			</div>
		</div>  
	</div>
</div> 

    </div>
</div>