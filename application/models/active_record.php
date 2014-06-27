<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Active_record extends CI_Model {
    
	function __construct() {
		parent::__construct();
	}
	
	/**	
		$table : table name
		$field : field name
		$id    : ID
		$sb    : sort by (asc or desc)
		$gb    : group by (name of field)
		$com   : array ('field'=>'key')
		$set   : array ('field'=>'value')
	**/		
	
	public function msr($table, $field, $sb){
		$this->db->order_by($field, $sb);
		return $this->db->get($table);
	}
	
	public function msrwhere($table, $com, $field, $sb) {
		$this->db->order_by($field, $sb);
		return $this->db->get_where($table, $com);
	}
	
	public function msrwherelimit($table, $com, $field, $sb) {
		$this->db->order_by($field, $sb);
		$this->db->limit(10);
		return $this->db->get_where($table, $com);
	}
	
	public function msrwherelimitspec($table, $com, $field, $sb, $lim) {
		$this->db->order_by($field, $sb);
		$this->db->limit($lim);
		return $this->db->get_where($table, $com);
	}
	
	public function save($table, $set) {
		$this->db->insert($table, $set);
		return $this->db->insert_id();
	}
	
	public function edit($table, $set, $field, $id) {
		$this->db->where($field, $id);
		$this->db->update($table, $set);
	}
	
	public function delete($table, $field, $id) {
		$this->db->delete($table, array($field => $id));
	}
	
	public function msrquery($sql){
		$query = $this->db->query($sql);
		return $query;
	}
	
}