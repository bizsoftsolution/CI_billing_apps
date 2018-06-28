
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
						<th><strong>OrderId</strong></th>
						<th><strong>Quantity</strong></th>
						<th><strong> Amount</strong></th>

						

					</tr>

	            </thead>

	                         

	              	<?php 

	              	$i=1;

	              	foreach($form as $r)

	              	{

						echo'<tr class=""><td>'.$i++.'</td>					
						
						<td>'.$r['orderid'].'</td>
						<td>'.$r['quantity'].'</td>
						<td>'.$r['total'].'</td>			

						</tr>' ;
						$tot[]=$r['quantity'];
						$totals[]=$r['total'];

	              	}

?>

		</table>

 



	<table class="pull-right">
	<tr>

			<th><b>Total Quantity:</b></th>

				<td>

				<?php 

				if($form)

				{

				$tota=array_sum($tot);

				echo"<b>".$tota."KG</b>";

				}

				?>

				</td>

		</tr>

		<tr>

			<th><b>Total Amount:</b></th>

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