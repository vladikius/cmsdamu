<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php $this->load->view('admin/inc/header'); ?>

	<h1>Update User(s)</h1>
	
	<?php echo form_open_multipart('admin/file/edit-file'); ?>
	<?php if(isset($_POST['file'])) { ?>
		<?php
		$options_active = array(
								'0'  => 'Disable',
								'1'    => 'Enable'
								);

		$groups = array();
		foreach($group as $g)
		{
			$groups[$g['group_id']] = $g['group_title'];
		}
		
		$users = array();
		foreach($user as $g)
		{
			$users[$g['user_id']] = $g['firstname'] . ' ' . $g['lastname'] . ' (' . $g['email'] . ')';
		}
		?>
	<div class="file_create">
		<?php foreach($_POST['file'] as $k => $v) { ?>
		<label>FILE ID:</label><input readonly="readonly" name="file[<?php echo $k; ?>][id]" type="text" id="file_<?php echo $k; ?>_id" value="<?php echo $v['id']; ?>" />
		<p class="clear">&nbsp;</p>
		
		<label>STATUS:</label>
		<?php echo form_dropdown('file['.$k.'][active]', $options_active, $v['active'], 'class="txtFld"'); ?>
		<p class="clear">&nbsp;</p>

		<label>FILE TITLE:</label><input class="txtFld" name="file[<?php echo $k; ?>][name]" type="text" id="file_<?php echo $k; ?>_name" value="<?php echo $v['name']; ?>" />
		<p class="clear">&nbsp;</p>

		<label>FILE DESCRIPTION:</label><textarea class="txtFld" cols="35" rows="3" name="file[<?php echo $k; ?>][description]" id="file_<?php echo $k; ?>_description"><?php echo $v['description']; ?></textarea>
		<p class="clear">&nbsp;</p>

		<label>ASSIGN TO:</label>
		<table border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="20"><input<?php if($v['access'] == 'all' || $v['access'] == '') echo ' checked="checked"'; ?> name="file[<?php echo $k; ?>][access]" type="radio" id="file_<?php echo $k; ?>_access" value="all" /></td>
				<td>All Users (requires login)</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td><input<?php if($v['access'] == 'public') echo ' checked="checked"'; ?> name="file[<?php echo $k; ?>][access]" type="radio" id="file_<?php echo $k; ?>_access" value="public" /></td>
				<td>Public</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td><input<?php if($v['access'] == 'group') echo ' checked="checked"'; else $v['group'] = ''; ?> name="file[<?php echo $k; ?>][access]" type="radio" id="file_<?php echo $k; ?>_access" value="group" /></td>
				<td>
					Selected User Group
					<br />
					<?php
					$groups = array();
					foreach($group as $g)
					{
						$groups[$g['group_id']] = $g['group_title'];
					}
					echo form_multiselect('file['.$k.'][group][]', $groups, $v['group'], 'class="txtFld"');
					?>
				</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
			</tr>
			<tr>
				<td><input<?php if($v['access'] == 'user') echo ' checked="checked"'; else $v['user'] = ''; ?> name="file[<?php echo $k; ?>][access]" type="radio" id="file_<?php echo $k; ?>_access" value="user" /></td>
				<td>
					Selected Users
					<br />
					<?php
					$users = array();
					foreach($user as $g)
					{
						$users[$g['user_id']] = $g['firstname'] . ' ' . $g['lastname'] . ' (' . $g['email'] . ')';
					}
					echo form_multiselect('file['.$k.'][user][]', $users, $v['user'], 'class="txtFld"');
					?>
				</td>
			</tr>
	    </table>
		
		<p class="clear">&nbsp;</p>
		
		<div class="editSeparator">&nbsp;</div>

		<?php } ?>
		<label>&nbsp;</label><input name="edit" type="submit" id="edit" value="Update" />&nbsp;<?php echo anchor('admin/file/manage-file','BACK'); ?>
		
		<p class="clear">&nbsp;</p>
	</div>
	<?php } ?>
	<?php echo form_close(); ?>
    
    <div class="footer_info">You have used <?php echo $this->cf_file_model->disk_free_space(FCPATH . "media/"); ?> of <?php echo $this->cf_file_model->disk_total_space(FCPATH . "media/"); ?> Available space.</div>
		
<?php $this->load->view('admin/inc/footer'); ?>
