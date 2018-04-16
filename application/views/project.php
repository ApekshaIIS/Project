<style type="text/css">
  .TaggedImage
  {
    cursor: crosshair;
  }

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}


 /* .typeahead { border: 2px solid #FFF;border-radius: 4px;padding: 8px 12px;max-width: 300px;min-width: 290px;background: rgba(66, 52, 52, 0.5);color: #FFF;}
  .tt-menu { width:300px; }
  ul.typeahead{margin:0px;padding:10px 0px;}
  ul.typeahead.dropdown-menu li a {padding: 10px !important;  border-bottom:#CCC 1px solid;color:#FFF;}
  ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
  .bgcolor {max-width: 550px;min-width: 290px;max-height:340px;background:url("world-contries.jpg") no-repeat center center;padding: 100px 10px 130px;border-radius:4px;text-align:center;margin:10px;}
  .demo-label {font-size:1.5em;color: #686868;font-weight: 500;color:#FFF;}
  .dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
    text-decoration: none;
    background-color: #1f3f41;
    outline: 0;
  }*/


  #mapper{
                border:5px solid #EEE;
                width:100px;
                height:100px;
                min-width:100px;
                min-height:100px;
                z-index:1000;
                position:absolute;
                top:0;
                display:none;
            }

            #planetmap div{

                display:block;
                position:absolute;
            }




            #main_panel{
                margin: auto;
                padding: 10px;
                width: 1000px;
            }
            #url_panel{

            }
            #form_panel{
                float: left;
                background:#eee;
                border:5px solid #FFF;
                outline:1px solid #eee;
                left: 100px;
                padding: 5px;
                position: absolute;
                top: 40px;
                width: 310px;
                display:none;
                z-index:2000;
            }

            #form_panel input,textarea{
                padding:3px;
                background:#FFF;
                border:1px solid #CFCFCF;
                color:#000;
            }

            #image_panel{
                float:left;
                width:600px;
                position:relative;
            }
            #image_panel img{
                left:0;top:-102px;
                max-width: 600px;
                overflow: hidden;

            }


            #form_panel .label{
                float:left;
                width:80px;
                padding:5px;
            }

            #form_panel .field{
                float:left;
                width:200px;
                padding:5px;
            }

            #form_panel .row{
                clear:both;
            }

            .tagged_title{
                background: none repeat scroll 0 0 #538DD3;
                border: 2px solid;
                color: #FFFFFF;
                font-size: 12px;
                font-weight: bold;
                padding: 3px;
                margin-top:5px;
            }


            #info_panel{
                padding:10px;
                margin:20px 0;
                background:#eee;
            }


            input[type='button']{
                background: none repeat scroll 0 0 #2769C4;
                border: 1px solid #CFCFCF;
                color: #FFFFFF;
                font-weight: bold;
                height: 30px;
                padding: 5px;
            }
</style>
<link rel="stylesheet" href="assets/dist/css/bootstrap-select.css">
<?php //$Images=json_decode($row['project_images']); ?>
<div class="pro-main-img"> 
<a href="#" class="more-btn" data-toggle="modal" data-target="#myModal" onclick="flexsliderStart();">More Photos</a>
 <a href="#"   data-toggle="modal" data-target="#EditProjectImage" >Edit ProjectImage</a>

 <a href="#"   data-toggle="modal" data-target="#UploadGallaryProject" >Upload Gallary Images</a>
     


<img src="uploads/projects/<?php echo $row['project_images']; ?>" alt="" class="img-responsive"  width="100%">
</div>

<div class="project_main">
<div class="container">
<div class="pro-tab no_padding">

<div class="breadcrumb flat">
 <a href="#"><i class="fa fa-home" aria-hidden="true"></i></a>
  <a href="#">Projects</a>
  <a href="#">School Projects</a>
  <a href="#" class="active"><?php echo $row['project_title']; ?></a>
</div> 
<div class="row">
  <div class="MyEditTitle pull-right">
 <a href="javascript:void(0)" class="project-btn text-center">
<i aria-hidden="true"></i> Edit</a>
</div>
<div class="col-sm-8 pro-left">
<span id="MyTitle"><h3 id="titleresult"><?php echo $row['project_title']; ?></h3></span> 
<span id="MyFormTitle" class="hide">
  <form class="UpdateTitle" method="post">
      <input type="text" value="<?php echo $row['project_title']; ?>" name="project_title">
      <span class="project_title error"></span>
       <input type="hidden" name="Savetitle" value="Save">
       <input type="hidden" name="project_id" value="<?php echo $this->uri->segment(3); ?>">
       <div class="row">
                <div class="col-xs-6">
                <input type="submit" name="Submit" value="Save" class="project-btn">
                </div>

                <div class="col-xs-6">
                <input type="button" name="MyCancelEdit" id="MyCancelEdit" value="Cancel" class="project-btn">
                </div>
       </div>
  </form>
