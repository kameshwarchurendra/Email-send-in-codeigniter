<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
//===================================Start=================================//
	public function index(){
		$this->load->view('welcome_message');
	}

	public function send_email(){
			

			$config = array(
				'protocol'  => 'smtp',
				'smtp_host' => 'smtp.gmail.com',
				'smtp_port' => 587,
				'smtp_user' => 'example@gmail.com',
				'smtp_pass' => 'XXXXXXXXXXXXX',
				'smtp_crypto' => 'tls', // Enable TLS
				'mailtype'  => 'html',
				'charset'   => 'utf-8',
				'wordwrap'  => TRUE,
				'newline'   => "\r\n"
			);

			$this->email->initialize($config);

			$this->email->from('exmplefrom@gmail.com', 'test'); 
			$this->email->to('exmpleto@gmail.com');
			$this->email->subject('Email Test');
			$this->email->message('<p>This is a test email sent from CodeIgniter</p>');

			if ($this->email->send()) {
				echo "Email sent successfully!";
			} else {
				echo $this->email->print_debugger();
			}
	}

//===================================End=================================//
}
