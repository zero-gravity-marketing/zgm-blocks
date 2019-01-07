<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @package  ZGM
 */
namespace ZGM\Plugin\Classes;

final class Plugin {


	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() 
	{
		if ( defined( 'THIS_PLUGIN_VERSION' ) ) {
			$this->version = THIS_PLUGIN_VERSION;
		} else {
			$this->version = '1.0.0';
		}

		$this->plugin_name = 'zgm-plugin-boilerplate';

	}

		/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
	 /**
    * Intended to run first when the class is initiated
    */
    public function init() {

      /**
      * Plugin Activation Hook
      * @link https://developer.wordpress.org/reference/functions/register_activation_hook/
      */
      register_activation_hook( __FILE__, function(){
          // clear the permalinks
          flush_rewrite_rules();
          register_uninstall_hook( __FILE__, array($this,'register_uninstall_hook') );
      });

      /**
      * Plugin Deactåivation Hook
      * @link https://developer.wordpress.org/reference/functions/register_deactivation_hook/
      */
      register_deactivation_hook( __FILE__, function(){
          // clear the permalinks
          flush_rewrite_rules();
      });

    }

    /**
    * Plugin Uninstall Hook
    * @link https://developer.wordpress.org/reference/functions/register_uninstall_hook/
    */
    public function register_uninstall_hook()
    {
        //
    }

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	public function define_admin_hooks() {

		add_action( 'admin_enqueue_scripts', function(){
			wp_enqueue_style( $this->plugin_name, Plugin::asset_path('admin.css'), array(), $this->version, 'all' );
		},'enqueue_styles');
		add_action( 'admin_enqueue_scripts', function(){
			wp_enqueue_script( $this->plugin_name, Plugin::asset_path('admin.js'), array( 'jquery' ), $this->version, true );
		},'enqueue_scripts');

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	public function define_public_hooks() {
		add_action( 'wp_enqueue_scripts', function(){
			wp_enqueue_style( $this->plugin_name, Plugin::asset_path('main.css'), array(), $this->version, 'all' );
		},'enqueue_styles');
		add_action( 'wp_enqueue_scripts', function(){
			wp_enqueue_script( $this->plugin_name, Plugin::asset_path('main.js'), array( 'jquery' ), $this->version, true );
		},'enqueue_scripts');
	}

	/**
	 * Asset Path Helper Function
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	public static function asset_path($filename) {
	  $dist_path = plugin_dir_url(dirname(dirname(__FILE__))) . '/dist/';
	  $directory = dirname($filename) . '/';
	  $file = basename($filename);
	  return $dist_path . $directory . $file;
	}


}