</span>




<div class="page-link">
 
  <a href="javascript:void(0)" ><i class="fa fa-anchor link-icon" aria-hidden="true"></i> <?php echo $row['link_home_page']; ?></a>
   
</span>

<span id="projectlink">
  <a href="javascript:void(0)" id="linkresult"><i class="fa fa-anchor link-icon" aria-hidden="true"></i> <?php echo $row['project_link']; ?></a>
  <div class="MyEditProjectlink pull-right">
     <a href="javascript:void(0)" class="project-btn text-center">
    <i aria-hidden="true"></i> Edit</a>
 </div>
</span>

<span id="projectlink_form" class="hide">
   <form class="UpdateTitle" method="post">
       <input type="text" value="<?php echo $row['project_link']; ?>" name="project_link">
      <span class="project_link error"></span>
       <input type="hidden" name="Saveprojectlink" value="Save">
       <input type="hidden" name="project_id" value="<?php echo $this->uri->segment(3); ?>">
       <div class="row">
                <div class="col-xs-6">
                  <input type="submit" name="Submit" value="Save" class="project-btn">
                </div>

                <div class="col-xs-6">
                <input type="button" name="MyCancelEditprojectlink" id="MyCancelEditprojectlink" value="Cancel" class="project-btn">
                </div>
       </div>
   </form>
 </span>
</div>

<div class="profile-box editMember">
<div class="link-box"><i class="fa fa-users link-icon" aria-hidden="true"></i><span id="projectmemebers"><?php echo $row['members']; ?></span>  Members</div>
<div class="link-box"><i class="fa fa-cloud-upload link-icon" aria-hidden="true"></i> <span id="projectdocument"><?php echo $row['upload_doc']; ?></span> Uploaded Documents</div>
<div class="link-box"><i class="fa fa-thumbs-up link-icon" aria-hidden="true"></i> <span id="projectlike"><?php echo $row['likes']; ?></span> Likes</div>
<div class="link-box"><i class="fa fa-pie-chart link-icon" aria-hidden="true"></i> <span id="projectdetermined"><?php echo $row['determined']; ?></span> to be determined</div>
<div class="MyMemeberEdit">Edit</div>
</div>

<div class="profile-box editMember_form hide">
<form class="UpdateTitle" method="post">
<div class="link-box"><i class="fa fa-users link-icon" aria-hidden="true"></i> <input type="number" value="<?php echo $row['members']; ?>" name="members" min="0"> Members</div>
<div class="link-box"><i class="fa fa-cloud-upload link-icon" aria-hidden="true"></i><input type="number" name="upload_doc" value="<?php echo $row['upload_doc']; ?>" min="0"> Uploaded Documents</div>
<div class="link-box"><i class="fa fa-thumbs-up link-icon" aria-hidden="true"></i> <input type="number" name="likes" value="<?php echo $row['likes']; ?>" min="0"> Likes</div>
<div class="link-box"><i class="fa fa-pie-chart link-icon" aria-hidden="true"></i> <input type="number" name="determined" value="<?php echo $row['determined']; ?>" min="0"> to be determined</div> 
<div class="row">
                <div class="col-xs-6">
                  <input type="hidden" name="Savememebers" value="Save">
                   <input type="hidden" name="project_id" value="<?php echo $this->uri->segment(3); ?>">
                  <input type="submit" name="Submit" value="Save" class="project-btn">
                </div>

                <div class="col-xs-6">
                <input type="button" name="MyCancelMyMemeber" id="MyCancelMyMemeber" value="Cancel" class="project-btn">
                </div>
       </div>
</form>
</div>

   <div class="news-feed">
    <span id="projectnews">
      <b>TEACHER'S NEWS FEED:</b><span id="newsresult"> <?php if($row['teacher_news_feed']!=''){ echo $row['teacher_news_feed']; }else{echo 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';} ?></span>
       <div class="MyEditProjectnews pull-right">
     <a href="javascript:void(0)" class="project-btn text-center">
    <i aria-hidden="true"></i> Edit</a>
 </div> 
    </span>
    
      <span id="projectnews_form" class="hide">
   <form class="UpdateTitle" method="post">
    <textarea name="teacher_news_feed"><?php echo $row['teacher_news_feed']; ?></textarea> 
      <span class="teacher_news_feed error"></span>
       <input type="hidden" name="Saveteachernews" value="Save">
       <input type="hidden" name="project_id" value="<?php echo $this->uri->segment(3); ?>">
       <div class="row">
                <div class="col-xs-6">
                  <input type="submit" name="Submit" value="Save" class="project-btn">
                </div>

                <div class="col-xs-6">
                <input type="button" name="MyCancelEditprojectnews" id="MyCancelEditprojectnews" value="Cancel" class="project-btn">
                </div>
       </div>
   </form>
 </span>
   </div>

