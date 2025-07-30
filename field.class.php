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
 * Class profile_field_url
 *
 * @package     profilefield_url
 * @copyright   2025 Russell England <http://www.russellengland.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class profile_field_url extends profile_field_base {
    /**
     * Overwrite the base class to display the data for this field
     */
    public function display_data() {
        $data = format_string($this->data);

        if (!empty($data)) {
            // Convert to a link.
            $data = \html_writer::link($data, $data, ['target' => $this->field->param1]);
        }

        return $data;
    }

    /**
     * Add fields for editing a url profile field.
     * @param moodleform $mform
     */
    public function edit_field_add($mform) {
        // Create the form field.
        $mform->addElement('text', $this->inputname, format_string($this->field->name));
        $mform->setType($this->inputname, PARAM_URL);
    }

    /**
     * Return the field type and null properties.
     * This will be used for validating the data submitted by a user.
     *
     * @return array the param type and null property
     * @since Moodle 3.2
     */
    public function get_field_properties() {
        return [PARAM_URL, NULL_NOT_ALLOWED];
    }

    /**
     * Validate the form field from profile page
     *
     * @param stdClass $usernew
     * @return  array  error messages for the form validation
     */
    public function edit_validate_field($usernew) {
        $errors = parent::edit_validate_field($usernew);

        if (isset($usernew->{$this->inputname})) {
            $value = $usernew->{$this->inputname};
            if (($value !== '') && !filter_var($value, FILTER_VALIDATE_URL)) {
                $errors[$this->inputname] = get_string('invalidurl', 'error');
            }
        }

        return $errors;
    }
}


