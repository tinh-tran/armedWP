<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.2.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$position = woodmart_get_opt( 'cart_position');

$items_to_show = ( $position == 'side' ) ? 30 : 3;

?>
<?php do_action( 'woocommerce_before_mini_cart' ); ?>

<div class="shopping-cart-widget-body <?php if( $position == 'side' ) echo 'woodmart-scroll'; ?>">
	<div class=" <?php if( $position == 'side' ) echo 'woodmart-scroll-content'; ?>">
		<ul class="cart_list product_list_widget woocommerce-mini-cart <?php echo esc_attr( $args['list_class'] ); ?>">

			<?php if ( ! WC()->cart->is_empty() ) : ?>

				<?php
					do_action( 'woocommerce_before_mini_cart_contents' );

					$_i = 0;
					foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
						$_i++;
						if( $_i > $items_to_show ) break;
						
						$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
						$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

						if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
							$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
							$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
							$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
							?>
							<li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
								<a href="<?php echo esc_url( $product_permalink ); ?>" class="cart-item-link"><?php esc_html_e('Show', 'woocommerce'); ?></a>
								<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
									esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
									__( 'Remove this item', 'woocommerce' ),
									esc_attr( $product_id ),
									esc_attr( $cart_item_key ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
								?>
								<?php if ( ! $_product->is_visible() ) : ?>
									<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
								<?php else : ?>
									<a href="<?php echo esc_url( $product_permalink ); ?>" class="cart-item-image">
										<?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
									</a>
								<?php endif; ?>
								<div class="cart-info">
									<span class="product-title"><?php echo ( $product_name ); ?></span>
									<?php echo WC()->cart->get_item_data( $cart_item ); ?>
									<?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
								</div>

							</li>
							<?php
						}
					}

					do_action( 'woocommerce_mini_cart_contents' );

				?>

			<?php else : ?>

				<li class="woocommerce-mini-cart__empty-message empty"><?php esc_html_e( 'No products in the cart.', 'woocommerce' ); ?></li>
				<?php if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
					<p class="return-to-shop">
						<a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
							<?php esc_html_e( 'Return To Shop', 'woodmart' ) ?>
						</a>
					</p>
				<?php endif; ?>

			<?php endif; ?>

		</ul><!-- end product list -->
	</div>
</div>

<div class="shopping-cart-widget-footer">
	<?php if ( ! WC()->cart->is_empty() ) : ?>

		<p class="woocommerce-mini-cart__total total"><strong><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

		<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

		<p class="woocommerce-mini-cart__buttons buttons"><?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?></p>

	<?php endif; ?>

	<?php do_action( 'woocommerce_after_mini_cart' ); ?>
</div>
