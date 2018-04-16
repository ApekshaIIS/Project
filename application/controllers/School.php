<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller {

	public function Register()
	{   
		$data['page']='add_school';
		$this->load->view('include/layout',$data);
    } 
}