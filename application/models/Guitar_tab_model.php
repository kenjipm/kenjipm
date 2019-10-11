<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guitar_tab_model extends CI_Model {
	
	private $table_name = 'guitar_tab';
	
	public $id;
	public $title;
	public $content;
	public $duration;
	public $video_embed_html;
	public $is_user_posted;
	public $is_deleted;

	public function map_from_db($db_object)
	{
		$this->id = $db_object->id;
		$this->title = $db_object->title;
		$this->content = $db_object->content;
		$this->duration = $db_object->duration;
		$this->video_embed_html = $db_object->video_embed_html;
		$this->is_deleted = $db_object->is_deleted;
	}
	
	public function find_all($is_user_posted = false)
	{
		$is_user_posted = $is_user_posted ? 'true' : 'false';
		$query = $this->db->query('SELECT * FROM '.$this->table_name.' WHERE is_user_posted = '.$is_user_posted.' AND is_deleted = false');
		return $query->result();
	}

	public function find_by_id($id)
	{
		$query = $this->db->query('SELECT * FROM '.$this->table_name.' WHERE id = '.$id.' AND is_deleted = false');
		$result = $query->result()[0];
		
		$this->map_from_db($result);
		
		return $this;
	}
	
	public function insert_from_post()
	{
		$data = array(
			'title' => $_POST['guitar_tab_title'],
			'content' => $_POST['guitar_tab_content'],
			'duration' => $_POST['guitar_tab_duration'],
			'is_user_posted' => 1
		);

		$this->db->insert($this->table_name, $data);
	}
}
