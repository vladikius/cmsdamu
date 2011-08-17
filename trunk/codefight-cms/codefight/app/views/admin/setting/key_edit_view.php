<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php $this->load->view('admin/inc/header'); ?>

	<h1>Update Setting Keys(s)</h1>
	
	<?php echo form_open('admin/setting/keys'); ?>
	<?php if(isset($_POST['setting'])) { ?>
	<?php $form_option = array('textbox'=>'Textbox','textarea'=>'Textarea','select'=>'Select','checkbox'=>'Checkboxes','radio'=>'Radio Buttons') ?>
	<div class="group_create">
		<?php foreach($_POST['setting'] as $k => $v) { ?>
		<label>KEY ID:</label><input readonly="readonly" name="setting[<?php echo $k; ?>][setting_id]" type="text" id="setting_<?php echo $k; ?>_setting_id" value="<?php echo $v['setting_id']; ?>" />
		<p class="clear">&nbsp;</p>
		<label>KEY:</label><input class="txtFld" name="setting[<?php echo $k; ?>][setting_key]" type="text" id="setting_<?php echo $k; ?>_setting_key" value="<?php echo $v['setting_key']; ?>" />
		<p class="clear">&nbsp;</p>
		<label>INFO:</label><input class="txtFld" name="setting[<?php echo $k; ?>][setting_info]" type="text" id="setting_<?php echo $k; ?>_setting_info" value="<?php echo $v['setting_info']; ?>" />
		<p class="clear">&nbsp;</p>
		<label>FORM TYPE:</label><?php echo form_dropdown("setting[$k][setting_form]", $form_option, $v['setting_form'], 'class="txtFld"'); ?>
		<p class="clear">&nbsp;</p>
		<label class="lblclear">OPTIONS:[separated with bar(|)]</label><input class="txtFld" name="setting[<?php echo $k; ?>][setting_option]" type="text" id="setting_<?php echo $k; ?>_setting_option" value="<?php echo $v['setting_option']; ?>" /><br />
		<p class="clear">&nbsp;</p>
		
		<div class="editSeparator">&nbsp;</div>
		
		<?php } ?>
		<label>&nbsp;</label><input name="edit" type="submit" id="edit" value="Update" />&nbsp;<?php echo anchor('admin/setting/key','BACK'); ?>
		
		<p class="clear">&nbsp;</p>
	</div>
	<?php } ?>
	<?php echo form_close(); ?>
		
<?php $this->load->view('admin/inc/footer'); ?>