<div class="tab_container">
<input id="tab1" type="radio" name="tabs" checked>
<label for="tab1" class="first"><i class="fa fa-file-text" aria-hidden="true"></i><span>PROJECT</span>
</label>

<input id="tab2" type="radio" name="tabs">
<label for="tab2"><i class="fa fa-users" aria-hidden="true"></i><span>TEAM</span></label>

<input id="tab4" type="radio" name="tabs">
<label for="tab4" class="last"><i class="fa fa-trophy" aria-hidden="true"></i><span>ACTIVITY</span></label>

<!--========================TAB_TEAM_START==============================-->

<!--===================TAB_PROJECT_STRAT==========================-->
<section id="content1" class="tab-content">
<div class="pro-tab">
<div class="pro-left">
    <div class="description">
    <h3>Project Description</h3>
     <span id="projectdes">
      <span id="descresult"><?php echo $row['project_description']; ?></span> 
     </span>
      <div class="MyEditProjectdesc pull-right">
     <a href="javascript:void(0)" class="project-btn text-center">
    <i aria-hidden="true"></i> Edit</a>
 </div>

  <span id="projectdesc_form" class="hide">
   <form class="UpdateTitle" method="post">
    <textarea name="project_description"><?php echo $row['project_description']; ?></textarea> 
      <span class="project_description error"></span>
       <input type="hidden" name="Saveprojectdesc" value="Save">
       <input type="hidden" name="project_id" value="<?php echo $this->uri->segment(3); ?>">
       <div class="row">
                <div class="col-xs-6">
                  <input type="submit" name="Submit" value="Save" class="project-btn">
                </div> 
                <div class="col-xs-6">
                <input type="button" name="MyCancelEditprojectdesc" id="MyCancelEditprojectdesc" value="Cancel" class="project-btn">
                </div>
       </div>
   </form>
 </span> 
      
    </div>

<div class="comment">
  <h2><i class="fa fa-comments" aria-hidden="true"></i> Comment</h2>
  <div class="comment-wrap">
  <div class="photo">
  <div class="avatar" style="background-image: url('assets/images/comment.jpg')"></div>
  </div>
  <div class="comment-block">
  <form action="">
  <textarea name="" id="" cols="30" rows="3" placeholder="Add comment..."></textarea>
  </form>
  </div>
  </div>

  <div class="comment-icon clearfix">
  <div class="pull-right">
  <a href="#"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
  <a href="#">&#64;</a>
  <a href="#"><i class="fa fa-smile-o" aria-hidden="true"></i></a>
  <a href="#"><i class="fa fa-refresh" aria-hidden="true"></i></a>
  </div>
  </div>

<div class="in-comment">
<div class="photo">
<div class="avatar" style="background-image: url('assets/images/comment-1.jpg')"></div>
</div>
<div class="name-right">
<h4>Peter Meyer</h4>
<p>(Teacher)</p>  
</div>
<div class="comment more">
 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis  Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis 
</div>
</div>

<div class="in-comment">
<div class="photo">
<div class="avatar" style="background-image: url('assets/images/comment-2.jpg')"></div>
</div>
<div class="name-right">
<h4>Helene Sommer</h4>
<p>(parent)</p>  
</div>
<div class="comment more">
 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis  Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis
</div>
</div>

<div class="in-comment">
<div class="photo">
<div class="avatar" style="background-image: url('assets/images/comment-3.jpg')"></div>
</div>
<div class="name-right">
  <h4>Egon Schmidt</h4>
  <p>(parent)</p>  
</div>
<div class="comment more">
 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis  Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis
</div>
</div>

<div class="open">
<div class="bottom">
<div class="in-comment">
<div class="photo">
<div class="avatar" style="background-image: url('assets/images/comment-3.jpg')"></div>
</div>
<div class="name-right">
  <h4>Egon Schmidt</h4>
  <p>(parent)</p>  
</div>
<div class="comment more">
 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis  Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis
</div>
</div>

<div class="in-comment">
<div class="photo">
<div class="avatar" style="background-image: url('assets/images/comment-2.jpg')"></div>
</div>
<div class="name-right">
    <h4>Egon Schmidt</h4>
    <p>(parent)</p>  
</div>

<div class="comment more">
 Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis  Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis
</div>

