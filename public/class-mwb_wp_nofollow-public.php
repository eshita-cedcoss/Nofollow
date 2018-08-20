<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @mwb_wn_link       https://makewebbetter.com
 * @since      1.0.0
 *
 * @package    Mwb_wp_nofollow
 * @subpackage Mwb_wp_nofollow/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Mwb_wp_nofollow
 * @subpackage Mwb_wp_nofollow/public
 * @author     makewebbetter <webmaster@makewebbetter.com>
 */
class Mwb_wp_nofollow_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mwb_wp_nofollow-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mwb_wp_nofollow-public.js', array( 'jquery' ), $this->version, false );

	}
/*Function to add/remove  alt to images and rel=nofollow to links*/
	function mwb_wn_the_content($text) {

		$post_id=get_the_Id();
		$mwb_wn_enable_alt_attribute=get_option("mwb_add_alt_image",true);
		$mwb_wn_enable_rel_attribute=get_option("mwb_add_rel_link");
		$mwb_wn_rel_internal_activation=get_option("mwb_add_rel_internal_link");
		$mwb_wn_disable_rel_link=get_option("mwb_remove_rel_link");
		$content=$text;
		if($mwb_wn_rel_internal_activation=="on")
		{

			$content= preg_replace_callback('/<a[^>]+/', 'mwb_wn_nofollow_internal_callback', $content);
		}
		if($mwb_wn_enable_alt_attribute=="on")
		{
			global $post;
			preg_match_all('/<img(.*?)>/', $content, $images);
			
			if(!is_null($images))
			{
				foreach($images[1] as $index => $value)
				{ 
					if(!preg_match('/alt=/', $value))
					{
						$mwb_wn_img = str_replace('<img', '<img alt="'.$post->post_title.'"', $images[0][$index]);
						$content = str_replace($images[0][$index], $mwb_wn_img, $content);
					}
				}
			}
		}
		echo "alt=>".$mwb_wn_enable_alt_attribute;
		if($mwb_wn_enable_alt_attribute=="off")
		{
			global $post;
			preg_match_all('/<img (.*?)>/', $content, $images);
			if(!is_null($images))
			{
				foreach($images[1] as $index => $value)
				{ 
					
						$mwb_wn_img = preg_replace('/alt="(.*?)"/', null, $images[0][$index]);
						$content = str_replace($images[0][$index], $mwb_wn_img, $content);
				
				}
			}
		}
		echo "\nrel=>".$mwb_wn_enable_rel_attribute;
		if($mwb_wn_enable_rel_attribute=="on")
		{
		
         $content= preg_replace_callback('/<a[^>]+/', 'mwb_wn_nofollow_callback', $content);					 
		}
		echo "\ndisable=>".$mwb_wn_disable_rel_link;
		if($mwb_wn_disable_rel_link=="on")
		{
         $content= preg_replace_callback('/<a[^>]+/', 'mwb_wn_remove_nofollow_callback', $content);					 
		}

		$my_post = array(
		      'ID'           => $post_id,
		      'post_content' => $content,
		     );
		wp_update_post( $my_post );
		return $content;
		}
	
}
function mwb_wn_nofollow_callback($matches) {
    $link = $matches[0];
    $site_link = get_bloginfo('url');

    if (strpos($link, 'rel') === false) {
    $link = preg_replace("%(href=\S(?!$site_link))%i", 'rel="nofollow" $1', $link);
     } 
    elseif (preg_match("%href=\S(?!$site_link)%i", $link)) {
      $link = preg_replace('/rel=\S(?!nofollow)\S*/i', 'rel="nofollow"', $link);
   }
    return $link;
}
function mwb_wn_nofollow_internal_callback($matches)
{
	$link = $matches[0];
    if (strpos($link, 'rel') === false) {
     $link = preg_replace("%(href=\S)%i", 'rel="nofollow" $1', $link);

    }
    return $link;
}
function mwb_wn_remove_nofollow_callback($matches)
{
	$link = $matches[0];
    $link = preg_replace('/rel="nofollow"/', null, $link);
    return $link;
}