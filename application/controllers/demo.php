<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demo extends CI_Controller
{
	function __constuct()
	{
		parent::__constuct();
		
	} 

	public function index()

{
	 
}
Public function mail()
{
		

$this->load->library('email');

$this->email->from('your@example.com', 'Your Name');
$this->email->to('anbumannan7@gmail.com'); 
$this->email->cc(''); 
$this->email->bcc(''); 

$this->email->subject('Email Test');
$this->email->message('Testing the email class.');	

$this->email->send();

echo $this->email->print_debugger();
}

}
?>