</div>
</div>
<div class="top view-all-btn">view all comments</div>
</div>
</div>
</div>
</div>
</section>

<!--===================TAB_PROJECT_END==========================-->

<section id="content2" class="tab-content">
<div class="pro-tab">
<div class="row">
   <!-- <button type="button" class="btn btn-info btn-lg team_btn pull-right" data-toggle="modal" data-target="#addmemberModal11">Open Modal</button> -->
   <a href="#" class="more-btn" data-toggle="modal" data-target="#addmemberModal11" >Open Modal</a>
<div class="col-sm-12 pro-left">
  <h3>Role (Teacher)</h3>
 <!--  <a href="" class="btn btn-default login pull-left text-uppercase" data-toggle="modal" data-target="#addmemberModal">Add Member</a> -->

  <!-- <button type="button" class="btn btn-default login pull-left text-uppercase" data-toggle="modal" data-target="#addmemberModal">Open Modal</button> -->
  <div class="table-responsive project-table">
  <table class="table table-striped">
    <tbody>
      <tr>
        <td>
        <div class="img-table"><img src="assets/images/profile-user.png" alt="" class="img-responsive" /></div>
        </td>
        <td><p>Peter</p></td>
        <td><p>Meyer</p></td>
        <td><a href="teacher_profile.html" class="small-btn">Go To Profile</a></td>
        <td><p>&nbsp;</p></td>
        <td><p>&nbsp;</p></td>
        <td><p>&nbsp;</p></td>
      </tr>
      <tr>
        <td>
        <div class="img-table"><img src="assets/images/profile-user.png" alt="" class="img-responsive" /></div>
        </td>
        <td><p>Peter</p></td>
        <td><p>Meyer</p></td>
        <td><a href="teacher_profile.html" class="small-btn">Go To Profile</a></td>
        <td><p>&nbsp;</p></td>
        <td><p>&nbsp;</p></td>
        <td><p>&nbsp;</p></td>
      </tr>
      <tr>
        <td>
        <div class="img-table"><img src="assets/images/profile-user.png" alt="" class="img-responsive" /></div>
        </td>
        <td><p>Peter</p></td>
        <td><p>Meyer</p></td>
        <td><a href="teacher_profile.html" class="small-btn">Go To Profile</a></td>
        <td><p>&nbsp;</p></td>
        <td><p>&nbsp;</p></td>
        <td><p>&nbsp;</p></td>
      </tr>
    </tbody>
  </table>
  </div>

  <h3>Role (Student)</h3>
  <div class="table-responsive project-table">
  <table class="table table-striped">
    <tbody>
      <tr>
        <td>
        <div class="img-table"><img src="assets/images/profile-student.png" alt="" class="img-responsive" /></div>
        </td>
        <td><p>Anna</p></td>
        <td><p>Meyer</p></td>
        <td><a href="student_profile.html" class="small-btn">Go To Profile</a></td>
        <td><p>&nbsp;</p></td>
        <td><p>&nbsp;</p></td>
        <td><p>&nbsp;</p></td>
      </tr>
      <tr>
        <td>
        <div class="img-table"><img src="assets/images/profile-student.png" alt="" class="img-responsive" /></div>
        </td>
        <td><p>Bert</p></td>
        <td><p>Huber</p></td>
        <td><a href="student_profile.html" class="small-btn">Go To Profile</a></td>
        <td><p>&nbsp;</p></td>
        <td><p>&nbsp;</p></td>
        <td><p>&nbsp;</p></td>
      </tr>

      <tr>
        <td>
        <div class="img-table"><img src="assets/images/profile-student.png" alt="" class="img-responsive" /></div>
        </td>
        <td><p>Franz</p></td>
        <td><p>Aschi</p></td>
        <td><a href="student_profile.html" class="small-btn">Go To Profile</a></td>
        <td><p>&nbsp;</p></td>
        <td><p>&nbsp;</p></td>
        <td><p>&nbsp;</p></td>
      </tr>
    </tbody>
</table>
</div>
</div>
</div>
</div>
</section>
 <!--========================TAB_TEAM_END==============================-->


<!--===================TAB_ACTIVITY_STRAT==========================-->
<section id="content4" class="tab-content">
<div class="pro-tab">
<div class="row">
<div class="col-sm-12 pro-left">
  <h3>Headline 3</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</div>
</div>
</div>
</section>
<!--===================TAB_ACTIVITY_END==========================-->
</div>
</div>


<div class="col-sm-4">
<div class="pro-right">

