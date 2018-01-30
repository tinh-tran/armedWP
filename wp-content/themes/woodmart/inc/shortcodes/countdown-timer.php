<?php
/**
* ------------------------------------------------------------------------------------------------
* Countdown timer
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_shortcode_countdown_timer' )) {
	function woodmart_shortcode_countdown_timer($atts, $content) {
		if( ! function_exists( 'wpb_getImageBySize' ) ) return;
		$click = $output = $class = '';
		extract(shortcode_atts( array(
			'date' => '2018/12/12',
			'woodmart_color_scheme' => 'dark',
			'size' => 'medium',
			'align' => 'center',
			'style' => 'base',
			'el_class' => ''
		), $atts ));

		$class .= ' ' . $el_class;
		$class .= ' color-scheme-' . $woodmart_color_scheme;
		$class .= ' text-' . $align;
		$class .= ' timer-size-' . $size;
		$class .= ' timer-style-' . $style;
		
		$timezone = 'GMT';

		$date = str_replace( '/', '-', $date );

		if ( apply_filters( 'woodmart_wp_timezone_element', false ) ) $timezone = get_option( 'timezone_string' );

		ob_start(); ?>
			<div class="woodmart-countdown-timer<?php echo esc_attr( $class ); ?>">
				<div class="woodmart-timer" data-end-date="<?php echo esc_attr( $date ) ?>" data-timezone="<?php echo esc_attr( $timezone ) ?>"></div>
			</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
	add_shortcode( 'woodmart_countdown_timer', 'woodmart_shortcode_countdown_timer' );
}