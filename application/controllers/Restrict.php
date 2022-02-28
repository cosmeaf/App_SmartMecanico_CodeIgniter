<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restrict extends CI_Controller {
	public function __construct(){
    parent::__construct();
		
  }

	function logged_in(){
    if(!$this->session->userdata('email')){
      $this->session->set_flashdata('danger', "Ops! Você precisa estar logado");
      redirect(base_url('login'));
    }
  }

	public function index()
	{
		$this->logged_in();
		$this->template->show('restrict');
		// echo '<pre>';print_r($this->session->userdata());'</pre>';
		// echo password_hash('123456', PASSWORD_DEFAULT);
		// echo password_hash($this->input->post('senha'), PASSWORD_DEFAULT);	
	}


}
