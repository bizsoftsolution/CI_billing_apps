<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



	class Invoice_model extends CI_Model

	{

		function __construct()

	{

		parent::__construct();

		date_default_timezone_set('Asia/Calcutta');

	

	} 



	Public	function expenses_insert($data)

	{

		$this->db->insert('expenses',$data);

			return ($this->db->affected_rows() !=1) ? false:true;

	}



		Public function expenses_select()

		{



			$this->db->select('*');

			$this->db->from("expenses");

			$this->db->where('status',1);

			$query=$this->db->get();

			return $query->result_array();

		}



		public function search_report()

	{

		

		$name=$this->input->post('name');

		$fromdate=$this->input->post('from');

		$todate=$this->input->post('to');

			if($fromdate!='')

			{

				$datefrom=$fromdate;

			}

			else

			{

				$datefrom='';

			}



				if($todate!='')

			{

				$dateto=$todate;

			}

			else

			{

				$dateto='';

				}

			



			

	if($datefrom!='' && $dateto!='' && $name!='')//Both  

		{







			$this->db->where("status",1);

			$this->db->where("date >=",date('Y-m-d',strtotime($datefrom)));

			$this->db->where("date <=",date('Y-m-d',strtotime($dateto)));

			$this->db->where("name",$name);

			$query=$this->db->get("expenses");	

		}

		elseif($datefrom!='' && $dateto=='' && $name=='')// from date only 

		{

			$this->db->where("status",1);

			$this->db->where("date >=",date('Y-m-d',strtotime($datefrom)));	

			$query=$this->db->get("expenses");	

		}

		elseif($datefrom=='' && $dateto!='' && $name=='')//todate only

		{

			$this->db->where("status",1);			

			$this->db->where("date <=",date('Y-m-d',strtotime($dateto)));

			$query=$this->db->get("expenses");	

		}

		elseif($datefrom=='' && $dateto=='' && $name!='')//Name only

		{

			$this->db->where("status",1);			

			$this->db->where("name",$name);

			$query=$this->db->get("expenses");	

		}

		elseif($datefrom!='' && $dateto!='' && $name=='')//from and to 

		{







			$this->db->where("status",1);

			$this->db->where("date >=",date('Y-m-d',strtotime($datefrom)));

			$this->db->where("date <=",date('Y-m-d',strtotime($dateto)));			

			$query=$this->db->get("expenses");	

		}

		elseif($datefrom!='' && $dateto=='' && $name!='')//from and name 

		{







			$this->db->where("status",1);

			$this->db->where("date >=",date('Y-m-d',strtotime($datefrom)));

			$this->db->where("name",$name);

			$query=$this->db->get("expenses");	

		}

		elseif($datefrom=='' && $dateto!='' && $name!='')//to and name 

		{







			$this->db->where("status",1);			

			$this->db->where("date <=",date('Y-m-d',strtotime($dateto)));		

				$this->db->where("name",$name);	

			$query=$this->db->get("expenses");	

		}





		else

		{

		$this->db->where("status",1);

		$query=$this->db->get("expenses");

			

		}

		return $query->result_array();

	

	}









		Public function update_expenses($id,$data)

		{

			$this->db->where('id',$id);

			$this->db->update('expenses',$data);



			return $this->db->affected_rows() !=1 ? false:true;



		}

	Public 	function invoice_insert($data)

		{
			echo $this->db->insert('invoice',$data);
			return ($this->db->affected_rows() !=1) ? false:true;
		}




	public  function select($datefrom,$dateto,$name)

	{



		if($datefrom!='' && $dateto!='' && $name!='')//Both  

		{







			$this->db->where("status",1);

			$this->db->where("orderdate >=",date('Y-m-d',strtotime($datefrom)));

			$this->db->where("orderdate <=",date('Y-m-d',strtotime($dateto)));

			$this->db->where("companyname",$name);

			$query=$this->db->get("invoice");	

		}

		elseif($datefrom!='' && $dateto=='' && $name=='')// from date only 

		{

			$this->db->where("status",1);

			$this->db->where("orderdate >=",date('Y-m-d',strtotime($datefrom)));	

			$query=$this->db->get("invoice");	

		}

		elseif($datefrom=='' && $dateto!='' && $name=='')//todate only

		{

			$this->db->where("status",1);			

			$this->db->where("orderdate <=",date('Y-m-d',strtotime($dateto)));

			$query=$this->db->get("invoice");	

		}

		elseif($datefrom=='' && $dateto=='' && $name!='')//Name only

		{

			$this->db->where("status",1);			

			$this->db->where("companyname",$name);

			$query=$this->db->get("invoice");	

		}

		elseif($datefrom!='' && $dateto!='' && $name=='')//from and to 

		{


			$this->db->where("status",1);
			$this->db->where("orderdate >=",date('Y-m-d',strtotime($datefrom)));
			$this->db->where("orderdate <=",date('Y-m-d',strtotime($dateto)));			

			$query=$this->db->get("invoice");	

		}

		elseif($datefrom!='' && $dateto=='' && $name!='')//from and name 

		{







			$this->db->where("status",1);

			$this->db->where("orderdate >=",date('Y-m-d',strtotime($datefrom)));

			$this->db->where("companyname",$name);

			$query=$this->db->get("invoice");	

		}

		elseif($datefrom=='' && $dateto!='' && $name!='')//to and name 

		{







			$this->db->where("status",1);			

			$this->db->where("orderdate <=",date('Y-m-d',strtotime($dateto)));		

				$this->db->where("companyname",$name);	

			$query=$this->db->get("invoice");	

		}





		else

		{

		$this->db->where("status",1);
		$query=$this->db->get("invoice");		

		}

		return $query->result_array();

	}



	







	

		public function invoice_update($data,$id)

		{

			$this->db->where('id',$id);

			$this->db->update('invoice',$data);



			return $this->db->affected_rows() !=1 ?false:true;

		}



		public	function sales_insert()

		{
			
		$orderid=$this->input->post('orderid');

			$description=implode('|',array_filter($_POST['description']));

		$quantity=implode('|',array_filter($_POST['quantity']));

		$price=implode('|',array_filter($_POST['price']));

		$total=implode('|',array_filter($_POST['totalamount']));

		$tax=$this->input->post('tax');

		if($tax!="")

		{

			$taxs=$tax;

		}

		else

		{

			$taxs='';

		}



		$check=$this->input->post('check');

		if($check!='')

		{

			$checks=$check;

		}

		else

		{

			$checks='';

		}

		$grandtotal=$this->input->post('grandtotal');

		if($grandtotal!='')

		{

			$grandtotal=$grandtotal;

		}

		else

		{

			$grandtotal=$total;

		}



		$address2=$this->input->post('address2');

		if($address2!="")

		{

			$address_2=$address2;

		}

		else

		{

			$address_2='';

		}

		$subtotal=$this->input->post("sub_total");

		if($subtotal!='')

		{

			$sub=$subtotal;

		}

		else

		{

			$sub='';

		}



			

			$date=date('Y-m-d',strtotime($_POST['orderdate']));



	



		$data=array('orderid'=>$orderid,

			'orderdate'=>$date,

			'companyname'=>$_POST['companyname'],
			'name'=>$_POST['name'],

			'address'=>$_POST['address'],

			'address2'=>$address_2,

			'city'=>$_POST['city'],

			'state'=>$_POST['state'],

			'pincode'=>$_POST['pincode'],

			'mobileno'=>$_POST['mobileno'],

			'country'=>$_POST['country'],

			

			'gstno'=>$_POST['gstno'],			

			'check'=>$checks,

			'description'=>$description,

			'quantity'=>$quantity,

			'price'=>$price,

			'total'=>$total,

			'subtotal'=>$sub,

			'tax'=>$taxs,

			'grandtotal'=>$grandtotal,

			'status'=>1);



			$this->db->insert('sales',$data);

			return ($this->db->affected_rows() !=1) ? false:true;

		}

		Public function sales_insert2($data)
		{
			$this->db->insert('sales',$data);

			return ($this->db->affected_rows() !=1) ? false:true;
		}



	public  function select_sales()

	{

		if($datefrom!='' && $dateto!='')//Both date 

		{







			$this->db->where("status",1);

			$this->db->where("orderdate >=",date('Y-m-d',strtotime($datefrom)));

			$this->db->where("orderdate <=",date('Y-m-d',strtotime($dateto)));

			$query=$this->db->get("sales");	

		}

		elseif($datefrom!='' && $dateto=='')// from date only 

		{

			$this->db->where("status",1);

			$this->db->where("orderdate >=",date('Y-m-d',strtotime($datefrom)));	

			$query=$this->db->get("sales");	

		}

		elseif($datefrom=='' && $dateto!='')//todate only

		{

			$this->db->where("status",1);			

			$this->db->where("orderdate <=",date('Y-m-d',strtotime($dateto)));

			$query=$this->db->get("sales");	

		}

		else

		{

		$this->db->where("status",1);

		$query=$this->db->get("sales");

			

		}

		return $query->result_array();

	}

	public  function sales_report($datefrom,$dateto,$name)

	{



		if($datefrom!='' && $dateto!='' && $name!='')//Both  

		{







			$this->db->where("status",1);

			$this->db->where("orderdate >=",date('Y-m-d',strtotime($datefrom)));

			$this->db->where("orderdate <=",date('Y-m-d',strtotime($dateto)));

			$this->db->where("companyname",$name);

			$query=$this->db->get("sales");	

		}

		elseif($datefrom!='' && $dateto=='' && $name=='')// from date only 

		{

			$this->db->where("status",1);

			$this->db->where("orderdate >=",date('Y-m-d',strtotime($datefrom)));	

			$query=$this->db->get("sales");	

		}

		elseif($datefrom=='' && $dateto!='' && $name=='')//todate only

		{

			$this->db->where("status",1);			

			$this->db->where("orderdate <=",date('Y-m-d',strtotime($dateto)));

			$query=$this->db->get("sales");	

		}

		elseif($datefrom=='' && $dateto=='' && $name!='')//Name only

		{

			$this->db->where("status",1);			

			$this->db->where("companyname",$name);

			$query=$this->db->get("sales");	

		}

		elseif($datefrom!='' && $dateto!='' && $name=='')//from and to 

		{







			$this->db->where("status",1);

			$this->db->where("orderdate >=",date('Y-m-d',strtotime($datefrom)));

			$this->db->where("orderdate <=",date('Y-m-d',strtotime($dateto)));			

			$query=$this->db->get("sales");	

		}

		elseif($datefrom!='' && $dateto=='' && $name!='')//from and name 

		{







			$this->db->where("status",1);

			$this->db->where("orderdate >=",date('Y-m-d',strtotime($datefrom)));

			$this->db->where("companyname",$name);

			$query=$this->db->get("sales");	

		}

		elseif($datefrom=='' && $dateto!='' && $name!='')//to and name 

		{







			$this->db->where("status",1);			

			$this->db->where("orderdate <=",date('Y-m-d',strtotime($dateto)));		

				$this->db->where("companyname",$name);	

			$query=$this->db->get("sales");	

		}





		else

		{

		$this->db->where("status",1);

		$query=$this->db->get("sales");

			

		}

		return $query->result_array();

	}



		Public function sales_delete($id,$data)

		{

			$this->db->where('id',$id);

			$this->db->update('sales',$data);

			return $this->db->affected_rows() !=1 ? false:true;

		}

		

	public function sales_update($data,$id)

		{



			$this->db->where('id',$id);

			$this->db->update('sales',$data);



			return $this->db->affected_rows() !=1 ?false:true;

		}



		public function invoice_generate()

		{

			$this->db->select("*");

			$this->db->from("invoice");

			$this->db->limit('1');

			$this->db->order_by("id","desc");

			$this->db->where("status",1);

			$query=	$this->db->get();

			return $query->result();





		}



public function sales_bill()

		{

			$this->db->select("*");

			$this->db->from("sales");

			$this->db->limit('1');

			$this->db->order_by("id","desc");

			$this->db->where("status",1);

			$query=	$this->db->get();

			return $query->result_array();





		}

		public function sales_bills()

		{

			$this->db->select("*");

			$this->db->from("sales");

			$this->db->limit('1');

			$this->db->order_by("id","desc");

			$this->db->where("status",1);

			$query=	$this->db->get();

			return $query->result();





		}

		

		

		public  function select_expenses($datefrom,$dateto,$name)

	{



		if($datefrom!='' && $dateto!='' && $name!='')//Both  

		{







			$this->db->where("status",1);

			$this->db->where("date >=",date('Y-m-d',strtotime($datefrom)));

			$this->db->where("date <=",date('Y-m-d',strtotime($dateto)));

			$this->db->where("name",$name);

			$query=$this->db->get("expenses");	

		}

		elseif($datefrom!='' && $dateto=='' && $name=='')// from date only 

		{

			$this->db->where("status",1);

			$this->db->where("date >=",date('Y-m-d',strtotime($datefrom)));	

			$query=$this->db->get("expenses");	

		}

		elseif($datefrom=='' && $dateto!='' && $name=='')//todate only

		{

			$this->db->where("status",1);			

			$this->db->where("date <=",date('Y-m-d',strtotime($dateto)));

			$query=$this->db->get("expenses");	

		}

		elseif($datefrom=='' && $dateto=='' && $name!='')//Name only

		{

			$this->db->where("status",1);			

			$this->db->where("name",$name);

			$query=$this->db->get("expenses");	

		}

		elseif($datefrom!='' && $dateto!='' && $name=='')//from and to 

		{







			$this->db->where("status",1);

			$this->db->where("date >=",date('Y-m-d',strtotime($datefrom)));

			$this->db->where("date <=",date('Y-m-d',strtotime($dateto)));			

			$query=$this->db->get("expenses");	

		}

		elseif($datefrom!='' && $dateto=='' && $name!='')//from and name 

		{







			$this->db->where("status",1);

			$this->db->where("date >=",date('Y-m-d',strtotime($datefrom)));

			$this->db->where("name",$name);

			$query=$this->db->get("expenses");	

		}

		elseif($datefrom=='' && $dateto!='' && $name!='')//to and name 

		{







			$this->db->where("status",1);			

			$this->db->where("date <=",date('Y-m-d',strtotime($dateto)));		

				$this->db->where("name",$name);	

			$query=$this->db->get("expenses");	

		}





		else

		{

		$this->db->where("status",1);

		$query=$this->db->get("expenses");

			

		}

		return $query->result_array();

	}

Public function number()
{
		$this->db->select('*');
	$this->db->from('sales');
	$this->db->order_by('id', 'desc');
	$this->db->limit(1);
	$query=$this->db->get();
	return $query->result_array();
}
Public function number1()
{
		$this->db->select('*');
	$this->db->from('invoice');
	$this->db->order_by('id', 'desc');
	$this->db->limit(1);
	$query=$this->db->get();
	return $query->result_array();
}

}

	















































