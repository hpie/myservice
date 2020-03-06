<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>	
    <head>
        <title><?php echo $TITLE; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <meta name="keywords" content="Cofrestru Registration Form Responsive Templates, Iphone Widget Template, Smartphone login forms,Login form, Widget Template, Responsive Templates, a Ipad 404 Templates, Flat Responsive Templates" />
        <link href="<?php echo BASE_URL ?>assets/front/frontuser/css/style.css" rel='stylesheet' type='text/css' />
        <!--webfonts-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,300,600,800,400' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Marvel:400,700' rel='stylesheet' type='text/css'>
        <!--//webfonts-->
    </head>
    <body>
        <h1>Levy Flat Registration Form</h1>
        <div class="registration">
            <h2>Registration Form</h2>				
            <form method="post" action="">
                <div class="form-info">
                    <input type="text" class="text" required="" name="employee_fname" placeholder="Your name">
                    <input type="text" class="text" required="" name="customer_mobile_number" maxlength="10" minlength="10" onkeypress="return isNumberKey(event)" placeholder="Mobile number">                    
                    <input type="password" required="" name="employee_password" placeholder="password">
                </div>
                <input type="submit" name="submit" value="REGISTER">
            </form>            
            <div class="clear"> </div>
        </div>        
    </body>
</html>
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>