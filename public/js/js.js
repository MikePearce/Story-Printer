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

    // Contains ajax stuff for saving edits
    var sendEdit = function(obj) {
        var data = 'undefined' == typeof obj.data.postData ? {id: this.id, value: $(this).text()} : obj.data.postData;
        $.ajax({
            type: 'post',
            url: obj.data.url,
            data: data
        });
    };

    // editing stuff
    $('.edit').blur(
        {url: '/stories/edit'},
        sendEdit
    );

    $('.edit_story, .edit_cos').blur(function() {
        var value = $(this).html();

        //Convert <br> to newline.
        var deHtmled = value.replace(/\n/gi, '');
        deHtmled = value.replace(/<br[\s\/]?>/gi, '\n');
        
        sendEdit({
            data: {
                url: '/stories/edit',
                postData: {id: this.id, value: deHtmled}
            }
        });
    });
    
    $('.edit_settings').blur(
        {url: '/user/savesettings'},
        sendEdit
    );
});