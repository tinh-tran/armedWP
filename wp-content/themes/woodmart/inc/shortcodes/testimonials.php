<?php
/**
* ------------------------------------------------------------------------------------------------
* Testimonials shortcodes
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_shortcode_testimonials' ) ) {
	function woodmart_shortcode_testimonials($atts = array(), $content = null) {
		$output = $class = $autoplay = '';

		$parsed_atts = shortcode_atts( array_merge( woodmart_get_owl_atts(), array(
			'layout' => 'slider', // grid slider
			'style' => 'standard', // standard boxed
			'align' => 'center', // left center
			'columns' => 3,
			'name' => '',
			'title' => '',
			'el_class' => ''
		) ), $atts );

		extract( $parsed_atts );

		$class .= ' testimonials-' . $layout;
		$class .= ' testimon-style-' . $style;
		$class .= ' testimon-columns-' . $columns;
		$class .= ' testimon-align-' . $align;

		if( $layout == 'slider' ) $class .= ' owl-carousel ' . woodmart_owl_items_per_slide( $slides_per_view );

		$class .= ' ' . $el_class;

		$carousel_id = 'carousel-' . rand( 1000, 10000);

		ob_start(); ?>
			<div id="<?php echo esc_attr( $carousel_id ); ?>" class="testimonials-wrapper">
				<?php if ( $title != '' ): ?>
					<h2 class="title slider-title"><?php echo esc_html( $title ); ?></h2>
				<?php endif ?>
				<div class="testimonials<?php echo esc_attr( $class ); ?>" >
					<?php echo do_shortcode( $content ); ?>
				</div>
			</div>

			<?php
				if( $layout == 'slider' ) {
					$parsed_atts['carousel_id'] = $carousel_id;
					woodmart_owl_carousel_init( $parsed_atts );
				}

			 ?>

		<?php
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}	
	add_shortcode( 'testimonials', 'woodmart_shortcode_testimonials' );
}

if( ! function_exists( 'woodmart_shortcode_testimonial' ) ) {
	function woodmart_shortcode_testimonial($atts, $content) {
		if( ! function_exists( 'wpb_getImageBySize' ) ) return;
		$output = $class = '';
		extract(shortcode_atts( array(
			'image' => '',
			'img_size' => '100x100',
			'name' => '',
			'title' => '',
			'el_class' => ''
		), $atts ));

		$img_id = preg_replace( '/[^\d]/', '', $image );

		$img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'thumb_size' => $img_size, 'class' => 'testimonial-avatar-image' ) );

		$class .= ' ' . $el_class;

		ob_start(); ?>

			<div class="testimonial<?php echo esc_attr( $class ); ?>" >
				<div class="testimonial-inner">
					<?php if ( $img['thumbnail'] != ''): ?>
						<div class="testimonial-avatar">
							<?php echo wp_kses( $img['thumbnail'], array( 'img' => array('class' => true,'width' => true,'height' => true,'src' => true,'alt' => true) ) );?>
						</div>
					<?php endif ?>

					<div class="testimonial-content">
						<?php echo do_shortcode( $content ); ?>
						<footer>
							<?php echo esc_html( $name ); ?>
							<?php if ( $title ): ?>
								<span><?php echo esc_html( $title ); ?></span>
							<?php endif ?>
						</footer>
					</div>					
				</div>
			</div>

		<?php
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
	add_shortcode( 'testimonial', 'woodmart_shortcode_testimonial' );
}