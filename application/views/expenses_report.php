 <div class="row">

   <div class="col-md-12">

         <section class="panel">

             <header class="panel-heading">

                <p style="margin-left:20px;">Expenses Reports</p>

             </header>

             <div class="panel-body">

             <br>

             <br>



              <form name='form' method="post" action="<?php echo base_url();?>expenses/search_report">

              <table>

	              <tr>

	              	<td>&nbsp;&nbsp;&nbsp;</td>

              		<td>&nbsp;&nbsp;&nbsp;</td>

           			<td>&nbsp;&nbsp;&nbsp;</td>	<td>&nbsp;&nbsp;&nbsp;</td>

		          	<td>

		          		<input type="text" name="name" class="form-control" placeholder="Name" >

	              	</td>

	             	<td>&nbsp;&nbsp;&nbsp;</td>

	              	<td>&nbsp;&nbsp;&nbsp;</td>

	              	<td>&nbsp;&nbsp;&nbsp;</td>

	              	<td>

	              		<input type="text"data-provide="datepicker"  data-date-format="dd-mm-yyyy" name="from"  class="form-control date" placeholder="From Date">

	              	</td>

	              	<td>&nbsp;&nbsp;&nbsp;</td>

	              	<td>&nbsp;&nbsp;&nbsp;</td>

	              	<td>&nbsp;&nbsp;&nbsp;</td>

	              	<td>

	              		<input type="text" name="to" data-provide="datepicker"  data-date-format="dd-mm-yyyy"  class="form-control date" placeholder="To Date">

	              	</td>

	              	<td>&nbsp;&nbsp;&nbsp;</td>

	              	<td>&nbsp;&nbsp;&nbsp;</td>

	              	<td><input type="submit" name="submit" value="Search" class="btn btn-success"></td>

	              </tr>

	        </table>

	      </form>

	      <br><br>

             <br><br>



	            

<!--  view page Content -->

		    <table class="table table-hover table-bordered"  id="table" cellpadding="10" cellspacing="10">

	            <thead>

					<tr class="success">

						<th><strong>S.No</strong></th>

						<th><strong>Date</strong></th>

						<th><strong>Name</strong></th>

						<th><strong>Expenses By</strong></th>

						<th><strong>Purpose</strong></th>

						<th><strong>Payment Mode</strong></th>

						<th><strong>Edit & View</strong></th>

						<th><strong>Delete</strong></th>

					</tr>

	            </thead>

	                         

	              	<?php 

	              	$i=1;

	              	foreach($select as $r)

	              	{

						echo'<tr class=""><td>'.$i++.'</td>

						

						<td>'.date('d-m-Y',strtotime($r['date'])).'</td>

						<td>'.$r['name'].'</td>

						<td>'.$r['expensesby'].'</td>

						<td>'.$r['purpose'].'</td>	              		

						<td>'.$r['pmode'].'</td>

						

						<td><a href="#h_'.$r['id'].'" class="btn btn-primary" data-toggle="modal">Edit/View</a></td>

						<td><a href="#delete_'.$r['id'].'" class="btn btn-danger " data-toggle="modal">Delete</a></td>

						</tr>' ;



						

	              	}

?>

			</table>

			<br>

			<br>

			<?php 

				if($_POST)

				{

					?>



	              <form name='form' method="post" action="<?php echo base_url();?>expenses/pdf" target="_blank">

	              <table>

	              <tr>

	             

	              

	              	<td>&nbsp;&nbsp;&nbsp;</td>

	             	<td><input type="hidden" name="name" class="form-control" placeholder=" Name" value="<?php if($this->input->post('name')){

	              		echo ($this->input->post('name'));

	              	}?>" >

	              	</td>

	              	

	             

	              	<td>&nbsp;&nbsp;&nbsp;</td>

	              	

	              		

	              			<td><input type="hidden" name="from" id="from" class="form-control" placeholder="From Date" value="<?php if($this->input->post('from')){

	              		echo $this->input->post('from');

	              	}?>"></td>

	              			<td>&nbsp;&nbsp;&nbsp;</td>

	              			

	              			<td><input type="hidden" name="to" id="to" class="form-control" placeholder="To Date" value="<?php if($this->input->post('to')){

	              		echo $this->input->post('to');

	              	}?>"></td>

	              			<td>&nbsp;&nbsp;&nbsp;</td>

	              			<td><input type="submit" name="submit" value="Export Pdf" class="btn btn-default"></td>

	              			<td>&nbsp;&nbsp;</td>

	              			<td>

	              			<a href="<?php echo base_url();?>expenses/excel" class="btn btn-default" target="_blank">Export Excel</a></td>

	              			</tr>

	              			</table>

	              			</form>

	              			<br>

	              			<br>





<?php 

}

