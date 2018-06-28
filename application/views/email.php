
<script type="text/javascript" src="<?php echo base_url();?>datepicker/jquery-1.9.1.js"></script>
<table width="569" height="156" border="0" align="center" style="border-collapse: collapse;">
   <tr>
  
  <td align="center" colspan="7"style="padding: 5px 0px;">
    <span style="font-weight: bold; font-size: 27px; font-size:21px;"> LOGAM INDAH TRADING </span><br>
   <span style="font-size:13px;">
      N0.85, Jalan Perigi Nanas, 8/10,Taamn Perindustrian Pulau Indah,   
            <br>42920 Selangor Darul Ehsan.   Tel : 03-31012240.
         <br>
    Website:&nbsp;www.logamindah.com &nbsp;&nbsp;Email:&nbsp;&nbsp;logamindah@gmail.com</span></td>
    
  </tr>
 
 <?php 

  $datesfrom=$datefrom;
  $datesto=$dateto;
  
 
  if($datesfrom!="")
  {
	   $datefroms=$datesfrom;
	  
  }
  else
  {
	 $datefroms='-';
  }
  
  
  
  if($datesto!="")
  {
	  $datetos=$datesto;
	  
  }
  else
  {
	  $datetos='-';
  }
  ?>
   <?php 
  if($datesfrom!='' && $datesto !="")
  {
   echo'
  <tr>
  <td colspan="7">Report 
  From&nbsp;:&nbsp;&nbsp;<strong>'. $datefroms.'</strong>
  To&nbsp;:&nbsp;&nbsp;<strong>'. $datetos.'</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <strong>Sales Invoice Report</strong>
  </td>
  </tr>';
  }
 
 elseif($datesfrom=='' && $datesto !="")
  {
   echo'
  <tr>
  <td colspan="7">Report 
  From&nbsp;:&nbsp;&nbsp;<strong>'. $datefroms.'</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  To&nbsp;:&nbsp;&nbsp;<strong>'. $datetos.'</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <strong>Sales Invoice Report</strong>
  </td>
  </tr>';
  }
  elseif($datesfrom!='' && $datesto =="")
  {
   echo'
  <tr>
  <td colspan="7">Report 
  From&nbsp;:&nbsp;&nbsp;<strong>'. $datefroms.'</strong>&nbsp;&nbsp;&nbsp;&nbsp;
  To&nbsp;:&nbsp;&nbsp;<strong>'. $datetos.'</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <strong>Sales Invoice Report</strong>
  </td>
  </tr>';
  }
  
  
  elseif($name!='' )
  {
   echo'
  <tr>
  <td colspan="7">Company Name&nbsp;:&nbsp;&nbsp;<strong>'. $name.'</strong>&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <strong>Sales Invoice Report</strong>
  </td>
  </tr>';
  }
  
  
  
  
  else
  {
  echo'
  <tr>
  
  <td colspan="7"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All List</strong>  <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sales Invoice Report</strong></td>
  
  </tr>';
  }
  ?>
  
  <tr style="height:1px;" >
    <td width="33"  align="center" style="border-bottom:1px solid black;border-Top: 1px solid black;">S.No</td>
    <td width="76" align="center" style="border-bottom:1px solid black;border-Top: 1px solid black;">Invoice No</td>
    <td width="74" align="center" style="border-bottom:1px solid black;border-Top: 1px solid black;">Date</td>
    <td width="162" align="left" style="border-bottom:1px solid black;border-Top: 1px solid black;">Company Name</td>
    <td width="62" align="left" style="border-bottom:1px solid black; border-Top: 1px solid black;">GST No</td>
    <td width="61" align="right" style="border-bottom:1px solid black; border-Top: 1px solid black;">GST Amt</td>
    <td width="71" align="right" style="border-bottom:1px solid black; border-Top: 1px solid black;">Total Amt</td>
  </tr>
 
   <?php $count = 1;foreach($form as $row):

                       

                        ?>
  <tr >
    <td height="20"  align="center" style="font-size: 12px;"><b><?php echo $count++;?></b></td>
	 <td align="center" style="font-size: 12px;"><b><?php echo $row['orderid'];?></b></td>
    <td align="center" style="font-size: 12px;"><b><?php $a=$row['orderdate']; $b=date('d/m/Y',strtotime($a)); echo $b;?></b></td>
    <td align="left" style="font-size: 12px;"><b><?php echo $row['companyname'];?></b></td>
    <td align="left" style="font-size: 12px;"><b><?php echo $row['gstno']; ?></b></td>
    <td align="right" style="font-size: 12px;"><b><?php echo $row['tax']; ?></b></td>
    <td align="right" style="font-size: 12px;"><b><?php echo $row['grandtotal']; ?></b></td>
    
  </tr>
  <?php $tot[]=($row['grandtotal']);
		$total_amount=array_sum($tot);
		
		$tots[]=($row['tax']);
		$total_amounts=array_sum($tots);
		endforeach;?>
		
  <tr>
   
    <?php if($form){?>
	 <td height="22" colspan="6" align="right" style="border-top: 1px solid black;"><b><?php echo $total_amounts;?></b></td>
    <td  style="border-top: 1px solid black;" align="right"><b><?php echo $total_amount;?></b></td>
    <?php }?>
  </tr>
</table>
<script>
			      $(document).ready(function(){

window.print();

});
			   </script>