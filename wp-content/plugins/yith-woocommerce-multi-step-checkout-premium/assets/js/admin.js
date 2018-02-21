(function( $ ){
    /* === Admin: ThankYou Page Tab === */

    var disable_opt = function ( disable ) {
            disable.css('opacity', '0.3');
            disable.css('pointer-events', 'none');
        },

        enable_opt = function ( disable ) {
            disable.css('opacity', '1');
            disable.css('pointer-events', 'auto');
        };

    var style           = $('#yith_wcms_thankyou_style'),
        thankyou_style = style.val(),
        ids             = new Array( 'yith_wcms_highlight_color','yith_wcms_table_header_backgroundcolor', 'yith_wcms_table_header_color', 'yith_wcms_table_row_backgroundcolor', 'yith_wcms_table_details_color', 'yith_wcms_details_background_color' );

    var switch_option = function() {
        for (var k = 0 in ids) {
            var elem = $('#' + ids[k]).parent().parent();
            thankyou_style == 'theme' ? disable_opt(elem) : enable_opt(elem);
        }
    }

    switch_option();

    style.on( 'change', function(){
        thankyou_style = $(this).val();
        switch_option();
    } );

    /* === Admin: Timeline & Button Page Tab === */

    var timeline_style = $( '#yith_wcms_timeline_template');

    if( typeof timeline_style != 'undefined' ){
        var current_style = timeline_style.val();
        $('.yith_wcms_title').add('.yith_wcms_table').hide();
        $( '.yith_wcms_title.' + current_style ).add( '.yith_wcms_table.' + current_style ).show();
    }

    timeline_style.on('change', function(){
        var new_style = timeline_style.val();
        $('.yith_wcms_title').add('.yith_wcms_table').hide();
        $( '.yith_wcms_title.' + new_style ).add( '.yith_wcms_table.' + new_style ).show();
    });

    /* === Admin: Navigation Button === */

    var nav_button_check = $('#yith_wcms_nav_buttons_enabled'),
        button_ids       = new Array( 'yith_wcms_timeline_options_next','yith_wcms_timeline_options_prev', 'yith_wcms_nav_disabled_prev_button'),
        enable_button    = function(e){
            if (typeof nav_button_check != 'undefined') {
                for (var k = 0 in button_ids) {
                    var elem = $('#' + button_ids[k]);
                    nav_button_check.is(':checked') ? enable_opt(elem) : disable_opt(elem);
                }
            }
        }

    nav_button_check.on( 'change click yith_init_nav_button', function(e){ enable_button(e); } );
    nav_button_check.trigger( 'yith_init_nav_button' );

    /* === Admin: Timeline Icon === */
    var step_count_select = $( '#yith_wcms_timeline_step_count_type');
        enable_icon = function(){
            var icon_option_row = $('.forminp-yith_wcms_media_upload').parent();
            step_count_select.val() == 'icon' ? enable_opt(icon_option_row) : disable_opt(icon_option_row);
        };

    step_count_select.on( 'change yith_wcms_step_count_change', function(){ enable_icon(); });
    step_count_select.trigger('yith_wcms_step_count_change');
})(jQuery);
