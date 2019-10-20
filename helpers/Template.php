<?php

class Template
{
    /**
     * @param string $template_name 
     * @param array $data 
     */
    static function get_template($template_name, $data = array())
    {
        extract($data);
        $template_file = self::locate_template($template_name);
        if (!file_exists($template_file)) :
            _doing_it_wrong(__FUNCTION__, sprintf('<code>%s</code> does not exist.', $template_file), '1.0.0');
            return;
        endif;
        include $template_file;
    }

    /**
     * @param $template_name
     * @return mixed|void
     * Locate template file in templates folder
     */
    private function locate_template($template_name)
    {
        $default_path = plugin_dir_path(__DIR__) . 'templates/'; // Path to the template folder
        // Search template file in theme folder.
        $template = locate_template(array(
            $template_name
        ));
        // Get plugins template file.
        if (!$template) :
            $template = $default_path . $template_name;
        endif;
        return apply_filters('locate_template', $template, $template_name, $default_path);
    }
}
