/*
 * jQuery Catfish Plugin - Version 1.3
 *
 * Copyright (c) 2007 Matt Oakes (http://www.gizone.co.uk)
 * Licensed under the MIT (LICENSE.txt)
 */

jQuery.fn.catfish = function(options) {
	this.settings = {
		closeLink: 'none',
		animation: 'slide',
		height: '50',
		sink: false,
	}
	if(options)
		jQuery.extend(this.settings, options);
	
	if ( this.settings.animation != 'slide' && this.settings.animation != 'none' && this.settings.animation != 'fade' ) {
		alert('animation can only be set to \'slide\', \'none\' or \'fade\'');
	}
	
	var id = this.attr('id');
	settings = this.settings;
	jQuery(this).css('padding', '0').css('height', this.settings.height + 'px').css('margin', '0').css('width', '100%');
	jQuery('html').css('padding', '0 0 ' + ( this.settings.height * 1 + 50 ) + 'px 0');
	if ( typeof document.body.style.maxHeight != "undefined" ) {
		jQuery(this).css('position', 'fixed').css('bottom', '0').css('left', '0');
	}
	
	var sink = this.settings.sink;
	var anim = this.settings.animation;
	if ( anim == 'slide' ) {
		jQuery(this).slideDown('slow');
		if(sink) {
		    jQuery(this).delay(sink).slideUp('slow');
		}
	}
	else if ( anim == 'fade' ) {
		jQuery(this).fadeIn('slow');
		if(sink) {
		    jQuery(this).delay(sink).fadeOut('slow');
		}
	}
	else {
		jQuery(this).show()
		if(sink) {
		    jQuery(this).delay(sink).hide();
		}
		
	}
	if ( this.settings.closeLink != 'none' ) {
		jQuery(this.settings.closeLink).click(function(){
			jQuery.closeCatfish(id);
			return false;
		});
	}
	
	// Return jQuery to complete the chain
	return this;
};
jQuery.closeCatfish = function(id) {
	this.catfish = jQuery('#' + id);
	jQuery(this.catfish).hide();
	jQuery('html').css('padding', '0');
	jQuery('body').css('overflow', 'visible'); // Change IE6 hack back
};