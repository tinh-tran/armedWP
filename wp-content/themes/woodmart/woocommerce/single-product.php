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
                <li class="anchor__item"><a class="anchor__item-link" href="/shop">Вернуться в раздел</a></li>
                <li class="anchor__item"><a class="anchor__item-link" href="#">Обзор товара</a></li>
                <li class="anchor__item"><a class="anchor__item-link" href="#advantages">Преимущества</a></li>
                <li class="anchor__item"><a class="anchor__item-link" href="#video">Видео</a></li>
                <li class="anchor__item"><a class="anchor__item-link" href="#detail">Характеристики</a></li>
                <li class="anchor__item"><a class="anchor__item-link" href="#complect">Состав комплекта</a></li>
                <li class="anchor__item"><a class="anchor__item-link" href="#testimonial">Отзывы</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="single-product_wrapper">
    <div class="single-product_content col-sm-10">
        <div class="product_title">
            <h1 itemprop="name" class="entry-title">

                <?php the_field('full_title'); ?>
                <?php the_field('model'); ?>

                <!-- TODO Добавить разделение через запятую на пыхе -->
                <?php if ( have_rows('otl_osob') ): ?>
                    <?php while (have_rows ('otl_osob') ) : the_row(); ?>

                        <small><?php echo the_sub_field('osob'); ?></small>

                    <?php endwhile; ?>
                <?php endif; ?>
            </h1>
            <?php if ( woodmart_get_opt( 'products_nav' ) ): ?>
                <?php woodmart_products_nav(); ?>
            <?php endif ?>
        </div>

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
        <h4 itemprop="name" class="product_title entry-title">
            <?php the_field('short_title'); ?>
            <?php the_field('model'); ?>
        </h4>
        <?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

            <span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>

        <?php endif; ?>


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

        <!-- TODO просто верстка - Выбор города, стоимость доставки и пункты самовывоза -->
        <div class="quickview-inner_buy__delivery">
            <div class="quickview-item_buy__delivery-select">
                <div class="Select" id="CitySelect"><a class="Select-Head" id="SelectCity" href="#" data-value="None">
                        <sapn class="StatusOrder-Text">Выберите город</sapn></a>
                    <div class="Select-Catalog" style="display: none;"><a class="Select-Item" href="#" data-value="None">
                            <sapn class="StatusOrder-Text">Не выбрано</sapn></a><a class="Select-Item" href="#" data-value="Moskow">
                            <sapn class="StatusOrder-Text">Москва</sapn></a><a class="Select-Item" href="#" data-value="Balashiha">
                            <sapn class="StatusOrder-Text">Балашиха</sapn></a><a class="Select-Item" href="#" data-value="Zkorpat">
                            <sapn class="StatusOrder-Text">Зажорпатье</sapn></a></div>
                </div>
            </div>
            <div class="quickview-item_buy__delivery-popup">
                <div class="delivery-car"><span class="delivery-car_icon"></span>
                    <p class="delivery-car_text">Доставка:&nbsp;<span class="changed_delivery">800 ₽</span></p>
                </div>
                <div class="delivery-self"><span class="delivery-self_icon"></span>
                    <p class="delivery-self_text">Самовывоз:&nbsp;</p><a class="delivery-self_link modalLink" href="Pick">5 пунктов</a>
                </div>
            </div>
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