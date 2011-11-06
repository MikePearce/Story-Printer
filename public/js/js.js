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
    $('.edit').editable('http://example.com/stories/edit');

});