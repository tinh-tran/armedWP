<?php
/**
* ------------------------------------------------------------------------------------------------
* Share and follow buttons shortcode
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_shortcode_social' )) {
	function woodmart_shortcode_social($atts) {
		extract(shortcode_atts( array(
			'type' => 'share',
			'align' => 'center',
			'tooltip' => 'no',
			'style' => 'default', // circle colored
			'size' => 'default', // circle colored
			'form' => 'circle',
			'color' => 'dark',
			'el_class' => '',
		), $atts ));

		$target = "_blank";

		$classes = 'woodmart-social-icons';
		$classes .= ' text-' . $align;
		$classes .= ' icons-design-' . $style;
		$classes .= ' icons-size-' . $size;
		$classes .= ' color-scheme-' . $color;
		$classes .= ' social-' . $type;
		$classes .= ' social-form-' . $form;
		$classes .= ( $el_class ) ? $el_class : '';


		$thumb_id = get_post_thumbnail_id();
		$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true);

		ob_start();
		?>

			<div class="<?php echo esc_attr( $classes ); ?>">
				<?php if ( ( $type == 'share' && woodmart_get_opt('share_fb') ) || ( $type == 'follow' && woodmart_get_opt( 'fb_link' ) != '')): ?>
					<div class="woodmart-social-icon social-facebook"><a href="<?php echo ($type == 'follow') ? esc_url(woodmart_get_opt( 'fb_link' )) : 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink(); ?>" target="<?php echo esc_attr( $target ); ?>" class="<?php if( $tooltip == "yes" ) echo 'woodmart-tooltip'; ?>"><i class="fa fa-facebook"></i><?php esc_html_e('Facebook', 'woodmart') ?></a></div>
				<?php endif ?>

				<?php if ( ( $type == 'share' && woodmart_get_opt('share_twitter') ) || ( $type == 'follow' && woodmart_get_opt( 'twitter_link' ) != '')): ?>
					<div class="woodmart-social-icon social-twitter"><a href="<?php echo ($type == 'follow') ? esc_url(woodmart_get_opt( 'twitter_link' )) : 'http://twitter.com/share?url=' . get_the_permalink(); ?>" target="<?php echo esc_attr( $target ); ?>" class="<?php if( $tooltip == "yes" ) echo 'woodmart-tooltip'; ?>"><i class="fa fa-twitter"></i><?php esc_html_e('Twitter', 'woodmart') ?></a></div>
				<?php endif ?>

				<?php if ( ( $type == 'share' && woodmart_get_opt('share_google') ) || ( $type == 'follow' && woodmart_get_opt( 'google_link' ) != '' ) ): ?>
					<div class="woodmart-social-icon social-google"><a href="<?php echo ($type == 'follow') ? esc_url(woodmart_get_opt( 'google_link' )) : 'http://plus.google.com/share?url=' . get_the_permalink(); ?>" target="<?php echo esc_attr( $target ); ?>" class="<?php if( $tooltip == "yes" ) echo 'woodmart-tooltip'; ?>"><i class="fa fa-google-plus"></i><?php esc_html_e('Google', 'woodmart') ?></a></div>
				<?php endif ?>

				<?php if ( ( $type == 'share' && woodmart_get_opt('share_email') ) || ( $type == 'follow' && woodmart_get_opt( 'social_email' ) ) ): ?>
					<div class="woodmart-social-icon social-email"><a href="mailto:<?php echo '?subject=' . esc_html__('Check this ', 'woodmart') . get_the_permalink(); ?>" target="<?php echo esc_attr( $target ); ?>" class="<?php if( $tooltip == "yes" ) echo 'woodmart-tooltip'; ?>"><i class="fa fa-envelope"></i><?php esc_html_e('Email', 'woodmart') ?></a></div>
				<?php endif ?>

				<?php if ( $type == 'follow' && woodmart_get_opt( 'isntagram_link' ) != ''): ?>
					<div class="woodmart-social-icon social-instagram"><a href="<?php echo ($type == 'follow') ? esc_url(woodmart_get_opt( 'isntagram_link' )) : '' . get_the_permalink(); ?>" target="<?php echo esc_attr( $target ); ?>" class="<?php if( $tooltip == "yes" ) echo 'woodmart-tooltip'; ?>"><i class="fa fa-instagram"></i><?php esc_html_e('Instagram', 'woodmart') ?></a></div>
				<?php endif ?>

				<?php if ( $type == 'follow' && woodmart_get_opt( 'youtube_link' ) != ''): ?>
					<div class="woodmart-social-icon social-youtube"><a href="<?php echo ($type == 'follow') ? esc_url(woodmart_get_opt( 'youtube_link' )) : '' . get_the_permalink(); ?>" target="<?php echo esc_attr( $target ); ?>" class="<?php if( $tooltip == "yes" ) echo 'woodmart-tooltip'; ?>"><i class="fa fa-youtube"></i><?php esc_html_e('YouTube', 'woodmart') ?></a></div>
				<?php endif ?>

				<?php if ( ( $type == 'share' && woodmart_get_opt('share_pinterest') ) || ( $type == 'follow' && woodmart_get_opt( 'pinterest_link' ) != '' ) ): ?>
					<div class="woodmart-social-icon social-pinterest"><a href="<?php echo ($type == 'follow') ? esc_url(woodmart_get_opt( 'pinterest_link' )) : 'http://pinterest.com/pin/create/button/?url=' . get_the_permalink() . '&media=' . $thumb_url[0]; ?>" target="<?php echo esc_attr( $target ); ?>" class="<?php if( $tooltip == "yes" ) echo 'woodmart-tooltip'; ?>"><i class="fa fa-pinterest"></i><?php esc_html_e('Pinterest', 'woodmart') ?></a></div>
				<?php endif ?>

				<?php if ( $type == 'follow' && woodmart_get_opt( 'tumblr_link' ) != ''): ?>
					<div class="woodmart-social-icon social-tumblr"><a href="<?php echo ($type == 'follow') ? esc_url(woodmart_get_opt( 'tumblr_link' )) : '' . get_the_permalink(); ?>" target="<?php echo esc_attr( $target ); ?>" class="<?php if( $tooltip == "yes" ) echo 'woodmart-tooltip'; ?>"><i class="fa fa-tumblr"></i><?php esc_html_e('Tumblr', 'woodmart') ?></a></div>
				<?php endif ?>

				<?php if ( $type == 'follow' && woodmart_get_opt( 'linkedin_link' ) != ''): ?>
					<div class="woodmart-social-icon social-linkedin"><a href="<?php echo ($type == 'follow') ? esc_url(woodmart_get_opt( 'linkedin_link' )) : '' . get_the_permalink(); ?>" target="<?php echo esc_attr( $target ); ?>" class="<?php if( $tooltip == "yes" ) echo 'woodmart-tooltip'; ?>"><i class="fa fa-linkedin"></i><?php esc_html_e('linkedin', 'woodmart') ?></a></div>
				<?php endif ?>

				<?php if ( $type == 'follow' && woodmart_get_opt( 'vimeo_link' ) != ''): ?>
					<div class="woodmart-social-icon social-vimeo"><a href="<?php echo ($type == 'follow') ? esc_url(woodmart_get_opt( 'vimeo_link' )) : '' . get_the_permalink(); ?>" target="<?php echo esc_attr( $target ); ?>" class="<?php if( $tooltip == "yes" ) echo 'woodmart-tooltip'; ?>"><i class="fa fa-vimeo"></i><?php esc_html_e('Vimeo', 'woodmart') ?></a></div>
				<?php endif ?>

				<?php if ( $type == 'follow' && woodmart_get_opt( 'flickr_link' ) != ''): ?>
					<div class="woodmart-social-icon social-flickr"><a href="<?php echo ($type == 'follow') ? esc_url(woodmart_get_opt( 'flickr_link' )) : '' . get_the_permalink(); ?>" target="<?php echo esc_attr( $target ); ?>" class="<?php if( $tooltip == "yes" ) echo 'woodmart-tooltip'; ?>"><i class="fa fa-flickr"></i><?php esc_html_e('Flickr', 'woodmart') ?></a></div>
				<?php endif ?>

				<?php if ( $type == 'follow' && woodmart_get_opt( 'github_link' ) != ''): ?>
					<div class="woodmart-social-icon social-github"><a href="<?php echo ($type == 'follow') ? esc_url(woodmart_get_opt( 'github_link' )) : '' . get_the_permalink(); ?>" target="<?php echo esc_attr( $target ); ?>" class="<?php if( $tooltip == "yes" ) echo 'woodmart-tooltip'; ?>"><i class="fa fa-github"></i><?php esc_html_e('GitHub', 'woodmart') ?></a></div>
				<?php endif ?>

				<?php if ( $type == 'follow' && woodmart_get_opt( 'dribbble_link' ) != ''): ?>
					<div class="woodmart-social-icon social-dribbble"><a href="<?php echo ($type == 'follow') ? esc_url(woodmart_get_opt( 'dribbble_link' )) : '' . get_the_permalink(); ?>" target="<?php echo esc_attr( $target ); ?>" class="<?php if( $tooltip == "yes" ) echo 'woodmart-tooltip'; ?>"><i class="fa fa-dribbble"></i><?php esc_html_e('Dribbble', 'woodmart') ?></a></div>
				<?php endif ?>

				<?php if ( $type == 'follow' && woodmart_get_opt( 'behance_link' ) != ''): ?>
					<div class="woodmart-social-icon social-behance"><a href="<?php echo ($type == 'follow') ? esc_url(woodmart_get_opt( 'behance_link' )) : '' . get_the_permalink(); ?>" target="<?php echo esc_attr( $target ); ?>" class="<?php if( $tooltip == "yes" ) echo 'woodmart-tooltip'; ?>"><i class="fa fa-behance"></i><?php esc_html_e('Behance', 'woodmart') ?></a></div>
				<?php endif ?>

				<?php if ( $type == 'follow' && woodmart_get_opt( 'soundcloud_link' ) != ''): ?>
					<div class="woodmart-social-icon ocial-soundcloud"><a href="<?php echo ($type == 'follow') ? esc_url(woodmart_get_opt( 'soundcloud_link' )) : '' . get_the_permalink(); ?>" target="<?php echo esc_attr( $target ); ?>" class="<?php if( $tooltip == "yes" ) echo 'woodmart-tooltip'; ?>"><i class="fa fa-soundcloud"></i><?php esc_html_e('Soundcloud', 'woodmart') ?></a></div>
				<?php endif ?>

				<?php if ( $type == 'follow' && woodmart_get_opt( 'spotify_link' ) != ''): ?>
					<div class="woodmart-social-icon social-spotify"><a href="<?php echo ($type == 'follow') ? esc_url(woodmart_get_opt( 'spotify_link' )) : '' . get_the_permalink(); ?>" target="<?php echo esc_attr( $target ); ?>" class="<?php if( $tooltip == "yes" ) echo 'woodmart-tooltip'; ?>"><i class="fa fa-spotify"></i><?php esc_html_e('Spotify', 'woodmart') ?></a></div>
				<?php endif ?>

				<?php if ( ( $type == 'share' && woodmart_get_opt('share_ok') ) || ( $type == 'follow' && woodmart_get_opt( 'ok_link' ) != '' ) ): ?>
					<div class="woodmart-social-icon social-ok"><a href="<?php echo ($type == 'follow') ? esc_url(woodmart_get_opt( 'ok_link' )) : 'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1&st._surl=
' . get_the_permalink(); ?>" target="<?php echo esc_attr( $target ); ?>" class="<?php if( $tooltip == "yes" ) echo 'woodmart-tooltip'; ?>"><i class="fa fa-odnoklassniki"></i><?php esc_html_e('Odnoklassniki', 'woodmart') ?></a></div>
				<?php endif ?>

				<?php if ( $type == 'share' && woodmart_get_opt('share_whatsapp') ): ?>
					<div class="woodmart-social-icon social-whatsapp"><a href="<?php echo ($type == 'follow') ? ( woodmart_get_opt( 'whatsapp_link' )) : 'whatsapp://send?text=' . get_the_permalink(); ?>" target="<?php echo esc_attr( $target ); ?>" class="<?php if( $tooltip == "yes" ) echo 'woodmart-tooltip'; ?>"><i class="fa fa-whatsapp"></i><?php esc_html_e('WhatsApp', 'woodmart') ?></a></div>
				<?php endif ?>

			</div>

		<?php
		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
	add_shortcode( 'social_buttons', 'woodmart_shortcode_social' );
}