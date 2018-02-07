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
    $(".anchor").stick_in_parent({offset_top: 92});

    $('.comment-form > .form-submit > .submit').val('Оставить отзыв');

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