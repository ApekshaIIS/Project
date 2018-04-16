<script type="text/javascript">

$('.ProfileForm').submit(function(e){
		e.preventDefault();
		//alert(duration);
		
		var formData = new FormData($(this)[0]);
		// ajax adding data to database
		$.ajax({
			url: "<?php echo base_url('home/Front/EditProfile') ?>",
			type: "POST",
			data: formData,
			dataType: "JSON",
			cache: false,
			contentType: false,
			processData: false,
			success: function (data)
			{
				  if(data.response=='error')
	                  {
	                    $(".error").html('');
		            	$.each(data.error, function( key, val) {
		            		//alert(key);
		            		if(key=='criteria[]')
		            		  {
		            		  	$(".criteria").html(val);
		            		  }else if(key=='flixibility[]')
		            		  {
                                $(".flixibility").html(val);
		            		  }
		            		  else if(key=='possible_start[]')
		            		  {
                                $(".possible_start").html(val);
		            		  }
		            		  else if(key=='dob[]')
		            		  {
                                $(".dob").html(val);
		            		  }else if(key=='DOB')
		            		  {
                                $(".DOB").html(val);
		            		  }else if(key=='gender')
		            		  {
                                $(".gender").html(val);
		            		  }else if(key=='terms')
		            		  {
                                $(".terms").html('<b>'+val+'</b>');
		            		  }else
		            		  {
		            		  	$("."+key).html(val);
		            		  }
		            	  
						});
	                  }else if(data.response=='success')
	                  { 
	                     $(".error").html('');
	                     window.location=data.locations;
	                   }
			}
		});
	});