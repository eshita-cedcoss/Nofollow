<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://makewebbetter.com
 * @since      1.0.0
 *
 * @package    Mwb_wp_nofollow
 * @subpackage Mwb_wp_nofollow/admin/partials
 */
$tab1="";
$tab2="";
$tab3="";
$tab4="";
if(isset($_GET['tab']))
{
	if($_GET['tab']=='mwb_links')
	  {
	  	$tab1='mwb_wt_current';
	  } 
	if($_GET['tab']=='mwb_images')
	  {
	  	$tab2='mwb_wt_current';
	  } 
}
else
{
	$tab1='mwb_wt_current';
}
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<h1><?php _e('Attribute Setting','mwb_wp_nofollow')?></h1>
 <ul id="mwb_wt_tabs">
	<li><a href="<?php echo home_url()?>/wp-admin/admin.php?page=mwb_menu&tab=mwb_links" id ="<?php echo $tab1;?>"><?php _e('Links','mwb_wp_nofollow')?></a></li>
	<li><a href="<?php echo home_url()?>/wp-admin/admin.php?page=mwb_menu&tab=mwb_images" id ="<?php echo $tab2;?>"><?php _e('Images','mwb_wp_nofollow')?></a></li>	
</ul>
<?php

if(isset($_GET['tab']))
{
	if($_GET['tab']=='mwb_links')
	  {
	  require_once MWB_NF_DIR_PATH . 'admin/partials/mwb_wp_nofollow-admin-linksdisplay.php';
	  } 
	if($_GET['tab']=='mwb_images')
	  {
	   require_once MWB_NF_DIR_PATH . 'admin/partials/mwb_wp_nofollow-admin-imagedisplay.php';	
	  } 
}
else
{
	require_once MWB_NF_DIR_PATH . 'admin/partials/mwb_wp_nofollow-admin-linksdisplay.php';
}

?>