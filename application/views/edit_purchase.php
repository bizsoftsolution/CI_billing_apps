<script type="text/javascript" href="<?php echo base_url();?>assets/jquery-ui.min.js"></script>


<style>
  #id{ width:150px; }
</style>


<?php $msg = $this->session->flashdata('msg'); if((isset($msg)) && (!empty($msg))) { ?>
<div class="alert alert-success" >
  <a href="#" class="close" data-dismiss="alert">&times;</a>
  <?php print_r($msg); ?>
</div><script type="text/javascript" href="<?php echo base_url();?>assets/jquery-ui.min.js"></script>

<?php } ?>


<?php $msg = $this->session->flashdata('msg1'); if((isset($msg)) && (!empty($msg))) { ?>
<div class="alert alert-danger" >
  <a href="#" class="close" data-dismiss="alert">&times;</a>
  <?php print_r($msg); ?>
</div>
<?php } ?>

<?php  foreach($sales as $s)?>
<div class="row">
  <div class="col-md-12">
    <section class="panel">
      <header class="panel-heading">
       <p style="margin-left:20px;"> Edit Purchase Invoice</p>
     </header>

     <div class="panel-body">
      <form class="form-inline sales" method="post"  action="<?php echo base_url();?>purchase_invoice/invoice_update/<?php echo $s->id; ?>" target="_blank">


        <table>
          <tr>
           <th >Order Id</th>
           <td>
            <div class="col-sm-12">
              <input type="text" name="orderid" class="form-control"  value="<?php echo $s->orderid;?>" style="width:100px;">
            </div>
          </td>
          <th style="width:150;"id="id">Order Date</th>
          <td>
            <div class="col-sm-12">
              <input type="text" name="orderdate" value="<?php echo date('d-m-Y',strtotime($s->orderdate));?>" id="d" class="form-control" style="width:150px;" >
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
        <td id="id"><b>Company Name</b></td>
        <td>
          <input type="text" name="companyname" class="form-control" id="companyname" value="<?php  echo $s->companyname?>">
          <div id="company_valid"></div>
      </td>
      <td>
       <input type="hidden" name="name" class="form-control" id="name" value="<?php  echo $s->name?>">
       </td>
       
       
      </td>
    </tr>
    <tr>
      <td>&nbsp;&nbsp;&nbsp;</td>
    </tr>
    <tr>
      <td ><b>Address_1</b></th>
        <td>
          <input type="text" name="address" class="form-control" id="address" value="<?php echo $s->address;?>">
          <div id="address_valid"></div>
        </td>
       
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;</td>
      </tr>
      <tr>
        <td><b>State</b></td>
        <td>
          <input type="text" name="state" class="form-control" id="state" value="<?php echo $s->state;?>">
          <div id="state_valid"></div>
        </td>
        <td style="width:50px;"><b><div class="col-sm-4">City</div></b></td>
        <td>
          <input type="text" name="city" class="form-control" id="city" value="<?php echo $s->city;?>">
          <div id="city_valid"></div>
        </td>
        <td style="width:50px;"><b><div class="col-sm-4">Pincode</div></b></td>
        <td>
          <input type="text" name="pincode" class="form-control" id="pincode" value="<?php echo $s->pincode;?>">
          <div id="pincode_valid"></div>
        </td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;</td>
      </tr>
      <tr>
        
        <td style="width:50px;"><b><div class="col-sm-4">Mobileno</div></b></td>
        <td>
          <input type="text" name="mobileno" class="form-control" id="mobileno" value="<?php echo $s->mobileno;?>">
          <div id="mobileno_valid"></div>
        </td>
        
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;&nbsp;&nbsp;</td>
      </tr>
      <tr>
        <th style="color:Blue; margin-left:30px;font-size:18px" colspan="2">Purchase Details</th>
        
      </tr>       

      <td>&nbsp;&nbsp;&nbsp;</td>
    </tr>
    <tr>


     <table class="table" cellspadding="10" cellspacing="10">
      <tr>
        <th>Description</th>
        <th>Rate</th>
        <th>Quantity</th>
        <th> Amount</th>
      </tr>



      <?php
      foreach($sales as $i):


        $description=explode('|',$i->description);
      $quantity=explode('|',$i->quantity);
      $price=explode('|',$i->price);
      $total=explode('|',$i->total);
      $count=count($description);

      for ($j=0; $j < $count; $j++) { 
        $z=$j+1;

        $tax=($total[$j]*(6/100));
        $sub=($total[$j]+($total[$j]*(6/100)));

        echo '<tbody>     
        <tr>
          <td>

            <input type="text" class="form-control" name="description[]" value="'.$description[$j].'" id="description'.$z.'" >
          </td>

          <td>  
            <input type="text" class="form-control" id="price'.$z.'" name="price[]" value="'.$price[$j].'"> 
          </td>

          <td>
            <input type="text" class="form-control" id="quantity'.$z.'" name="quantity[]" value="'.$quantity[$j].'">
          </td>
          <td>
            <input type="text" class="form-control" id="total'.$z.'" name="totalamount[]" value="'.$total[$j].'"> </td>
            <td><button type="button" class="btn btn-danger remove">Remove</button type="button"></td>


          </tr>
        </tbody>';

      }

      endforeach;

      echo '<input type="hidden" value="'.$count.'" id="hide">';

      ?>






      <tbody id="append"></tbody>

    </table>
  </tr>
