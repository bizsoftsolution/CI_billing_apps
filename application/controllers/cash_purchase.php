<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cash_purchase extends CI_Controller

{
	function __construct()
	{
		parent::__construct();
		$this->load->model('cash_purchase_model');
	}

	Public function index()
		{

			$s=$this->cash_purchase_model->cash_view();

				@$bond_no = $s[0]['orderid'];
				if(is_null($bond_no))
				{
				$new_bond_noo = 'CP0001'; 
				}
				else
				{
				$old_bond_noo = str_split($bond_no,2);
				// echo"<pre>";
				// print_r($old_bond_noo);
				
				$va = (string)($old_bond_noo[1].$old_bond_noo[2])+1;
				// echo"<pre>";
				// print_r($va);  
				
				$bond_length = strlen($va);
					if($bond_length == 1)
					{
					$new_bond_noo = 'CP000'.$va;  
					}
					else if($bond_length == 2)
					{
					$new_bond_noo = 'CP00'.$va;	 
					}
					else if($bond_length == 3)
					{	
					$new_bond_noo = 'CP0'.$va;	  
					}
					else if($bond_length == 4)
					{	 
					$new_bond_noo = 'CP'.$va; 
					}
					else if($bond_length == 5)
					{	 
					$new_bond_noo = 'C'.$va; 
					}
				}
				$data['orderid']=$new_bond_noo;

			$this->load->view("header");
			$this->load->view('cash',$data);
			$this->load->view('footer');

		}
	Public function cash_insert()
		{
			if($this->session->userdata('is_logged_in'))
			{

					
				$result=$this->cash_purchase_model->cash_insert();
				if($result)
				{

				$this->session->set_flashdata('msg','Cash Purchase Added Successfully');
				redirect('cash_purchase');
			}

			else
			{
					$this->session->set_flashdata('msg1','Cash Purchase Adding Failed');
				redirect('cash_purchase');

			}

	}

			else
			{
					$this->session->set_flashdata('msg','Login to continue');
					redirect('login');
			}
			
		}

		public function cash_select()

	{

		if($this->session->userdata('is_logged_in'))

		{

				
				$data['form']=$this->cash_purchase_model->report();
				$data['items']=$this->cash_purchase_model->item_report();
				$this->load->view("header");
				$this->load->view('cash_reports',$data);
				$this->load->view('footer');

			

		 }

		else{

		$this->session->set_flashdata('msg','Login to continue');

			redirect('login');

		}

	}
	public function cash_search()

	{

		if($this->session->userdata('is_logged_in'))

		{


				$datefrom = $this->input->post('from')?$this->input->post('from'):'';
				$dateto = $this->input->post('to')?$this->input->post('to'):'';
				$name = $this->input->post('description')?$this->input->post('description'):'';
				$data['form']=$this->cash_purchase_model->select($datefrom,$dateto,$name);
				$this->load->view("header");
				$this->load->view('cash_search',$data);
				$this->load->view('footer');

			

		 }

		else{

		$this->session->set_flashdata('msg','Login to continue');

			redirect('login');

		}

	}
	Public function delete_cash()
	{
		if($this->session->userdata('is_logged_in'))

		{
			$id=$this->input->post('id');
			$result=$this->cash_purchase_model->delete($id);
			if($result==true)
			{
				$this->session->set_flashdata('msg','Cash Purchase Delete Successfully');
				redirect('cash_purchase/cash_select');
			}

		}

		else{

		$this->session->set_flashdata('msg','Login to continue');

			redirect('login');

		}

	}
}


	

