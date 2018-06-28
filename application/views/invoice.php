

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>datepicker/jquery.css">



<style>

#id

{

  width:150px;

}

</style>



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

                    <header class="panel-heading">

                       <p style="margin-left:20px;"> Add Purchase Invoce</p>

                    </header>

                    <div class="panel-body">



                    <form class="form-inline form" action="<?php echo base_url();?>purchase_invoice/invoice_insert" method="post" name="name" target="_blank">

            

                   	<table>

             	          	<tr>

             		         <th>Order Id</th>

             	                <td>

             	<div class="col-sm-12">

             		<input type="text" name="orderid" class="form-control" value="<?php echo $orderid;?>" style="width:100px;" >

             		</div></td>

             		<th id='id'>Order Date</th>

             		<td>

            

             	<div class="col-sm-12">

             		<input type="text" name="orderdate" value="<?php echo date('d-m-Y');?>" id="d" class="form-control" style="widty:130px;" >

             		</div>

             		</td>

             		</tr>

             		             		

             		<tr>

             		<td>&nbsp;&nbsp;&nbsp;</td>

             		</tr>

					</table>

					<table>



<tr>

             	<th style="color:Blue; font-size:18px" colspan="2"> Customer Details</th>



             		</tr>

             		<tr>

             		<td>&nbsp;&nbsp;&nbsp;</td>

             		</tr>







             	

             		<tr>

             		<th style="width:150px;">Company Name</th>

             		<td>

             		<div class="col-sm-12">

             		<input type="text" name="companyname" class="form-control" id="companyname">

                        <div id="company_valid"></div>

             		</div></td>
             		
             		
