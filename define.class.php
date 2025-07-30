<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * URL profile field definition.
 *
 * @package     profilefield_url
 * @copyright   2025 Russell England <http://www.russellengland.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Class profile_define_url
 */
class profile_define_url extends profile_define_base {
    /**
     * Add elements for creating/editing a url profile field.
     *
     * @param MoodleQuickForm $form
     */
    public function define_form_specific($form) {
        // Param1 - link target.
        $targetoptions = [
            '' => get_string('linktargetnone', 'editor'),
            '_blank' => get_string('linktargetblank', 'editor'),
            '_self'  => get_string('linktargetself', 'editor'),
            '_top'   => get_string('linktargettop', 'editor'),
        ];
        $form->addElement('select', 'param1', get_string('profilefieldlinktarget', 'admin'), $targetoptions);
        $form->setType('param1', PARAM_ALPHAEXT);
    }
}
