<script type="text/javascript" src="<?php echo base_url();?>datepicker/jquery-1.9.1.js"></script>

<?php foreach($bill as $arr) :

if($arr->tax!="")

{?>





<table width="650" border="0" align="center" style="border-bottom:1px solid black;border-right:1px solid black; border-left:1px solid black;border-top:1px solid black; border-collapse: collapse;">

 

  <tr>

  <td width="102" align="right"><img src="<?php echo base_url();?>assets/images/logo.png" style="height: 83px;"  alt=""/></td>

  <td width="412" align="center"style="padding: 5px 0px;">

    <p style="font-weight: bold; font-size: 27px; margin-bottom: 23px;font-size:21px;"> LOGAM INDAH TRADING <stong style="font-size:14px;">(SA0187622-X)</stong>  </p>

    <p style="margin-top: -24px;"> <p style="font-size:13px;">

      N0.85, Jalan Perigi Nanas,   

      <br />

      8/10,Taman Perindustrian Pulau Indah, <br>42000 Selangor Darul Ehsan, <br> Tel : 03-31012240 Mob :016 9684040.

      <br /></p>

    <p style="margin-top: -25px;font-size:13px;margin-bottom: -24px;"> 

      <br />

     </p>

    <br>

   <small style="font-size:12px;"> Website:&nbsp;www.logamindah.com &nbsp;&nbsp;Email:&nbsp;&nbsp;logamindah@gmail.com<smaill></p></td>

    <td width="102">&nbsp;</td>

  </tr>



</table>

<table width="650" border="0" align="center"style="border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-collapse: collapse;">

  <tr>

    <td width="369" align="center"><span style="font-weight: bold;">Sales Tax Invoice&nbsp;:&nbsp;&nbsp;<?php echo $arr->orderid;?></span></td>

    

  </tr>

</table>



<table width="650" border="0" align="center" style="border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-collapse: collapse;font-size:14px;">

  <tr>

    <td width="334" align="left" style="border-right: 1px solid black;padding:3px;">To:</td>

    <td width="88" align="left"style="border-bottom: 1px solid black;padding:3px;">Date</td><td width="3"style="border-bottom: 1px solid black">:</td>

    <td width="135" align="left"style="border-bottom: 1px solid black;"><strong>

      <?php  $a=$arr->orderdate;$b=date('d/m/Y',strtotime($a));echo $b;?>

    </strong></td>

  </tr>

  <tr>

    <td rowspan="3" align="left" style="border-right: 1px solid black;"><p style="padding: 4px;"><strong ></strong><?php echo $arr->companyname;?><br><?php echo $arr->address;?><br><?php echo $arr->pincode;?> <?php echo $arr->city;?> <?php echo $arr->state;?>

	<br><b><strong style="font-size:14px;">Attn :<?php echo $arr->name;?><br>GST NO :<?php echo $arr->gstno;?></b></strong></p></td>

    <td height="22" align="left"style="border-bottom: 1px solid black;padding:3px;">Page</td>

    <td style="border-bottom: 1px solid black">:</td>

    <td align="left"style="border-bottom: 1px solid black;"><strong>1 of 1</strong></td>

  </tr>

  <tr>

    <td align="left"style="border-bottom: 1px solid black;padding:3px;">P.I.C</td>

    <td style="border-bottom: 1px solid black">:</td>

    <td align="left"style="border-bottom: 1px solid black;"><strong>SARAVANAN</strong></td>

  </tr> 

   

  <tr> 

    <td align="left"style="padding:3px;">GST No</td>

    <td>:</td>

    <td align="left"><strong>001550962688</strong></td>

  </tr>

</table>



<table width="650"height="365" border="0" align="center" style="border-bottom:1px solid black;border-right:1px solid black; border-left:1px solid black; border-collapse: collapse;font-size:13px;">

  <tr style="height:1px;">

    <td width="28" height="22" style="border-bottom:1px solid black;border-right:1px solid black;padding:3px;">No.</td>

    <td width="220" align="left"style="border-bottom:1px solid black;border-right:1px solid black;padding:3px;">Description</td>

    <td width="52" align="center"style="border-bottom:1px solid black;border-right:1px solid black;">Qty/Kg</td>

    <td width="69" align="right"style="border-bottom:1px solid black;border-right:1px solid black;padding:3px;">Price</td>

   

    <td width="59" align="right"style="border-bottom:1px solid black;border-right:1px solid black;padding:3px;">Total Excl</td>

    <td width="58" align="right"style="border-bottom:1px solid black;border-right:1px solid black;padding:3px;">GST Amt</td>

    <td width="59" align="right"style="border-bottom:1px solid black;border-right:1px solid black;padding:3px;">Total Incl</td>

    <td width="20" align="right"style="border-bottom:1px solid black;border-right:1px solid black;padding:3px;">Tax</td>

  </tr>

  <?php   $total_excl = 0; 

                         $total_gst = 0; 

                         $total_incl = 0;

                         $total_qty = 0; 



                         $i=1;

                       



                            $description=explode('|',$arr->description);

                            $quantity=explode('|',$arr->quantity);

                            $price=explode('|',$arr->price);

                            $total=explode('|',$arr->total);

                            $count=count($description);

                            

                            for ($j=0; $j < $count; $j++)

                             {

								 ?>



   

  <tr style="height:1px;">

    <td style="border-right:1px solid black;padding:3px;"><strong><?php echo $i++;?></strong></td>

    <td style="border-right:1px solid black;padding:3px;"><strong><?php echo $description[$j];?></strong></td>

    <td align="center" style="border-right:1px solid black;"><strong><?php  $data=$quantity[$j];
    echo number_format($data,2, '.', ',')."\n";?><?php echo 'Kg';?></strong></td>

    <td align="right" style="border-right:1px solid black;padding:3px;"><strong><?php echo $price[$j];?></strong></td>

    

    <td align="right"style="border-right:1px solid black;padding: 5px;padding:3px;"><strong><?php echo $total[$j];?></strong></td>

    <td align="right"style="border-right:1px solid black;padding:3px;"><strong>
    <?php $data= ($total[$j]*(6/100));
     echo number_format($data, 2, '.', ',')."\n";?></strong></td>

    <td align="right"style="border-right:1px solid black;padding:3px;"><strong><?php $data=($total[$j]+($total[$j]*(6/100)));
     echo number_format($data, 2, '.', ',')."\n";?></strong></td>

    <td align="center">NR</td>

  </tr>

							 <?php } ?>

  <tr>

    <td style="border-right:1px solid black;">&nbsp;</td>

    <td style="border-right:1px solid black;">&nbsp;</td>

    <td style="border-right:1px solid black;">&nbsp;</td>



    <td align="right" style="border-right:1px solid black;">&nbsp;</td>

    

    <td align="right"style="border-right:1px solid black;padding: 5px;">&nbsp;</td>

    <td align="right"style="border-right:1px solid black;">&nbsp;</td>

    <td align="right"style="border-right:1px solid black;">&nbsp;</td>

    <td align="center">&nbsp;</td>

  </tr>

  <tr>

    <td  style="border-right:1px solid black;">&nbsp;</td>

    <td style="border-right:1px solid black;">&nbsp;</td>

    <td style="border-right:1px solid black;">&nbsp;</td>

    <td align="right" style="border-right:1px solid black;">&nbsp;</td>

    

    <td align="right"style="border-right:1px solid black;padding: 5px;">&nbsp;</td>

    <td align="right"style="border-right:1px solid black;">&nbsp;</td>

    <td align="right"style="border-right:1px solid black;">&nbsp;</td>

    <td align="center">&nbsp;</td>

  </tr>

   <tr>

    <td  style="border-right:1px solid black;">&nbsp;</td>

    <td style="border-right:1px solid black;">&nbsp;</td>

    <td style="border-right:1px solid black;">&nbsp;</td>

    <td align="right" style="border-right:1px solid black;">&nbsp;</td>

    

    <td align="right"style="border-right:1px solid black;padding: 5px;">&nbsp;</td>

    <td align="right"style="border-right:1px solid black;">&nbsp;</td>

    <td align="right"style="border-right:1px solid black;">&nbsp;</td>

    <td align="center">&nbsp;</td>

  </tr>

  

</table>

<table width="650" border="0" align="center" style=" border-right: 1px solid rgb(0, 0, 0); border-left: 1px solid rgb(0, 0, 0); border-collapse: collapse;font-size:14px;">

  <tr>

    <td height="29" colspan="7" style="border-bottom: 1px solid black;padding:3px;">RINGGIT MALAYSIA&nbsp;:&nbsp;&nbsp;&nbsp;<b><?php echo $totals;?></b></td>

  </tr>

  <tr>

    <td width="16"style="border-bottom: 1px solid black;">&nbsp;</td>

    <td width="229" align="right"style="border-bottom: 1px solid black;">Total Kg:</td>

    <td width="45" align="center"style="border-bottom: 1px solid black;"><strong><?php  $total_qty=array_sum($quantity);
     echo number_format($total_qty,2, '.', ',')."\n";?></strong></strong></td>

    <td width="126" align="center"style="border-bottom: 1px solid black;">Total Amount Due</td>

    <td width="45" align="right"style="border-bottom: 1px solid black;"><strong><?php echo$arr->subtotal;?></strong></td>

    <td width="60" align="right"style="border-bottom: 1px solid black;"><strong><?php echo $arr->tax;?></strong></td>

     <td width="97" align="right"style="border-bottom: 1px solid black;"><strong><?php echo$arr->grandtotal;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>

  </tr>

  <tr><td height="29" colspan="7">&nbsp;</td>

  </tr>

  </table>

  <table width="650" border="0" align="center" style=" border-right: 1px solid rgb(0, 0, 0); border-left: 1px solid rgb(0, 0, 0); border-collapse: collapse;font-size:14px;">

  <tr>

    <td width="200" height="26" >&nbsp;</td>

   

    <td width="200" align="center" style="border-left: 1px solid black;border-top: 1px solid black;padding:3px;">GST Amount(RM)</td>

    <td colspan="2" align="center"style="border-right: 1px solid black;;border-top: 1px solid black;">Total Payable(RM)</td>

    <td width="25">&nbsp;</td>

  </tr>

  <tr>

  <td height="26" padding:3px; >&nbsp;</td>  

 

  <td align="center" style="border-left: 1px solid black;border-bottom: 1px solid black;"><strong><?php echo $arr->tax;?></strong></td>

  <td colspan="2" align="center" style="border-bottom: 1px solid black;;border-right: 1px solid black;"><strong><?php echo$arr->grandtotal;?></strong></td>

  <td>&nbsp;</td>

  </tr>

  <tr>

  <td>Notes:</td>

  <td>&nbsp;</td>

  <td>&nbsp;</td>

  <td>&nbsp;</td>

  </tr>

  </table>

  <table width="650" border="0" align="center" style="border-bottom: 1px solid rgb(0, 0, 0); border-right: 1px solid rgb(0, 0, 0); border-left: 1px solid rgb(0, 0, 0); border-collapse: collapse;font-size:14px;">

  <tr>

    <td width="15" height="18"style="padding:3px;">1.</td>

    <td colspan="6"style="font-size: 13px;">All cheques should be crossed and made payable to <b>LOGAM INDAH TRADING</b></td>

  </tr>

  <tr>

    <td style="padding:3px;">2.</td>

    <td colspan="3"style="font-size: 13px;">Goods sold are neither returnable not refundable</td>

    <td width="26">&nbsp;</td>

    <td width="225">&nbsp;</td>

     <td width="16">&nbsp;</td>

  </tr>

  <tr>

    <td height="79">&nbsp;</td>

    <td width="235">&nbsp;</td>

    <td width="100">&nbsp;</td>

    <td width="1">&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

     <td width="16">&nbsp;</td>

  </tr>

  <tr>

    <td height="45">&nbsp;</td>

    <td align="center" valign="baseline" style="border-top: 1px solid black;">Authorised Signature</td>

    <td>&nbsp;</td>

    <td colspan="3" align="center" valign="top"style="border-top: 1px solid black;"><p>Payment Received By &amp; I/C No.</p>

    <p style="margin-top: -17px;"><strong>(Item sold are not stolen goods)</strong></p></td>

	 <td>&nbsp;</td>

  </tr>

</table>

<?php }