<td>

             		<div class="col-sm-12">

             		<input type="hidden" name="name" class="form-control" id="name" >

                        

             		</div></td>
             		</tr>

             		<tr>

             		<td>&nbsp;&nbsp;&nbsp;</td>

             		</tr>

             			<tr>

             			<th>Address_1</th>

             			<td>

             			<div class="col-sm-12">

             		<input type="text" name="address" class="form-control" id="address">

                        <div id="address_valid"></div>

             		</div></td>

               

             		</tr>

             		<tr>

             		<td>&nbsp;&nbsp;&nbsp;</td>

             		</tr>

             		<tr>

                <th>State</th>

                  <td>

                  <div class="col-sm-12">

                <input type="text" name="state" class="form-control" id="state">

                        <div id="state_valid"></div>

                </div></td>

             			<th>City</th>

             			<td>

             			<div class="col-sm-12">

             		<input type="text" name="city" class="form-control" id="city">

                        <div id="city_valid"></div>

             		</div></td>

             		

             		<th>Pincode</th>

             			<td>

             			<div class="col-sm-12">

             		<input type="text" name="pincode" class="form-control" id="pincode">

                        <div id="pincode_valid"></div>

             		</div></td>



             		</tr>



             		<tr>

             		<td>&nbsp;&nbsp;&nbsp;</td>

             		</tr>

             			<tr>

             			<th>MobileNo</th>

             			<td>

             			<div class="col-sm-12">

             		<input type="text" name="mobileno" class="form-control" id="mobileno">

                        <div id="mobileno_valid"></div>

             		</div></td>

             		

             	

             		</tr>

             		<tr>

             		<td>&nbsp;&nbsp;&nbsp;</td>

             		</tr>



				<tr>



             	<th style="color:Blue; margin-left:30px;font-size:18px" colspan="2">Purchase Details</th>



             		</tr>

             		<tr>

             		<td>&nbsp;&nbsp;&nbsp;</td>

             		

            <tr>

             		<table class="table" cellspadding="10" cellspacing="10">

             		<tr>

             		

             		<th>Description</th>

             		

             		<th>Rate</th>

                <th>Quantity</th>

             		<th> Amount</th>

             	

             		</tr>

             		

             		<tbody >

                        <tr>

                              <td> <input type="text" name="description[]" id="description" class="form-control" required>

                              <div id="t1"></div></td>



                             <td> <input type="text" name="price[]" id="price" class="form-control" required>

                              <div id="t2"></div></td>



                               <td> <input type="text" name="quantity[]" id="quantity" class="form-control" required>

                              <div id="t3"></div></td>



                              <td> <input type="text" name="totalamount[]" id="total" class="form-control" required>

                              <div id="t4"></div></td>

                               <td><button type="button" class="btn btn-danger remove"> Remove</button type="button"></td>

                              </tr>

             		</tbody>

                        <tbody id="append"></tbody>

                        </table>



                        </tr>

                        </table>

                        <input type="hidden" value="1" id="hide">

                        <div class="pull-right">

                        <button type="button" class="btn btn-primary add">+ Add Row</button>



                        </div>

                        <br>

                        <br>

                       <table class="pull-right">

                          <tr>

                            <th>Grand Total</th>

                            <td><input type="text" name="grandtotal" class="form-control" style="width:100px;" id="gtotal" readonly></td>

                            </tr>

                            </table>



                        <br>

                        <br>

             		

             		

             		

             		<div style="margin-left:100px;">

             		<input type="submit" name="submit" class="btn btn-success submit" value=" Print" >



               <input type="reset" name="reset" class="btn btn-default" value="Cancel" >





              

                        </div>

                  </form>

                  </div>

            </section>

            </div>





            <?php 



            if($this->uri->segment(3))

            {

              echo '<a href="'.base_url().'purchase_invoice/purchase_bill/'.$this->uri->segment(3).'" class="btn btn-primary" target="_blannk">Print last Bill</a>';

            }

            ?>



          

            </div>

            <script type="text/javascript">

      

      $(document).ready(function(){





            $('.submit').click(function(){

                  var cmpny=$('#companyname');

                  var address=$('#address');

                  var city=$('#city');

                  var state=$('#state');

                  var pincode=$('#pincode');

                  var mobileno=$('#mobileno');

                  var country=$('#country');

                  var gst=$('#gst');

                   var description=$('#description');

                  var quantity=$('#quantity');

                  var price=$('#price');

                  var total=$('#total');

     

                 





                  if(cmpny.val()=='')

                  {

                      

                        cmpny.focus();

                        $('#company_valid').html('<div><font color="red">Enter Company name </font></div>');

                        // $(cmpny).css("border-color", "red");

                        cmpny.keyup(function()

                        {

                             

                               $('#company_valid').html('');

                        });

                        return false;



                  }



                    if(address.val()=='')

                  {

                      

                       address.focus();

                        $('#address_valid').html('<div><font color="red">Enter Address </font></div>');

                      

                      address.keyup(function()

                        {

                             

                               $('#address_valid').html('');

                        });

                        return false;



                  }

                      

                        if(city.val()=='')

                  {

                      

                       city.focus();

                        $('#city_valid').html('<div><font color="red">Enter City name </font></div>');

                      

                     city.keyup(function()

                        {

                             

                               $('#city_valid').html('');

                        });

                        return false;



                  }

                    if(state.val()=='')

                  {

                      

                       state.focus();

                        $('#state_valid').html('<div><font color="red">Enter State name </font></div>');

                      

                     state.keyup(function()

                        {

                             

                               $('#state_valid').html('');

                        });

                        return false;



                  }



                          if(pincode.val()=='')

                  {

                      

                       pincode.focus();

                        $('#pincode_valid').html('<div><font color="red">Enter Pincode</font></div>');

                      

                    pincode.keyup(function()

                        {

                             

                               $('#pincode_valid').html('');

                        });

                        return false;



                  }



                          if(mobileno.val()=='')

                  {

                      

                       mobileno.focus();

                        $('#mobileno_valid').html('<div><font color="red">Enter Mobileno </font></div>');

                      

                      mobileno.keyup(function()

                        {

                             

                               $('#mobileno_valid').html('');

                        });

                        return false;



                  }

                    if(country.val()=='')

                  {

                      

                       country.focus();

                        $('#country_valid').html('<div><font color="red">Enter Country name </font></div>');

                      

                    country.keyup(function()

                        {

                             

                               $('#country_valid').html('');

                        });

                        return false;



                  }

                    if(gst.val()=='')

                  {

                      

                       gst.focus();

                        $('#gst_valid').html('<div><font color="red">Enter Gstno</font></div>');

                      

                     gst.keyup(function()

                        {

                             

                               $('#gst_valid').html('');

                        });

                        return false;



                  }



                  if(description.val()=='')

                  {

                      

                       description.focus();

                        $('#t1').html('<div><font color="red">Enter The Item Name</font></div>');

                      

                     description.keyup(function()

                        {

                             

                               $('#t1').html('');

                        });

                        return false;



                  }



                    if(quantity.val()=='')

                  {

                      

                       quantity.focus();

                        $('#t3').html('<div><font color="red">Enter The Quantity</font></div>');

                      

                     quantity.keyup(function()

                        {

                             

                               $('#t3').html('');

                        });

                        return false;



                  }



                      if(price.val()=='')

                  {

                      

                       price.focus();

                        $('#t2').html('<div><font color="red">Enter The Price</font></div>');

                      

                     price.keyup(function()

                        {

                             

                               $('#t2').html('');

                        });

                        return false;



                  }



















for(var i=1;i<=$('#hide').val();i++)

    {

        var description=$('#description'+i+'').val();

        var quantity=$('#quantity'+i+'').val();

        var price=$('#price'+i+'').val();

        var total=$('#total'+i+'').val();

                



        if(description=='')



        {



          $('#description'+i+'').focus();       



          $('#t1'+i+'').html('<div><font color="red">Enter The Item name</font><div>');

          $('#description'+i+'').css("border-color", "red");  

          $('#description'+i+'').focus();

          $('#description'+i+'').keyup(function(){      

          $(this).css("border-color", "green");

           $('#t1'+i+'').html('');

  

            });

          return false;

        }

        else

        {

        $('#t1'+i+'').hide();

        }



         if(quantity=='')



        {



          $('#quantity'+i+'').focus();       



          $('#t3'+i+'').html('<div><font color="red">Enter The Quantity</font><div>');

          $('#quantity'+i+'').css("border-color", "red");  

          $('#quantity'+i+'').focus();

          $('#quantity'+i+'').keyup(function(){      

          $(this).css("border-color", "green");

           $('#t3'+i+'').html('');

  

            });

          return false;

        }

        else

        {

        $('#t3'+i+'').hide();

        }



            if(price=='')



        {



          $('#price'+i+'').focus();       



          $('#t2'+i+'').html('<div><font color="red">Enter The Price</font><div>');

          // $('#price'+i+'').css("border-color", "red");  

          $('#price'+i+'').focus();

          $('#price'+i+'').keyup(function(){  



          alert();    

          // $(this).css("border-color", "green");

            $('#t2'+i+'').html('');



            });

          return false;

        }

        else

        {

        $('#t2'+i+'').hide();

        }

        





            

}



 });

           

      });

