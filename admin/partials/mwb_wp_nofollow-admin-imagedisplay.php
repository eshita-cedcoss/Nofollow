<?php
$mwb_wn_alt_activation=get_option("mwb_add_alt_image");
	$mwb_wn_checked_image="";
	if($mwb_wn_alt_activation=="on")
	{
		$mwb_wn_checked_image="checked";
	}
?>
<form method="post" class="mwb_form_class"> 
 <br><input type="checkbox" <?php echo $mwb_wn_checked_image;?>>Add alt="" to images<br>
 <br><br><input type="submit" class="button button-primary" value="save" name="mwb_add_alt"></input>
</form>