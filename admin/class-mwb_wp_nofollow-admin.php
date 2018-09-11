<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://makewebbetter.com
 * @since      1.0.0
 *
 * @package    Mwb_wp_nofollow
 * @subpackage Mwb_wp_nofollow/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Mwb_wp_nofollow
 * @subpackage Mwb_wp_nofollow/admin
 * @author     makewebbetter <webmaster@makewebbetter.com>
 */
class Mwb_wp_nofollow_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mwb_wp_nofollow_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mwb_wp_nofollow_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mwb_wp_nofollow-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mwb_wp_nofollow_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mwb_wp_nofollow_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mwb_wn_nofollow-setting.js', array( 'jquery' ), $this->version, false );
 

}
/*****Adding submenu*****/
function mwb_wn_add_att()
{
	add_menu_page(__('Add attributes to tags','mwb_wp_nofollow'), __('Wordpress nofollow Links','mwb_wp_nofollow'), 'manage_options', 'mwb_menu', array($this,'mwb_wt_menu_output') );
}
/*****Submenu callback*****/
function mwb_wt_menu_output()
{

	require_once MWB_NF_DIR_PATH. 'admin/partials/mwb_wp_nofollow-admin-display.php';

}
/****Saving the settings*****/
function mwb_wn_save_att()
{
	if(isset($_POST["mwb_wn_add"]))
	{
		$mwb_wn_enable_image_alt=isset($_POST['mwb_add_alt_image'])?$_POST['mwb_add_alt_image']:"off";
		update_option("mwb_add_alt_image",$mwb_wn_enable_image_alt);
		
		$mwb_wn_enable_link_rel=isset($_POST['mwb_add_rel_link'])?$_POST['mwb_add_rel_link']:"off";
		update_option("mwb_add_rel_link",$mwb_wn_enable_link_rel);
		
		$mwb_wn_enable_link_rel_internal=isset($_POST['mwb_add_internal_rel_link'])?$_POST['mwb_add_internal_rel_link']:"off";
		update_option("mwb_add_rel_internal_link",$mwb_wn_enable_link_rel_internal);
		
		$mwb_wn_disable_rel_link=isset($_POST['mwb_remove_rel_link'])?$_POST['mwb_remove_rel_link']:"off";
		update_option("mwb_remove_rel_link",$mwb_wn_disable_rel_link);
	}

}



}



