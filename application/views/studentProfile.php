<div class="pro-main-img"> 
<a href="#" class="more-btn" data-toggle="modal" data-target="#myModal" onclick="flexsliderStart();">More Photos</a>
<img src="assets/images/project-banner.jpg" alt="" class="img-responsive" width="100%">
</div>


<div class="project_main student-profile">
<div class="tab_container">
<div class="container">
<div class="pro-tab">
<div class="row">
<div class="col-sm-8 pro-left">

<div class="clearfix heading-page">
<h3 class="pull-left">Student Profile</h3>
<div class="MyEdit pull-right">
 <a href="javascript:void(0)" class="project-btn text-center">
<i aria-hidden="true"></i> Edit</a>
</div>
</div>

<div class="profile clearfix editable">
  <div class="col-sm-3 profile-picture">
<?php $profile='assets/images/profile-student.png';
 
    if($this->Userdata['profile_pic']!='')
    {
      $profile='uploads/profile_pic/'.$this->Userdata['profile_pic'];
    }
 ?>
<img src="<?php echo $profile; ?>"  alt="" class="img-responsive img-circle" width="100%" /> </div>

  <div class="col-sm-9">
    <h4 class="name-student" id="myname"><?php echo $this->Userdata['Firstname'].' '.$this->Userdata['LastName']; ?></h4>
    <h4 id="myaddress"><?php if($this->Userdata['address']!=''){ echo $this->Userdata['address']; }else{ echo "Name of School, Place"; } ?> </h4>
    <h4 id="mygrade"><?php if($this->Userdata['schoolgrade']!=''){ echo $this->Userdata['schoolgrade']; }else{ echo "Name of School Grade"; } ?></h4>
  </div>
</div>

<div class="Editprofile hide profile-add">
   <form class="editmydata" method="post" enctype="multipart/form-data">
     <div class="profile clearfix">
          <div class="col-sm-3 profile-pic">
            <?php $profile='assets/images/profile-student.png';
                if($this->Userdata['profile_pic']!='')
                {
                  $profile='uploads/profile_pic/'.$this->Userdata['profile_pic'];
                }
             ?>
            <img src="<?php echo $profile; ?>" id="imgLogo" alt="" class="img-responsive img-circle" width="100%" />
  

<div class="form-group input-group text-center edit_btn">
<label class="btn-bs-file form-control">
<i class="fa fa-pencil" aria-hidden="true"></i>Edit
<input name="profile_pic" id="inputFile" type="file"></label> 
<span class="project_organizer_pic error"></span>
</div>


<!-- <input type="file" name="profile_pic" id="inputFile"> -->

<span class="error profile_pic"></span>
</div>

          <div class="col-sm-9">
              <input type="text" name="Firstname" id="Myeditfirstname" value="<?php echo $this->Userdata['Firstname'] ?>" >
              <span class="error Firstname"></span>
              <input type="text" name="LastName" id="Myeditlastname" value="<?php echo $this->Userdata['LastName'] ?>" >
              <span class="error LastName"></span>
              <?php //echo $this->Userdata['Firstname'].' '.$this->Userdata['LastName']; ?> 
              <input type="text" name="address" id="Myeditaddress" placeholder="Name of School, Place" value="<?php echo $this->Userdata['address'] ?>" > 
                <span class="error address"></span>
              <input type="text" name="schoolgrade" id="Myeditschoolgrade" placeholder="Name of School Grade" value="<?php echo $this->Userdata['schoolgrade'] ?>" >
              <span class="error schoolgrade"></span>

              <input type="hidden" name="Save" value="Save">
             
              <div class="row">
              <div class="col-xs-6">
              <input type="submit" name="Submit" value="Save" class="project-btn">
              </div>

              <div class="col-xs-6">
              <input type="button" name="MyCancelEdit" id="MyCancelEdit" value="Cancel" class="project-btn">
              </div>
              </div>
              

          </div>
        </div>
      </form>
</div>

<div class="description">
<div class="clearfix heading-page">
<h3 class="pull-left">My Profile</h3>

<div class="MyEditdes pull-right">
 <a href="javascript:void(0)" class="project-btn text-center">
   <i aria-hidden="true"></i> Edit
