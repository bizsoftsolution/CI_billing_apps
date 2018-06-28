
		  

<script>
$(function(){

  //alert("ok")
        // $("#to").datepicker({ dateFormat: 'yy-mm-dd' });
       
    });

 </script> 


 <style>
 #bank,#cash,#through
 {
  display:none;
 }
 </style>
<div class="row">
   <div class="col-lg-6">
          <section class="panel">
              <header class="panel-heading" align="center">
                  Add Expenses
              </header>
              <div class="panel-body">

<!-- this is start the content inside the div -->

               <form name="form" class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2">Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="name" Placeholder="Name">
                      </div>
                    </div>
                   <div class="form-group">
                        <label class="control-label col-sm-2">PhoneNo</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="phoneno" >
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
                <select  name="thceck"  id="selectError" data-rel="chosen1" class="form-control" required>
                 
                 <option value="0">--Select--</option>
                 <option value="FEDERAL BANKLTD">FEDERAL BANK LTD</option>
        <option value="HDFC BANK">HDFC BANK</option>
        <option value="ICICI BANK">ICICI BANK</option>
        <option value="KARUR VYSYA BANK">KARUR VYSYA BANK</option>
        <option value="KOTAK MAHINDRA">KOTAK MAHINDRA</option>
        <option value="ING VYSYA">ING VYSYA</option>
        <option value="SOUTH INDIAN">SOUTH INDIAN</option>                                          <option value="BANK OF AMERICA">BANK OF AMERICA</option>
        <option value="CITI BANK">CITI BANK</option>
        <option value="HSBC BANK">HSBC BANK</option>
        <option value="UNITED BANK OF INDIAN">UNITED BANK OF INDIAN</option>
        <option value="BANK OF BARODA">BANK OF BARODA</option>
        <option value="CANARA BANK">CANARA BANK</option>
        <option value="CORPORATION BANK">CORPORATION BANK</option>
        <option value="SYNDICATE">SYNDICATE</option>
        <option value="ANDHRA BANK">ANDHRA BANK</option>
        <option value="BANK OF INDIA">BANK OF INDIA</option>
        <option value="CENTRAL BANK OF INDIA">CENTRAL BANK OF INDIA</option>
        <option value="UCO BANK">UCO BANK</option>
        <option value="UNION BANK OF INDIA">UNION BANK OF INDIA</option>
        <option value="UNITED BANK OF INDIA">UNITED BANK OF INDIA</option>
        <option value="STATE BANK OF HYDRABAD">STATE BANK OF HYDRABAD</option>
        <option value="CATHOLIC SYRIAN BANK">Catholic Syrian Bank</option>
        <option value="INDIAN BANK">INDIANBANK</option>
        <option value="INDIAN OVERSEAS">INDIANOVERSEAS</option>
        <option value="AXIS">AXIS</option>
        <option value="TAMILNADU MERCHANTILE">TAMILNADUMERCHANTILE</option>
        <option value="STATE BANK OF INDIA">STATEBANKOFINDIA</option>
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
                                   <option value="FEDERAL BANKLTD">FEDERAL BANK LTD</option>
        <option value="HDFC BANK">HDFC BANK</option>
        <option value="ICICI BANK">ICICI BANK</option>
        <option value="KARUR VYSYA BANK">KARUR VYSYA BANK</option>
        <option value="KOTAK MAHINDRA">KOTAK MAHINDRA</option>
        <option value="ING VYSYA">ING VYSYA</option>
        <option value="SOUTH INDIAN">SOUTH INDIAN</option>                                          <option value="BANK OF AMERICA">BANK OF AMERICA</option>    
        <option value="CITI BANK">CITI BANK</option>
        <option value="HSBC BANK">HSBC BANK</option>
        <option value="UNITED BANK OF INDIAN">UNITED BANK OF INDIAN</option>
        <option value="BANK OF BARODA">BANK OF BARODA</option>
        <option value="CANARA BANK">CANARA BANK</option>
        <option value="CORPORATION BANK">CORPORATION BANK</option>
        <option value="SYNDICATE">SYNDICATE</option>
        <option value="ANDHRA BANK">ANDHRA BANK</option>
        <option value="BANK OF INDIA">BANK OF INDIA</option>
        <option value="CENTRAL BANK OF INDIA">CENTRAL BANK OF INDIA</option>
        <option value="UCO BANK">UCO BANK</option>
        <option value="UNION BANK OF INDIA">UNION BANK OF INDIA</option>
        <option value="UNITED BANK OF INDIA">UNITED BANK OF INDIA</option>
        <option value="STATE BANK OF HYDRABAD">STATE BANK OF HYDRABAD</option>
        <option value="CATHOLIC SYRIAN BANK">Catholic Syrian Bank</option>
        <option value="INDIAN BANK">INDIANBANK</option>
        <option value="INDIAN OVERSEAS">INDIANOVERSEAS</option>
        <option value="AXIS">AXIS</option>
        <option value="TAMILNADU MERCHANTILE">TAMILNADUMERCHANTILE</option>
        <option value="STATE BANK OF INDIA">STATEBANKOFINDIA</option>
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
        $('#check').hide();
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
<!-- 
<script type="text/javascript">
$(document).ready(function()
{
  // alert("ok");
  $('#d').change(function()
  {
    alert("ok");
  });
});

</script>


  -->