<?php

// This file is part of Moodle - http://moodle.org/
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
 * Page module admin settings and defaults
 *
 * @package mod_embeddedvideopage
 * @copyright  2009 Petr Skoda (http://skodak.org) 
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {
    require_once("$CFG->libdir/resourcelib.php");

    $displayoptions = resourcelib_get_displayoptions(array(RESOURCELIB_DISPLAY_OPEN, RESOURCELIB_DISPLAY_POPUP));
    $defaultdisplayoptions = array(RESOURCELIB_DISPLAY_OPEN);

    //--- general settings -----------------------------------------------------------------------------------
    $settings->add(new admin_setting_configmultiselect('embeddedvideopage/displayoptions',
        get_string('displayoptions', 'embeddedvideopage'), get_string('configdisplayoptions', 'embeddedvideopage'),
        $defaultdisplayoptions, $displayoptions));

    //--- modedit defaults -----------------------------------------------------------------------------------
    $settings->add(new admin_setting_heading('embeddedvideopagemodeditdefaults', get_string('modeditdefaults', 'admin'), get_string('condifmodeditdefaults', 'admin')));

    $settings->add(new admin_setting_configcheckbox('embeddedvideopage/printheading',
        get_string('printheading', 'embeddedvideopage'), get_string('printheadingexplain', 'embeddedvideopage'), 1));
    $settings->add(new admin_setting_configcheckbox('embeddedvideopage/printintro',
        get_string('printintro', 'embeddedvideopage'), get_string('printintroexplain', 'embeddedvideopage'), 0));
    $settings->add(new admin_setting_configselect('embeddedvideopage/display',
        get_string('displayselect', 'embeddedvideopage'), get_string('displayselectexplain', 'embeddedvideopage'), RESOURCELIB_DISPLAY_OPEN, $displayoptions));
    $settings->add(new admin_setting_configtext('embeddedvideopage/popupwidth',
        get_string('popupwidth', 'embeddedvideopage'), get_string('popupwidthexplain', 'embeddedvideopage'), 620, PARAM_INT, 7));
    $settings->add(new admin_setting_configtext('embeddedvideopage/popupheight',
        get_string('popupheight', 'embeddedvideopage'), get_string('popupheightexplain', 'embeddedvideopage'), 450, PARAM_INT, 7));
}
