<link rel="stylesheet" href="<?php echo base_url();?>assets/autocomplete/jquery-ui.css"><?php $msg = $this->session->flashdata('msg'); if((isset($msg)) && (!empty($msg))) { ?><div class="alert alert-primary" >	<a href="#" class="close" data-dismiss="alert">&times;</a>	<?php print_r($msg); ?></div><?php } ?><?php $msg = $this->session->flashdata('msg1'); if((isset($msg)) && (!empty($msg))) { ?><div class="alert alert-danger" >	<a href="#" class="close" data-dismiss="alert">&times;</a>	<?php print_r($msg); ?></div><?php } ?><style type="text/css">	.modal-header	 {		background-color: #1C212E !important;		color: white !important;	}</style><div class="row">	<div class="col-md-12">		<section class="panel">			<header class="panel-heading">				<p style="margin-left:20px;">Sales Invoice Reports</p>			</header>			<div class="panel-body">				<br><br>				<!-- start search form content -->				<form name='form' method="post" action="<?php echo base_url();?>sales/sales_report">					<table>						<tr>							<td>&nbsp;&nbsp;&nbsp;</td>							<td>&nbsp;&nbsp;&nbsp;</td>							<td>&nbsp;&nbsp;&nbsp;</td>	<td>&nbsp;&nbsp;&nbsp;</td>							<td>								<input type="text" name="companyname" class="form-control" placeholder="Company Name" id="companyname" >							</td>							<td>&nbsp;&nbsp;&nbsp;</td>							<td>&nbsp;&nbsp;&nbsp;</td>							<td>&nbsp;&nbsp;&nbsp;</td>							<td>								<input type="text"data-provide="datepicker" type="text" data-date-format="dd-mm-yyyy" name="from"  class="form-control date" placeholder="From Date">							</td>							<td>&nbsp;&nbsp;&nbsp;</td>							<td>&nbsp;&nbsp;&nbsp;</td>							<td>&nbsp;&nbsp;&nbsp;</td>							<td>								<input type="text" name="to" data-provide="datepicker" type="text" data-date-format="dd-mm-yyyy"  class="form-control date" placeholder="To Date">							</td>							<td>&nbsp;&nbsp;&nbsp;</td>							<td>&nbsp;&nbsp;&nbsp;</td>							<td><input type="submit" name="submit" value="Search" class="btn btn-success"></td>						</tr>					</table>				</form>				<br><br>				<!-- End Search Content -->				<!--  view page Content -->				<table class="table table-hover table-bordered"  id="table" cellpadding="10" cellspacing="10">					<thead>						<tr class="success">							<th><strong>S.No</strong></th>							<th><strong>OrderId</strong></th>							<th><strong>OrderDate</strong></th>							<th><strong>Company Name</strong></th>							<th><strong>Gst Amount</strong></th>							<th><strong>Grand Total</strong></th>							<th><strong>Edit</strong></th>							<th><strong>View</strong></th>							<th><strong>Delete</strong></th>						</tr>					</thead>					<?php 		$i=1;					foreach($form as $r)	{						$code=base64_encode($r['id']);						echo'<tr class=""><td>'.$i++.'</td>						<td>'.$r['orderid'].'</td>						<td>'.date('d-m-Y',strtotime($r['orderdate'])).'</td>						<td>'.$r['companyname'].'</td>';						$s=$r['tax'];						if($s!="")														{							echo'<td>'.$s.'</td>';						}						else						{							echo'<td>'."0.00".'</td>';						}						echo'<td>'.$r['grandtotal'].'</td>						<td>							<button class="btn btn-primary" data-toggle="modal" onclick="get_modal('.$r['id'].')">View&nbsp;<i class="fa fa-eye">							</i></button>						</td>						<td><a href="'.base_url().'sales/edit_sales_details/'.$code.'" class="btn btn-primary" >Edit &nbsp;<i class="fa fa-pencil">						</i></button></td>						<td><a href="#delete_'.$r['id'].'" class="btn btn-danger " data-toggle="modal">Delete</a></td>					</tr>' ;					$totals[]=$r['grandtotal'];					}				?>			</table>			<br><br>			<table align="right">				<tr>					<td><b>Total :</b></td>					<td>						<?php 						if($form)						{							$total=array_sum($totals); 									echo "<b>".$total."</b>";						}						?>					</td>				</tr>			</table>			<!-- 	 closed the view page content -->			<!-- Hide the contant And Pdf than Excel Generated-->			<?php 			if($_POST)			{				?>				<form name='form' method="post" action="<?php echo base_url();?>sales/pdf_generate" target="_blank">					<table>						<tr>							<td>&nbsp;&nbsp;&nbsp;</td>							<td><input type="hidden" name="companyname" class="form-control" placeholder="Company name" value="<?php if($this->input->post('companyname')){								echo ($this->input->post('companyname'));							}?>" >						</td>						<td>&nbsp;&nbsp;&nbsp;</td>						<td><input type="hidden" name="from" id="from" class="form-control" placeholder="From Date" value="<?php if($this->input->post('from')){							echo $this->input->post('from');						}?>"></td>						<td>&nbsp;&nbsp;&nbsp;</td>						<td><input type="hidden" name="to" id="to" class="form-control" placeholder="To Date" value="<?php if($this->input->post('to')){							echo $this->input->post('to');						}?>"></td>						<td>&nbsp;&nbsp;&nbsp;</td>						<td><input type="submit" name="submit" value="Export Pdf" class="btn btn-default"></td>						<td>&nbsp;&nbsp;</td>						<td>							<a href="<?php echo base_url();?>sales/excel_generate" class="btn btn-default" target="_blank">Export Excel</a></td>						</tr>					</table>				</form>				<br>				<br>				<?php 			}			?>			<!-- End pdf And Excel Generated -->		</div>	</section></div></div><!-- Sales View --> <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="">	<div class="modal-dialog">		<div class="modal-content" style="width: 819px; height: 525px; margin: 13px 8px -13px -63px ! important;">			<div class="modal-header">				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>				<h4 class="modal-title" id="myModalLabel">View Sales</h4>			</div>			<div class="modal-body">				<div class="ajax">								</div>			</div>					</div>	</div></div><!-- modal ends --><!-- Edit Sales --> <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="">	<div class="modal-dialog">		<div class="modal-content" style="width: 1059px; height: 800px; margin: 25px 25px 0px -225px ! important;">			<div class="modal-header">				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>				<h4 class="modal-title" id="myModalLabel">Edit Sales</h4>			</div>			<div class="modal-body">				<div class="edit_ajax">								</div>			</div>					</div>	</div></div><!-- modal ends --><script type="text/javascript">	function get_modal(id)	{		$('#view').modal('show');		$.post('<?php echo base_url();?>sales/get_sales',{id:id},function (res){			$('.ajax').html(res);		});	}	function get_edit_modal(id)	{		$('#edit').modal('show');		$.post('<?php echo base_url();?>sales/get_edit_sales',{id:id},function (res){			$('.edit_ajax').html(res);		});	}</script>	<!-- Delect the invoice --><?php if(!empty($form)){	foreach ($form as $v){?>	<div class="modal fade" id="delete_<?php echo $v['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">		<div class="modal-dialog">			<div class="modal-content">				<div class="modal-header">					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>					<h4 class="modal-title" id="myModalLabel">Warning !</h4>				</div>				<div class="modal-body">					<div class="alert alert-danger" align="center">						Are you sure to delete !					</div>					<div align="center">						<form action="<?php echo base_url('sales/delete_sales');?>" method="post">							<input type="hidden" value="<?php echo $v['id'];?>" name="id">							<button type="submit" class="btn btn-primary">yes</button>							<button type="button" class="btn btn-danger" data-dismiss="modal">No</button>						</form>					</div>				</div>				<div class="modal-footer">				</div>			</div>		</div>	</div>	<?php } } ?>	<script type="text/javascript">		$(document).ready(function(){			$('#table').dataTable();		});	</script>	<script type="text/javascript">		$(document).ready(function(){			$('.date').datepicker();		});	</script>	<script src="<?php echo base_url();?>assets/autocomplete/jquery-ui.js"></script>	<script type="text/javascript">		$(document).ready(function()		{			$( "#companyname" ).autocomplete({				source: function(request, response) {					$.ajax({ 						url: "<?php echo site_url('customer/get_name'); ?>",						data: { name: $("#companyname").val()},						dataType: "json",						type: "POST",						success: function(data){              							response(data);						}    					});				},			});		});	</script>