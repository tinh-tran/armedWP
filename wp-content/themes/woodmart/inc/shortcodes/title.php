<?php
/**
* ------------------------------------------------------------------------------------------------
* Section title shortcode
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_shortcode_title' ) ) {
	function woodmart_shortcode_title( $atts ) {
		extract( shortcode_atts( array(
			'title' 	 => 'Title',
			'subtitle' 	 => '',
			'after_title'=> '',
			'link' 	 	 => '',
			'color' 	 => 'default',
			'woodmart_color_gradient' 	 => '',
			'style'   	 => 'default',
			'size' 		 => 'default',
			'subtitle_font' => 'default',
			'subtitle_style' => 'default',
			'align' 	 => 'center',
			'el_class' 	 => '',
			'css'		 => '',
			'tag'        => 'h4',
			'title_width' => '100'
		), $atts) );

		$output = $attrs = '';

		$title_class = $subtitle_class  = '';

		$title_class .= ' woodmart-title-color-' . $color;
		$title_class .= ' woodmart-title-style-' . $style;
		$title_class .= ' woodmart-title-size-' . $size;
		$title_class .= ' woodmart-title-width-' . $title_width;
		$title_class .= ' text-' . $align;

		$subtitle_class .= ' font-'. $subtitle_font;
		$subtitle_class .= ' style-'. $subtitle_style;

		$separator = '<span class="title-separator"><span></span></span>';

		if( function_exists( 'vc_shortcode_custom_css_class' ) ) {
			$title_class .= ' ' . vc_shortcode_custom_css_class( $css );
		}

		if( $el_class != '' ) {
			$title_class .= ' ' . $el_class;
		}

		$gradient_style = ( $color == 'gradient' ) ? 'style="' . woodmart_get_gradient_css( $woodmart_color_gradient ) . ';"' : '' ;

		$output .= '<div class="title-wrapper' . esc_attr( $title_class ) . '">';

			if( $subtitle != '' ) {
				$output .= '<div class="title-subtitle' . esc_attr( $subtitle_class ) . '">' . $subtitle . '</div>';
			}


			$output .= '<div class="liner-continer"> <span class="left-line"></span> <'. $tag .' class="woodmart-title-container title" ' . $gradient_style . '>' . $title . $separator . '</'. $tag .'> <span class="right-line"></span> </div>';

			if( $after_title != '' ) {
				$output .= '<div class="title-after_title">' . $after_title . '</div>';
			}

		$output .= '</div>';

		return $output;

	}
	add_shortcode( 'woodmart_title', 'woodmart_shortcode_title' );
}
