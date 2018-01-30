<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
	global $product, $woocommerce_loop;
	
	// Store column count for displaying the grid
	if ( empty( $woocommerce_loop['columns'] ) )
		$woocommerce_loop['columns'] = ( woodmart_get_opt( 'per_row_columns_selector' ) ) ? apply_filters( 'loop_shop_columns', woodmart_get_products_columns_per_row() ) : woodmart_get_opt( 'products_columns' );

	$class = '';
	if( woodmart_get_opt( 'products_masonry' ) || ! empty( $woocommerce_loop['masonry'] ) ) {
		$class = 'grid-masonry';
	}

	$spacing = woodmart_get_opt( 'products_spacing' );
	$pagination = woodmart_get_opt( 'shop_pagination' );
	$current_view = woodmart_get_shop_view();
	
	if ( $current_view == 'list' ) {
			$class .= ' elements-list';
	}else{
		$class .= ' woodmart-spacing-' . $spacing;
		$class .= ' products-spacing-' . $spacing;
	}
	
	$class .= ' pagination-' . $pagination;
	
	// fix for price filter ajax
	$min_price = isset( $_GET['min_price'] ) ? esc_attr( $_GET['min_price'] ) : '';
	$max_price = isset( $_GET['max_price'] ) ? esc_attr( $_GET['max_price'] ) : '';

?>

<div class="products elements-grid woodmart-products-holder <?php echo esc_attr( $class ); ?> row grid-columns-<?php echo esc_attr( $woocommerce_loop['columns'] ); ?>" data-source="main_loop" data-min_price="<?php echo esc_attr( $min_price ); ?>" data-max_price="<?php echo esc_attr( $max_price ); ?>">
	