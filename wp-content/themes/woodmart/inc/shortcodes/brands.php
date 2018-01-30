<?php
/**
* ------------------------------------------------------------------------------------------------
* Brands carousel/grid/list shortcode
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_shortcode_brands' ) ) {
	function woodmart_shortcode_brands( $atts, $content = '' ) {
		$output = '';
		$parsed_atts = shortcode_atts( array_merge( woodmart_get_owl_atts(), array(
			'title' => '',
			'username' => 'flickr',
			'number' => 20,
			'hover' => 'default',
			'target' => '_self',
			'link' => '',
			'ids' => '',
			'style' => 'carousel',
			'brand_style' => 'default',
			'per_row' => 3,
			'columns' => 3,
			'orderby' => 'name',
			'order' => 'ASC',
		) ), $atts );

		extract( $parsed_atts );

		$carousel_id = 'brands_' . rand(1000,9999);

		$attribute = woodmart_get_opt( 'brands_attribute' );

		if( empty( $attribute ) || ! taxonomy_exists( $attribute ) ) return '<p>' . esc_html_e('You must select your brand attribute in Theme Settings -> Shop -> Brands', 'woodmart' ) . '</p>';

		ob_start();

		$class = 'brands-widget slider-' . $carousel_id;

		if( $style != '' ) {
			$class .= ' brands-' . $style;
		}

		$class .= ' brands-hover-' . $hover;
		$class .= ' brands-columns-' . $columns;
		$class .= ' brands-style-' . $brand_style;

		echo '<div id="'. esc_attr( $carousel_id ) . '" class="' . esc_attr( $class ) . '">';

		if(!empty($title)) { echo '<h3 class="title">' . $title . '</h3>'; };

		$args = array(
			'taxonomy' => $attribute,
			'hide_empty' => false,
			'orderby' => $orderby,
			'order' => $order,
			'number' => $number
		);

		if ( $orderby == 'random' ) {
			$args['orderby'] = 'id';
			$brand_count = wp_count_terms( $attribute, array(
				'hide_empty' => 0
			) );

			$offset = rand( 0, $brand_count - $number );
			if ( $offset <= 0 ) {
				$offset = '';
			}
			$args['offset'] = $offset;
		}


		if( ! empty( $ids ) ) {
			$args['include'] = explode(',', $ids);
		}

		$brands = get_terms( $args );

		if ( $orderby == 'random' ) shuffle( $brands );

		$link = get_post_type_archive_link( 'product' );
		
		echo '<div class="brands-items-wrapper ' . ( ( $style == 'carousel' ) ? 'owl-carousel ' . woodmart_owl_items_per_slide( $per_row ) : '' ) . '">';

 		if( ! is_wp_error( $brands ) && count( $brands ) > 0 ) {
			foreach ($brands as $key => $brand) {
				$image = woodmart_tax_data( $attribute, $brand->term_id, 'image' );

				$filter_name = 'filter_' . sanitize_title( str_replace( 'pa_', '', $attribute ) );

				$attr_link = apply_filters('woodmart_permalink', add_query_arg( $filter_name, $brand->slug, $link ));

				echo '<div class="brand-item">';
					echo '<a href="' . esc_url( $attr_link ) . '">';
					if( $style == 'list' || empty( $image ) ) {
						echo '<span class="brand-title-wrap">' . $brand->name . '</span>';
					} else {
						echo '<img src="' . esc_url( $image ) . '" title="' . esc_attr( $brand->slug ) . '" alt="' . esc_attr( $brand->slug ) . '" />';
					}
					echo '</a>';
				echo '</div>';
			}
		}

		if( $style == 'carousel' ) {
			$parsed_atts['autoplay'] = false;
			$parsed_atts['wrap'] = $wrap;
			$parsed_atts['scroll_per_page'] = true;
			$parsed_atts['carousel_id'] = $carousel_id;
			$parsed_atts['slides_per_view'] = $per_row;

			woodmart_owl_carousel_init( $parsed_atts );
		}

		echo '</div></div>';

		$output = ob_get_contents();
		ob_end_clean();

		return $output;

	}
	add_shortcode( 'woodmart_brands', 'woodmart_shortcode_brands' );
}
