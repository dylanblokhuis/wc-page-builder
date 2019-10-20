<?php

/**
 * Plugin Name: Web Component Page Builder
 * Description: Build your pages with modern webcomponents
 * Version:     1.0.0
 * Author:      Dylan Blokhuis
 * Author URI:  https://github.com/dylanblokhuis
 * License:     MIT
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied.' );
}

require_once( __DIR__ . '/vendor/autoload.php' );
require_once( __DIR__ . '/includes/WCPageBuilder.php' );

if ( class_exists( 'WCPageBuilder' ) ) {
	$wcpagebuilder = new WCPageBuilder();
}

