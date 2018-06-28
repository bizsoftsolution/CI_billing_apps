<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cash_purchase_model extends CI_Model

{
	Public function cash_insert()
	{

$date=date('Y-m-d',strtotime($_POST['orderdate']));
		  $count = count($_POST['description']);
        
        for($i = 0; $i<$count; $i++){
            
            $entries[] = array(
					'orderid'=>$_POST['orderid'],
					'orderdate'=>$date,
					'description'=>$_POST['description'][$i],
					'quantity'=>$_POST['quantity'][$i],
					'price'=>$_POST['price'][$i],
					'total'=>$_POST['totalamount'][$i],
                'grandtotal'=>$_POST['grandtotal'],
				'status'=>1
                );

        }        

        $this->db->insert_batch('cash',$entries);		
		return true;

	}
	Public function cash_view()
	{
		$this->db->select('*');
		$this->db->from('cash');
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$query=$this->db->get();
		return $query->result_array();

	}

	public function item_report()
	{
		return $this->db->where('status',1)->get('cash')->result_array();


	}
	Public function report()
	{
		
	return $this->db->where('status',1)
					->group_by('orderid')
					->order_by('id desc')
					->get('cash')->result_array();
	
	}
	Public function select($datefrom,$dateto,$name)
	{
		if($datefrom!='' && $dateto!='' && $name!='')//Both  

		{
			$this->db->where("status",1);
			$this->db->where("orderdate >=",date('Y-m-d',strtotime($datefrom)));
			$this->db->where("orderdate <=",date('Y-m-d',strtotime($dateto)));
			$this->db->like("description",$name);
			$query=$this->db->get("cash");	

		}
		elseif($datefrom!='' && $dateto=='' && $name=='')// from date only 
		{
			$this->db->where("status",1);
			$this->db->where("orderdate >=",date('Y-m-d',strtotime($datefrom)));
			$query=$this->db->get("cash");	

		}
		elseif($datefrom=='' && $dateto!='' && $name=='')//todate only
		{

			$this->db->where("status",1);
			$this->db->where("orderdate <=",date('Y-m-d',strtotime($dateto)));
			$query=$this->db->get("cash");

		}

		elseif($datefrom=='' && $dateto=='' && $name!='')//Name only

		{
			$this->db->where("status",1);
			$this->db->like("description",$name);

			$query=$this->db->get("cash");	

		}

		elseif($datefrom!='' && $dateto!='' && $name=='')//from and to 

		{
			$this->db->where("status",1);
			$this->db->where("orderdate >=",date('Y-m-d',strtotime($datefrom)));
			$this->db->where("orderdate <=",date('Y-m-d',strtotime($dateto)));
			$query=$this->db->get("cash");	

		}

		elseif($datefrom!='' && $dateto=='' && $name!='')//from and name 

		{
			$this->db->where("status",1);
			$this->db->where("orderdate >=",date('Y-m-d',strtotime($datefrom)));
			$this->db->like("description",$name);
			$query=$this->db->get("cash");	

		}

		elseif($datefrom=='' && $dateto!='' && $name!='')//to and name 
		{
			$this->db->where("status",1);
			$this->db->where("orderdate <=",date('Y-m-d',strtotime($dateto)));	
			$this->db->like("description",$name);
			$query=$this->db->get("cash");	

		}
		else
		{

		$this->db->where("status",1);
		$query=$this->db->get("cash");

		}

		return $query->result_array();

	}
	Public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('cash');
		return $this->db->affected_rows() !=1 ? false:true;

	}
}
?>