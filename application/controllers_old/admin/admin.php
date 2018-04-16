<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function index()
	{
		$data['page']='admin';
		$this->load->view('admin/include/layout',$data);
	}
}
