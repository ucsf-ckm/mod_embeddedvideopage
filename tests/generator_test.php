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
 * PHPUnit data generator tests
 *
 * @package    mod_embeddedvideopage
 * @category   phpunit
 * @copyright  2012 Petr Skoda {@link http://skodak.org} 
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


/**
 * PHPUnit data generator testcase
 *
 * @package    mod_embeddedvideopage
 * @category   phpunit
 * @copyright  2012 Petr Skoda {@link http://skodak.org} 
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_embeddedvideopage_generator_testcase extends advanced_testcase {
    public function test_generator() {
        global $DB, $SITE;

        $this->resetAfterTest(true);

        $this->assertEquals(0, $DB->count_records('embeddedvideopage'));

        /** @var mod_embeddedvideopage_generator $generator */
        $generator = $this->getDataGenerator()->get_plugin_generator('mod_embeddedvideopage');
        $this->assertInstanceOf('mod_embeddedvideopage_generator', $generator);
        $this->assertEquals('embeddedvideopage', $generator->get_modulename());

        $generator->create_instance(array('course'=>$SITE->id));
        $generator->create_instance(array('course'=>$SITE->id));
        $page = $generator->create_instance(array('course'=>$SITE->id));
        $this->assertEquals(3, $DB->count_records('embeddedvideopage'));

        $cm = get_coursemodule_from_instance('embeddedvideopage', $page->id);
        $this->assertEquals($page->id, $cm->instance);
        $this->assertEquals('embeddedvideopage', $cm->modname);
        $this->assertEquals($SITE->id, $cm->course);

        $context = context_module::instance($cm->id);
        $this->assertEquals($page->cmid, $context->instanceid);
    }
}
