<script type="text/javascript">
	var GallaryID=0;
var FinalTop=0;
var Finalleft=0;
	$(document).ready(function(){
		 $('.MyEditTitle').click(function(){ 
		 	$('.MyEditTitle').addClass('hide');
		 	$('#MyTitle').addClass('hide');
		 	$('#MyFormTitle').removeClass('hide');
		 });

		 $('.MyEditHomepage').click(function(){ 
		 	$('#Home_Pagelink').addClass('hide'); 
		 	$('#homepagelink_form').removeClass('hide');
		 });

		 $("#MyCancelEditHomepage").click(function(){
          $('#Home_Pagelink').removeClass('hide');
           $('#homepagelink_form').addClass('hide');
          // $('#MyTitle').removeClass('hide'); 
        });

		 $('.MyEditProjectlink').click(function(){ 
		 	$('#projectlink').addClass('hide'); 
		 	$('#projectlink_form').removeClass('hide');
		 });

		 $("#MyCancelEditprojectlink").click(function(){
          $('#projectlink').removeClass('hide');
           $('#projectlink_form').addClass('hide');
          // $('#MyTitle').removeClass('hide'); 
        });

		 $('.MyEditProjectnews').click(function(){ 
		 	$('#projectnews').addClass('hide'); 
		 	$('#projectnews_form').removeClass('hide');
		 });

		 $("#MyCancelEditprojectnews").click(function(){
          $('#projectnews').removeClass('hide');
           $('#projectnews_form').addClass('hide');
          // $('#MyTitle').removeClass('hide'); 
        });

		 $('.MyEditProjectdesc').click(function(){ 
		 	$('#projectdes').addClass('hide'); 
		 	$('#projectdesc_form').removeClass('hide');
		 });

		 $("#MyCancelEditprojectdesc").click(function(){
          $('#projectdes').removeClass('hide');
           $('#projectdesc_form').addClass('hide');
          // $('#MyTitle').removeClass('hide'); 
        });

		 $('.MyOrganizerEdit').click(function(){ 
		 	$('.project_organizerInfo').addClass('hide'); 
		 	$('.project_organizerInfo_form').removeClass('hide');
		 });

		 $("#MyCancelEditorganizer").click(function(){
          $('.project_organizerInfo').removeClass('hide');
           $('.project_organizerInfo_form').addClass('hide');
          // $('#MyTitle').removeClass('hide'); 
        });

		 $('.MyMemeberEdit').click(function(){ 
		 	$('.editMember').addClass('hide'); 
		 	$('.editMember_form').removeClass('hide');
		 });

		 $("#MyCancelMyMemeber").click(function(){
          $('.editMember').removeClass('hide');
           $('.editMember_form').addClass('hide');
          // $('#MyTitle').removeClass('hide'); 
        });

		 $(".UpdateTitle").submit(function(e) {
          $('.editable').addClass('loader');
          $('.error').html('');
          var formData = new FormData($(this)[0]);
          var url = baseUrl+'project/Update'; // the script where you handle the form input. 
          $.ajax({
          type: "POST",
          url: url,
          data: formData,
          dataType: 'json',
          contentType: false,
          processData: false,// serializes the form's elements.
          success: function(data)
          {
	          if(data.error!='')
	          {
	             $.each( data.error, function( key, value ) { 
	               $('.'+key).html(value);
	              });
	          }
	          if(data.success)
	             { 
		              if(data.success.fields.Savetitle)
		              {  
		              	$('.MyEditTitle').removeClass('hide');
					 	$('#MyTitle').removeClass('hide');
					 	$('#MyFormTitle').addClass('hide'); 
		                 $('#titleresult').html(data.success.fields.project_title); 
		              } 

		               if(data.success.fields.Saveprojectlink)
		              {  
					 	$('#projectlink').removeClass('hide');
					 	$('#projectlink_form').addClass('hide'); 
		                 $('#linkresult').html(data.success.fields.project_link); 
		              } 

		                if(data.success.fields.Saveprojectdesc)
		              {  
					 	$('#projectdes').removeClass('hide');
					 	$('#projectdesc_form').addClass('hide'); 
		                 $('#descresult').html(data.success.fields.project_description); 
		              }    

		              if(data.success.fields.Saveteachernews)
		              {  
					 	$('#projectnews').removeClass('hide');
					 	$('#projectnews_form').addClass('hide'); 
		                 $('#newsresult').html(data.success.fields.teacher_news_feed); 
		              }

		              if(data.success.fields.saveOrganizer)
		              {  
					 	$('.project_organizerInfo').removeClass('hide');
					 	$('.project_organizerInfo_form').addClass('hide'); 
		                 $('#school_subjectresult').html(data.success.fields.school_subject); 
		                 $('#school_organizerresult').html(data.success.fields.project_organizer); 
		                 $('#school_graderesult').html(data.success.fields.school_grade); 
		                 $('#kantonresult').html(data.success.fields.kanton_id); 
		                 $('#langresult').html(data.success.fields.lang); 
		                 $('#langresult').html(data.success.fields.lang); 
		                 $('.imagelogo').attr('src','uploads/profile_pic/'+data.success.fields.project_organizer_pic); 
		              }

		              if(data.success.fields.Savememebers)
		              {  
					 	$('.editMember').removeClass('hide');
					 	$('.editMember_form').addClass('hide'); 
		                 $('#projectmemebers').html(data.success.fields.members); 
		                 $('#projectdocument').html(data.success.fields.upload_doc); 
		                 $('#projectlike').html(data.success.fields.likes); 
		                 $('#projectdetermined').html(data.success.fields.determined); 
		              }
	             }
             }
          }); 
             e.preventDefault(); // avoid to execute the actual submit of the form.
          });
	})

