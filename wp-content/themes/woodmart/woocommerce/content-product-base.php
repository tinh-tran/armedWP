<?php
	global $product, $woocommerce_loop;

	$timer = woodmart_get_opt( 'shop_countdown' );
	// Sale countdown
	if ( ! empty( $woocommerce_loop['timer'] ) )
		$timer = true;
?>
<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
<div class="bg-product-grid-item hidden-widget">
    <div class="content-product-imagin">
        <div class="product-grid-item__title">
            <h3 class="product-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_field('short_title'); ?>
                    <?php the_field('model'); ?>
                </a>
            </h3>
        </div>

    </div>
        <div class="product-grid-item__title">
            <h3 class="product-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_field('short_title'); ?>
                    <?php the_field('model'); ?>
                </a>
            </h3>
        </div>

    <div class="product-element-top">
        <a href="<?php echo esc_url( get_permalink() ); ?>" class="product-image-link">
            <?php
                /**
                 * woocommerce_before_shop_loop_item_title hook
                 *
                 * @hooked woocommerce_show_product_loop_sale_flash - 10
                 * @hooked woodmart_template_loop_product_thumbnail - 10
                 */
                do_action( 'woocommerce_before_shop_loop_item_title' );
            ?>
        </a>
        <?php woodmart_hover_image(); ?>
        <div class="wrapp-swatches"></div>

        <?php woodmart_quick_shop_wrapper(); ?>


        <div class="widget-icon widget-icon-grid">
            <div class="widget__add-to-wishlist">
                <?php echo do_shortcode("[yith_wcwl_add_to_wishlist]"); ?>
            </div>

            <div class="widget__compare">
                <?php woodmart_compare_btn(); ?>
            </div>

            <div class="widget__quick-view">
                <?php woodmart_quick_view_btn( get_the_ID() ); ?>
            </div>

            <div class="widget__oneclick">
                <?php echo do_shortcode("[viewBuyButton]"); ?>
            </div>
        </div>

    </div>

    <div class="product-information">
        <?php
            woodmart_product_categories();
            woodmart_product_brands_links();
        ?>
        <div class="product-price-rating">
            <?php
            /**
             * woocommerce_after_shop_loop_item_title hook
             *
             * @hooked woocommerce_template_loop_rating - 5
             * @hooked woocommerce_template_loop_price - 10
             */
            do_action( 'woocommerce_after_shop_loop_item_title');
            ?>
        </div>

        <div class="fade-in-block">

            <div class="woodmart-buttons">

                <div class="woodmart-add-btn"><?php do_action( 'woocommerce_after_shop_loop_item' ); ?></div>


            </div>
            <?php if ( $timer ): ?>
                <?php woodmart_product_sale_countdown(); ?>
            <?php endif ?>
        </div>
    </div>
</div>