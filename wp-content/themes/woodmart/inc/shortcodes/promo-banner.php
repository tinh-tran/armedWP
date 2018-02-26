<?php
/**
* ------------------------------------------------------------------------------------------------
* Promo banner - image with text and hover effect
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_shortcode_promo_banner' )) {
	function woodmart_shortcode_promo_banner($atts, $content) {
		if( ! function_exists( 'wpb_getImageBySize' ) ) return;
		$click = $output = $class = $subtitle_class = $title_class = $title_wrap_class = $content_banner = $inner_class = '';
		extract(shortcode_atts( array(
			'image' => '',
			'img_size' => '800x600',
			'link' => '',
			'text_alignment' => 'left',
			'vertical_alignment' => 'top',
			'horizontal_alignment' => 'left',
			'style' => '',
			'hover' => 'zoom',
			'increase_spaces' => '',
			'woodmart_color_scheme' => 'light',
			'btn_text' => '',
			'btn_position' => 'hover',
			'btn_color' 	 => 'default',
			'btn_style'   	 => 'default',
			'btn_size' 		 => 'default',
			'title' 	 => '',
			'subtitle' 	 => '',
			'subtitle_color' 	 => 'default',
			'subtitle_style' 	 => 'default',
			'font_weight' 	 => 600,
			'title_size'  => 'default',
			'content_text_size'  => 'default',
			'content_spacing'  => 'default',
			'content_width' => '100',
			'el_class' => '',

			'title_desktop_text_size' => '',
			'subtitle_desktop_text_size' => '',
			'title_tablet_text_size' => '',
			'subtitle_tablet_text_size' => '',
			'title_mobile_text_size' => '',
			'subtitle_mobile_text_size' => '',
		), $atts ));

		$images = explode(',', $image);

		if( $link != '') {
			$class .= ' cursor-pointer';
		}

		$id = 'banner-id-' . uniqid();

		$class .= ' banner-vr-align-' . $vertical_alignment;
		$class .= ' banner-hr-align-' . $horizontal_alignment;
		$class .= ' banner-' . $style;
		$class .= ' banner-hover-' . $hover;
		$class .= ' color-scheme-' . $woodmart_color_scheme;
		$class .= ' banner-btn-size-' . $btn_size;
		$class .= ' banner-btn-style-' . $btn_style;
		
		$subtitle_class .= ' subtitle-color-' . $subtitle_color;
		$subtitle_class .= ' subtitle-style-' . $subtitle_style;
		
		$title_class .= ' woodmart-font-weight-' . $font_weight;
		
		$content_banner .= ' text-' . $text_alignment;
		$content_banner .= ' content-width-' . $content_width;
		$content_banner .= ' content-spacing-' . $content_spacing;
		
		$title_wrap_class .= ' banner-title-' . $title_size;
		
		$inner_class .= ' content-size-' . $content_text_size;

		if( $increase_spaces == 'yes' ) {
			$class .= ' banner-increased-padding';
		}
		$class .= ' ' . $el_class;

		if ( strpos( $link, '|') ){
			$attributes = woodmart_vc_get_link_attr( $link );
		}else{
			$attributes = array(
				'target' => '',
				'url' => $link,
			);
		}
		
		if( ! empty( $btn_text ) ) {
			$class .= ' with-btn';
			$class .= ' banner-btn-position-' . $btn_position;
		}

		if ( count($images) > 1 ) {
			$class .= ' multi-banner';
		}

        if( $attributes['target'] == ' _blank' ) {
        	$onclick = 'onclick="window.open(\''. esc_url( $attributes['url'] ).'\',\'_blank\')"';
        } else {
        	$onclick = 'onclick="window.location.href=\''. esc_url( $attributes['url'] ).'\'"';
        }

		ob_start(); ?>
		<div class="promo-banner-wrapper" id="<?php echo esc_attr( $id ); ?>">
			<div class="promo-banner<?php echo esc_attr( $class ); ?>" <?php if( ! empty( $link ) ) echo ( $onclick ); ?> >

				<div class="main-wrapp-img">
					<div class="banner-image">
						<?php if ( count($images) > 0 ): ?>
							<?php $i=0; foreach ($images as $img_id): $i++; ?>
								<?php $img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'thumb_size' => $img_size, 'class' => 'promo-banner-image image-' . $i ) ); ?>
								<?php echo wp_kses( $img['thumbnail'], array( 'img' => array('class' => true,'width' => true,'height' => true,'src' => true,'alt' => true) ) );?>
							<?php endforeach ?>
						<?php endif ?>
					</div>
				</div>

				<div class="wrapper-content-banner">
					<div class="content-banner<?php echo esc_attr( $content_banner ); ?>">
							<div class="banner-title-wrap<?php echo esc_attr( $title_wrap_class ); ?>"><?php
								if( ! empty( $subtitle ) ) {
									echo '<span class="banner-subtitle' . esc_attr( $subtitle_class ) . '">' . $subtitle . '</span>';
								}
								if( ! empty( $title ) ) {
									echo '<h4 class="banner-title' . esc_attr( $title_class ) . '">' . $title . '</h4>';
								}
							 ?></div>
						<?php if ( $content ): ?>
							<div class="banner-inner<?php echo esc_attr( $inner_class ); ?>">
								<?php
									echo do_shortcode( $content );
								?>
							</div>
						<?php endif ?>
						<?php
							if( ! empty( $btn_text ) ) {
								echo '<div class="banner-btn-wrapper">';
								echo woodmart_shortcode_button( array(
										'title' 	 => $btn_text,
										'link' 	 	 => $link,
										'color' 	 => $btn_color,
										'style'   	 => $btn_style,
										'size' 		 => $btn_size,
										'align'  	 => $text_alignment,
									) );
								echo '</div>';
							}
						?>
					</div>
				</div>

			</div>
			<?php if ( $title_size == 'custom' ): ?>
				<style>
						
					<?php if ( $title_desktop_text_size ): ?>
						<?php woodmart_responsive_text_size_css( $id, 'banner-title', $title_desktop_text_size ); ?>
					<?php endif ?>
	
					<?php if ( $subtitle_desktop_text_size ): ?>
						<?php woodmart_responsive_text_size_css( $id, 'banner-subtitle', $subtitle_desktop_text_size ); ?>
					<?php endif ?>
					
					<?php if ( $title_tablet_text_size || $subtitle_tablet_text_size ): ?>
						@media (max-width: 1024px) {
							<?php if ( $title_tablet_text_size ): ?>
								<?php woodmart_responsive_text_size_css( $id, 'banner-title', $title_tablet_text_size ); ?>
							<?php endif ?>
	
							<?php if ( $subtitle_tablet_text_size ): ?>
								<?php woodmart_responsive_text_size_css( $id, 'banner-subtitle', $subtitle_tablet_text_size ); ?>
							<?php endif ?>
						}
					<?php endif ?>
	
					<?php if ( $title_mobile_text_size || $subtitle_mobile_text_size ): ?>
						@media (max-width: 767px) {
							<?php if ( $title_mobile_text_size ): ?>
								<?php woodmart_responsive_text_size_css( $id, 'banner-title', $title_mobile_text_size ); ?>
							<?php endif ?>
	
							<?php if ( $subtitle_mobile_text_size ): ?>
								<?php woodmart_responsive_text_size_css( $id, 'banner-subtitle', $subtitle_mobile_text_size ); ?>
							<?php endif ?>
						}
					<?php endif ?>
	
				</style>
			<?php endif ?>
		</div>
		
		<?php
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
	add_shortcode( 'promo_banner', 'woodmart_shortcode_promo_banner' );
}


if( ! function_exists( 'woodmart_shortcode_banners_carousel' ) ) {
	function woodmart_shortcode_banners_carousel( $atts = array(), $content = null ) {
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
			<div id="<?php echo esc_attr( $carousel_id ); ?>" class="banners-carousel-wrapper banners-spacing-<?php echo esc_attr( $slider_spacing ); ?>  woodmart-spacing-<?php echo esc_attr( $slider_spacing ); ?> banners-per-view-<?php echo esc_attr( $slides_per_view ); ?>">
				<div class="owl-carousel banners-carousel<?php echo esc_attr( $class ); ?>" >
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
	add_shortcode( 'banners_carousel', 'woodmart_shortcode_banners_carousel' );
}