<?php

class WCPageBuilder
{
    public function __construct()
    {
        add_action( 'wp_enqueue_scripts', array( $this, 'wcpb_dependencies' ) );
    }

    public function wcpb_dependencies()
    {
        wp_enqueue_script( 'wcpb-main', plugins_url( 'build/index.js', dirname(__FILE__) ), array(), time(), true );
        wp_enqueue_style( 'wcpb-main', plugins_url( 'styles/style.css', dirname(__FILE__) ), array(), time() );
    }
}