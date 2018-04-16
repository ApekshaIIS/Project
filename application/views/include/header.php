<!DOCTYPE html>
<html>

<meta charset="UTF-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<base href="<?php echo base_url(); ?>">
<title>Gately</title>

<!--=====================CSS=======================-->
<link rel="stylesheet" href="assets/css/font-awesome.css" type="text/css" />
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="assets/css/style.css" type="text/css" />
<!-- <link rel="stylesheet" href="assets/css/modalstyle.css" type="text/css" /> -->

<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900&amp;subset=latin-ext" rel="stylesheet"> 

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">

<link rel="icon" type="image/png" sizes="32x32" href="images/favicon.png"> 

<!--======================jS========================-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!--====Grid View=====-->
<script type="text/javascript" src="assets/js/masonry.pkgd.min.js"></script>

<!--Select-bar-->
<script src="assets/js/custom-select.js"></script>

<!--====Barnd-logo=====-->
<script src="assets/js/slick.js"></script>
<!--======================jS========================-->
 <!-- jQuery baseUrl -->
    <script>
        var baseUrl = "<?php echo base_url(); ?>";
        var siteUrl = "<?php echo site_url(); ?>";
    </script>
</head>
<body id="form_body">
<main>



<!--======================header-section========================-->
<section class="header-section">
<div class="container header">
<a href="index.html" class="logo pull-left">
<img src="assets/images/logo.png" alt="" class="img-responsive"></a>

<div class="header-btn pull-right">
<div class="success"><?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg');} ?></div>
  <?php  
    
  if($this->Userdata){ ?>
  <a href="user/logout" class="btn btn-default login pull-left text-uppercase">
 <i class="fa fa-unlock" aria-hidden="true"></i>LogOut</a>
<?php }else{
  ?>
  <a href="project.html" class="btn btn-default login pull-left text-uppercase" data-toggle="modal" data-target="#loginModal">
<i class="fa fa-lock locked" aria-hidden="true"></i>log in</a>
  <?php 
} ?>
<?php  
    
  if(!$this->Userdata){ ?>
<a href="#" class="btn btn-default register pull-left text-uppercase"  data-toggle="modal" data-target="#registerModal">
<span class="icon-regi"></span>register</a>
<?php }else{
      $profile='assets/images/profile-student.png';
  if($this->Userdata['profile_pic']!='')
    {
      $profile='uploads/profile_pic/'.$this->Userdata['profile_pic'];
    }

  ?>
<a href="user/myprofile" class="btn btn-default register pro-pic pull-left text-uppercase">
<img src="<?php echo $profile; ?>" alt="" class="img-responsive img-circle" width="80%">
<div><?php echo $this->Userdata['Firstname'].' '.$this->Userdata['LastName']; ?></div>
</a>
  <?php } ?>

<div class="dropdown pull-left lang">
  <button class="btn btn-primary dropdown-toggle language text-uppercase" type="button" data-toggle="dropdown">en
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#">English</a></li>
    <li><a href="#">German</a></li>
    <li><a href="#">French</a></li>
    <li><a href="#">Italian</a></li>  
    <li><a href="#">Romansh</a></li>   
  </ul>
</div> 
</div>

</div>
</section>
<!--======================header-section========================-->


<!--======================Navigation========================-->
<nav class="navbar navbar-default top-nav" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
  <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
</button>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<li class="active"><a href="index.html">home</a></li>	

<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">Projects
<i class="fa fa-angle-down" aria-hidden="true" style="font-size: 15px; margin: 6px 0 0 7px"></i></a>
<ul class="dropdown-menu">
  <li><a href="project.html">School Projects</a></li>
  <li><a href="external-projects.html">EXTERNAL PROJECTS</a></li>	
  <li><a href="competition.html">Competitions</a></li>
</ul>
</li>

<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">PROGRAMS
<i class="fa fa-angle-down" aria-hidden="true" style="font-size: 15px; margin: 6px 0 0 7px"></i></a>
<ul class="dropdown-menu">
  <li><a href="hour-of-code.html">hour of code</a></li>
  <li><a href="#">SCHOOL EXCHANGE</a></li>	
</ul>
</li>

<li><a href="market-place.html">Market Place</a></li>

<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile
<i class="fa fa-angle-down" aria-hidden="true" style="font-size: 15px; margin: 6px 0 0 7px"></i></a>
<ul class="dropdown-menu">
  <li><a href="teacher_profile.html">Teacher Profile</a></li>
  <li><a href="student_profile.html">Student Profile</a></li>
  <li><a href="school_profile.html">School Profile</a></li>
</ul>
</li>

<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">DIRECTORY
<i class="fa fa-angle-down" aria-hidden="true" style="font-size: 15px; margin: 6px 0 0 7px"></i></a>
<ul class="dropdown-menu">
  <li><a href="school-directory.html">SCHOOLS</a></li>
  <li><a href="organization-directory.html">ORGANIZATIONS</a></li>
  <li><a href="partner-directory.html">PARTNERS</a></li>
</ul>
</li>
</ul>
</div>
</div>
</nav>
<!--======================Navigation========================-->