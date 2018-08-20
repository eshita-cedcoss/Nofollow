jQuery(document).ready(function(jQuery){
	

/*   jQuery("#mwb_add_alt_image").on("change",function(){
  	    var ajax_url=mwb_wt.ajax_url;
		var security=mwb_wt.security;
		var alt=mwb_wt.alt;
		console.log(alt);
		jQuery.ajax({
			method: "POST",
			url: ajax_url,
			data: { action: "mwb_wn_request",
			security: security },
			success: function(response)
			{   
				//console.log(alt);
				if(alt=="on")
				{
					jQuery("#mwb_checkbox_text").text("Removed alt from images"); 
				}	
	        }
         });
     });*/
     
  jQuery("#mwb_remove_rel_link").on("change",function(){
  	    var ajax_url=mwb_wt.ajax_url;
		var security=mwb_wt.security;
		var rel=mwb_wt.rel;
		var rel_internal=mwb_wt.rel_internal;
		jQuery.ajax({
			method: "POST",
			url: ajax_url,
			data: { action: "mwb_wn_request",
			security: security },
			success: function(response)
			{
				jQuery("#mwb_add_rel_link").attr('checked', false); 
				jQuery("#mwb_add_internal_rel_link").attr('checked', false); 
	        }
         });
     });
   jQuery("#mwb_add_rel_link").on("change",function(){
  	    var ajax_url=mwb_wt.ajax_url;
		var security=mwb_wt.security;
		var rel=mwb_wt.rel;
		var rel_internal=mwb_wt.rel_internal;
		jQuery.ajax({
			method: "POST",
			url: ajax_url,
			data: { action: "mwb_wn_request",
			security: security },
			success: function(response)
			{
				jQuery("#mwb_remove_rel_link").attr('checked', false); 
	        }
         });
     });
    jQuery("#mwb_add_internal_rel_link").on("change",function(){
  	    var ajax_url=mwb_wt.ajax_url;
		var security=mwb_wt.security;
		var rel=mwb_wt.rel;
		var rel_internal=mwb_wt.rel_internal;
		jQuery.ajax({
			method: "POST",
			url: ajax_url,
			data: { action: "mwb_wn_request",
			security: security },
			success: function(response)
			{
				jQuery("#mwb_remove_rel_link").attr('checked', false); 
	        }
         });
     });
});