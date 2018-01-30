<?php
/**
* ------------------------------------------------------------------------------------------------
* Info box
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_shortcode_info_box' ) ) {
	function woodmart_shortcode_info_box( $atts, $content ) {
		if( ! function_exists( 'wpb_getImageBySize' ) ) return;
		$click = $output = $class = $text_class = $subtitle_class = '';
		extract( shortcode_atts( array(
			'image' => '',
			'icon_type' => 'icon',
			'icon_style' => 'simple',
			'icon_text' => '',
			'icon_text_size' => 'default',
			'img_size' => '800x600',
			'link' => '',
			'alignment' => 'left',
			'image_alignment' => 'top',
			'style' => '',
			'hover' => '',
			'woodmart_color_scheme' => 'dark',
			'css' => '',
			'btn_text' => '',
			'btn_position' => 'hover',
			'btn_color' 	 => 'default',
			'btn_style'   	 => 'default',
			'btn_size' 		 => 'default',
			'title' 	 => '',
			'subtitle' 	 => '',
			'subtitle_color' 	 => 'default',
			'subtitle_style' 	 => 'default',
			'svg_animation' => '',
			'info_box_inline' => '',
			'title_size'  => 'default',
			'el_class' => ''
		), $atts ));


		$images = explode(',', $image);

		if( $link != '') {
			$class .= ' cursor-pointer';
		}

		$class .= ' woodmart-info-box';
		$class .= ' text-' . $alignment;
		$class .= ' box-title-' . $title_size;
		$class .= ' icon-alignment-' . $image_alignment;
		$class .= ' box-' . $style;
		$subtitle_class .= ' subtitle-style-' . $subtitle_style;
		$subtitle_class .= ' subtitle-color-' . $subtitle_color;
		// $class .= ' hover-' . $hover;
		$class .= ' color-scheme-' . $woodmart_color_scheme;
		if( $svg_animation == 'yes' ) $class .= ' with-animation';
		$text_class .= ( $icon_type == 'icon' ) ? ' with-icon' : ' with-text text-size-'. $icon_text_size;
		$text_class .= ' icon-style-' . $icon_style;
		$class .= ( $el_class ) ? ' ' . $el_class : '';

		$attributes = woodmart_vc_get_link_attr( $link );
		if ( count($images) > 1 ) {
			$class .= ' multi-icons';
		}

		if( $info_box_inline == 'yes' ) $class .= ' info-box-inline';

		if( ! empty( $btn_text ) ) {
			$class .= ' with-btn';
			$class .= ' btn-position-' . $btn_position;
		}

		if( function_exists( 'vc_shortcode_custom_css_class' ) ) {
			$class .= ' ' . vc_shortcode_custom_css_class( $css );
		}

		$rand = "svg-" . rand(1000,9999);

		$sizes = explode( 'x', $img_size );

		$width = $height = 128;
		if( count( $sizes ) == 2 ) {
			$width = $sizes[0];
			$height = $sizes[1];
		}
        if( $attributes['target'] == ' _blank' ) {
        	$onclick = 'window.open("'. esc_url( $attributes['url'] ).'","_blank")';
        } else {
        	$onclick = 'window.location.href="'. esc_url( $attributes['url'] ).'"';
        }

		ob_start(); ?>
			<div class="<?php echo esc_attr( $class ); ?>" <?php if( ! empty( $attributes['url'] ) ): ?> onclick="<?php echo esc_js( $onclick ); ?>" <?php endif; ?> >
				<?php if ( $images[0] || $icon_text ): ?>
					<div class="box-icon-wrapper <?php echo esc_attr( $text_class ); ?>">
						<div class="info-box-icon">

						<?php if ( $icon_type == 'icon' ): ?>

							<?php $i=0; foreach ($images as $img_id): $i++; ?>
								<?php $img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'thumb_size' => $img_size, 'class' => 'info-icon image-' . $i ) ); ?>
								<?php
									$src = $img['p_img_large'][0];
									if( substr($src, -3, 3) == 'svg' ) {
										if ( $svg_animation == 'yes' ) {
											wp_add_inline_script('woodmart-theme', 'jQuery(document).ready(function($) {
												new Vivus("' . esc_js( $rand ) . '", {
												    type: "delayed",
												    duration: 200,
												    start: "inViewport",
												    animTimingFunction: Vivus.EASE_OUT
												});
											});', 'after');
										}
										echo '<div class="info-svg-wrapper info-icon" style="width: ' . $width . 'px;height: ' . $height . 'px;">' . woodmart_get_any_svg( $src, $rand ) . '</div>';
									} else {
										echo wp_kses( $img['thumbnail'], array( 'img' => array('class' => true,'width' => true,'height' => true,'src' => true,'alt' => true) ) );
									}
								 ?>
							<?php endforeach ?>								
						<?php else: ?>
							<?php echo esc_attr( $icon_text ); ?>
						<?php endif ?>

						</div>
					</div>
				<?php endif; ?>
				<div class="info-box-content">
					<?php
						if( ! empty( $subtitle ) ) {
							echo '<div class="info-box-subtitle'. esc_attr( $subtitle_class ) .'">' . $subtitle . '</div>';
						}
						if( ! empty( $title ) ) {
							echo '<h4 class="info-box-title">' . $title . '</h4>';
						}
					 ?>
					<div class="info-box-inner">
						<?php
							echo do_shortcode( $content );
						?>
					</div>

					<?php
						if( ! empty( $btn_text ) ) {
							echo '<div class="info-btn-wrapper">';
							echo woodmart_shortcode_button( array(
									'title' 	 => $btn_text,
									'link' 	 	 => $link,
									'color' 	 => $btn_color,
									'style'   	 => $btn_style,
									'size' 		 => $btn_size,
									'align'  	 => $alignment,
								) );
							echo '</div>';
						}
					?>
					
				</div>
			</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
	add_shortcode( 'woodmart_info_box', 'woodmart_shortcode_info_box' );
}


if( ! function_exists( 'woodmart_shortcode_info_box_carousel' ) ) {
	function woodmart_shortcode_info_box_carousel( $atts = array(), $content = null ) {
		$output = $class = $autoplay = '';

		$parsed_atts = shortcode_atts( array_merge( woodmart_get_owl_atts(), array(
			'slider_spacing' => 30,
			'dragEndSpeed' => 600,
			'el_class' => '',
		) ), $atts );

		extract( $parsed_atts );

		$class .= ' ' . $el_class;
		$class .= ' ' . woodmart_owl_items_per_slide( $slides_per_view );

		$carousel_id = 'carousel-' . rand(100,999);

		ob_start(); ?>
			<div id="<?php echo esc_attr( $carousel_id ); ?>" class="info-box-carousel-wrapper info-box-spacing-<?php echo esc_attr( $slider_spacing ); ?>  woodmart-spacing-<?php echo esc_attr( $slider_spacing ); ?> info-box-per-view-<?php echo esc_attr( $slides_per_view ); ?>">
				<div class="owl-carousel info-box-carousel<?php echo esc_attr( $class ); ?>" >
					<?php echo do_shortcode( $content ); ?>
				</div>
			</div>

			<?php

				$parsed_atts['carousel_id'] = $carousel_id;
				woodmart_owl_carousel_init( $parsed_atts );

			 ?>

		<?php
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
	add_shortcode( 'woodmart_info_box_carousel', 'woodmart_shortcode_info_box_carousel' );
}