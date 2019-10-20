<?php

class WCPageBuilder
{
    public function __construct()
    {
        add_action('admin_action_wc-pagebuilder', [$this, 'wcpb_edit']);

        add_action('wp_enqueue_scripts', array($this, 'wcpb_dependencies'));
        add_filter('edit_post_link', array($this, 'wcpb_edit_button'));

        // add_action( 'admin_print_scripts-post.php', array( $this, 'wcpb_editor_dependencies' ) );
        // add_action( 'admin_print_scripts-post-new.php', array( $this, 'wcpb_editor_dependencies' ) );
    }

    public function wcpb_dependencies()
    {
        wp_enqueue_script('wcpb-frontend', plugins_url('frontend/build/index.js', dirname(__FILE__)), array(), time(), true);
    }

    // public function wcpb_editor_dependencies()
    // {
    //     wp_enqueue_script( 'wcpb-backend', plugins_url( 'backend/build/index.js', dirname(__FILE__) ), array(), time(), true );
    //     wp_enqueue_style( 'wcpb-backend', plugins_url( 'backend/build/bundle.css', dirname(__FILE__) ), array(), time() );
    // }

    public function wcpb_edit()
    {
        @header('Content-Type: ' . get_option('html_type') . '; charset=' . get_option('blog_charset'));

        add_filter('show_admin_bar', '__return_false');

        remove_all_actions('wp_head');
        remove_all_actions('wp_print_styles');
        remove_all_actions('wp_print_head_scripts');
        remove_all_actions('wp_footer');

        add_action('wp_head', 'wp_enqueue_scripts', 1);
        add_action('wp_head', 'wp_print_styles', 8);
        add_action('wp_head', 'wp_print_head_scripts', 9);
        add_action('wp_head', 'wp_site_icon');

        add_action('wp_footer', 'wp_print_footer_scripts', 20);
        //add_action( 'wp_footer', 'wp_auth_check_html', 30 );

        // Handle `wp_enqueue_scripts`
        remove_all_actions('wp_enqueue_scripts');

        // Also remove all scripts hooked into after_wp_tiny_mce.
        remove_all_actions('after_wp_tiny_mce');

        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts'], 999999);

        Template::get_template("editor.php");

        die;
    }

    public function enqueue_scripts()
    {
        wp_enqueue_style('wcpb-editor', plugins_url('backend/build/bundle.css', dirname(__FILE__)), array(), time());
        wp_enqueue_script('wcpb-editor', plugins_url('backend/build/index.js', dirname(__FILE__)), array(), time(), true);
        wp_localize_script('wcpb-editor', 'wcpb_object', array(
            'nonce' => wp_create_nonce('wp_rest'),
            'plugin_url' =>  plugins_url('/', dirname(__FILE__)),
        ));
    }

    public function wcpb_edit_button()
    {
        return '<a href="#" id="vc_load-inline-editor" class="vc_inline-link">' . __( 'Edit with WC Page Builder', 'wc_page_builder' ) . '</a>';
    }
}
