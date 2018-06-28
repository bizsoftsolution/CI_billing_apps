<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Customer_model extends CI_Model
	{

		function insert_customer($data)
		{
			$this->db->insert('customer',$data);
			return $this->db->affected_rows() !=1 ? false:true;
		}

		Public function select_customer()
		{
			$this->db->select('*');
			$this->db->from('customer');
			$this->db->where('status',1);
			$query=$this->db->get();
			return $query->result_array();
		}

		public function update_customer($data,$id)
		{
			$this->db->where('id',$id);
			$this->db->update('customer',$data);
			return ($this->db->affected_rows() !=1) ? false:true;
		}

		Public 	function delete_customer()
		{
			$data=array(
					'status'=>0			
				);
			$this->db->where('id',$_POST['id']);
			$this->db->update('customer',$data);
			return ($this->db->affected_rows() !=1) ? false:true;
		}
	}
	?>