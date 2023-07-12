<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
	<div class="content">
		<div class="row">
			<div class="col-md-4">
				<div class="panel_s">
				    <?= form_open_multipart(admin_url('carePlan/add/'.$article->id));  ?>
    					<div class="panel-body">
    					   <div class="form-group">
    					       <?= _l('Title'); ?>
    					       <input type="text" required autocomplete="off" class="form-control" value="<?= $article->title; ?>" name="title" required>
    					   </div>
    					   <div class="form-group">
    					       <?= _l('Officer'); ?>
    					       <input type="text" required autocomplete="off" class="form-control" value="<?= $article->officer; ?>" name="officer" required>
    					   </div>
    					   <?php
    					        if(isset($article))
    					        {
    					            $filename = $this->db->get_where(db_prefix().'files', array('rel_id' => $article->id, 'rel_type' => 'care_plan'))->row('file_name');
    					            ?>
    					               <div class="col-md-2 form-group">
                					       <?= _l('Select Upload'); ?>
                					       <a href="<?= base_url('uploads/care_plan/'.$article->id.'/'.$filename); ?>" target="_blank"><?= $filename; ?></a>
                					   </div> 
    					            <?php
    					        }
    					   ?>
					       <div class="form-group">
    					       <?= _l('Upload'); ?><span class="text-danger">*</span><sup>[Only 'PDF']</sup>
    					       <input type="file" class="form-control" name="care_plan" accept="application/pdf" >
    					   </div>
    					  
    					   <div class="form-group">
    					       <button type="submit" class="btn btn-success">Update</button>
    					   </div>
    					</div>
    				</form>
    			</div>
			</div>
			<div class="col-md-8">
				<div class="panel_s">
					<div class="panel-body">
					    <!--
						<div class="_buttons">
							<a href="<?php echo admin_url('carePlan/add'); ?>" class="btn btn-info pull-left display-block"><?php echo _l('new '.$sh_text); ?></a>
						</div>
						-->
						<h4 class="customer-profile-group-heading"><?= _l($title); ?></h4>
						<hr class="hr-panel-heading" />
						<?php render_datatable(array(
							_l('Title'),
							_l('Officer'),
							_l('Created Date'),
							_l('File'),
							_l('options')
							),'carePlan'); 
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php init_tail(); ?>
	<script>
		initDataTable('.table-carePlan', window.location.href, [1], [1]);
		$("input[name=care_plan]").on('change',function(e){debugger;
            let file = e.target.files[0];
            if(file['type']=='application/pdf'){
               
            }else{
                alert('Only PDF are allowed.');
                $('input[name=care_plan]').val('');
            }

    	});

	</script>
</body>
</html>
