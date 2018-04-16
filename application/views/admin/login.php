<!-- Modal -->
<section class="form-section project_main modal fade" id="loginModal" role="dialog">
<div class="modal-dialog">
<div class="regi_form">
<div class="regi_heading text-uppercase white">
    <img src="images/login-icon.png" alt="" class="regi_icon" > Login</div>
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
<i class="fa fa-unlock-alt" aria-hidden="true"></i>
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