<?php

class WCPageBuilder
{
    public function __construct()
    {
        add_action( 'wp_enqueue_scripts', array( $this, 'wcpb_dependencies' ) );
        add_action( 'admin_print_scripts-post.php', array( $this, 'wcpb_editor_dependencies' ) );
        add_action( 'admin_print_scripts-post-new.php', array( $this, 'wcpb_editor_dependencies' ) );
    }

    public function wcpb_dependencies()
    {
        wp_enqueue_script( 'wcpb-frontend', plugins_url( 'frontend/build/index.js', dirname(__FILE__) ), array(), time(), true );
    }

    public function wcpb_editor_dependencies()
    {
        wp_enqueue_script( 'wcpb-backend', plugins_url( 'backend/build/index.js', dirname(__FILE__) ), array(), time(), true );
        wp_enqueue_style( 'wcpb-backend', plugins_url( 'backend/build/bundle.css', dirname(__FILE__) ), array(), time() );
    }
}