<!-- ==========================login============================-->

<!-- Modal -->
<section class="form-section modal fade clearfix" id="loginModal" role="dialog">
<div class="modal-dialog">
<div class="regi_form">
<div class="regi_heading text-uppercase white">
<button type="button" class="close close-btn" data-dismiss="modal">
<i class="fa fa-times" aria-hidden="true"></i></button>

<img src="assets/images/login-icon.png" alt="" class="regi_icon" >Login</div>
<div class="regi_in">          
<form id="loginForm" action="user/login"> 
<div class="form-group">
  <span class="usernamelogin error"></span>
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-envelope" aria-hidden="true"></i>
</div>
<input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address">
<span class="email error"></span>
</div>

<div class="form-group">
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-lock locked" aria-hidden="true"></i>
</div>
<input type="password" name="password" class="form-control" id="exampleInputpassword" aria-describedby="emailHelp" placeholder="Password">
<span class="password error"></span>
<input type="hidden" name="login" value="test">
<input type="hidden" name="csrfToken" value="{_csrf}">
</div>
<button type="submit" class="btn submit">Login</button>
</div>
</form>
</div>
</div>
</section>
<!-- ==========================login============================-->


<!-- ==========================Registration============================-->
<section id="registerModal" class="form-section modal fade form-section clearfix"  role="dialog">
<div class="container">
<div class="regi_form">
<div class="regi_heading text-uppercase white">
  <button type="button" class="close close-btn" data-dismiss="modal">
    <i class="fa fa-times" aria-hidden="true"></i></button>
    <img src="assets/images/school-reg.png" alt="" class="regi_icon" > School Registration</div>
    <div class="regi_in">   

<form id="RegistrationForm" action="user/login"  method="post" enctype="multipart/form-data">


<div class="form-group">
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-envelope-o" aria-hidden="true"></i>
</div>
<input type="text" class="form-control" name="email" id="email_address" aria-describedby="email_address" placeholder="Email-Address  :">
<span class="email error"></span>
</div>
</div>

<div class="form-group">
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-lock locked" aria-hidden="true"></i>
</div>
<input type="password" class="form-control" name="password" placeholder="Password :">
<span class="password error"></span>
</div>
</div>

<div class="form-group">
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-lock locked" aria-hidden="true"></i>
</div>
<input type="password" class="form-control" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password :">
<span class="confirmpassword error"></span>
</div>
</div>


<input type="hidden" class="form-control"  value="Register" name="Register"  >

<button type="submit" class="btn submit">Submit</button>
</div>
</form>
</div>
</div>
</section>
<!-- ==========================Registration============================-->


<section class="footer-section">
  <div class="container">
  <div class="row">
  <div class="col-sm-2 footer-box-1">
  <div class="footer-logo">
  <a href="index.html"><img src="images/logo.png" alt="" class="img-responsive"></a>
  </div>
  </div>

  <div class="col-sm-3 footer-box-2">
    <h3 class="heading-footer text-uppercase white">PAGES</h3>
    <ul class="footer-link">
      <li><a href="index.html">HOME</a></li>
      <li><a href="#">ABOUT US</a></li>
      <li><a href="market-place.html">MARKET PLACE</a></li>
      <li><a href="hour-of-code.html">Hour of Code</a></li>
    </ul>
  </div>

  <div class="col-sm-3 footer-box-2">
    <h3 class="heading-footer text-uppercase white">EVENTS</h3>
    <ul class="footer-link">
      <li><a href="project.html">SCHOOL PROJECTS</a></li>
      <li><a href="external-projects.html">EXTERNAL PROJECTS</a></li>
      <li><a href="competition.html">COMPETITIONS</a></li>
  </ul>
  </div>

  <div class="col-sm-4 footer-box-3">
    <h3 class="heading-footer text-uppercase white">Contact us</h3>
    <div class="form-area">  
    <form role="form" class="enquiries">
    <div class="form-group">
    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
    </div>

    <div class="form-group">
    <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
    </div>

    <div class="form-group">
    <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="100" rows="3"></textarea>                  
    </div>
    <button type="button" id="submit" name="submit" class="btn btn-primary pull-left">submit</button>
    </form>
    </div>
  </div>
  </div>
  </div>
  <div class="copy-right text-center">Copyright  &copy; 2017. Privacy Policy.</div>
