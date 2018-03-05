/**
 * ------------------------------------------------------------------------------------------------
 * Frontend JS integration on Armed
 * version 0.1.0
 * author magersoft
 * ------------------------------------------------------------------------------------------------
 */


"use strict";
/**
 * ------------------------------------------------------------------------------------------------
 * HEADER
 *  - Primary menu
 *  - Secondary menu
 *  - Widget
 *  - Search
 * ------------------------------------------------------------------------------------------------
 */
jQuery(document).ready(function( $ ) {

    // Widget - dropdown cart scrollbar
    $(".scroll-content").mCustomScrollbar({
        theme:"dark",
        scrollbarPosition: "outside"
    });
    // Widget - dropdown cart scrollbar with supported Ajax added
    $(".dropdown-cart").on('DOMSubtreeModified', function() {
        $(".scroll-content").mCustomScrollbar({
            theme:"dark",
            scrollbarPosition: "outside"
        });
        $(".widget_shopping_cart").css('height', '450px');
    });

    // Widger - dropdown cart change parent class
    // - If cart empty
    $(".woocommerce-mini-cart__empty-message")
        .parents(".widget_shopping_cart")
            .css('height', '30px');
    // - If cart empty only deleted all product of widget cart
    $(".dropdown-cart").on('DOMSubtreeModified', function () {
        $(this).find(".woocommerce-mini-cart__empty-message")
            .parents(".widget_shopping_cart")
            .css('height', '30px');
    });
});
/**
 * ------------------------------------------------------------------------------------------------
 * PRODUCT PAGE
 *  - Main loop
 *  - Widget loop
 *  - Sticky
 *  - Slider
 *  - Anchor-menu
 *  - Tooltip
 * ------------------------------------------------------------------------------------------------
 */
jQuery(document).ready(function( $ ) {
    // Sticky widget loop
    $(".single-product_fixed-wrapper").stick_in_parent({offset_top: 100});

    // Sticky anchor menu
    $(".anchor").stick_in_parent({offset_top: 60});

    // Testimonial
    $('.comment-form > .form-submit > .submit').val('Оставить отзыв');

    // Tooltip price
    $('.product-price-rating > .price > .amount').append("<a class='product__question product__question-detail' href='#'></a>");
    $('.product-price-rating > .price > inc > .amount').append("<a class='product__question product__question-detail' href='#'></a>");

    // Tooltip in table with function
    function simple_tooltip(target_items, name){
        $(target_items).each(function(i){
            $("body").append("<div class='"+name+"' id='"+name+i+"'><p>"+$(this).attr('title')+"</p></div>");
            var my_tooltip = $("#"+name+i);

            $(this).removeAttr("title").mouseover(function(){
                my_tooltip.css({opacity:0.8, display:"none"}).fadeIn(400);
            }).mousemove(function(kmouse){
                my_tooltip.css({left:kmouse.pageX+15, top:kmouse.pageY+15});
            }).mouseout(function(){
                my_tooltip.fadeOut(400);
            });
        });
    }
    $(document).ready(function(){
        simple_tooltip(".detail__table-item a","tooltip");
    });

    // Slick slider advantages
    $('.slider-advantages').slick({dots: false,autoplaySpeed: 5000,speed: 300,infinite: true,arrows: true,nextArrow: '<button type="button" role="button" aria-label="Next" style="color:#bdbdbd; font-size:20px;" class="slick-next default"><i class="ultsl-arrow-right4"></i></button>',prevArrow: '<button type="button" role="button" aria-label="Previous" style="color:#bdbdbd; font-size:20px;" class="slick-prev default"><i class="ultsl-arrow-left4"></i></button>',slidesToScroll:4,slidesToShow:4,swipe: true,draggable: true,touchMove: true,pauseOnHover: true,adaptiveHeight: true,responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 481,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ],pauseOnDotsHover: true,customPaging: function(slider, i) {
            return '<i type="button" style="color:#333333;" class="ultsl-record" data-role="none"></i>';
        },});

        // Slick slider video
        $('.slider-video').slick({dots: false,autoplay: false,autoplaySpeed: 5000,speed: 300,infinite: true,arrows: true,nextArrow: '<button type="button" role="button" aria-label="Next" style="color:#bdbdbd; font-size:20px;" class="slick-next default"><i class="ultsl-arrow-right4"></i></button>',prevArrow: '<button type="button" role="button" aria-label="Previous" style="color:#bdbdbd; font-size:20px;" class="slick-prev default"><i class="ultsl-arrow-left4"></i></button>',slidesToScroll:2,slidesToShow:2,swipe: true,draggable: true,touchMove: true,pauseOnHover: true,adaptiveHeight: true,responsive: [
                {
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 481,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ],pauseOnDotsHover: true,customPaging: function(slider, i) {
                return '<i type="button" style="color:#333333;" class="ultsl-record" data-role="none"></i>';
            },});
});


