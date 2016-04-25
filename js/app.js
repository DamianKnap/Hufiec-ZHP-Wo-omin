// Function for facebook sharing using facebook sharer so I can avoid FB API
function fbshareCurrentPage() {
    var width = 600;
    var height = 500;
    var left = parseInt((screen.availWidth/2) - (width/2));
    var top = parseInt((screen.availHeight/2) - (height/2));
    var windowFeatures = "width=" + width + ",height=" + height + ",status,resizable,left=" + left + ",top=" + top + "screenX=" + left + ",screenY=" + top;

    window.open( "https://www.facebook.com/sharer/sharer.php?u=" + escape( window.location.href ) + "&t=" + document.title, '', 'menubar=no, toolbar=no, resizable=yes, scrollbars=yes, ' + windowFeatures );
    return false;
 }

$( document ).ready( function() {

    $.each( $( ".gallery-item-inner a" ), function() {

        $( this ).addClass( "fancybox" ).attr( "rel", "gallery1" );

        $( this ).click( function( event ) {
            event.preventDefault();
        });

    });

    $( ".fancybox" ).fancybox({
        helpers:  {
            overlay: {
                locked: false
            }
        }
    });

    $('#partners-carousel').owlCarousel({
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:3,
            },
            1000:{
                items:4
            }
        },
        loop: true,
        rewind: false,
        dots: false,
        lazyLoad: false,
        lazyContent: false,
        autoplay: true,
        autoplayHoverPause: true,
        navText: ['&lsaquo;','&rsaquo;'],
    });

    $('.owl-carousel').owlCarousel({
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:3,
            },
            1000:{
                items:3
            }
        },
        loop: true,
        rewind: false,
        dots: false,
        lazyLoad: true,
        lazyContent: true,
        autoplay: true,
        autoplayHoverPause: true,
        navText: ['&lsaquo;','&rsaquo;'],
    });

});

$( document ).foundation();
