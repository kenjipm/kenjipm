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
		$data_header['js_list'] = ['home/index', 'jquery.fittext'];
		$data_header['css_list'] = ['home/index'];
		
		$this->load->view('header', $data_header);
		
		// body
		$this->load->model('guitar_tab_model');
		$guitar_tabs = $this->guitar_tab_model->find_all();
		$user_posted_guitar_tabs = $this->guitar_tab_model->find_all(true);
		
		// captcha
		$this->load->helper('captcha');
		$vals = array(
				'img_path'      => './captcha/',
				'img_url'       => base_url('captcha')
		);

		$captcha = create_captcha($vals);
		$data = array(
				'captcha_time'  => $captcha['time'],
				'ip_address'    => $this->input->ip_address(),
				'word'          => $captcha['word']
		);

		$query = $this->db->insert_string('captcha', $data);
		$this->db->query($query);
		
		$data_body['guitar_tabs'] = $guitar_tabs;
		$data_body['user_posted_guitar_tabs'] = $user_posted_guitar_tabs;
		$data_body['captcha'] = $captcha;
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
	
	public function save_guitar_tab()
	{
		// First, delete old captchas
		$expiration = time() - 7200; // Two hour limit
		$this->db->where('captcha_time < ', $expiration)
				->delete('captcha');

		// Then see if a captcha exists:
		$sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
		$binds = array($_POST['word'], $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();

		if ($row->count > 0)
		{
			// insert tab to database
			$this->load->model('guitar_tab_model');
			$this->guitar_tab_model->insert_from_post();
			
			// send email to me
			$this->load->library('email');
			
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://mail.kenjipm.site',
				'smtp_port' => 465,
				'smtp_timeout' => 5,
				'smtp_user' => 'noreply@kenjipm.site',
				'smtp_pass' => 'D6Zz2RurHv4zz5T',
				'mail_type' => 'html',
				'wordwrap' => true,
			);

			$this->email->initialize($config);
			$this->email->set_newline("\r\n");
			
			$this->email->from('noreply@kenjipm.site', 'Kenjipm Site');
			$this->email->to('kenji.prahyudi@gmail.com');
			$this->email->subject('Someone posted guitar tab on your site');
			$this->email->message('Posted guitar tab title: '.$_POST['guitar_tab_title']);

			$this->email->send();
			
			$response['status'] = 'success';
		}
		else
		{
			$response['status'] = 'failed';
		}
		$response['data'] = '';
		header('Content-Type: application/json');
		echo json_encode($response);
	}
}
