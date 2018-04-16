<!--======================search========================-->
<div class="search-fill">
<div class="container">
<div class="serch-bar">
<form class="" role="search">
<div class="input-group">
    <input type="text" class="form-control" placeholder="Search" name="q">
    <div class="input-group-btn">
    <button class="btn btn-default icon" type="submit"><i class="fa fa-search icon-s" aria-hidden="true"></i></button>
    </div>
</div>
</form>
</div>
<!-- ==========================search ============================-->
<div class="select-bar">
<div class="select-all clearfix">

<form class="select-form">
<div data-select-box>
<select name="" id="" class="form-control">
        <option value="1">All Kantons</option>
        <option value="2">Zürich</option>
		<option value="3">Bern</option>
		<option value="4">Luzern</option>
		<option value="5">Uri</option>
		<option value="6">Schwyz</option>
		<option value="7">Obwalden</option>
		<option value="8">Nidwalden</option>
		<option value="9">Glarus</option>
		<option value="10">Zug</option>
		<option value="11">Freiburg</option>
		<option value="12">Solothurn</option>
		<option value="13">Basel-Stadt</option>
		<option value="14">Basel-Landschaft</option>
		<option value="15">Schaffhausen</option>
		<option value="16">Appenzell Ausserrhoden</option>
		<option value="17">Appenzell Innerrhoden</option>
		<option value="18">St. Gallen</option>
		<option value="19">Graubünden</option>
		<option value="20">Aargau</option>
		<option value="21">Thurgau</option>
		<option value="22">Tessin</option>
		<option value="23">Waadt</option>
		<option value="24">Wallis</option>
		<option value="25">Neuenburg</option>
		<option value="26">Genf</option>
		<option value="27">Jura</option>
</select>
</div>
</form>


<form class="select-form">
<div data-select-box>
<select name="" id="" class="form-control select-inner">
         <option value="1">School Subject</option>
         <option value="2">Deutsch</option>
		 <option value="3">Englisch</option>
		 <option value="4">Französisch</option>
		 <option value="5">Italienisch</option>
		 <option value="6">Latein</option>
		 <option value="7">Mathematik</option>
		 <option value="8">Natur, Mensch, Gesellschaft</option>
		 <option value="9">Natur und Technik</option>
		 <option value="10">Wirtschaft, Arbeit, Haushalt</option>
		 <option value="11">Räume, Zeiten, Gesellschaften</option>
		 <option value="12">Ethik, Religionen, Gemeinschaft</option>
		 <option value="13">Bildnerisches Gestalten</option>
		 <option value="14">Textiles und Technisches Gestalten</option>
		 <option value="15">Musik</option>
		 <option value="16">Bewegung und Sport</option>
		 <option value="17">Medien und Informatik</option>
		 <option value="18">Berufliche Orientierung</option>
		 <option value="19">Überfachliche Kompetenzen</option>
</select>
</div>
</form>

<form class="select-form">
<div data-select-box>
<select name="School Grade" id="" class="form-control select-inner">
        <option value="1">School Grade</option>
        <option value="2">Grade-1</option>
        <option value="3">Grade-2</option>
        <option value="4">Grade-3</option>
        <option value="5">Grade-4</option>
        <option value="5">Grade-5</option>
        <option value="5">Grade-6</option>
        <option value="5">Grade-7</option>
        <option value="5">Grade-8</option>
        <option value="5">Grade-9</option>
</select>
</div>
</form>

<form class="select-form">
<div data-select-box>
<select name="" id="" class="form-control select-inner">
        <option value="1">Language</option>
        <option value="2">German</option>
        <option value="3">French</option>
        <option value="4">Italian</option>
        <option value="5">English</option>
</select>
</div>
</form>

<form class="select-form">
<div data-select-box>
<select name="" id="" class="form-control select-inner">
        <option value="1">Project Type</option>
        <option value="2">School Project</option>
        <option value="3">External Project</option>
        <option value="3">Competitions</option>
</select>
</div>
</form>
</div>
</div>
</div>
</div>
<!--======================search========================-->


