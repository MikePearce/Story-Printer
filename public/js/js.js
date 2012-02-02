$(document).ready(function() {
    
    /** Clear all teh stories **/
    $("#clearStories").click(function() {
        if (confirm("Are you sure?")) {
            window.location = '/stories/clear'
        }
    });

    //Message Sliders
    if ($('#message_slider').text() != '') {
        $('#message_slider').fadeIn('slow').delay(2000).fadeOut('slow');
    }
    if ($('#error_slider').text() != '') {
        $('#error_slider').fadeIn('slow').delay(2000).fadeOut('slow');
    }
    
    // Jeditable stuff
    // General editing
    $('.edit').editable('/stories/edit', {
        cssclass    : 'edit_input_class',
        submit      : 'OK',
        style       : 'inherit'
    });
    
    // Edit the title
    $('.edit_title').editable('/stories/edit', {
        cssclass    : 'edit_input_class',
        submit      : 'OK',
        style       : 'inherit'
    });
    
    // Edit the efford
    $('.edit_effort').editable('/stories/edit', {
        cssclass    : 'edit_input_class',
        submit      : 'OK',
        style       : 'inherit',
        placeholder : '0'
    });
    
    // Edit the story
    $('.edit_story').editable('/stories/edit', {
        type        : 'textarea',
        cssclass    : 'edit_area_class',
        submit      : 'OK',
        style       : 'inherit',
        data        : function(value, settings) {
             /* Convert <br> to newline. */
            var retval = value.replace(/\n/gi, '');
            retval = value.replace(/<br[\s\/]?>/gi, '\n');
             return retval;
           },
        callback : function(value, settings) {

        }
    });
    
    // Edit the story
    $('.edit_cos').editable('/stories/edit', {
        type        : 'textarea',
        cssclass    : 'edit_area_class',
        submit      : 'OK',
        style       : 'inherit',
        data        : function(value, settings) {
             /* Convert <br> to newline. */
            var retval = value.replace(/\n/gi, '');
            retval = value.replace(/<br[\s\/]?>/gi, '\n');
             return retval;
           },
        callback : function(value, settings) {
        }
    });
    
    $('.edit_settings').editable('/user/savesettings', {
        cssclass    : 'edit_input_class',
        submit      : 'OK',
        style       : 'inherit'
    });
       

});