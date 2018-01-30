<?php
/**
* ------------------------------------------------------------------------------------------------
* Countdown timer element map
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_vc_map_countdown_timer' ) ) {
	function woodmart_vc_map_countdown_timer() {
		vc_map( array(
			'name' => esc_html__( 'Countdown timer', 'woodmart' ),
			'base' => 'woodmart_countdown_timer',
			'category' => esc_html__( 'Theme elements', 'woodmart' ),
			'description' => esc_html__( 'Shows countdown timer', 'woodmart' ),
        	'icon' => WOODMART_ASSETS . '/images/vc-icon/countdown-timer.svg',
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Date', 'woodmart' ),
					'param_name' => 'date',
					'description' => __( 'Final date in the format Y/m/d. For example 2017/12/12', 'woodmart' )
				),
				woodmart_get_color_scheme_param(),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Size', 'woodmart' ),
					'param_name' => 'size',
					'value' => array(
						'' => '',
						esc_html__( 'Small', 'woodmart' ) => 'small',
						esc_html__( 'Medium', 'woodmart' ) => 'medium',
						esc_html__( 'Large', 'woodmart' ) => 'large',
						esc_html__( 'Extra Large', 'woodmart' ) => 'xlarge',
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Align', 'woodmart' ),
					'param_name' => 'align',
					'value' => array(
						'' => '',
						esc_html__( 'left', 'woodmart' ) => 'left',
						esc_html__( 'center', 'woodmart' ) => 'center',
						esc_html__( 'right', 'woodmart' ) => 'right',
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Style', 'woodmart' ),
					'param_name' => 'style',
					'value' => array(
						'' => '',
						esc_html__( 'Standard', 'woodmart' ) => 'standard',
						esc_html__( 'Transparent', 'woodmart' ) => 'transparent',
						esc_html__( 'Primary color', 'woodmart' ) => 'active',
					)
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'woodmart' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'woodmart' )
				)
			)
		) );
	}
	add_action( 'vc_before_init', 'woodmart_vc_map_countdown_timer' );
}