<!--======================programs========================-->
<div class="project_main">
<section class="programs-section">
<div class="container">
	    <div class="section-head clearfix">	
	    <h4>School Projects</h4>
       <?php if($this->session->userdata('UnserInfo'))
		{ ?> <div class="add-pro"><a href=" " class="btn btn-default login pull-left text-uppercase" data-toggle="modal" data-target="#addprojectModal">Add Project</a></div> <?php } ?>
		<select id="changeorder" name="project_order">
			<option <?php if($this->session->userdata('set_projectorder') && $this->session->userdata('set_projectorder')=='Asc'){ echo "selected='selected'"; } ?> value="Asc">Asc</option>
			<option <?php if($this->session->userdata('set_projectorder') && $this->session->userdata('set_projectorder')=='DESC'){ echo "selected='selected'"; } ?> value="DESC">Desc</option>
		</select>
	    </div> 
 
            <?php
            if(!empty($rows))
            {
    //         	 $numOfCols = 8;
				// $rowCount = 0;
				// $bootstrapColWidth = 12 / $numOfCols;
				$array_chunk=array_chunk($rows,8);
			  foreach ($array_chunk as $k=> $items){
			  	
			  	 ?>
                     <div class="row  ">
					    <div class="all-pro <?php if($k!=0){echo 'view-all-block';}else{echo  'clearfix'; }  ?> " <?php //if($k!=0){echo 'style="display: none;"';}else{ echo 'style="display: block;"'; } ?> >
					    <div class="masonry">  
				          <div class="grid-sizer"></div>
			  		<?php foreach ($items as $key => $row) {
			  			$images=json_decode($row['project_images']);
			  			  ?> 

		<div class="grid-item">
		<div class="pro-box">
		<div class="school"><a href="project/index/<?php echo $row['project_id']; ?>"><img src="assets/images/school.png" alt=""><?php echo $row['school_name']; ?></a></div>
		<div class="subject">
			<a href="project/index/<?php echo $row['project_id']; ?>"><?php echo $row['project_subject']; ?></a>
		</div>
		<!-- <a href="project/index/<?php echo $row['project_id']; ?>"><img src="uploads/projects/<?php echo $images[0] ?>" alt="" class="img-responsive img-rounded" width="100%"></a> -->
		<img src="assets/images/pro-image-1.jpg" alt="" class="img-responsive img-rounded" width="100%">
		<div class="pro-text">
		<h2><?php echo $row['project_title']; ?></h2>
		<?php
           $string = strip_tags($row['project_description']);
            if (strlen($string) > 50) { 
		    // truncate string
		    $stringCut = substr($string, 0, 50);
		    $endPoint = strrpos($stringCut, ' '); 
		    //if the string doesn't contain any space then it will cut without word basis.
		    $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
		    $string .= '... <a href="project/index/'.$row["project_id"].'">Read More</a>';
		}
		echo $string;  ?>
         <?php if($this->session->userdata('UnserInfo')){ ?>
		<input type="button" name="deleteProject" value="Delete" onclick="deleteproject(<?php echo $row["project_id"]; ?>);">
        <?php } ?>
		</div>
		<div class="pro-btn text-center clearfix">
		<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
		<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
		<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a> 
		</div>
		</div>
		</div>
          <?php }
              
				  ?>
				 </div>
			    </div>
			    </div>  
		        <?php 					 
		      } 
			} 
		  ?>  

		<div class="view-block"><div class="view-all-a1 btn">View All</div></div>				
</div>

