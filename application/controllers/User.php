<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
       {
            parent::__construct();
            //function inside autoloaded helper, check if user is logged in, if not redirects to login page
         }

	public function RegisterUser()
	{  
		 if($this->input->post('Register'))
	       {  
              $errors['error']=array();
	       	  $this->load->library('form_validation');
	       	  $this->form_validation->set_rules('password', 'Password', 'required');
	       	  $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[password]');
	       	  $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[gateley_user.email]');

	       	  //print_r($this->input->post());

	       	   if($this->form_validation->run()==false)
	       	   {
	              $errors['error'] = $this->form_validation->error_array();
	              echo json_encode($errors);
	       	   }else
	       	   { 
                          unset($_POST['Register']);   
                          unset($_POST['confirmpassword']);   
                          $_POST['password'] =md5($_POST['password']);
                          $ConfirmationCode=$this->createRandomPassword(); 
                          $_POST['ConfirmationCode'] =$ConfirmationCode; 
                          $last=$this->Common_model->insert(Gately_User,$this->input->post()); 
                          $To=$_POST['email'];
                          $Sub='Confirmation Link';
                          $url=base_url().'user/verify/'.base64_encode($ConfirmationCode);
                          $body='Please click on link and confirm your mail :<a href="'.$url.'">Click Here</a>';
						  //$mesg = $this->load->view('email/confirmation_template','',true);

                          $this->MyEmail($To,$Sub,$body);	
                          $this->session->set_flashdata('msg','Your successfully registered');
                          $errors['success']['url'] ='home'; 
	       	   	  	      echo json_encode($errors);die;
                  } 
	       	   } 
	}

	public function verify()
	{ 
		if($this->uri->segment(3)!='')
		{
           $result=$this->Common_model->getWhere(Gately_User,array('ConfirmationCode'=>base64_decode($this->uri->segment(3)),'EmailVerify'=>0),1);
           if($result)
           { 
           	 $data['user_id']=$result['user_id'];
	       	 $data['Firstname']=$result['Firstname'];
	       	 $data['LastName']=$result['LastName'];
	       	 $data['email']=$result['email'];
	       	 $data['user_type']=$result['user_type'];
	       	 $this->session->set_userdata('UnserInfo',$data);
	       	 //$this->Common_model->updates(Gately_User,array('ConfirmationCode'=>'','EmailVerify'=>1),array('user_id'=>$result['user_id']));
	       	   redirect('user/Role');

           } 

		}
	}

	public function Role()
	{
		  $this->is_logged_in();
		$data['page']='choose_role';
		$this->load->view('include/without_navigation');  
		$this->load->view('choose_role');  
		$this->load->view('include/without_contact');  
	}

	public function update()
	{ 
		 $this->is_logged_in();
		if($this->uri->segment(3)!='' && $this->uri->segment(4)!='' &&  $this->uri->segment(5)!='') 
		{ 
			$post['Firstname']=$this->uri->segment(3);
			$post['LastName']=$this->uri->segment(4); 
			$post['salutation']=$this->uri->segment(5); 
			$post['user_type']=5; 
			$this->Common_model->updates(Gately_User,$post,array('user_id'=>$this->Userdata['user_id']));
			redirect('user/myprofile');
		}  
	}

	public function UpdateMyProfile()
	{
		  $this->is_logged_in();
		 if($this->input->post('Save'))
			{
				$errors['error']=array();
	       	    $this->load->library('form_validation');

	       	    
	       	    if($this->input->post('school'))
                 {
                   
                    $this->form_validation->set_rules('school_type','School Type','required');
                    $this->form_validation->set_rules('Kantons','Kantons','required');
                    $this->form_validation->set_rules('school_name','School Name','required');
		       	    $this->form_validation->set_rules('address','Address','required');
		       	    $this->form_validation->set_rules('city','City','required');
		       	    $this->form_validation->set_rules('postalcode','PostalCode','required');
                 }elseif($this->input->post('organization'))
                 {   
		       	    $this->form_validation->set_rules('city','City','required');
		       	    $this->form_validation->set_rules('postalcode','PostalCode','required');
                    $this->form_validation->set_rules('school_name','Organization Name','required');
		       	    $this->form_validation->set_rules('address','Address','required');
                 }
	       	    elseif($this->input->post('Savedesc'))
	       	    {
                   $this->form_validation->set_rules('des','Description','required');
	       	    }else
	       	    {
	       	        $this->form_validation->set_rules('Firstname','First Name','required');
		       	    $this->form_validation->set_rules('LastName','Last Name','required');
		       	    $this->form_validation->set_rules('address','Address','required');
		       	    $this->form_validation->set_rules('schoolgrade','School Grade','required');	
	       	    }
	       	    
                 $flag=1;
	       	    if((!empty($_FILES) && $_FILES['profile_pic']['name']!=''))
	       	    	{
	       	    		$name= $this->FileUpload('profile_pic','/uploads/profile_pic/');
                         if(isset($name['error']))
		                  {
		                  	$flag=0; 
		                  }else
		                  {
		                     $_POST['profile_pic']=$name;
		                  }
	       	    	}
                     
	       	    if($this->form_validation->run() && $flag==1)
	       	    {     
                      if($this->input->post('Savedesc'))
                      { 
                      	unset($_POST['Savedesc']);
                      } 
                      
                          
                       if($this->input->post('school') || $this->input->post('organization'))
                       {
                         unset($_POST['Save']);
                         if($this->input->post('school'))
                              unset($_POST['school']);
                         else
                         	unset($_POST['organization']);
                         $this->Common_model->insert(Gately_User,$this->input->post());
	                     $errors['success']['fields'] =$this->input->post(); 
	       	   	  	      echo json_encode($errors);die;
                       }else
                       {
                       	  unset($_POST['Save']);
                          $this->Common_model->updates(Gately_User,$this->input->post(),array('user_id'=>$this->Userdata['user_id']));
	                     $errors['success']['fields'] =$this->input->post(); 
	       	   	  	      echo json_encode($errors);die;
                       }
                         
                        	 
                        
                        
				        //redirect('user/myprofile');
                    
	       	    }else
	       	    {
                  $errors['error'] = $this->form_validation->error_array();
                  if($flag==0)
                  {
                  	$errors['error']['profile_pic']='Please select profile Pic';
                  }
	              echo json_encode($errors);
	       	    }

				
			}
	}

	public function myprofile()
	{ 
		 $this->is_logged_in();
		$data['page']='studentProfile';
		$this->load->view('include/layout',$data); 
	}


	public function AddFriends()
	{
		
	}

}
