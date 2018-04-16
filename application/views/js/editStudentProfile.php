<script type="text/javascript">
	$(document).ready(function(){

        $(".MyEdit").click(function(){
          $('.MyEdit').addClass('hide');
           $('.Editprofile').removeClass('hide');
           $('.editable').addClass('hide'); 
        }); 

        $("#MyCancelEdit").click(function(){
          $('.MyEdit').removeClass('hide');
           $('.Editprofile').addClass('hide');
           $('.editable').removeClass('hide'); 
        }); 

         $(".MyEditdes").click(function(){
          $('.MyEditdes').addClass('hide');
           $('.EditDes').removeClass('hide');
           $('.editabledes').addClass('hide'); 
        });

         $("#MyCancelEditdes").click(function(){
          $('.MyEditdes').removeClass('hide');
           $('.EditDes').addClass('hide');
           $('.editabledes').removeClass('hide'); 
        });

        $(".editmydata").submit(function(e) {
           if($('.EditDes').hasClass("hide"))
           {
             $('.MyEditdes').removeClass('hide');
             $('.EditDes').addClass('loader');
           }else
           {
             $('.MyEdit').removeClass('hide');
             $('.editable').addClass('loader');
           }
          
          $('.error').html('');
          var formData = new FormData($(this)[0]);
          var url = baseUrl+'user/UpdateMyProfile'; // the script where you handle the form input. 
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
                  if(data.success.fields.des)
                  {  
                    $('.EditDes').addClass('hide');
                     $('.editabledes').html(data.success.fields.des);
                     //window.location='<?php echo base_url(); ?>'+data.success.url;
                     $('.editabledes').removeClass('hide');
                     $('.editable').removeClass('loader');
                     $('.MyEditdes').removeClass('hide');
                  }else
                  {    
                     $('.MyEdit').removeClass('hide');
                     $('.Editprofile').addClass('hide');
                      $('#myname').html(data.success.fields.Firstname+' '+data.success.fields.LastName);
                     ;
                     $('#myaddress').html(data.success.fields.address);
                     $('#mygrade').html(data.success.fields.schoolgrade);
                     if(data.success.fields.profile_pic)
                     {
                       $('.profile-picture').html('<img src="uploads/profile_pic/'+data.success.fields.profile_pic+'" alt="" class="img-responsive img-circle" width="100%">');
                     }
                     
                     //window.location='<?php echo base_url(); ?>'+data.success.url;
                     $('.editable').removeClass('hide');
                     $('.editable').removeClass('loader');
                  }  
                 }
          }
          }); 
            e.preventDefault(); // avoid to execute the actual submit of the form.
          });



        $("#add_friends").submit(function(e) {
          $('.error').html('');
          var formData = new FormData($(this)[0]);
          var url = baseUrl+'user/AddFriends'; // the script where you handle the form input. 
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
                      if(data.success.fields.des)
                      {  
                        $('.EditDes').addClass('hide');
                         $('.editabledes').html(data.success.fields.des);
                         //window.location='<?php echo base_url(); ?>'+data.success.url;
                         $('.editabledes').removeClass('hide');
                         $('.editable').removeClass('loader');
                         $('.MyEditdes').removeClass('hide');
                      } 
                   }
          }
          }); 
            e.preventDefault(); // avoid to execute the actual submit of the form.
          });

        $('.MyEditfriends').click(function(){
           $('.chat_box_0').removeClass('hide');
        })

   });
</script>