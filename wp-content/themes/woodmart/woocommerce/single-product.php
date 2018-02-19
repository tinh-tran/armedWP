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
<div class="single-product-container">
    <div class="woodmart-woo-breadcrumbs">
        <div class="container">
            <?php woocommerce_breadcrumb(); ?>
    </div>
</div>

    <div class="anchor">
    <div class="container">
        <div class="anchor__wrapper">
            <ul class="anchor__inner">
                <li class="anchor__item"><a class="anchor__item-link" href="#">Вернуться в раздел</a></li>
                <li class="anchor__item"><a class="anchor__item-link" href="#product-view">Обзор товара</a></li>
                <li class="anchor__item"><a class="anchor__item-link" href="#video">Видео</a></li>
                <li class="anchor__item"><a class="anchor__item-link" href="#detail">Характеристики</a></li>
                <li class="anchor__item"><a class="anchor__item-link" href="#complect">Состав комплекта</a></li>
                <li class="anchor__item"><a class="anchor__item-link" href="#description_product">Описание товара</a></li>
                <li class="anchor__item"><a class="anchor__item-link" href="#testimonial">Отзывы</a></li>
            </ul>
        </div>
    </div>
</div>

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
    <div class="single-product_fixed col-sm-4">
        <div class="single-product_fixed-wrapper">
            <h4 itemprop="name" class="product_title entry-title"><?php if( $is_quick_view ): ?><a href="<?php the_permalink(); ?>"><?php endif; ?><?php the_title(); ?><?php if( $is_quick_view ): ?></a><?php endif; ?></h4>

            <div class="images widget_inner">

                <div class="woocommerce-product-gallery__wrapper">
                    <?php
                    $attributes = array(
                        'title' => esc_attr( get_the_title( get_post_thumbnail_id() ) )
                    );

                    if ( has_post_thumbnail() ) {

                        echo '<figure class="woocommerce-product-gallery__image">' . get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), $attributes ) . '</figure>';


                        if ( $attachment_count > 0 ) {
                            foreach ( $attachment_ids as $attachment_id ) {
                                echo '<figure class="woocommerce-product-gallery__image">' . wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) ) . '</figure>';
                            }
                        }

                    } else {

                        echo '<figure class="woocommerce-product-gallery__image--placeholder">' . apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woodmart' ) ), $post->ID ) . '</figure>';

                    }

                    ?>
                </div>

                <?php

                if ( $attachment_count > 0 ) {
                    woodmart_add_inline_script('woodmart-theme', '
                jQuery(".product-quick-view .woocommerce-product-gallery__wrapper").addClass("owl-carousel").owlCarousel({
                    rtl: jQuery("body").hasClass("rtl"),
                    items: 1, 
                    dots:false,
                    nav: true,
                    navText: false
                });
            ', 'after');
                }

                ?>

                <div class="widget-icon">
                    <div class="widget__add-to-wishlist">
                        <?php echo do_shortcode("[yith_wcwl_add_to_wishlist]"); ?>
                    </div>

                    <div class="widget__compare">
                        <?php echo do_shortcode("[yith_compare_button]"); ?>
                    </div>

                    <div class="widget__oneclick">
                        <?php echo do_shortcode("[viewBuyButton]"); ?>
                    </div>
                </div>
            </div>

            <!-- Price -->
            <div class="widget_price">
                <?php
                if ( !function_exists( 'woocommerce_template_single_price' ) ) {
                    require_once '/includes/wc-template-functions.php';
                }
                // NOTICE! Understand what this does before running.
                $result = woocommerce_template_single_price();
            ?>
            </div>

            <!-- Add to cart -->
            <div class="widget_addtocart">
                <?php
                if ( !function_exists( 'woocommerce_template_single_add_to_cart' ) ) {
                    require_once '/includes/wc-template-functions.php';
                }
                // NOTICE! Understand what this does before running.
                $result = woocommerce_template_single_add_to_cart();
            ?>
            </div>

            <!-- Sharing button -->
            <div class="widget_sharing">
                <?php
                if ( !function_exists( 'woodmart_product_share_buttons' ) ) {
                    require_once '/inc/woocommerce.php';
                }

                // NOTICE! Understand what this does before running.
                $result = woodmart_product_share_buttons();
            ?>
            </div>

        </div>
    </div>
</div>

    <div class="clearfix"></div>
</div>
<div class="container-fluid related-product">
	<div class="container related-and-upsells"><?php
			/**
			 * woodmart_woocommerce_after_sidebar hook
			 *
			 * @hooked woocommerce_upsell_display - 10
			 * @hooked woocommerce_output_related_products - 20
			 */
			do_action( 'woodmart_woocommerce_after_sidebar' );
		 ?></div>
</div>

<?php get_footer( 'shop' ); ?>