<div class="container">
	    <div class="section-head clearfix">	
	    <h4>External Projects</h4>
        <div class="add-pro"><a href="#">Add Project</a></div>
	    </div> 

	    <div class="row">
	    <div class="all-pro clearfix">
	    <div class="masonry">
        <div class="grid-sizer"></div>
	    <div class="grid-item">
		<div class="pro-box">
		<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
		<div class="subject">Subject</div>
		<img src="assets/images/pro-image-1.jpg" alt="" class="img-responsive img-rounded" width="100%">
		<div class="pro-text">
		<h2>Lorem Ipsum is simply</h2>
		<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
		</div>
		<div class="pro-btn text-center clearfix">
		<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
		<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
		<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a>	
		</div>
		</div>
		</div>

		<div class="grid-item">
		<div class="pro-box">
		<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
		<div class="subject">Subject</div>
		<img src="assets/images/pro-image-2.jpg" alt="" class="img-responsive img-rounded" width="100%">
		<div class="pro-text">
		<h2>Lorem Ipsum is simply</h2>
		<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
		</div>
		<div class="pro-btn text-center clearfix">
		<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
		<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
		<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a>	
		</div>
		</div>
		</div>

		<div class="grid-item">
		<div class="pro-box">
		<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
		<div class="subject">Subject</div>
		<img src="assets/images/pro-image-3.jpg" alt="" class="img-responsive img-rounded" width="100%">
		<div class="pro-text">
		<h2>Lorem Ipsum is simply</h2>
		<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
		</div>
		<div class="pro-btn text-center clearfix">
		<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
		<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
		<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a>	
		</div>
		</div>
		</div>

		<div class="grid-item">
		<div class="pro-box">
		<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
		<div class="subject">Subject</div>
		<img src="assets/images/pro-image-4.jpg" alt="" class="img-responsive img-rounded" width="100%">
		<div class="pro-text">
		<h2>Lorem Ipsum is simply</h2>
		<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
		</div>
		<div class="pro-btn text-center clearfix">
		<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
		<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
		<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a>	
		</div>
		</div>
		</div>

		<div class="grid-item">
		<div class="pro-box">
		<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
		<div class="subject">Subject</div>
		<img src="assets/images/pro-image-5.jpg" alt="" class="img-responsive img-rounded" width="100%">
		<div class="pro-text">
		<h2>Lorem Ipsum is simply</h2>
		<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
		</div>
		<div class="pro-btn text-center clearfix">
		<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
		<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
		<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a>	
		</div>
		</div>
		</div>

		<div class="grid-item">
		<div class="pro-box">
		<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
		<div class="subject">Subject</div>
		<img src="assets/images/pro-image-6.jpg" alt="" class="img-responsive img-rounded" width="100%">
		<div class="pro-text">
		<h2>Lorem Ipsum is simply</h2>
		<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
		</div>
		<div class="pro-btn text-center clearfix">
		<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
		<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
		<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a>	
		</div>
		</div>
		</div>

		<div class="grid-item">
		<div class="pro-box">
		<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
		<div class="subject">Subject</div>
		<img src="assets/images/pro-image-7.jpg" alt="" class="img-responsive img-rounded" width="100%">
		<div class="pro-text">
		<h2>Lorem Ipsum is simply</h2>
		<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
		</div>
		<div class="pro-btn text-center clearfix">
		<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
		<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
		<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a>	
		</div>
		</div>
		</div>

		<div class="grid-item">
		<div class="pro-box">
		<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
		<div class="subject">Subject</div>
		<img src="assets/images/pro-image-8.jpg" alt="" class="img-responsive img-rounded" width="100%">
		<div class="pro-text">
		<h2>Lorem Ipsum is simply</h2>
		<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
		</div>
		<div class="pro-btn text-center clearfix">
		<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
		<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
		<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a>	
		</div>
		</div>
		</div> 
	    </div>
	    </div>
	    </div>

        <div class="row">
        <div class="all-pro view-all-block_1">
		<div class="masonry">
	    <div class="grid-sizer"></div>

		<div class="grid-item">
		<div class="pro-box">
		<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
		<div class="subject">Subject</div>
		<img src="assets/images/pro-image-2.jpg" alt="" class="img-responsive img-rounded" width="100%">
		<div class="pro-text">
		<h2>Lorem Ipsum is simply</h2>
		<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
		</div>
		<div class="pro-btn text-center clearfix">
		<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
		<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
		<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a> 
		</div>
		</div>
		</div>

		<div class="grid-item">
		<div class="pro-box">
		<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
		<div class="subject">Subject</div>
		<img src="assets/images/pro-image-3.jpg" alt="" class="img-responsive img-rounded" width="100%">
		<div class="pro-text">
		<h2>Lorem Ipsum is simply</h2>
		<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
		</div>
		<div class="pro-btn text-center clearfix">
		<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
		<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
		<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a> 
		</div>
		</div>
		</div>

		<div class="grid-item">
		<div class="pro-box">
		<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
		<div class="subject">Subject</div>
		<img src="assets/images/pro-image-1.jpg" alt="" class="img-responsive img-rounded" width="100%">
		<div class="pro-text">
		<h2>Lorem Ipsum is simply</h2>
		<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
		</div>
		<div class="pro-btn text-center clearfix">
		<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
		<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
		<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a> 
		</div>
		</div>
		</div>

		<div class="grid-item">
		<div class="pro-box">
		<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
		<div class="subject">Subject</div>
		<img src="assets/images/pro-image-2.jpg" alt="" class="img-responsive img-rounded" width="100%">
		<div class="pro-text">
		<h2>Lorem Ipsum is simply</h2>
		<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
		</div>
		<div class="pro-btn text-center clearfix">
		<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
		<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
		<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a> 
		</div>
		</div>
		</div>

        </div>
		</div>
		</div>

