<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// header
		$data_header['page_title'] = "Kenji Prahyudi";
		$data_header['js_list'] = ['home/index'];
		$data_header['css_list'] = ['home/index'];
		
		$this->load->view('header', $data_header);
		
		// body
		$this->load->model('guitar_tab_model');
		$guitar_tabs = $this->guitar_tab_model->find_all();
		
		$data_body['guitar_tabs'] = $guitar_tabs;
		$this->load->view('home/index', $data_body);
		
		// footer
		$this->load->view('footer');
	}
	
	public function get_guitar_tab_detail()
	{
		$id = $this->input->post('id');
		$this->load->model('guitar_tab_model');
		$guitar_tab = $this->guitar_tab_model->find_by_id($id);
		
		if ($guitar_tab)
		{
			$response['status'] = 'success';
		}
		else
		{
			$response['status'] = 'failed';
		}
		$response['data'] = $guitar_tab;
		header('Content-Type: application/json');
		echo json_encode($response);
	}
}
