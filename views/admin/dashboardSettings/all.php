<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php init_head(); ?>
<div id="wrapper">
 <div class="content">
  <?php echo form_open($this->uri->uri_string()); ?>
    <div class="row">
     <?php if ($this->session->flashdata('debug')) {
        ?>
       <div class="col-lg-12">
        <div class="alert alert-warning">
         <?php echo $this->session->flashdata('debug'); ?>
       </div>
     </div>
    <?php
    } ?>
     <div class="col-md-3">
        <ul class="nav navbar-pills navbar-pills-flat nav-tabs nav-stacked">
            <li class="active">
                <a href="#" data-group="dashboard-setting">
                    Main Box
                </a>
            </li>
            <li>
                <a href="<?= admin_url('dashboardSetting/countBox');?>">
                    Count Box
                </a>
            </li>
            <li>
                <a href="<?= admin_url('dashboardSetting/graphBox');?>">
                    Graph Box
                </a>
            </li>
        </ul>
        <div class="panel_s">
            <div class="btn-bottom-toolbar text-right">
                <button type="submit" class="btn btn-info">
                    <?php echo _l('settings_save'); ?>
                </button>
            </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="panel_s">
         <div class="panel-body">
          <?php hooks()->do_action('before_settings_group_view', 'dashboard-setting'); ?>
            <div class="row">
            	<div class="col-md-12">
            	    <div class="form-group">
            	        <h4>First Box Setting</h4>
            	    </div>
            	    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="box_one_bgcolor" class="control-label">Background Color</label>
                            <div class="input-group mbot15 colorpicker-input colorpicker-element">
                                <input type="text" value="#<?= $box_result[0]->bg_color; ?>" name="box_one_bgcolor" id="box_one_bgcolor" class="form-control">
                                <span class="input-group-addon"><i style="background-color: rgb(255, 111, 0);"></i></span>
                            </div>
                        </div> 
                        <div class="form-group col-md-3">
                        <label for="box_one_hovercolor" class="control-label">Hover Color</label>
                            <div class="input-group mbot15 colorpicker-input colorpicker-element">
                                <input type="text" value="#<?= $box_result[0]->hover_color; ?>" name="box_one_hovercolor" id="box_one_hovercolor" class="form-control">
                                <span class="input-group-addon"><i style="background-color: rgb(255, 111, 0);"></i></span>
                            </div>
                        </div> 
                        <div class="form-group col-md-3">
                        <label for="box_one_iconcolor" class="control-label">Icon Color</label>
                            <div class="input-group mbot15 colorpicker-input colorpicker-element">
                                <input type="text" value="#<?= $box_result[0]->icon_color; ?>" name="box_one_iconcolor" id="box_one_iconcolor" class="form-control">
                                <span class="input-group-addon"><i style="background-color: rgb(255, 111, 0);"></i></span>
                            </div>
                        </div> 
                        <div class="form-group col-md-3">
                            <label>Icon</label>
                            <div class="input-group iconpicker-container">
                                <input type="text" value="<?= $box_result[0]->icon; ?>" class="form-control icon-picker iconpicker-element iconpicker-input" name="box_one_icon" id="box_one_icon">
                                <span class="input-group-addon">
                                    <i class="<?= $box_result[0]->icon; ?> iconpicker-component"></i>
                                 </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="box_one_heading_one" class="control-label">Heading 1</label>
                            <input type="text" id="box_one_heading_one" value="<?= $box_result[0]->heading_one; ?>" name="box_one_heading_one" class="form-control" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="box_one_heading_one_color" class="control-label">Heading 1 Color</label>
                            <div class="input-group mbot15 colorpicker-input colorpicker-element">
                                <input type="text" value="#<?= $box_result[0]->heading_one_color; ?>" name="box_one_heading_one_color" id="box_one_heading_one_color" class="form-control">
                                <span class="input-group-addon"><i style="background-color: rgb(255, 111, 0);"></i></span>
                            </div>
                        </div> 
                        <div class="form-group col-md-3">
                            <label for="box_one_heading_two" class="control-label">Heading 2</label>
                            <input type="text" id="box_one_heading_two" value="<?= $box_result[0]->heading_two; ?>" name="box_one_heading_two" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="box_one_heading_two_color" class="control-label">Heading 2 Color</label>
                            <div class="input-group mbot15 colorpicker-input colorpicker-element">
                                <input type="text" value="#<?= $box_result[0]->heading_two_color; ?>" name="box_one_heading_two_color" id="box_one_heading_two_color" class="form-control">
                                <span class="input-group-addon"><i style="background-color: rgb(255, 111, 0);"></i></span>
                            </div>
                        </div> 
                    </div>    
                    <div class="row">    
                        <div class="form-group col-md-3">
                            <label for="box_one_Link" class="control-label">Link</label>
                            <select id="box_one_Link" name="box_one_Link" class="form-control">
                                <option value=""></option>
                                <option value="clients" <?= ($box_result[0]->link == "clients")?"selected":"";?>>User's List</option>
                                <option value="employee" <?= ($box_result[0]->link == "employee")?"selected":"";?>>Employee</option>
                                <option value="proposals" <?= ($box_result[0]->link == "proposals")?"selected":"";?>>Proposals</option>
                                <option value="estimates" <?= ($box_result[0]->link == "estimates")?"selected":"";?>>Estimates</option>
                                <option value="invoices" <?= ($box_result[0]->link == "invoices")?"selected":"";?>>Invoices</option>
                                <option value="payments" <?= ($box_result[0]->link == "payments")?"selected":"";?>>Payments</option>
                                <option value="subscriptions" <?= ($box_result[0]->link == "subscriptions")?"selected":"";?>>Subscriptions</option>
                                <option value="expenses" <?= ($box_result[0]->link == "expenses")?"selected":"";?>>Expenses</option>
                                <option value="tickets" <?= ($box_result[0]->link == "tickets")?"selected":"";?>>Supports</option>
                                <option value="knowledge_base" <?= ($box_result[0]->link == "knowledge_base")?"selected":"";?>>Knowledge Base</option>
                                <option value="roles" <?= ($box_result[0]->link == "roles")?"selected":"";?>>Roles</option>
                                <option value="loginPage" <?= ($box_result[0]->link == "loginPage")?"selected":"";?>>Login Page</option>
                                <option value="staff" <?= ($box_result[0]->link == "staff")?"selected":"";?>>Admin Users</option>
                                <option value="taxes" <?= ($box_result[0]->link == "taxes")?"selected":"";?>>Taxes Rate</option>
                                <option value="currencies" <?= ($box_result[0]->link == "currencies")?"selected":"";?>>Currencies</option>
                                <option value="projects" <?= ($box_result[0]->link == "projects")?"selected":"";?>>Projects</option>
                                 <option value="reports/appointment" <?= ($box_result[0]->link == "reports/appointment")?"selected":"";?>>Appointment</option>
                            </select>
                        </div>
                    </div>
            	</div>
            	<div class="col-md-12">
            	    <div class="form-group">
            	       <hr> <h4>Second Box Setting</h4>
            	    </div>
            	    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="box_two_bgcolor" class="control-label">Background Color</label>
                            <div class="input-group mbot15 colorpicker-input colorpicker-element">
                                <input type="text" value="#<?= $box_result[1]->bg_color; ?>" name="box_two_bgcolor" id="box_two_bgcolor" class="form-control">
                                <span class="input-group-addon"><i style="background-color: rgb(255, 111, 0);"></i></span>
                            </div>
                        </div> 
                        <div class="form-group col-md-3">
                        <label for="box_two_hovercolor" class="control-label">Hover Color</label>
                            <div class="input-group mbot15 colorpicker-input colorpicker-element">
                                <input type="text" value="#<?= $box_result[1]->hover_color; ?>" name="box_two_hovercolor" id="box_two_hovercolor" class="form-control">
                                <span class="input-group-addon"><i style="background-color: rgb(255, 111, 0);"></i></span>
                            </div>
                        </div> 
                        <div class="form-group col-md-3">
                        <label for="box_two_iconcolor" class="control-label">Icon Color</label>
                            <div class="input-group mbot15 colorpicker-input colorpicker-element">
                                <input type="text" value="#<?= $box_result[1]->icon_color; ?>" name="box_two_iconcolor" id="box_two_iconcolor" class="form-control">
                                <span class="input-group-addon"><i style="background-color: rgb(255, 111, 0);"></i></span>
                            </div>
                        </div> 
                        <div class="form-group col-md-3">
                            <label>Icon</label>
                            <div class="input-group iconpicker-container">
                                <input type="text" value="<?= $box_result[1]->icon; ?>" class="form-control icon-picker iconpicker-element iconpicker-input" name="box_two_icon" id="box_two_icon">
                                <span class="input-group-addon">
                                    <i class="<?= $box_result[1]->icon; ?> iconpicker-component"></i>
                                 </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="box_two_heading_one" class="control-label">Heading 1</label>
                            <input type="text" id="box_two_heading_one" value="<?= $box_result[1]->heading_one; ?>" name="box_two_heading_one" class="form-control" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="box_two_heading_one_color" class="control-label">Heading 1 Color</label>
                            <div class="input-group mbot15 colorpicker-input colorpicker-element">
                                <input type="text" value="#<?= $box_result[1]->heading_one_color; ?>" name="box_two_heading_one_color" id="box_two_heading_one_color" class="form-control">
                                <span class="input-group-addon"><i style="background-color: rgb(255, 111, 0);"></i></span>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="box_two_heading_two" class="control-label">Heading 2</label>
                            <input type="text" id="box_two_heading_two" value="<?= $box_result[1]->heading_two; ?>" name="box_two_heading_two" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="box_two_heading_two_color" class="control-label">Heading 2 Color</label>
                            <div class="input-group mbot15 colorpicker-input colorpicker-element">
                                <input type="text" value="#<?= $box_result[1]->heading_two_color; ?>" name="box_two_heading_two_color" id="box_two_heading_two_color" class="form-control">
                                <span class="input-group-addon"><i style="background-color: rgb(255, 111, 0);"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="box_two_Link" class="control-label">Link</label>
                            <select id="box_two_Link" name="box_two_Link" class="form-control">
                                <option value=""></option>
                                <option value="clients" <?= ($box_result[1]->link == "clients")?"selected":"";?>>User List</option>
                                <option value="employee" <?= ($box_result[1]->link == "employee")?"selected":"";?>>Employee</option>
                                <option value="proposals" <?= ($box_result[1]->link == "proposals")?"selected":"";?>>Proposals</option>
                                <option value="estimates" <?= ($box_result[1]->link == "estimates")?"selected":"";?>>Estimates</option>
                                <option value="invoices" <?= ($box_result[1]->link == "invoices")?"selected":"";?>>Invoices</option>
                                <option value="payments" <?= ($box_result[1]->link == "payments")?"selected":"";?>>Payments</option>
                                <option value="subscriptions" <?= ($box_result[1]->link == "subscriptions")?"selected":"";?>>Subscriptions</option>
                                <option value="expenses" <?= ($box_result[1]->link == "expenses")?"selected":"";?>>Expenses</option>
                                <option value="tickets" <?= ($box_result[1]->link == "tickets")?"selected":"";?>>Supports</option>
                                <option value="knowledge_base" <?= ($box_result[1]->link == "knowledge_base")?"selected":"";?>>Knowledge Base</option>
                                <option value="roles" <?= ($box_result[1]->link == "roles")?"selected":"";?>>Roles</option>
                                <option value="loginPage" <?= ($box_result[1]->link == "loginPage")?"selected":"";?>>Login Page</option>
                                <option value="staff" <?= ($box_result[1]->link == "staff")?"selected":"";?>>Admin Users</option>
                                <option value="taxes" <?= ($box_result[1]->link == "taxes")?"selected":"";?>>Taxes Rate</option>
                                <option value="currencies" <?= ($box_result[1]->link == "currencies")?"selected":"";?>>Currencies</option>
                                <option value="projects" <?= ($box_result[1]->link == "projects")?"selected":"";?>>Projects</option>
                                <option value="reports/appointment" <?= ($box_result[1]->link == "reports/appointment")?"selected":"";?>>Appointment</option>
                            </select>
                        </div>
                    </div>
            	</div>
            	<div class="col-md-12">
            	    <div class="form-group">
            	       <hr> <h4>Third Box Setting</h4>
            	    </div>
            	    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="box_third_bgcolor" class="control-label">Background Color</label>
                            <div class="input-group mbot15 colorpicker-input colorpicker-element">
                                <input type="text" value="#<?= $box_result[2]->bg_color; ?>" name="box_third_bgcolor" id="box_third_bgcolor" class="form-control">
                                <span class="input-group-addon"><i style="background-color: rgb(255, 111, 0);"></i></span>
                            </div>
                        </div> 
                        <div class="form-group col-md-3">
                        <label for="box_third_hovercolor" class="control-label">Hover Color</label>
                            <div class="input-group mbot15 colorpicker-input colorpicker-element">
                                <input type="text" value="#<?= $box_result[2]->hover_color; ?>" name="box_third_hovercolor" id="box_third_hovercolor" class="form-control">
                                <span class="input-group-addon"><i style="background-color: rgb(255, 111, 0);"></i></span>
                            </div>
                        </div> 
                        <div class="form-group col-md-3">
                        <label for="box_third_iconcolor" class="control-label">Icon Color</label>
                            <div class="input-group mbot15 colorpicker-input colorpicker-element">
                                <input type="text" value="#<?= $box_result[2]->icon_color; ?>" name="box_third_iconcolor" id="box_third_iconcolor" class="form-control">
                                <span class="input-group-addon"><i style="background-color: rgb(255, 111, 0);"></i></span>
                            </div>
                        </div> 
                        <div class="form-group col-md-3">
                            <label>Icon</label>
                            <div class="input-group iconpicker-container">
                                <input type="text" value="<?= $box_result[2]->icon; ?>" class="form-control icon-picker iconpicker-element iconpicker-input" name="box_third_icon" id="box_third_icon">
                                <span class="input-group-addon">
                                    <i class="<?= $box_result[2]->icon; ?> iconpicker-component"></i>
                                 </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="box_third_heading_one" class="control-label">Heading 1</label>
                            <input type="text" id="box_third_heading_one" value="<?= $box_result[2]->heading_one; ?>" name="box_third_heading_one" class="form-control" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="box_third_heading_one_color" class="control-label">Heading 1 Color</label>
                            <div class="input-group mbot15 colorpicker-input colorpicker-element">
                                <input type="text" value="#<?= $box_result[2]->heading_one_color; ?>" name="box_third_heading_one_color" id="box_third_heading_one_color" class="form-control">
                                <span class="input-group-addon"><i style="background-color: rgb(255, 111, 0);"></i></span>
                            </div>
                        </div> 
                        <div class="form-group col-md-3">
                            <label for="box_third_heading_two" class="control-label">Heading 2</label>
                            <input type="text" id="box_third_heading_two" value="<?= $box_result[2]->heading_two; ?>" name="box_third_heading_two" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="box_third_heading_two_color" class="control-label">Heading 2 Color</label>
                            <div class="input-group mbot15 colorpicker-input colorpicker-element">
                                <input type="text" value="#<?= $box_result[2]->heading_two_color; ?>" name="box_third_heading_two_color" id="box_third_heading_two_color" class="form-control">
                                <span class="input-group-addon"><i style="background-color: rgb(255, 111, 0);"></i></span>
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="box_third_Link" class="control-label">Link</label>
                            <select id="box_third_Link" name="box_third_Link" class="form-control">
                                <option value=""></option>
                                <option value="clients" <?= ($box_result[2]->link == "clients")?"selected":"";?>>User List</option>
                                <option value="employee" <?= ($box_result[2]->link == "employee")?"selected":"";?>>Employee</option>
                                <option value="proposals" <?= ($box_result[2]->link == "proposals")?"selected":"";?>>Proposals</option>
                                <option value="estimates" <?= ($box_result[2]->link == "estimates")?"selected":"";?>>Estimates</option>
                                <option value="invoices" <?= ($box_result[2]->link == "invoices")?"selected":"";?>>Invoices</option>
                                <option value="payments" <?= ($box_result[2]->link == "payments")?"selected":"";?>>Payments</option>
                                <option value="subscriptions" <?= ($box_result[2]->link == "subscriptions")?"selected":"";?>>Subscriptions</option>
                                <option value="expenses" <?= ($box_result[2]->link == "expenses")?"selected":"";?>>Expenses</option>
                                <option value="tickets" <?= ($box_result[2]->link == "tickets")?"selected":"";?>>Supports</option>
                                <option value="knowledge_base" <?= ($box_result[2]->link == "knowledge_base")?"selected":"";?>>Knowledge Base</option>
                                <option value="roles" <?= ($box_result[2]->link == "roles")?"selected":"";?>>Roles</option>
                                <option value="loginPage" <?= ($box_result[2]->link == "loginPage")?"selected":"";?>>Login Page</option>
                                <option value="staff" <?= ($box_result[2]->link == "staff")?"selected":"";?>>Admin Users</option>
                                <option value="taxes" <?= ($box_result[2]->link == "taxes")?"selected":"";?>>Taxes Rate</option>
                                <option value="currencies" <?= ($box_result[2]->link == "currencies")?"selected":"";?>>Currencies</option>
                                <option value="projects" <?= ($box_result[2]->link == "projects")?"selected":"";?>>Projects</option>
                                <option value="reports/appointment" <?= ($box_result[2]->link == "reports/appointment")?"selected":"";?>>Appointment</option>
                            </select>
                        </div>
                    </div>
            	</div>
            	<div class="col-md-12">
            	    <div class="form-group">
            	       <hr> <h4>Fourth Box Setting</h4>
            	    </div>
            	    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="box_fourth_bgcolor" class="control-label">Background Color</label>
                            <div class="input-group mbot15 colorpicker-input colorpicker-element">
                                <input type="text" value="#<?= $box_result[3]->bg_color; ?>" name="box_fourth_bgcolor" id="box_fourth_bgcolor" class="form-control">
                                <span class="input-group-addon"><i style="background-color: rgb(255, 111, 0);"></i></span>
                            </div>
                        </div> 
                        <div class="form-group col-md-3">
                        <label for="box_fourth_hovercolor" class="control-label">Hover Color</label>
                            <div class="input-group mbot15 colorpicker-input colorpicker-element">
                                <input type="text" value="#<?= $box_result[3]->hover_color; ?>" name="box_fourth_hovercolor" id="box_fourth_hovercolor" class="form-control">
                                <span class="input-group-addon"><i style="background-color: rgb(255, 111, 0);"></i></span>
                            </div>
                        </div> 
                        <div class="form-group col-md-3">
                        <label for="box_fourth_iconcolor" class="control-label">Icon Color</label>
                            <div class="input-group mbot15 colorpicker-input colorpicker-element">
                                <input type="text" value="#<?= $box_result[3]->icon_color; ?>" name="box_fourth_iconcolor" id="box_fourth_iconcolor" class="form-control">
                                <span class="input-group-addon"><i style="background-color: rgb(255, 111, 0);"></i></span>
                            </div>
                        </div> 
                        <div class="form-group col-md-3">
                            <label>Icon</label>
                            <div class="input-group iconpicker-container">
                                <input type="text" value="<?= $box_result[3]->icon; ?>" class="form-control icon-picker iconpicker-element iconpicker-input" name="box_fourth_icon" id="box_fourth_icon">
                                <span class="input-group-addon">
                                    <i class="<?= $box_result[3]->icon; ?> iconpicker-component"></i>
                                 </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="box_fourth_heading_one" class="control-label">Heading 1</label>
                            <input type="text" id="box_fourth_heading_one" value="<?= $box_result[3]->heading_one; ?>" name="box_fourth_heading_one" class="form-control" >
                        </div>
                        <div class="form-group col-md-3">
                            <label for="box_fourth_heading_one_color" class="control-label">Heading 1 Color</label>
                            <div class="input-group mbot15 colorpicker-input colorpicker-element">
                                <input type="text" value="#<?= $box_result[3]->heading_one_color; ?>" name="box_fourth_heading_one_color" id="box_fourth_heading_one_color" class="form-control">
                                <span class="input-group-addon"><i style="background-color: rgb(255, 111, 0);"></i></span>
                            </div>
                        </div> 
                        <div class="form-group col-md-3">
                            <label for="box_fourth_heading_two" class="control-label">Heading 2</label>
                            <input type="text" id="box_fourth_heading_two" value="<?= $box_result[3]->heading_two; ?>" name="box_fourth_heading_two" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="box_fourth_heading_two_color" class="control-label">Heading 2 Color</label>
                            <div class="input-group mbot15 colorpicker-input colorpicker-element">
                                <input type="text" value="#<?= $box_result[3]->heading_two_color; ?>" name="box_fourth_heading_two_color" id="box_fourth_heading_two_color" class="form-control">
                                <span class="input-group-addon"><i style="background-color: rgb(255, 111, 0);"></i></span>
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="box_fourth_Link" class="control-label">Link</label>
                            <select id="box_fourth_Link" name="box_fourth_Link" class="form-control">
                                <option value=""></option>
                                <option value="clients" <?= ($box_result[3]->link == "clients")?"selected":"";?>>User List</option>
                                <option value="employee" <?= ($box_result[3]->link == "employee")?"selected":"";?>>Employee</option>
                                <option value="proposals" <?= ($box_result[3]->link == "proposals")?"selected":"";?>>Proposals</option>
                                <option value="estimates" <?= ($box_result[3]->link == "estimates")?"selected":"";?>>Estimates</option>
                                <option value="invoices" <?= ($box_result[3]->link == "invoices")?"selected":"";?>>Invoices</option>
                                <option value="payments" <?= ($box_result[3]->link == "payments")?"selected":"";?>>Payments</option>
                                <option value="subscriptions" <?= ($box_result[3]->link == "subscriptions")?"selected":"";?>>Subscriptions</option>
                                <option value="expenses" <?= ($box_result[3]->link == "expenses")?"selected":"";?>>Expenses</option>
                                <option value="tickets" <?= ($box_result[3]->link == "tickets")?"selected":"";?>>Supports</option>
                                <option value="knowledge_base" <?= ($box_result[3]->link == "knowledge_base")?"selected":"";?>>Knowledge Base</option>
                                <option value="roles" <?= ($box_result[3]->link == "roles")?"selected":"";?>>Roles</option>
                                <option value="loginPage" <?= ($box_result[3]->link == "loginPage")?"selected":"";?>>Login Page</option>
                                <option value="staff" <?= ($box_result[3]->link == "staff")?"selected":"";?>>Admin Users</option>
                                <option value="taxes" <?= ($box_result[3]->link == "taxes")?"selected":"";?>>Taxes Rate</option>
                                <option value="currencies" <?= ($box_result[3]->link == "currencies")?"selected":"";?>>Currencies</option>
                                <option value="projects" <?= ($box_result[3]->link == "projects")?"selected":"";?>>Projects</option>
                                 <option value="reports/appointment" <?= ($box_result[3]->link == "reports/appointment")?"selected":"";?>>Appointment</option>
                            </select>
                        </div>
                    </div>
            	</div>
            </div>
          <?php hooks()->do_action('after_settings_group_view', $tab); ?>
        </div>
      </div>
    </div>
  