<div class="view-block"><div class="view-all-a2 btn">View All</div></div>			
</div>

<div class="container">
<div class="section-head clearfix">	
<h4>Competitions</h4>
<div class="add-pro"><a href="#">Add Project</a></div>
</div> 

<div class="row">
<div class="all-pro clearfix">
<div class="masonry">
<div class="grid-sizer"></div>
<div class="grid-item">
<div class="pro-box">
<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
<div class="subject">Subject</div>
<img src="assets/images/pro-image-1.jpg" alt="" class="img-responsive img-rounded" width="100%">
<div class="pro-text">
<h2>Lorem Ipsum is simply</h2>
<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
</div>
<div class="pro-btn text-center clearfix">
<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a>	
</div>
</div>
</div>

<div class="grid-item">
<div class="pro-box">
<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
<div class="subject">Subject</div>
<img src="assets/images/pro-image-2.jpg" alt="" class="img-responsive img-rounded" width="100%">
<div class="pro-text">
<h2>Lorem Ipsum is simply</h2>
<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
</div>
<div class="pro-btn text-center clearfix">
<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a>	
</div>
</div>
</div>

<div class="grid-item">
<div class="pro-box">
<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
<div class="subject">Subject</div>
<img src="assets/images/pro-image-3.jpg" alt="" class="img-responsive img-rounded" width="100%">
<div class="pro-text">
<h2>Lorem Ipsum is simply</h2>
<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
</div>
<div class="pro-btn text-center clearfix">
<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a>	
</div>
</div>
</div>

<div class="grid-item">
<div class="pro-box">
<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
<div class="subject">Subject</div>
<img src="assets/images/pro-image-4.jpg" alt="" class="img-responsive img-rounded" width="100%">
<div class="pro-text">
<h2>Lorem Ipsum is simply</h2>
<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
</div>
<div class="pro-btn text-center clearfix">
<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a>	
</div>
</div>
</div>

<div class="grid-item">
<div class="pro-box">
<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
<div class="subject">Subject</div>
<img src="assets/images/pro-image-5.jpg" alt="" class="img-responsive img-rounded" width="100%">
<div class="pro-text">
<h2>Lorem Ipsum is simply</h2>
<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
</div>
<div class="pro-btn text-center clearfix">
<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a>	
</div>
</div>
</div>

<div class="grid-item">
<div class="pro-box">
<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
<div class="subject">Subject</div>
<img src="assets/images/pro-image-6.jpg" alt="" class="img-responsive img-rounded" width="100%">
<div class="pro-text">
<h2>Lorem Ipsum is simply</h2>
<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
</div>
<div class="pro-btn text-center clearfix">
<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a>	
</div>
</div>
</div>

<div class="grid-item">
<div class="pro-box">
<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
<div class="subject">Subject</div>
<img src="assets/images/pro-image-7.jpg" alt="" class="img-responsive img-rounded" width="100%">
<div class="pro-text">
<h2>Lorem Ipsum is simply</h2>
<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
</div>
<div class="pro-btn text-center clearfix">
<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a>	
</div>
</div>
</div>

