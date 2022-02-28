<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct(){
    parent::__construct();
		
  }

	function logged_in(){
    if(!$this->session->userdata('email')){
      $this->session->set_flashdata('danger', "Ops! Você precisa estar logado");
      redirect(base_url('login'));
    }
  }

  public function index(){
    $this->logged_in();
		$this->template->show('dashboard/users/list_users');
  }

  /* End Users Controller */
}