<div class="profile-right clearfix ">
  <div class="row project_organizerInfo"> 
    <?php if($row['project_organizer_pic']=='')
    {
      $profile='assets/images/profile-user.png';
    }else{
      $profile='uploads/profile_pic/'.$row['project_organizer_pic'];
    } ?>

     <div class="col-md-4 col-xs-12 pull-right profile-pic">
      <img src="<?php echo $profile; ?>" alt="" class="img-responsive img-circle imagelogo" />
     </div>

      <div class="col-md-8 col-xs-12 pull-left">
        <h4 id="school_subjectresult"><?php if($row['school_subject']!=''){echo $row['school_subject']; }else{ echo "School Subject"; }?></h4>
        <h4 id="school_organizerresult"><?php if($row['project_organizer']!=''){ echo $row['project_organizer'];}else{ echo "Project Organizer"; } ?></h4>
        <h4 id="school_graderesult"><?php if($row['school_grade']!=''){ echo $row['school_grade'];}else{ echo "SCHOOL GRADE"; }  ?></h4>
        <h4 id="kantonresult"><?php if($row['kanton_id']!=''){ echo $row['kanton_id'];}else{ echo "KANTON"; } ?></h4>
        <h4 id="langresult"><?php if($row['lang']!=''){ echo $row['lang'];}else{ echo "LANGUAGE"; } ?></h4>
      </div>
      <div class="MyOrganizerEdit pull-right">
         <a href="javascript:void(0)" class="project-btn text-center">
         <i aria-hidden="true"></i> Edit</a>
      </div>
   </div>



   <div class="row project_organizerInfo_form hide"> 
     <form method="post" class="UpdateTitle"  enctype="multipart/form-data">
     <div class="col-md-4 col-xs-12 pull-right profile-pic"> 
      <img src="<?php echo $profile; ?>" id="imgLogo" alt="" class="img-responsive img-circle" width="100%" />
     </div>

     <div class="form-group input-group text-center edit_btn">
        <label class="btn-bs-file form-control">
        <i class="fa fa-pencil" aria-hidden="true"></i>Edit
        <input name="project_organizer_pic" id="inputFile" type="file"></label> 
        <span class="project_organizer_pic error"></span>
      </div>

      <div class="col-md-8 col-xs-12 pull-left">
        <select name="school_subject"><?php //print_r($row); ?>
          <option value="">School Subject</option>
          <?php $res=$this->Common_model->getAllData(Gately_school_subject); 
                foreach ($res as $key => $value) {
                  ?>
                 <option <?php if($row['S_id']==$value['sub_id']){ echo "selected='selected'"; } ?> value="<?php echo $value['sub_id']; ?>"><?php echo $value['subject_name']; ?></option>
                  <?php 
                }
          ?>
        </select>
         <span class="school_subject error"></span>
       <input type="text" placeholder="Project Organizer" value="<?php echo $row['project_organizer']; ?>" name="project_organizer" >
       <span class="project_organizer error"></span>

       <select name="school_grade">
          <option value="">SCHOOL GRADE</option>
          <?php $res=$this->Common_model->getAllData(Gately_school_grade); 
                foreach ($res as $key => $value) {
                  ?>
                 <option <?php if($row['P_grade']==$value['grade_id']){ echo "selected='selected'"; } ?> value="<?php echo $value['grade_id']; ?>"><?php echo $value['grade']; ?></option>
                  <?php 
                }
          ?>
        </select>
        <span class="school_grade error"></span>
       <select name="kanton_id">
          <option value="">KANTON</option>
          <?php $res=$this->Common_model->getAllData(Gately_Kantons); 
                foreach ($res as $key => $value) {
                  ?>
                 <option <?php if($row['K_id']==$value['id']){ echo "selected='selected'"; } ?> value="<?php echo $value['id']; ?>"><?php echo $value['Kanton_name']; ?></option>
                  <?php 
                }
          ?>
        </select>
        <span class="kanton_id error"></span>
       <select class="selectpicker show-menu-arrow form-control" name="lang[]" multiple>
        <!-- <select name="lang"> --> 
          <option <?php if($row['lang']=='German'){ echo "selected='selected'"; } ?> value="German">German</option>
          <option <?php if($row['lang']=='French'){ echo "selected='selected'"; } ?> value="French">French</option>
          <option <?php if($row['lang']=='Italien'){ echo "selected='selected'"; } ?> value="Italien">Italien</option>
          <option <?php if($row['lang']=='Italien'){ echo "selected='selected'"; } ?> value="English">English</option>
        </select>  
        <span class="lang error"></span>
      </div>
       <div class="col-xs-6">
                  <input type="hidden" name="project_id" value="<?php echo $this->uri->segment(3); ?>" class="project-btn">
                  <input type="hidden" name="saveOrganizer" value="Save" class="project-btn">
                  <input type="submit" name="Submit" value="Save" class="project-btn">
                </div> 
                <div class="col-xs-6">
                <input type="button" name="MyCancelEditorganizer" id="MyCancelEditorganizer" value="Cancel" class="project-btn">
                </div>
   </form>
   </div>
