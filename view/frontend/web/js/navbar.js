/**
 * @author Vectra Team
 * @copyright Copyright © Vectra Business Technologies
 * @package Vectra_StickyTabBar
 */
require(['jquery','mage/url'], function($, url){
    $(document).ready( function() {

        $('body').addClass('stickyTabBar')

        let path = window.location.href;
        let fullpath = path.replace('%/', '');

        url.setBaseUrl(BASE_URL);

        $('#navbar a').each(function() {
            if (this.href === fullpath) {
                if($(this).parent().hasClass('appify-reload')) {
                    $(this).parent().removeClass('nav-item appify-reload appify-opacity');
                    $(this).parent().removeClass('active');
                    $(this).parent().addClass('nav-item active appify-reload appify-opacity');
                } else {
                    $(this).parent().addClass('active');
                }
            }
        });

        $('#navbar .nav-item').each(function() {
            if ($(this).hasClass('active')) {
                // Change Title Colour
                let selectedItem = '.' + this['classList'][0] + '.' + this['classList'][1];

                //Change active state image
                let activeImg = $(selectedItem + ' input.nav_iv').val();
                let baseUrl = url.build('/pub/media/vectra_stickytabbar/icons/');
                let fullUrl = baseUrl + activeImg;
                $(selectedItem + ' img').attr('src', fullUrl);
                $(selectedItem + ' img').attr('data-amsrc', fullUrl);
            }
        });

        $(document).on('click', '#closeMiniCart', function () {
            $('body').removeClass('openCart');
            $('.minicart-wrapper, .mage-dropdown-dialog').hide();
            console.log('close button clicked')
        })

        if ($(window).innerWidth() < 767) {
            $('#navbar').delay(500).fadeIn(500)
            $(document).on("click", "#vectraMiniCart", function() {
                if (!$('body').hasClass('openCart')) {
                    $('body').addClass('openCart');
                    $('.minicart-wrapper, .mage-dropdown-dialog').show();
                    $('.minicart-items-wrapper').css({'height': 'auto'});
                } else {
                    $('body').removeClass('openCart');
                    $('.minicart-wrapper, .mage-dropdown-dialog').hide();
                }
            }); 
    
            $(document).on("click", "#btn-minicart-close", function() {
                $('.mage-dropdown-dialog').hide();
                $('body').removeClass('openCart');
            })
        }
        
    });

});