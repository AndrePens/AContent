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
include_once(AF_INCLUDE_PATH.'classes/DAO/LanguagesDAO.class.php');

if ($_POST['value'] == '')
{
	$rtn['status'] = 'fail';
	$rtn['error'][] = _AT('AF_ERROR_EMPTY_FIELD');
}

if (isset($_POST['field']) && isset($_POST['value']) && $_POST['value'] <> '')
{
	$languagesDAO = new LanguagesDAO();

	// Format of $_POST['field']: [fieldName]|[language_code]|[charset]
	$pieces = explode(':', $_POST['field']);
	$languagesDAO->UpdateField($pieces[1], $pieces[2], $pieces[0], $_POST['value']);
	$rtn['status'] = 'success';
}

echo json_encode($rtn);
?>
