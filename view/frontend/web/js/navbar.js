/**
 * @author Vectra Team
 * @copyright Copyright © Vectra Business Technologies
 * @package Vectra_StickyTabBar
 */
require([
    'jquery',
    'mage/url'
], function($, url){
    $(document).ready( function() {

        $('body').addClass('stickyTabBar')

        let path = window.location.href;
        let fullpath = path.replace('%/', '');

        url.setBaseUrl(BASE_URL);

        $('#navbar a').each(function() {
            if (this.href === fullpath) {
                if($(this).parent().hasClass('appify-reload')) {
                    $(this).parent().removeClass('active');
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

        if ($(window).innerWidth() < 767) {
            $('#navbar').delay(500).fadeIn(500);
            $(document).on("click", "#vectraMiniCart", function(event) {
                event.preventDefault()
                $('.openMiniCartModal').trigger('click');
                $('.viewcart').parent().parent().addClass('stickySliderView')
            }); 
        } else {
            $('.openMiniCartModal').hide()
        }
        
    });

});