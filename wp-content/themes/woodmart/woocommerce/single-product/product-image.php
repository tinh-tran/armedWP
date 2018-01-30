<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
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
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post, $product, $woocommerce_loop;

$is_quick_view = (isset($woocommerce_loop['view']) && $woocommerce_loop['view'] == 'quick-view');

$attachment_ids = $product->get_gallery_image_ids();

$thums_position = woodmart_get_opt('thums_position');

$product_design = woodmart_product_design();

$image_action = woodmart_get_opt( 'image_action' );

$thumb_image_size = 'shop_single';

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$thumbnail_size    = apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' );
$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, $thumbnail_size );
$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . $placeholder,
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );
if ( $product_design == 'sticky' ) $attachment_ids = false;

// if( $thums_position == 'bottom_column' ) {
// 	$thumb_image_size = 'shop_single';
// } else if( $thums_position == 'bottom_grid' ) {
// 	$thumb_image_size = 'shop_single';
// } else if( $thums_position == 'bottom_combined' ) {
// 	$thumb_image_size = 'shop_single';
// }

?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?> images row thumbs-position-<?php echo esc_attr( $thums_position ); ?> image-action-<?php echo esc_attr( $image_action ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<div class="<?php if ( $attachment_ids && $thums_position == 'left' && ! $is_quick_view ): ?>col-md-9 col-md-push-3<?php else: ?>col-sm-12<?php endif ?>">

		<figure class="woocommerce-product-gallery__wrapper <?php if( woodmart_is_main_product_images_carousel() ) echo woodmart_owl_items_per_slide( 1 ) . ' owl-carousel'; ?>">
			<?php
				$attributes = array(
					'title'                   => get_post_field( 'post_title', $post_thumbnail_id ),
					'data-caption'            => get_post_field( 'post_excerpt', $post_thumbnail_id ),
					'data-src'                => $full_size_image[0],
					'data-large_image'        => $full_size_image[0],
					'data-large_image_width'  => $full_size_image[1],
					'data-large_image_height' => $full_size_image[2],
				);


				if ( has_post_thumbnail() ) {
					$html  = '<div class="product-image-wrap"><figure data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image"><a href="' . esc_url( $full_size_image[0] ) . '">';
					$html .= get_the_post_thumbnail( $post->ID, $thumb_image_size, $attributes );
					$html .= '</a></figure></div>';
				} else {
					$html  = '<div class="product-image-wrap"><figure data-thumb="' . esc_url( wc_placeholder_img_src() ) . '" class="woocommerce-product-gallery__image--placeholder"><a href="' . esc_url( wc_placeholder_img_src() ) . '">';

					$html .= sprintf( '<img src="%s" alt="%s" data-src="%s" data-large_image="%s" data-large_image_width="700" data-large_image_height="800" class="attachment-shop_single size-shop_single wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ), esc_url( wc_placeholder_img_src() ), esc_url( wc_placeholder_img_src() ) );
					
					$html .= '</a></figure></div>';
				}

				echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );


			    do_action( 'woocommerce_product_thumbnails' );

			?>
		</figure>
		<?php do_action( 'woodmart_on_product_image' ); ?>
	</div>

	<?php if ( $attachment_ids && woodmart_is_product_thumb_enabled() ): ?>
		<div class="<?php if ( $thums_position == 'left' && ! $is_quick_view ): ?>col-md-3 col-md-pull-9<?php else: ?>col-sm-12<?php endif ?>">
			<div class="<?php if ( $thums_position == 'bottom' ) echo "owl-items-xl-3 owl-items-lg-3"; ?> thumbnails owl-items-md-3 owl-items-sm-3"></div>
		</div>
	<?php endif; ?>
</div>