</div>

<h3>Action</h3>
<div class="row pro-btn-group">
<div class="col-md-12">
<a href="#" class="project-btn text-center"><i class="fa fa-pencil" aria-hidden="true"></i>
Edit</a>
</div>

<div class="col-md-6">
<a href="#" class="project-btn"><i class="fa fa-heart" aria-hidden="true"></i> Favorite</a>
</div>

<div class="col-md-6"> 
<a href="#" class="project-btn"><i class="fa fa-user" aria-hidden="true"></i> invite</a>
</div>

<div class="col-md-6">
<a href="#" class="project-btn"><i class="fa fa-upload" aria-hidden="true"></i> Upload</a>
</div>

<div class="col-md-6">
<a href="#" class="project-btn"><i class="fa fa-share-alt-square" aria-hidden="true"></i> Share</a>
</div>

<div class="col-md-6">
<a href="#" class="project-btn"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Follow</a>
</div>

<div class="col-md-6"> 
<a href="#" class="project-btn"><i class="fa fa-file-archive-o" aria-hidden="true"></i> Archive</a>
</div>
</div>


<!--similar-pro-->
<div class="similar-pro">
<h3>Similar Projects</h3>
<div class="row">
<div class="col-sm-12">
<div class="">
<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
<div class='carousel-outer'>
<div class='carousel-inner '>

<div class='item active'>
<div class="school"><img src="assets/images/school.png" alt=""> Name of School</div>
<div class="subject">Subject</div>
<img src='assets/images/similar-pro-1.jpg' alt='' id="zoom_05" data-zoom-image="assets/images/similar-pro-1.jpg" width="100%" />
</div>

<div class='item'>
<div class="school"><img src="assets/images/school.png" alt=""> Name of School</div>
<div class="subject">Subject</div>
<img src='assets/images/similar-pro-2.jpg' alt='' data-zoom-image="assets/images/similar-pro-2.jpg" width="100%" />
</div>

<div class='item'>
<div class="school"><img src="assets/images/school.png" alt=""> Name of School</div>
<div class="subject">Subject</div>
<img src='assets/images/similar-pro-3.jpg' alt='' data-zoom-image="assets/images/similar-pro-3.jpg" width="100%" />
</div>

<div class='item'>
<div class="school"><img src="assets/images/school.png" alt=""> Name of School</div>
<div class="subject">Subject</div>
<img src='assets/images/similar-pro-4.jpg' alt='' data-zoom-image="assets/images/similar-pro-4.jpg" width="100%"/>
</div>

<div class='item'>
<div class="school"><img src="assets/images/school.png" alt=""> Name of School</div>
<div class="subject">Subject</div>
<img src='assets/images/similar-pro-5.jpg' alt='' data-zoom-image="assets/images/similar-pro-5.jpg" width="100%" />
</div>

<div class='item'>
<div class="school"><img src="assets/images/school.png" alt=""> Name of School</div>
<div class="subject">Subject</div>
<img src='assets/images/similar-pro-1.jpg' alt='' data-zoom-image="assets/images/similar-pro-1.jpg" width="100%"/>
</div>

<div class='item'>
<div class="school"><img src="assets/images/school.png" alt=""> Name of School</div>
<div class="subject">Subject</div>
<img src='assets/images/similar-pro-2.jpg' alt='' data-zoom-image="assets/images/similar-pro-2.jpg" width="100%"/>
</div>
</div>
            
<!-- sag sol -->
<a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
<span class='glyphicon glyphicon-chevron-left'></span></a>

<a class='right carousel-control' href='#carousel-custom' data-slide='next'>
<span class='glyphicon glyphicon-chevron-right'></span></a>
</div>
    
<!--thumb-->
<ol class='carousel-indicators mCustomScrollbar meartlab'>
<li data-target='#carousel-custom' data-slide-to='0' class='active'>
<img src='assets/images/similar-pro-1.jpg' alt='' /></li>

<li data-target='#carousel-custom' data-slide-to='1'>
<img src='assets/images/similar-pro-2.jpg' alt='' /></li>

<li data-target='#carousel-custom' data-slide-to='2'>
<img src='assets/images/similar-pro-3.jpg' alt='' /></li>

<li data-target='#carousel-custom' data-slide-to='3'>
<img src='assets/images/similar-pro-4.jpg' alt='' /></li>

