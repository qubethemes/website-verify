<?php

abstract class Webstie_Verify_Admin_Setings_Abstract
{
    /**
     * @return array The return value []
     */

    abstract function get_fields();

    public function render_output()
    {
        $fields = $this->get_fields();

        foreach ($fields as $field) {

            $type = isset($field['type']) ? sanitize_text_field($field['type']) : '';
            switch ($type) {
                case "section":
                    echo ' <div class="column p1">';
                    $this->render_section($field);
                    echo '</div>';
                    break;
            }
        }

    }

    private function render_section($section = array())
    {
        $title = isset($section['title']) ? $section['title'] : '';

        $instructions = isset($section['instructions']) ? $section['instructions'] : array();

        $instruction_lists = isset($instructions['lists']) ? $instructions['lists'] : array();

        $instruction_title = isset($instructions['title']) ? $instructions['title'] : '';

        $allowed_html_instructions = isset($instructions['allowed_html']) ? $instructions['allowed_html'] : array();

        if (!empty($title)) {
            echo '<h3 class="section_title">' . esc_html($title) . '</h3>';
        }
        if (is_array($instructions)) {

            echo '<div class="instruction">';

            if (!empty($instruction_title)) {

                echo ' <strong>' . esc_html($instruction_title) . '</strong>';
            }
            $allowed_html = wp_parse_args($allowed_html_instructions, array());

            foreach ($instruction_lists as $list_item_index => $list_item) {

                echo '<p>' . absint(($list_item_index + 1)) . '. ' . wp_kses($list_item, $allowed_html) . '</p>';
            }
            echo '</div>';
        }

        $fields = isset($section['fields']) ? $section['fields'] : array();

        foreach ($fields as $field_id => $field) {

            $field_type = isset($field['type']) ? $field['type'] : 'input';

            $parent_id = isset($field['parent_id']) ? $field['parent_id'] : '';

            $title = isset($field['title']) ? $field['title'] : '';

            $placeholder = isset($field['placeholder']) ? $field['placeholder'] : '';

            $description = isset($field['description']) ? $field['description'] : '';

            $value = $this->get_value($field_id, $parent_id);

            switch ($field_type) {
                case "input":
                    $this->render_input($field_id, $parent_id, $title, $placeholder, $description, $value);
                    break;
                case "textarea":
                    $this->render_textarea($field_id, $parent_id, $title, $description, $value);
                    break;
            }

        }
    }

    private function get_value($field_id, $parent_id)
    {
        $raw_value = empty($parent_id) ? get_option($field_id) : get_option($parent_id);

        if (!empty($parent_id)) {

            $raw_value = is_array($raw_value) && isset($raw_value[$field_id]) ? $raw_value[$field_id] : '';
        }

        return $raw_value;
    }

    private function render_input($field_id, $parent_id, $title, $placeholder, $description, $value)
    {
        $id = is_null($parent_id) ? $field_id : $parent_id . '[' . $field_id . ']';
        ?>
        <div class="input-group">
            <label for="<?php echo esc_attr($id); ?>"><?php echo esc_html($title); ?></label>
            <input type="text" class="form-control" id="<?php echo esc_attr($id); ?>"
                   name="<?php echo esc_attr($id); ?>" aria-describedby="<?php echo esc_attr($id); ?>"
                   value="<?php echo esc_attr($value); ?>"
                   placeholder="<?php echo esc_attr($placeholder); ?>"/>

            <?php if (!empty($description)) { ?>
                <small class="form-text text-muted">
                    <?php echo wp_kses($description, array(
                        'a' => array(
                            'href' => array(),
                            'target' => array()
                        )
                    )) ?>
                </small>

            <?php } ?>
        </div>
        <?php
    }

    private function render_textarea($field_id, $parent_id, $title, $description, $value)
    {
        $id = is_null($parent_id) ? $field_id : $parent_id . '[' . $field_id . ']';

        $allowed_html = array(
            'script' => array()
        );
        ?>
        <div class="input-group">
            <label for="<?php echo esc_attr($id); ?>"><?php echo esc_html($title); ?></label>
            <textarea class="form-control"
                      id="<?php echo esc_attr($id); ?>"
                      name="<?php echo esc_attr($id); ?>" cols="10"
                      rows="15"><?php echo wp_kses($value, $allowed_html);; ?></textarea>

            <?php if (!empty($description)) { ?>
                <small class="form-text text-muted">
                    <?php echo wp_kses($description, array(
                        'a' => array(
                            'href' => array(),
                            'target' => array()
                        )
                    )) ?>
                </small>

            <?php } ?>
        </div>
        <?php
    }

}