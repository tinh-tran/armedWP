<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$swatches_use_variation_images = woodmart_get_opt( 'swatches_use_variation_images' );

$grid_swatches_attribute = woodmart_grid_swatches_attribute();

$attribute_keys = array_keys( $attributes );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo htmlspecialchars( json_encode( $available_variations ) ) ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>
	
	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php esc_html_e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>
	<?php else : ?>
		<table class="variations" cellspacing="0">
			<tbody>
				<?php $loop = 0; foreach ( $attributes as $attribute_name => $options ) : $loop++; ?>
					<?php 
						$swatches = woodmart_has_swatches( $product->get_id(), $attribute_name, $options, $available_variations, $swatches_use_variation_images);
					 ?>
					<tr>
						<td class="label"><label for="<?php echo sanitize_title( $attribute_name ); ?>"><?php echo wc_attribute_label( $attribute_name ); ?></label></td>
						<td class="value <?php if ( ! empty( $swatches ) ): ?>with-swatches<?php endif; ?>">
							<?php if ( ! empty( $swatches ) ): ?>
								<div class="swatches-select" data-id="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>">
									<?php
										if ( is_array( $options ) ) {

											if ( isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ) {
												$selected_value = $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ];
											} elseif ( isset( $selected_attributes[ sanitize_title( $attribute_name ) ] ) ) {
												$selected_value = $selected_attributes[ sanitize_title( $attribute_name ) ];
											} else {
												$selected_value = '';
											}

											// Get terms if this is a taxonomy - ordered
											if ( taxonomy_exists( $attribute_name ) ) {

												$terms = wc_get_product_terms( $product->get_id(), $attribute_name, array( 'fields' => 'all' ) );
												
												$swatch_size = woodmart_wc_get_attribute_term( $attribute_name, 'swatch_size' );

												$_i = 0;
												$options_fliped = array_flip( $options );
												foreach ( $terms as $term ) {
													if ( ! in_array( $term->slug, $options ) ) {
														continue;
													}
													$key = $options_fliped[$term->slug];

													$style = '';
													$class = 'woodmart-swatch ';
													if( ! empty( $swatches[$key]['color'] )) {
														$class .= 'colored-swatch woodmart-tooltip';
														$style = 'background-color:' .  $swatches[$key]['color'];
													} else if( ! empty( $swatches[$key]['image'] )) {
														$class .= 'image-swatch woodmart-tooltip';
														$style = 'background-image: url(' . $swatches[$key]['image'] . ')';
													} else if( ! empty( $swatches[$key]['not_dropdown'] ) ) {
														$class .= ' text-only';
													}

													if( $swatches_use_variation_images && $grid_swatches_attribute == $attribute_name && isset( $swatches[$key]['image_src'] ) ) {
														$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $swatches[$key]['variation_id'] ), 'shop_thumbnail');
														if ( !empty( $thumb ) ) {
															$style = 'background-image: url(' . $thumb[0] . ')';
															$class .= ' variation-image-used image-swatch';
														}
													}

													$class .= ' swatch-size-' . $swatch_size;

													echo '<div class="' . esc_attr( $class ) . '" data-value="' . esc_attr( $term->slug ) . '" ' . selected( sanitize_title( $selected_value ), sanitize_title( $term->slug ), false ) . ' style="' . esc_attr( $style ) .'">' . apply_filters( 'woocommerce_variation_option_name', $term->name ) . '</div>';

													$_i++;
												}

											} else {

												foreach ( $options as $option ) {
													echo '<div data-value="' . esc_attr( sanitize_title( $option ) ) . '" ' . selected( sanitize_title( $selected_value ), sanitize_title( $option ), false ) . '>' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option ) ) . '</div>';
												}

											}
										}
									?>

								</div>

							<?php endif; ?>

							<?php
								$selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( stripslashes( urldecode( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ) ) : $product->get_variation_default_attribute( $attribute_name );
								wc_dropdown_variation_attribute_options( array( 'options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected ) );
								echo end( $attribute_keys ) === $attribute_name ? apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) : '';
							?>

						</td>
					</tr>
		        <?php endforeach;?>
			</tbody>
		</table>

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<div class="single_variation_wrap">
			<?php
				/**
				 * woocommerce_before_single_variation Hook
				 */
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * woocommerce_single_variation hook. Used to output the cart button and placeholder for variation data.
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 */
				do_action( 'woocommerce_single_variation' );

				/**
				 * woocommerce_after_single_variation Hook
				 */
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>

<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
