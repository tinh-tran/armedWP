<?php
/**
* ------------------------------------------------------------------------------------------------
* Pricing tables shortcodes
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_shortcode_pricing_tables' ) ) {
	function woodmart_shortcode_pricing_tables( $atts = array(), $content = null ) {
		$output = $class = $autoplay = '';
		extract(shortcode_atts( array(
			'el_class' => ''
		), $atts ));

		$class .= ' ' . $el_class;

		ob_start(); ?>
			<div class="pricing-tables-wrapper">
				<div class="pricing-tables<?php echo esc_attr( $class ); ?>" >
					<?php echo do_shortcode( $content ); ?>
				</div>
			</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}	
	add_shortcode( 'pricing_tables', 'woodmart_shortcode_pricing_tables' );
}

if( ! function_exists( 'woodmart_shortcode_pricing_plan' ) ) {
	function woodmart_shortcode_pricing_plan( $atts, $content ) {
		global $wpdb, $post;
		if( ! function_exists( 'wpb_getImageBySize' ) ) return;
		$output = $class = '';
		extract(shortcode_atts( array(
			'name' => '',
			'price_value' => '',
			'price_suffix' => 'per month',
			'currency' => '',
			'features_list' => '',
			'label' => '',
			'label_color' => 'red',
			'link' => '',
			'button_label' => '',
			'button_type' => 'custom',
			'id' => '',
			'style' => 'default',
			'best_option' => '',
			'el_class' => ''
		), $atts ));

		$attributes = woodmart_get_link_attributes( $link );

		$class .= ' ' . $el_class;

		if( ! empty( $label ) ) {
			$class .= ' price-with-label label-color-' . $label_color;
		}

		if( $best_option == 'yes' ) {
			$class .= ' price-highlighted';
		}

		$class .= ' price-style-' . $style;


		$features = explode(PHP_EOL, $features_list);

		$product = false;

		if( $button_type == 'product' && ! empty( $id ) ) {
			$product_data = get_post( $id );
			$product = is_object( $product_data ) && in_array( $product_data->post_type, array( 'product', 'product_variation' ) ) ? wc_setup_product_data( $product_data ) : false;
		}

		ob_start(); ?>

			<div class="woodmart-price-table<?php echo esc_attr( $class ); ?>" >
				<div class="woodmart-plan">
					<div class="woodmart-plan-name">
						<span class="woodmart-plan-title"><?php echo  $name; ?></span>
					</div>
				</div>
				<div class="woodmart-plan-inner">
					<?php if ( ! empty( $label ) ): ?>
						<div class="price-label"><span><?php echo  $label; ?></span></div>
					<?php endif ?>
					<div class="woodmart-plan-price">
						<?php if ( $currency ): ?>
							<span class="woodmart-price-currency">
								<?php echo  $currency; ?>
							</span>
						<?php endif ?>

						<?php if ( $price_value ): ?>
							<span class="woodmart-price-value">
								<?php echo  $price_value; ?>
							</span>
						<?php endif ?>

						<?php if ( $price_suffix ): ?>
							<span class="woodmart-price-suffix">
								<?php echo  $price_suffix; ?>
							</span>
						<?php endif ?>
					</div>
					<?php if ( !empty( $features[0] ) ): ?>
						<div class="woodmart-plan-features">
							<?php foreach ($features as $value): ?>
								<div class="woodmart-plan-feature">
									<?php echo  $value; ?>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif ?>
					<div class="woodmart-plan-footer">
						<?php if ( $button_type == 'product' && $product ): ?>
							<?php woocommerce_template_loop_add_to_cart(  ); ?>
						<?php else: ?>
							<?php if ( $button_label ): ?>
								<a <?php echo ( $attributes ); ?> class="button price-plan-btn"><?php echo  $button_label; ?></a>
							<?php endif ?>
						<?php endif ?>
					</div>
				</div>
			</div>

		<?php
		$output = ob_get_contents();
		ob_end_clean();

		if ( $button_type == 'product' ) {
			// Restore Product global in case this is shown inside a product post
			wc_setup_product_data( $post );
		}


		return $output;
	}
	add_shortcode( 'pricing_plan', 'woodmart_shortcode_pricing_plan' );
}