<?php
/**
* ------------------------------------------------------------------------------------------------
* Counter shortcode
* ------------------------------------------------------------------------------------------------
*/
if( ! function_exists( 'woodmart_shortcode_animated_counter' ) ) {
	function woodmart_shortcode_animated_counter($atts) {
		$output = $label = $el_class = '';
		extract( shortcode_atts( array(
			'label' => '',
			'value' => 100,
			'time' => 1000,
			'color_scheme' => '',
			'color' => '',
			'size' => 'default',
			'font_weight' => 600,
			'align' => 'center',
			'css' => '',
			'el_class' => ''
		), $atts ) );
		
		$counter_id = 'counter-id-' . uniqid();
		
		$el_class .= ' counter-' . $size;
		$el_class .= ' text-' . $align;
		$el_class .= ' color-scheme-' . $color_scheme;
		
		if( function_exists( 'vc_shortcode_custom_css_class' ) ) {
			$el_class .= ' ' . vc_shortcode_custom_css_class( $css );
		}

		ob_start();
		?>
			<div class="woodmart-counter <?php echo esc_attr( $el_class ); ?>" id="<?php echo esc_attr( $counter_id ); ?>">
				<span class="counter-value" data-state="new" data-final="<?php echo esc_attr( $value ); ?>"><?php echo esc_attr( $value ); ?></span>
				<?php if ( $label != '' ): ?>
					<span class="counter-label"><?php echo esc_html( $label ); ?></span>
				<?php endif ?>
				
				<?php if ( $color_scheme == 'custom' || !empty( $font_weight ) ): ?>
					<style media="screen">
						<?php if ( $color ): ?>
							.woodmart-counter#<?php echo esc_attr( $counter_id ); ?>{
								color: <?php echo esc_attr( $color ); ?>;
							}
					    <?php endif ?>
						
						<?php if ( $font_weight ): ?>
							.woodmart-counter#<?php echo esc_attr( $counter_id ); ?> .counter-value{
								font-weight: <?php echo esc_attr( $font_weight ); ?>;
							}
						<?php endif ?>
					</style>
				<?php endif ?>
			</div>
			
		<?php
		$output .= ob_get_clean();

		return $output;
	}
	add_shortcode( 'woodmart_counter', 'woodmart_shortcode_animated_counter' );
}