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

		$mwb_wn_rel_activation=get_option("mwb_add_rel_link");
	    $mwb_wn_rel_internal_activation=get_option("mwb_add_rel_internal_link");
 		$mwb_wn_alt_activation=get_option("mwb_add_alt_image");
		$ajax_nonce = wp_create_nonce( "my-special-string" );
		$mwb_wt_external_value = array(
			"ajax_url"=> admin_url( 'admin-ajax.php' ),
			"security"=> $ajax_nonce,
			"rel"=>$mwb_wn_rel_activation,
			"rel_internal"=>$mwb_wn_rel_internal_activation,
			"alt"=>$mwb_wn_alt_activation
			);	
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mwb_wn_nofollow-setting.js', array( 'jquery' ), $this->version, false );
  		wp_localize_script($this->plugin_name, "mwb_wt",$mwb_wt_external_value);

		

	}
function mwb_wn_request_callback()
{

	//$image_value = sanitize_text_field( $_POST['img_value'] );
	//echo $image_value;
	die;
}	
function mwb_wn_add_alt()
{
	add_menu_page('Add attributes to tags', 'Add attributes', 'manage_options', 'mwb_menu', array($this,'mwb_wt_menu_output') );
}
function mwb_wt_menu_output()
{
	$mwb_wn_alt_activation=get_option("mwb_add_alt_image");
	$mwb_wn_rel_activation=get_option("mwb_add_rel_link");
	$mwb_wn_alt_internal_activation=get_option("mwb_add_rel_internal_link");
  	$mwb_wn_disable_rel_link=get_option("mwb_remove_rel_link");
	
	$mwb_wn_checked_image="";
	$mwb_wn_checked_link="";
	$mwb_wn_checked_internal_link="";
	$mwb_wn_checked_remove_rel_link="";

	if($mwb_wn_alt_activation=="on")
	{
		$mwb_wn_checked_image="checked";
	}
	if($mwb_wn_rel_activation=="on")
	{
		$mwb_wn_checked_link="checked";
	} 
	if($mwb_wn_alt_internal_activation=="on")
	{
		$mwb_wn_checked_internal_link="checked";
	}
	if($mwb_wn_disable_rel_link=="on")
	{
		$mwb_wn_checked_remove_rel_link="checked";
	}


?>
	<h1>Attribute Setting</h1>
	<?php
	if(isset($mwb_wn_alt_activation)&&isset($mwb_wn_rel_activation)&&isset($mwb_wn_alt_internal_activation))
	?>
	<div class="notice notice-success is-dismissible"><p>Settings saved</p></div>
	<form method="post" class="form-class"><br>
		<input type="checkbox" name="mwb_add_alt_image" id="mwb_add_alt_image" <?php echo $mwb_wn_checked_image;?>>
		<span id="mwb_checkbox_text">Add/Remove alt to image</span>
		<br><br>
		<input type="checkbox" name="mwb_add_rel_link" id="mwb_add_rel_link" <?php echo $mwb_wn_checked_link;?>>
		Add rel="nofollow" to external links
		<br><br>
		<input type="checkbox" name="mwb_add_internal_rel_link" id="mwb_add_internal_rel_link" <?php echo $mwb_wn_checked_internal_link;?>>Add rel="nofollow" to all links
        <br><br>
        <input type="checkbox" name="mwb_remove_rel_link" id="mwb_remove_rel_link" <?php echo $mwb_wn_checked_remove_rel_link;?>>Remove rel="nofollow" from all links
        <br><br>
		<input type="submit" class="button button-primary" name="mwb_wn_add" value="save">
	</form>
	<?php 
}
function mwb_wn_save_alt()
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



