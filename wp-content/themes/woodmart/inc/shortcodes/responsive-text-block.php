<?php
/**
* ------------------------------------------------------------------------------------------------
* Woodmart responsive text block shortcode
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_shortcode_responsive_text_block' ) ) {
	function woodmart_shortcode_responsive_text_block( $atts, $content ) {
		extract( shortcode_atts( array(
			'text' 	 => 'Title',
			'font' 	 => 'primary',
			'font_weight' => '',
			'content_width' => '100',
			'color_scheme' => '',
			'color' => '',
			'size' 	 => 'default',
			'align' 	 => 'center',
			'el_class' 	 => '',
			'desktop_text_size' 	 => '',
			'tablet_text_size' 	 => '',
			'mobile_text_size' 	 => '',
			'css'		 => '',
		), $atts) );

		$text_class = $text_wrapper_class = '';

		$text_id = 'woodmart-text-block-id-' . uniqid();

		$text_wrapper_class .= ' color-scheme-' . $color_scheme;
		$text_wrapper_class .= ' woodmart-title-size-' . $size;
		$text_wrapper_class .= ' woodmart-title-width-' . $content_width;
		$text_wrapper_class .= ' text-' . $align;
		$text_class .= ' font-'. $font;
		$text_class .= ' woodmart-font-weight-'. $font_weight;

		if( function_exists( 'vc_shortcode_custom_css_class' ) ) {
			$text_wrapper_class .= ' ' . vc_shortcode_custom_css_class( $css );
		}

		if( $el_class != '' ) {
			$text_wrapper_class .= ' ' . $el_class;
		}
		ob_start();
		?>	
			<?php if ( $size == 'custom' || $color_scheme == 'custom' ): ?>
				<style>
					<?php if ( $desktop_text_size || $color ): ?>
					
						#<?php echo esc_attr( $text_id ); ?> .woodmart-text-block {
							<?php if ( $desktop_text_size ): ?>
								font-size: <?php echo esc_attr( $desktop_text_size ); ?>px;
								line-height: <?php echo esc_attr( $desktop_text_size + 10 ); ?>px;
							<?php endif ?>
							<?php if ( $color ): ?>
								color: <?php echo esc_attr( $color ); ?>;
							<?php endif ?>
						}

					<?php endif ?>
					
					<?php if ( $tablet_text_size ): ?>
						@media (max-width: 1024px) {
							<?php woodmart_responsive_text_size_css( $text_id, 'woodmart-text-block', $tablet_text_size ); ?>
						}
					<?php endif ?>

					<?php if ( $mobile_text_size ): ?>
						@media (max-width: 767px) {
							<?php woodmart_responsive_text_size_css( $text_id, 'woodmart-text-block', $mobile_text_size ); ?>
						}
					<?php endif ?>

				</style>
			<?php endif ?>
			<div id="<?php echo esc_attr( $text_id ) ;?>" class="woodmart-text-block-wrapper<?php echo esc_attr( $text_wrapper_class ) ;?>">
				<div class="woodmart-title-container woodmart-text-block<?php echo esc_attr( $text_class ) ;?>">
					<?php echo do_shortcode( $content ); ?>
				</div>
			</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();

		return $output;

	}
	add_shortcode( 'woodmart_responsive_text_block', 'woodmart_shortcode_responsive_text_block' );
}