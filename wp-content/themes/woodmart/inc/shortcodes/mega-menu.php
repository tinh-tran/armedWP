<?php
/**
* ------------------------------------------------------------------------------------------------
* Mega Menu widget
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_shortcode_mega_menu' )) {
	function woodmart_shortcode_mega_menu($atts, $content) {
		$output = $title_html = '';
		extract(shortcode_atts( array(
			'title' => '',
			'nav_menu' => '',
			'style' => '',
			'color' => '',
			'woodmart_color_scheme' => 'light',
			'el_class' => ''
		), $atts ));

		$class = $el_class;

		if( $title != '' ) {
			$title_html = '<h5 class="widget-title color-scheme-' . esc_attr( $woodmart_color_scheme ) . '">' . esc_html ( $title ). '</h5>';
		}

		$widget_id = 'widget-' . rand(100,999);

		ob_start(); ?>

			<div id="<?php echo esc_attr( $widget_id ); ?>" class="widget_nav_mega_menu shortcode-mega-menu <?php echo esc_attr( $class ); ?>">

				<?php echo ( $title_html ); ?>

				<div class="woodmart-navigation vertical-navigation">
					<?php
						wp_nav_menu( array(
							'fallback_cb' => '',
							'menu' => $nav_menu,
							'walker' => new WOODMART_Mega_Menu_Walker()
						) );
					?>
				</div>
			</div>

			<?php if ( $color != '' ): ?>
				<style type="text/css">
					#<?php echo esc_attr( $widget_id ); ?> {
						border-color: <?php echo esc_attr($color); ?>
					}
					#<?php echo esc_attr( $widget_id ); ?> .widget-title {
						background-color: <?php echo esc_attr($color); ?>
					}
				</style>
			<?php endif ?>

		<?php
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
	add_shortcode( 'woodmart_mega_menu', 'woodmart_shortcode_mega_menu' );
}
