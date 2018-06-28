<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



	class Customer extends CI_Controller

	{

		function __construct()

		{

			parent::__construct();
			if($this->session->userdata('is_logged_in')=="")

		{
			$this->session->set_flashdata('msg','Login to continue');

		redirect('login/index');


		}

			 $this->load->model('customer_model');

		}



		Public function index()

		{

			if($this->session->userdata('is_logged_in'))

		{

			$this->load->view('header');

			$this->load->view('customer');

			$this->load->view('footer');

		}

		else

		{

		$this->session->set_flashdata('msg','Login to continue');

		redirect('login/index');

		}

		



		}



		Public function insert_customer()

		{

			$data=array(

				'companyname'=>$_POST['companyname'],

				'name'=>$_POST['name'],

				'mobileno'=>$_POST['mobileno'],

				'emailid'=>$_POST['emailid'],

				'address'=>$_POST['address'],

				'gstno'=>$_POST['gstno'],

				'state'=>$_POST['state'],

				'pincode'=>$_POST['pincode'],

				'city'=>$_POST['city'],

				'country'=>$_POST['country'],

				'status'=>1

				

				);

			$result=$this->customer_model->insert_customer($data);

			

			if($result=true)



			{

					$this->session->set_flashdata('msg','Customer Addedd Successfully');

					redirect('customer');



			}

			else

					{

					$this->session->set_flashdata('msg1','Item Adding Failed');

					redirect('customer');

					}

		}





		Public function customer_report()

	{

			if($this->session->userdata('is_logged_in'))

			{

				$data['form']=$this->customer_model->select_customer();

				$this->load->view('header');

				$this->load->view('customer_report',$data);

				$this->load->view('footer');



			}



		else

		{

				$this->session->set_flashdata('msg','Login to continue');

				redirect('login/index');

		}

	}





		Public function update_customer()

	{

		$id=$this->input->post('id');



		$data=array(

				'companyname'=>$_POST['companyname'],

				'name'=>$_POST['name'],

				'mobileno'=>$_POST['mobileno'],

				'emailid'=>$_POST['emailid'],

				'address'=>$_POST['address'],

				'state'=>$_POST['state'],

				'city'=>$_POST['city'],

				'country'=>$_POST['country'],

				'gstno'=>$_POST['gstno'],

				'pincode'=>$_POST['pincode'],

				);

			$result=$this->customer_model->update_customer($data,$id);

		

		if($result)

		{

		$this->session->set_flashdata('msg','customer Updated Successfully');

		redirect('customer/customer_report');



		}	

		else

		{

		$this->session->set_flashdata('msg1','No Changes Made');

		redirect('customer/customer_report');

		}



	}



	//Delete the item details 



	Public function delete_customer()

	{

		$result=$this->customer_model->delete_customer();

		if($result)

		{

		$this->session->set_flashdata('msg','customer Deleted Successfully');

		redirect('customer/customer_report');



		}	

		else

		{

		$this->session->set_flashdata('msg1','No Changes Made');

		redirect('customer/customer_report');

		}



	}





	 Public function get_companyname()

    {

    	$name=$this->input->post('name');

		$this->db->select("*");

		$this->db->from("customer");

		$this->db->where("companyname",$name);

			$this->db->where("status",1);

				$query=$this->db->get();

				$result=$query->result();

				

				foreach($result as $r)

				{
					$data['na']=$r->name;
					$data['address']=$r->address;

					

					$data['state']=$r->state;

					$data['city']=$r->city;

					$data['pincode']=$r->pincode;

					$data['mobileno']=$r->mobileno;

					

						}

						echo json_encode($data);



    }



      Public function get_companyname1()

    {



    	// echo"<pre>";

    	// print_r($_POST);

     	$name=$this->input->post('name');

		$this->db->select("*");

		$this->db->from("customer");

		$this->db->where("companyname",$name);

			$this->db->where("status",1);

				$query=$this->db->get();

				$result=$query->result();

				// echo"<pre>";

				// print_r($result);

				foreach($result as $r)

				{
					$data['na']=$r->name;
					$data['address']=$r->address;

					

					$data['state']=$r->state;

					$data['city']=$r->city;

					$data['pincode']=$r->pincode;

					$data['mobileno']=$r->mobileno;

					$data['gstno']=$r->gstno;

					

						}

						echo json_encode($data);

    }



Public function get_name()

{





		//$name="m";

		 $name=$this->input->post('name');



       

        $this->db->select('*');

        $this->db->from('customer');

        $this->db->like('companyname',$name);

        $this->db->where('status',1);

        $query = $this->db->get();

        $result = $query->result();

        // echo"<pre>";

        // print_r($result);



       



        $name       =  array();

        foreach ($result as $d) 

        {

		        $json_array             = array();

		        $json_array['value']    = $d->companyname;

		        $json_array['label']    = $d->companyname;

		        $name[]             = $json_array;



		         

        }



        echo json_encode($name);

	}

	Public function admin()
	{
		$data['admin']=$this->db->get('admin')->result_array();

			$this->load->view('header');
			$this->load->view('admin_profile',$data);
			$this->load->view('footer');
	}

	Public function add_admin()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$data=array('username'=>$username,
			'password'=>$password,
			'status'=>1);
			$result=$this->db->update('admin',$data);
			if($result==1)
			{
				$this->session->set_flashdata('msg','User Add Successfully');
				redirect('customer/admin');
			}
			else
			{
				$this->session->set_flashdata('msg','User Add Successfully');
				redirect('customer/admin');
			}
	}

}

	?>