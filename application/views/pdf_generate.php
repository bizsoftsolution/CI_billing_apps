<script type="text/javascript" src="<?php echo base_url();?>datepicker/jquery-1.9.1.js"></script>
<table width="516" height="156" border="0" align="center" style="border-collapse: collapse;">
   <tr>
  
  <td align="center" colspan="5"style="padding: 5px 0px;">
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
  ?>
  <tr>
  <td colspan="5">Report 
  From&nbsp;:&nbsp;&nbsp;<strong><?php echo $datefroms;?></strong>
  To&nbsp;:&nbsp;&nbsp;<strong><?php echo $datetos;?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <strong>Purchase Invoice Report</strong>
  </td>
  </tr>
  <?php
  }
 
 elseif($datesfrom=='' && $datesto !="")
  {
  ?>
  <tr>
  <td colspan="5">Report 
  From&nbsp;:&nbsp;&nbsp;<strong><?php echo $datefroms;?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  To&nbsp;:&nbsp;&nbsp;<strong><?php echo $datetos;?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <strong>Purchase Invoice Report</strong>
  </td>
  </tr>
  <?php
  }
  elseif($datesfrom!='' && $datesto =="")
  {
  ?>
  <tr>
  <td colspan="5">Report 
  From&nbsp;:&nbsp;&nbsp;<strong><?php echo $datefroms;?></strong>&nbsp;&nbsp;&nbsp;&nbsp;
  To&nbsp;:&nbsp;&nbsp;<strong><?php echo $datetos;?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <strong>Purchase Invoice Report</strong>
  </td>
  </tr>
  <?php
  }
  
  elseif($name!='' )
  {
  ?>
  <tr>
  <td colspan="5">Company Name&nbsp;:&nbsp;&nbsp;<strong><?php echo $name;?></strong>&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <strong>Purchase Invoice Report</strong>
  </td>
  </tr>
  <?php
  }
  
  else
  {
 ?>
  <tr>
  
  <td colspan="5"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All List</strong>  <strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Purchase Invoice Report</strong></td>
  
  </tr>
  <?php
  }
  ?>
 
  <tr style="height:1px;" >
    <td width="43"  align="center" style="border-bottom:1px solid black;border-Top: 1px solid black;">S.No</td>
    <td width="99" align="center" style="border-bottom:1px solid black;border-Top: 1px solid black;">Invoice No</td>
    <td width="96" align="center" style="border-bottom:1px solid black;border-Top: 1px solid black;">Date</td>
    <td width="177" align="left" style="border-bottom:1px solid black;border-Top: 1px solid black;">Company Name</td>
    
    <td width="79" align="right" style="border-bottom:1px solid black; border-Top: 1px solid black;">Total Amt</td>
  </tr>
 
   <?php $count = 1;foreach($form as $row):

                       

                        ?>
  <tr >
    <td height="20"  align="center" style="font-size: 12px;"><b><?php echo $count++;?></b></td>
	 <td align="center" style="font-size: 12px;"><b><?php echo $row['orderid'];?></b></td>
    <td align="center" style="font-size: 12px;"><b><?php $a=$row['orderdate']; $b=date('d/m/Y',strtotime($a)); echo $b;?></b></td>
    <td align="left" style="font-size: 12px;"><b><?php echo $row['companyname'];?></b></td>
   
    <td align="right" style="font-size: 12px;"><b><?php echo $row['grandtotal']; ?></b></td>
    
  </tr>
  <?php $tot[]=($row['grandtotal']);
		$total_amount=array_sum($tot);
		
		$tots[]=($row['tax']);
		$total_amounts=array_sum($tots);
		endforeach;?>
		
  <tr>
   
    <?php if($form){?>
	 <td height="22" colspan="4" align="right" style="border-top: 1px solid black;"><b></b></td>
    <td  style="border-top: 1px solid black;" align="right"><b><?php echo $total_amount;?></b></td>
    <?php }?>
  </tr>
</table>
<script>
			      $(document).ready(function(){

window.print();

});
			   </script>