<li data-target='#carousel-custom' data-slide-to='4'>
<img src='assets/images/similar-pro-5.jpg' alt='' /></li>

<li data-target='#carousel-custom' data-slide-to='5'>
<img src='assets/images/similar-pro-1.jpg' alt='' /></li>

<li data-target='#carousel-custom' data-slide-to='6'>
<img src='assets/images/similar-pro-2.jpg' alt='' /></li>
</ol>
</div>
</div>
</div>
</div>
</div>
<!--similar-pro-->

</div>
</div>
</div>
</div>
</div>
</div>


<!--=============================Thumb-slider==============================-->
<div class="thumb-slider">
<div class="modal fade" id="myModal">
<div class="modal-dialog">
<div class="modal-content">

<div class="slider">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div id="carousel" class="flexslider">
<ul class="slides">
  <?php if(!empty($Gallary)){
     foreach ($Gallary as $key => $value) {
        
    ?>
    <li><img src="uploads/projects/<?php echo $value['Imageurl']; ?>" /></li>
    <?php 
  } 
}?>
    
</ul>
</div>

<div id="slider" class="flexslider">
<ul class="slides">
  <?php if(!empty($Gallary)){
     foreach ($Gallary as $key => $value) {
        
    ?>
      <li><img src="uploads/projects/<?php echo $value['Imageurl']; ?>" class="imageMap" data-Image="<?php echo $value['gallary_id']; ?>" />
        <a href="javascript:void(0);" data-Image="<?php echo $value['gallary_id']; ?>" class="tag-btn add_Tag"><i class="fa fa-tag"></i> Tag</a>
        <a href="javascript:void(0);" data-Image="<?php echo $value['gallary_id']; ?>" class="tag-btn finish_Tag hide"><i class="fa fa-tag"></i> Finish Tag</a>
          
  </li> 
    <?php 
  } ?>
    <div id='mapper' ><input type="text" name="txtCountry" id="txtCountry"  /></div>
    <div id="planetmap">
    </div>
   <!--   <div id='form_panel'>
       <div class='row'>
          <div class='label'>Title</div><div class='field'><input type='text' id='title' /></div>
              </div>
               <div class='row'>
                            <div class='label'></div>
                            <div class='field'>
                                <input type='button' value='Add Tag' onclick='addTag()' />

                            </div>
                        </div>

                    </div> -->
  <?php 
}?>
    
</ul>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-3"><a href="#" class="thumb-btn">John Doe</a></div>
<div class="col-sm-3"><a href="#" class="thumb-btn">John Doe</a></div>
<div class="col-sm-3"><a href="#" class="thumb-btn">John Doe</a></div>
<div class="col-sm-3"><a href="#" class="thumb-btn">John Doe</a></div>
</div>
<div class="row">
<div class="col-sm-3"><a href="#" class="thumb-btn">John Doe</a></div>
<div class="col-sm-3"><a href="#" class="thumb-btn">John Doe</a></div>
<div class="col-sm-3"><a href="#" class="thumb-btn">John Doe</a></div>
<div class="col-sm-3"><a href="#" class="thumb-btn">John Doe</a></div>
</div>
</div>
</div>

<div class="modal fade" id="EditProjectImage">
<div class="modal-dialog">
<div class="modal-content">
<div class="container">
<div class="regi_form">
<div class="regi_heading text-uppercase white">
<button type="button" class="close close-btn" data-dismiss="modal">
  <i class="fa fa-times" aria-hidden="true"></i>
</button>

<img src="assets/images/school-reg.png" alt="" class="regi_icon" >Edit Project Image</div>
<div class="regi_in">   
<form id="EditProjectImageForm" action=" "  method="post" enctype="multipart/form-data">
 
<div class="row">
<div class="col-xs-4 col-sm-12">
  <div class="upload_img">
  <img src="uploads/projects/<?php echo $row['project_images']; ?>" id="ProjectLogo" alt="" class="img-responsive">  
  </div>
</div>
</div> 
<div  class="form-group input-group text-center">
<label class="btn-bs-file form-control submit"><i class="fa fa-upload upload_icon" aria-hidden="true"></i>Project Image
<input type="file" name="project_picture" id="ProjectFile" /></label> 
<span class="project_picture error"></span>
</div> 
 
<input type="hidden" class="form-control" value="<?php echo $this->uri->segment(3); ?>" name="Project_id"  >
<input type="hidden" class="form-control" value="Project" name="EditProjectImage"  >
<button type="submit" class="btn submit">Submit</button>
</div>
</form>
</div>
</div>

</div>
 
</div>
</div>

</div>



