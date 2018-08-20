<?
    $mwb_wn_alt_activation=get_option("mwb_add_rel_link");
	$mwb_wn_checked_external_link="";
	if($mwb_wn_alt_activation=="on")
	{
		$mwb_wn_checked_external_link="checked";
	}	
	$mwb_wn_alt_internal_activation=get_option("mwb_add_rel_internal_link");
	echo $mwb_wn_alt_internal_activation;
	$mwb_wn_checked_internal_link="";
	if($mwb_wn_alt_internal_activation=="on")
	{
		$mwb_wn_checked_internal_link="checked";
	}

?>
<form method="post" class="mwb_form_class"> 
 <br><input type="checkbox" name="mwb_add_rel_link" <?php echo $mwb_wn_checked_link;?>>Add rel="nofollow" to external links<br>
 <br><input type="checkbox" name="mwb_add_internal_rel_link" <?php echo $mwb_wn_checked_internal_link;?>>Add rel="nofollow" to internal links
 <br><br><input type="submit" class="button button-primary" value="save" name="mwb_save_rel_attri"></input>
</form>

<?php 
 
 if(isset($_POST["mwb_save_rel_attri"]))
	{
	    $mwb_wn_enable=isset($_POST['mwb_add_rel_link'])?$_POST['mwb_add_rel_link']:"off";
		update_option("mwb_add_rel_link",$mwb_wn_enable);
		$mwb_wn_enable=isset($_POST['mwb_add_internal_rel_link'])?$_POST['mwb_add_internal_rel_link']:"off";
		update_option("mwb_add_rel_internal_link",$mwb_wn_enable);

	}

?>