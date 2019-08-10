<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index()
	{
		// header
		$data_header['page_title'] = "Kenji Prahyudi";
		$data_header['js_list'] = [];
		$data_header['css_list'] = [];
		
		$this->load->view('header', $data_header);
		
		// body
		$this->load->view('contact/index');
		
		// footer
		$this->load->view('footer');
	}
}
