$( document ).ready( function() {

    var cookie_message_form_action = $( 'form#disable_cookies_message' ).attr( 'action' );

    $( "input[name='disable_cookies_message']" ).on('click',function (e) {
        e.preventDefault();
        $.ajax( cookie_message_form_action )
            .done(function() {
                $( '.cookie-message-container' ).hide();
        })
            .fail(function() {
                console.log( 'cookie message ajax script error' );
        });
    });

});
