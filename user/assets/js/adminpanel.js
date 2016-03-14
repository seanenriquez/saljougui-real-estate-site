/*
THIS FILE HOLDS ALL JAVASCRIPT FUNCTIONS FOR THE SITE ADMIN PANEL
IF YOU ADD ANYTHING TO THIS FILE, PLEASE MAKE SURE YOU COMMENT!
DO NOT EDIT BELOW THIS LINE UNLESS YOU KNOW WHAT YOU ARE DOING :)
*/

/* Anything that needs to run when the page loads goes here */
$(function() {
	//do something when the page loads, like an alert() for testing
	//alert('Javascript Loaded!');
	$("[rel='tooltip']").tooltip();
});


/* TYPEAHEAD STUFF */
$(document).on('mousedown', 'ul.typeahead', function(e) {
    e.preventDefault();
});

$(function() {
	$('#typeahead').typeahead({
		minLength: 3,
		source: function(typeahead, query) {
			$.ajax({
				url: 'site-search.php',
				type: 'POST',
				data: 'query=' + query,
				dataType: 'JSON',
				async: false,
				success: function(data) {
					typeahead.process(data);
					
				}
			});
		}
	});		
});



/**
 * delete_logs function.
 * Empties the ip_logs table
 * @access public
 * @return void
 */
function delete_logs()
{
	_data = {};
	_data['req_type'] = 'delete_logs';

    $.post('site-ajax.php',_data,function(data){
	    
	    if(data == 'pass')
	    {
			$('#logs_table').fadeOut();
			$('#empty').fadeIn();
	    }
	    
    },'html');
    
}


/**
 * delete_page function.
 * Removes a dynamic page from the pages table
 * @access public
 * @param mixed id
 * @param mixed count
 * @return void
 */
function delete_page(id, count)
{
	_data = {};
	_data['req_type'] = 'delete_page';
	_data['page_id'] = id;

    $.post('site-ajax.php',_data,function(data){
	    
	    if(data == 'pass')
	    {
			$('#page_'+count).fadeOut();
			$('#deleted').fadeIn();
	    }
	    
    },'html');
    
}


/**
 * delete_image function.
 * Removes a gallery image from gallery_images table
 * @access public
 * @param mixed gallery_id
 * @param mixed filename
 * @param mixed count
 * @return void
 */
function delete_image(gallery_id,filename,count)
{
	_data = {};
	_data['req_type'] = 'delete_gallery_image';
	_data['gallery_id'] = gallery_id;
	_data['file_name'] = filename;
	
    $.post('site-ajax.php',_data,function(data){
	    
	    if(data == 'pass')
	    {
			$('#image_holder_'+count).fadeOut();   
	    }
	    
    },'html');

}


/**
 * delete_gallery function.
 * Removes an image gallery via ajax request
 * @access public
 * @param mixed gallery_id
 * @param mixed count
 * @return void
 */
function delete_gallery(gallery_id,count)
{
	_data = {};
	_data['req_type'] = 'delete_gallery';
	_data['gallery_id'] = gallery_id;
	
    $.post('site-ajax.php',_data,function(data){
	    
	    if(data == 'pass')
	    {
			$('#gallery_'+count).fadeOut();   
	    }
	    
    },'html');

}


/**
 * disable_gallery function.
 * Disables a gallery by gallery_id via ajax request
 * @access public
 * @param mixed gallery_id
 * @param mixed count
 * @return void
 */
function disable_gallery(gallery_id,count)
{
	_data = {};
	_data['req_type'] = 'disable_gallery';
	_data['gallery_id'] = gallery_id;
	
    $.post('site-ajax.php',_data,function(data){
	    
	    if(data == 'pass')
	    {
			$('#gallery_'+count).addClass('error');   
	    }
	    
    },'html');

}


/**
 * disable_custom_listing function.
 * Disables a custom listing via ajax request
 * @access public
 * @param mixed custom_listing_id
 * @param mixed count
 * @return void
 */
function disable_custom_listing(custom_listing_id,count)
{
	_data = {};
	_data['req_type'] = 'disable_custom_listing';
	_data['custom_listing_id'] = custom_listing_id;
	
	$.post('site-ajax.php',_data,function(data){
		
		if(data == 'pass')
		{
			$('#custom_listing_'+count).addClass('error');
			$('#custom_listing_'+count+'_status').text('Disabled');
		}	
		
	},'html');
	
}



