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

                  Add Customer

              </header>

              <div class="panel-body">



<!-- this is start the content inside the div -->



               <form name="form" class="form-horizontal" action="<?php echo base_url();?>customer/insert_customer" method="post">



                <div class="form-group">

                        <label class="control-label col-sm-3">Company Name</label>

                        <div class="col-sm-5">

                           <input type="text" name="companyname" class="form-control" id="companyname">

                            <div id="companyname_valid"></div>

                            </div>

                            </div>

                 <div class="form-group">

                        <label class="control-label col-sm-3">Name</label>

                        <div class="col-sm-5">

                           <input type="text" name="name" class="form-control" id="name">

                            <div id="name_valid"></div>



                      </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-sm-3">Mobileno</label>

                        <div class="col-sm-5">

                            <input type="text" name="mobileno" class="form-control"id="mobileno">

                            <div id="mobileno_valid"></div>

                      </div>

                    </div>

                   <div class="form-group">

                        <label class="control-label col-sm-3">Email Id</label>

                        <div class="col-sm-5">

                            <input type="email" name="emailid" class="form-control"id="emailid">

                            <div id="emailid_valid"></div>

                      </div>

                    </div>

                    <div class="form-group">

                        <label class="control-label col-sm-3">Address</label>

                        <div class="col-sm-5">

                           <textarea type="text" cols="2" rows="2" class="form-control"  name="address" id="address"></textarea>

                           <div id="address_valid"></div>

                      </div>

                    </div>

                      



                  <div class="form-group">

                        <label class="control-label col-sm-3">Gst No</label>

                        <div class="col-sm-5">

                           <input type="text" name="gstno" class="form-control" id="gstno">

                            <div id="gstno_valid"></div>



                      </div>

                    </div>

					<div class="form-group">

                        <label class="control-label col-sm-3">Pincode</label>

                        <div class="col-sm-5">

                           <input type="text" name="pincode" class="form-control" id="gstno">

                            <div id="pincode_valid"></div>



                      </div>

                    </div>

                     <div class="form-group">

                        <label class="control-label col-sm-3">State</label>

                        <div class="col-sm-5">

          <select id="state" class="form-control" name="state">

               <option>Select State</option>

                 <option value="FEDERAL TERRITORY">Federal territory</option>

                 <option value="JOHOR">Johor</option>

                 <option value="PERAK">Perak</option>

                 <option value="SELANGOR">Selangor</option>

                 <option value="SARAWAK">Sarawak</option>

                 <option value="SABAH">Sabah</option>

                 <option value="TERENGGANU">Terengganu</option>

                 <option value="MALACCA">Malacca</option>

                 <option value="KEDAH">Kedah</option>

                

             </select>

                            <div id="state_valid"></div>



                      </div>

                    </div>

                     <div class="form-group">

                        <label class="control-label col-sm-3">City</label>

                        <div class="col-sm-5">

          <select id="city" class="form-control" name="city">

                    <option>Select City</option>

                     <option value="PETALING">Petaling</option>

                     <option value="KUALA LUMPUR">Kuala Lumpur</option>

                     <option value="IPOH">Ipoh</option>

                     <option value="SHAH ALAM">Shah Alam</option>

                     <option value="PETALING JAYA">Petaling Jaya</option>

                     <option value="KUCHING">Kuching</option>

                     <option value="KOTA KINABALU">Kota kinabalu</option>

                     <option value="KUALA TERENGGARU">Kuala Terenggaru</option>

                     <option value="MALACCA CITY">Malacca City</option>

                     <option value="JOHOR BAHRU">Johor Bahru </option>

                     <option value="ALOR SETAR">Alor setar</option>

                     <option value="HULU LANGAT">Hulu Langat</option>

                     <option value="KLANG">   Klang</option>

                     <option value="KINTA">   Kinta</option>

                     <option value="NORTH-EAST PENANG ISLAND">   North-East Penang Island</option>

                     <option value="GOMBAK">Gombak</option>

                     <option value="KUNCHING">Kuching</option>

                     <option value="SEREMBAN">Seremban</option>

                     <option value="MUAR">Muar</option>

                     <option value="KUANTAN">Kuantan</option>

                     <option value="KUALA MUDA">Kuala Muda</option>

                     <option value="BATU PAHAT">  Batu Pahat</option>

                     <option value="TAWAU">Tawau</option>

                     <option value="SANDAKAN">Sandakan</option>

                     <option value="KOTA SETAR">Kota Setar</option>

                      <option value="LARUT AND MATANG">  Larut & Matang</option>

                      <option value="MIRI">  Miri</option>

                      <option value="KLUANG">Kluang</option>

                      <option value="NORTH SEBERANG PERAI">  North Seberang Perai</option>

                      <option value="KULIM">   Kulim</option>

                      <option value="KULAJAYA">Kulaijaya</option>

                      <option value="SIBU">Sibu</option>

                      <option value="MANJUNG">Manjung</option>

                      <option value="PERLIS">Perlis</option>

                      <option value="KUALA LANGAT">Kuala Langat</option>

                      <option value="KUBANG PASU">Kubang Pasu</option>

                      <option value="SEPANG">Sepang</option>

                      <option value="HILIR PERAK">Hilir Perak</option>

                      <option value="LAHAD DATU">  Lahad Datu</option>

                      <option value="HULU SELANGOR">Hulu Selangor</option>

                      <option value="KUALA SELANGOR">Kuala Selangor</option>

                      <option value="SEGAMAT">   Segamat</option>

                      <option value="BINTULU">Bintulu</option>

                      <option value="PASIR MAS">Pasir Mas</option>

                      <option value="BATANG PADANG">Batang Padang</option>

                      <option value="KENINGAU">  Keningau</option>

                      <option value="KEMAMAN">Kemaman</option>

                      <option value="SOUTH SEBERANG PERAI">  South Seberang Perai</option>

                      <option value="TEMERLOH">  Temerloh</option>

                      <option value="KOTA TINGGI">Kota Tinggi</option>

                      <option value="KOTA TINGGI">Kota Tinggi</option>



                             

         </select>

                            <div id="city_valid"></div>



                      </div>

                    </div>

					<div class="form-group">

                        <label class="control-label col-sm-3">Country</label>

                        <div class="col-sm-5">

                           <input type="text" name="country" class="form-control" id="country" value="Malaysia">

                            <div id="country_valid"></div>



                      </div>

                    </div>





                    <div class="col-md-offset-2" style="margin-left:200px;">

                      <input type="submit" name="submit" class="btn btn-primary submit" value="submit">

                      <input type="reset" name="reset" class="btn btn-default" value="cancel">

                        </div>



                     

                       

                        </form>

        </div>

        </section>

        </div>

        </div>





  <script type="text/javascript">



    $(document).ready(function()

    {

         $('.submit').click(function(){

         

            var cmpny=$('#companyname');

            var name=$('#name');

            var mobileno=$('#mobileno');

            var emailid=$('#emailid');

            var address=$('#address');

            var gstno=$('#gstno');

			 var pincode=$('#pincode');

            var state=$('#state');

            var city=$('#city');

            var country=$('#country');



          







          if(cmpny.val()=='')

          {

            

            cmpny.focus();

            $('#companyname_valid').html('<div><font color="red"> Enter The Companyname</font></div>');



            cmpny.keyup(function(){



                      $('#companyname_valid').html('');

                  });

            return false;

          }



             if(name.val()=='')

          {

            

            name.focus();

            $('#name_valid').html('<div><font color="red"> Enter The name</font></div>');



            name.keyup(function(){



                      $('#name_valid').html('');

                  });

            return false;

          }



             if(mobileno.val()=='')

          {

            

           mobileno.focus();

            $('#mobileno_valid').html('<div><font color="red"> Enter The Mobileno</font></div>');



            mobileno.keyup(function(){



                      $('#mobileno_valid').html('');

                  });

            return false;

          }

             if(emailid.val()=='')

          {

            

            emailid.focus();

            $('#emailid_valid').html('<div><font color="red"> Enter The Emailid</font></div>');



          emailid.keyup(function(){



                      $('#emailid_valid').html('');

                  });

            return false;

          }

              

               if(address.val()=='')

          {

            

           address.focus();

            $('#address_valid').html('<div><font color="red"> Enter The Address </font></div>');



            address.keyup(function(){



                      $('#address_valid').html('');

                  });

            return false;

          }

              



             if(gstno.val()=='')

          {

            

          gstno.focus();

            $('#gstno_valid').html('<div><font color="red"> Enter The Gst No </font></div>');



        gstno.keyup(function(){



                      $('#gstno_valid').html('');

                  });

            return false;

          }

		  if(pincode.val()=='')

          {

            

          pincode.focus();

            $('#pincode_valid').html('<div><font color="red"> Enter The Gst No </font></div>');



       pincode.keyup(function(){



                      $('#pincode_valid').html('');

                  });

            return false;

          }

           

         



             if(state.val()=='')

          {

            

          state.focus();

            $('#state_valid').html('<div><font color="red"> Enter The State</font></div>');



        state.keyup(function(){



                      $('#state_valid').html('');

                  });

            return false;

          }



             if(city.val()=='')

          {

            

          city.focus();

            $('#city_valid').html('<div><font color="red"> Enter The City</font></div>');



        city.keyup(function(){



                      $('#city_valid').html('');

                  });

            return false;

          }

              

                 

             if(country.val()=='')

          {

            

               country.focus();

            $('#country_valid').html('<div><font color="red"> Enter The Contry</font></div>');



        country.keyup(function(){



                      $('#country_valid').html('');

                  });

            return false;

          }





          

         });

    

    });



  </script>