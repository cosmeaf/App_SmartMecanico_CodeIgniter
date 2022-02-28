<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

  public function __construct(){
		parent::__construct();
		$this->load->database();
	}


  public function insert_user($data){
    $this->db->insert('tbl_users', $data);
    $last_id = $this->db->insert_id();
    return $last_id;

  }

  function validate($email){
    $query = $this->db->get_where('tbl_users', ['email' => $email, 'is_active' => 1 ]);
    if($query->num_rows() == 1){
      return $query->row();
    }else{
      return false;
    }
    
  }

  function check_user($email, $password){
    $query = $this->db->get_where('tbl_users', ['email' => $email, 'password' => $password]);
    if($query->num_rows() > 0){  
      return $query->row();
    }else{  
      return false;       
    }
  }

  function get_all(){
    $query = $this->db->query('SELECT * FROM tbl_users');
    if($query->num_rows() > 0){
      return $query->row();
    }else{
      return NULL;
    }
  }

  function validateEmail($email){
    $query = $this->db->query("SELECT * FROM tbl_users WHERE email='$email' ");
    if($query->num_rows() == 1){
      return $query->row();
    }else{
      return false;
    }
  }

  function updatePasswordHash($data, $email){
    $this->db->where('email', $email);
    $this->db->update('tbl_users', $data);
  }

  function get_hash_detail($hash){
    $query = $this->db->query("SELECT * FROM tbl_users WHERE token='$hash' ");

    if($query->num_rows() == 1){
      return $query->row();
    }else{
      return false;
    }
  }

  function updateNewPassword($data, $hash){
    $this->db->where('token', $hash);
    $this->db->update('tbl_users', $data);
  }


}