</section>
<!--======================footer========================-->
</main>

<script>
$(function () {
  $("#inputFile").change(function () {
      readURL(this);
  });
});

function readURL(input) {
if (input.files && input.files[0]) {
 var reader = new FileReader();

   reader.onload = function (e) {
        //alert(e.target.result);
        $('#imgLogo').attr('src', e.target.result);
 }

reader.readAsDataURL(input.files[0]);
}
}
</script> 

<script type="text/javascript"> 
$(document).ready(function(){

$("#loginForm").submit(function(e) {
$('.error').html('');
var formData = new FormData($(this)[0]);
var url = baseUrl+'user/login'; // the script where you handle the form input. 
$.ajax({
type: "POST",
url: url,
data: formData,//$("#loginForm").serialize(),
dataType: 'json', // serializes the form's elements.
contentType: false,
processData: false,// serializes the form's elements.
success: function(data)
{
    // show response from the php script.
   if(data.error!='')
   {
      $.each( data.error, function( key, value ) {
        //alert( key + ": " + value );
        $('.'+key).html(value);
      });
   }
   if(data.success)
   { 
       window.location='<?php echo base_url(); ?>'+data.success.url;
   }
}
}); 
e.preventDefault(); // avoid to execute the actual submit of the form.
});


$("#RegistrationForm").submit(function(e) {
    $('.error').html('');
    var formData = new FormData($(this)[0]);
    var url = baseUrl+'user/RegisterUser'; // the script where you handle the form input. 
    $.ajax({
       type: "POST",
       url: url,
       data: formData, 
       dataType: 'json',
       contentType: false,
       processData: false,// serializes the form's elements.
     success: function(data)
     {
      // show response from the php script.

       if(data.error!='')
       {
          $.each( data.error, function( key, value ) {
            //alert( key + ": " + value );
            $('.'+key).html(value);
          });
       }
       if(data.success)
       { 
           $('.regi_heading').addClass('hide');
           $('.regi_in').html('<div  style="color:green">Please check your mail for confirmation link.</div>');

             window.setTimeout(function() {
               window.location='<?php echo base_url(); ?>'+data.success.url;
            }, 5000);
           
       }
     }
    }); 
      e.preventDefault(); // avoid to execute the actual submit of the form.
});
})
</script>

<!--=====Logo-slider======-->
<script type="text/javascript">
$(document).ready(function(){
  $('.customer-logos').slick({
  	slidesToShow: 6,
  	slidesToScroll: 1,
  	autoplay: true,
  	autoplaySpeed: 1500,
  	arrows: false,
  	dots: false,
  	pauseOnHover: false,
  	responsive: [{
  	    breakpoint: 768,
  	    settings: {
  	        slidesToShow: 4
  	    }
  	}, {
  	    breakpoint: 520,
  	    settings: {
  	        slidesToShow: 2
  	    }
  	}]
  	});
	});
</script>
<!--=====Logo-slider======-->


<!--=====Grid======-->
<script>
// external js: masonry.pkgd.js
$('.masonry').masonry({ 
  "columnWidth": ".grid-sizer",
	"itemSelector": ".grid-item",
  transitionDuration: 0, 
  "percentPosition": true});
 </script>
<!--=====Grid======-->


<!--View-all-card-->
<script type="text/javascript">
$(document).ready(function(){
	$(".view-all-block").slideToggle(0);
    $(".view-all-a1").click(function(){
        $(".view-all-block").slideToggle(2000);
    });

    $(".view-all-block_1").slideToggle(0);
    $(".view-all-a2").click(function(){
        $(".view-all-block_1").slideToggle(2000);
    });

    $(".view-all-block_2").slideToggle(0);
    $(".view-all-a3").click(function(){
        $(".view-all-block_2").slideToggle(2000);
    });
});

function deleteproject(myid)
{
   if(confirm("Are you sure Do you want to delete project?"))
   {
      window.location='<?php echo base_url(); ?>project/deleteProject/'+myid
   } 
}
</script>
<!--View-all-card-->
</body>
</html>