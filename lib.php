<?php
// This file is part of GSB module for Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Version info for GSB Report
 *
 * @package    report
 * @subpackage GSB
 * @copyright  2012 onwards Richard Havinga richard.havinga@southampton-city.ac.uk
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

/**
 * Clean up course medals where a course has been deleted
 */
function gsb_cleanup_medals() {
    global $DB;
    $removesql = "SELECT ids FROM {block_gsb_content} WHERE  {block_gsb_content}.ids NOT IN (SELECT {block_gsb_content}.ids
                FROM {block_gsb_content} INNER JOIN {course} ON {block_gsb_content}.ids = {course}.id
                WHERE {course}.id = {block_gsb_content}.ids
                GROUP BY {course}.id)";
    $remove = $DB->get_records_sql($removesql);

    foreach($remove as $row => $values) {
    $courseid = $values->ids;
    $table = "block_gsb_content";
    $conditions = array('ids'=>"$courseid");
    $test = $DB->delete_records($table, $conditions);
    }
}

/**
 * Clean up course medals where sub categories are no longer included in medals
 */
function gsb_subcat_cleanup(){
    global $DB;
    $removesql = "SELECT  id FROM {course} WHERE  {course}.id NOT IN (SELECT {course}.id
                  FROM ({course} INNER JOIN {course_categories} ON {course}.category = {course_categories}.id)
                  WHERE ((({course_categories}.depth)=1))
                  GROUP BY {course}.id)";
    $remove = $DB->get_records_sql($removesql);

    foreach($remove as $row => $values) {
        $courseid = $values->id;
        $table = "block_gsb_content";
        $conditions = array('ids' => $courseid);
        $test = $DB->delete_records($table, $conditions);
    }
}

