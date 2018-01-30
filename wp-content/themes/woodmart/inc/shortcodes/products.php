<?php
/**
* ------------------------------------------------------------------------------------------------
* Shortcode function to display posts as a slider or as a grid
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_shortcode_products' ) ) {
	
	function woodmart_shortcode_products($atts, $query = false) {
		global $woocommerce_loop, $woodmart_loop;
		
	    $parsed_atts = shortcode_atts( woodmart_get_default_product_shortcode_atts(), $atts );

		extract( $parsed_atts );

		$woodmart_loop['img_size'] = $img_size;

		$woocommerce_loop['masonry'] = $products_masonry;
		$woocommerce_loop['different_sizes'] = $products_different_sizes;

	    $is_ajax = (defined( 'DOING_AJAX' ) && DOING_AJAX && $force_not_ajax != 'yes' );

	    $parsed_atts['force_not_ajax'] = 'no'; // :)

	    $encoded_atts = json_encode( $parsed_atts );

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		if( $ajax_page > 1 ) $paged = $ajax_page;

		$ordering_args = WC()->query->get_catalog_ordering_args( $orderby, $order );

		$meta_query   = WC()->query->get_meta_query();

		$tax_query   = WC()->query->get_tax_query();
		
		if ( $post_type == 'new' ){
			$meta_query[] = array(
				'key'     => '_woodmart_new_label',
				'value'   => 'on',
				'operator' => 'IN',
			);
		}

		if( $orderby == 'post__in' ) {
			$ordering_args['orderby'] = $orderby;
		}

	    $args = array(
	    	'post_type' 			=> 'product',
	    	'post_status' 			=> 'publish',
			'ignore_sticky_posts' 	=> 1,
	    	'paged' 			  	=> $paged,
			'orderby'             	=> $ordering_args['orderby'],
			'order'               	=> $ordering_args['order'],
	    	'posts_per_page' 		=> $items_per_page,
	    	'meta_query' 			=> $meta_query,
	    	'tax_query'             => $tax_query,
		);

		if( ! empty( $ordering_args['meta_key'] ) ) {
			$args['meta_key'] = $ordering_args['meta_key'];
		}


		if( $post_type == 'ids' && $include != '' ) {
			$args['post__in'] = explode(',', $include);
		}

		if( ! empty( $exclude ) ) {
			$args['post__not_in'] = explode(',', $exclude);
		}

		if( ! empty( $taxonomies ) ) {
			$taxonomy_names = get_object_taxonomies( 'product' );
			$terms = get_terms( $taxonomy_names, array(
				'orderby' => 'name',
				'include' => $taxonomies
			));

			if( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
				if( $post_type == 'featured' ) $args['tax_query'] = array( 'relation' => 'AND' );

				if( count( $terms ) > 1 ) $args['tax_query']['categories'] = array( 'relation' => 'OR' );

				foreach ( $terms as $term ) {
					$args['tax_query']['categories'][] = array(
						'taxonomy' => $term->taxonomy,
					    'field' => 'slug',
					    'terms' => array( $term->slug ),
					    'include_children' => true,
					    'operator' => 'IN'
					);
				}
			}
		}

		if( $post_type == 'featured' ) {
			$args['tax_query'][] = array(
				'taxonomy' => 'product_visibility',
				'field'    => 'name',
				'terms'    => 'featured',
				'operator' => 'IN',
			);
		}

		if( ! empty( $order ) ) {
			$args['order'] = $order;
		}

		if( ! empty( $offset ) ) {
			$args['offset'] = $offset;
		}


		if( $post_type == 'sale' ) {
			$args['post__in'] = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
		}

		if( $post_type == 'bestselling' ) {
			$args['orderby'] = 'meta_value_num';
			$args['meta_key'] = 'total_sales';
		}

		$woocommerce_loop['timer']   = $sale_countdown;
		$woocommerce_loop['product_hover']   = $product_hover;
		$woocommerce_loop['products_view']  = $layout;

		$products = new WP_Query( $args );

		WC()->query->remove_ordering_args();

		$woocommerce_loop['timer']   = $sale_countdown;
		$woocommerce_loop['product_hover']   = $product_hover;

		// Simple products carousel
		if( $layout == 'carousel' ) return woodmart_generate_posts_slider( $parsed_atts, $products );

		$woocommerce_loop['columns'] = $columns;

		if ( $pagination != 'arrows' ) {
			$woocommerce_loop['loop'] = $items_per_page * ( $paged - 1 );
		}
		
		if ( $layout == 'list' ) {
			$class .= ' elements-list';
		}else{
			$class .= ' woodmart-spacing-' . $spacing;
			$class .= ' products-spacing-' . $spacing;
			$class .= ' grid-columns-' . $columns;
		}
		
		$class .= ' pagination-' . $pagination;
		if( $woocommerce_loop['masonry'] == 'enable') {
			$class .= ' grid-masonry';
		}

		ob_start();

		if( ! $is_ajax) echo '<div class="woodmart-products-element">';

	    if( ! $is_ajax && $pagination == 'arrows' ) echo '<div class="woodmart-products-loader"></div>';

	    if( ! $is_ajax) echo '<div class="products elements-grid row woodmart-products-holder ' . esc_attr( $class) . '" data-paged="1" data-atts="' . esc_attr( $encoded_atts ) . '" data-source="shortcode">';

		if ( $products->have_posts() ) :
			while ( $products->have_posts() ) :
				$products->the_post();
				wc_get_template_part( 'content', 'product' );
			endwhile;
		endif;

    	if(!$is_ajax) echo '</div>';

		woocommerce_reset_loop();
		wp_reset_postdata();
		woodmart_reset_loop();

		if ( $products->max_num_pages > 1 && !$is_ajax ) {
			?>
		    	<div class="products-footer">
		    		<?php if ($pagination == 'more-btn' || $pagination == 'infinit'): ?>
		    			<a href="#" class="btn woodmart-load-more woodmart-products-load-more load-on-<?php echo ($pagination == 'more-btn') ? 'click' : 'scroll'; ?>"><span class="load-more-label"><?php esc_html_e('Load more products', 'woodmart'); ?></span><span class="load-more-loading"><?php esc_html_e('Loading...', 'woodmart'); ?></span></a>
		    		<?php elseif ($pagination == 'arrows'): ?>
		    			<div class="wrap-loading-arrow">
			    			<div class="woodmart-products-load-prev disabled"><?php esc_html_e('Load previous products', 'woodmart'); ?></div>
			    			<div class="woodmart-products-load-next"><?php esc_html_e('Load next products', 'woodmart'); ?></div>
		    			</div>
		    		<?php endif ?>
		    	</div>
		    <?php
		}

    	if(!$is_ajax) echo '</div>';

		$output = ob_get_clean();

	    if( $is_ajax ) {
	    	$output =  array(
	    		'items' => $output,
	    		'status' => ( $products->max_num_pages > $paged ) ? 'have-posts' : 'no-more-posts'
	    	);
	    }

	    return $output;

	}
	add_shortcode( 'woodmart_products', 'woodmart_shortcode_products' );
}

if( ! function_exists( 'woodmart_get_shortcode_products_ajax' ) ) {
	add_action( 'wp_ajax_woodmart_get_products_shortcode', 'woodmart_get_shortcode_products_ajax' );
	add_action( 'wp_ajax_nopriv_woodmart_get_products_shortcode', 'woodmart_get_shortcode_products_ajax' );
	function woodmart_get_shortcode_products_ajax() {
		if( ! empty( $_POST['atts'] ) ) {
			$atts = $_POST['atts'];
			$paged = (empty($_POST['paged'])) ? 2 : (int) $_POST['paged'];
			$atts['ajax_page'] = $paged;

			$data = woodmart_shortcode_products($atts);

			echo json_encode( $data );

			die();
		}
	}
}

if( ! function_exists( 'woodmart_get_default_product_shortcode_atts' ) ) {
	function woodmart_get_default_product_shortcode_atts() {
		return array(
	        'post_type'  => 'product',
	        'layout' => 'grid',
	        'include'  => '',
	        'custom_query'  => '',
	        'taxonomies'  => '',
	        'pagination'  => '',
	        'items_per_page'  => 12,
			'product_hover'  => woodmart_get_opt( 'products_hover' ),
			'spacing'  => woodmart_get_opt( 'products_spacing' ),
	        'columns'  => 4,
	        'sale_countdown'  => 0,
	        'offset'  => '',
	        'orderby'  => '',
	        'order'  => '',
	        'meta_key'  => '',
	        'exclude'  => '',
	        'class'  => '',
	        'ajax_page' => '',
			'speed' => '5000',
			'slides_per_view' => '1',
			'wrap' => '',
			'autoplay' => 'no',
			'hide_pagination_control' => '',
			'hide_prev_next_buttons' => '',
			'scroll_per_page' => 'yes',
			'carousel_js_inline' => 'no',
	        'img_size' => 'shop_catalog',
	        'force_not_ajax' => 'no',
	        'products_masonry' => woodmart_get_opt( 'products_masonry' ),
			'products_different_sizes' => woodmart_get_opt( 'products_different_sizes' ),
	    );
	}
}