</script>

      











<script type="text/javascript">

	

	$(document).ready(function()

	{

		

		var s=new Date();

		   $("#d").datepicker({ defaultDate: new Date() });

	});

</script>







<!-- append rows -->

<script type="text/javascript">

$(document).ready(function(){

     

            $('.add').click(function(){

             

            var start=$('#hide').val();



            var total=Number(start)+1;

            $('#hide').val(total);

            var tbody=$('#append');

        





            $('<tr><td><input type="text" name="description[]" id="description'+total+'" class="form-control"><div id="t1'+total+'"></div></td><td><input type="text" name="price[]" id="price'+total+'" class="form-control"><div id="t2'+total+'"></div></td><td><input type="text" name="quantity[]" id="quantity'+total+'" class="form-control"><div id="t3'+total+'"></div></td><td><input type="text" name="totalamount[]" id="total'+total+'" class="form-control"><div id="t4'+total+'"></div></td><td><button type="button" class="btn btn-danger remove">Remove</button type="button"></td></tr>').appendTo(tbody);







             // Remove function

            $('.remove').click(function(){

                  $(this).parents('tr').remove();

                  var tot=0;

                  $('input[name^="totalamount"]').each(function(){

                          tot  +=Number($(this).val());

                          var fin=tot.toFixed(2);

                          $('#gtotal').val(fin); 



                    });

                  });









   $('#quantity'+total+'').keyup(function(){



      



            var qty=$(this).val();

            var price=$('#price'+total+'').val();

           if(qty>0)

            {

            

            var amount=parseFloat(qty)*parseFloat(price);

            var fin=amount.toFixed(2);

            $('#total'+total+'').val(fin);

               var tot=0;



       $('input[name^="totalamount"]').each(function(){

            

         tot +=Number($(this).val()); 

         var fin=tot.toFixed(2); 

         $('#gtotal').val(fin);



                     });





             }

            else

            {

            $('#total'+total+'').val(0);     

            }

      });



    $( "#description"+total+"" ).autocomplete({



        source: function(request, response) {

          $.ajax({ 

            url: "<?php echo site_url('item/get_item_name'); ?>",

            data: { name: $("#description"+total+"").val()},

            dataType: "json",

            type: "POST",

            success: function(data){              

             //alert(data);

              response(data);

            }    

          });

        },

      });

     $('#description'+total+'').blur(function()

    {

      var name= $('#description'+total+'').val();

      $.post('<?php echo base_url('item/get_rate');?>',{ name:name},function(res)

      {

        var obj=jQuery.parseJSON(res);

          $('#price'+total+'').val(obj.rate);

          $('#quantity'+total+'').focus();

      });

    });

      

      







});

});



