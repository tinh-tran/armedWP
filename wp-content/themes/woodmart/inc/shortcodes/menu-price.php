<?php
/**
* ------------------------------------------------------------------------------------------------
* Menu price element
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_shortcode_menu_price' )) {
	function woodmart_shortcode_menu_price($atts, $content) {
		if( ! function_exists( 'wpb_getImageBySize' ) ) return;
		$click = $output = $class = '';
		extract(shortcode_atts( array(
			'img_id' => '',
			'img_size' => 'full',
			'title' => '',
			'description' => '',
			'price' => '',
			'link' => '',
			'el_class' => ''
		), $atts ));


		if( $link != '') {
			$class .= ' cursor-pointer';
		}

		$class .= ' ' . $el_class;

		$attributes = woodmart_vc_get_link_attr( $link );

		if( $attributes['target'] == ' _blank' ) {
        	$onclick = 'onclick="window.open(\''. esc_url( $attributes['url'] ).'\',\'_blank\')"';
        } else {
        	$onclick = 'onclick="window.location.href=\''. esc_url( $attributes['url'] ).'\'"';
        }

		ob_start(); ?>
			<div class="woodmart-menu-price<?php echo esc_attr( $class ); ?>" <?php if( ! empty( $link ) ) echo ( $onclick ); ?> >
				<?php if ($img_id): ?>
					<div class="menu-price-image">
						<?php
							$img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'thumb_size' => $img_size, 'class' => '' ) );
							echo wp_kses( $img['thumbnail'], array( 'img' => array('class' => true,'width' => true,'height' => true,'src' => true,'alt' => true) ) );
						?>
					</div>
				<?php endif ?>
				<div class="menu-price-description-wrapp">
					<div class="menu-price-heading">
						<?php if ( ! empty( $title ) ): ?>
							<h3 class="menu-price-title"><span><?php echo ($title); ?></span></h3>
						<?php endif ?>
						<div class="menu-price-price price"><?php echo ($price); ?></div>
					</div>
					<?php if ( $description ): ?>
						<div class="menu-price-details"><?php echo ($description); ?></div>
					<?php endif ?>
				</div>
			</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
	add_shortcode( 'woodmart_menu_price', 'woodmart_shortcode_menu_price' );
}