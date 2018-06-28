<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Item_model extends CI_Model
	{
		Public function insert_item()
		{
			$data=array(
				'name'=>$_POST['name'],
				'rate'=>$_POST['rate'],
				'status'=>1
				);

			$this->db->insert('item_details',$data);
			return ($this->db->affected_rows() !=1) ? false:true;
		}

		Public function get_items()
		{
			$this->db->where('status',1);
			return $this->db->get('item_details')->result();
		}

		
		Public 	function update_item()
		{
			$data=array(
				'name'=>$_POST['name'],
				'rate'=>$_POST['rate']				
				);
			$this->db->where('id',$_POST['id']);
			$this->db->update('item_details',$data);
			return ($this->db->affected_rows() !=1) ? false:true;
		}

		Public 	function delete_item()
		{
			$data=array(
					'status'=>0			
				);
			$this->db->where('id',$_POST['id']);
			$this->db->update('item_details',$data);
			return ($this->db->affected_rows() !=1) ? false:true;
		}
}