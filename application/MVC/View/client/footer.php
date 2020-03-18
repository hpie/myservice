<!-- Footer Section Start -->
<footer>
    <!-- Footer Area Start -->
    <section class="footer-Content">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget">
                        <h3 class="block-title"><img src="<?php echo CLIENT_ASSETS; ?>img/logo.png" class="img-responsive" alt="Footer Logo"></h3>
                        <div class="textwidget">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque lobortis tincidunt est, et euismod purus suscipit quis. Etiam euismod ornare elementum. Sed ex est, consectetur eget facilisis sed.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget">
                        <h3 class="block-title">Quick Links</h3>
                        <ul class="menu">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Support</a></li>
                            <li><a href="#">License</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget">
                        <h3 class="block-title">Trending Jobs</h3>
                        <ul class="menu">
                            <li><a href="#">Android Developer</a></li>
                            <li><a href="#">Senior Accountant</a></li>
                            <li><a href="#">Frontend Developer</a></li>
                            <li><a href="#">Junior Tester</a></li>
                            <li><a href="#">Project Manager</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="widget">
                        <h3 class="block-title">Follow Us</h3>
                        <div class="bottom-social-icons social-icon">  
                            <a class="twitter" href="https://twitter.com/GrayGrids"><i class="ti-twitter-alt"></i></a>
                            <a class="facebook" href="https://web.facebook.com/GrayGrids"><i class="ti-facebook"></i></a>                   
                            <a class="youtube" href="https://youtube.com"><i class="ti-youtube"></i></a>
                            <a class="dribble" href="https://dribbble.com/GrayGrids"><i class="ti-dribbble"></i></a>
                            <a class="linkedin" href="https://www.linkedin.com/GrayGrids"><i class="ti-linkedin"></i></a>
                        </div>	
                        <p>Join our mailing list to stay up to date and get notices about our new releases!</p>
                        <form class="subscribe-box">
                            <input type="text" placeholder="Your email">
                            <input type="submit" class="btn-system" value="Send">
                        </form>	
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer area End -->

    <!-- Copyright Start  -->
    <div id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-info text-center">
                        <p>All Rights reserved &copy; 2017 - Designed & Developed by <a rel="nofollow" href="http://graygrids.com">GrayGrids</a></p>
                    </div>   
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

</footer>
<!-- Footer Section End -->  

<!-- Go To Top Link -->
<a href="#" class="back-to-top">
    <i class="ti-arrow-up"></i>
</a>

<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="object_one"></div>
            <div class="object" id="object_two"></div>
            <div class="object" id="object_three"></div>
            <div class="object" id="object_four"></div>
            <div class="object" id="object_five"></div>
            <div class="object" id="object_six"></div>
            <div class="object" id="object_seven"></div>
            <div class="object" id="object_eight"></div>
        </div>
    </div>
</div>        
<!-- Main JS  -->
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/jquery-min.js"></script>      
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/bootstrap.min.js"></script>    
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/material.min.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/material-kit.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/jquery.parallax.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/jquery.slicknav.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/main.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/jquery.counterup.min.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/waypoints.min.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/jasny-bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/form-validator.min.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/contact-form-script.js"></script>    
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="<?php echo CLIENT_ASSETS; ?>js/jquery.themepunch.tools.min.js"></script>
<script src="<?php echo CLIENT_ASSETS; ?>js/summernote.js" type="text/javascript"></script>
<script src="<?php echo BASE_URL; ?>assets/pnotify/dist/pnotifyadmin.js"></script>
<script src="<?php echo BASE_URL; ?>assets/adminassets/jquery/dist/jquery-ui.js" type="text/javascript"></script>
<script src=""></script>
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
<script type="text/javascript">
        var map;        
        function initMap() {                            
            var latitude = 27.7172453; // YOUR LATITUDE VALUE
            var longitude = 85.3239605; // YOUR LONGITUDE VALUE            
            var myLatLng = {lat: latitude, lng: longitude};
            
            map = new google.maps.Map(document.getElementById('map'), {
              center: myLatLng,
              zoom: 14,
              mapTypeId: google.maps.MapTypeId.ROADMAP
               // disable the default map zoom on double click
            });                                           
            var marker = new google.maps.Marker({
              position: myLatLng,
              map: map          
            });                                      
            google.maps.event.addListener(map, 'click', function (event) {
                document.getElementById('latclicked').value = event.latLng.lat();
                document.getElementById('longclicked').value =  event.latLng.lng();        
                var latlng = new google.maps.LatLng(event.latLng.lat(), event.latLng.lng());
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        if (results[1]) {
                             document.getElementById('location').value =results[1].formatted_address;        
                        }
                    }
                });
                marker.setMap(null);    
                marker = new google.maps.Marker({
                  position: event.latLng, 
                  map: map, 
                  mapTypeId: google.maps.MapTypeId.ROADMAP,
                  title: event.latLng.lat()+', '+event.latLng.lng()
                });                               
            });            
        }
        </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDOo8VS-DubgppGE3b94PsvweQyYqzrKGI&libraries=places&callback=initMap" async defer></script>
