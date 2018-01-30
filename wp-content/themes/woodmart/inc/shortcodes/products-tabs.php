<?php
/**
* ------------------------------------------------------------------------------------------------
* Products tabs shortcode
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_shortcode_products_tabs' ) ) {
	function woodmart_shortcode_products_tabs($atts = array(), $content = null) {
		if( ! function_exists( 'wpb_getImageBySize' ) ) return;
		$output = $class = $autoplay = '';
		extract(shortcode_atts( array(
			'title' => '',
			'image' => '',
			'design' => 'default',
			'color' => '#83b735',
			'el_class' => ''
		), $atts ));

		$img_id = preg_replace( '/[^\d]/', '', $image );

		$img = wpb_getImageBySize( array( 'attach_id' => $img_id, 'thumb_size' => 'full', 'class' => 'tabs-icon' ) );

	    // Extract tab titles
	    preg_match_all( '/products_tab([^\]]+)/i', $content, $matches, PREG_OFFSET_CAPTURE );
	    $tab_titles = array();

	    if ( isset( $matches[1] ) ) {
	      	$tab_titles = $matches[1];
	    }

	    $tabs_nav = '';
	    $first_tab_title = '';
	    $tabs_nav .= '<ul class="products-tabs-title">';
	    $_i = 0;
	    foreach ( $tab_titles as $tab ) {
	    	$_i++;
			$tab_atts = shortcode_parse_atts( $tab[0] );
			$tab_atts['carousel_js_inline'] = 'yes';
			$encoded_atts = json_encode( $tab_atts );
			if( $_i == 1 && isset( $tab_atts['title'] ) ) $first_tab_title = $tab_atts['title'];
			$class = ( $_i == 1 ) ? ' active-tab-title' : '';
			if ( isset( $tab_atts['title'] ) ) {
				$tabs_nav .= '<li data-atts="' . esc_attr( $encoded_atts ) . '" class="' . esc_attr( $class ) . '"><span class="tab-label">' . $tab_atts['title'] . '</span></li>';
			}
	    }
	    $tabs_nav .= '</ul>';

		$tabs_id = rand(999,9999);

		$class .= ' tabs-' . $tabs_id;

		$class .= ' tabs-design-' . $design;

		$class .= ' ' . $el_class;

		ob_start(); ?>
			<div class="woodmart-products-tabs<?php echo esc_attr( $class ); ?>">
				<div class="woodmart-tabs-header">
					<div class="woodmart-tabs-loader"></div>
					<?php if ( ! empty( $title ) ): ?>
						<div class="tabs-name">
							<?php echo wp_kses( $img['thumbnail'], array( 'img' => array('class' => true,'width' => true,'height' => true,'src' => true,'alt' => true) ) );?> <?php echo ($title); ?>
						</div>
					<?php endif; ?>
					<div class="tabs-navigation-wrapper">
						<span class="open-title-menu"><?php echo ($first_tab_title); ?></span>
						<?php
							echo ($tabs_nav);
						?>
					</div>
				</div>
				<?php
					if ( isset( $tab_titles[0][0] ) ) {
						$first_tab_atts = shortcode_parse_atts( $tab_titles[0][0] );
						echo woodmart_shortcode_products_tab( $first_tab_atts );
					}
				?>
				<style type="text/css">
					.tabs-<?php echo esc_html( $tabs_id ); ?>.tabs-design-simple .tabs-name {
						border-color: <?php echo esc_html( $color ); ?>
					}

					.tabs-<?php echo esc_html( $tabs_id ); ?>.tabs-design-default .products-tabs-title .tab-label:after {
						    background-color: <?php echo esc_html( $color ); ?>
					}

					.tabs-<?php echo esc_html( $tabs_id ); ?>.tabs-design-simple .products-tabs-title li.active-tab-title,
					.tabs-<?php echo esc_html( $tabs_id ); ?>.tabs-design-simple .owl-nav > div:hover,
					.tabs-<?php echo esc_html( $tabs_id ); ?>.tabs-design-simple .wrap-loading-arrow > div:not(.disabled):hover  {
						color: <?php echo esc_html( $color ); ?>
					}
				</style>
			</div>
		<?php
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
	add_shortcode( 'products_tabs', 'woodmart_shortcode_products_tabs' );
}

if( ! function_exists( 'woodmart_shortcode_products_tab' ) ) {
	function woodmart_shortcode_products_tab($atts) {
		global $wpdb, $post;
		if( ! function_exists( 'wpb_getImageBySize' ) ) return;
		$output = $class = '';

	    $is_ajax = (defined( 'DOING_AJAX' ) && DOING_AJAX);

		$parsed_atts = shortcode_atts( array_merge( array(
			'title' => '',
		), woodmart_get_default_product_shortcode_atts()), $atts );

		extract( $parsed_atts );

		$parsed_atts['carousel_js_inline'] = 'yes';
		$parsed_atts['force_not_ajax'] = 'yes';

		ob_start(); ?>
			<?php if(!$is_ajax): ?>
				<div class="woodmart-tab-content<?php echo esc_attr( $class ); ?>" >
				
			<?php endif; ?>

				<?php
					echo woodmart_shortcode_products( $parsed_atts );
				 ?>
			<?php if(!$is_ajax): ?>
				</div>
			<?php endif; ?>
		<?php
		$output = ob_get_clean();

	    if( $is_ajax ) {
	    	$output =  array(
	    		'html' => $output
	    	);
	    }

	    return $output;
	}
	add_shortcode( 'products_tab', 'woodmart_shortcode_products_tab' );
}

if( ! function_exists( 'woodmart_get_products_tab_ajax' ) ) {
	add_action( 'wp_ajax_woodmart_get_products_tab_shortcode', 'woodmart_get_products_tab_ajax' );
	add_action( 'wp_ajax_nopriv_woodmart_get_products_tab_shortcode', 'woodmart_get_products_tab_ajax' );
	function woodmart_get_products_tab_ajax() {
		if( ! empty( $_POST['atts'] ) ) {
			$atts = $_POST['atts'];
			$data = woodmart_shortcode_products_tab($atts);
			echo json_encode( $data );
			die();
		}
	}
}