<?php
/**
* ------------------------------------------------------------------------------------------------
* List shortcode
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_list_shortcode' ) ) {
	function woodmart_list_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'icon_fontawesome' => 'fa fa-adjust',
			'icon_openiconic' => 'vc-oi vc-oi-dial',
			'icon_typicons' => 'typcn typcn-adjust-brightness',
			'icon_entypo' => 'entypo-icon entypo-icon-note',
			'icon_linecons' => 'vc_li vc_li-heart',
			'icon_monosocial' => 'vc-mono vc-mono-fivehundredpx',
			'icon_material' => 'vc-material vc-material-cake',
			'icon_library' => 'fontawesome',
			'icons_color' => '#333333',
			'icons_bg_color' => '#f4f4f4',

			'image' => '',
			'img_size' => '25x25',

			'color_scheme' => '',
			'size' 	 => 'default',

			'list' => '',
			'list_type' => 'icon',
			'list_style' => 'default',

			'el_class' 	 => '',
			'css' 	 => ''
		), $atts ) );
		
		if ( function_exists( 'vc_icon_element_fonts_enqueue' ) ) {
			vc_icon_element_fonts_enqueue( $icon_library );
		}
		
		$list_items = $img = '';
		
		if ( function_exists( 'vc_param_group_parse_atts' ) ) {
			$list_items = vc_param_group_parse_atts( $list );
		}

		if( empty( $list_items ) || empty( $list_items[0] ) ) return;

		$list_id = 'woodmart-list-id-' . uniqid();

		$icon_class = 'list-icon';
		if ( $list_type == 'icon' ) $icon_class .= ' ' . ${'icon_'. $icon_library};

		$list_class = 'woodmart-list';
		$list_class .= ' color-scheme-' . $color_scheme;
		$list_class .= ' woodmart-text-size-' . $size;
		$list_class .= ' woodmart-list-type-' . $list_type;
		$list_class .= ' woodmart-list-style-' . $list_style;
		if ( $list_style == 'rounded' || $list_style == 'square' ) $list_class .= ' woodmart-list-shape-icon';
		if( function_exists( 'vc_shortcode_custom_css_class' ) ) $list_class .= ' ' . vc_shortcode_custom_css_class( $css );
		
		if ( function_exists( 'wpb_getImageBySize' ) ) {
			$img = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => $img_size, 'class' => 'list-image' ) );
		}

		ob_start();
		?>

		<div class="<?php echo esc_attr( $list_class ); ?>" id="<?php echo esc_attr( $list_id ); ?>">
			<ul>
				<?php foreach ( $list_items as $item ): ?>
					<li>
						<?php if ( $list_type != 'without' && $list_type != 'image' ): ?>
							<div class="<?php echo esc_attr( $icon_class ); ?>"></div>
						<?php elseif ( $list_type == 'image' && isset( $img['thumbnail'] ) ): ?>
							<div class="<?php echo esc_attr( $icon_class ); ?>"><?php echo $img['thumbnail']; ?></div>
						<?php endif ?>
						<span class="list-content"><?php echo esc_html( $item['list-content'] ); ?></span>
					</li>
				<?php endforeach ?>
			</ul>

			<style>
				#<?php echo esc_attr( $list_id ); ?> .list-icon {

                    color: <?php echo esc_attr( $icons_color ); ?>;
                }   
                   
                <?php if ( $list_style == 'rounded' || $list_style == 'square' ): ?>
                    #<?php echo esc_attr( $list_id ); ?> .list-icon {
                        background-color: <?php echo esc_attr( $icons_bg_color ); ?>;
                    }
				<?php endif ?>
			</style>
		</div>
		
		<?php

		return ob_get_clean();
	}
	add_shortcode( 'woodmart_list', 'woodmart_list_shortcode' );
}