<div class="modal fade" id="UploadGallaryProject">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="container">
    <div class="regi_form">
    <div class="regi_heading text-uppercase white">
    <button type="button" class="close close-btn" data-dismiss="modal">
      <i class="fa fa-times" aria-hidden="true"></i>
    </button>

    <img src="assets/images/school-reg.png" alt="" class="regi_icon" >Upload Images</div>
    <div class="regi_in">   
    <form id="AddProjectGallary" action=" "  method="post" enctype="multipart/form-data">

     <div id="morefiles">
      <div class="row">
      <div class="col-xs-4 col-sm-2">
        <div class="upload_img">
        <img src="DemoImage" id="GallaryLogo" alt="DemoImage" class="img-responsive">  
        </div>
      </div>
      </div> 
      <div  class="form-group input-group text-center">
      <label class="btn-bs-file form-control submit"><i class="fa fa-upload upload_icon" aria-hidden="true"></i>Project Image
      <input type="file" name="UploadPicture[]" id="GallaryImage" /></label> 
      <span class="UploadPicture error"></span>
      </div> 
   </div>

    <div> 
      <div id="addme">Add More</div>
    </div>
     
    <input type="hidden" class="form-control" value="<?php echo $this->uri->segment(3); ?>" name="Project_id"  >
    <input type="hidden" class="form-control" value="Project" name="SaveProjectGallary" >
    <button type="submit" class="btn submit">Submit</button>
    </div>
    </form>
    </div>
    </div>

    </div>
     
    </div>
    </div>

</div>


<!--=============================Thumb-slider==============================-->
</main> 

<!-- ==========================Add Member============================-->
 
<section id="addMemberModal11" class="form-section modal fade form-section" role="dialog">
  <div class="modal-dialog">
  <div class="box-1">
  <h2>fdsfdsfdsfdsfds</h2>
</section>
<!-- ==========================Add Member============================-->

<?php $this->load->view('js/editproject'); ?>

<!-- Thumb-slider -->
<script defer src="assets/js/jquery.flexslider.js"></script>
<script type="text/javascript">
  $(function(){
    SyntaxHighlighter.all();
  });
function flexsliderStart() {
setTimeout(function(){ 
$('#carousel').flexslider({
      animation: "slide",
      controlNav: false,
      animationLoop: false,
      slideshow: false,
      itemWidth: 220,
      itemMargin: 5,
      asNavFor: '#slider'
    });

    $('#slider').flexslider({
      animation: "slide",
      controlNav: false,
      animationLoop: false,
      slideshow: false,
      sync: "#carousel",
      start: function(slider){
        $('body').removeClass('loading');
      }
    });
     }, 100);

}
</script>


<!--SIMILAR_PROJECT-->
<script type="text/javascript">
$(document).ready(function() {
    $(".mCustomScrollbar").mCustomScrollbar({axis:"x"});
});
</script>
<!--SIMILAR_PROJECT-->


<!--VIEW ALL COMMENT-->
<script type="text/javascript">
  $('.top').on('click', function() {
  $parent_box = $(this).closest('.open');
  $parent_box.siblings().find('.bottom').slideUp();
  $parent_box.find('.bottom').slideToggle(800, 'swing');
});
</script>
<!--VIEW ALL COMMENT-->


<!--Read More Comment-->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  var showChar = 300;
  var ellipsestext = "...";
  var moretext = "Read More";
  var lesstext = "Read More";
  $('.more').each(function() {
    var content = $(this).html();
    if(content.length > showChar) {
      var c = content.substr(0, showChar);
      var h = content.substr(showChar-1, content.length - showChar);
      var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
      $(this).html(html);
    }
  });

  $(".morelink").click(function(){
    if($(this).hasClass("less")) {
      $(this).removeClass("less");
      $(this).html(moretext);
    } else {
      $(this).addClass("less");
      $(this).html(lesstext);
    }
    $(this).parent().prev().toggle();
    $(this).prev().toggle();
    return false;
  });
});
</script>
<script src="assets/dist/js/bootstrap-select.js" defer></script>
<script src="assets/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="assets/js/typeahead.js"></script> -->
<script type="text/javascript"> 
  <?php 
    $str='';
  if($row['lang']!=''){
    $values=array();
    
      $la=explode(',', $row['lang']);
      if(count($la)==1)
      {
         $str="'".trim($la[0])."'";
      }else
      {
        foreach ($la as $key => $value) {
              $values[]="'".trim($value)."'";
            }
           $str=implode(',', $values) ;
      }
      
    }
    ?>
   $(document).ready(
    function () {
   $('.selectpicker').selectpicker('val', [<?php  echo $str; ?>]);
   $('.selectpicker').selectpicker('refresh');
    });
</script>