else

{	?>



<table width="650" border="0" align="center" style="border-bottom:1px solid black;border-right:1px solid black; border-left:1px solid black;border-top:1px solid black; border-collapse: collapse;">

 

  <tr>

  <td width="102" align="right"><img src="<?php echo base_url();?>assets/images/logo.png" style="height: 83px;"  alt=""/></td>

  <td width="412" align="center"style="padding: 5px 0px;">

   <p style="font-weight: bold; margin-bottom: 0px;font-size:21px;">
          LOGAM INDAH TRADING<stong style="font-size:14px;">(SA0187622-X)</stong></p>		  
		 
          <p style="margin-top: -24px;"> <p style="font-size:14px;">
           N0.85, Jalan Perigi Nanas 8/10,  1   
   
     Taman Perindustrian Pulau Indah, <br>42920 Pelabuhan Klang,Selangor. <br> 
     Tel : 03-33249484 . Fax :603-3324
      9482<br />
          </p><br>
           <p style="margin-top: -22px;font-size:13px;margin-bottom: -24px;"> 
              <br />
        </p>
            
          <small style="font-size:13px;"> Website:&nbsp;www.logamindah.com &nbsp;&nbsp;Email:&nbsp;&nbsp;logamindah@gmail.com<smaill></p></td>

    <td width="102">&nbsp;</td>

  </tr>



</table>

<table width="650" border="0" align="center"style="border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-collapse: collapse;">

  <tr>

    <td width="369" align="center"><span style="font-weight: bold;">Sales Tax Invoice&nbsp;:&nbsp;&nbsp;<?php echo $arr->orderid;?></span></td>

    

  </tr>

</table>



<table width="650" border="0" align="center" style="border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; border-collapse: collapse;font-size:14px;">

  <tr>

    <td width="334" align="left" style="border-right: 1px solid black;padding:3px;">To:</td>

    <td width="88" align="left"style="border-bottom: 1px solid black;padding:3px;">Date</td><td width="3"style="border-bottom: 1px solid black">:</td>

    <td width="135" align="left"style="border-bottom: 1px solid black;"><strong>

      <?php  $a=$arr->orderdate;$b=date('d/m/Y',strtotime($a));echo $b;?>

    </strong></td>

  </tr>

  <tr>

    <td rowspan="3" align="left" style="border-right: 1px solid black;"><p style="padding: 4px;"><strong ><?php echo $arr->companyname;?><br><?php echo $arr->address;?><br><?php echo $arr->pincode;?><?php echo $arr->city;?>  <?php echo $arr->state;?><br><b><strong style="font-size:14px;">Attn :<?php echo $arr->name;?><br>

	GST NO:<?php echo $arr->gstno;?></b></strong></p></td>

    <td height="22" align="left"style="border-bottom: 1px solid black;padding:3px;">Page</td>

    <td style="border-bottom: 1px solid black">:</td>

    <td align="left"style="border-bottom: 1px solid black;"><strong>1 of 1</strong></td>

  </tr>

  <tr>

    <td align="left"style="border-bottom: 1px solid black;padding:3px;">P.I.C</td>

    <td style="border-bottom: 1px solid black">:</td>

    <td align="left"style="border-bottom: 1px solid black;"><strong>SARAVANAN</strong></td>

  </tr> 

   

  <tr> 

    <td align="left"style="padding:3px;">GST No</td>

    <td>:</td>

    <td align="left"><strong>001550962688</strong></td>

  </tr>

</table>



<table width="650"height="365" border="0" align="center" style="border-bottom:1px solid black;border-right:1px solid black; border-left:1px solid black; border-collapse: collapse;font-size:13px;">

  <tr style="height:1px;">

    <td width="28" height="22" style="border-bottom:1px solid black;border-right:1px solid black;padding:3px;">No.</td>

    <td width="220" align="left"style="border-bottom:1px solid black;border-right:1px solid black;padding:3px;">Description</td>

    <td width="52" align="center"style="border-bottom:1px solid black;border-right:1px solid black;">Qty/Kg</td>

    <td width="69" align="right"style="border-bottom:1px solid black;border-right:1px solid black;padding:3px;">Price</td>

    

    <td width="59" align="right"style="border-bottom:1px solid black;border-right:1px solid black;padding:3px;">Total Excl</td>

    <td width="58" align="right"style="border-bottom:1px solid black;border-right:1px solid black;padding:3px;">GST Amt</td>

    <td width="59" align="right"style="border-bottom:1px solid black;border-right:1px solid black;padding:3px;">Total Incl</td>

    <td width="20" align="right"style="border-bottom:1px solid black;border-right:1px solid black;padding:3px;">Tax</td>

  </tr>

  <?php   $total_excl = 0; 

                         $total_gst = 0; 

                         $total_incl = 0;

                         $total_qty = 0; 



                         $i=1;

                       



                            $description=explode('|',$arr->description);

                            $quantity=explode('|',$arr->quantity);

                            $price=explode('|',$arr->price);

                            $total=explode('|',$arr->total);

                            $count=count($description);

                            

                            for ($j=0; $j < $count; $j++)

                             {

								 ?>



   

  <tr style="height:1px;">

    <td style="border-right:1px solid black;padding:3px;"><strong><?php echo $i++;?></strong></td>

    <td style="border-right:1px solid black;padding:3px;"><strong><?php echo $description[$j];?></strong></td>

    <td align="center" style="border-right:1px solid black;"><strong><?php echo $quantity[$j];?></strong></td>

    <td align="right" style="border-right:1px solid black;padding:3px;"><strong><?php echo $price[$j];?></strong></td>

    

    <td align="right"style="border-right:1px solid black;padding: 5px;padding:3px;"><strong><?php echo $total[$j];?></strong></td>

    <td align="right"style="border-right:1px solid black;padding:3px;"><strong><?php echo "0.00";?></strong></td>

    <td align="right"style="border-right:1px solid black;padding:3px;"><strong><?php echo $total[$j];?></strong></td>

    <td align="center">NR</td>

  </tr>

							 <?php } ?>

  <tr>

    <td style="border-right:1px solid black;">&nbsp;</td>

    <td style="border-right:1px solid black;">&nbsp;</td>

    <td style="border-right:1px solid black;">&nbsp;</td>



    <td align="right" style="border-right:1px solid black;">&nbsp;</td>

    

    <td align="right"style="border-right:1px solid black;padding: 5px;">&nbsp;</td>

    <td align="right"style="border-right:1px solid black;">&nbsp;</td>

    <td align="right"style="border-right:1px solid black;">&nbsp;</td>

    <td align="center">&nbsp;</td>

  </tr>

  <tr>

    <td  style="border-right:1px solid black;">&nbsp;</td>

    <td style="border-right:1px solid black;">&nbsp;</td>

    <td style="border-right:1px solid black;">&nbsp;</td>

    <td align="right" style="border-right:1px solid black;">&nbsp;</td>

    

    <td align="right"style="border-right:1px solid black;padding: 5px;">&nbsp;</td>

    <td align="right"style="border-right:1px solid black;">&nbsp;</td>

    <td align="right"style="border-right:1px solid black;">&nbsp;</td>

    <td align="center">&nbsp;</td>

  </tr>

   <tr>

    <td  style="border-right:1px solid black;">&nbsp;</td>

    <td style="border-right:1px solid black;">&nbsp;</td>

    <td style="border-right:1px solid black;">&nbsp;</td>

    <td align="right" style="border-right:1px solid black;">&nbsp;</td>

    

    <td align="right"style="border-right:1px solid black;padding: 5px;">&nbsp;</td>

    <td align="right"style="border-right:1px solid black;">&nbsp;</td>

    <td align="right"style="border-right:1px solid black;">&nbsp;</td>

    <td align="center">&nbsp;</td>

  </tr>

  

</table>

<table width="650" border="0" align="center" style=" border-right: 1px solid rgb(0, 0, 0); border-left: 1px solid rgb(0, 0, 0); border-collapse: collapse;font-size:14px;">

  <tr>

    <td height="29" colspan="7" style="border-bottom: 1px solid black;padding:3px;">RINGGIT MALAYSIA&nbsp;:&nbsp;&nbsp;&nbsp;<b><?php echo $totals;?>Only</b></td>

  </tr>

  <tr>

    <td width="16"style="border-bottom: 1px solid black;">&nbsp;</td>

    <td width="229" align="right"style="border-bottom: 1px solid black;">Total Kg:</td>

    <td width="45" align="center"style="border-bottom: 1px solid black;"><strong><?php echo $total_qty=array_sum($quantity);?></strong></td>

    <td width="126" align="center"style="border-bottom: 1px solid black;">Total Amount Due</td>

    <td width="45" align="right"style="border-bottom: 1px solid black;"><strong><?php echo$arr->grandtotal;?></strong></td>

    <td width="60" align="right"style="border-bottom: 1px solid black;"><strong><?php echo "0.00";?></strong></td>

     <td width="97" align="right"style="border-bottom: 1px solid black;"><strong><?php echo$arr->grandtotal;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>

  </tr>

  <tr><td height="29" colspan="7">&nbsp;</td>

  </tr>

  </table>

  <table width="650" border="0" align="center" style=" border-right: 1px solid rgb(0, 0, 0); border-left: 1px solid rgb(0, 0, 0); border-collapse: collapse;font-size:14px;">

  <tr>

    <td width="200" height="26" >&nbsp;</td>

   

    <td width="200" align="center" style="border-left: 1px solid black;border-top: 1px solid black;padding:3px;">GST Amount(RM)</td>

    <td colspan="2" align="center"style="border-right: 1px solid black;;border-top: 1px solid black;">Total Payable(RM)</td>

    <td width="25">&nbsp;</td>

  </tr>

  <tr>

  <td height="26" padding:3px; >&nbsp;</td>  

 

  <td align="center" style="border-left: 1px solid black;border-bottom: 1px solid black;"><strong><?php echo "0.00";?></strong></td>

  <td colspan="2" align="center" style="border-bottom: 1px solid black;;border-right: 1px solid black;"><strong><?php echo$arr->grandtotal;?></strong></td>

  <td>&nbsp;</td>

  </tr>

  <tr>

  <td>Notes:</td>

  <td>&nbsp;</td>

  <td>&nbsp;</td>

  <td>&nbsp;</td>

  </tr>

  </table>

  <table width="650" border="0" align="center" style="border-bottom: 1px solid rgb(0, 0, 0); border-right: 1px solid rgb(0, 0, 0); border-left: 1px solid rgb(0, 0, 0); border-collapse: collapse;font-size:14px;">

  <tr>

    <td width="15" height="18"style="padding:3px;">1.</td>

    <td colspan="6"style="font-size: 13px;">All cheques should be crossed and made payable to <b>LOGAM INDAH TRADING</b></td>

  </tr>

  <tr>

    <td style="padding:3px;">2.</td>

    <td colspan="3"style="font-size: 13px;">Goods sold are neither returnable not refundable</td>

    <td width="26">&nbsp;</td>

    <td width="225">&nbsp;</td>

     <td width="16">&nbsp;</td>

  </tr>

  <tr>

    <td height="79">&nbsp;</td>

    <td width="235">&nbsp;</td>

    <td width="100">&nbsp;</td>

    <td width="1">&nbsp;</td>

    <td>&nbsp;</td>

    <td>&nbsp;</td>

     <td width="16">&nbsp;</td>

  </tr>

  <tr>

    <td height="45">&nbsp;</td>

    <td align="center" valign="baseline" style="border-top: 1px solid black;">Authorised Signature</td>

    <td>&nbsp;</td>

    <td colspan="3" align="center" valign="top"style="border-top: 1px solid black;"><p>Payment Received By &amp; I/C No.</p>

    <p style="margin-top: -17px;"><strong>(Item sold are not stolen goods)</strong></p></td>

	 <td>&nbsp;</td>

  </tr>

</table>





<?php } ?>

	<?php endforeach;?>

	







  

<script>

			      $(document).ready(function(){



window.print();



});

			   </script>

