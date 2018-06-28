



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









<div class="col-md-12">

          <section class="panel">

              <header class="panel-heading" align="center">

               Customer Details 

              </header>

              <div class="panel-body">

                         <table class="table table-hover table-bordered"  id="table" cellpadding="10" cellspacing="10">

                                 <thead>

                                   <tr class="success">

                                      <th>Sno</th>

                                      <th>Company Name</th>

                                      <th>Name</th>  

                                      <th>Mobileno</th>  

                                       <th>Address</th> 

                                        <th>Gst No</th>    

                                      <th>Edit</th>   

                                      <th>Delete</th>         

                                  </tr>          

                                </thead>

                                <?php 

                                $j=1;

                                foreach($form as $i){

                                  

                                    echo '<tr>

                                            <td>'.$j++.'</td>

                                            <td>'.$i['companyname'].'</td>

                                             <td>'.$i['name'].'</td>

                                              <td>'.$i['mobileno'].'</td>

                                               <td>'.$i['address'].'</td>

                                            <td>'.$i['gstno'].'</td>

                                            <td><a href="#edit'.$i['id'].'" data-toggle="modal" class="btn btn-primary">Edit</a></td>

                                             <td><a href="#delete'.$i['id'].'" data-toggle="modal" class="btn btn-danger">Delete</a></td>

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

  <?php foreach ($form as $v){?>

          <div class="modal fade" id="edit<?php echo $v['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

            <div class="modal-dialog">

              <div class="modal-content">

                <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  <h4 class="modal-title" id="myModalLabel">Edit Customer details </h4>

                </div>

                <div class="modal-body">                  

                 

                  

               <form name="form" class="form-horizontal" action="<?php echo base_url();?>customer/update_customer" method="post">

                    <div class="form-group">

                        <label class="control-label col-sm-2">Company Name</label>

                        <div class="col-sm-5">

                            <input type="text" class="form-control" name="companyname" required value="<?php echo $v['companyname']; ?>">

                      </div>

                    </div>

                   <div class="form-group">

                        <label class="control-label col-sm-2">Name</label>

                        <div class="col-sm-5">

                            <input type="text" class="form-control" name="name" required value="<?php echo $v['name']; ?>">

                      </div>

                    </div>  

                    <div class="form-group">

                        <label class="control-label col-sm-2">Mobileno</label>

                        <div class="col-sm-5">

                            <input type="text" class="form-control" name="mobileno" required value="<?php echo $v['mobileno']; ?>">

                      </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-sm-2">Email Id</label>

                        <div class="col-sm-5">

                            <input type="text" class="form-control" name="emailid" required value="<?php echo $v['emailid']; ?>">

                      </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-sm-2">Address</label>

                        <div class="col-sm-5">

                            <input type="text" class="form-control" name="address" required value="<?php echo $v['address']; ?>">

                      </div>

                    </div>

                    

                    <div class="form-group">

                        <label class="control-label col-sm-2">state</label>

                        <div class="col-sm-5">

                            <input type="text" class="form-control" name="state" required value="<?php echo $v['state']; ?>">

                      </div>

                    </div>

                     <div class="form-group">

                        <label class="control-label col-sm-2">City</label>

                        <div class="col-sm-5">

                            <input type="text" class="form-control" name="city" required value="<?php echo $v['city']; ?>">

                      </div>

                    </div>

                     <div class="form-group">

                        <label class="control-label col-sm-2">country</label>

                        <div class="col-sm-5">

                            <input type="text" class="form-control" name="country" required value="<?php echo $v['country']; ?>">

                      </div>

                    </div>

                     <div class="form-group">

                        <label class="control-label col-sm-2">Gst No</label>

                        <div class="col-sm-5">

                            <input type="text" class="form-control" name="gstno" required value="<?php echo $v['gstno']; ?>">

                      </div>

                    </div>

					 <div class="form-group">

                        <label class="control-label col-sm-2">Pincode</label>

                        <div class="col-sm-5">

                            <input type="text" class="form-control" name="pincode"  value="<?php echo $v['pincode']; ?>">

                      </div>

                    </div>

					



                 </div>

                <div class="modal-footer">

                    <input type="hidden"  name="id" value="<?php echo $v['id'];?>" >

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

                <?php foreach ($form as $d){?>

<div class="modal fade" id="delete<?php echo $d['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

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

            <form action="<?php echo site_url('customer/delete_customer');?>" method="post">

            <input type="hidden" value="<?php echo $d['id'];?>" name="id">

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