?>

			</div>

			</section>

			</div>

		   </div>







           <!-- Modal Start The update Content --> 









<?php 

foreach($select as $s)

{

	?>

	

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal fade" id="h_<?php echo $s['id']; ?>" style="width:750px;height:650px;margin-left:310px;margin-top:20px;background-color:rgb(240, 240, 244);;" >

<form action="<?php echo base_url();?>expenses/update_expenses" method="post">



    <div class="modal-header">

        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>

        <h3 id="myModalLabel">Edit Expenses Reports</h3>

    </div>

  

    <div class="modal-body">

        <div class="widget">	

        <table>

        <tr>

        <th>Name</th>

    			

		       		<td><input type="text" name="name" class="form-control" value="<?php echo $s['name'];?>"></td>

		       		<td>&nbsp;&nbsp;&nbsp;</td>

		       		<th>Expenses By</th>

    			

		       		<td><input type="text" name="expensesby" class="form-control" value="<?php echo$s['expensesby'];?>"></td>

		      </tr>

		      <tr>

		      <tr>

		      <td>&nbsp;&nbsp;&nbsp;</td></tr>

        <th>Date</th>

    			

		       		<td><input type="text" name="date" class="form-control" value="<?php echo date('d-m-Y',strtotime($s['date']));?>"></td>

		       		<td>&nbsp;&nbsp;&nbsp;</td>

		       		<th>Purpose</th>

    			

		       		<td><input type="text" name="purpose" class="form-control" value="<?php echo $s['purpose'];?>"></td>

		      </tr>

		      <tr>

		      <td>&nbsp;&nbsp;&nbsp;</td></tr>

        <th>Throughcheck</th>

    			

		       		<td><input type="text" name="throughcheck" class="form-control" value="<?php echo $s['throughcheck'];?>"></td>

		       		<td>&nbsp;&nbsp;&nbsp;</td>

		       		<th>Chequeno</th>

    			

		       		<td><input type="text" name="chequeno" class="form-control" value="<?php echo $s['chequeno'];?>"></td>

		      </tr>

		      <tr>

		      <td>&nbsp;&nbsp;&nbsp;</td></tr>

        <th>CheCkamount</th>

    			

		       		<td><input type="number" name="chamount" class="form-control" value="<?php echo $s['checkamount'];?>"></td>

		       		<td>&nbsp;&nbsp;&nbsp;</td>

		       		<th>Banktransfer</th>

    			

		       		<td><input type="text" name="banktransfer" class="form-control" value="<?php echo $s['banktransfer'];?>"></td>

		      </tr>

		      <tr>

		      <td>&nbsp;&nbsp;&nbsp;</td></tr>

        <th>Bankamount</th>

    			

		       		<td><input type="number" name="bamount" class="form-control" value="<?php echo $s['bankamount'];?>"></td>

		       		<td>&nbsp;&nbsp;&nbsp;</td>

		       		<th>Amount</th>

    			

		       		<td><input type="number" name="amount" class="form-control" value="<?php echo $s['amount'];?>"></td>

		      </tr>

			  <tr>

		      <td>&nbsp;&nbsp;&nbsp;</td></tr>

		      <tr>

			  <th>Payment Mode</th>

			  <td><input type="text" name="pmode" class="form-control" value="<?php echo $s['pmode'];?>"></td>

			  

			  <tr>

		     

		      </table>

		      <br>

		      <br>

		      <div class="" align="center">

		      <input type="hidden" value="<?php echo $s['id'];?>" name="id">

		      	<input type="submit" name="submit"  value="submit"class='btn btn-primary'>

		      	</div>

		      	</div>

		      	</div>

		      	</form>

		      	</div>

		      

		 	<?php



								}?>





					<!-- Modal closed Update Content -->			







								<!-- Delect the invoice -->

								<?php if(!empty($select)){

                        foreach ($select as $v){?>

<div class="modal fade" id="delete_<?php echo $v['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="myModalLabel">Warning !</h4>

      </div>

      <div class="modal-body">

        <div class="alert alert-danger" align="center">

        Are you sure to delete !

        </div>

        <div align="center">

            <form action="<?php echo site_url('expenses/delete_expenses');?>" method="post">

            <input type="hidden" value="<?php echo $v['id'];?>" name="id">

            <button type="submit" class="btn btn-primary">yes</button>

            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>

            </form>

        </div>



       </div>

      <div class="modal-footer">

            

      </div>

    </div>

  </div>

</div>

<?php } } ?>

<!-- 				End Delete Content -->

















<script type="text/javascript">

	

	$(document).ready(function(){

		$('#table').dataTable();

	});

</script>

<script type="text/javascript">

	

	$(document).ready(function(){

		

		 $('.date').datepicker();

		 

		

	});

</script>