$(function () {
  $("#ProjectFile").change(function () {
      readProjectURL(this);
  });
});

function readProjectURL(input) {
	if (input.files && input.files[0]) {
	 var reader = new FileReader();

	   reader.onload = function (e) {
	        //alert(e.target.result);
	        $('#ProjectLogo').attr('src', e.target.result);
	 }

	reader.readAsDataURL(input.files[0]);
	}
}

/*===================================Save Project Image===========================================*/
    $("#EditProjectImageForm").submit(function(e) {
		$('.error').html('');
		var formData = new FormData($(this)[0]);
		var url = baseUrl+'project/EditProjectImage'; // the script where you handle the form input. 
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
		       window.location='<?php echo base_url(); ?>project/index/<?php echo $this->uri->segment(3); ?>';
		   }
		}
		}); 
		e.preventDefault(); // avoid to execute the actual submit of the form.
  });
/*===================================Save Project Image===========================================*/

/*===================================Save Project Gallary===========================================*/
    $("#AddProjectGallary").submit(function(e) {
		$('.error').html('');
		var formData = new FormData($(this)[0]);
		var url = baseUrl+'project/projectGallary'; // the script where you handle the form input. 
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
		       window.location='<?php echo base_url(); ?>project/index/<?php echo $this->uri->segment(3); ?>';
		   }
		}
		}); 
		e.preventDefault(); // avoid to execute the actual submit of the form.
  });
/*===================================Save Project Image===========================================*/

$(document).ready(function(){
	t=0;
	$("#addme").click(function(){ 
		t++;
		//onclick="removeme(this)"
	$("#morefiles").append('<div class="row" id="mypic_'+t+'" ><div class="col-xs-3"><div class="upload_img"><img src="assets/images/profile.png" id="imgLogo_'+t+'" style="height: 140px; width: 150px;" alt="" class="img-responsive"></div></div></div><div id="myinput_'+t+'" class="form-group input-group text-center"><label class="btn-bs-file form-control submit"><i class="fa fa-upload upload_icon" aria-hidden="true"></i>Project Image<input type="file" name="UploadPicture[]" class="inputFileclass" id="'+t+'" /></label><span class="UploadPicture_'+t+' error"></span></div>');
	
	});
});



$(window).on('load',function(){
	$(document).on('change','.inputFileclass',function(){
		myid=$(this).attr('id');
	       // alert(myid);
	    readURLs(this);
	}); 
});
function readURLs(input) {
	myid=$(input).attr('id');
	// alert(myid);
	if (input.files && input.files[0]) {
	var reader = new FileReader();

	reader.onload = function (e) {
	//alert(e.target.result);

	$('#imgLogo_'+myid).attr('src', e.target.result);
	}
	reader.readAsDataURL(input.files[0]);
	}
}