</a>
</div>
</div>

    <p class="editabledes"><?php if($this->Userdata['des']!=''){ echo $this->Userdata['des']; }else{ echo "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum."; } ?></p>
</div>


  <div class="EditDes hide profile-msg profile-add"">
   <form class="editmydata" method="post" >
      <div class="description" id="myeditabledes">
          <textarea name="des"><?php echo $this->Userdata['des'] ?></textarea>
          <span class="error des"></span>

      <input type="hidden" name="Savedesc" value="Savedesc">
      <input type="hidden" name="Save" value="Save">
      <div class="row">
        <div class="col-xs-6 col-sm-3"><input type="submit" name="Submit" value="Save" class="project-btn"></div>
        <div class="col-xs-6 col-sm-3"> <input type="button" name="MyCancelEditdes" id="MyCancelEditdes" value="Cancel" class="project-btn"></div>
       </div>
     </div>
     
    </form>
  </div>
   

<div class="description">
<h3>Current Projects</h3>
<div class="row">
<div id="adv_team_4_columns_carousel" class="carousel slide four_shows_one_move team_columns_carousel_wrapper" data-ride="carousel" data-interval="2000" data-pause="hover">
<div class="carousel-inner" role="listbox">

<!--========= 1st slide =========-->
<div class="item">
<div class="col-xs-12 col-sm-6 col-md-6 team_columns_item_image">
<div class="pro-box">
    <div class="school"><img src="assets/images/school.png" alt="">Name of School</div>
    <div class="subject">Subject</div>
    <img src="assets/images/pro-image-4.jpg" alt="" class="img-responsive img-rounded" width="100%">
</div>
</div>

<div class="col-xs-12 col-sm-6 col-md-6 team_columns_item_image cloneditem-1">
<div class="pro-box">
    <div class="school"><img src="assets/images/school.png" alt="">Name of School</div>
    <div class="subject">Subject</div>
    <img src="assets/images/pro-image-5.jpg" alt="" class="img-responsive img-rounded" width="100%">
</div>
</div>
</div>

<!--========= 2nd slide =========-->
<div class="item active">
<div class="col-xs-12 col-sm-6 col-md-6 team_columns_item_image">
<div class="pro-box">
    <div class="school"><img src="assets/images/school.png" alt=""> Name of School</div>
    <div class="subject">Subject</div> 
    <img src="assets/images/pro-image-4.jpg" alt="" class="img-responsive img-rounded" width="100%">
</div>
</div>
<div class="col-xs-12 col-sm-6 col-md-6 team_columns_item_image cloneditem-1">
<div class="pro-box">
    <div class="school"><img src="assets/images/school.png" alt=""> Name of School</div>
    <div class="subject">Subject</div>
    <img src="assets/images/pro-image-5.jpg" alt="" class="img-responsive img-rounded" width="100%">
</div>
</div>
</div>
</div>

 <!--======= Navigation Buttons =========-->
<div class="slider-arrow">
   <!--======= Left Button =========-->
 <a class="left carousel-control team_columns_carousel_control_left adv_left" href="#adv_team_4_columns_carousel" role="button" data-slide="prev">
 <span class="fa fa-angle-left team_columns_carousel_control_icons" aria-hidden="true"></span>
 <span class="sr-only">Previous</span>
 </a>

 <!--======= Right Button =========-->
 <a class="right carousel-control team_columns_carousel_control_right adv_right" href="#adv_team_4_columns_carousel" role="button" data-slide="next">
  <span class="fa fa-angle-right team_columns_carousel_control_icons" aria-hidden="true"></span>
 <span class="sr-only">Next</span>
 </a>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6 col-md-4 pull-right">
<label class="btn-bs-file project-btn text-center upload_btn">
<i class="fa fa-upload" aria-hidden="true"></i> Upload Picture
<input type="file" />
</label>
</div>
</div>
</div>

<div class="description file-section">
<h3>Files</h3>
<a href="#">Project Report XY</a>
<a href="#">School Trip Report Xy</a>
</div>

