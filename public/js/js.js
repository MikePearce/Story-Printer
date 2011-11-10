$(document).ready(function() {
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
    $('.edit').editable('/stories/edit', {
        cssclass    : 'edit_input_class',
        submit      : 'OK',
        style       : 'inherit'
    });
    $('.edit_area').editable('/stories/edit', {
        type        : 'textarea',
        cssclass    : 'edit_area_class',
        submit      : 'OK',
        style       : 'inherit',
        data        : function(value, settings) {
             /* Convert <br> to newline. */
            var retval = value.replace(/\n/gi, '');
            retval = value.replace(/<br[\s\/]?>/gi, '\n');
             return retval;
           }
    });
        
});