jQuery(document).ready(function(){	/*Disable Generate code button	jQuery("#soundfaith_generate_shortcode").attr('disabled','disabled');*/	jQuery("#soundfaith_iframe_preview_content").hide();	jQuery("#soundfaith-shortcode input[name=soundfaith-include-playlist-shortcode]").click(function() {		if (!jQuery("#soundfaith-shortcode input[name=soundfaith-include-playlist-shortcode]").is(":checked")) 		{			/*jQuery("#soundfaith_generate_shortcode").attr('disabled','disabled');*/			jQuery("#soundfaith_iframe_preview_content").hide();		}		else		{			/*jQuery("#soundfaith_generate_shortcode").removeAttr('disabled');*/			jQuery("#soundfaith_iframe_preview_content").show();		}

	});	/*call a function to check playlist checkbox is checked or not*/	soundfaith_checkbox_default();	jQuery('#generated_code').css('display','none'); 					jQuery('#soundfaith_reset_shortcode').css('display','none');			jQuery("#soundfaith-shortcode input[name=soundfaith_generate_shortcode]").click(function() 	{		jQuery('#generated_code').css('display','block');					jQuery("#soundfaith_iframe_preview_content").show();

		jQuery('#generated_code_textarea').attr('readonly','readonly');				if( jQuery('#soundfaith-iframe-account-id-shortcode').val() )		{			var soundfaith_group_id_shortcode = jQuery('#soundfaith-iframe-account-id-shortcode').val();		}		else		{			var soundfaith_group_id_shortcode = jQuery('#soundfaith_iframe_preview_group_id').val();		}

		var soundfaith_frame_width_shortcode = jQuery('#soundfaith-shortcode input[name=soundfaith-iframe-width-shortcode]').val();

		var soundfaith_frame_height_shortcode = jQuery('#soundfaith-shortcode input[name=soundfaith-iframe-height-shortcode]').val();		

		if (!jQuery("#soundfaith-shortcode input[name=soundfaith-include-playlist-shortcode]").is(":checked")) 

		{	var include_playlist_shortcode = "false";}

		else

		{	var include_playlist_shortcode = jQuery('#soundfaith-shortcode input[name=soundfaith-include-playlist-shortcode]:checked').val();}		if (!jQuery("#soundfaith-shortcode input[name=soundfaith-include-speaker-shortcode]").is(":checked")) 

		{			var include_speaker_shortcode = "false";		}else{

			var include_speaker_shortcode = jQuery('#soundfaith-shortcode input[name=soundfaith-include-speaker-shortcode]:checked').val();

		}		if (!jQuery("#soundfaith-shortcode input[name=soundfaith-include-series-shortcode]").is(":checked")) 		{			var include_series_shortcode = "false";		}		else		{			var include_series_shortcode = jQuery('#soundfaith-shortcode input[name=soundfaith-include-series-shortcode]:checked').val()		}		if (!jQuery("#soundfaith-shortcode input[name=soundfaith-include-date-presented-shortcode]").is(":checked")) 		{

			var include_date_presented_shortcode = "false";

		}

		else

		{

			var include_date_presented_shortcode = jQuery('#soundfaith-shortcode input[name=soundfaith-include-date-presented-shortcode]:checked').val();

		}

		

		if (soundfaith_frame_width_shortcode == '')

		{

			soundfaith_frame_width_shortcode=640;

		}	

        if(soundfaith_frame_height_shortcode == '')

		{

			soundfaith_frame_height_shortcode=340;

		}				var soundfaith_iframe_account_id_shortcode = jQuery('#soundfaith-shortcode input[name=soundfaith-iframe-account-id-shortcode]').val();		

		if (soundfaith_iframe_account_id_shortcode == '') 		{			var soundfaith_iframe_account_id_shortcode = jQuery('#soundfaith_iframe_preview_group_id').val();		}		else		{			var soundfaith_iframe_account_id_shortcode = jQuery('#soundfaith-shortcode input[name=soundfaith-iframe-account-id-shortcode]').val();		}	

		var get_sfshortcode = '[soundfaith width="'+ soundfaith_frame_width_shortcode+'" height="'+soundfaith_frame_height_shortcode +'" account_id="'+soundfaith_iframe_account_id_shortcode+'" include_playlist="'+include_playlist_shortcode+'" include_speaker="'+include_speaker_shortcode+'" include_series="'+ include_series_shortcode+'" include_date_presented="'+ include_date_presented_shortcode+'"][/soundfaith]';		jQuery('#soundfaith_iframe_preview').attr('src', 'https://soundfaith.com/embed/profile/'+soundfaith_group_id_shortcode+'/recent?includePlaylist='+include_playlist_shortcode+'&scroll=true&includeSpeaker='+include_speaker_shortcode+'&includeSeries='+include_series_shortcode+'&includeDatePresented='+include_date_presented_shortcode);

		jQuery('#generated_code_textarea').html(get_sfshortcode);

		jQuery('#soundfaith_reset_shortcode').removeAttr( 'style' );

	});/* Reset All Data*/

	jQuery("#soundfaith-shortcode input[name=soundfaith_reset_shortcode]").click(function() 

	{

		jQuery('#generated_code_textarea').html('');

		jQuery('#generated_code').css('display','none');

		jQuery('#soundfaith_reset_shortcode').css('display','none');		jQuery("#soundfaith_iframe_preview_content").hide();

		jQuery('#soundfaith-shortcode input[name=soundfaith-iframe-width-shortcode]').val('');

		jQuery('#soundfaith-shortcode input[name=soundfaith-iframe-height-shortcode]').val('');		jQuery('#soundfaith-shortcode input[name=soundfaith-iframe-account-id-shortcode]').val('');

		jQuery('#soundfaith-shortcode input[name=soundfaith-include-playlist-shortcode]').removeAttr('checked');

		jQuery('#soundfaith-shortcode input[name=soundfaith-include-speaker-shortcode]').removeAttr('checked');

		jQuery('#soundfaith-shortcode input[name=soundfaith-include-series-shortcode]').removeAttr('checked');

		jQuery('#soundfaith-shortcode input[name=soundfaith-include-date-presented-shortcode]').removeAttr('checked');

		soundfaith_checkbox_default();

		/*jQuery("#soundfaith_generate_shortcode").attr('disabled','disabled');*/

	});

});

