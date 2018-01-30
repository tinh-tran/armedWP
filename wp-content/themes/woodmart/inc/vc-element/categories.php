<?php
/**
* ------------------------------------------------------------------------------------------------
* Categories element map
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_vc_shortcode_categories' ) ) {
	function woodmart_vc_shortcode_categories() {
		$order_by_values = array(
			'',
			esc_html__( 'Date', 'woodmart' ) => 'date',
			esc_html__( 'ID', 'woodmart' ) => 'ID',
			esc_html__( 'Author', 'woodmart' ) => 'author',
			esc_html__( 'Title', 'woodmart' ) => 'title',
			esc_html__( 'Modified', 'woodmart' ) => 'modified',
			esc_html__( 'Comment count', 'woodmart' ) => 'comment_count',
			esc_html__( 'Menu order', 'woodmart' ) => 'menu_order',
			esc_html__( 'As IDs or slugs provided order', 'woodmart' ) => 'include',
		);

		$order_way_values = array(
			'',
			esc_html__( 'Descending', 'woodmart' ) => 'DESC',
			esc_html__( 'Ascending', 'woodmart' ) => 'ASC',
		);

		vc_map( array(
			'name' => esc_html__( 'Product categories', 'woodmart' ),
			'base' => 'woodmart_categories',
			'category' => esc_html__( 'Theme elements', 'woodmart' ),
			'description' => esc_html__( 'Product categories grid', 'woodmart' ),
        	'icon' => WOODMART_ASSETS . '/images/vc-icon/product-categories.svg',
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'woodmart' ),
					'param_name' => 'title',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Number', 'woodmart' ),
					'param_name' => 'number',
					'description' => esc_html__( 'The `number` field is used to display the number of categories.', 'woodmart' ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Order by', 'woodmart' ),
					'param_name' => 'orderby',
					'value' => $order_by_values,
					'save_always' => true,
					'description' => sprintf( wp_kses(  __( 'Select how to sort retrieved categories. More at %s.', 'woodmart' ), array(
	                        'a' => array( 
	                            'href' => array(), 
	                            'target' => array()
	                        )
                    	)), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Sort order', 'woodmart' ),
					'param_name' => 'order',
					'value' => $order_way_values,
					'save_always' => true,
					'description' => sprintf( wp_kses(  __( 'Designates the ascending or descending order. More at %s.', 'woodmart' ), array(
	                        'a' => array( 
	                            'href' => array(), 
	                            'target' => array()
	                        )
                    	)), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Layout', 'woodmart' ),
					'value' => 4,
					'param_name' => 'style',
					'save_always' => true,
					'description' => esc_html__( 'Try out our creative styles for categories block', 'woodmart' ),
					'value' => array(
						'Default' => 'default',
						'Masonry' => 'masonry',
						'Masonry (with first wide)' => 'masonry-first',
						'Carousel' => 'carousel',
					)
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Categories design', 'woodmart' ),
					'description' => esc_html__( 'Overrides option from Theme Settings -> Shop', 'woodmart' ),
					'param_name' => 'categories_design',
					'value' => array_merge( array( 'Inherit' => '' ), array_flip( woodmart_get_config( 'categories-designs' ) ) ),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Space between categories', 'woodmart' ),
					'param_name' => 'spacing',
					'value' => array(
						30,20,10,6,2,0
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Slides per view', 'woodmart' ),
					'param_name' => 'slides_per_view',
					'value' => array(
						1,2,3,4,5,6,7,8
					),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'carousel' ),
					),
					'description' => esc_html__( 'Set numbers of slides you want to display at the same time on slider\'s container for carousel mode.', 'woodmart' )
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Hide pagination control', 'woodmart' ),
					'param_name' => 'hide_pagination_control',
					'description' => esc_html__( 'If "YES" pagination control will be removed', 'woodmart' ),
					'value' => array( esc_html__( 'Yes, please', 'woodmart' ) => 'yes' ),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'carousel' ),
					),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Hide prev/next buttons', 'woodmart' ),
					'param_name' => 'hide_prev_next_buttons',
					'description' => esc_html__( 'If "YES" prev/next control will be removed', 'woodmart' ),
					'value' => array( esc_html__( 'Yes, please', 'woodmart' ) => 'yes' ),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'carousel' ),
					),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Slider loop', 'woodmart' ),
					'param_name' => 'wrap',
					'description' => esc_html__( 'Enables loop mode.', 'woodmart' ),
					'value' => array( esc_html__( 'Yes, please', 'woodmart' ) => 'yes' ),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'carousel' ),
					),
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Columns', 'woodmart' ),
					'value' => 4,
					'param_name' => 'columns',
					'save_always' => true,
					'description' => esc_html__( 'How much columns grid', 'woodmart' ),
					'value' => array(
						'1' => 1,
						'2' => 2,
						'3' => 3,
						'4' => 4,
						'6' => 6,
					),
					'dependency' => array(
						'element' => 'style',
						'value' => array( 'masonry', 'default' ),
					),
				),
				array(
					'type' => 'checkbox',
					'heading' => esc_html__( 'Hide empty', 'woodmart' ),
					'param_name' => 'hide_empty',
					'value' => array( esc_html__( 'Yes, please', 'woodmart' ) => 'yes' ),
					'std'         => 'yes',
				),
				array(
					'type' => 'autocomplete',
					'heading' => esc_html__( 'Categories', 'woodmart' ),
					'param_name' => 'ids',
					'settings' => array(
						'multiple' => true,
						'sortable' => true,
					),
					'save_always' => true,
					'description' => esc_html__( 'List of product categories', 'woodmart' ),
				)
			)
		) );
	}
	add_action( 'vc_before_init', 'woodmart_vc_shortcode_categories' );
}

//Filters For autocomplete param:
//For suggestion: vc_autocomplete_[shortcode_name]_[param_name]_callback
add_filter( 'vc_autocomplete_woodmart_categories_ids_callback', 'woodmart_productCategoryCategoryAutocompleteSuggester', 10, 1 ); // Get suggestion(find). Must return an array
add_filter( 'vc_autocomplete_woodmart_categories_ids_render', 'woodmart_productCategoryCategoryRenderByIdExact', 10, 1 );

if( ! function_exists( 'woodmart_productCategoryCategoryAutocompleteSuggester' ) ) {
	function woodmart_productCategoryCategoryAutocompleteSuggester( $query, $slug = false ) {
		global $wpdb;
		$cat_id = (int) $query;
		$query = trim( $query );
		$post_meta_infos = $wpdb->get_results(
			$wpdb->prepare( "SELECT a.term_id AS id, b.name as name, b.slug AS slug
						FROM {$wpdb->term_taxonomy} AS a
						INNER JOIN {$wpdb->terms} AS b ON b.term_id = a.term_id
						WHERE a.taxonomy = 'product_cat' AND (a.term_id = '%d' OR b.slug LIKE '%%%s%%' OR b.name LIKE '%%%s%%' )",
				$cat_id > 0 ? $cat_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

		$result = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data = array();
				$data['value'] = $slug ? $value['slug'] : $value['id'];
				$data['label'] = esc_html__( 'Id', 'woodmart' ) . ': ' .
				                 $value['id'] .
				                 ( ( strlen( $value['name'] ) > 0 ) ? ' - ' . esc_html__( 'Name', 'woodmart' ) . ': ' .
				                                                      $value['name'] : '' ) .
				                 ( ( strlen( $value['slug'] ) > 0 ) ? ' - ' . esc_html__( 'Slug', 'woodmart' ) . ': ' .
				                                                      $value['slug'] : '' );
				$result[] = $data;
			}
		}

		return $result;
	}
}
if( ! function_exists( 'woodmart_productCategoryCategoryRenderByIdExact' ) ) {
	function woodmart_productCategoryCategoryRenderByIdExact( $query ) {
		global $wpdb;
		$query = $query['value'];
		$cat_id = (int) $query;
		$term = get_term( $cat_id, 'product_cat' );

		return woodmart_productCategoryTermOutput( $term );
	}
}

if( ! function_exists( 'woodmart_productCategoryTermOutput' ) ) {
	function woodmart_productCategoryTermOutput( $term ) {
		$term_slug = $term->slug;
		$term_title = $term->name;
		$term_id = $term->term_id;

		$term_slug_display = '';
		if ( ! empty( $term_sku ) ) {
			$term_slug_display = ' - ' . esc_html__( 'Sku', 'woodmart' ) . ': ' . $term_slug;
		}

		$term_title_display = '';
		if ( ! empty( $product_title ) ) {
			$term_title_display = ' - ' . esc_html__( 'Title', 'woodmart' ) . ': ' . $term_title;
		}

		$term_id_display = esc_html__( 'Id', 'woodmart' ) . ': ' . $term_id;

		$data = array();
		$data['value'] = $term_id;
		$data['label'] = $term_id_display . $term_title_display . $term_slug_display;

		return ! empty( $data ) ? $data : false;
	}
}