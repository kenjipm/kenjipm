<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thought_model extends CI_Model {
	
	private $table_name = 'thought';
	
	public $id;
	public $title;
	public $content;
	public $created_date;
	public $is_deleted;
	
	public $created_date_str;
	
	public function map_from_db($db_object)
	{
		$this->id = $db_object->id;
		$this->title = $db_object->title;
		$this->content = $db_object->content;
		$this->created_date = $db_object->created_date;
		$this->is_deleted = $db_object->is_deleted;
		
		$this->created_date_str = date_format(date_create($this->created_date), "d F Y");
	}

	public function find_all()
	{
		$query = $this->db->query('SELECT * FROM '.$this->table_name.' WHERE is_deleted = false');
		return $query->result();
	}

	public function find_by_id($id)
	{
		$query = $this->db->query('SELECT * FROM '.$this->table_name.' WHERE id = '.$id.' AND is_deleted = false');
		$result = $query->result()[0];
		
		$this->map_from_db($result);
		
		return $this;
	}
}
