<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model {

  protected $table = 'tbl_email';

  public function __construct(){
		parent::__construct();
		$this->load->database();
	}

  public function insert_server($data){
    $this->db->insert('tbl_email', $data);
    $last_id = $this->db->insert_id();
    return $last_id;

  }

  function get_email(){;
		$query = $this->db->get($this->table);
		if($query->num_rows() > 0) {
			return $query->row();
		}
		return false;
	}

  public function get_all(){
    $query = $this->db->query('SELECT * FROM tbl_email');
    if($query->num_rows() > 0){
      return $query->result();
    }else{
      return false;
    }
  }

  public function delete($id){
		$delete = $this->db->delete($this->table,array('smtp_id'=> $id));
		return $delete?true:false;
	}

}