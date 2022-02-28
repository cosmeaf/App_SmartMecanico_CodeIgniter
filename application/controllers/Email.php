<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
  
  protected $table = 'tbl_smtp';

  public function __construct(){
    parent::__construct();
    $this->load->model('email_model');
  }


	function logged_in(){
    if(!$this->session->userdata('username')){
      $this->session->set_flashdata('danger', "Ops! Você precisa estar logado");
      redirect(base_url('login'));
    }
  }

  public function index(){
    $data['rows'] = $this->email_model->get_all();
    //echo "<pre>"; print_r($data);die();
    $this->logged_in();
    $this->template->show('email', $data);
  }

  public function resgister_server(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $this->form_validation->set_rules('smtp_host','SMTP Server Address','trim|required');
      $this->form_validation->set_rules('smtp_user','SMTP Username','trim|required|valid_email|valid_emails');
      $this->form_validation->set_rules('smtp_pass','SMTP Password','trim|required');
      $this->form_validation->set_rules('smtp_port','SMTP Port','trim|required');
      $this->form_validation->set_rules('smtp_crypto','SMTP Encryption','trim|required');
      $this->form_validation->set_rules('passconf', 'Repetir Senha', 'required|matches[smtp_pass]');
      $this->form_validation->set_error_delimiters('<div class="error text-danger mt-1" style="font-size:12px;">', '</div>');

      if ($this->form_validation->run() == FALSE){
        $this->session->set_flashdata('danger', validation_errors());
        redirect(base_url('restrict/email'));
      }else{
        //echo "<pre>";print_r($_POST);die();
        $data = [
            'smtp_host' => $this->input->post('smtp_host'),
            'smtp_user' => $this->input->post('smtp_user'),
            'smtp_pass' => $this->input->post('smtp_pass'),
            'smtp_port' => $this->input->post('smtp_port'),
            'smtp_crypto' => $this->input->post('smtp_crypto'),
            'updated_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
          ];
          $this->email_model->insert_server($data);
          $this->session->set_flashdata('success', 'Cadastro realizado com sucesso');
          redirect(base_url('restrict/email'));
        }

    }else{
      $this->session->set_flashdata('danger', validation_errors());
      redirect(base_url('restrict/email'));
    }

  }


  public function send_email() {
		$sendData = $this->email_model->get_email();
    //echo "<pre>"; print_r($sendData);die();
		$smtp_host = $sendData->smtp_host;
		$smtp_user = $sendData->smtp_user;
		$smtp_pass = $sendData->smtp_pass;
		$smtp_port = $sendData->smtp_port;
		$smtp_crypto = $sendData->smtp_crypto;

		//echo "<pre>", print_r($_POST);die();

		$this->form_validation->set_rules('send_email', 'send_email', 'trim|required|valid_emails|valid_email');
		$this->form_validation->set_error_delimiters('<div class="error text-danger mt-1" style="font-size:12px;">', '</div>');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('danger', validation_errors());
			redirect('restrict/email');
		} else {
				$config['protocol']    = 'smtp';
				$config['smtp_host']    = $smtp_host;
				$config['smtp_user']    = $smtp_user;
				$config['smtp_pass']    = $smtp_pass;
				$config['smtp_port']    = $smtp_port;
				$config['smtp_crypto'] 	= $smtp_crypto;
				$config['smtp_timeout'] = '7';
				$config['charset']    	= 'utf-8';
				$config['wordwrap'] 		= TRUE;
				$config['newline']    	= "\r\n";
				$config['crlf']     		= "\r\n";
				$config['mailtype'] 		= 'text'; // or html
				$config['validation'] 	= TRUE; // bool whether to validate email or not      

				$this->email->initialize($config);
				// Define os novos caracteres de linha para e-mails.
				$this->email->set_newline("\r\n");
				// Define o endereço de email do remetente.
				$this->email->from($smtp_user);
				// Define o endereço de email do destinatário.
				$this->email->to($this->input->post('send_email'));
				// Define o assunto do email.
				$this->email->subject("Teste de validaçao de E-mail");
				// Define a mensagem de email
				$this->email->message("Mensagem recebida com sucesso!");
				// Tenta enviar o email. 
				if($this->email->send(false)){
					// show_error($this->email->print_debugger());
					$this->session->set_flashdata('success', 'E-mail Enviado com Sucesso');
					redirect(base_url('restrict/email'));
				}else{
					$this->session->set_flashdata('danger', 'Ops! Error ao enviar E-mail');
					//show_error($this->email->print_debugger());
					redirect(base_url('restrict/email'));
				}

			}

  	}


    
    public function send() {
			$sendData = $this->email_model->get_email();
			$smtp_host = $sendData->smtp_host;
			$smtp_user = $sendData->smtp_user;
			$smtp_pass = $sendData->smtp_pass;
			$smtp_port = $sendData->smtp_port;
			$smtp_crypto = $sendData->smtp_crypto;

		 //echo "<pre>", print_r($sendData);print_r($_POST);die();


      $this->form_validation->set_rules('email', 'email', 'trim|required|valid_emails');
      $this->form_validation->set_error_delimiters('<div class="error text-danger mt-1" style="font-size:12px;">', '</div>');

      if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('danger', validation_errors());
        redirect(base_url('restrict/email'));
      } else {
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = $smtp_host;
        $config['smtp_user']    = $smtp_user;
        $config['smtp_pass']    = $smtp_pass;
        $config['smtp_port']    = $smtp_port;
        $config['smtp_crypto'] 	= $smtp_crypto;
        $config['smtp_timeout'] = '7';
        $config['charset']    	= 'utf-8';
        $config['wordwrap'] 		= TRUE;
        $config['newline']    	= "\r\n";
        $config['crlf']     		= "\r\n";
        $config['mailtype'] 		= 'text'; // or html
        $config['validation'] 	= TRUE; // bool whether to validate email or not      

        $this->email->initialize($config);
      // Define os novos caracteres de linha para e-mails.
        $this->email->set_newline("\r\n");
      // Define o endereço de email do remetente.
        $this->email->from($smtp_user);
      // Define o endereço de email do destinatário.
        $this->email->to('contato@lexlam.com.br');
      // Define o assunto do email.
        $this->email->subject('Pagina de Contato Lexlam');
      // Define a mensagem de email
        $this->email->message($this->input->post('message'));

      // Tenta enviar o email. 
        if ($this->email->send(false)) {
          $this->session->set_flashdata('success', 'E-mail enviado com sucesso');
          echo  "<script>alert('Email enviado com Sucesso!);</script>";
          redirect(base_url('/'));
        } else {
          $this->session->set_flashdata('danger', 'Ops: Error ao enviar e-mail');
          redirect(base_url('/'));
          //show_error($this->email->print_debugger());
        }
      }	
    }


    public function delete($id){

    	if ($id) {
    		$delete = $this->email_model->delete($id);
    		if ($delete) {
    			$this->session->set_flashdata('success', 'Registro apagado com Suceso');
    			redirect(base_url('restrict/email'));
    		}else{
    			$this->session->set_flashdata('danger', 'Falha ao deletar registro SMTP');
    			redirect(base_url('restrict/email'));
    		}
    	}
    	redirect(base_url('restrict/email'));
    }



}