</script>



<script type="text/javascript">

  

  $(document).ready(function()

  {

    $('#quantity').keyup(function()

    {

        var qty=$('#quantity').val();

        var price=$('#price').val();



        if(qty>0)

        {

            var amount=parseFloat(qty)*parseFloat(price);

            var fin=amount.toFixed(2);

            $('#total').val(fin);

            $('#gtotal').val(fin);





        }

        else

        {

           $('#total').val(0);

        }

    });

  });

</script>





  <script src="<?php echo base_url();?>assets/autocomplete/jquery-1.10.2.js"></script>

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

               

              

              response(data);

            }    

          });

        },

      });

  });



</script>



<script type="text/javascript">

  $(document).ready(function()

  {

    $('#description').blur(function()

    {

      var name= $('#description').val();

      $.post('<?php echo base_url('item/get_rate');?>',{ name:name},function(res)

      {

        var obj=jQuery.parseJSON(res);

          $('#price').val(obj.rate);

          $('#quantity').focus();

      });

    });

  });

</script>

<script type="text/javascript">

  $(document).ready(function(){

   $("#companyname").blur(function(){



  var name=$("#companyname").val();



  $.post('<?php echo base_url('customer/get_companyname');?>',

  {

    name:name

  },

  function(res){

    var obj=jQuery.parseJSON(res);
    $("#name").val(obj.na);

    $("#address").val(obj.address);

   

    $("#state").val(obj.state);

    $("#city").val(obj.city);

    $("#pincode").val(obj.pincode);

    $("#mobileno").val(obj.mobileno);





  });

   });

  });

</script>

<script type="text/javascript">

  

  $(document).ready(function()

  {

 

  

   $( "#companyname" ).autocomplete({



        source: function(request, response) {

          $.ajax({ 

            url: "<?php echo site_url('customer/get_name'); ?>",

            data: { name: $("#companyname").val()},

            dataType: "json",

            type: "POST",

            success: function(data){              

               

              

              response(data);

            }    

          });

        },

      });

  });



</script>



 







