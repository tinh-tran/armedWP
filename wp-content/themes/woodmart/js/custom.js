/*jQuery(document).ready(function( $ ) {

    $('.banner-inner').isotope({
        itemSelector: '.banner-item',
        transitionDuration: '0.8s',
        masonry: {
            gutter: 0
        }
    });

});*/

jQuery(document).ready(function( $ ) {

    $(".single-product_fixed-wrapper").stick_in_parent({offset_top: 150});
    $(".anchor").stick_in_parent({offset_top: 60});

    $('.comment-form > .form-submit > .submit').val('Оставить отзыв');

    $('.product-price-rating > .price > .amount').append("<a class='product__question product__question-detail' href='#'></a>");
    $('.product-price-rating > .price > inc > .amount').append("<a class='product__question product__question-detail' href='#'></a>");


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


/* Tooltip */

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

});