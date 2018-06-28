
<link rel="stylesheet" href="<?php echo base_url();?>assets/autocomplete/jquery-ui.css">



<?php $msg = $this->session->flashdata('msg'); if((isset($msg)) && (!empty($msg))) { ?>

<div class="alert alert-primary" >



	<a href="#" class="close" data-dismiss="alert">&times;</a>

	<?php print_r($msg); ?>

</div>

<?php } ?>

<?php $msg = $this->session->flashdata('msg1'); if((isset($msg)) && (!empty($msg))) { ?>

<div class="alert alert-danger" >



	<a href="#" class="close" data-dismiss="alert">&times;</a>

	<?php print_r($msg); ?>

</div>

<?php } ?>











<div class="row">

	<div class="col-md-12">

		<section class="panel">

			<header class="panel-heading">

				<p style="margin-left:20px;">Cash Purchase  Reports</p>

			</header>

			<div class="panel-body">

				<br><br>



				<!-- start search form content -->

				<form name='form' method="post" action="<?php echo base_url();?>cash_purchase/cash_search">

					<table>

						<tr>

							<td>&nbsp;&nbsp;&nbsp;</td>

							<td>&nbsp;&nbsp;&nbsp;</td>

							<td>&nbsp;&nbsp;&nbsp;</td>	<td>&nbsp;&nbsp;&nbsp;</td>

							<td>
								<input type="text" name="description" class="form-control" placeholder="Item" id="description" >


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



				<!-- End Search Content -->

				<!--  view page Content -->

				<table class="table table-hover table-bordered"  id="table" cellpadding="10" cellspacing="10">

					<thead>

						<tr class="success">
							<th><strong>S.No</strong></th>
							<th><strong>OrderDate</strong></th>
							<th><strong>OrderId</strong></th>
							<th><strong>Total Amount</strong></th>
							<th><strong>Edit</strong></th>
							
							<th><strong>Delete</strong></th>
						</tr>

					</thead>



					<?php 

					$i=1;

					foreach($form as $r)

					{

						echo'<tr class=""><td>'.$i++.'</td>
						<td>'.date('d-m-Y',strtotime($r['orderdate'])).'</td>
						<td>'.$r['orderid'].'</td>
						<td>'.$r['grandtotal'].'</td>
						<td><a href="#h_'.$r['id'].'" class="btn btn-primary" data-toggle="modal">Edit/View</a></td>
						<!---<td><a href="#g_'.$r['orderid'].'" class="btn btn-primary" data-toggle="modal">View Item</a></td>-->
						<td><a href="#delete_'.$r['id'].'" class="btn btn-danger " data-toggle="modal">Delete</a></td>
					</tr>';	

					$totals[]=$r['grandtotal'];

				}

				?>

			</table>

			<br> 	<br>



			<table class="pull-right">

				<tr>

					<th><b>Total</b></th>

					<td>

						<?php 

						if($form)

						{

							$total=array_sum($totals);

							echo"<b>".$total."</b>";

						}

						?>

					</td>

				</tr>

			</table>





		</div>

	</section>

</div>





</div>







<!-- Modal Start The update Content --> 









<?php 

foreach($form as $s)

{

	?>



	<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal fade" id="h_<?php echo $s['id']; ?>" style="width:650px;height:350px;margin-left:310px;margin-top:20px;background-color:rgb(240, 240, 244);;" >

		<form action="<?php echo base_url();?>purchase_invoice/update_invoice" method="post">



			<div class="modal-header">

				<button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>

				<h3 id="myModalLabel">Cash Purchase Reports</h3>

			</div>



			<div class="modal-body">

				<div class="widget">	

					<table>

						<tr>

							<th>Order Id</th>



							<td><input type="text" name="orderid" class="form-control" value="<?php echo $s['orderid'];?>"></td>

							<td>&nbsp;&nbsp;&nbsp;</td>

							<th>Order Date</th>



							<td><input type="text" name="orderdate" class="form-control" value="<?php echo date('d-m-Y',strtotime($s['orderdate']));?>"></td>

						</tr>



					</table>

					<br>

					<br>

					<div class="" align="center">

						<input type="hidden" value="<?php echo $s['id'];?>" name="id">

						<input type="submit" name="submit"  value="update" class='btn btn-primary'>

						<input type="reset" name="reset"  value="cancel" class='btn btn-default'>

					</div>

				</div>

			</div>

		</form>

	</div>



	<?php



}?>





<!-- Modal closed Update Content -->			







<!-- Delect the invoice -->

<?php if(!empty($form)){

	foreach ($form as $v){?>

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

						<form action="<?php echo site_url('cash_purchase/delete_cash');?>" method="post">

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







	<?php 



	//foreach ($items as $arr){?>

	<!--<div class="modal fade" id="g_<?php echo $arr['orderid'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Item Reports</h4>
				</div>
				<div class="modal-body">
					<table class="table" cellspadding="10" cellspacing="10">
						<tr>
							<th>S.No</th>
							<th>Description</th>
							<th>Rate</th>
							<th>Quantity</th>
							<th> Amount</th>
							<th>tax()</th>
							<th>Total</th>
						</tr>
						<?php $j=1;		?>

						<tbody>
							<?php foreach($items as $i) {?>
							<tr>
								<td><?php echo $j++; ?></td>
								<td><?php echo $i['description'];?> </td>
								<td><?php echo $i['price'];?> </td>
								<td><?php echo $i['quantity'];?> </td>
								<td><?php echo $i['total'];?> </td>

							</tr>
						</tbody>
						<?php  }?>
					</table>
					<div class="pull-right">
						<label>Grand Total</label>:<?php echo $arr['grandtotal'];?>
					</div>
				</div>
				<div class="modal-footer">
				</div>
			</div>
		</div>
	</div>-->
	<?php  //} ?>




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



	<script src="<?php echo base_url();?>assets/autocomplete/jquery-ui.js"></script>


	<script type="text/javascript">
		$(document).ready(function()

		{




			$( "#description" ).autocomplete({



				source: function(request, response) {

					$.ajax({ 

						url: "<?php echo site_url('item/get_item_name'); ?>",

						data: { name: $("#description").val()},

						dataType: "json",

						type: "POST",

						success: function(data){              



//alert(data);

response(data);

}    

});

				},

			});

		});



	</script>