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
<h1 class="mwb_nf_heading"><?php _e('Wordpress nofollow Links','mwb_wp_nofollow')?></h1>
	<?php
	if(isset($_POST["mwb_wn_add"]))
	{?>
		<div class="notice notice-success is-dismissible">
		 <p>
		 	<?php _e('Settings saved','mwb_wp_nofollow')?>
		 </p>
		</div>
	<?}
	?>
	<form method="post" class="form-class"><br>
		
		<input type="checkbox" name="mwb_add_alt_image" id="mwb_add_alt_image" <?php echo $mwb_wn_checked_image;?>>
		<span id="mwb_checkbox_text">
		<?php _e('Add/Remove alt to image','mwb_wp_nofollow')?><br>
		<p class="description" id="tagline-description">
			<?php _e('This setting can be used to add image alt attribute by enabling the checkbox and remove image alt attribute by disabling the checkbox','mwb_wp_nofollow')?>
		</p>
		</span>
		<br><br><br>
		
		<input type="checkbox" name="mwb_add_rel_link" id="mwb_add_rel_link" <?php echo $mwb_wn_checked_link;?>>
		<?php _e('Add rel=nofollow to external links','mwb_wp_nofollow')?>
		<br>
		<p class="description" id="tagline-description">
			<?php _e('This setting can be used to add the rel=nofollow attribute to the external links','mwb_wp_nofollow')?>
		</p>	
		<br><br><br>
		
		<input type="checkbox" name="mwb_add_internal_rel_link" id="mwb_add_internal_rel_link" <?php echo $mwb_wn_checked_internal_link;?>>
		<?php _e('Add rel=nofollow to all links','mwb_wp_nofollow')?>
		<br>
		<p class="description" id="tagline-description">
			<?php _e('This setting can be used to add the rel=nofollow attribute to all the links','mwb_wp_nofollow')?>
		</p>	
        <br><br><br>
        
        <input type="checkbox" name="mwb_remove_rel_link" id="mwb_remove_rel_link" <?php echo $mwb_wn_checked_remove_rel_link;?>>
        <?php _e('Remove rel=nofollow from all links','mwb_wp_nofollow')?>
        <br>
		<p class="description" id="tagline-description">
			<?php _e('This setting can be used to remove the rel=nofollow attribute from all the links','mwb_wp_nofollow')?>
		</p>	
        <br><br><br>
		
		<input type="submit" class="button button-primary" name="mwb_wn_add" value=<?php _e('save settings','mwb_wp_nofollow')?>>

	</form>