$(function () {
	$("#GallaryImage").change(function () {
	  readURLGallary(this);
	});
});
function readURLGallary(input) {
		if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
		//alert(e.target.result);
		$('#GallaryLogo').attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
		}
}

function removeme(obj)
{ 
	$(obj).remove();
	t--;
}

/*==========================================Tag Functionality==========================================*/
$('.add_Tag').click(function(){
	$(this).addClass('hide');
	$('.flex-active-slide').find('.imageMap').addClass('TaggedImage');
	$('.finish_Tag').removeClass('hide'); 
	  GallaryID = $(this).attr('data-Image'); 
})

$('.finish_Tag').click(function(){
	$(this).addClass('hide');
	$('.flex-active-slide').find('.imageMap').removeClass('TaggedImage');
	$('.add_Tag').removeClass('hide'); 
})

 

	function autocomplete(inp, arr,Ppp,UserId) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value; 
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/ 
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong> " +Ppp[i]+arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length); 
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<span style='display:none;'>'" + arr[i] + "'<input type='hidden' value='" + UserId[i] + "'></span>"; 
          //<input type='hidden' value='" + arr[i] + "'>
          
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {  
              /*insert the value for the autocomplete text field:*/
               inp.value = this.getElementsByTagName("input")[0].value;  
                   frd=inp.value;
                  $('#mapper').css('display','none');
                 $('#txtCountry').val('');
                 $.ajax({
                    url: "Project/AddTag",
					data:{'Gallry':GallaryID,'friendID':frd,'top':FinalTop,'left':Finalleft},            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
                    	 
						result($.map(data, function (item) {
							return item;
                        }));
                    }
                });

              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) { 
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) { 
      closeAllLists(e.target);
      });
}

<?php $res=$this->Common_model->getAllData(Gately_User);
$values=array(); 
$ids=array(); 
$image=array();

     foreach ($res as $key => $value) {
        $values[]=$value['Firstname'].' '.$value['LastName'];
        $ids[]=$value['user_id'];
        $image[]='"<img src=uploads/profile_pic/'.$value['profile_pic'].' />"'; 
     } 
?>