/**
 * ------------------------------------------------------------------------------------------------
 * PRODUCT SINGLE CARD
 *
 * ------------------------------------------------------------------------------------------------
 */
jQuery(document).ready(function( $ ) {
    $(".products").on('DOMSubtreeModified', function() {
        $('.bg-product-grid-item').hover(
            function () {
                if ($(this).hasClass('product_entity')) {
                    $(this).removeClass('product_entity_nothover').addClass('product_entity_hover');
                }
                else if ($(this).hasClass('product_entitySm')) {
                    $(this).removeClass('product_entitySm_nothover').addClass('product_entitySm_hover');
                }
                else {
                    $(this).removeClass('hidden-widget').addClass('visible-widget');
                    $(this).children('.product__asside').removeClass('product__asside_hide').addClass('product__asside_active');
                    $(this).children('.product__buttonWrapp').removeClass('product__buttonWrapp_hide').addClass('product__buttonWrapp_active');
                }
            },
            function () {
                if ($(this).hasClass('product_entity')) {
                    $(this).removeClass('product_entity_hover').addClass('product_entity_nothover');
                }
                else if ($(this).hasClass('product_entitySm')) {
                    $(this).removeClass('product_entitySm_hover').addClass('product_entitySm_nothover');
                }
                else {
                    $(this).removeClass('visible-widget').addClass('hidden-widget');
                    $(this).children('.product__asside').removeClass('product__asside_active').addClass('product__asside_hide');
                    $(this).children('.product__buttonWrapp').removeClass('product__buttonWrapp_active').addClass('product__buttonWrapp_hide');
                }

            }
        );
    });

    $('.bg-product-grid-item').hover(
        function() {
            if ($(this).hasClass('product_entity')) {
                $(this).removeClass('product_entity_nothover').addClass('product_entity_hover');
            }
            else if ($(this).hasClass('product_entitySm')) {
                $(this).removeClass('product_entitySm_nothover').addClass('product_entitySm_hover');
            }
            else
            {
                $(this).removeClass('hidden-widget').addClass('visible-widget');
                $(this).children('.product__asside').removeClass('product__asside_hide').addClass('product__asside_active');
                $(this).children('.product__buttonWrapp').removeClass('product__buttonWrapp_hide').addClass('product__buttonWrapp_active');
            }
        },
        function(){
            if ($(this).hasClass('product_entity')){
                $(this).removeClass('product_entity_hover').addClass('product_entity_nothover');
            }
            else if ($(this).hasClass('product_entitySm')) {
                $(this).removeClass('product_entitySm_hover').addClass('product_entitySm_nothover');
            }
            else
            {
                $(this).removeClass('visible-widget').addClass('hidden-widget');
                $(this).children('.product__asside').removeClass('product__asside_active').addClass('product__asside_hide');
                $(this).children('.product__buttonWrapp').removeClass('product__buttonWrapp_active').addClass('product__buttonWrapp_hide');
            }

        }
    );
});


/* Youtube js */
jQuery(document).ready(function ($) {
    $(".youtube").each(function() {
        // Based on the YouTube ID, we can easily find the thumbnail image
        $(this).css('background-image', 'url(http://i.ytimg.com/vi/' + this.id + '/sddefault.jpg)');

        // Overlay the Play icon to make it look like a video player
        $(this).append($('<div/>', {'class': 'play'}));

        $(document).delegate('#'+this.id, 'click', function() {
            // Create an iFrame with autoplay set to true
            var iframe_url = "https://www.youtube.com/embed/" + this.id + "?autoplay=1&autohide=1";
            if ($(this).data('params')) iframe_url+='&'+$(this).data('params');

            // The height and width of the iFrame should be the same as parent
            var iframe = $('<iframe/>', {'frameborder': '0', 'src': iframe_url, 'width': $(this).width(), 'height': $(this).height() })

            // Replace the YouTube thumbnail with YouTube HTML5 Player
            $(this).replaceWith(iframe);
        });
    });
});

