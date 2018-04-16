<?php defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");

class MY_Controller extends CI_Controller
{
	public $Userdata=array();
     
	function __construct()
	{
		parent::__construct();

		if($this->session->userdata('UnserInfo'))
		{
			$dd=$this->session->userdata('UnserInfo');
			$this->Userdata=$this->Common_model->getWhere(Gately_User,array('user_id'=>$dd['user_id']),1);
		}
    }

	    public function GetAllsegment()
	    {
	    	$segments = $this->uri->segment_array();
		     print_r($segments);
	    }

	    public function login()
		{    
	       if($this->input->post('login'))
	       { 
	       	$errors['error']=array();
	       	  $this->load->library('form_validation');
	       	  $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	       	  $this->form_validation->set_rules('password', 'Password', 'required');

	       	   if($this->form_validation->run()==false)
	       	   {
	              $errors['error'] = $this->form_validation->error_array();
	              echo json_encode($errors);
	       	   }else
	       	   {
	       	   	   unset($_POST['login']);
	       	   	   unset($_POST['csrfToken']);
	       	   	   $_POST['password']=md5($_POST['password']); 
	       	   	 $re= $this->Common_model->getExist(Gately_User,$this->input->post());
                     
	       	   	  if($re==0)
	       	   	  { 
	       	   	  	$errors['error']['email'] ='Email Address or password wrong';
	       	   	  	 echo json_encode($errors);
	       	   	  }else
	       	   	  {
                       $re= $this->Common_model->getWhere(Gately_User,$this->input->post(),1);
                       if($re['EmailVerify']==0)
                       	 {
                       	 	$errors['error']['email'] ='Please verify email address';
	       	   	  	         echo json_encode($errors);
                       	 }else{
                       	 	 $data['user_id']=$re['user_id'];
			       	   	  	 $data['Firstname']=$re['Firstname'];
			       	   	  	 $data['LastName']=$re['LastName'];
			       	   	  	 $data['email']=$re['email'];
			       	   	  	 $data['user_type']=$re['user_type'];
			       	   	  	 $this->session->set_userdata('UnserInfo',$data);
			       	   	  	 $this->session->set_flashdata('msg','You have ben successfully login');
			       	   	  	  
			       	   	  	 if($this->uri->segment(1)=='user'){
			       	   	  	 	$errors['success']['url'] ='home'; 
			       	   	  	    echo json_encode($errors);die;
			       	   	  	}
                       	 }
		       	   	  	 
	       	   	  	 
	       	   	  	
	       	   	    }
	              
	       	   }
	 
	       }
			 
		}


		public function logout()
		{
			 if($this->Userdata)
			 {  
				$this->session->sess_destroy();
				if($this->uri->segment(1)=='user')
	       	   	  	  redirect('home');
			 }
		}

		public function FileUpload($name,$destination='/uploads/')
		{
			//print_r($_FILES[$name]);
			$error=array();
			 
            if($_FILES[$name]['name']=='')
            {
                $error['error'][$name]='Please select file';
                return $error;
            }else if($_FILES[$name]['type']=='image/jpeg'||$_FILES[$name]['type']=='image/JPEG'||$_FILES[$name]['type']=='image/JPG'||$_FILES[$name]['type']=='image/jpg'||$_FILES[$name]['type']=='image/png'||$_FILES[$name]['type']=='image/PNG')
            { 
            	 $config['upload_path']          = $destination; 
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $filename=time().$_FILES[$name]['name'];
                $root = getcwd();
                $target_file=$root.$config['upload_path'].$filename; 
                $this->load->library('upload', $config);

                 if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) { 
                 	   return $filename;
				    }else{
                         $error['error'][$name];
                         return $error;
				    } 
            }else
            {
               $error['error'][$name]='Please select image file';
               return $error;
            } 

		}


		public function MultipleFileUpload($name,$destination)
		{
			//print_r($_FILES[$name]);
			$error=array();
			$filenames=array();
			  foreach($_FILES[$name]['name'] as $k=>$val)
			  {
			            if($_FILES[$name]['name'][$k]=='')
			            {
			                $error['error']['name']='Please select file';
			               // return $error;
			            }else { 
			            	 $config['upload_path']          = $destination; 
			                $config['max_size']             = 100;
			                $config['max_width']            = 1024;
			                $config['max_height']           = 768;
			                $filename=time().$_FILES[$name]['name'][$k];
			                $root = getcwd();
			                $target_file=$root.$config['upload_path'].$filename; 
			                $this->load->library('upload', $config);

			                 if (move_uploaded_file($_FILES[$name]["tmp_name"][$k], $target_file)) { 
			                 	   $filenames[$k]= $filename;
							    }
			            }
        }

        return $filenames;

		}

		function is_logged_in()
	    {
	        $is_logged_in = $this->session->userdata('UnserInfo');
	        if(!isset($is_logged_in) || $is_logged_in != true)
	        {
	            echo 'You don\'t have permission to access this page. <a href="'.base_url().'">Login</a>';    
	            die();      
	            //$this->load->view('login_form');
	        }       
	    }


	   public function MyEmail($to,$sub,$Msg)
	   {
	   	   $this->load->library('email');

			$config=array(
			'charset'=>'utf-8',
			'wordwrap'=> TRUE,
			'mailtype' => 'html'
			);

			$this->email->initialize($config);


			$this->email->from('gately@support.com', 'Gately Support');
			$this->email->to($to);
			//$this->email->cc('another@another-example.com');
			//$this->email->bcc('them@their-example.com');
			$this->email->subject($sub);
			$this->email->message($Msg);
			$this->email->send();

			//echo $this->email->print_debugger();

	   }

	  public function createRandomPassword() { 

		    $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
		    srand((double)microtime()*1000000); 
		    $i = 0; 
		    $pass = '' ; 

		    while ($i <= 7) { 
		        $num = rand() % 33; 
		        $tmp = substr($chars, $num, 1); 
		        $pass = $pass . $tmp; 
		        $i++; 
		    } 

		    return $pass; 

		} 

}
