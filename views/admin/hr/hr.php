<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<style>
    select option{
        color:#000;
    }
</style>
<div id="wrapper">
	<div class="content">
		<div class="row">
		    <div class="col-md-12">
				<div class="panel_s">
					<div class="panel-body">
						<h4 class="customer-profile-group-heading"><?= _l($title); ?></h4>
    				    <?= form_open_multipart(admin_url('hr/add/'.$article->userid), array('id' => 'hrForm'));  ?>
        					<div class="row">
        					     <?php
                                    if(isset($article))
                                    {
                                        $filename = $this->db->order_by('id','DESC')->get_where(db_prefix().'files', array('rel_id' => $article->userid, 'rel_type' => 'profile_image'))->row('file_name');
                                        ?>
                                           <div class="col-md-2 form-group">
                                               <?= _l('Select Profile'); ?>
                                               <a href="<?= base_url('uploads/profile_image/'.$article->userid.'/'.$filename); ?>" target="_blank" ><img onerror="this.style.display = 'none'" src="<?= base_url('uploads/profile_image/'.$article->userid.'/'.$filename); ?>" width="100" height="100">
                                               <?php //$filename; ?></a>
                                           </div> 
                                        <?php
                                    }
                               ?>
                               
                                <div class="col-md-4 form-group">
                                   <?= _l('Profile Upload'); ?><sup></sup>
                                   <input type="file" class="form-control" name="profile_image" id="profile_images" accept="image/*">
                               </div>
        					   
        					   
    					    </div>

                            <div class="row">
                               <div class="col-md-4 form-group">
                                   <?= _l('First name'); ?><span class="text-danger">*</span>
                                   <input type="text" class="form-control"  maxlength="20" minlength="2"  name="firstname" required value="<?= (isset($article)?$article->firstname:""); ?>">
                               </div>
                               <div class="col-md-4 form-group">
                                   <?= _l('Last name'); ?><span class="text-danger">*</span>
                                   <input type="text" class="form-control"  maxlength="20" minlength="2"  name="lastname" required value="<?= (isset($article)?$article->lastname:""); ?>">
                               </div>
                               <div class="col-md-4 form-group">
                                   <?= _l('Mobile'); ?><span class="text-danger">*</span>
                                   <input type="text" class="form-control" minlength="9" required maxlength="12" name="phonenumber" value="<?= (isset($article)?$article->phonenumber:""); ?>">
                               </div> 
                            </div>
        					<div class="row">
    					       <div class="col-md-4 form-group">
        					       <?= _l('Email'); ?><span class="text-danger">*</span>
        					       <input type="email" class="form-control"  maxlength="50" name="email"  required value="<?= (isset($article)?$article->email:""); ?>">
                                   <span id="email_error"></span>
        					       <!-- <input type="email" class="form-control"  maxlength="50" name="email" required value="<?= (isset($article)?$article->email:""); ?>" <?= (isset($article)?'disabled':""); ?>> -->
        					   </div>
        					   <?php
        					        if(isset($article))
        					        {}
        					        else
        					        {
        					            ?>
        					               <div class="col-md-4 form-group">
                    					       <?= _l('Password'); ?><span class="text-danger">*</span>
                    					       <input type="password" class="form-control" name="password" required value="<?= (isset($article)?$article->password:""); ?>">
                    					   </div> 
        					            <?php
        					        }
        					   ?>
        					   <div class="col-md-4 form-group">
        					       <?= _l('Date of birth'); ?><span class="text-danger">*</span>
        					       <input type="text" class="form-control"  required name="dob" id="dob" value="<?= (isset($article)?getDateDMYOnly($article->dob):""); ?>">
        					   </div> 
    					    </div>
        					<div class="row">
    					       <div class="col-md-4 form-group">
        					       <?= _l('Date of joining'); ?><span class="text-danger">*</span>
        					       <input type="text" class="form-control"  name="doj"  id="doj" required value="<?= (isset($article)?getDateDMYOnly($article->doj):""); ?>">
        					   </div>

    					      
        					   <div class="col-md-4 form-group">
        					       <?= _l('Program/Department'); ?><span class="text-danger">*</span>
        					       <!--<input type="text" class="form-control" required name="department_id" value="<?= (isset($article)?$article->designation_id:""); ?>">-->
        					       <select name="department_id[]" placeholder="Select Department"  class="form-control selectpicker" required data-live-search="true" multiple="">
        					           <!-- <option>Select Department</option> -->

                                       <?php 
                                       if($article->department_id!=''){
                                                $department_ids = explode(",",$article->department_id);
                                                
                                                $result_m = $this->db->get_where(db_prefix().'department')->result();

                                            foreach($result_m as $row_m)
                                            {
                                                if (in_array($row_m->id, $department_ids))
                                                {
                                                    echo $selected = 'selected';
                                                }
                                                else
                                                {
                                                    echo    $selected = '';
                                                }   
                                              
                                                    echo "<option value='".$row_m->id."' ".$selected." >".$row_m->name."</option>";
                                                
                                            }
                                         }else{
                                          ?>
                                          <?php
                                            if($department_res)
                                            {
                                                foreach($department_res as $r)
                                                {
                                                    ?>
                                                        <option value="<?= $r->id; ?>" ><?= $r->name; ?></option>
                                                    <?php
                                                }
                                            }
                                       ?> 

                                      <?php } ?>


        					           
        					       </select>
        					   </div> 
    					    </div>
    					    <div class="row">
    					        <div class="col-md-12 form-group">
        					       <?= _l('Address'); ?>
        					       <input type="text" class="form-control"  name="address" value="<?= (isset($article)?$article->address:""); ?>">
        					   </div>
    					    </div>
                  <div class="row">
                    <div class="col-md-3 form-group">
                      <?php 
                        $country_list = $this->db->get_where(db_prefix().'country')->result();

                      ?>
                        <label><?= _l('Country'); ?><span class='text-danger'>*</span></label>
                        <select class="form-control selectpicker" data-live-search="true" name="country" required  onchange="getStatelist(this.value);">
                              <option value=""></option>
                              <?php
                                  if($country_list)
                                  {
                                      foreach($country_list as $res)
                                      {
                                          ?>
                                              <option <?= ($article->country == $res->id)?"selected":""; ?> value="<?= $res->id; ?>"><?= $res->name; ?></option>
                                          <?php
                                      }
                                  }
                              ?>
                         </select>
                    </div>
                    <?php 
                        

                      ?>
                    <div class="col-md-3 form-group">
                        <label><?= _l('State'); ?><span class='text-danger'>*</span></label>
                         <select class="form-control" name="state" required id="state" onchange="getCitylist(this.value);">
                          
                            <?php
                            if($article->state!=''){
                                $state_list = $this->db->get_where(db_prefix().'state',array('country_id'=>$article->country))->result();
                                    if($state_list)
                                    {
                                        foreach($state_list as $res)
                                        {
                                            ?>
                                                <option <?= ($article->state == $res->id)?"selected":""; ?> value="<?= $res->id; ?>"><?= $res->name; ?></option>
                                            <?php
                                        }
                                    }
                            }
                            else
                            { 
                            ?>
                                <option value=""></option>
                            <?php } ?>
                        
                         </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label><?= _l('City'); ?><span class='text-danger'>*</span></label>
                         <select class="form-control" name="city" required id="city">
                            <?php 
                            if($article->city!=''){
                                $city_list = $this->db->get_where(db_prefix().'city',array('state_id'=>$article->state))->result();    
                                if($city_list)
                                {
                                    foreach($city_list as $res)
                                    {
                                        ?>
                                            <option <?= ($article->city == $res->id)?"selected":""; ?> value="<?= $res->id; ?>"><?= $res->name; ?></option>
                                        <?php
                                    }
                                }
                           
                            }
                            else
                            { 
                            ?>
                            <option value=""></option>
                        <?php } ?>
                         </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label><?= _l('Postal Code'); ?><span class='text-danger'>*</span></label>
                        <input type="text" class="form-control" name="postal_code" value="<?= @$article->postal_code; ?>" required>
                    </div>
                  </div>
                  <!-- <div class="row">
                      <div class="col-md-12 form-group">
                         <?= _l('Favorite Food'); ?>
                         <input type="text" class="form-control"  name="favorite_food" value="<?= (isset($article)?$article->favorite_food:""); ?>">
                     </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12 form-group">
                         <?= _l('Favorite Sport'); ?>
                         <input type="text" class="form-control"  name="favorite_sport" value="<?= (isset($article)?$article->favorite_sport:""); ?>">
                     </div>
                  </div>
                  <s class="row">
                      <div class="col-md-12 form-group">
                         <?= _l('Travel Destination'); ?>
                         <input type="text" class="form-control"  name="favorite_destination" value="<?= (isset($article)?$article->favorite_destination:""); ?>">
                     </div>
                  </div> -->
    					    <hr class="hr-panel-heading" />
    					    <div class="row">
        					   <div class="col-md-6 form-group">
        					       <button type="submit" class="btn btn-success">Save</button>
        					       <a href="<?= admin_url('hr')?>" class="btn btn-warning">Cancel</a>
        					   </div>
        				    </div>
        				</form>
        			</div>
    			</div>
			</div>
		</div>
	</div>
