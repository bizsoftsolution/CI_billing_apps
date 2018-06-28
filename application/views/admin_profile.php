<?php foreach($admin as $val) { ?>

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
        Add Admin
      </header>
      <div class="panel-body">
        <!-- this is start the content inside the div -->
        <form name="form" class="form-horizontal" action="<?php echo base_url();?>customer/add_admin" method="post">
          <div class="form-group">
            <label class="control-label col-sm-3">UserName</label>
            <div class="col-sm-5">
              <input type="text" type="text"  name="username"  class="form-control" placeholder="Username">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3">Current Password</label>
            <div class="col-sm-5">

              <input type="password" class="form-control" name="c_password" placeholder="**********" id="old">
               <input type="hidden" class="form-control" name="password" placeholder="**********"  value="<?php echo $val['password'];?>" id="password">
            </div>
            <div id="old_valid"></div>
          </div>

  <div class="form-group">
            <label class="control-label col-sm-3">New password</label>
            <div class="col-sm-5">
              <input type="password" class="form-control" name="password" id="new" placeholder="**********">
            </div>
            <div id="valid"></div>
            
          </div> 
           <div class="form-group">
            <label class="control-label col-sm-3">Re-enter password</label>
            <div class="col-sm-5">
              <input type="password" class="form-control" name=""  placeholder="**********" id="reenter">
            </div>
           <div id="new_valid"></div>
          </div> 

          <div class="col-sm-offset-2" style="margin-left:200px">
            <input type="submit" name="submit" value="submit" id="submit" class="btn btn-primary">                     

          </div>                      

        </form>                    

        <div class="clearfix"></div>
      </div>
    </section>
  </div> 

</div>

<?php } ?>
<script>

$(document).ready(function(){
  $('#submit').click(function(){
        var old_pass=$('#old');
        var old=$('#old').val();          
        var password=$('#password').val(); 
        var new_pa=$('#new');                  
        var new_pass=$('#new').val();        
        var new_password=$('#reenter');
        var reenter=$('#reenter').val();
        
          if(old!=password)
          {
            old_pass.focus();
            $('#old_valid').html('<div><font color="red">Enter the correct password</div>');
            old_pass.keyup(function(){
                $('#old_valid').html('');
            });
            return false;
          }
           if(new_pass=='')
          {          
            new_pa.focus();
            $('#valid').html('<div><font color="red">Enter the  password</div>');
            new_pa.keyup(function(){
                $('#valid').html('');
            });
            return false;
          }
          if(new_pass!=reenter)
          {
            new_password.focus();
            $('#new_valid').html('<div><font color="red">Enter the above password</div>');
            new_password.keyup(function(){
                $('#new_valid').html('');
            });
            return false;
          }

   
});
});
</script>




