<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		$data['page']='home';
		$this->load->view('include/layout',$data);
	}
}