</div>
<?php init_tail(); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  
    <script>
		initDataTable('.table-hr', window.location.href, [1], [1],'',[0,'desc']);
	</script>
	<script>

$( document ).ready(function() {
  $("#dob").datepicker({
    //minDate: new Date(1900,1-1,1), maxDate: '-16Y',
    dateFormat: 'dd-mm-yy',
    changeMonth: true,
    changeYear: true,
    yearRange: '1911:2005'
  });
  $("#doj").datepicker({
      dateFormat: 'dd-mm-yy',
      changeMonth: true,
      changeYear: true,
  });
});

        $(function(){
            <?php
                if(isset($article))
                {
                    ?>
                        appValidateForm($('#hrForm'),{firstname:'required',phonenumber:'required',dob:'required',doj:'required',address:'required',department_id:'required'});
                    <?php
                }
                else
                {
                    ?>
                        appValidateForm($('#hrForm'),{firstname:'required',phonenumber:'required',email:'required',password:'required',dob:'required',doj:'required',address:'required',department_id:'required'});
                    <?php
                }
            ?>
        });

        function getStatelist(Id)
    {
        $('#state').html('<option value="">Please wait...</option>');
        $('#city').html('<option value=""></option>');
        var str = "country="+Id+"&"+csrfData['token_name']+"="+csrfData['hash'];
        $.ajax({
            url: '<?= admin_url()?>clients/getStatelist',
            type: 'POST',
            data: str,
            datatype: 'json',
            cache: false,
            success: function(resp_){
                if(resp_)
                {
                    var resp = JSON.parse(resp_);
                    var res = '<option value=""></option>';
                    for(var i=0; i<resp.length; i++)
                    {
                       res += '<option value="'+resp[i].id+'">'+resp[i].name+'</option>';
                    }
                    $('#state').html(res);
                }
                else
                {
                    $('#state').html('<option value=""></option>');
                }
            }
        });
    }
    
    function getCitylist(Id)
    {
        $('#city').html('<option value="">Please wait...</option>');
        var str = "state="+Id+"&"+csrfData['token_name']+"="+csrfData['hash'];
        $.ajax({
            url: '<?= admin_url()?>clients/getCitylist',
            type: 'POST',
            data: str,
            datatype: 'json',
            cache: false,
            success: function(resp_){
                if(resp_)
                {
                    var resp = JSON.parse(resp_);
                    var res = '<option value=""></option>';
                    for(var i=0; i<resp.length; i++)
                    {
                       res += '<option value="'+resp[i].id+'">'+resp[i].name+'</option>';
                    }
                    $('#city').html(res);
                }
                else
                {
                    $('#city').html('<option value=""></option>');
                }
            }
        });
    }
    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
	</script>
    <script>
        $(document).ready(function(){
            $('input[type="email"]').keyup(function(){
                let email =($(this).val());
                if(isEmail(email)==true){
                    $.ajax({
                        url: '<?= site_url('admin/hr/checkEmail/').$this->uri->segment(4);?>',
                        type: 'POST',
                        data: {'email':email},
                        datatype: 'json',
                        cache: false,
                        success: function(resp_response){
                            if(resp_response==0){
                                $('#email_error').text('Invalid email');
                                $('#email_error').css('color','red');
                                $('.btn-success').attr('type','button');
                            }else{
                                $('#email_error').text('Valid email');
                                $('#email_error').css('color','green');
                                $('.btn-success').attr('type','submit');
                            }
                        }
                    });
                }else{
                    $('#email_error').text('Invalid email');
                    $('#email_error').css('color','red');
                    $('.btn-success').attr('type','button');
                }
            })
        });
        $("input[name=profile_image]").on('change',function(e){
            let file = e.target.files[0];
            if(file['type']=='image/jpeg' || file['type']=='image/jpg' || file['type']=='image/png' || file['type']=='image/gif' ){
               
            }else{
                alert('Please upload valid profile.');
                $('input[name=profile_image]').val('');
            }

        });
    </script>
</body>
</html>
