<?php
/************************************************************************/
/* Transformable                                                        */
/************************************************************************/
/* Copyright (c) 2009                                                   */
/* Adaptive Technology Resource Centre / University of Toronto          */
/*                                                                      */
/* This program is free software. You can redistribute it and/or        */
/* modify it under the terms of the GNU General Public License          */
/* as published by the Free Software Foundation.                        */
/************************************************************************/

define('TR_INCLUDE_PATH', '../include/');
require(TR_INCLUDE_PATH.'vitals.inc.php');
require_once(TR_INCLUDE_PATH.'classes/DAO/CoursesDAO.class.php');
require_once(TR_INCLUDE_PATH.'classes/DAO/UserCoursesDAO.class.php');

global $_current_user;

if (trim($_GET['search_text'] == ''))
{
	global $msg;
	$msg->addError('NO_SEARCH_TEXT');
	
	header('Location: index.php?id='.$ids);
}

$coursesDAO = new CoursesDAO();
$userCoursesDAO = new UserCoursesDAO();

$my_courses = array();
$search_text = trim($_GET['search_text']);
$results = $coursesDAO->getSearchResult($search_text);

// handle submits
if (isset($_GET['action'], $_GET['cid']) && $_SESSION['user_id'] > 0)
{
	$cid = intval($_GET['cid']);
	
	if ($_GET['action'] == 'remove') $userCoursesDAO->Delete($_SESSION['user_id'], $cid);
	if ($_GET['action'] == 'add') $userCoursesDAO->Create($_SESSION['user_id'], $cid, TR_USERROLE_VIEWER, 0);
}

// -- display results
// no results found
if (!is_array($results))
{
	$savant->assign('title', _AT("results"));
	$savant->assign('search_text', $search_text);
	$savant->assign('courses', '');
	$savant->display('home/index_course.tmpl.php');
	exit;
}

// retrieve data to display
if ($_SESSION['user_id'] > 0) {
	// get login user's authoring courses
	$my_courses = $userCoursesDAO->getByUserID($_SESSION['user_id']);
	
	if (is_array($my_courses))
	{
		foreach ($my_courses as $course)
			$my_courses[$course['course_id']] = $course['role'];
	}
}	
	
foreach ($results as $result)
{
	if (isset($my_courses[$result['course_id']]))
		$result['role'] = $my_courses[$result['course_id']];
	else
		$result['role'] = NULL;
	
	$courses[] = $result;
}

if (is_array($courses))
{
	$curr_page_num = intval($_GET['p']);
	if (!$curr_page_num) {
		$curr_page_num = 1;
	}	
	
	$savant->assign('title', _AT("results"));
	$savant->assign('courses', $courses);
	$savant->assign('curr_page_num', $curr_page_num);
	$savant->assign('search_text', $search_text);
	
	$savant->display('home/index_course.tmpl.php');
}

?>