





    <?php $msg = $this->session->flashdata('msg'); if((isset($msg)) && (!empty($msg))) { ?>

                <div class="alert alert-success" >



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

              <header class="panel-heading" align="center">

                  Add Item

              </header>

              <div class="panel-body">

               <form name="form" class="form-horizontal" action="<?php echo base_url();?>item/insert_item" method="post">

                    <div class="form-group">

                        <label class="control-label col-sm-2">Name</label>

                        <div class="col-sm-5">

                            <input type="text" class="form-control" name="name" required>

                      </div>

                    </div>

                   <div class="form-group">

                        <label class="control-label col-sm-2">Rate</label>

                        <div class="col-sm-5">

                            <input type="text" class="form-control" name="rate" required>

                      </div>

                    </div>   

                       <div class="col-sm-offset-2" style="margin-left:200px">

                             <input type="submit" name="submit" value="submit" class="btn btn-primary">

                              <input type="reset"  value="cancel" class="btn btn-danger">

                             </div>                 

                    </form>

                 </div>

              </section>

          </div>



<!-- Add Item  -->



<div class="col-md-12">

          <section class="panel">

              <header class="panel-heading" align="center">

               Item Details 

              </header>

              <div class="panel-body">

                         <table class="table table-hover table-bordered"  id="table" cellpadding="10" cellspacing="10">

                                 <thead>

                                   <tr class="success">

                                      <th>Sno</th>

                                      <th>Item</th>

                                      <th>Rate</th>   

                                      <th>Edit</th>   

                                      <th>Delete</th>         

                                  </tr>          

                                </thead>

                                <?php 

                                $j=1;

                                foreach($items as $i){

                                  

                                    echo '<tr>

                                            <td>'.$j++.'</td>

                                            <td>'.$i->name.'</td>

                                            <td>'.$i->rate.'</td>

                                            <td><a href="#edit'.$i->id.'" data-toggle="modal" class="btn btn-primary">Edit</a></td>

                                             <td><a href="#delete'.$i->id.'" data-toggle="modal" class="btn btn-danger">Delete</a></td>

                                        </tr>';

                                }

                                  ?>  

                         </table>

                  </div>

              </section>

        </div>





        <!-- Item details  -->





  











    



</div>









      <!-- Edit -->

  <?php foreach ($items as $v){?>

          <div class="modal fade" id="edit<?php echo $v->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

            <div class="modal-dialog">

              <div class="modal-content">

                <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  <h4 class="modal-title" id="myModalLabel">Edit Item details </h4>

                </div>

                <div class="modal-body">                  

                 

                  

               <form name="form" class="form-horizontal" action="<?php echo base_url();?>item/update_item" method="post">

                    <div class="form-group">

                        <label class="control-label col-sm-2">Name</label>

                        <div class="col-sm-5">

                            <input type="text" class="form-control" name="name" required value="<?php echo $v->name; ?>">

                      </div>

                    </div>

                   <div class="form-group">

                        <label class="control-label col-sm-2">Rate</label>

                        <div class="col-sm-5">

                            <input type="text" class="form-control" name="rate" required value="<?php echo $v->rate; ?>">

                      </div>

                    </div>  

                 </div>

                <div class="modal-footer">

                    <input type="hidden"  name="id" value="<?php echo $v->id;?>" >

                    <input type="submit" name="submit" value="submit" class="btn btn-primary">

                    <input type="reset"  value="cancel" class="btn btn-danger">  

                </div>

                 </form>

              </div>

            </div>

          </div>

<?php }  ?>

<!--  edit-->







<!-- Delect the item -->

                <?php foreach ($items as $d){?>

<div class="modal fade" id="delete<?php echo $d->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

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

            <form action="<?php echo site_url('item/delete_item');?>" method="post">

            <input type="hidden" value="<?php echo $d->id;?>" name="id">

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

<?php } ?>

<!--        End Delete Content -->











<script type="text/javascript">

  

  $(document).ready(function(){

    $('#table').dataTable();

  });

</script>



