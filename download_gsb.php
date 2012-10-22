<?php

//Written by Richard Havinga @ Southampton City College

require_once(dirname(__FILE__) . '/../../config.php');
require_once (dirname(__FILE__) . '/../../lib/adminlib.php');

defined('MOODLE_INTERNAL') || die;

require_login();


$context = get_context_instance(CONTEXT_SYSTEM);
require_capability('report/gsb:viewmygsbreport', $context);


function objectToArray($select) {
		if (is_object($select)) {
			// Gets the properties of the given object
			// with get_object_vars function
			$select = get_object_vars($select);
		}
 
		if (is_array($select)) {
			/*
			* Return array converted to object
			* Using __FUNCTION__ (Magic constant)
			* for recursive call
			*/
			return array_map(__FUNCTION__, $select);
		}
		else {
			// Return array
			return $select;
		}
	}
	
$sql = "SELECT bgc.id, cc.name as category, c.fullname as coursename, c.shortname, bgc.linksnum, bgc.assignmentnum,
bgc.feedbacknum, bgc.questnum, bgc.quiznum, bgc.interactnum as interactive_learning_objects, bgc.embednum as embedded_videos,
bgc.booknum, bgc.databasenum, bgc.workshopnum, bgc.choicenum, bgc.glossarynum,
bgc.wikinum, bgc.chatnum, bgc.forumnum, bgc.gsb
FROM {block_gsb_content} bgc
JOIN {course} c ON bgc.ids = c.id
JOIN {course_categories} cc ON c.category = cc.id
ORDER by name ASC;";
$select = $DB->get_records_sql($sql);

$array = objectToArray($select);	

header("Content-type: application/octet-stream"); 
header("Content-Disposition: attachment; filename=gsb_report.xls"); 
$flag = false; foreach($array as $row) { if(!$flag) {
 // display field/column names as first row 
 echo implode("\t", array_keys($row)) . "\r\n"; $flag = true; } echo implode("\t", array_values($row)) . "\r\n"; } exit;