/*

 function check include playlist checkbox

*/

function soundfaith_checkbox_default(){	if(jQuery("#soundfaith-include-playlist-shortcode").is(':checked'))	{		jQuery("#soundfaith-shortcode input[type=checkbox]").each(function() {			jQuery(this).removeAttr('disabled');		});		jQuery("#soundfaith-include-playlist-shortcode").removeAttr('disabled');	}	else	{		jQuery("#soundfaith-shortcode input[type=checkbox]").each(function() 		{			jQuery(this).attr('disabled','disabled');		});		jQuery("#soundfaith-include-playlist-shortcode").removeAttr('disabled');	}	jQuery("#soundfaith-include-playlist-shortcode").click(function() 

	{		var allChecked = jQuery(this);		if(jQuery("#soundfaith-include-playlist-shortcode").is(':checked'))		{		  jQuery("#soundfaith-shortcode input[type=checkbox]").each(function() 		  {			  jQuery(this).removeAttr('disabled');			  jQuery(this).prop("checked", allChecked.is(':checked'));

		  });

		  jQuery("#soundfaith-include-playlist").removeAttr('disabled');

		}

		else

		{			jQuery("#soundfaith-shortcode input[type=checkbox]").each(function() 			{				jQuery(this).attr('disabled','disabled');				jQuery(this).prop("checked", allChecked.is(':checked'));

			});			jQuery("#soundfaith-include-playlist-shortcode").removeAttr('disabled');		}	});}jQuery( "#search_group" ).blur(function(){	jQuery('#search_group').trigger('keyup')});/* Search on Keypress*/jQuery("#search_group").keyup(function (){     var q = jQuery(this).val();	 if(q.length < 1 ){		 return false;	 }	 var result ='';	 var media_path ='';		jQuery.ajax({			url: ajaxvariation.ajaxurl,			type: 'post',			data: {				action: 'ajax_search_groups',				search:q				},			beforeSend: function() {				loading();			},			dataType: 'json',			success: function( response ) {				closeloading();				if(response==''){									}else{						JSON.stringify(response.accounts);						/*console.log(response.total);*/							result +='<div class="search-popup popup"><ol class="clear">';						for (var j = 0; j < response.accounts.length; j++) {							/*console.log(response.accounts[j].group.groupId);*/							var groupId = response.accounts[j].group.groupId;							/*console.log(response.accounts[j].accountType);*/							var accountType = response.accounts[j].accountType;							/*console.log(response.accounts[j].group.name);*/							var groupname = response.accounts[j].group.name;							/*console.log(response.accounts[j].group.memberCount);*/							var memberCount= response.accounts[j].group.memberCount;							/*console.log(response.accounts[j].group.token);*/							var token= response.accounts[j].group.token;							/*console.log(response.accounts[j].group.avatarUrl);*/							/*console.log(response.accounts[j].group.kind);*/							var kind= response.accounts[j].group.kind;							/*console.log(response.accounts[j]);*/														if(kind == "church"){								 media_path = ajaxvariation.MEDIA_PATH +'church.png';							}else if(kind == "general"){								 media_path = ajaxvariation.MEDIA_PATH +'general.png';							}else{								media_path = response.accounts[j].group.avatarUrl;							}														result += '<li class="clear">';							result +=	'<a href="/'+token+'">';							result +=		'<div class="search-item clear" data-group-id="'+groupId+'" data-account-type="'+accountType+'" data-name="'+groupname+'">';							result +=			'<div class="account-avatar ">';							result +=				'<img height="50" width="50" alt="'+groupname+'" title="'+kind+'" src="'+media_path+'">';							result +=			'</div>';							result +=			'<div class="account-info">';							result +=				'<div class="name">'+groupname+'</div>';							result +=				'<div class="info">';							result +=					'<span>'+kind+' • '+memberCount+' members</span>';							result +=				'</div>';							result +=			'</div>';							result +=		'</div>';							result +=	'</a>';							result += '</li>';						}						if(response.total > 10 ){							result +='<li class="clear">';							result +=	'<div class="search-item show-more-link clear" data-search="'+q+'" data-total="'+response.total+'">Show More</div>';							result +='</li>';							result +='</ol></div>';						}					jQuery('#search_result').html(result);										jQuery('.search-popup li a').each(function(){							jQuery(this).click(function(event){								event.preventDefault();								my_group_name=jQuery(this).find('div.search-item').data('name');								my_group_id=jQuery(this).find('div.search-item').data('group-id');								jQuery('#search_group').val(my_group_name);								jQuery('#selected_group').val(my_group_id);								jQuery('#search_result').html('');																});						});					}			}		});});jQuery(document).ready(function(){var page =0;jQuery(document).on('click','div.show-more-link',function (){	/*alert('Success');*/	page++;    var q = jQuery(this).data('search');	var offset = (page * 10);	jQuery(this).hide(); 	 var result ='';	 var media_path ='';		jQuery.ajax({			url: ajaxvariation.ajaxurl,			type: 'post',			data: {				action: 'ajax_search_groups',				search:q,				offset:offset				},			beforeSend: function() {				loading();			},			dataType: 'json',			success: function( response ) {				closeloading();				if(response==''){									}else{						JSON.stringify(response.accounts);						console.log(response.total);						for (var j = 0; j < response.accounts.length; j++) {							/*console.log(response.accounts[j].group.groupId);*/							var groupId = response.accounts[j].group.groupId;							/*console.log(response.accounts[j].accountType);*/							var accountType = response.accounts[j].accountType;							/*console.log(response.accounts[j].group.name);*/							var groupname = response.accounts[j].group.name;							/*console.log(response.accounts[j].group.memberCount);*/							var memberCount= response.accounts[j].group.memberCount;							/*console.log(response.accounts[j].group.token);*/							var token= response.accounts[j].group.token;							/*console.log(response.accounts[j].group.avatarUrl);*/							/*console.log(response.accounts[j].group.kind);*/							var kind= response.accounts[j].group.kind;							/*console.log(response.accounts[j]);*/														if(kind == "church"){								 media_path = ajaxvariation.MEDIA_PATH +'church.png';							}else if(kind == "general"){								 media_path = ajaxvariation.MEDIA_PATH +'general.png';							}else{								media_path = response.accounts[j].group.avatarUrl;							}														result += '<li class="clear">';							result +=	'<a href="/'+token+'">';							result +=		'<div class="search-item clear" data-group-id="'+groupId+'" data-account-type="'+accountType+'" data-name="'+groupname+'">';							result +=			'<div class="account-avatar ">';							result +=				'<img height="50" width="50" alt="'+groupname+'" title="'+kind+'" src="'+media_path+'">';							result +=			'</div>';							result +=			'<div class="account-info">';							result +=				'<div class="name">'+groupname+'</div>';							result +=				'<div class="info">';							result +=					'<span>'+kind+' • '+memberCount+' members</span>';							result +=				'</div>';							result +=			'</div>';							result +=		'</div>';							result +=	'</a>';							result += '</li>';						}						if(response.total > 10 ){							result +='<li class="clear">';							result +=	'<div class="search-item show-more-link clear" data-search="'+q+'" data-total="'+response.total+'">Show More</div>';							result +='</li>';						}					jQuery('.search-popup ol').append(result);					jQuery('.search-popup li a').each(function(){							jQuery(this).click(function(event){								event.preventDefault();								my_group_name=jQuery(this).find('div.search-item').data('name');								my_group_id=jQuery(this).find('div.search-item').data('group-id');								jQuery('#search_group').val(my_group_name);								jQuery('#selected_group').val(my_group_id);								jQuery('#search_result').html('');																});						});					}			}		});});		var copyButton = document.getElementById("copyButton")

	/* copy a content of shortcode*/	if( copyButton != null && copyButton != undefined ){		document.getElementById("copyButton").addEventListener("click", function() {			 jQuery("#generated_code_textarea").select();			 document.execCommand('copy');		});		}});function loading(){	jQuery('img.loading-search-results').css('marginLeft','8px');	jQuery('img.loading-search-results').show();}function closeloading(){	jQuery('img.loading-search-results').hide();}/*Show/Hide search box on radio button selection.*/jQuery(".form-table input[type=radio]").each(function(index) {	console.log(index);	if(jQuery(this).is(':checked') && (jQuery(this).val() == 2 ) ){		jQuery('#search_box').hide();	}else{		jQuery('#search_box').show();	}	jQuery(this).click(function(){		if(jQuery(this).val() == 1 ){			jQuery('#search_box').show();		}else{			jQuery('#search_box').hide();		}	});  });