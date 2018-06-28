<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Email extends CI_Controller
	
	{
		function __construct()
		{
			parent::__construct();
		}

		function index()
		{
			$this->load->view('header');
		$this->load->view('email_check');
			$this->load->view('footer');
		}

public 	function sendMail()
	{

     $this->load->library('email');
            $this->email->from('anbumannan7@gmail.com', 'anbumannan');
            $this->email->to($this->input->post('e-mail')); 
            $this->email->cc('another@another-example.com'); 
            $this->email->bcc('them@their-example.com'); 
            $this->email->subject('Email Test');
            $this->email->message('Testing the email class.');  
            $this->email->send();
            echo $this->email->print_debugger();

            $config['protocol'] = 'sendmail';
            //$config['protocol'] = 'mail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            //$config['mailtype'] = 'text';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;

            $this->email->initialize($config);
    
}

}