<!--==================Comment========================-->
<div class="comment reply">
<h2><i class="fa fa-comments" aria-hidden="true"></i> Chat</h2>
<div class="in-comment">
<div class="clearfix">
<div class="pull-left comment-name">
<div class="photo">
<div class="avatar current-cate" style="background-image: url('assets/images/comment-1.jpg')"></div>
</div>
<div class="name-right">
<h4>Thomas Schulz</h4>
</div>
</div>
<div class="pull-right time-reply">
  <p><i class="fa fa-clock-o" aria-hidden="true"></i> 12 min ago</p>
</div>
</div>
<div class="comment more">
 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis  Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis 
</div>
</div>

<div class="in-comment">
<div class="clearfix">
<div class="pull-left comment-name">
<div class="photo">
<div class="avatar" style="background-image: url('assets/images/comment-2.jpg')"></div>
</div>
<div class="name-right">
<h4>Denise Hoffmann</h4>
</div>
</div>
<div class="pull-right time-reply">
  <p><i class="fa fa-clock-o" aria-hidden="true"></i> 13 min ago</p>
</div>
</div>
<div class="comment more">
 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis  Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis 
</div>
</div>

<div class="in-comment">
<div class="clearfix">
<div class="pull-left comment-name">
<div class="photo">
<div class="avatar current-cate" style="background-image: url('assets/images/comment-1.jpg')"></div>
</div>
<div class="name-right">
<h4>Thomas Schulz</h4>
</div>
</div>
<div class="pull-right time-reply">
<p><i class="fa fa-clock-o" aria-hidden="true"></i> 14 min ago</p>
</div>
</div>
<div class="comment more">
 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis  Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis 
</div>
</div>

<div class="comment-wrap">
  <div class="photo">
  <div class="avatar" style="background-image: url('assets/images/comment-2.jpg')"></div>
  </div>
  <div class="comment-block">
  <form action="">
  <textarea name="" id="" cols="30" rows="3" placeholder="Add comment..."></textarea>
  </form>
  </div>
  </div>

<div class="comment-icon clearfix">
  <div class="pull-left">
  <a href="#"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
  <a href="#">@</a>
  <a href="#"><i class="fa fa-smile-o" aria-hidden="true"></i></a>
  <a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a>
  </div>

  <div class="pull-right">
  <button type="button" class="no_marign" id="submit" name="send" class="btn btn-primary pull-left">send</button>
  </div>
</div>
</div>
<!--==================Comment========================-->
</div>

<div class="col-sm-4 pro-right">
<div class="row">

<!-- <div class="col-sm-12 col-md-6 MyEdit">  
<a href="javascript:void(0)" class="project-btn text-center">
<i  aria-hidden="true"></i> Edit</a>
</div> -->

<div class="col-sm-12 col-md-6">  
<a href="#" class="project-btn text-center">
<i class="fa fa-hand-o-right" aria-hidden="true"></i> Options</a>
</div>
</div>

<div class="chat_right">
 <h3>Friends & family</h3>
 <div class=" pull-right">
 <a href="javascript:void(0)" class="project-btn text-center MyEditfriends">
  <i aria-hidden="true"></i> Add Friends & Family</a>
</div>

<div class="MyEditfriends_form hide profile-msg profile-add"">
   <form id="add_friends" method="post" >

      <div class="chat_box_0 hide">
      <div class="row">
      <div class="col-sm-2 col-xs-2 chat_user upload_img">
      <img src="assets/images/user-chat.png" alt="" id="Friendimg" class="img-responsive current-cate"></div>
       <div class="form-group input-group text-center edit_btn">
          <label class="btn-bs-file form-control">
          <i class="fa fa-pencil" aria-hidden="true"></i>Edit
          <input name="profile_pic" id="friendinputFile" type="file"></label> 
          <span class="friend_pic error"></span>
        </div>
      <div class="col-sm-10 col-xs-10">
        <div class="name">Thomas Schulz</div>
        <span>Vater</span>
      </div>
      </div>
      </div>
     
    </form>
  </div>

 <!--  <div class="chat_box">
  <div class="row">
  <div class="col-sm-2 col-xs-2 chat_user">
  <img src="assets/images/user-chat.png" alt="" class="img-responsive current-cate"></div>
  <div class="col-sm-10 col-xs-10">
    <div class="name">Thomas Schulz</div>
    <span>Vater</span>
  </div>
  </div>
  </div> --> 
 

</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php $this->load->view('js/editStudentProfile'); ?>