<?php
/**
* ------------------------------------------------------------------------------------------------
* Section title element map
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_vc_map_title' ) ) {
	function woodmart_vc_map_title() {
		vc_map( array(
			'name' => esc_html__( 'Section title', 'woodmart' ),
			'base' => 'woodmart_title',
			'category' => esc_html__( 'Theme elements', 'woodmart' ),
			'description' => esc_html__( 'Styled title for sections', 'woodmart' ),
        	'icon' => WOODMART_ASSETS . '/images/vc-icon/section-title.svg',
			'params' => array(
				array(
					'type' => 'textarea',
					'holder' => 'div',
					'heading' => esc_html__( 'Title', 'woodmart' ),
					'param_name' => 'title'
				),
				array(
					'type' => 'textarea',
					'heading' => esc_html__( 'Sub title', 'woodmart' ),
					'param_name' => 'subtitle'
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Subtitle font', 'woodmart' ),
					'param_name' => 'subtitle_font',
					'value' => array(
						esc_html__( 'Default', 'woodmart' ) => 'default',
						esc_html__( 'Alternative', 'woodmart' ) => 'alt'
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Subtitle style', 'woodmart' ),
					'param_name' => 'subtitle_style',
					'value' => array(
						esc_html__( 'Default', 'woodmart' ) => 'default',
						esc_html__( 'Background', 'woodmart' ) => 'background'
					)
				),
				array(
					'type' => 'textarea',
					'heading' => esc_html__( 'Text after title', 'woodmart' ),
					'param_name' => 'after_title'
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Title width', 'woodmart' ),
					'param_name' => 'title_width',
					'value' => array(
						'100%' => '100',
						'90%' => '90',
						'80%' => '80',
						'70%' => '70',
						'60%' => '60',
						'50%' => '50',
						'40%' => '40',
						'30%' => '30',
						'20%' => '20',
						'10%' => '10'
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Title style', 'woodmart' ),
					'param_name' => 'style',
					'value' => array(
						esc_html__( 'Default', 'woodmart' ) => 'default',
						esc_html__( 'Simple', 'woodmart' ) => 'simple',
						esc_html__( 'Bordered', 'woodmart' ) => 'bordered',
						esc_html__( 'Underline', 'woodmart' ) => 'underlined',
						esc_html__( 'Underline 2', 'woodmart' ) => 'underlined-2',
						esc_html__( 'Shadow', 'woodmart' ) => 'shadow'
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Title color', 'woodmart' ),
					'param_name' => 'color',
					'value' => woodmart_section_title_color_variation()
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Title tag', 'woodmart' ),
					'param_name' => 'tag',
					'value' => array(
						'h1','h2','h3','h4','h5','h6','p','div','span'
					),
					'std' => 'h4'
				),
				woodmart_title_gradient_picker(),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Title size', 'woodmart' ),
					'param_name' => 'size',
					'value' => array(
						esc_html__( 'Default', 'woodmart' ) => 'default',
						esc_html__( 'Small', 'woodmart' ) => 'small',
						esc_html__( 'Medium', 'woodmart' ) => 'medium',
						esc_html__( 'Large', 'woodmart' ) => 'large',
						esc_html__( 'Extra Large', 'woodmart' ) => 'extra-large'
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Title align', 'woodmart' ),
					'param_name' => 'align',
					'value' => array(
						esc_html__( 'Center', 'woodmart' ) => 'center',
						esc_html__( 'Left', 'woodmart' ) => 'left',
						esc_html__( 'Right', 'woodmart' ) => 'right'
					)
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'woodmart' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'woodmart' )
				),
				array(
					'type' => 'css_editor',
					'heading' => esc_html__( 'CSS box', 'woodmart' ),
					'param_name' => 'css',
					'group' => esc_html__( 'Design Options', 'woodmart' )
				),
			),
		) );
	}
	add_action( 'vc_before_init', 'woodmart_vc_map_title' );
}
