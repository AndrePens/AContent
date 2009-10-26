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

define('AF_INCLUDE_PATH', 'include/');
require (AF_INCLUDE_PATH.'vitals.inc.php');

require_once(AF_INCLUDE_PATH. 'classes/DAO/UsersDAO.class.php');

$usersDAO = new UsersDAO();

// $_SESSION['token'] is used to encrypt the password from web form
if (!isset($_SESSION['token']))
	$_SESSION['token'] = sha1(mt_rand() . microtime(TRUE));

if (isset($_POST['submit']))
{
	$user_id = $usersDAO->Validate($addslashes($_POST['form_login']), $addslashes($_POST['form_password_hidden']));

	if (!$user_id)
	{
		$msg->addError('INVALID_LOGIN');
	}
	else
	{
		if ($usersDAO->getStatus($user_id) == AF_STATUS_DISABLED)
		{
			$msg->addError('ACCOUNT_DISABLED');
		}
		else
		{
			$usersDAO->setLastLogin($user_id);
			$_SESSION['user_id'] = $user_id;
			$msg->addFeedback('LOGIN_SUCCESS');
			header('Location: index.php');
			exit;
		}
	}
	
}

global $onload;
$onload = 'document.form.form_login.focus();';

//header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"');
$savant->display('login.tmpl.php');
?>
