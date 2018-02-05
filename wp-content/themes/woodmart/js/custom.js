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
});