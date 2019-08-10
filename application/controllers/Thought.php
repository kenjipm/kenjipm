<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thought extends CI_Controller {

	public function index()
	{
		// header
		$data_header['page_title'] = "Kenji Prahyudi";
		$data_header['js_list'] = ['thought/index'];
		$data_header['css_list'] = [];
		
		$this->load->view('header', $data_header);
		
		// body
		$this->load->model('thought_model');
		$thoughts = $this->thought_model->find_all();
		
		$data_body['thoughts'] = $thoughts;
		$this->load->view('thought/index', $data_body);
		
		// footer
		$this->load->view('footer');
	}
	
	public function get_thought_detail()
	{
		$id = $this->input->post('id');
		$this->load->model('thought_model');
		$thought = $this->thought_model->find_by_id($id);
		
		if ($thought)
		{
			$response['status'] = 'success';
		}
		else
		{
			$response['status'] = 'failed';
		}
		$response['data'] = $thought;
		header('Content-Type: application/json');
		echo json_encode($response);
	}
}
