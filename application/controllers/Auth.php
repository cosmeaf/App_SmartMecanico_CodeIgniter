<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    $this->load->model('users_model');
    $this->load->model('email_model');
  }


  function logged_in(){
    if($this->session->userdata('username')){
      redirect(base_url('restrict'));
    }
  }

  public function login()
	{
    $this->logged_in('login');
    $this->template->show('auth/login');
  }

	public function validation()
	{ 
    if($_SERVER['REQUEST_METHOD'] ==  'POST'){
     
      $this->form_validation->set_rules('email','Email','trim|required|valid_email');
      $this->form_validation->set_rules('senha', 'Password', 'required');
      $this->form_validation->set_error_delimiters('<div class="error text-danger mt-1" style="font-size:12px;">', '</div>');

      if ($this->form_validation->run() == FALSE){
        //$this->session->set_flashdata('danger', validation_errors());
        $this->login();
      }else{
        $email = $this->input->post('email');
        $password = $this->input->post('senha');
        $data = $this->users_model->validate($email);
        
        if($data){
          $sess_data = [
            'level' => $data->role_id,
            'username' => $data->first_name,
            'email' => $data->email,
            'logged_in' => TRUE
          ];
          if($email == $data->email){
            $hashed = $data->password;
            if(password_verify($password, $hashed)){           
              if($sess_data['level'] === '1'){
                $this->session->set_userdata($sess_data);
                $this->session->set_flashdata('success', 'Bem Vindo');
                redirect(base_url('restrict'));
              }elseif($sess_data['level'] === '2'){
                $this->session->set_userdata($sess_data);
                $this->session->set_flashdata('success', 'Bem Vindo');
                redirect(base_url('restrict/users'));
              }
            }else{
              $this->session->set_flashdata('danger', 'Senha inválida');
              $this->login();
            }
          }else{
            $this->session->set_flashdata('danger', 'E-mail não Cadastrado');
            $this->login();
          }
        }else{
          $this->session->set_flashdata('danger', 'Dados informados não confere');
          $this->login();
        }
      }
    }else{
      $this->session->set_flashdata('danger', validation_errors());
      $this->login();
    }
  }



  public function register()
	{
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $this->form_validation->set_rules('first_name', 'Nome', 'required');
      $this->form_validation->set_rules('last_name', 'Sobrenome', 'required');
      $this->form_validation->set_rules('email','E-mail','trim|required|valid_email');
      $this->form_validation->set_rules('senha', 'Senha', 'required');
      $this->form_validation->set_rules('repetirsenha', 'Repetir Senha', 'required|matches[senha]');
      $this->form_validation->set_error_delimiters('<div class="error text-danger mt-1" style="font-size:12px;">', '</div>');

      if ($this->form_validation->run() == TRUE){
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $email = $this->input->post('email');
        $password = password_hash($this->input->post('senha'), PASSWORD_DEFAULT);
         
        $data = [
          'role_id' => 2,
          'first_name' => $first_name,
          'last_name' => $last_name,
          'email' => $email,
          'password' => $password,
          'is_active' => 1,
          'updated_at' => date('Y-m-d H:i:s'),
          'created_at' => date('Y-m-d H:i:s')
        ];
        $this->users_model->insert_user($data);
        $this->session->set_flashdata('success', 'Usuário Cadastrado com sucesso');
        redirect(base_url('login'));
      }   
    }
    //$this->session->set_flashdata('danger', validation_errors());
    $this->template->show('auth/register');

	}



  public function recovery()   
	{
    $this->form_validation->set_rules('email','E-mail','trim|required|valid_email');
    $this->form_validation->set_error_delimiters('<div class="error text-danger mt-1" style="font-size:12px;">', '</div>');

    if ($this->form_validation->run() == FALSE){
      $this->session->set_flashdata('danger', validation_errors());
      $this->template->show('auth/recovery');
    }else{
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = $this->input->post('email');
        $validateEmail = $this->users_model->validateEmail($email);
        if($validateEmail != false){
          $row = $validateEmail;
          $user_id = $row->user_id;

          $string = time().$user_id.$email;
          $hash_string = hash('sha256', $string);
          $currentDate = date('Y-m-d H:i');
          $hash_expiry = date('Y-m-d H:i', strtotime($currentDate . ' +1 days'));
          $data = [
            'token' => $hash_string,
            'token_expiry' => $hash_expiry
          ];
          $resetLinkPassword = base_url('reset_password?hash=' . $hash_string);      
          $message = 'Your reset password Link is here: '.$resetLinkPassword;
          $subject = 'Password Reset Link';
          //echo "<pre>"; var_dump($email, $message, $subject);die();
          $emailStaus = $this->send_email($email, $message, $subject);
          $this->users_model->updatePasswordHash($data, $email);
          $this->send_email($email, $message, $subject);
          $this->session->set_flashdata('success', 'Verifique sua caixa de E-mail');
          redirect(base_url('login'));
          
          
        }else{
          $this->session->set_flashdata('danger', 'E-mail invalido ou não existente');
          $this->template->show('auth/recovery');
        }

      }else{
        $this->session->set_flashdata('danger', validation_errors());
        $this->template->show('auth/recovery');
      }
    }
	}



  public function reset_password(){
    $hash = $this->input->get('hash');
    $hashDetails = $this->users_model->get_hash_detail($hash);
    $this->data['hash']=$hash;
    //echo "<pre>"; print_r($this->data);die();
    //echo "<pre>"; print_r($hash);
    //echo "<pre>"; print_r($hashDetails->token);die();
    if(!empty($hash)){ // Verified if hash exist

      if($hash == $hashDetails->token){ // Verified if hash is equal

        $hash_expiry = $hashDetails->token_expiry;
        $currentDate = date('Y-m-d H:i');

        if($currentDate < $hash_expiry){ // Verified if date is compatible
          
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->form_validation->set_rules('senha', 'Senha', 'required');
            $this->form_validation->set_rules('repetirsenha', 'Repetir Senha', 'required|matches[senha]');
            $this->form_validation->set_error_delimiters('<div class="error text-danger mt-1" style="font-size:12px;">', '</div>');
     
            if ($this->form_validation->run() == TRUE){
              $password = password_hash($this->input->post('senha'), PASSWORD_DEFAULT);
              $data = [
                'password' => $password,
                'token' => NULL,
                'token_expiry' => NULL
              ];
              $this->users_model->updateNewPassword($data, $hash);
              $this->session->set_flashdata('success', 'Senha Alterada com Sucesso!');
              redirect(base_url('login'));

            }else{            
              $this->session->set_flashdata('danger', validation_errors());
              $this->template->show('auth/reset_password', $this->data);
            }
          }else{
            $this->session->set_flashdata('danger', validation_errors());
            $this->template->show('auth/reset_password', $this->data);
          }
          //echo "Data é Menor /";
        }
        // echo "Hash são iguais /";
      }else{
        redirect(base_url('reset_password'));
      }
      // echo "Hash Existe ";
    }else{
      // echo "Hash não existe /";
      $this->template->show('auth/expired_access');
    }      
  }
    //$this->template->show('auth/reset_password');
    //$this->template->show('auth/expired_access');

  
  public function logout()
	{
    $this->session->sess_destroy();
    redirect(base_url('login'));
	}

  public function send_email($email, $message, $subject) {
		$sendData = $this->email_model->get_email();
    $smtp_host = $sendData->smtp_host;
		$smtp_user = $sendData->smtp_user;
		$smtp_pass = $sendData->smtp_pass;
		$smtp_port = $sendData->smtp_port;
		$smtp_crypto = $sendData->smtp_crypto;

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
    $this->email->to($email);
    // Define o assunto do email.
    $this->email->subject($subject);
    // Define a mensagem de email
    $this->email->message($message);
    // Tenta enviar o email. 
    $this->email->send(true);
  }

  /*-----------------------------*/
} // End Controller