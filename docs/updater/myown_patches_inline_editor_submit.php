<?php
/************************************************************************/
/* AFrame                                                               */
/************************************************************************/
/* Copyright (c) 2009                                                   */
/* Adaptive Technology Resource Centre / University of Toronto          */
/*                                                                      */
/* This program is free software. You can redistribute it and/or        */
/* modify it under the terms of the GNU General Public License          */
/* as published by the Free Software Foundation.                        */
/************************************************************************/

define('AF_INCLUDE_PATH', '../include/');
include(AF_INCLUDE_PATH.'vitals.inc.php');
include_once(AF_INCLUDE_PATH.'classes/DAO/MyownPatchesDAO.class.php');

if (isset($_POST['field']))
{
	$myownPatchesDAO = new MyownPatchesDAO();
	
	// Format of $_POST['field']: [fieldName]|[user_id]
	$pieces = explode('-', $_POST['field']);
	$status = $myownPatchesDAO->UpdateField($pieces[1], $pieces[0], $_POST['value']);
	
	if (is_array($status))
	{
		$rtn['status'] = 'fail';
		foreach ($status as $err)
			$rtn['error'][] = $err;
	}
	else
	{
		$rtn['status'] = 'success';
	}
	echo json_encode($rtn);
}
?>
