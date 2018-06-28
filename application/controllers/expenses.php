<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expenses extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('invoice_model');
	} 

	public function index()

{
	 $this->load->view("header");
	$this->load->view('expenses');
	 $this->load->view('footer');
}

public function expenses_insert()
	{
		if($this->session->userdata('is_logged_in'))
		{

			$data=array(
						'date'=>date('Y-m-d',strtotime($_POST['date'])),
						'name'=>$_POST['name'],
						'expensesby'=>$_POST['expensesby'],
						'purpose'=>$_POST['purpose'],
						'pmode'=>$_POST['pmode'],
						'throughcheck'=>$_POST['throughcheck'],
						'chequeno'=>$_POST['chequeno'],
						'checkamount'=>$_POST['chamount'],
						'banktransfer'=>$_POST['banktransfer'],
						'bankamount'=>$_POST['bamount'],
						'amount'=>$_POST['amount'],
						'status'=>1
			);
		
			$result=$this->invoice_model->expenses_insert($data);
				//echo"<pre>";
			//print_r($result);
			

			if($result)
			{
				$this->session->set_flashdata('msg','Expenses Added Successfully');
				redirect('expenses');
			}
	}
		else
		{
				$this->session->set_flashdata('msg','Login to continue');
				redirect('login');
		}
	}


		
	Public function	expenses_report()
	{
		if($this->session->userdata('is_logged_in'))
			{
				$data['select']=$this->invoice_model->expenses_select();
				$this->load->view("header");
				$this->load->view('expenses_report',$data);
				$this->load->view('footer');


			}
		else
				{
					$this->session->set_flashdata('msg','Login to continue');
					redirect('login');
				}

	}

	public function delete_expenses()
    {
    	$this->db->where('id',$_POST['id']);
    	$this->db->update('expenses',array('status'=>0));
    	$result=($this->db->affected_rows()!=1)?false:true;
    	if($result)
    	{
    		$this->session->set_flashdata('msg1','Expenses deleted Successfully');
    		redirect('expenses/expenses_report');
    	}
    	else
    	{
    		$this->session->set_flashdata('Msg1','Expenses delete Failed ');
    		redirect('expenses/expenses_report');
    	}
    }
		Public function update_expenses()
		{
    	if($this->session->userdata('is_logged_in'))
		{
			$id=$this->input->post('id');
			$data=array(
						'date'=>date('Y-m-d',strtotime($_POST['date'])),
						'name'=>$_POST['name'],
						'expensesby'=>$_POST['expensesby'],
						'purpose'=>$_POST['purpose'],
						'pmode'=>$_POST['pmode'],
						'throughcheck'=>$_POST['throughcheck'],
						'chequeno'=>$_POST['chequeno'],
						'checkamount'=>$_POST['chamount'],
						'banktransfer'=>$_POST['banktransfer'],
						'bankamount'=>$_POST['bamount'],
						'amount'=>$_POST['amount']
						
			);
			$result=$this->invoice_model->update_expenses($id,$data);
			if($result)
			{
				$this->session->set_flashdata('msg','Expenses update Successfully');
				redirect('expenses/expenses_report');
			}
	}
		else
		{
				$this->session->set_flashdata('msg','Login to continue');
				redirect('login');
		}
	}

	Public function search_report()
	{

if($this->session->userdata('is_logged_in'))
		{
		
		
		$data['select']=$this->invoice_model->search_report();
		$this->load->view("header");
		$this->load->view('expenses_report',$data);
		$this->load->view('footer');
		  }
		else{
		$this->session->set_flashdata('msg','Login to continue');
			redirect('login');
		}
		
	}

	public function pdf()
	{
		if($this->session->userdata('is_logged_in'))
		{
		
		//$this->load->library('mpdf');
		$datefrom = $this->input->post('from')?$this->input->post('from'):'';
		$dateto = $this->input->post('to')?$this->input->post('to'):'';
		$name = $this->input->post('name')?$this->input->post('name'):'';
				$data['form']=$this->invoice_model->select_expenses($datefrom,$dateto,$name);
				$data['datefrom']=$this->input->post('from');
				$data['dateto']=$this->input->post('to');
				$data['name']=$this->input->post('name');
		$this->load->view('pdf_expenses',$data);
    	 }
		else
		{
		$this->session->set_flashdata('msg','Login to continue');
		redirect('login');
		}
	}

	Public function excel()
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
        
        $this->excel->getActiveSheet()->setCellValue('A2', 'id');
        $this->excel->getActiveSheet()->setCellValue('B2', 'date');
        $this->excel->getActiveSheet()->setCellValue('C2', 'name');
        $this->excel->getActiveSheet()->setCellValue('D2', 'phoneno');
           $this->excel->getActiveSheet()->setCellValue('E2', 'purpose');
            $this->excel->getActiveSheet()->setCellValue('F2', 'Payment Mode');
       
       
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
   
    
        $sql = "SELECT id,date,name,phoneno,purpose,pmode from expenses where  status = 1";        
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

}