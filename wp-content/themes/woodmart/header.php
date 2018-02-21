<?php
/**
 * The Header template for our theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/woodmart/css/main.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php if ( woodmart_needs_header() ): ?>
		<?php do_action( 'woodmart_after_body_open' ); ?>
		<?php 
			woodmart_header_block_mobile_nav(); 
			$cart_position = woodmart_get_opt('cart_position');
			if( $cart_position == 'side' ) {
				?>
					<div class="cart-widget-side">
						<div class="widget-heading">
							<h3 class="widget-title"><?php esc_html_e('Shopping cart', 'woodmart'); ?></h3>
							<a href="#" class="widget-close"><?php esc_html_e('close', 'woodmart'); ?></a>
						</div>
						<div class="widget woocommerce widget_shopping_cart"><div class="widget_shopping_cart_content"></div></div>
					</div>
				<?php
			}
			woodmart_full_screen_main_nav();
		?>
	<?php endif ?>
	
	<?php if ( woodmart_get_opt( 'header_banner' ) ): ?>
		<?php 
			$banner_link = woodmart_get_opt( 'header_banner_link' );
		?>
	    <div class="header-banner color-scheme-<?php echo esc_attr( woodmart_get_opt( 'header_banner_color' ) ); ?>">
			
	        <?php if ( woodmart_get_opt( 'header_close_btn' ) ): ?>
	            <a href="#" class="close-header-banner"></a>
	        <?php endif; ?>
			
			<?php if ( $banner_link ): ?>
	            <a href="<?php echo esc_url( $banner_link ) ?>" class="header-banner-link"></a>
	        <?php endif; ?>
			
	        <div class="container header-banner-container">
	            <?php echo do_shortcode( woodmart_get_opt( 'header_banner_shortcode' ) ); ?>
	        </div>
			
	    </div>
	<?php endif; ?>

	<div class="website-wrapper">

		<?php $header = apply_filters( 'woodmart_header_design', woodmart_get_opt( 'header' ) );?>

		<?php if ( woodmart_needs_header() ): ?>

			<?php get_template_part( 'top-bar' ); ?>
			
			<!-- HEADER -->
			<header <?php woodmart_get_header_classes( $header ); // location: inc/functions.php ?>>

				<?php woodmart_generate_header( $header ); // location: inc/template-tags.php ?>

			</header><!--END MAIN HEADER-->

			<div class="clear"></div>
			
			<?php woodmart_page_top_part(); ?>

		<?php endif ?>