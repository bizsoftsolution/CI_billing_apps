<!-- 
<style>
table
{
	border:1px solid black;
	border-collapse: collapse;
}

	</style>
<?php foreach($form as $s)
{

	?>

<body>
<table width="611" height="500" border="1" align="center" style="margin-top:20px;" cellpadding="10" cellspacing="10">
 
  	<tr>
  		<td>
  	
   <tr>
    <td height="197" colspan="5">&nbsp;</td>
  </tr>
  
  <tr>
    <th>S.No</th>
   <th>Description</th>
   <th>Rate</th>
   <th>Quantity</th>
   <th>Amount</th>
  </tr>

  <tr>
    <?php
                  foreach($form as $vals)
                  {

                            $item_name=explode('|',$vals->description);
                            $rate=explode('|',$vals->price);
                          
                            $quantity=explode('|',$vals->quantity);
                            $amount=explode('|',$vals->total);
                                $count=count($item_name);
                            for($k=0;$k<$count;$k++)
                            {
                                $j=$k+1;

                            echo "<tr style='border:1px;'>";
                            echo "<td>".$j."</td>";        
                            echo "<td>".$item_name[$k]."</td>";
                            echo "<td>".$rate[$k]."</td>";
                            echo "<td>".$quantity[$k]."</td>";
                            echo "<td>".$amount[$k]."</td>";
                            
                            echo "</tr>";
                        }
                        
                    
                  ?>   
                  <?php
                  }
                  ?> 
  </tr>
  <tr align="center">
  <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
  <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
  <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
  <td>Grand Total</td>
  <td><?php echo  $s->grandtotal;?></td>
  </tr>
  
</table>


<?php
}
?>



 -->

 <style type="text/css">
#div
{
	border:1px solid black;
	margin-top:30px;
	width:1000px;
	height:1000px;
	text-align:center;
	}
	#d
	{
		margin-left: 10px;
	}

 </style>

<center>
 <div width="300%" height="400%" align="center" id="div" style="background-color:gray;color:white">
 
<div id="invoice_company_address">
<h1>LOGAM INTHA TRADING </h1><h5>(SA0187622-X)</h5>
<br />
<p>
N0.85, Jalan Perigi Nanas 8/10,  1
<br />
Taman Perindustrian Pulau Indah, 42920 Pelabuhan Klang,
<br />
Selangor.
<br />
Tel : 03-31012240.
</p>
</div>
 </div>
</center>
<hr style="color:white;">
<hr>