<div class="grid-item">
<div class="pro-box">
<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
<div class="subject">Subject</div>
<img src="assets/images/pro-image-8.jpg" alt="" class="img-responsive img-rounded" width="100%">
<div class="pro-text">
<h2>Lorem Ipsum is simply</h2>
<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
</div>
<div class="pro-btn text-center clearfix">
<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a>	
</div>
</div>
</div> 
</div>
</div>
</div>

<div class="row">
<div class="all-pro view-all-block_2">
<div class="masonry">
<div class="grid-sizer"></div>

<div class="grid-item">
<div class="pro-box">
<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
<div class="subject">Subject</div>
<img src="assets/images/pro-image-2.jpg" alt="" class="img-responsive img-rounded" width="100%">
<div class="pro-text">
<h2>Lorem Ipsum is simply</h2>
<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
</div>
<div class="pro-btn text-center clearfix">
<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a> 
</div>
</div>
</div>

<div class="grid-item">
<div class="pro-box">
<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
<div class="subject">Subject</div>
<img src="assets/images/pro-image-3.jpg" alt="" class="img-responsive img-rounded" width="100%">
<div class="pro-text">
<h2>Lorem Ipsum is simply</h2>
<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
</div>
<div class="pro-btn text-center clearfix">
<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a> 
</div>
</div>
</div>

<div class="grid-item">
<div class="pro-box">
<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
<div class="subject">Subject</div>
<img src="assets/images/pro-image-1.jpg" alt="" class="img-responsive img-rounded" width="100%">
<div class="pro-text">
<h2>Lorem Ipsum is simply</h2>
<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
</div>
<div class="pro-btn text-center clearfix">
<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a> 
</div>
</div>
</div>

<div class="grid-item">
<div class="pro-box">
<div class="school"><img src="assets/images/school.png" alt=""> Name of Organization</div>
<div class="subject">Subject</div>
<img src="assets/images/pro-image-2.jpg" alt="" class="img-responsive img-rounded" width="100%">
<div class="pro-text">
<h2>Lorem Ipsum is simply</h2>
<p>dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
</div>
<div class="pro-btn text-center clearfix">
<a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> 41 Tsd</a>
<a href="#" class="mid"><i class="fa fa-retweet" aria-hidden="true"></i> 12 Tsd</a>
<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 43 Tsd</a> 
</div>
</div>
</div>

</div>
</div>
</div>
<div class="view-block"><div class="view-all-a3 btn">View All</div>
</div>
</div>
</section>
<!--======================programs========================-->

<!--======================Logo-slider========================-->
<div class="container">
<div class="row">
<section class="customer-logos slider brands">
<div class="slide">
<img src="assets/images/dummy-logo.png" alt="" class="img-responsive img-thumbnail" /></div>

<div class="slide">
<img src="assets/images/dummy-logo.png" alt="" class="img-responsive img-thumbnail"></div>

<div class="slide">
<img src="assets/images/dummy-logo.png" alt="" class="img-responsive img-thumbnail"></div>

<div class="slide">
<img src="assets/images/dummy-logo.png" alt="" class="img-responsive img-thumbnail"></div>

<div class="slide">
<img src="assets/images/dummy-logo.png" alt="" class="img-responsive img-thumbnail"></div>

<div class="slide">
<img src="assets/images/dummy-logo.png" alt="" class="eimg-responsive img-thumbnail"></div>

<div class="slide">
<img src="assets/images/dummy-logo.png" alt="" class="img-responsive img-thumbnail"></div>
</section>
</div>
</div>
<!--======================Logo-slider========================-->
</div>

<!--======================about us========================-->
<section class="slider">
<div id="carousel-example" class="carousel slide" data-ride="carousel">
<ol class="carousel-indicators">
<li data-target="#carousel-example" data-slide-to="0" class="active"></li>
<li data-target="#carousel-example" data-slide-to="1"></li>
<li data-target="#carousel-example" data-slide-to="2"></li>
</ol>

