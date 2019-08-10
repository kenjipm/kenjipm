<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thought_model extends CI_Model {
	
	private $table_name = 'thought';
	
	public $id;
	public $title;
	public $content;
	public $created_date;
	public $is_deleted;

	public function find_all()
	{
		$query = $this->db->query('SELECT * FROM '.$this->table_name.' WHERE is_deleted = false');
		return $query->result();
	}

	public function find_by_id($id)
	{
		$query = $this->db->query('SELECT * FROM '.$this->table_name.' WHERE id = '.$id.' AND is_deleted = false');
		return $query->result()[0];
	}
}
