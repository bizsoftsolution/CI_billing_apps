<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('invoice_model');
	} 

	public function index()
	{
		
	 	if($this->session->userdata('is_logged_in'))
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
	 		$orderid='10000';
		}
			

		 	$data['orderid']=$orderid+1;
		 	// echo"<pre>";
		 	// print_r($data);
			
			

		$this->load->view("header");
		 $this->load->view('sales',$data);
	    $this->load->view('footer');
		}
		else
		{
				$this->session->set_flashdata('msg','Login to continue');
				redirect('login');
		}
	 }

		
	
	





	public  function sales_insert()
	{

		$cust=$this->db->get('sales')->result();


			if($cust)
			{
				foreach($cust as $c)
					$server_orderid=$c->orderid;
			}
			else
			{
				$server_orderid='10001';
			}

			/*If both are same customer id with server */
			
			if($server_orderid==$_POST['orderid'])
			{
				$customer_id=$server_orderid;
			}
			else
			{
				$customer_id=$_POST['orderid'];

			}




		$this->load->model('invoice_model');
		$description=implode('|',array_filter($_POST['description']));
		$quantity=implode('|',array_filter($_POST['quantity']));
		$price=implode('|',array_filter($_POST['price']));
		$total=implode('|',array_filter($_POST['totalamount']));

		$check=$this->input->post('check');
		if($check!='')
		{
			$checks=$check;
		}
		else
		{
			$checks='';
		}

	

		$data=array('orderid'=>$customer_id,
			'orderdate'=>date('Y-m-d',strtotime($_POST['orderdate'])),
			'companyname'=>$_POST['companyname'],
			'address'=>$_POST['address'],
			'city'=>$_POST['city'],
			'state'=>$_POST['state'],
			'pincode'=>$_POST['pincode'],
			'mobileno'=>$_POST['mobileno'],
			'country'=>$_POST['country'],
			'gstno'=>$_POST['gstno'],
			// 'pur_details'=>$_POST['pur_details'],
			'check'=>$checks,
			'description'=>$description,
			'quantity'=>$quantity,
			'price'=>$price,
			'total'=>$total,
			'status'=>1);

		
		$result=$this->invoice_model->sales_insert($data);

		
		 if($result)
		 {
		redirect('dashboard');
		 	
		}
	}


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
		$this->load->library('mpdf');

		$datefrom = $this->input->post('from')?$this->input->post('from'):'';
		$dateto = $this->input->post('to')?$this->input->post('to'):'';
		$name = $this->input->post('companyname')?$this->input->post('companyname'):'';
		$data['form']=$this->invoice_model->sales_report($datefrom,$dateto,$name);
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
		else{
		$this->session->set_flashdata('msg','Login to continue');
			redirect('login');
		}


	}

	 public function delete_sales()
    {
    	$this->db->where('id',$_POST['id']);
    	$this->db->update('invoice',array('status'=>0));
    	$result=($this->db->affected_rows()!=1)?false:true;
    	if($result)
    	{
    		$this->session->set_flashdata('msg1','Sales deleted Successfully');
    		redirect('dashboard/sales_report');
    	}
    	else
    	{
    		$this->session->set_flashdata('Msg1','Sales delete Failed ');
    		redirect('dashboard/sales_report');
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


			$description=implode('|',array_filter($_POST['description']));
		$quantity=implode('|',array_filter($_POST['quantity']));
		$price=implode('|',array_filter($_POST['price']));
		$total=implode('|',array_filter($_POST['totalamount']));
    	
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
			// 'pur_details'=>$_POST['pur_details'],
			 'check'=>$_POST['check'],
			'description'=>$description,
			'quantity'=>$quantity,
			'price'=>$price,
			'total'=>$total
			);

    
    	
				$result=$this->invoice_model->sales_update($data,$id);

    	
			    	if($result)
			    	{

			    	redirect('dashboard/sales_report');
			    	}
			    	else
			    	{
			    		redirect('dashboard/sales_report');

			    	}

		}
		else
		{
		$this->session->set_flashdata('msg','Login to continue');
		redirect('login');
		}
    }

}
?>