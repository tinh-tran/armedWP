<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
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
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( class_exists( 'YITH_WCWL' ) ) $wishlist_page_id = yith_wcwl_object_id( get_option( 'yith_wcwl_wishlist_page_id' ) );

do_action( 'woocommerce_before_account_navigation' );
?>
<div class="lk">
    <menu class="asside_left">
            <li class="asside_left__item"><a class="asside_left__link" href="/my-account/"><span class="asside_left__icon asside_left__icon_index"></span>Главная</a></li>
            <li class="asside_left__item"><a class="asside_left__link" href="/my-account/orders/"><span class="asside_left__icon asside_left__icon_orders"></span>Заказы</a></li>
            <li class="asside_left__item"><a class="asside_left__link" href="lk_document.html"><span class="asside_left__icon asside_left__icon_document"></span>Документы</a></li>
            <li class="asside_left__item"><a class="asside_left__link" href="lk_service.html"><span class="asside_left__icon asside_left__icon_service"></span>Cервис</a></li>
            <li class="asside_left__item"><a class="asside_left__link" href="/my-account/edit-account/"><span class="asside_left__icon asside_left__icon_profile"></span>Профиль</a></li>
            <li class="asside_left__item"><a class="asside_left__link" href="lk_edit.html"><span class="asside_left__icon asside_left__icon_company"></span>Профиль компаниии</a></li>
            <li class="asside_left__item"><a class="asside_left__link" href="/my-account/edit-account/"><span class="asside_left__icon asside_left__icon_settings"></span>Настройки</a></li>
          </menu>

	<ul class="hidden">
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
			</li>
		<?php endforeach; ?>
        <?php if ( class_exists( 'YITH_WCWL' ) && woodmart_get_opt( 'my_account_wishlist' ) ): ?>
            <li class="wishlist-account-element <?php if( is_page( $wishlist_page_id ) ) echo 'is-active'; ?>">
                <a href="<?php echo YITH_WCWL()->get_wishlist_url(); ?>"><?php echo get_the_title( $wishlist_page_id ); ?></a>
            </li>
        <?php endif; ?>
		<?php if ( class_exists( 'WeDevs_Dokan' ) && apply_filters( 'woodmart_dokan_link', true ) ): ?>
			<li class="dokan-account-element">
				<a href="<?php echo dokan_get_navigation_url(); ?>"><?php echo esc_html__( 'Vendor dashboard', 'woodmart' ); ?></a>
			</li>
		<?php endif; ?>
        <li class="woocommerce-MyAccount-navigation-link woocommerce-MyAccount-navigation-link--customer-logout">
          <a href="<?php echo esc_url( wc_get_account_endpoint_url( 'customer-logout' ) ); ?>"><?php echo esc_html__( 'Logout', 'woocommerce' ); ?></a>
        </li>
	</ul>


<?php do_action( 'woocommerce_after_account_navigation' ); ?>
