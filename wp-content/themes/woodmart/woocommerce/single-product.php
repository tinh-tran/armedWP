<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

get_header( 'shop' ); ?>
<div class="single-product_wrapper">
    <div class="single-product_content col-sm-10">
        <?php
            /**
             * woocommerce_before_main_content hook
             *
             * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
             * @hooked woocommerce_breadcrumb - 20
             */
            do_action( 'woocommerce_before_main_content' );
        ?>

            <?php while ( have_posts() ) : the_post(); ?>

                <?php wc_get_template_part( 'content', 'single-product' ); ?>

            <?php endwhile; // end of the loop. ?>

        <?php
            /**
             * woocommerce_after_main_content hook
             *
             * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
             */
            do_action( 'woocommerce_after_main_content' );
        ?>

        <div class="clearfix"></div>
    </div>
    <div class="single-product_fixed col-sm-2">
        <h4 itemprop="name" class="product_title entry-title"><?php if( $is_quick_view ): ?><a href="<?php the_permalink(); ?>"><?php endif; ?><?php the_title(); ?><?php if( $is_quick_view ): ?></a><?php endif; ?></h4>

        <?php
            do_action( 'woocommerce_product_thumbnails' );
        ?>

    </div>
</div>
	<div class="container related-and-upsells"><?php
			/**
			 * woodmart_woocommerce_after_sidebar hook
			 *
			 * @hooked woocommerce_upsell_display - 10
			 * @hooked woocommerce_output_related_products - 20
			 */
			do_action( 'woodmart_woocommerce_after_sidebar' );
		 ?></div>

<?php get_footer( 'shop' ); ?>