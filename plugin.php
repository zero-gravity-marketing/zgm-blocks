<?php
/**
 * @package ZGM_Basic
 * @version 1.0
 */
/*
Plugin Name: ZGM Blocks
Plugin URI: https://zerogravitymarketing.com
Description: This is a plugin for adding gutenberg blocks using carbon fields
Author: Zero Gravity Marketing
Version: 1.0
Author URI: https://zerogravitymarketing.com
Text Domain: zgm
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Require once the Composer Autoload
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}


/**
 * Initialize all Theme Functions
 */
if ( class_exists( 'ZGM\\Plugin\\Classes\\Plugin' ) ) {
  $Plugin = new ZGM\Plugin\Classes\Plugin();
  $Plugin->init();
  $Plugin->define_admin_hooks();
  $Plugin->define_public_hooks();
}

/**
 * Initialize all the Carbon Fields
 */
if ( class_exists( 'ZGM\\Plugin\\Classes\\PluginCarbonFields' ) ) {

  add_action( 'after_setup_theme', function(){
    // Require once the Composer Autoload
    if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
      \Carbon_Fields\Carbon_Fields::boot();
    }
  });

  $PluginCarbonFields = new ZGM\Plugin\Classes\PluginCarbonFields();
  $PluginCarbonFields->register_fields();
}
