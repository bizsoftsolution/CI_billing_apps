<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Purchase_invoice extends CI_Controller

{

	function __construct()

	{

		parent::__construct();

		$this->load->model('invoice_model');

		$this->load->library('mpdf');

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
              $string = $this->convert_number_to_words($numBaseUnits, false) . ' ' . $this->_dictionary["$baseUnit"];

                    
              if ($remainder) {
                        
                     //$string .= $this->_conjunction;
                 $string .= $this->convert_number_to_words($remainder, false);
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
        		   
          $string .= $this->convert_number_to_words($fraction, false);
              //add only
          $string .= $this->_only;
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




 public function view_purchase()

	 {

	 	if($this->session->userdata('is_logged_in'))

		{

      $this->db->limit(1);
			$this->db->order_by('id desc');
			$cust=$this->db->get('invoice')->result();	
			
			
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

		$this->load->view('invoice',$data);

	    $this->load->view('footer');

		}

		else{

		$this->session->set_flashdata('msg','Login to continue');

			redirect('login');

		}

	 }
	 
	 public  function invoice_update()

  {
   $id=$this->uri->segment(3);
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



      

      $date=date('Y-m-d',strtotime($_POST['orderdate']));



  



    $data=array('orderid'=>$_POST['orderid'],
      'orderdate'=>$date,
      'companyname'=>$_POST['companyname'],
      'name'=>$_POST['name'],
      'address'=>$_POST['address'], 
      'city'=>$_POST['city'],
      'state'=>$_POST['state'],
      'pincode'=>$_POST['pincode'],
      'mobileno'=>$_POST['mobileno'],
      'description'=>$description,
      'quantity'=>$quantity,
      'price'=>$price,
      'total'=>$total,
      'grandtotal'=>$grandtotal,
            'status'=>1);
      
         $this->db->where('id',$id);
          $query=$this->db->update('invoice',$data);
          $this->db->where('id',$id);
          $query1=$this->db->get('invoice');
          $result['bill']=$query1->result();
          foreach($result['bill'] as $d)
          {
            $number=$d->grandtotal;
          }

          $data =$this->convert_number_to_words($number);   
          $result['totals'] = $data;    
          


              $this->load->view('purchase_bill',$result);

  }
  
   Public function edit_purchase()
   {
    $id=$this->uri->segment(3);
    $data['sales']=$this->db->where('id',$id)->get('invoice')->result();
   
      $this->load->view("header");
      $this->load->view('edit_purchase',$data);
      $this->load->view('footer');

   }





Public function purchase_bill()

{

	$result['bill']=$this->invoice_model->invoice_generate();

	// $this->load->view('purchase_bill',$data);

	 foreach($result['bill'] as $d)

      {

        $number=$d->grandtotal;

      }

     
 			$data =$this->convert_number_to_words($number);
		     $result['totals'] = $data;
            $this->load->view('purchase_bill',$result);

}





	public  function invoice_insert()

	{

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



      

      $date=date('Y-m-d',strtotime($_POST['orderdate']));



  



    $data=array('orderid'=>$_POST['orderid'],
      'orderdate'=>$date,
      'companyname'=>$_POST['companyname'],
      'name'=>$_POST['name'],
      'address'=>$_POST['address'],    

      'city'=>$_POST['city'],
      'state'=>$_POST['state'],
      'pincode'=>$_POST['pincode'],
      'mobileno'=>$_POST['mobileno'],    

      

      'description'=>$description,
      'quantity'=>$quantity,
      'price'=>$price,
      'total'=>$total,
      'grandtotal'=>$grandtotal,

      'status'=>1);
    
		  $result=$this->db->insert('invoice',$data);
    

			$this->db->limit(1);

			$this->db->where('status',1);

			$this->db->order_by('id desc');

			$result=$this->db->get('invoice')->result();

			

		 if($result)

		 {

		 	 $this->session->set_flashdata('msg','Purchase Invoice Added Successfully');

			redirect('purchase_invoice/purchase_bill');

		 	

		}

		else

		{

			 $this->session->set_flashdata('msg','Purchase Invoice Added Failed');

		redirect('purchase_invoice/view_purchase');

		}

	}





	public function invoice_report()

	{

		if($this->session->userdata('is_logged_in'))

		{





				

				$datefrom = $this->input->post('from')?$this->input->post('from'):'';

				$dateto = $this->input->post('to')?$this->input->post('to'):'';

				$name = $this->input->post('companyname')?$this->input->post('companyname'):'';

				$data['form']=$this->invoice_model->select($datefrom,$dateto,$name);

				$this->load->view("header");

				$this->load->view('invoice_report',$data);

				$this->load->view('footer');

			

		 }

		else{

		$this->session->set_flashdata('msg','Login to continue');

			redirect('login');

		}

	}





	public function search_reports()

	{



if($this->session->userdata('is_logged_in'))

		{

		

		

		$data['form']=$this->invoice_model->search_report_model();

		$this->load->view("header");

		$this->load->view('invoice_report',$data);

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

		$this->load->model('invoice_model');

		//$this->load->library('mpdf');

		$datefrom = $this->input->post('from')?$this->input->post('from'):'';

		$dateto = $this->input->post('to')?$this->input->post('to'):'';

		$name = $this->input->post('companyname')?$this->input->post('companyname'):'';

				$data['form']=$this->invoice_model->select($datefrom,$dateto,$name);

				$data['datefrom']=$this->input->post('from');

		$data['dateto']=$this->input->post('to');

		$data['name']=$this->input->post('companyname');

		$this->load->view('pdf_generate',$data);

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

   

    

        $sql = "SELECT orderid,orderdate,companyname,address,mobileno from invoice where  status = 1";        

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



	 public function delete_invoice()

    {

    	$this->db->where('id',$_POST['id']);

		//echo"<pre>";

		//print($_POST['id']);

    	$result=$this->db->update('invoice',array('status'=>0));

    	//$result=($this->db->affected_rows()!=1)?false:true;

		//echo"<pre>";

		//print_r($resul);

		

    	

		if($result)

    	{

    		$this->session->set_flashdata('msg','Invoice deleted Successfully');

    		redirect('purchase_invoice/invoice_report');

    	}

    	else

    	{

    		$this->session->set_flashdata('msg1','Invoice delete Failed ');

    		redirect('purchase_invoice/invoice_report');

    	}

    }



    public function update_invoice()

    {

    	if($this->session->userdata('is_logged_in'))

		{

			

    	$id=$this->input->post('id');

    	



    	

		$id=$this->input->post('id');

    	$data=array('orderid'=>$_POST['orderid'],

			'orderdate'=>date('Y-m-d',strtotime($_POST['orderdate'])),

			'companyname'=>$_POST['companyname'],

			'address'=>$_POST['address'],

			'city'=>$_POST['city'],

			'state'=>$_POST['state'],

			'pincode'=>$_POST['pincode'],

			'mobileno'=>$_POST['mobileno'],

			'address2'=>$_POST['address2'],

			);



    	$result=$this->invoice_model->invoice_update($data,$id);

    	if($result)

    	{

    		$this->session->set_flashdata('msg','Purchase Invoice Update Succefully');

    		redirect('purchase_invoice/invoice_report');



    	}



    	 }

		else{

		$this->session->set_flashdata('msg','Login to continue');

			redirect('login');

		}

    }





    Public function invoice_generate()

    {

    	$data['form']=$this->invoice_model->invoice_generate();

    	$this->load->view('invoice_generate',$data);

    }

	 Public function get_companyname()

    {

    	$name=$this->input->post('name');

		$this->db->select("*");

		$this->db->from("invoice");

		$this->db->where("companyname",$name);

			$this->db->where("status",1);

				$query=$this->db->get();

				$result=$query->result();

				// echo"<pre>";

				// print_r($result);

				foreach($result as $r)

				{

					$data['address']=$r->address;

					$data['address2']=$r->address2;

					$data['state']=$r->state;

					$data['city']=$r->city;

					$data['pincode']=$r->pincode;

					$data['mobileno']=$r->mobileno;

					

						}

						echo json_encode($data);



    }

}