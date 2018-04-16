<div class="landingpage">
<div class="land-head text-center white">
	<div class="container">
		<h1>Welcome to Gately!</h1>
		<p>Thank you for your Registration!</p>
	</div>
</div>

<div class="land-selection text-center">
	<div class="container">
		<h2>Please Let us know a little bit about you:</h2>
		<div class="row">
			<div class="col-sm-4 col-sm-push-4 col-xs-10 col-xs-push-1">
				
				<form class="select-form text-left">
				<div data-select-box>
					<select name="salutation" id="salutation" class="form-control">
					        <option value="1">Salutation</option>
					        <option value="2">Salutation</option>
							<option value="3">Salutation</option>
							<option value="4">Salutation</option>
					</select>
				</div>
                
                <div class="regi_form">
                <div class="form-group">
			      <div class="input-group">
			          <div class="input-group-addon">
			          <i class="fa fa-user" aria-hidden="true"></i>
			          </div>
			          <input class="form-control" id="Firstname" aria-describedby="emailHelp" placeholder="First Name" name="Firstname" type="text">
			          <div class="error Firstname"></div>
			      </div>
			     </div>

			     <div class="form-group">
			      <div class="input-group">
			          <div class="input-group-addon">
			          <i class="fa fa-user" aria-hidden="true"></i>
			          </div>
			          <input class="form-control" name="LastName" id="LastName" aria-describedby="emailHelp" placeholder="Last Name" type="text">
			          <div class="error LastName"></div>
			      </div>
			     </div>
                 </div>
			     </form>
			</div>
		</div>
	</div>
</div>


<div class="land-selection text-center">
<div class="container">
<h2>What is your role on Gately ?</h2>
<div class="row role-section">
<div class="col-xs-12 col-sm-3 col-lg-2 col-lg-push-2 rol-box">
<div class="role-block one">
	<div class="rol-in">
		<p>I want to make a new registration</p>
	</div>
</div>
</div>

<div class="col-xs-12 col-sm-3 col-lg-2 col-lg-push-2 rol-box">
<div class="role-block two">
	<div class="rol-in">
		<p>School Admin</p>
	</div>
</div>
</div>

<div class="col-xs-12 col-sm-3 col-lg-2 col-lg-push-2 rol-box MyProfile">
<div class="role-block three">
	<div class="rol-in">
		<p><a id="Student"  href="javascript:void(0)">Student</a></p>
	</div>
</div>
</div>

<div class="col-xs-12 col-sm-3 col-lg-2 col-lg-push-2 rol-box">
<div class="role-block four">
	<div class="rol-in">
		<p>Friend & Family</p>
	</div>
</div>
</div>
 </div>

<div class="row role-section">
<div class="col-xs-12 col-sm-3 col-lg-2 col-lg-push-2 rol-box">
<div class="role-block five">
	<div class="rol-in">
		<p>Admin for Organization</p>
	</div>
</div>
</div>

<div class="col-xs-12 col-sm-3 col-lg-2 col-lg-push-2 rol-box">
<div class="role-block six">
	<div class="rol-in">
		<p>Teacher</p>
	</div>
</div>
</div>

<div class="col-xs-12 col-sm-3 col-lg-2 col-lg-push-2 rol-box">
<div class="role-block four">
	<div class="rol-in">
		<p>Parent</p>
	</div>
</div>
</div>

<div class="col-xs-12 col-sm-3 col-lg-2 col-lg-push-2 rol-box">
<div class="role-block six">
	<div class="rol-in">
		<p>Individual</p>
	</div>
</div>
</div>
</div> 

 <div class="text-center clearfix">
	<a href="#" class="project-btn in_block">
	<i class="fa fa-paper-plane-o" aria-hidden="true"></i> Go To Gately</a>
</div>
</div>
</div>

</div>

<script type="text/javascript">
	$(document).ready(function()
	{

		$('.MyProfile').click(function(){ 
		      Firstname=$('#Firstname').val();
		      
		      LastName=$('#LastName').val();

		      if(Firstname.trim()=='')
		      { 
                 $('.Firstname').html('First name required.');
		      } 

		      if(LastName.trim()=='')
		      {
                 $('.LastName').html('Last name required.');
		      }

		      if(Firstname.trim()!='' && LastName.trim()!='')
		      {
		      	 window.location='user/update/'+Firstname+'/'+LastName;
		      }

		})
	})
</script>