<div class="carousel-inner">
<div class="item active">
<div class="slidet-text">
<div class="container">
<div class="row">
<div class="slider-inner col-xs-12 col-sm-7 col-md-5">
	<h1 class="text-uppercase">ABOUT US </h1>
	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
	<a href="#" class="white">Read More</a>
</div>
</div>
</div>
</div>

<a href="#"><img src="assets/images/slider-1.jpg" width="100%" /></a>
</div>

<div class="item">
<div class="slidet-text">
<div class="container">
<div class="row">
<div class="slider-inner col-xs-12 col-sm-7 col-md-5">
	<h1 class="text-uppercase">ABOUT US </h1>
	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
	<a href="#" class="white">Read More</a>
</div>
</div>
</div>
</div>
<a href="#"><img src="assets/images/slider-2.jpg" width="100%" /></a>
</div>

<div class="item">
<div class="slidet-text">
<div class="container">
<div class="row">
<div class="slider-inner col-xs-12 col-sm-7 col-md-5">
	<h1 class="text-uppercase">ABOUT US </h1>
	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
	<a href="#" class="white">Read More</a>
</div>
</div>
</div>
</div>
<a href="#"><img src="assets/images/slider-4.jpg" width="100%" /></a>
</div>
</div>
</section>
<!--======================about us========================-->


<!-- ==========================Add Project============================-->
 
<section id="addprojectModal" class="form-section modal fade form-section" role="dialog">
<div class="container">
<div class="regi_form">
<div class="regi_heading text-uppercase white">
<button type="button" class="close close-btn" data-dismiss="modal">
	<i class="fa fa-times" aria-hidden="true"></i>
</button>

<img src="assets/images/school-reg.png" alt="" class="regi_icon" >Add Project</div>
<div class="regi_in">   
<form id="AddProjectForm" action="user/login"  method="post" enctype="multipart/form-data">

<div class="form-group select_reg">
<div data-select-box>
  <?php $school= $this->Common_model->getWhere(Gately_User,array('user_type'=>2)); 
  //print_r($school); ?>
<select name="school_name" id="school_name" class="form-control">
  <option value="">Name of School</option>
  <?php 
  foreach ($school as $key => $value) 
        {
         ?> 
           <option value="<?php echo $value['user_id']; ?>"><?php echo $value['school_name']; ?></option> 
      <?php } ?>
</select>
<span class="school_name error"></span>
</div>
</div>
  
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</div>

<input type="text" class="form-control" name="project_title" id="project_title" aria-describedby="projet_title" placeholder="Projet Title">
<span class="project_title error"></span>
</div>
</div>

<div class="form-group">
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-user" aria-hidden="true"></i>
</div>
<input type="text" class="form-control" aria-describedby="subject" name="project_subject" placeholder="Subject:">
<span class="project_subject error"></span>
</div>
</div>

<div class="form-group">
<div class="input-group">
<div class="input-group-addon top-icon">
<i class="fa fa-location-arrow icon-text" aria-hidden="true"></i>
</div>

<textarea class="form-control main_add textarea" name="project_description" rows="3" id="project_description" placeholder="Project Desription :"></textarea>
<span class="project_description error"></span>
</div>
</div>

<div class="form-group">
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-link" aria-hidden="true"></i>
</div>

<input type="text" class="form-control" name="project_link" id="link_project" aria-describedby="link" placeholder="Link Project">
<span class="project_link error"></span>
</div>
</div>

<div class="form-group">
<div class="input-group">
<div class="input-group-addon">
<i class="fa fa-file-text-o" aria-hidden="true"></i>
</div>
<input type="text" class="form-control" name="project_organizer" id="project_organizer" placeholder="Project Organizer :">
<span class="project_organizer error"></span>
</div>
</div>

<!-- <div class="form-group select_reg">
<div data-select-box>
  
<select name="members" id="members" class="form-control">
  <option value="">How many Members</option>
  <?php for ($i=1; $i <25 ; $i++) { 
   ?>  
     <option value="<?php  echo $i;?>"><?php  echo $i; ?></option> <?php 
   } ?>
</select>
<span class="members error"></span>
</div>
</div> -->

