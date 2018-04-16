<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct() {
        parent::__construct(); 
        $this->load->model('Project_model');
    }

	public function index()
	{
		$data['rows'] =$this->Project_model->GetAllProjects(1);
		$data['page']='home';
		$this->load->view('include/layout',$data);
	}
}
