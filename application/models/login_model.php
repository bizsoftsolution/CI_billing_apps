<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{

	// public function insert($data)
	// {
	// 	$this->db->insert('ajax',$data);
	// 	return ($this->db->affected_rows()!=1) ? falsee:true;
	// }

	public function validate($username,$password)
	{
		$this->db->where('password',$password);
		$this->db->where('username',$username);
		$query=$this->db->get('admin');
		if($query->num_rows()==1)
		{
			return true;
		}
	}

	public function get($username,$password)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$query=$this->db->get();
		return $query->result();
		
		
		
		

	}

}
?>