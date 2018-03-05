<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce_loop;

$product = wc_get_product( $post );

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

$classes = array();
$classes[] = 'product-quick-view single-product-content';

$woocommerce_loop['view'] = 'quick-view';

?>
<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div id="product-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>

	<div class="row product-image-summary">
		<div class="col-md-4 col-sm-4 col-xs-12 product-images woocommerce-product-gallery">
			<?php
				woodmart_product_images_slider();
				woodmart_view_product_button();
			?>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12 summary entry-summary">
			<div class="summary-inner woodmart-scroll">
				<div class="woodmart-scroll-content">
                    <h3 class="product-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_field('short_title'); ?>
                            <?php the_field('model'); ?>
                        </a>
                    </h3>
                    <?php the_field('full_description'); ?>
				</div>
			</div>
		</div><!-- .summary -->
        <div class="col-md-4 col-sm-4 col-xs-12">


        </div>
	</div>


</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
