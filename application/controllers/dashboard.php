<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('invoice_model');
	} 
	public function index()
	{
		$this->load->view('header');
		$this->load->view('dashboard');
		$this->load->view('footer');
	}
	Public  function sendMail()
 {
			
			$this->load->library('email');

		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$this->email->initialize($config);			

		$this->email->from('anbumannan7@gmail.com', 'Sanbumannan');
		$this->email->to('sanbumannan@gmail.com','Sam');
		$this->email->subject('Email Test');
		$this->email->message('Test Mail');
		$result=$this->email->send();
		echo $this->email->print_debugger();
 }

// Public function mailfun()
// {
//     $this->load->view('mail');
// }
}