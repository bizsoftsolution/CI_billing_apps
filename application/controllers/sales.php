<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Sales extends CI_Controller

{

	function __construct()

	{

		parent::__construct();

		date_default_timezone_set('Asia/Calcutta');

		$this->load->model('invoice_model');
		$this->load->model('customer_model');
			$this->_hyphen      = '-';
        $this->_separator   = ', ';
        $this->_negative    = 'NEGATIVE ';
        $this->_space       = ' ';
        $this->_conjunction = ' AND ';
        $this->_decimal     = 'CENTS ';
       // $this->_rupees      = ' rupees';
        $this->_only        = ' ONLY';

        // call array of words
		$this->arr_words();     


		if($this->session->userdata('is_logged_in')=='')
		{

			$this->session->set_flashdata('msg','Login to continue');

			redirect('login');

		}      

	} 



	Public function edit_sales()

	{



	}


	function arr_words()
	{
        // array words
		$this->_dictionary   = array(
          "0"                   => 'ZERO',
          "1"                   => 'ONE',
          "2"                   => 'TWO',
          "3"                   => 'THREE',
          "4"                   => 'FOUR',
          "5"                   => 'FIVE',
          "6"                   => 'SIX',
          "7"                   => 'SEVEN',
          "8"                   => 'EIGHT',
          "9"                   => 'NINE',
          "00"                  => 'ZERO ZERO',
          "01"                  => 'ZERO ONE',
          "02"                  => 'ZERO TWO',
          "03"                  => 'ZERO THREE',
          "04"                  => 'ZERO FOUR',
          "05"                  => 'ZERO FIVE',
          "06"                  => 'ZERO SIX',
          "07"                  => 'ZERO SEVEN',
          "08"                  => 'ZERO EIGHT',
          "09"                  => 'ZERO NINE',
          "10"                  => 'TEN',
          "11"                  => 'ELEVEN',
          "12"                  => 'TWELVE',
          "13"                  => 'THIRTEEN',
          "14"                  => 'FOURTEEN',
          "15"                  => 'FIFTEEN',
          "16"                  => 'SIXTEEN',
          "17"                  => 'SEVENTEEN',
          "18"                  => 'EIGHTTEEN',
          "19"                  => 'NINETEEN',
          "20"                  => 'TWENTY',
          "30"                  => 'THIRTY',
          "40"                  => 'FOURTY',
          "50"                  => 'FIFTY',
          "60"                  => 'SIXTY',
          "70"                  => 'SEVENTY',
          "80"                  => 'EIGHTY',
          "90"                  => 'NINETY',
          "100"                 => 'HUNDRED',
          "1000"                => 'THOUSAND',
          "1000000"             => 'MILLION',
          "1000000000"          => 'BILLION',
          "1000000000000"       => 'TRILLION',
          "1000000000000000"    => 'QUADRILLION',
          "1000000000000000000" => 'QUINTILLION'
      );
   } // end function arr_words

   /**  
     * @param $number
    * @param $first
    */
   public function convert_number_to_words($number, $first=true) 
   {
       //check number is number or not
   	if (!is_numeric($number)) {
   		return false;
   	}

   	if (($number >= 0 && intval($number )< 0) || intval($number) < 0 - PHP_INT_MAX) {

          // overflow
   		trigger_error('convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING);
   		return false;
   	}

       //check number whether is negative or not
       //if it is negative then call the function with positive number
   	if ($number < 0) {
   		return $this->_negative . $this->convert_number_to_words(abs($number));
   	}
       //assign null value to variables
   	$string = $fraction = null;

       // check Decimal place in number
   	if (strpos($number, '.') !== false) {

   		list($number, $fraction) = explode('.', $number);
   	}

   	switch (true) 
   	{
   		case $number < 21:

   		$string = $this->_dictionary["$number"];
   		break;

   		case $number < 100:

   		$tens   = (intval($number / 10)) * 10;
   		$units  = $number % 10;
   		$string = $this->_dictionary["$tens"];

   		if ($units) {
   			$string .= $this->_space . $this->_dictionary["$units"];
   		}
   		break;

   		case $number < 1000:

   		$hundreds  = intval($number / 100);
   		$remainder = $number % 100;
   		$string = $this->_dictionary["$hundreds"] . ' ' .$this->_dictionary["100"];

   		if ($remainder) {
   			$string .= $this->_space . $this->convert_number_to_words($remainder, false);
   		}
   		break;

   		default:

   		$baseUnit = pow(1000, floor(log($number, 1000)));                
   		$numBaseUnits = intval($number / $baseUnit);
   		$remainder = $number % $baseUnit;

   		$string =$this->convert_number_to_words($numBaseUnits, false) . ' ' . $this->_dictionary["$baseUnit"];


   		if ($remainder) {

                     //$string .= $this->_conjunction;
   			$string .=  $this->_space.$this->convert_number_to_words($remainder, false);

   		}

   		break;
   	}

       // start - decimal place
   	if (null !== $fraction && is_numeric($fraction)) {

   		$string .=  $this->_conjunction . $this->_decimal;


        /**
         * if decimal comes 10, 20, 30 ..upto 90. 0 is removing from number.
         * suppose you were not specify decimal place with 2 digits. like 100.5, 3.9
         * so we need CONCAT 0 with number
         * it would come ten twenty..
         */
        if ($fraction < 10)


        	$fraction = $fraction . '';
       	 		// echo"<pre>";
           //     print_r($fraction);

        $string .= $this->convert_number_to_words($fraction, false);
          		// echo"<pre>";
            //    print_r($string);
              //add only
        $string .= $this->_only;

				// echo"<pre>";
    //            print_r($string);

    }
       // end  - decimal place

       //first time only this condition would execute.
       //without decimal place.
    if ($fraction === null && $first == true) {
    	$string .=  $this->_only;
    }

    return $string;

   } // end function convert_number_to_words
        // end class


   Public function edit_sales_details()
   {
   	$id=base64_decode($this->uri->segment(3));
   	$data['sales']=$this->db->where('id',$id)->get('sales')->result();
   	$this->load->view("header");
	$this->load->view('edit_sales',$data);
	$this->load->view('footer');

   }


   Public function get_edit_sales()
   {


   	$data=$this->db->where('id',$_POST['id'])->get('sales')->result_array();
   	foreach($data as $arr)

   		$html='<form name="form" method="post" action="'.base_url().'sales/sales_item">';    

   	if($arr['tax']!=""){

   		$html .='<table class="table" cellspadding="10" cellspacing="10">
   		<tr>
   			<th>S.No</th>						
   			<th>Description</th>
   			<th>Rate</th>
   			<th>Quantity</th>
   			<th>Amount</th>
   		</tr>';
   		$i=1;
   		$s=1;

   		$description=explode('|',$arr['description']);
   		$quantity=explode('|',$arr['quantity']);
   		$price=explode('|',$arr['price']);
   		$total=explode('|',$arr['total']);
   		$count=count($description);

   		for ($j=0; $j < $count; $j++) {	
   			$z=$j+1;

   			$tax=($total[$j]*(6/100));
   			$sub=($total[$j]+($total[$j]*(6/100)));

   			$html .='<tbody >
   			<script type="text/javascript">
   				$(document).ready(function(){	

   					$("#quantity'.$z.'").keyup(function(){
   						var qty=$("#quantity'.$z.'").val();//qty
   						var price=$("#price'.$z.'").val();//price
   						if(qty>0)
   						{
   							var amount=parseFloat(qty)*parseFloat(price);// qtyt * price
   							var fin=amount.toFixed(2);
   							$("#total'.$z.'").val(fin);						
   							var tot=0;
   							$("input[name^=totalamount]").each(function(){
   								tot  +=Number($(this).val());
   								var finaaa=tot.toFixed(2);
   								$("#sub_total").val(finaaa);
   								var o_tax=(parseFloat(finaaa)*6/100);
   								var gtax=o_tax.toFixed(2);
   								$("#totaltax").val(gtax)
   								var gra=parseFloat(gtax)+parseFloat(finaaa);
   								var gt=gra.toFixed(2);
   								$("#grand_total").val(gt);	
   							});
}else{
	$("#total").val(0);
}
});




});
</script>
<tr>
	<td>'.$i++.'</td>

	<td><input type="text" class="form-control" name="description[]" value="'.$description[$j].'" id="description'.$z.'" ></td>
	<td><input type="text" class="form-control" id="price'.$z.'" name="price[]" value="'.$price[$j].'"> </td>
	<td><input type="text" class="form-control" id="quantity'.$z.'" name="quantity[]" value="'.$quantity[$j].'"> </td>
	<td><input type="text" class="form-control" id="total'.$z.'" name="totalamount[]" value="'.$total[$j].'"> </td>
	<td><button type="button" class="btn btn-danger remove">Remove</button type="button"></td>

</tr>
</tbody>';
}
$html .='</table>
<div class="pull-right">
	<button type="button" class="btn btn-primary add">+ Add Row</button>
</div>
<div class="pull-right">
	<table class="pull-right">';


	if($arr['tax']!='')
	{


		$html .='<tr>
			<th>Sub Total</th>
			<td ><input type="text" name="sub_total" class="form-control" value="'.$arr['subtotal'].'" id="sub_total" readonly></td>
		</tr>
		<tr >
			<td>&nbsp;&nbsp;</td>
		</tr>
		<tr>
			<th>Tax(6%)</th>
			<td ><input type="text" name="tax" class="form-control" id="tax" value="'.$arr['tax'].'" ></td>
		</tr>
		<tr>
			<td>&nbsp;&nbsp;</td>
		</tr>
		<tr>
			<th>Adjustment</th>
			<td ><input type="text" name="" onkeyup="adj()" class="form-control" id="adj1" ></td>
			<input type="hidden" name=""  class="form-control" id="demo">      
		</tr>
		<tr >
			<td>&nbsp;&nbsp;</td>
			</tr>';



		}



		$html .='<tr>
			<th>Total Amount</th>
			<td><input type="text" name="grandtotal" class="form-control"  id="gtotal" readonly></td>
		</tr>
	</table>
</div>					
<div class="col-sm-12" align="center">
	<input type="hidden" value="'.$arr['id'].'" name="id">
	<input type="submit" name="submit" value="Print" class="btn btn-success">
	<input type="reset" class="btn btn-default"  value="Cancel">
</div> 
</form>';
}

echo $html;
}





Public function get_sales()
{

	$data=$this->db->where('id',$_POST['id'])->get('sales')->result_array();
	foreach($data as $s){


		echo $html ='<form action="'.base_url().'sales/update_sales" method="post">
		<table>
			<tr>
				<th>Order Id</th>
				<td>
					<input type="text" name="orderid" class="form-control" value="'.$s['orderid'].'">
				</td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<th>Order Date</th>
				<td>
					<input type="text" name="orderdate" class="form-control" value="'.date('d-m-Y',strtotime($s['orderdate'])).'">
				</td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;</td></tr>
				<th>Company Name</th>
				<td><input type="text" name="companyname" class="form-control" value="'.$s['companyname'].'"></td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<th>Address1</th>
				<td><input type="text" name="address" class="form-control" value="'.$s['address'].'"></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;</td></tr>
				<th>City</th>
				<td><input type="text" name="city" class="form-control" value="'.$s['city'].'"></td>
				<td>&nbsp;&nbsp;&nbsp;</td>
				<th>State</th>
				<td><input type="text" name="state" class="form-control" value="'.$s['state'].'"></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;</td></tr>
				<th>Pincode</th>
				<td><input type="text" name="pincode" class="form-control" value="'.$s['pincode'].'"></td>

				<td>&nbsp;&nbsp;&nbsp;</td>
				<th>Mobileno</th>
				<td><input type="text" name="mobileno" class="form-control" value="'.$s['mobileno'].'"></td>
			</tr>
			<tr>
				<td>&nbsp;&nbsp;&nbsp;</td></tr>
				<tr>
					
					
					
					<th>GSTNO</th>
					<td><input type="text" name="gstno" class="form-control" value="'.$s['gstno'].'"></td>
				
					<td>&nbsp;&nbsp;&nbsp;</td>
				
					<th>Country</th>
					<td><input type="text" name="country" class="form-control" value="'.$s['country'].'"></td>
					<td>&nbsp;&nbsp;&nbsp;</td>
				</tr>
			</table>
			<br><br>
			<div class="" align="center">
				<input type="hidden" value="'.$s['id'].'" name="id">
				<input type="submit" name="submit"  value="Update" class="btn btn-primary">
				<input type="reset" name="reset"  value="Cancel" class="btn btn-default">
			</div>
		</div>
	</div>
</form>';
}


}


public function view_sales()

{


			
			$this->db->limit(1);
			$this->db->order_by('id desc');
			$cust=$this->db->get('sales')->result();	
			
			
			if($cust)
		 	{
				foreach($cust as $c)
					$orderid=$c->orderid;
				
		 	}
		 	else
		 	{
	 		$orderid= '1000';
		}
			

		 	$datas=$orderid + 1;
		    $data['orderid']=$datas;
	

	$this->load->view("header");
	$this->load->view('sales',$data);
	$this->load->view('footer');



}

	Public function sales_bill()
	{

			$result['bill']=$this->invoice_model->sales_bills();
			foreach($result['bill'] as $d)
			{
			$number=$d->grandtotal;
			}


			$data =$this->convert_number_to_words($number);
			$result['totals'] = $data;        
			$this->load->view('sales_bill',$result);

	}



public  function sales_insert()

{
	if($this->uri->segment(3)!='')
	{
		$id=$this->uri->segment(3);

			if(@$_POST['print']) // print & save
		{
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

$remark=$this->input->post('remark');
$remark2=$this->input->post('remark2');
if($remark!='')
{
	$remarks=$remark;
}
else
{
	$remarks='';
}
if($remark2!='')
{
	$remarks2=$remark;
}
else
{
	$remarks2='';
}

		$data=array('orderid'=>$_POST['orderid'],
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

			$this->db->where('id',$id);
			$query=$this->db->update('sales',$data);
			$this->db->where('id',$id);
			$query1=$this->db->get('sales');
			$result['bill']=$query1->result();
			foreach($result['bill'] as $d)
			{
			$number=$d->grandtotal;
			}

			$data =$this->convert_number_to_words($number);		
			$result['totals'] = $data; 

			$this->load->view('sales_bill',$result);

		}
		else // only save 
		{
			$id=$this->uri->segment(3);
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

$remark=$this->input->post('remark');
$remark2=$this->input->post('remark2');
if($remark!='')
{
	$remarks=$remark;
}
else
{
	$remarks='';
}
if($remark2!='')
{
	$remarks2=$remark;
}
else
{
	$remarks2='';
}

		$data=array('orderid'=>$_POST['orderid'],
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

			$this->db->where('id',$id);
			$query=$this->db->update('sales',$data);
			
			$this->session->set_flashdata('msg','Sales Invoice Edit Successfully');
			redirect('sales/view_sales');
	


		}

	} 
	else // Insert the sales 
	{



		if(@$_POST['print']) // print & save
		{
			$result=$this->invoice_model->sales_insert();		
			if($result)
			{
				$this->session->set_flashdata('msg','Sales Invoice Added Successfully');
				redirect('sales/sales_bill/');
			}
			else
			{
				$this->session->set_flashdata('msg1','Sales Invoice Added Failed');
				redirect('sales/view_sales/');
			}	
		}
		else // only save 
		{
			$result=$this->invoice_model->sales_insert();
		if($result)
		{
			$this->session->set_flashdata('msg','Sales Invoice Added Successfully');
			redirect('sales/view_sales');
		}
		else
		{
			$this->session->set_flashdata('msg','Sales Invoice Added Failed');
			redirect('sales/view_sales/');
		}


		}
	}			


}




// 			public  function sales_inserts()

// {
		
// 		$result=$this->invoice_model->sales_insert2($data);
// 		if($result)
// 		{
// 			$this->session->set_flashdata('msg','Sales Invoice Added Successfully');
// 			redirect('sales/view_sales');
// 		}
// 		else
// 		{
// 			$this->session->set_flashdata('msg','Sales Invoice Added Failed');
// 			redirect('sales/view_sales/');
// 		}

// }





public function sales_report()

{

	if($this->session->userdata('is_logged_in'))

	{





		$datefrom = $this->input->post('from')?$this->input->post('from'):'';

		$dateto = $this->input->post('to')?$this->input->post('to'):'';

		$name = $this->input->post('companyname')?$this->input->post('companyname'):'';

		$data['form']=$this->invoice_model->sales_report($datefrom,$dateto,$name);

		$this->load->view("header");

		$this->load->view('sales_report',$data);

		$this->load->view('footer');

	}

	else{

		$this->session->set_flashdata('msg','Login to continue');

		redirect('login');

	}

}





public function search_report()

{



	if($this->session->userdata('is_logged_in'))

	{

		$this->load->model('invoice_model');

		$data['form']=$this->invoice_model->search_report_model1();

		$this->load->view("header");

		$this->load->view('sales_report',$data);

		$this->load->view('footer');

	}

	else{

		$this->session->set_flashdata('msg','Login to continue');

		redirect('login');

	}



}





public function pdf_generate()							

{



	if($this->session->userdata('is_logged_in'))

	{

		$this->load->model('invoice_model');

		//$this->load->library('mpdf');



		$datefrom = $this->input->post('from')?$this->input->post('from'):'';

		$dateto = $this->input->post('to')?$this->input->post('to'):'';

		$name = $this->input->post('companyname')?$this->input->post('companyname'):'';

		$data['form']=$this->invoice_model->sales_report($datefrom,$dateto,$name);

		$data['datefrom']=$this->input->post('from');

		$data['dateto']=$this->input->post('to');

		$data['name']=$this->input->post('companyname');

		//echo"<pre>";

		//print_r($data);

		

		$this->load->view('pdf',$data);

	}

	else{

		$this->session->set_flashdata('msg','Login to continue');

		redirect('login');

	}

}





Public function Excel_generate()

{



	if($this->session->userdata('is_logged_in'))

	{

		$id=$this->input->post('id');

		date_default_timezone_set('Asia/calcutta');



		$this->load->library('excel');

		$this->excel->setActiveSheetIndex(0);

        //name the worksheet

		$this->excel->getActiveSheet()->setTitle('Invoice');

        //set cell A1 content with some text

		$this->excel->getActiveSheet()->setCellValue('A1', 'Excel Sheet Generated!');



		$this->excel->getActiveSheet()->setCellValue('A2', 'orderid');

		$this->excel->getActiveSheet()->setCellValue('B2', 'orderdate');

		$this->excel->getActiveSheet()->setCellValue('C2', 'companyname');

		$this->excel->getActiveSheet()->setCellValue('D2', 'address');

		$this->excel->getActiveSheet()->setCellValue('E2', 'mobileno');





        //merge cell A1 until C1

		$this->excel->getActiveSheet()->mergeCells('A1:D1');

        //set aligment to center for that merged cell (A1 to C1)

		$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        //make the font become bold

		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);

		$this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');



		for($col = ord('A'); $col <= ord('E'); $col++){

                //set column dimension

			$this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);

         //change the font size

			$this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);



			$this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		}

        //retrive contries table data





		$sql = "SELECT orderid,orderdate,companyname,address,mobileno from sales where  status = 1";        

		$rs = $this->db->query($sql);

//        $rs = $this->db->get('countries');

		$exceldata="";

		foreach ($rs->result_array() as $row){

			$exceldata[] = $row;

		}

                //Fill data 

		$this->excel->getActiveSheet()->fromArray($exceldata, null, 'A3');



		$this->excel->getActiveSheet()->getStyle('A3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$this->excel->getActiveSheet()->getStyle('B3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$this->excel->getActiveSheet()->getStyle('C3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$this->excel->getActiveSheet()->getStyle('D3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$this->excel->getActiveSheet()->getStyle('E3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);





                $filename='invoice-'.date('d/m/y').'.xls'; //save our workbook as this file name

                header('Content-Type: application/vnd.ms-excel'); //mime type

                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name

                header('Cache-Control: max-age=0'); //no cache



                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)

                //if you want to save it as .XLSX Excel 2007 format

                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  

                //force user to download the Excel file without writing it to server's HD

                $objWriter->save('php://output');

            }

            else
            {

            	$this->session->set_flashdata('msg','Login to continue');
            	redirect('login');

            }

        }



        public function delete_sales()

        {		

        	$id=$this->input->post('id');
        	$data=array('status'=>0);		
        	$result=$this->invoice_model->sales_delete($id,$data);
        	if($result==true)
        	{
        		$this->session->set_flashdata('msg1','Sales deleted Successfully');
        		redirect('sales/sales_report');
        	}

        	else

        	{

        		$this->session->set_flashdata('Msg1','Sales delete Failed ');

        		redirect('sales/sales_report');

        	}



        }



        public function update_sales()

        {

        	if($this->session->userdata('is_logged_in'))

        	{

        		$check=$this->input->post('check');

        		if($check!='')

        		{

        			$checks=$check;

        		}

        		else

        		{

        			$checks='';

        		}









        		$id=$this->input->post('id');

        		$data=array('orderid'=>$_POST['orderid'],

        			'orderdate'=>date('Y-m-d',strtotime($_POST['orderdate'])),

        			'companyname'=>$_POST['companyname'],

        			'address'=>$_POST['address'],

        			'city'=>$_POST['city'],

        			'state'=>$_POST['state'],

        			'pincode'=>$_POST['pincode'],

        			'mobileno'=>$_POST['mobileno'],

        			'country'=>$_POST['country'],

        			'gstno'=>$_POST['gstno'],

        			'address2'=>$_POST['address2']

        			);







        		$result=$this->invoice_model->sales_update($data,$id);





        		if($result)

        		{

        			$this->session->set_flashdata('msg','Sales Invoice Update Successfully');



        			redirect('sales/sales_report');

        		}

        		else

        		{

        			$this->session->set_flashdata('msg1','Sales invoice Update Failed');

        			redirect('sales/sales_report');



        		}



        	}

        	else

        	{

        		$this->session->set_flashdata('msg','Login to continue');

        		redirect('login');

        	}

        }

        Public function get_companyname()

        {

        	$name=$this->input->post('name');

        	$this->db->select("*");

        	$this->db->from("sales");

        	$this->db->where("companyname",$name);

        	$this->db->where("status",1);

        	$query=$this->db->get();

        	$result=$query->result();



        	foreach($result as $r)

        	{

        		$data['address']=$r->address;

        		$data['address2']=$r->address2;

        		$data['state']=$r->state;

        		$data['city']=$r->city;

        		$data['pincode']=$r->pincode;

        		$data['mobileno']=$r->mobileno;

        		$data['gstno']=$r->gstno;



        	}

        	echo json_encode($data);

        }

        Public function sales_item()
        {
        	$id=$this->input->post('id');
        	$description=implode('|',array_filter($_POST['description']));

        	$quantity=implode('|',array_filter($_POST['quantity']));

        	$price=implode('|',array_filter($_POST['price']));

        	$total=implode('|',array_filter($_POST['totalamount']));
        	$grandtotal=$this->input->post('grandtotal');

        	if($grandtotal!='')			
        	{
        		$grandtotal=$grandtotal;
        	}
        	else
        	{
        		$grandtotal=$total;
        	}

        	$subtotal=$this->input->post('sub_total');
        	if($subtotal!='')
        	{
        		$sub=$subtotal;
        	}
        	else
        	{
        		$sub='';
        	}

        	$tax=$this->input->post('tax');
        	if($tax!="")
        	{
        		$taxs=$tax;
        	}
        	else
        	{
        		$taxs='';
        	}


        	$data=array(

        		'description'=>$description,

        		'quantity'=>$quantity,

        		'price'=>$price,

        		'total'=>$total,

        		'subtotal'=>$sub,

        		'tax'=>$taxs,

        		'grandtotal'=>$grandtotal

        		);
        	$this->db->where('id',$id);
        	$query=$this->db->get('sales');
        	$result=$query->result_array();


        	$this->db->where('id',$id);
        	$query=$this->db->update('sales',$data);
        	$this->db->where('id',$id);
        	$query1=$this->db->get('sales');
        	$result['bill']=$query1->result();
        	foreach($result['bill'] as $d)
        	{
        		$number=$d->grandtotal;
        	}

        	$data =$this->convert_number_to_words($number);		
        	$result['totals'] = $data; 

        	$this->load->view('sales_bill',$result);



        }

    }

    ?>