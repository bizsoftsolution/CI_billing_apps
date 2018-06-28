

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







 <style>

 #bank,#cash,#through

 {

  display:none;

 }

 </style>

<div class="row">

   <div class="col-md-12">

          <section class="panel">

              <header class="panel-heading" align="center">

                  Add Expenses

              </header>

              <div class="panel-body">



<!-- this is start the content inside the div -->



               <form name="form" class="form-horizontal" action="<?php echo base_url();?>expenses/expenses_insert" method="post">





                 <div class="form-group">

                        <label class="control-label col-sm-2">Date</label>

                        <div class="col-sm-5">

                           <input type="text"data-provide="datepicker" type="text" data-date-format="dd-mm-yyyy" name="date"  class="form-control date" >

                      </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-sm-2">Name</label>

                        <div class="col-sm-5">

                            <input type="text" class="form-control" name="name" >

                      </div>

                    </div>

                   <div class="form-group">

                        <label class="control-label col-sm-2">Expenses By</label>

                        <div class="col-sm-5">

                            <input type="text" class="form-control" name="expensesby" >

                      </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-sm-2">Purpose</label>

                        <div class="col-sm-5">

                            <input type="text" class="form-control" name="purpose">

                      </div>

                    </div>

                     <div class="form-group">

                        

                        <div class="col-sm-5">

                                <table style="margin-left:60px">

                                <tr>

                                <th>Payment Mode</th>

                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>



                                 <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>







                                <td>

                                <input type="radio" name="pmode" id="d" value="cash"  onchange="cash()" >&nbsp;&nbsp;cash&nbsp;&nbsp;</td>

                               <td> <input type="radio" name="pmode" id="d" value="check" onchange="check()">&nbsp;&nbsp;Check&nbsp;&nbsp;</td>

                             <td> <input type="radio" name="pmode" id="d" value="banktransfer" onchange="bank()">&nbsp;&nbsp;Banktransfer</td>

                              

                               

                               

                                </tr>

                                </table>

                        </div>

                        </div>







        <div  id="through" class="form-group">

        <table style="margin-left:50px;">

        <tr>

            <th>Through Check</th>

             <td> 

                <select  name="throughcheck"  id="selectError" data-rel="chosen1" class="form-control" required>

                 

                 <option value="0">--Select--</option>

                 

                                 </select>

                                </td></tr>

                                <tr>

                                <td>&nbsp;&nbsp;&nbsp;</td>

                                </tr>

                            

                              



                          <tr>    

                             <th>Cheque No</th>

                              

                              <td>

                                <input type="text"  id="typeahead" name="chequeno" data-provide="typeahead" class="form-control">

                                

                             

                              

                              </td></tr>

                              <tr>

                               <tr>

                                <td>&nbsp;&nbsp;&nbsp;</td>

                                </tr>

             

               <th>Amount</th>

                             <td> 

                                <input type="number"   min="0" max="9999999999"  id="typeahead" name="chamount" data-provide="typeahead"  class="form-control" >

                                

                              </td>

                              </tr>

                              </table>



                              </div>

                           





                              <div  id="bank" class="form-group">

                                <label class="control-label col-sm-2" for="selectError">Bank Name</label>

                                <div class="col-sm-4">

                                  <select  name="banktransfer"  id="selectError" data-rel="chosen1" class="form-control" required>

                                   

                                   <option value="0" >--Select--</option>

                                

        </select>

          </div>

                             

                              <label class="control-label col-sm-2" for="typeahead">Amount</label>

                              <div class="col-sm-4">

                                <input type="number"   min="0" max="9999999999"  id="typeahead" name="bamount" data-provide="typeahead"  class="form-control" >

                                

                              </div>

                            </div>



















                              <div id="cash" class="form-group">

                              <label class="control-label col-sm-2" for="typeahead">Amount</label>

                              <div class="col-sm-4">

                                <input type="number"   min="0" max="9999999999"  id="typeahead" name="amount" data-provide="typeahead"  class="form-control" >

                                

                              </div>

                            </div>

                            <br>

                            <br>



                             <div class="col-sm-offset-2" style="margin-left:200px">

                             <input type="submit" name="submit" value="submit" class="btn btn-primary">

                              <input type="submit" name="submit" value="cancel" class="btn btn-danger disabled">

                             </div>



                            



                </form>

                      

                   <div class="clearfix"></div>



                  </div>

              </section>

          </div>

    



</div>



<script>

      function cash(){

        $('#bank').hide();

        $('#through').hide();

        $('#cash').show();

       

      }

      

      function check(){

        $('#bank').hide();

        $('#cash').hide();

        $('#through').show();

       

      }

      

      function bank(){

        $('#cash').hide();

        $('#through').hide();

        $('#bank').show();

       

      }

      function moneyorder(){

        $('#bank').hide();

        $('#through').hide();

        $('#cash').hide();

       

      }

    

  </script>

  <script type="text/javascript">

  

  $(document).ready(function(){

    

     $('.date').datepicker();

     

    

  });

</script>

