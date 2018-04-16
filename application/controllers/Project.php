<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends MY_Controller {

	 public function __construct()
       {
            parent::__construct(); 
             $this->load->model('Project_model');
            //function inside autoloaded helper, check if user is logged in, if not redirects to login page
            $this->is_logged_in();
       }

       public function setorder()
       {
       	  if($this->uri->segment(3)=='Asc' || $this->uri->segment(3)=='DESC')
       	  {
            $this->session->set_userdata('set_projectorder',$this->uri->segment(3));
       	  }
       	   redirect('home/index');
       }

       public function index()
       {
          $data['row'] =$this->Project_model->getProject($this->uri->segment(3));
          $data['Gallary'] =$this->Common_model->getWhere(Gately_ProjectGallary,array('project_id'=>$this->uri->segment(3)));
			$data['page'] ='project';
			$this->load->view('include/layout',$data);
       }

		public function add()
		{   
			 if($this->input->post('addProject'))
		       {  
	              $errors['error']=array();
		       	  $this->load->library('form_validation');
		       	  $this->form_validation->set_rules('school_name', 'School Name', 'required');
		       	  $this->form_validation->set_rules('project_title', 'Project Title', 'required');
		       	  $this->form_validation->set_rules('project_subject', 'Subject', 'required');
		       	  $this->form_validation->set_rules('project_description', 'Project Description', 'required');
		       	  $this->form_validation->set_rules('project_link', 'Project Link', 'required');
		       	  $this->form_validation->set_rules('project_organizer', 'Project Organizer', 'required');
		       	  //$this->form_validation->set_rules('members', 'Number of Memebers', 'required'); 

		       	   if($this->form_validation->run()==false)
		       	   {
		              $errors['error'] = $this->form_validation->error_array();
		              echo json_encode($errors);
		       	   }else
		       	   {
		       	   	 $Organizer= $this->FileUpload('project_organizer_pic','/uploads/profile_pic/'); 
	                 $name= $this->MultipleFileUpload('project_pic','/uploads/projects/'); 
	                   //print_r($name);
	                  if(isset($name['error']))
	                  {
	                     echo json_encode($name);
	                  }else{ 
	                          unset($_POST['addProject']);   
	                          unset($_POST['project_pic']);   
	                          $_POST['project_images'] = json_encode($name);;
	                          $_POST['project_organizer_pic'] = $Organizer;
	                          $_POST['project_type'] = 1;
	                          $last=$this->Common_model->insert(Gately_Projects,$this->input->post()); 
	                          $this->session->set_flashdata('msg','Project Added successfully');
	                          $errors['success']['url'] ='home'; 
		       	   	  	      echo json_encode($errors);die;
	                  } 
		       	   }

		       }  
		} 

		public function Update()
		{
			//print_r($this->input->post());
			$update=array();
			$Organizer['error']=array();
			$errors['error']=array();
	       	$this->load->library('form_validation');

			if($this->input->post('Savetitle'))
			{

              $this->form_validation->set_rules('project_title', 'Project Title', 'required');
			  $update['project_title']=$this->input->post('project_title');
			} 		

			if($this->input->post('Saveprojectlink'))
			{ 
              $this->form_validation->set_rules('project_link', 'Project Link', 'required');
			  $update['project_link']=$this->input->post('project_link');
			} 

			if($this->input->post('Saveteachernews'))
			{ 
              $this->form_validation->set_rules('teacher_news_feed', 'Teacher News Feed', 'required');
			  $update['teacher_news_feed']=$this->input->post('teacher_news_feed');
			}

			if($this->input->post('Saveprojectdesc'))
			{ 
              $this->form_validation->set_rules('project_description', 'Project Description', 'required');
			  $update['project_description']=$this->input->post('project_description');
			} 
                
			if($this->input->post('saveOrganizer'))
			{ 
				  $la=$this->input->post('lang'); 
	              $this->form_validation->set_rules('school_subject', 'School Subject', 'required');
	              $this->form_validation->set_rules('project_organizer', 'Project Organizer', 'required');
	              $this->form_validation->set_rules('school_grade', 'School Grade', 'required');
	              $this->form_validation->set_rules('kanton_id', 'KANTON', 'required');
	             // $this->form_validation->set_rules('lang', 'Language', 'required');
	              if(empty($la))
	              {
	              	 $errors['error']['lang']='The Language field is required';
	              }
				  $update['project_organizer']=$this->input->post('project_organizer');
				  $update['school_subject']=$this->input->post('school_subject');
				  $update['school_grade']=$this->input->post('school_grade');
				  $update['kanton_id']=$this->input->post('kanton_id');
				  $update['lang']=implode(' , ', $la);
				  $_POST['lang']=implode(' , ', $la);
			}
                
			if($this->input->post('Savememebers'))
			{ 
				 $this->form_validation->set_rules('members', 'Members', 'required');
	              $this->form_validation->set_rules('upload_doc', 'Upload Doc', 'required');
	              $this->form_validation->set_rules('likes', 'Likes', 'required');
	              $this->form_validation->set_rules('determined', 'Determined', 'required');
				  $update['members']=$this->input->post('members');
				  $update['upload_doc']=$this->input->post('upload_doc');
				  $update['likes']=$this->input->post('likes');
				  $update['determined']=$this->input->post('determined'); 
			}

			if(!empty($_FILES['project_organizer_pic']['name']))
			{
				$Organizer= $this->FileUpload('project_organizer_pic','/uploads/profile_pic/');
				if(!empty($Organizer['error']))
				 { 
				    $errors=$Organizer;
				     echo json_encode($errors);
				}else{ 
				    $update['project_organizer_pic'] = $Organizer;
				}	
			}
             	 
               

                if($this->form_validation->run()==false)
	       	   {
		       	  $errors['error'] = $this->form_validation->error_array();
	              echo json_encode($errors);	 
	       	   }elseif(empty($Organizer['error']))
	       	   { 

	       	   	 if(!empty($update))
					{ 
			          $this->Common_model->updates(Gately_Projects,$update,array('project_id'=>$this->input->post('project_id'))); 
                      if($this->input->post('saveOrganizer'))
                      {
	                      	$r=$this->Common_model->getWhere('school_subject',array('sub_id'=>$this->input->post('school_subject')),1);
	                      	$_POST['school_subject']=$r['subject_name'];

	                      	$r=$this->Common_model->getWhere('gateley_school_grade',array('grade_id'=>$this->input->post('school_grade')),1);
	                      	$_POST['school_grade']=$r['grade'];

	                      	$r=$this->Common_model->getWhere('Kantons',array('id'=>$this->input->post('kanton_id')),1);
	                      	$_POST['kanton_id']=$r['Kanton_name'];
                      }
                        
			           $errors['success']['fields'] =$this->input->post(); 
                        if(!empty($_FILES['project_organizer_pic']['name']))
			               {
				             $errors['success']['fields']['project_organizer_pic']=$Organizer;
				            }
	       	   	  	      echo json_encode($errors);die;
					}
	       	   } 
		}

		public function deleteProject()
		{
			if($this->uri->segment(3))
			{
				$this->Common_model->delete(Gately_Projects,array('project_id'=>$this->uri->segment(3)));
			///	echo $this->db->last_query();
				 redirect('home/index');
			}
		}

		public function EditProjectImage()
		{ 
            if($this->input->post('EditProjectImage'))
            {
            	$errors['error']=array(); 
		       	  $Organizer= $this->FileUpload('project_picture','/uploads/projects/');
                     if(isset($Organizer['error']))
	                  {
	                     echo json_encode($Organizer);
	                  }else{    
	                          $_POST['project_images'] = $Organizer; 
	                          $last=$this->Common_model->update(Gately_Projects,array('project_images'=>$_POST['project_images']),array('project_id'=>$_POST['Project_id'])); 
	                          $this->session->set_flashdata('msg','Project Image Edited successfully');
	                          $errors['success'] ='success'; 
		       	   	  	      echo json_encode($errors);die;
	                  } 

            } 
		}

		public function projectGallary()
		{   
		    $errors['error']=array(); 
			if($this->input->post('SaveProjectGallary'))
			{
				 $name= $this->MultipleFileUpload('UploadPicture','/uploads/projects/'); 
	                   //print_r($name);
	                  if(isset($name['error']))
	                  {
	                     echo json_encode($name);
	                  }else{ 
	                  	       foreach ($name as $key => $value) {  
	                  	     	   $this->Common_model->insert(Gately_ProjectGallary,array('Imageurl'=>$value,'project_id'=>$this->input->post('Project_id')));
	                  	       }
	                  	       $errors['success'] ='success';
		       	   	  	       echo json_encode($errors);die;
	                  }
			}
		}

		public function AddTag()
		{
			print_r($this->input->post());
			if($this->input->post('Gallry') && $this->input->post('Gallry')!=0 && $this->input->post('friendID') && $this->input->post('friendID')!=0)
			{
				 $css=array('top'=>$this->input->post('top'),'left'=>$this->input->post('left'));
				$this->Common_model->insert(Gately_Tag,array('Gallry_ID'=>$this->input->post('Gallry'),'Friend_ID'=>$this->input->post('friendID'),'tagged_css'=>json_encode($css)));
				echo $this->db->last_query();
			}
		}

		public function GetAddTag()
		{
			if($this->input->post('Gallry') && $this->input->post('top') && $this->input->post('left'))
			{
                $result=$this->Project_model->GetTags($this->input->post('Gallry'));
                if(!empty($result))
                {
                	foreach ($result as $key => $value) {
                		$position=json_decode($value['tagged_css'],true);
                		 if(round($this->input->post('top'))==round($position['top'])||round($this->input->post('left'))==round($position['left']))
                		 {
                		 	$name=$this->Common_model->getWhere(Gately_Tag,array('Gallry_ID'=>$value['Friend_ID']),1);
                		 	echo $value['Firstname'].' '.$value['LastName'] ;
                		 }
                	}
                }
			}
		}

		public function GetMeAddTag()
		{
			if($this->input->post('user_id') && $this->input->post('user_id')!=0 && $this->input->post('Gallry') && $this->input->post('Gallry')!=0)
			{
                $result=$this->Project_model->GetTagsMe($this->input->post('Gallry'),$this->input->post('user_id'));
                if(!empty($result))
                {
                	foreach ($result as $key => $value) {
                		$position=json_decode($value['tagged_css'],true);
                		  
                		 
                		 	 echo json_encode(array('name'=>$value['Firstname'].' '.$value['LastName'],'position'=>$position));
                		  
                	}
                }
			}
		}

}