/*An array containing all the country names in the world:*/
var countries = <?php  echo json_encode($values); ?>;
var Profilepic =[<?php  echo implode(',', $image); ?>] ;
var UserId = <?php  echo json_encode($ids); ?>;

 
/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("txtCountry"), countries,Profilepic,UserId);



           $(document).ready(function() {

                $('.imageMap').mousemove(function(e){
					GID = $(this).attr('data-Image'); 
					var offset = $(this).offset(); 
					console.log(offset.top+'  '+offset.left); //offset of 'realtiveDiv'
					//console.log(e.pageX +'  '+e.pageY); // mouse position absolute
							$.ajax({
		                    url: "Project/GetAddTag",
							data:{'Gallry':GID,'top':offset.top,'left':offset.left},            
		                    dataType: "json",
		                    type: "POST",
		                    success: function (data) {

		                    	  $('#planetmap').append('<div class="tagged"  style="width:100px;height:100px;left:'+offset.left+';top:'+offset.top+';" >'+data+'</div>');
		                    }
		                });
					});


                $('.tagging_me').mouseover(function(){
                	$(this).attr('data-myid');
                	$(this).attr('data-gallary');
                	$.ajax({
		                    url: "Project/GetMeAddTag",
							data:{'user_id':$(this).attr('data-myid'),'Gallry':$(this).attr('data-gallary')},            
		                    dataType: "json",
		                    type: "POST",
		                    success: function (data) {

		                    	  $('#planetmap').append('<div class="tagged"  style="width:100px;height:100px;left:'+data.position.left+';top:'+data.position.top+';" >'+data.name+'</div>');
		                    }
		                });
                })


                $(".imageMap").click(function(e){
                   if($(this).hasClass('TaggedImage')){ 
                       
                    var image_left = $(this).offset().left;
                    var click_left = e.pageX;
                    var left_distance = click_left - image_left;

                    var image_top = $(this).offset().top;
                    var click_top = e.pageY;
                    var top_distance = click_top - image_top;

                    var mapper_width = $('#mapper').width();
                    var imagemap_width = $(this).width();

                    var mapper_height = $('#mapper').height();
                    var imagemap_height = $(this).height();
                      
                    



                    if((top_distance + mapper_height > imagemap_height) && (left_distance + mapper_width > imagemap_width)){
                        $('#mapper').css("left", (click_left - mapper_width - image_left  ))
                        .css("top",(click_top - mapper_height - image_top  ))
                        .css("width","100px")
                        .css("height","100px")
                        .show();
                        FinalTop=click_top - mapper_height - image_top;
                        Finalleft=click_left - mapper_width - image_left;
                    }
                    else if(left_distance + mapper_width > imagemap_width){


                        $('#mapper').css("left", (click_left - mapper_width - image_left  ))
                        .css("top",top_distance)
                        .css("width","100px")
                        .css("height","100px")
                        .show();

                        FinalTop=top_distance;
                        Finalleft=click_left - mapper_width - image_left;
			
                    }
                    else if(top_distance + mapper_height > imagemap_height){
                        $('#mapper').css("left", left_distance)
                        .css("top",(click_top - mapper_height - image_top  ))
                        .css("width","100px")
                        .css("height","100px")
                        .show();
                        FinalTop=click_top - mapper_height - image_top;
                        Finalleft=left_distance;
                    }
                    else{


                        $('#mapper').css("left",left_distance)
                        .css("top",top_distance)
                        .css("width","100px")
                        .css("height","100px")
                        .show();
                        FinalTop=top_distance;
                        Finalleft=left_distance;
                    }


		                    $("#mapper").resizable({ containment: "parent" });
		                    $("#mapper").draggable({ containment: "parent" });

                    }
                    
                });


            });




            $(".tagged").live("mouseover",function(){
                if($(this).find(".openDialog").length == 0){
                    $(this).find(".tagged_box").css("display","block");
                    $(this).css("border","5px solid #EEE");

                    $(this).find(".tagged_title").css("display","block");
                }
			

            });

            $(".tagged").live("mouseout",function(){
                if($(this).find(".openDialog").length == 0){
                    $(this).find(".tagged_box").css("display","none");
                    $(this).css("border","none");
                    $(this).find(".tagged_title").css("display","none");
                }
			

            });

            $(".tagged").live("click",function(){
                $(this).find(".tagged_box").html("<img src='del.png' class='openDialog' value='Delete' onclick='deleteTag(this)' />\n\
        <img src='save.png' onclick='editTag(this);' value='Save' />");

                var img_scope_top = $("#imageMap").offset().top + $("#imageMap").height() - $(this).find(".tagged_box").height();
                var img_scope_left = $("#imageMap").offset().left + $("#imageMap").width() - $(this).find(".tagged_box").width();

                $(this).draggable({ containment:[$("#imageMap").offset().left,$("#imageMap").offset().top,img_scope_left,img_scope_top]  });

            });

             function addTag(){
                var position = $('#mapper').position();

                 
                var pos_x = position.left;
                var pos_y = position.top;
                var pos_width = $('#mapper').width();
                var pos_height = $('#mapper').height();


                $('#planetmap').append('<div class="tagged"  style="width:'+pos_width+';height:'+
                    pos_height+';left:'+pos_x+';top:'+pos_y+';" ><div   class="tagged_box" style="width:'+pos_width+';height:'+
                    pos_height+';display:none;" ></div><div class="tagged_title" style="top:'+(pos_height+5)+';display:none;" >'+
                    $("#title").val()+'</div></div>');

                $("#mapper").hide();
                $("#title").val('');
                $("#form_panel").hide();
                

            };

              function openDialog(){
                $("#form_panel").fadeIn("slow");
            };

             function showTags(){
                $(".tagged_box").css("display","block");
                $(".tagged").css("border","5px solid #EEE");
                $(".tagged_title").css("display","block");
            };

              function hideTags(){
                $(".tagged_box").css("display","none");
                $(".tagged").css("border","none");
                $(".tagged_title").css("display","none");
            };
		
            var editTag = function(obj){

                $(obj).parent().parent().draggable( 'disable' );
                $(obj).parent().parent().removeAttr( 'class' );
                $(obj).parent().parent().addClass( 'tagged' );
                $(obj).parent().parent().css("border","none");
                $(obj).parent().css("display","none");
                $(obj).parent().parent().find(".tagged_title").css("display","none");
                $(obj).parent().html('');

            }

            var deleteTag = function(obj){
                $(obj).parent().parent().remove();
 }; 

        </script>