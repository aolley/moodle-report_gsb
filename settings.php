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

$ADMIN->add('reports', new admin_externalpage('report_gsb',
        new lang_string('pluginname', 'report_gsb'),
        new moodle_url('/report/gsb/index.php'),
        'report/gsb:viewmygsbreport'));
		

$selection = array('optional'=>'optional', 'mandatory'=>'mandatory', 'exclude'=>'exclude');
$count = array('0'=>'0', '1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6', '7'=>'7', '8'=>'8', '9'=>'9', '10'=>'10', 
'11'=>'11', '12'=>'12', '13'=>'13', '14'=>'14', '15'=>'15', '16'=>'16');


if ($ADMIN->fulltree) {

    //--- general settings -----------------------------------------------------------------------------------

    $settings->add(new admin_setting_configcheckbox('gsb/subcategories',
        new lang_string('subcategories', 'report_gsb'), new lang_string('subcategoriesxp', 'report_gsb'), 0));

    $settings->add(new admin_setting_configtext('gsb/studentviews', new lang_string('studentviews', 'report_gsb'),
                   new lang_string('studentviewsxp', 'report_gsb'), 20, PARAM_INTEGER));

    $settings->add(new admin_setting_configtext('gsb/minenrolments', new lang_string('minenrolments', 'report_gsb'),
                   new lang_string('minenrolmentsxp', 'report_gsb'), 2, PARAM_INTEGER));

    $settings->add(new admin_setting_configcheckbox('gsb/automedal',
        new lang_string('automedal', 'report_gsb'), new lang_string('automedalxp', 'report_gsb'), 0));

    //--- bronze settings -----------------------------------------------------------------------------------
	
	$settings->add(new admin_setting_heading('gsb/bronze_heading', new lang_string('bronze_heading', 'report_gsb'),
                       new lang_string('explaingeneralbronze', 'report_gsb')));

    $settings->add(new admin_setting_configselect('gsb/bronzenumoptional', new lang_string('bronzenumoptional', 'report_gsb'),
                            new lang_string('bronzenumoptionalxp', 'report_gsb'),
                            '0', $count));
							
    $settings->add(new admin_setting_configselect('gsb/bronzeresourcestype', new lang_string('configbronzeresources', 'report_gsb'),
                       new lang_string('configbronzeresourcesxp', 'report_gsb'), 'mandatory', $selection));

    $settings->add(new admin_setting_configtext('gsb/bronzeresources', new lang_string('bronzeresources', 'report_gsb'),
                   new lang_string('configdefaultbronzeresources', 'report_gsb'), 20, PARAM_INTEGER));
				   
    $settings->add(new admin_setting_configselect('gsb/bronzeassignmentstype', new lang_string('configbronzeassignments', 'report_gsb'),
                       new lang_string('configbronzeassignmentsxp', 'report_gsb'), 'exclude', $selection));

    $settings->add(new admin_setting_configtext('gsb/bronzeassignments', new lang_string('bronzeassignments', 'report_gsb'),
                   new lang_string('configdefaultbronzeassignments', 'report_gsb'), 0, PARAM_INTEGER));	
				   
    $settings->add(new admin_setting_configselect('gsb/bronzefeedbacktype', new lang_string('configbronzefeedback', 'report_gsb'),
                       new lang_string('configbronzefeedbackxp', 'report_gsb'), 'exclude', $selection));				   

    $settings->add(new admin_setting_configtext('gsb/bronzefeedback', new lang_string('bronzefeedback', 'report_gsb'),
                   new lang_string('configdefaultbronzefeedback', 'report_gsb'), 0, PARAM_INTEGER));	
				   
    $settings->add(new admin_setting_configselect('gsb/bronzeimstype', new lang_string('configbronzeims', 'report_gsb'),
                       new lang_string('configbronzeimsxp', 'report_gsb'), 'exclude', $selection));				   
				   
    $settings->add(new admin_setting_configtext('gsb/bronzeims', new lang_string('bronzeims', 'report_gsb'),
                   new lang_string('configdefaultbronzeims', 'report_gsb'), 0, PARAM_INTEGER));	
				   
    $settings->add(new admin_setting_configselect('gsb/bronzequesttype', new lang_string('configbronzequest', 'report_gsb'),
                       new lang_string('configbronzequestxp', 'report_gsb'), 'exclude', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/bronzequest', new lang_string('bronzequest', 'report_gsb'),
                   new lang_string('configdefaultbronzequest', 'report_gsb'), 0, PARAM_INTEGER));	
				   
    $settings->add(new admin_setting_configselect('gsb/bronzequiztype', new lang_string('configbronzequiz', 'report_gsb'),
                       new lang_string('configbronzequizxp', 'report_gsb'), 'exclude', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/bronzequiz', new lang_string('bronzequiz', 'report_gsb'),
                   new lang_string('configdefaultbronzequiz', 'report_gsb'), 0, PARAM_INTEGER));	
				   
    $settings->add(new admin_setting_configselect('gsb/bronzeembedtype', new lang_string('configbronzeembed', 'report_gsb'),
                       new lang_string('configbronzeembedxp', 'report_gsb'), 'exclude', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/bronzeembed', new lang_string('bronzeembed', 'report_gsb'),
                   new lang_string('configdefaultbronzeembed', 'report_gsb'), 0, PARAM_INTEGER));					   
				   
    $settings->add(new admin_setting_configselect('gsb/bronzechattype', new lang_string('configbronzechat', 'report_gsb'),
                       new lang_string('configbronzechatxp', 'report_gsb'), 'exclude', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/bronzechat', new lang_string('bronzechat', 'report_gsb'),
                   new lang_string('configdefaultbronzechat', 'report_gsb'), 0, PARAM_INTEGER));					   
				   
    $settings->add(new admin_setting_configselect('gsb/bronzeforumtype', new lang_string('configbronzeforum', 'report_gsb'),
                       new lang_string('configbronzeforumxp', 'report_gsb'), 'exclude', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/bronzeforum', new lang_string('bronzeforum', 'report_gsb'),
                   new lang_string('configdefaultbronzeforum', 'report_gsb'), 0, PARAM_INTEGER));					   
				   
    $settings->add(new admin_setting_configselect('gsb/bronzewikitype', new lang_string('configbronzewiki', 'report_gsb'),
                       new lang_string('configbronzewikixp', 'report_gsb'), 'exclude', $selection));				   
				   							   
    $settings->add(new admin_setting_configtext('gsb/bronzewiki', new lang_string('bronzewiki', 'report_gsb'),
                   new lang_string('configdefaultbronzewiki', 'report_gsb'), 0, PARAM_INTEGER));					   
				   
    $settings->add(new admin_setting_configselect('gsb/bronzebooktype', new lang_string('configbronzebook', 'report_gsb'),
                       new lang_string('configbronzebookxp', 'report_gsb'), 'exclude', $selection));				   
				   							   
    $settings->add(new admin_setting_configtext('gsb/bronzebook', new lang_string('bronzebook', 'report_gsb'),
                   new lang_string('configdefaultbronzebook', 'report_gsb'), 0, PARAM_INTEGER));					   
				   
    $settings->add(new admin_setting_configselect('gsb/bronzedatabasetype', new lang_string('configbronzedatabase', 'report_gsb'),
                       new lang_string('configbronzedatabasexp', 'report_gsb'), 'exclude', $selection));				   
				   							   
    $settings->add(new admin_setting_configtext('gsb/bronzedatabase', new lang_string('bronzedatabase', 'report_gsb'),
                   new lang_string('configdefaultbronzedatabase', 'report_gsb'), 0, PARAM_INTEGER));
				   
    $settings->add(new admin_setting_configselect('gsb/bronzeworkshoptype', new lang_string('configbronzeworkshop', 'report_gsb'),
                       new lang_string('configbronzeworkshopxp', 'report_gsb'), 'exclude', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/bronzeworkshop', new lang_string('bronzeworkshop', 'report_gsb'),
                   new lang_string('configdefaultbronzeworkshop', 'report_gsb'), 0, PARAM_INTEGER));					   
				   
    $settings->add(new admin_setting_configselect('gsb/bronzechoicetype', new lang_string('configbronzechoice', 'report_gsb'),
                       new lang_string('configbronzechoicexp', 'report_gsb'), 'exclude', $selection));				   
				   							   
    $settings->add(new admin_setting_configtext('gsb/bronzechoice', new lang_string('bronzechoice', 'report_gsb'),
                   new lang_string('configdefaultbronzechoice', 'report_gsb'), 0, PARAM_INTEGER));	
				   
    $settings->add(new admin_setting_configselect('gsb/bronzeglossarytype', new lang_string('configbronzeglossary', 'report_gsb'),
                       new lang_string('configbronzeglossaryxp', 'report_gsb'), 'exclude', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/bronzeglossary', new lang_string('bronzeglossary', 'report_gsb'),
                   new lang_string('configdefaultbronzeglossary', 'report_gsb'), 0, PARAM_INTEGER));

    //--- silver settings -----------------------------------------------------------------------------------
	
	$settings->add(new admin_setting_heading('gsb/silver_heading', new lang_string('silver_heading', 'report_gsb'),
                       new lang_string('explaingeneralsilver', 'report_gsb')));

    $settings->add(new admin_setting_configselect('gsb/silvernumoptional', new lang_string('silvernumoptional', 'report_gsb'),
                            new lang_string('silvernumoptionalxp', 'report_gsb'),
                            '2', $count));
							
    $settings->add(new admin_setting_configselect('gsb/silverresourcestype', new lang_string('configsilverresources', 'report_gsb'),
                       new lang_string('configsilverresourcesxp', 'report_gsb'), 'exclude', $selection));

    $settings->add(new admin_setting_configtext('gsb/silverresources', new lang_string('silverresources', 'report_gsb'),
                   new lang_string('configdefaultsilverresources', 'report_gsb'), 20, PARAM_INTEGER));
				   
    $settings->add(new admin_setting_configselect('gsb/silverassignmentstype', new lang_string('configsilverassignments', 'report_gsb'),
                       new lang_string('configsilverassignmentsxp', 'report_gsb'), 'optional', $selection));

    $settings->add(new admin_setting_configtext('gsb/silverassignments', new lang_string('silverassignments', 'report_gsb'),
                   new lang_string('configdefaultsilverassignments', 'report_gsb'), 1, PARAM_INTEGER));	
				   
    $settings->add(new admin_setting_configselect('gsb/silverfeedbacktype', new lang_string('configsilverfeedback', 'report_gsb'),
                       new lang_string('configsilverfeedbackxp', 'report_gsb'), 'optional', $selection));				   

    $settings->add(new admin_setting_configtext('gsb/silverfeedback', new lang_string('silverfeedback', 'report_gsb'),
                   new lang_string('configdefaultsilverfeedback', 'report_gsb'), 1, PARAM_INTEGER));	
				   
    $settings->add(new admin_setting_configselect('gsb/silverimstype', new lang_string('configsilverims', 'report_gsb'),
                       new lang_string('configsilverimsxp', 'report_gsb'), 'optional', $selection));				   
				   
    $settings->add(new admin_setting_configtext('gsb/silverims', new lang_string('silverims', 'report_gsb'),
                   new lang_string('configdefaultsilverims', 'report_gsb'), 1, PARAM_INTEGER));	
				   
    $settings->add(new admin_setting_configselect('gsb/silverquesttype', new lang_string('configsilverquest', 'report_gsb'),
                       new lang_string('configsilverquestxp', 'report_gsb'), 'optional', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/silverquest', new lang_string('silverquest', 'report_gsb'),
                   new lang_string('configdefaultsilverquest', 'report_gsb'), 1, PARAM_INTEGER));	
				   
    $settings->add(new admin_setting_configselect('gsb/silverquiztype', new lang_string('configsilverquiz', 'report_gsb'),
                       new lang_string('configsilverquizxp', 'report_gsb'), 'optional', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/silverquiz', new lang_string('silverquiz', 'report_gsb'),
                   new lang_string('configdefaultsilverquiz', 'report_gsb'), 1, PARAM_INTEGER));	
				   
    $settings->add(new admin_setting_configselect('gsb/silverembedtype', new lang_string('configsilverembed', 'report_gsb'),
                       new lang_string('configsilverembedxp', 'report_gsb'), 'optional', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/silverembed', new lang_string('silverembed', 'report_gsb'),
                   new lang_string('configdefaultsilverembed', 'report_gsb'), 1, PARAM_INTEGER));					   
				   
    $settings->add(new admin_setting_configselect('gsb/silverchattype', new lang_string('configsilverchat', 'report_gsb'),
                       new lang_string('configsilverchatxp', 'report_gsb'), 'exclude', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/silverchat', new lang_string('silverchat', 'report_gsb'),
                   new lang_string('configdefaultsilverchat', 'report_gsb'), 0, PARAM_INTEGER));					   
				   
    $settings->add(new admin_setting_configselect('gsb/silverforumtype', new lang_string('configsilverforum', 'report_gsb'),
                       new lang_string('configsilverforumxp', 'report_gsb'), 'exclude', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/silverforum', new lang_string('silverforum', 'report_gsb'),
                   new lang_string('configdefaultsilverforum', 'report_gsb'), 0, PARAM_INTEGER));					   
				   
    $settings->add(new admin_setting_configselect('gsb/silverwikitype', new lang_string('configsilverwiki', 'report_gsb'),
                       new lang_string('configsilverwikixp', 'report_gsb'), 'exclude', $selection));				   
				   							   
    $settings->add(new admin_setting_configtext('gsb/silverwiki', new lang_string('silverwiki', 'report_gsb'),
                   new lang_string('configdefaultsilverwiki', 'report_gsb'), 0, PARAM_INTEGER));					   
				   
    $settings->add(new admin_setting_configselect('gsb/silverbooktype', new lang_string('configsilverbook', 'report_gsb'),
                       new lang_string('configsilverbookxp', 'report_gsb'), 'optional', $selection));				   
				   							   
    $settings->add(new admin_setting_configtext('gsb/silverbook', new lang_string('silverbook', 'report_gsb'),
                   new lang_string('configdefaultsilverbook', 'report_gsb'), 1, PARAM_INTEGER));					   
				   
    $settings->add(new admin_setting_configselect('gsb/silverdatabasetype', new lang_string('configsilverdatabase', 'report_gsb'),
                       new lang_string('configsilverdatabasexp', 'report_gsb'), 'optional', $selection));				   
				   							   
    $settings->add(new admin_setting_configtext('gsb/silverdatabase', new lang_string('silverdatabase', 'report_gsb'),
                   new lang_string('configdefaultsilverdatabase', 'report_gsb'), 1, PARAM_INTEGER));
				   
    $settings->add(new admin_setting_configselect('gsb/silverworkshoptype', new lang_string('configsilverworkshop', 'report_gsb'),
                       new lang_string('configsilverworkshopxp', 'report_gsb'), 'exclude', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/silverworkshop', new lang_string('silverworkshop', 'report_gsb'),
                   new lang_string('configdefaultsilverworkshop', 'report_gsb'), 0, PARAM_INTEGER));					   
				   
    $settings->add(new admin_setting_configselect('gsb/silverchoicetype', new lang_string('configsilverchoice', 'report_gsb'),
                       new lang_string('configsilverchoicexp', 'report_gsb'), 'exclude', $selection));				   
				   							   
    $settings->add(new admin_setting_configtext('gsb/silverchoice', new lang_string('silverchoice', 'report_gsb'),
                   new lang_string('configdefaultsilverchoice', 'report_gsb'), 0, PARAM_INTEGER));	
				   
    $settings->add(new admin_setting_configselect('gsb/silverglossarytype', new lang_string('configsilverglossary', 'report_gsb'),
                       new lang_string('configsilverglossaryxp', 'report_gsb'), 'exclude', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/silverglossary', new lang_string('silverglossary', 'report_gsb'),
                   new lang_string('configdefaultsilverglossary', 'report_gsb'), 0, PARAM_INTEGER));
	   
    //--- gold settings -----------------------------------------------------------------------------------
	
	$settings->add(new admin_setting_heading('gsb/gold_heading', new lang_string('gold_heading', 'report_gsb'),
                       new lang_string('explaingeneralgold', 'report_gsb')));

    $settings->add(new admin_setting_configselect('gsb/goldnumoptional', new lang_string('goldnumoptional', 'report_gsb'),
                            new lang_string('goldnumoptionalxp', 'report_gsb'),
                            '1', $count));
							
    $settings->add(new admin_setting_configselect('gsb/goldresourcestype', new lang_string('configgoldresources', 'report_gsb'),
                       new lang_string('configgoldresourcesxp', 'report_gsb'), 'exclude', $selection));

    $settings->add(new admin_setting_configtext('gsb/goldresources', new lang_string('goldresources', 'report_gsb'),
                   new lang_string('configdefaultgoldresources', 'report_gsb'), 20, PARAM_INTEGER));
				   
    $settings->add(new admin_setting_configselect('gsb/goldassignmentstype', new lang_string('configgoldassignments', 'report_gsb'),
                       new lang_string('configgoldassignmentsxp', 'report_gsb'), 'exclude', $selection));

    $settings->add(new admin_setting_configtext('gsb/goldassignments', new lang_string('goldassignments', 'report_gsb'),
                   new lang_string('configdefaultgoldassignments', 'report_gsb'), 0, PARAM_INTEGER));	
				   
    $settings->add(new admin_setting_configselect('gsb/goldfeedbacktype', new lang_string('configgoldfeedback', 'report_gsb'),
                       new lang_string('configgoldfeedbackxp', 'report_gsb'), 'exclude', $selection));				   

    $settings->add(new admin_setting_configtext('gsb/goldfeedback', new lang_string('goldfeedback', 'report_gsb'),
                   new lang_string('configdefaultgoldfeedback', 'report_gsb'), 0, PARAM_INTEGER));	
				   
    $settings->add(new admin_setting_configselect('gsb/goldimstype', new lang_string('configgoldims', 'report_gsb'),
                       new lang_string('configgoldimsxp', 'report_gsb'), 'exclude', $selection));				   
				   
    $settings->add(new admin_setting_configtext('gsb/goldims', new lang_string('goldims', 'report_gsb'),
                   new lang_string('configdefaultgoldims', 'report_gsb'), 0, PARAM_INTEGER));	
				   
    $settings->add(new admin_setting_configselect('gsb/goldquesttype', new lang_string('configgoldquest', 'report_gsb'),
                       new lang_string('configgoldquestxp', 'report_gsb'), 'exclude', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/goldquest', new lang_string('goldquest', 'report_gsb'),
                   new lang_string('configdefaultgoldquest', 'report_gsb'), 0, PARAM_INTEGER));	
				   
    $settings->add(new admin_setting_configselect('gsb/goldquiztype', new lang_string('configgoldquiz', 'report_gsb'),
                       new lang_string('configgoldquizxp', 'report_gsb'), 'exclude', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/goldquiz', new lang_string('goldquiz', 'report_gsb'),
                   new lang_string('configdefaultgoldquiz', 'report_gsb'), 0, PARAM_INTEGER));	
				   
    $settings->add(new admin_setting_configselect('gsb/goldembedtype', new lang_string('configgoldembed', 'report_gsb'),
                       new lang_string('configgoldembedxp', 'report_gsb'), 'exclude', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/goldembed', new lang_string('goldembed', 'report_gsb'),
                   new lang_string('configdefaultgoldembed', 'report_gsb'), 0, PARAM_INTEGER));					   
				   
    $settings->add(new admin_setting_configselect('gsb/goldchattype', new lang_string('configgoldchat', 'report_gsb'),
                       new lang_string('configgoldchatxp', 'report_gsb'), 'optional', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/goldchat', new lang_string('goldchat', 'report_gsb'),
                   new lang_string('configdefaultgoldchat', 'report_gsb'), 1, PARAM_INTEGER));					   
				   
    $settings->add(new admin_setting_configselect('gsb/goldforumtype', new lang_string('configgoldforum', 'report_gsb'),
                       new lang_string('configgoldforumxp', 'report_gsb'), 'optional', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/goldforum', new lang_string('goldforum', 'report_gsb'),
                   new lang_string('configdefaultgoldforum', 'report_gsb'), 1, PARAM_INTEGER));					   
				   
    $settings->add(new admin_setting_configselect('gsb/goldwikitype', new lang_string('configgoldwiki', 'report_gsb'),
                       new lang_string('configgoldwikixp', 'report_gsb'), 'optional', $selection));				   
				   							   
    $settings->add(new admin_setting_configtext('gsb/goldwiki', new lang_string('goldwiki', 'report_gsb'),
                   new lang_string('configdefaultgoldwiki', 'report_gsb'), 1, PARAM_INTEGER));					   
				   
    $settings->add(new admin_setting_configselect('gsb/goldbooktype', new lang_string('configgoldbook', 'report_gsb'),
                       new lang_string('configgoldbookxp', 'report_gsb'), 'exclude', $selection));				   
				   							   
    $settings->add(new admin_setting_configtext('gsb/goldbook', new lang_string('goldbook', 'report_gsb'),
                   new lang_string('configdefaultgoldbook', 'report_gsb'), 0, PARAM_INTEGER));					   
				   
    $settings->add(new admin_setting_configselect('gsb/golddatabasetype', new lang_string('configgolddatabase', 'report_gsb'),
                       new lang_string('configgolddatabasexp', 'report_gsb'), 'exclude', $selection));				   
				   							   
    $settings->add(new admin_setting_configtext('gsb/golddatabase', new lang_string('golddatabase', 'report_gsb'),
                   new lang_string('configdefaultgolddatabase', 'report_gsb'), 0, PARAM_INTEGER));
				   
    $settings->add(new admin_setting_configselect('gsb/goldworkshoptype', new lang_string('configgoldworkshop', 'report_gsb'),
                       new lang_string('configgoldworkshopxp', 'report_gsb'), 'optional', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/goldworkshop', new lang_string('goldworkshop', 'report_gsb'),
                   new lang_string('configdefaultgoldworkshop', 'report_gsb'), 1, PARAM_INTEGER));					   
				   
    $settings->add(new admin_setting_configselect('gsb/goldchoicetype', new lang_string('configgoldchoice', 'report_gsb'),
                       new lang_string('configgoldchoicexp', 'report_gsb'), 'exclude', $selection));				   
				   							   
    $settings->add(new admin_setting_configtext('gsb/goldchoice', new lang_string('goldchoice', 'report_gsb'),
                   new lang_string('configdefaultgoldchoice', 'report_gsb'), 0, PARAM_INTEGER));	
				   
    $settings->add(new admin_setting_configselect('gsb/goldglossarytype', new lang_string('configgoldglossary', 'report_gsb'),
                       new lang_string('configgoldglossaryxp', 'report_gsb'), 'optional', $selection));				   
				   				   
    $settings->add(new admin_setting_configtext('gsb/goldglossary', new lang_string('goldglossary', 'report_gsb'),
                   new lang_string('configdefaultgoldglossary', 'report_gsb'), 1, PARAM_INTEGER));				   
				  
}