<script>
    $(document).ready(function () {     
        if ('<?php
if (isset($_SESSION['exitUserEmail'])) {
    echo $_SESSION['exitUserEmail'];
}else{echo 0;}
?>' == '1') {
            var d = new PNotify({
                title: 'Email allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            <?php $_SESSION['exitUserEmail'] = 0; ?>
            }
        
        if ('<?php
if (isset($_SESSION['exitUser'])) {
    echo $_SESSION['exitUser'];
}else{echo 0;}
?>' == '1') {
            var d = new PNotify({
                title: 'Mobile number allready exist',
                type: 'error',
                styling: 'bootstrap3'
            });
            <?php $_SESSION['exitUser'] = 0; ?>
            }
        
        
        
        if ('<?php
if (isset($_SESSION['loginsuccess'])) {
    echo $_SESSION['loginsuccess'];
}else{echo 0;}
?>' == '1') {
            var d = new PNotify({
                title: 'Login successfully',
                type: 'success',
                styling: 'bootstrap3'
            });
            <?php $_SESSION['loginsuccess'] = 0; ?>
        }

if ('<?php
if (isset($_SESSION['registersuccess'])) {
    echo $_SESSION['registersuccess'];
}else{echo 0;}
?>' == '1') {
            var d = new PNotify({
                title: 'Sign Up successfull.', 
                type: 'success',
                styling: 'bootstrap3'
            });
            <?php $_SESSION['registersuccess'] = 0; ?>
        }
if ('<?php
if (isset($_SESSION['jobAddedSuccessfully'])) {
    echo $_SESSION['jobAddedSuccessfully'];
}else{echo 0;}
?>' == '1') {
            var d = new PNotify({
                title: 'Job added successfully',
                type: 'success',
                styling: 'bootstrap3'
            });
            <?php $_SESSION['jobAddedSuccessfully'] = 0; ?>
        }
        
        if ('<?php
if (isset($_SESSION['AppllySuccessfully'])) {
    echo $_SESSION['AppllySuccessfully'];
}else{echo 0;}
?>' == '1') {
            var d = new PNotify({
                title: 'Job apply successfully',
                type: 'success',
                styling: 'bootstrap3'
            });
            <?php $_SESSION['AppllySuccessfully'] = 0; ?>
        }else if('<?php
if (isset($_SESSION['AppllySuccessfully'])) {
    echo $_SESSION['AppllySuccessfully'];
}else{echo 0;}
?>' == '2'){
            var d = new PNotify({
                title: 'You have allready apply on this job',
                type: 'info',
                styling: 'bootstrap3'
            });
            <?php $_SESSION['AppllySuccessfully'] = 0; ?>
        }
    });
</script>
<script>
    $(document).ready(function () {
       
        $('#summernote').summernote({
            height: 200,
            toolbar: [
              // [groupName, [list of button]]
              ['style', ['bold', 'italic', 'underline', 'clear']],
              ['font', ['strikethrough', 'superscript', 'subscript']],
              ['fontsize', ['fontsize']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['height', ['height']],              
            ],
            disableDragAndDrop: true            
          });
          
           $('.note-group-select-from-files').remove();
        
    });
    
    
    
$(".add-fav").click(function(){
    var id = $(this).attr("data-id");
    var type = $(this).attr("data-type");
    var data = {};
    data['type'] =type;
     var urlreq = '<?php echo BASE_URL; ?>' + 'user_add_fav_job/' + id;
                $.ajax({type: "POST",
                    dataType: "json",
                    url: urlreq,
                    data:data,
                    success: function (_returnData) {
                        if (_returnData.success = "success"){
                            if(type == 'fav'){
                            $(".addfav"+id).hide();
                            $(".removefav"+id).show();
                        }else{
                            $(".removefav"+id).hide();
                            $(".addfav"+id).show();
                        }
                            return false;
                        }
                           
                    }
                });
});
//$( function() {
//    var availableTags = [
//      "ActionScript",
//      "AppleScript",
//      "Asp",
//      "BASIC",
//      "C",
//      "C++",
//      "Clojure",
//      "COBOL",
//      "ColdFusion",
//      "Erlang",
//      "Fortran",
//      "Groovy",
//      "Haskell",
//      "Java",
//      "JavaScript",
//      "Lisp",
//      "Perl",
//      "PHP",
//      "Python",
//      "Ruby",
//      "Scala",
//      "Scheme"
//    ];
//    $( "#tags" ).autocomplete({
//      source: availableTags
//    });
//  } );
  
  $("#jobtitletags").keypress(function(){
   
     var urlreq = '<?php echo BASE_URL; ?>' + 'get_job_key_word';
                $.ajax({type: "POST",
                    dataType: "json",
                    url: urlreq,
                    success: function (_returnData) {
                        if (_returnData.success = "success"){
                            console.log(_returnData.Result);
                            var availableTags = _returnData.Result;
                                $( "#jobtitletags" ).autocomplete({
                                  source: availableTags
                                });
                            return false;
                        }
                           
                    }
                });
});

  $("#jobcitiestags").keypress(function(){
   
     var urlreq = '<?php echo BASE_URL; ?>' + 'get_job_cities';
                $.ajax({type: "POST",
                    dataType: "json",
                    url: urlreq,
                    success: function (_returnData) {
                        if (_returnData.success = "success"){
                            console.log(_returnData.Result);
                            var availableTags = _returnData.Result;
                                $( "#jobcitiestags" ).autocomplete({
                                  source: availableTags
                                });
                            return false;
                        }
                           
                    }
                });
});
</script>
</body>
</html>