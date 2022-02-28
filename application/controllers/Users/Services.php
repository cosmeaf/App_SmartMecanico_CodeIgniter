<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {
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
		$this->template->show('users/services');
  }

  public function service_register(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $this->form_validation->set_rules('senha', 'Senha', 'required');
      $this->form_validation->set_rules('repetirsenha', 'Repetir Senha', 'required|matches[senha]');
      $this->form_validation->set_error_delimiters('<div class="error text-danger mt-1" style="font-size:12px;">', '</div>');

      if ($this->form_validation->run() == TRUE){

      }
    }
  }

  
  /* End Services Controller*/
}