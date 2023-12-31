<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
	<div class="content">
		<div class="row">
			<div class="col-md-4">
				<div class="panel_s">
				    <?= form_open_multipart(admin_url('slider/add/'.$article->id), array('id' => 'import_form'));  ?>
    					<div class="panel-body">
    					   <div class="form-group">
    					       <?= _l('Slider'); ?>
    					       <input type="file" filesize="<?php echo file_upload_max_size(); ?>" class="form-control" name="slider">
    					       <?php
    					            if(isset($article))
    					            {
    					                $filename = $this->db->get_where(db_prefix().'files', array('rel_id' => $article->id, 'rel_type' => 'slider'))->row('file_name');
    					                echo '<img src="'.site_url('uploads/slider/'.$article->id.'/'. $filename).'" width="50" height="50" alt="">';
    					            }
    					       ?>
    					   </div>
    					   <div class="form-group">
    					       <?= _l('Title'); ?>
    					       <input type="text" name="title" maxlength ="100" value="<?= (isset($article))?$article->title:''; ?>" required class="form-control">
    					   </div>
    					   <div class="form-group">
    					       <?= _l('Heading'); ?>
    					       <input type="text" name="heading" maxlength="100" value="<?= (isset($article))?$article->heading:''; ?>" required class="form-control">
    					   </div>
    					   <div class="form-group">
    					       <?= _l('Description'); ?>
    					       <input type="text" name="description" maxlength="100" value="<?= (isset($article))?$article->description:''; ?>" required class="form-control">
    					   </div>
    					   <div class="form-group">
    					       <button type="submit" class="btn btn-info">Save</button>
    					       <?php
    					            if(isset($article))
    					            {
    					                echo '<a href="'.admin_url().'slider" class="btn btn-warning pull-right">Cancel</a>';
    					            }
    					       ?>
    					   </div>
    					</div>
    				</form>
    			</div>
			</div>
			<div class="col-md-8">
				<div class="panel_s">
					<div class="panel-body">
						<h4 class="customer-profile-group-heading"><?= _l($title); ?></h4>
						<hr class="hr-panel-heading" />
						<?php render_datatable(array(
							_l('SN'),
							_l('Image'),
							_l('Title'),
							_l('Heading'),
							_l('Description'),
							_l('Status'),
							_l('options')
							),'slider'); 
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php init_tail(); ?>
	<script>
		initDataTable('.table-slider', window.location.href, [1], [1]);
		var sid = '<?= $article->id ?>';
		$(function(){
		    if(sid)
                appValidateForm($('#import_form'),{slider:{extension: "png,jpg,jpeg,gif"}});
            else
                appValidateForm($('#import_form'),{slider:{required:true,extension: "png,jpg,jpeg,gif"}});
        });     

	</script>
</body>
</html>
