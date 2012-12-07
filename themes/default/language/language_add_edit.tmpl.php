<?php
/************************************************************************/
/* AContent                                                             */
/************************************************************************/
/* Copyright (c) 2010                                                   */
/* Inclusive Design Institute                                           */
/*                                                                      */
/* This program is free software. You can redistribute it and/or        */
/* modify it under the terms of the GNU General Public License          */
/* as published by the Free Software Foundation.                        */
/************************************************************************/

global $onload;
$onload = "initial();";

include(TR_INCLUDE_PATH.'header.inc.php');
?>

<form name="input_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?><?php if (isset($_GET["id"])) echo '?id='.$_GET["id"]; ?>" >
<?php if (isset($this->row["language_code"])) {?>
<input type="hidden" name="language_code" value="<?php echo $this->row["language_code"]; ?>" />
<input type="hidden" name="charset" value="<?php echo $this->row["charset"]; ?>" />
<?php }?>

<div class="input-form">

<fieldset class="group_form"><legend class="group_form"><?php echo _AT('add_edit_language'); ?></legend>
	<table class="form-data" align="center">
		<tr>
			<td colspan="2" align="left"><?php echo _AT('required_field_text') ;?></td>
		</tr>
<!-- 
		<tr align="left">
			<th><span class="required" title="<?php echo _AT('required_field'); ?>">*</span>
			<label for="lang_code"><?php echo _AT('lang_code'); ?></label></th>
			<td>
<?php if (isset($this->row['language_code'])) echo $this->row['lang_code']; else {?>
			<select name="lang_code" id="lang_code">
				<option value="-1">-- <?php echo _AT('select');?> --</option>
<?php 
	foreach ($this->rows_lang as $row_lang)
	{
?>
				<option value="<?php echo $row_lang['code_3letters']; ?>" <?php if ((isset($_POST["lang_code"]) && $_POST["lang_code"] == $row_lang['code_3letters']) || (!isset($_REQUEST["lang_code"]) && $this->row["lang_code"] == $row_lang['code_3letters'])) echo 'selected="selected"'; ?>><?php echo $row_lang["description"]. ' - '. $row_lang['code_3letters']; ?></option>
<?php
	}
?>
			</select>
<?php }?>
			</td>
		</tr>
 -->
		<tr align="left">
			<th><label for="lang_code">&nbsp;&nbsp;&nbsp;<?php echo _AT('lang_code'); ?></label></th>
			<td>
<?php if (isset($this->row['language_code'])) echo $this->row['language_code']; else {?>
				<input id="lang_code" name="lang_code" type="text" size="2" maxlength="2" value="<?php if (isset($_POST['lang_code'])) echo AT_print($_POST['lang_code'], 'input.text'); else echo AT_print($this->row['language_code'], 'input.text'); ?>" />
<?php }?>
			</td>
		</tr>

		<tr align="left">
			<th><label for="locale">&nbsp;&nbsp;&nbsp;<?php echo _AT('locale'); ?></label></th>
			<td>
<?php if (isset($this->row['language_code'])) if ($this->row['locale'] == '') echo _AT('na'); else echo $this->row['locale']; else {?>
				<input id="locale" name="locale" type="text" size="2" maxlength="2" value="<?php if (isset($_POST['locale'])) echo AT_print($_POST['locale'], 'input.text'); else echo AT_print($this->row['locale'], 'input.text'); ?>" />
<?php }?>
			</td>
		</tr>

		<tr align="left">
			<th><span class="required" title="<?php echo _AT('required_field'); ?>">*</span>
			<label for="charset"><?php echo _AT('charset'); ?></label></th>
			<td>
<?php if (isset($this->row['language_code'])) echo $this->row['charset']; else {?>
				<input type="text" name="charset" id="charset" value="<?php if (isset($_POST['charset'])) echo $_POST['charset']; else if (isset($this->row["charset"])) echo AT_print($this->row["charset"], 'input.text'); else echo DEFAULT_CHARSET; ?>" />
<?php }?>
			</td>
		</tr>

		<tr align="left">
			<th><span class="required" title="<?php echo _AT('required_field'); ?>">*</span>
			<label for="native_name"><?php echo _AT('name_in_language'); ?></label></th>
			<td><input type="text" name="native_name" id="native_name" value="<?php if (isset($_POST['native_name'])) echo $_POST['native_name']; else echo AT_print($this->row["native_name"], 'input.text'); ?>" /></td>
		</tr>

		<tr align="left">
			<th><span class="required" title="<?php echo _AT('required_field'); ?>">*</span>
			<label for="english_name"><?php echo _AT('name_in_english'); ?></label></th>
			<td><input type="text" name="english_name" id="english_name" value="<?php if (isset($_POST['english_name'])) echo $_POST['english_name']; else echo AT_print($this->row["english_name"], 'input.text'); ?>" /></td>
		</tr>

		<tr align="left">
			<th>&nbsp;&nbsp;&nbsp;<?php echo _AT("status"); ?></th>
			<td>
				<input type="radio" name="status" id="statusD" value="0" <?php if ((isset($_POST['status']) && $_POST['status']==0) || (!isset($_POST['status']) && $this->row['status']==0)) echo 'checked="checked"'; ?> /><label for="statusD"><?php echo _AT('disabled'); ?></label> 
				<input type="radio" name="status" id="statusE" value="1" <?php if ((isset($_POST['status']) && $_POST['status']==1) || (!isset($_POST['status']) && $this->row['status']==1) || (!isset($_POST['status']) && !isset($this->row['status']))) echo 'checked="checked"'; ?> /><label for="statusE"><?php echo _AT('enabled'); ?></label>
			</td>
		</tr>

		<tr>
			<td colspan="2" align="center">
			<p class="submit_button">
			<input type="submit" name="save" value="<?php echo _AT('save'); ?>" />&nbsp;&nbsp;
			<input type="submit" name="cancel" value="<?php echo _AT('cancel'); ?>" />
			</p>
			</td>
		</tr>
	</table>
	
</fieldset>
</div>
</form>

<script type="text/JavaScript">
//<!--

function initial()
{
	// set cursor focus
	document.input_form.lang_code.focus();
}

function CheckAll(element_name, selectall_checkbox_name) {
	for (var i=0;i<document.input_form.elements.length;i++)	{
		var e = document.input_form.elements[i];
		if ((e.name == element_name) && (e.type=='checkbox')) {
			e.checked = document.input_form[selectall_checkbox_name].checked;
			togglerowhighlight(document.getElementById("r" + e.id), e.id);
		}
	}
}

function togglerowhighlight(obj, boxid) {
	if (document.getElementById(boxid).checked) {
		obj.className = 'selected';
	} else {
		obj.className = '';
	}
}
//  End -->
//-->
</script>

<?php include(TR_INCLUDE_PATH.'footer.inc.php'); ?>