</table>

<div class="pull-right">
  <button type="button" class="btn btn-primary add">+ Add Row</button>
</div>
<br>
<br>
<table class="pull-right">
 


<tr>


  <td>&nbsp;&nbsp;</td>

</tr>

<tr>

  <th>Total Amount</th>

  <td><input type="text" name="grandtotal" class="form-control"  id="gtotal" readonly value="<?php echo $s->grandtotal;?>"></td>

</tr>



</table>

<br>

<br>
<div style="margin-left:100px;">

<input type="submit" name="print" class="btn btn-success submit" value="Print" >
  <input type="reset" name="reset" class="btn btn-default" value=" Cancel" >

</div>

</form>

</div>

</section>

</div>

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
      var description=$('#description1');
      var quantity=$('#quantity1');
      var price=$('#price1');
      var total=$('#total1');

      if(cmpny.val()=='')

      {
        cmpny.focus();
        $('#company_valid').html('<div><font color="red">Enter The Company name </font></div>');
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

       $('#address_valid').html('<div><font color="red">Enter The Address </font></div>');



       address.keyup(function()

       {



         $('#address_valid').html('');

       });

       return false;



     }



     if(state.val()=='')

     {



       state.focus();

       $('#state_valid').html('<div><font color="red">Enter The State name </font></div>');



       state.keyup(function()

       {



         $('#state_valid').html('');

       });

       return false;



     }



     if(city.val()=='')

     {



       city.focus();

       $('#city_valid').html('<div><font color="red">Enter City The name </font></div>');



       city.keyup(function()

       {



         $('#city_valid').html('');

       });

       return false;



     }





     if(pincode.val()=='')

     {



       pincode.focus();

       $('#pincode_valid').html('<div><font color="red">Enter The Pincode</font></div>');



       pincode.keyup(function()

       {



         $('#pincode_valid').html('');

       });

       return false;



     }



     if(mobileno.val()=='')

     {



       mobileno.focus();

       $('#mobileno_valid').html('<div><font color="red">Enter The Mobileno </font></div>');



       mobileno.keyup(function()

       {



         $('#mobileno_valid').html('');

       });

       return false;



     }


  if(gst.val()=='')

  {



   gst.focus();

   $('#gstno_valid').html('<div><font color="red">Enter  The Gstno</font></div>');



   gst.keyup(function()

   {



     $('#gstno_valid').html('');

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



  $('.sales').submit();


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

    $('#price'+i+'').css("border-color", "red");  

    $('#price'+i+'').focus();

    $('#price'+i+'').keyup(function(){ 



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

  var result=tot.toFixed(2); 

      var check=$("#check").val();

      if(check=="gst")

      {



        $("#sub_total").val(result);



        var o_tax=(parseFloat(result)*6/100);
        var gtax=o_tax.toFixed(2);

        $('#tax').val(gtax);



        var grand=parseFloat(gtax)+parseFloat(result);

        var gt=grand.toFixed(2);

        $('#gtotal').val(gt);
        $('#demo').val(gt);

      }

      else

      {



        $('#gtotal').val(result);

      }


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

      var result=tot.toFixed(2); 

      var check=$("#check").val();

      if(check=="gst")

      {



        $("#sub_total").val(result);



        var o_tax=(parseFloat(result)*6/100);
        var gtax=o_tax.toFixed(2);

        $('#tax').val(gtax);



        var grand=parseFloat(gtax)+parseFloat(result);

        var gt=grand.toFixed(2);

        $('#gtotal').val(gt);
         $('#demo').val(gt);


      }

      else

      {



        $('#gtotal').val(result);

      }



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


<link rel="stylesheet" href="<?php echo base_url();?>assets/autocomplete/jquery-ui.css">

<script src="<?php echo base_url();?>assets/autocomplete/jquery-1.10.2.js"></script>

<script src="<?php echo base_url();?>assets/autocomplete/jquery-ui.js"></script>


<script type="text/javascript">



  $(document).ready(function()

  {


    $( "#description1" ).autocomplete({

      source: function(request, response) {
        $.ajax({ 
          url: "<?php echo site_url('item/get_item_name'); ?>",
          data: { name: $("#description1").val()},
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



<!--  Total generate -->



<script type="text/javascript">



  $(document).ready(function()

  {

    $('#quantity1').keyup(function(){

      var qty=$('#quantity1').val();
      var price=$('#price1').val();
      if(qty>0)
      {
        var amount=parseFloat(qty)*parseFloat(price);
        var fin=amount.toFixed(2);
        $('#total1').val(fin);

        var tot=0;
        $('input[name^="totalamount"]').each(function(){
          tot  +=Number($(this).val());
          var fins=tot.toFixed(2);
          $('#gtotal').val(fins);  });
      }
      else
      {

        $('#total1').val(0);

      }

    });

    $('#quantity2').keyup(function(){

      var qty=$('#quantity2').val();
      var price=$('#price2').val();
      if(qty>0)
      {
        var amount=parseFloat(qty)*parseFloat(price);
        var fin=amount.toFixed(2);
        $('#total2').val(fin);
        var tot=0;
        $('input[name^="totalamount"]').each(function(){
          tot  +=Number($(this).val());
          var fins=tot.toFixed(2);
          $('#gtotal').val(fins);    }); 
      }
      else
      {

        $('#total2').val(0);

      }

    });
    $('#quantity3').keyup(function(){

      var qty=$('#quantity3').val();
      var price=$('#price3').val();
      if(qty>0)
      {
        var amount=parseFloat(qty)*parseFloat(price);
        var fin=amount.toFixed(2);
        $('#total3').val(fin);
        var tot=0;
        $('input[name^="totalamount"]').each(function(){
          tot  +=Number($(this).val());
          var fins=tot.toFixed(2);
          $('#gtotal').val(fins);    });
      }
      else
      {

        $('#total3').val(0);

      }

    });
    $('#quantity4').keyup(function(){

      var qty=$('#quantity4').val();
      var price=$('#price4').val();
      if(qty>0)
      {
        var amount=parseFloat(qty)*parseFloat(price);
        var fin=amount.toFixed(2);
        $('#total4').val(fin);
        var tot=0;
        $('input[name^="totalamount"]').each(function(){
          tot  +=Number($(this).val());
          var fins=tot.toFixed(2);
          $('#gtotal').val(fins);    }); 
      }
      else
      {

        $('#total4').val(0);

      }

    });
    $('#quantity5').keyup(function(){

      var qty=$('#quantity5').val();
      var price=$('#price5').val();
      if(qty>0)
      {
        var amount=parseFloat(qty)*parseFloat(price);
        var fin=amount.toFixed(2);
        $('#total5').val(fin);
        var tot=0;
        $('input[name^="totalamount"]').each(function(){
          tot  +=Number($(this).val());
          var fins=tot.toFixed(2);
          $('#gtotal').val(fins);    }); 
      }
      else
      {

        $('#total4').val(0);

      }

    });
    $('#quantity6').keyup(function(){

      var qty=$('#quantity6').val();
      var price=$('#price6').val();
      if(qty>0)
      {
        var amount=parseFloat(qty)*parseFloat(price);
        var fin=amount.toFixed(2);
        $('#total6').val(fin);
        var tot=0;
        $('input[name^="totalamount"]').each(function(){
          tot  +=Number($(this).val());
          var fins=tot.toFixed(2);
          $('#gtotal').val(fins);  });  
      }
      else
      {

        $('#total6').val(0);

      }

    });
    $('#quantity7').keyup(function(){

      var qty=$('#quantity7').val();
      var price=$('#price7').val();
      if(qty>0)
      {
        var amount=parseFloat(qty)*parseFloat(price);
        var fin=amount.toFixed(2);
        $('#total7').val(fin);
        var tot=0;
        $('input[name^="totalamount"]').each(function(){
          tot  +=Number($(this).val());
          var fins=tot.toFixed(2);
          $('#gtotal').val(fins);    });
      }
      else
      {

        $('#total7').val(0);

      }

    });
    $('#quantity8').keyup(function(){

      var qty=$('#quantity8').val();
      var price=$('#price8').val();
      if(qty>0)
      {
        var amount=parseFloat(qty)*parseFloat(price);
        var fin=amount.toFixed(2);
        $('#total8').val(fin);
        var tot=0;
        $('input[name^="totalamount"]').each(function(){
          tot  +=Number($(this).val());
          var fins=tot.toFixed(2);
          $('#gtotal').val(fins);  });  
      }
      else
      {

        $('#total8').val(0);

      }

    });
    $('#quantity9').keyup(function(){

      var qty=$('#quantity9').val();
      var price=$('#price9').val();
      if(qty>0)
      {
        var amount=parseFloat(qty)*parseFloat(price);
        var fin=amount.toFixed(2);
        $('#total9').val(fin);
        var tot=0;
        $('input[name^="totalamount"]').each(function(){
          tot  +=Number($(this).val());
          var fins=tot.toFixed(2);
          $('#gtotal').val(fins); });    
      }
      else
      {

        $('#total1').val(0);

      }

    });
    $('#quantity10').keyup(function(){

      var qty=$('#quantity10').val();
      var price=$('#price10').val();
      if(qty>0)
      {
        var amount=parseFloat(qty)*parseFloat(price);
        var fin=amount.toFixed(2);
        $('#total10').val(fin);
        var tot=0;
        $('input[name^="totalamount"]').each(function(){
          tot  +=Number($(this).val());
          var fins=tot.toFixed(2);
          $('#gtotal').val(fins);  
        });   
      }
      else
      {

        $('#total10').val(0);

      }

    });


  });

</script>

<!-- rate blur function use than rate fill the box -->

<script type="text/javascript">

  $(document).ready(function()

  {

    $('#description1').blur(function()
    {
      var name= $('#description1').val();
      $.post('<?php echo base_url('item/get_rate');?>',{ name:name},function(res)

      {
        var obj=jQuery.parseJSON(res);
        $('#price1').val(obj.rate);
        $('#quantity1').focus();
      });
    });


    $('#description2').blur(function()
    {
      var name= $('#description2').val();
      $.post('<?php echo base_url('item/get_rate');?>',{ name:name},function(res)

      {
        var obj=jQuery.parseJSON(res);
        $('#price2').val(obj.rate);
        $('#quantity2').focus();
      });
    });


    $('#description3').blur(function()
    {
      var name= $('#description3').val();
      $.post('<?php echo base_url('item/get_rate');?>',{ name:name},function(res)

      {
        var obj=jQuery.parseJSON(res);
        $('#price3').val(obj.rate);
        $('#quantity3').focus();
      });
    });


    $('#description4').blur(function()
    {
      var name= $('#description4').val();
      $.post('<?php echo base_url('item/get_rate');?>',{ name:name},function(res)

      {
        var obj=jQuery.parseJSON(res);
        $('#price4').val(obj.rate);
        $('#quantity4').focus();
      });
    });


    $('#description5').blur(function()
    {
      var name= $('#description1').val();
      $.post('<?php echo base_url('item/get_rate');?>',{ name:name},function(res)

      {
        var obj=jQuery.parseJSON(res);
        $('#price5').val(obj.rate);
        $('#quantity5').focus();
      });
    });

    $('#description6').blur(function()
    {
      var name= $('#description1').val();
      $.post('<?php echo base_url('item/get_rate');?>',{ name:name},function(res)

      {
        var obj=jQuery.parseJSON(res);
        $('#price6').val(obj.rate);
        $('#quantity6').focus();
      });
    });

    $('#description7').blur(function()
    {
      var name= $('#description7').val();
      $.post('<?php echo base_url('item/get_rate');?>',{ name:name},function(res)

      {
        var obj=jQuery.parseJSON(res);
        $('#price7').val(obj.rate);
        $('#quantity7').focus();
      });
    });

    $('#description8').blur(function()
    {
      var name= $('#description1').val();
      $.post('<?php echo base_url('item/get_rate');?>',{ name:name},function(res)

      {
        var obj=jQuery.parseJSON(res);
        $('#price8').val(obj.rate);
        $('#quantity8').focus();
      });
    });

    $('#description9').blur(function()
    {
      var name= $('#description1').val();
      $.post('<?php echo base_url('item/get_rate');?>',{ name:name},function(res)

      {
        var obj=jQuery.parseJSON(res);
        $('#price9').val(obj.rate);
        $('#quantity9').focus();
      });
    });

    $('#description10').blur(function()
    {
      var name= $('#description1').val();
      $.post('<?php echo base_url('item/get_rate');?>',{ name:name},function(res)

      {
        var obj=jQuery.parseJSON(res);
        $('#price10').val(obj.rate);
        $('#quantity10').focus();
      });
    });



  });

</script>

<!-- checkbox click than show the box -->

<script type="text/javascript">

  $(document).ready(function(){

    $ ("#check").on('change',function(){
      var check=$("#check").val();
      if(check=='gst')

      {
        $("#t").show();
        $("#s").show();
        $("#adj").show();

        $('#quantity1').keyup(function()
        {
          var qty=$('#quantity1').val();
          var price=$('#price1').val();
          if(qty>0)
          {
            var amount=parseFloat(qty)*parseFloat(price);
            var result=amount.toFixed(2);
            $('#total1').val(result);  
            $('#sub_total').val(result);
            var tot=0;
            $('input[name^="totalamount"]').each(function(){
              tot  +=Number($(this).val());    

              var o_tax=(parseFloat(tot)*6/100);
              var gtax=o_tax.toFixed(2);
              $('#tax').val(gtax);
              var grand=parseFloat(gtax)+parseFloat(tot);
              var gt=grand.toFixed(2);
              $('#gtotal').val(gt);
               $('#demo').val(gt);
            });          
            //$('#demo').val(gt);
          }

          else

          {

            $('#total1').val(0);
          }
        });




        $('#quantity2').keyup(function()
        {
          var qty=$('#quantity2').val();
          var price=$('#price2').val();
          if(qty>0)
          {
            var amount=parseFloat(qty)*parseFloat(price);
            var result=amount.toFixed(2);
            $('#total2').val(result);  
            $('#sub_total').val(result);
            var tot=0;
            $('input[name^="totalamount"]').each(function(){
              tot  +=Number($(this).val());    

              var o_tax=(parseFloat(tot)*6/100);
              var gtax=o_tax.toFixed(2);
              $('#tax').val(gtax);
              var grand=parseFloat(gtax)+parseFloat(tot);
              var gt=grand.toFixed(2);
              $('#gtotal').val(gt);
               $('#demo').val(gt);
            });          
            //$('#demo').val(gt);
          }

          else

          {

            $('#total2').val(0);
          }
        });

        $('#quantity3').keyup(function()
        {
          var qty=$('#quantity3').val();
          var price=$('#price3').val();
          if(qty>0)
          {
            var amount=parseFloat(qty)*parseFloat(price);
            var result=amount.toFixed(2);
            $('#total3').val(result);  
            $('#sub_total').val(result);
            var tot=0;
            $('input[name^="totalamount"]').each(function(){
              tot  +=Number($(this).val());    

              var o_tax=(parseFloat(tot)*6/100);
              var gtax=o_tax.toFixed(2);
              $('#tax').val(gtax);
              var grand=parseFloat(gtax)+parseFloat(tot);
              var gt=grand.toFixed(2);
              $('#gtotal').val(gt);
               $('#demo').val(gt);
            });          
            //$('#demo').val(gt);
          }

          else

          {

            $('#total3').val(0);
          }
        });


        $('#quantity4').keyup(function()
        {
          var qty=$('#quantity4').val();
          var price=$('#price4').val();
          if(qty>0)
          {
            var amount=parseFloat(qty)*parseFloat(price);
            var result=amount.toFixed(2);
            $('#total4').val(result);  
            $('#sub_total').val(result);
            var tot=0;
            $('input[name^="totalamount"]').each(function(){
              tot  +=Number($(this).val());    

              var o_tax=(parseFloat(tot)*6/100);
              var gtax=o_tax.toFixed(2);
              $('#tax').val(gtax);
              var grand=parseFloat(gtax)+parseFloat(tot);
              var gt=grand.toFixed(2);
              $('#gtotal').val(gt);
               $('#demo').val(gt);
            });          
            //$('#demo').val(gt);
          }

          else

          {

            $('#total4').val(0);
          }
        });


        $('#quantity5').keyup(function()
        {
          var qty=$('#quantity5').val();
          var price=$('#price5').val();
          if(qty>0)
          {
            var amount=parseFloat(qty)*parseFloat(price);
            var result=amount.toFixed(2);
            $('#total5').val(result);  
            $('#sub_total').val(result);
            var tot=0;
            $('input[name^="totalamount"]').each(function(){
              tot  +=Number($(this).val());    

              var o_tax=(parseFloat(tot)*6/100);
              var gtax=o_tax.toFixed(2);
              $('#tax').val(gtax);tot
              var grand=parseFloat(gtax)+parseFloat(tot);
              var gt=grand.toFixed(2);
              $('#gtotal').val(gt);
               $('#demo').val(gt);
            });          
            //$('#demo').val(gt);
          }

          else

          {

            $('#total5').val(0);
          }
        });




        $('#quantity6').keyup(function()
        {
          var qty=$('#quantity6').val();
          var price=$('#price6').val();
          if(qty>0)
          {
            var amount=parseFloat(qty)*parseFloat(price);
            var result=amount.toFixed(2);
            $('#total6').val(result);  
            $('#sub_total').val(result);
            var tot=0;
            $('input[name^="totalamount"]').each(function(){
              tot  +=Number($(this).val());    

              var o_tax=(parseFloat(tot)*6/100);
              var gtax=o_tax.toFixed(2);
              $('#tax').val(gtax);
              var grand=parseFloat(gtax)+parseFloat(tot);
              var gt=grand.toFixed(2);
              $('#gtotal').val(gt);
               $('#demo').val(gt);
            });          
            //$('#demo').val(gt);
          }

          else

          {

            $('#total6').val(0);
          }
        });



        $('#quantity7').keyup(function()
        {
          var qty=$('#quantity7').val();
          var price=$('#price7').val();
          if(qty>0)
          {
            var amount=parseFloat(qty)*parseFloat(price);
            var result=amount.toFixed(2);
            $('#total7').val(result);  
            $('#sub_total').val(result);
            var tot=0;
            $('input[name^="totalamount"]').each(function(){
              tot  +=Number($(this).val());    

              var o_tax=(parseFloat(tot)*6/100);
              var gtax=o_tax.toFixed(2);
              $('#tax').val(gtax);
              var grand=parseFloat(gtax)+parseFloat(tot);
              var gt=grand.toFixed(2);
              $('#gtotal').val(gt);
               $('#demo').val(gt);
            });          
            //$('#demo').val(gt);
          }

          else

          {

            $('#total7').val(0);
          }
        });


        $('#quantity8').keyup(function()
        {
          var qty=$('#quantity8').val();
          var price=$('#price8').val();
          if(qty>0)
          {
            var amount=parseFloat(qty)*parseFloat(price);
            var result=amount.toFixed(2);
            $('#total8').val(result);  
            $('#sub_total').val(result);
            var tot=0;
            $('input[name^="totalamount"]').each(function(){
              tot  +=Number($(this).val());    

              var o_tax=(parseFloat(tot)*6/100);
              var gtax=o_tax.toFixed(2);
              $('#tax').val(gtax);
              var grand=parseFloat(gtax)+parseFloat(tot);
              var gt=grand.toFixed(2);
              $('#gtotal').val(gt);
               $('#demo').val(gt);
            });          
            //$('#demo').val(gt);
          }

          else

          {

            $('#total8').val(0);
          }
        });

        $('#quantity9').keyup(function()
        {
          var qty=$('#quantity9').val();
          var price=$('#price9').val();
          if(qty>0)
          {
            var amount=parseFloat(qty)*parseFloat(price);
            var result=amount.toFixed(2);
            $('#total9').val(result);  
            $('#sub_total').val(result);
            var tot=0;
            $('input[name^="totalamount"]').each(function(){
              tot  +=Number($(this).val());    

              var o_tax=(parseFloat(tot)*6/100);
              var gtax=o_tax.toFixed(2);
              $('#tax').val(gtax);
              var grand=parseFloat(gtax)+parseFloat(tot);
              var gt=grand.toFixed(2);
              $('#gtotal').val(gt);
               $('#demo').val(gt);
            });          
            //$('#demo').val(gt);
          }

          else

          {

            $('#total9').val(0);
          }
        });



        $('#quantity10').keyup(function()
        {
          var qty=$('#quantity10').val();
          var price=$('#price10').val();
          if(qty>0)
          {
            var amount=parseFloat(qty)*parseFloat(price);
            var result=amount.toFixed(2);
            $('#total10').val(result);  
            $('#sub_total').val(result);
            var tot=0;
            $('input[name^="totalamount"]').each(function(){
              tot  +=Number($(this).val());    

              var o_tax=(parseFloat(tot)*6/100);
              var gtax=o_tax.toFixed(2);
              $('#tax').val(gtax);
              var grand=parseFloat(gtax)+parseFloat(tot);
              var gt=grand.toFixed(2);
              $('#gtotal').val(gt);
               $('#demo').val(gt);
            });          
            //$('#demo').val(gt);
          }

          else

          {

            $('#total10').val(0);
          }
        });







      }
      else
      {
        $("#t").hide();
        $("#s").hide();
      }
    });


});

</script>

<script type="text/javascript">

  $(document).ready(function(){
    $("#companyname").blur(function(){
      var name=$("#companyname").val();
      $.post('<?php echo base_url('customer/get_companyname1');?>',

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

        //$("#gst").val(obj.gstno);



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


<script type="text/javascript">
  $(document).ready(function(){


    $('.remove').click(function(){
      $(this).parents('tr').remove();
      var tot=0;
      $('input[name^="totalamount"]').each(function(){
        tot  +=Number($(this).val());
        var result=tot.toFixed(2); 

      var check=$("#check").val();

      if(check=="gst")

      {



        $("#sub_total").val(result);



        var o_tax=(parseFloat(result)*6/100);
        var gtax=o_tax.toFixed(2);

        $('#tax').val(gtax);



        var grand=parseFloat(gtax)+parseFloat(result);

        var gt=grand.toFixed(2);

        $('#gtotal').val(gt);
        $('#demo').val(gt);

      }

      else

      {



        $('#gtotal').val(result);

      }

       
      });
    });




    for(var total=1;total<100;total++)
    {


      $( "#description"+total+"" ).autocomplete({
        source: function(request, response) {
          $.ajax({ 
            url: "<?php echo site_url('item/get_item_name'); ?>",
            data: { name: $("#description"+total+"").val()},
            dataType: "json",
            type: "POST",
            success: function(data){  
              response(data);}    
            });

        },  

      });

    }

  });
</script>







