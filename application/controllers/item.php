<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('item_model');
		
	} 

	//show  the item details  page

	Public function index()
	{
		if($this->session->userdata('is_logged_in'))
		{

		$data['items']=$this->item_model->get_items();
		$this->load->view("header",$data);
		$this->load->view('add_item');
	    $this->load->view('footer');
		}

		else
		{
		$this->session->set_flashdata('msg','Login to continue');
		redirect('login/index');
		}
		

	}

	//Insert the item details 

	Public function insert_item()
	{
		$result=$this->item_model->insert_item();
		if($result)
		{
		$this->session->set_flashdata('msg','Item Addedd Successfully');
		redirect('item');

		}	
		else
		{
		$this->session->set_flashdata('msg1','Item Adding Failed');
		redirect('item');
		}

	}

	//Update the item details 

	Public function update_item()
	{
		$result=$this->item_model->update_item();
		if($result)
		{
		$this->session->set_flashdata('msg','Item Updated Successfully');
		redirect('item');

		}	
		else
		{
		$this->session->set_flashdata('msg1','No Changes Made');
		redirect('item');
		}

	}

	//Delete the item details 

	Public function delete_item()
	{
		$result=$this->item_model->delete_item();
		if($result)
		{
		$this->session->set_flashdata('msg','Item Deleted Successfully');
		redirect('item');

		}	
		else
		{
		$this->session->set_flashdata('msg1','No Changes Made');
		redirect('item');
		}

	}


	Public function get_item_name()
	{


		//$name="m";
		 $name=$this->input->post('name');

       
        $this->db->select('*');
        $this->db->from('item_details');
        $this->db->like('name',$name);
        $this->db->where('status',1);
        $query = $this->db->get();
        $result = $query->result();

       

        $name       =  array();
        foreach ($result as $d) 
        {
		        $json_array             = array();
		        $json_array['value']    = $d->name;
		        $json_array['label']    = $d->name;
		        $name[]             = $json_array;

		         
        }

        echo json_encode($name);
	}

	Public function get_rate()
	{
	
		$name=$this->input->post('name');
		
 		$this->db->select('*');
        $this->db->from('item_details');
        $this->db->where('name',$name);
        $this->db->where('status',1);
        $query = $this->db->get();
        	$result= $query->result();
		
		

		foreach($result as $r)
		{
			$data['rate']=$r->rate;
			
		}
			 echo json_encode($data);
	 }

}