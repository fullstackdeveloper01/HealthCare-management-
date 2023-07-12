<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
	<div class="content">
		<div class="row">
			<div class="col-md-4">
				<div class="panel_s">
				    <?= form_open_multipart(admin_url('policy/add'), array('id' => 'import_form'));  ?>
    					<div class="panel-body">
    					   <div class="form-group">
    					       <?= _l('Name'); ?>
    					       <input type="text" required autocomplete="off" class="form-control" name="name" required>
    					   </div>
    					   <div class="form-group">
    					       <?= _l('File'); ?><small>[Note: File extention only 'PDF']</small>
    					       <input type="file" required autocomplete="off" class="form-control" name="policy" required accept="application/pdf">
    					   </div>
    					   <div class="form-group">
    					       <button type="submit" class="btn btn-success">Save</button>
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
							<a href="<?php echo admin_url('policy/add'); ?>" class="btn btn-info pull-left display-block"><?php echo _l('new '.$sh_text); ?></a>
						</div>
						-->
						<h4 class="customer-profile-group-heading"><?= _l($title); ?></h4>
						<hr class="hr-panel-heading" />
						<?php render_datatable(array(
							_l('Name'),
							_l('Created Date'),
							_l('options')
							),'policy'); 
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php init_tail(); ?>
	<script>
		initDataTable('.table-policy', window.location.href, [1], [1]);
		
		$(function(){
            appValidateForm($('#import_form'),{policy:{required:true,extension: "pdf"}});
        });
	</script>
</body>
</html>