<div class="clearfix"></div>
</div>
<?php echo form_close(); ?>
<div class="btn-bottom-pusher"></div>
</div>
</div>
<div id="new_version"></div>
<?php init_tail(); ?>

<link href="http://php.manageprojects.in/pre-crm/modules/menu_setup/assets/font-awesome-icon-picker/css/fontawesome-iconpicker.min.css" rel="stylesheet">
<script src="http://php.manageprojects.in/pre-crm/modules/menu_setup/assets/font-awesome-icon-picker/js/fontawesome-iconpicker.js"></script>
<script>
   var iconPickerInitialized = false;
   $(function(){

     $('.icon-picker').iconpicker()
         .on({'iconpickerSetSourceValue': function(e){
           _formatMenuIconInput(e);
         }})
         iconPickerInitialized = true;
   });
  </script>

<script>
 $(function(){
  var slug = "<?php echo $tab['slug']; ?>";
  $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    var settingsForm = $('#settings-form');

    if(settingsForm.hasClass('custom-update-url')) {
      return;
    }

    var tab = $(this).attr('href').slice(1);
    settingsForm.attr('action','<?php echo site_url($this->uri->uri_string()); ?>?group='+slug+'&active_tab='+tab);
  });
  $('input[name="settings[email_protocol]"]').on('change',function(){
    if($(this).val() == 'mail'){
      $('.smtp-fields').addClass('hide');
    } else {
      $('.smtp-fields').removeClass('hide');
    }
  });
  $('.sms_gateway_active input').on('change',function(){
    if($(this).val() == '1') {
      $('body .sms_gateway_active').not($(this).parents('.sms_gateway_active')[0]).find('input[value="0"]').prop('checked',true);
    }
  });
  <?php if ($tab['slug'] == 'pusher') {
          ?>
    <?php if (get_option('desktop_notifications') == '1') {
              ?>
        // Let's check if the browser supports notifications
        if (!("Notification" in window)) {
          $('#pusherHelper').html('<div class="alert alert-danger">Your browser does not support desktop notifications, please disable this option or use more modern browser.</div>');
        } else {
          if(Notification.permission == "denied"){
            $('#pusherHelper').html('<div class="alert alert-danger">Desktop notifications not allowed in browser settings, search on Google "How to allow desktop notifications for <?php echo $this->agent->browser(); ?>"</div>');
          }
        }
      <?php
          } ?>
      <?php if (get_option('pusher_realtime_notifications') == '0') {
              ?>
        $('input[name="settings[desktop_notifications]"]').prop('disabled',true);
      <?php
          } ?>
    <?php
      } ?>
    $('input[name="settings[pusher_realtime_notifications]"]').on('change',function(){
      if($(this).val() == '1'){
        $('input[name="settings[desktop_notifications]"]').prop('disabled',false);
      } else {
        $('input[name="settings[desktop_notifications]"]').prop('disabled',true);
        $('input[name="settings[desktop_notifications]"][value="0"]').prop('checked',true);
      }
    });
    $('.test_email').on('click', function() {
      var email = $('input[name="test_email"]').val();
      if (email != '') {
       $(this).attr('disabled', true);
       $.post(admin_url + 'emails/sent_smtp_test_email', {
        test_email: email
      }).done(function(data) {
        window.location.reload();
      });
    }
  });
    $('#update_app').on('click',function(e){
     e.preventDefault();
     $('input[name="settings[purchase_key]"]').parents('.form-group').removeClass('has-error');
     var purchase_key = $('input[name="settings[purchase_key]"]').val();
     var latest_version = $('input[name="latest_version"]').val();
     var upgrade_function = $('input[name="upgrade_function"]:checked').val();
     var update_errors;
     if(purchase_key != ''){
       var ubtn = $(this);
       ubtn.html('<?php echo _l('wait_text'); ?>');
       ubtn.addClass('disabled');
       $.post(admin_url+'auto_update',{
        purchase_key:purchase_key,
        latest_version:latest_version,
        auto_update:true,
        upgrade_function:upgrade_function
       }).done(function(){
         window.location.reload();
       }).fail(function(response){
         update_errors = JSON.parse(response.responseText);
         $('#update_messages').html('<div class="alert alert-danger"></div>');
         for (var i in update_errors){
          $('#update_messages .alert').append('<p>'+update_errors[i]+'</p>');
        }
        ubtn.removeClass('disabled');
        ubtn.html($('.update_app_wrapper').data('original-text'));
      });
     } else {
      $('input[name="settings[purchase_key]"]').parents('.form-group').addClass('has-error');
    }
  });
  });
</script>
<?php hooks()->do_action('settings_tab_footer', $tab); ?>
</body>
</html>