/**
 * enable_custom_listing function.
 * Enables a custom listing via ajax request
 * @access public
 * @param mixed custom_listing_id
 * @param mixed count
 * @return void
 */
function enable_custom_listing(custom_listing_id,count)
{
	_data = {};
	_data['req_type'] = 'enable_custom_listing';
	_data['custom_listing_id'] = custom_listing_id;
	
	$.post('site-ajax.php',_data,function(data){
		
		if(data == 'pass')
		{
			$('#custom_listing_'+count).removeClass('error');
			$('#custom_listing_'+count+'_status').text('Enabled');
		}	
		
	},'html');
	
}


/**
 * enable_gallery function.
 * Enables a gallery by gallery_id via ajax request
 * @access public
 * @param mixed gallery_id
 * @param mixed count
 * @return void
 */
function enable_gallery(gallery_id,count)
{
	_data = {};
	_data['req_type'] = 'enable_gallery';
	_data['gallery_id'] = gallery_id;
	
    $.post('site-ajax.php',_data,function(data){
	    
	    if(data == 'pass')
	    {
			$('#gallery_'+count).removeClass('error');   
	    }
	    
    },'html');

}


/**
 * remove_log_entry function.
 * Removes a single log entry via ajax request
 * @access public
 * @param mixed log_id
 * @param mixed count
 * @return void
 */
function remove_log_entry(log_id,count)
{
	_data = {};
	_data['req_type'] = 'remove_log_entry';
	_data['log_id'] = log_id;
	
	$.post('site-ajax.php',_data,function(data){
		
		if(data == 'pass')
		{
			$('#log_'+count).fadeOut();
		}
	},'html');

}



/**
 * reset_photo_update function.
 * Resets the photo_update field for a listing so new images can be downloaded
 * @access public
 * @param mixed listing_id
 * @param mixed count
 * @return void
 */
function reset_photo_update(listing_id,count)
{
	_data = {};
	_data['req_type'] = 'reset_photo_update';
	_data['listing_id'] = listing_id;
	
	$.post('site-ajax.php',_data,function(data){
		
		if(data == 'pass')
		{
			$('#listing_'+count).removeClass('error');
			$('#update_images_notification').show();
		}
	},'html');

}


/**
 * delete_staff function.
 * Removes a staff member from the db
 * @access public
 * @param mixed staff_id
 * @param mixed count
 * @return void
 */
function delete_staff(staff_id,count)
{
	_data = {};
	_data['req_type'] = 'delete_staff';
	_data['staff_id'] = staff_id;
	
	$.post('site-ajax.php',_data,function(data){
		
		if(data == 'pass')
		{
			$('#staff_'+count).fadeOut();
		}
	},'html')
	
}


/**
 * delete_builder function.
 * Removes a builder from the db
 * @access public
 * @param mixed builder_id
 * @param mixed count
 * @return void
 */
function delete_builder(builder_id,count)
{
	_data = {};
	_data['req_type'] = 'delete_builder';
	_data['builder_id'] = builder_id;
	
	$.post('site-ajax.php',_data,function(data){
		
		if(data == 'pass')
		{
			$('#builder_'+count).fadeOut();
		}
		
	},'html')

}


/**
 * delete_custom_listing function.
 * Removes a custom listing from the custom_listings table via ajax request
 * @access public
 * @param mixed custom_listing_id
 * @param mixed count
 * @return void
 */
function delete_custom_listing(custom_listing_id,count)
{
	_data = {};
	_data['req_type'] = 'delete_custom_listing';
	_data['custom_listing_id'] = custom_listing_id;
	
	$.post('site-ajax.php',_data,function(data){
		
		if(data == 'pass')
		{
			$('#custom_listing_'+count).fadeOut();
		}
		
	},'html')

}


/**
 * delete_partner function.
 * Removes a partner from the partners table via ajax request
 * @access public
 * @param mixed partner_id
 * @param mixed count
 * @return void
 */
function delete_partner(partner_id,count)
{
	_data = {};
	_data['req_type'] = 'delete_partner';
	_data['partner_id'] = partner_id;
	
	$.post('site-ajax.php',_data,function(data){
		
		if(data == 'pass')
		{
			$('#partner_'+count).fadeOut();
		}
		
	},'html')

}