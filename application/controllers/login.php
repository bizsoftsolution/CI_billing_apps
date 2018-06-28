<? ob_start(); ?>
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



	class Login extends CI_Controller

	{

		function __construct()

		{

			parent::__construct();

			$this->load->model('login_model');

		}

	public	function index()

	{

		$this->load->view('login');

	}

	// public function _encrip_password($password)

	//  {

	// 	return	md5($password);

	//  }

	public function validate()

	 {

		$username=$this->input->post('username');

		$password=$this->input->post('password');





		// $data=array('username'=>$username,

		// 	'password'=>$password,

		// 	'status'=>1);



		// // echo"<pre>";

		// // print_r($data);

		// $result=$this->login_model->insert($data);

		// if($result)

		// {

		// 	echo"insert successfully";

		// }



		// echo"<pre>";

		// print_r($username);

		// echo"<pre>";

		// print_r($password);

		$result=$this->login_model->validate($username,$password);



		// echo"<pre>";

		// print_r($result);



		if($result)

		{

			$get_id=$this->login_model->get($username,$password);

			foreach($get_id as $s)

			{

				$username=$s->username;

				$id=$s->id;



			}

			$data=array('username'=>$username,

				'id'=>$id,

				'is_logged_in'=>true);

			$this->session->set_userdata($data);

			redirect('dashboard');

		}

		else

		{

			$this->session->set_flashdata('msg','username or password incorrect');

			redirect('login');

		}

	}

			public function logout()

			{

				$this->session->sess_destroy();

					redirect('login');

			}



	}

?>
<? ob_flush(); ?>