<div class="row">
<div class="col-xs-4 col-sm-2">
<div class="upload_img">
<img src="assets/images/user-chat.png" id="imgLogos" alt="" class="img-responsive">  
</div>
</div>
</div> 

<div  class="form-group input-group text-center">
<label class="btn-bs-file form-control submit"><i class="fa fa-upload upload_icon" aria-hidden="true"></i>Project Organizer Pic
<input type="file" name="project_organizer_pic" id="inputFiless" /></label> 
<span class="project_organizer_pic error"></span>
</div>

<div id="morefiles">
<div class="row">
<div class="col-xs-4 col-sm-2">
	<div class="upload_img">
	<img src="assets/images/user-chat.png" id="imgLogo" alt="" class="img-responsive">  
	</div>
</div>
</div> 
<div  class="form-group input-group text-center">
<label class="btn-bs-file form-control submit"><i class="fa fa-upload upload_icon" aria-hidden="true"></i>Project Image
<input type="file" name="project_pic[]" id="inputFile" /></label> 
<span class="project_pic_0 error"></span>
</div> 
</div>

<div> 
<div id="addme">Add More</div>
</div>
<input type="hidden" class="form-control" value="Project" name="addProject"  >
<button type="submit" class="btn submit">Submit</button>
</div>
</form>
</div>
</div>
</section>
<!-- ==========================Registration============================-->


<script>
// external js: masonry.pkgd.js
$('.masonry').masonry({ 
  "columnWidth": ".grid-sizer",
	"itemSelector": ".grid-item",
  transitionDuration: 0, 
  "percentPosition": true});
 </script>
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
<script type="text/javascript">
$(document).ready(function(){

	$('#changeorder').change(function(){
		myval=$(this).val();
       window.location='<?php echo base_url(); ?>project/setorder/'+myval;
	});
t=0;
$("#AddProjectForm").submit(function(e) {
	$('.regi_form').addClass('loader');
$('.error').html('');
var formData = new FormData($(this)[0]);
var url = 'project/add'; // the script where you handle the form input. 
$.ajax({
type: "POST",
url: url,
data: formData,
headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
dataType: 'json', 
cache: false,
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
    window.location='<?php echo base_url(); ?>'+data.success.url;
   }
}
}); 
e.preventDefault(); // avoid to execute the actual submit of the form.
});

$("#addme").click(function(){
	r=t+1;
$("#morefiles").append('<div class="row" id="mypic_'+t+'"><div class="col-xs-3"><div class="upload_img"><img src="assets/images/profile.png" id="imgLogo_'+t+'" style="height: 140px; width: 150px;" alt="" class="img-responsive"></div></div></div><div id="myinput_'+t+'" class="form-group input-group text-center"><label class="btn-bs-file form-control submit"><i class="fa fa-upload upload_icon" aria-hidden="true"></i>Project Image<input type="file" name="project_pic[]" class="inputFileclass" id="'+t+'" /></label><span class="project_pic_'+r+' error"></span></div>');
t++;
});
});
 
$(window).on('load',function(){
$(document).on('change','.inputFileclass',function(){
	myid=$(this).attr('id');
       // alert(myid);
    readURLs(this);
})    
})
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
$("#inputFiless").change(function () {
readURLOrganizer(this);
});
});
function readURLOrganizer(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
//alert(e.target.result);
$('#imgLogos').attr('src', e.target.result);
}
reader.readAsDataURL(input.files[0]);
}
}
function removeme(obj)
{ 
$("#morefiles").remove('<div class="row" id="mypic_'+obj+'"><div class="col-xs-3"><div class="upload_img"><img src="assets/images/profile.png" id="imgLogo" style="height: 140px; width: 150px;" class="img-responsive"></div></div></div><div id="myinput_'+obj+'" class="form-group input-group text-center"><label class="btn-bs-file form-control submit"><i class="fa fa-upload upload_icon" aria-hidden="true"></i>Project Image<input type="file" name="project_pic[]"  /></label><span class="project_pic error"></span></div><div onclick="removeme('+obj+')">Remove</div>');
t--;
}
</script>
