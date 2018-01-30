<?php
/**
* ------------------------------------------------------------------------------------------------
* instagram shortcode
* ------------------------------------------------------------------------------------------------
*/

if( ! function_exists( 'woodmart_shortcode_instagram' ) ) {
	function woodmart_shortcode_instagram( $atts, $content = '' ) {
		$output = '';
		extract(shortcode_atts( array(
			'title' => '',
			'username' => 'flickr',
			'number' => 9,
			'size' => 'medium',
			'target' => '_self',
			'link' => '',
			'design' => 'grid',
			'spacing' => 0,
			'rounded' => 0,
			'per_row' => 3,
			'hide_mask' => 0,
			'hide_pagination_control' => '',
			'hide_prev_next_buttons' => ''
		), $atts ));

		$carousel_id = 'carousel-' . rand(100,999);

		ob_start();

		$class = 'instagram-widget';

		if( $design != '' ) {
			$class .= ' instagram-' . $design;
		}

		if( $spacing == 1 ) {
			$class .= ' instagram-with-spaces';
		}

		if( $rounded == 1 ) {
			$class .= ' instagram-rounded';
		}

		$class .= ' instagram-per-row-' . $per_row;

		echo '<div id="' . esc_attr( $carousel_id ) . '" class="' . esc_attr( $class ) . '">';

		if(!empty($title)) { echo '<h3 class="title">' . $title . '</h3>'; };

		if ($username != '') {

			if ( ! empty( $content ) ): ?>
				<div class="instagram-content">
					<div class="instagram-content-inner">
						<?php echo do_shortcode( $content ); ?>
					</div>
				</div>
			<?php endif;

			$media_array = woodmart_scrape_instagram($username, $number);

			if ( is_wp_error($media_array) ) {

			   echo esc_html( $media_array->get_error_message() );

			} else {

				?><div class="instagram-pics <?php if( $design == 'slider') echo 'owl-carousel ' . woodmart_owl_items_per_slide( $per_row ); ?>"><?php
				foreach ($media_array as $item) {
					$image = (! empty( $item[$size] )) ? $item[$size] : $item['thumbnail'];
					$result = '<div class="instagram-picture">
						<div class="wrapp-picture">
							<a href="'. esc_url( $item['link'] ) .'" target="'. esc_attr( $target ) .'"></a>
							<img src="'. esc_url( $image ) .'" />';
							if ( $hide_mask == 0 ) {
								$result .= '<div class="hover-mask">
								<span class="instagram-likes"><span>' . woodmart_pretty_number( $item['likes'] ) . '</span></span>
								<span class="instagram-comments"><span>' . woodmart_pretty_number( $item['comments'] ) . '</span></span></div>';
							}
					$result .= '
						</div>
					</div>';
					echo ( $result );
				}
				?></div><?php
			}
		}

		if ($link != '') {
			?><p class="clear"><a href="//instagram.com/<?php echo trim($username); ?>" rel="me" target="<?php echo esc_attr( $target ); ?>"><?php echo esc_html($link); ?></a></p><?php
		}

		if( $design == 'slider' ) {

			woodmart_owl_carousel_init( array(
				'carousel_id' => $carousel_id,
				'hide_pagination_control' => $hide_pagination_control,
				'hide_prev_next_buttons' => $hide_prev_next_buttons,
				'slides_per_view' => $per_row
			) );
		}

		echo '</div>';

		$output = ob_get_contents();
		ob_end_clean();

		return $output;

	}
	add_shortcode( 'woodmart_instagram', 'woodmart_shortcode_instagram' );
}

if( ! function_exists( 'woodmart_pretty_number' ) ) {
	function woodmart_pretty_number( $x = 0 ) {
		$x = (int) $x;

		if( $x > 1000000 ) {
			return floor( $x / 1000000 ) . 'M';
		}

		if( $x > 10000 ) {
			return floor( $x / 1000 ) . 'k';
		}
		return $x;
	}
}

if( ! function_exists( 'woodmart_scrape_instagram' ) ) {
	function woodmart_scrape_instagram($username, $slice = 9) {
		$username = strtolower( $username );
		$by_hashtag = ( substr( $username, 0, 1) == '#' );
		if ( false === ( $instagram = get_transient( 'instagram-media-new-'.sanitize_title_with_dashes( $username ) ) ) ) {
			$request_param = ( $by_hashtag ) ? 'explore/tags/' . substr( $username, 1) : trim( $username );
			$remote = wp_remote_get( 'https://instagram.com/'. $request_param );
			if ( is_wp_error( $remote ) )
				return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'woodmart' ) );
			if ( 200 != wp_remote_retrieve_response_code( $remote ) )
				return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'woodmart' ) );
			$shards = explode( 'window._sharedData = ', $remote['body'] );
			$insta_json = explode( ';</script>', $shards[1] );
			$insta_array = json_decode( $insta_json[0], TRUE );
			if ( !$insta_array )
				return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'woodmart' ) );
			// old style
			if ( isset( $insta_array['entry_data']['UserProfile'][0]['userMedia'] ) ) {
				$images = $insta_array['entry_data']['UserProfile'][0]['userMedia'];
				$type = 'old';
			// new style
			} else if ( isset( $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) ) {
				$images = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
				$type = 'new';
			} elseif( $by_hashtag && isset( $insta_array['entry_data']['TagPage'][0]['tag']['media']['nodes'] ) ) {
				$images = $insta_array['entry_data']['TagPage'][0]['tag']['media']['nodes'];
				$type = 'new';
			} else {
				return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'woodmart' ) );
			}

			if ( !is_array( $images ) )
				return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'woodmart' ) );
			$instagram = array();
			switch ( $type ) {
				case 'old':
					foreach ( $images as $image ) {
						if ( $image['user']['username'] == $username ) {
							$image['link']						  = $image['link'];
							$image['images']['thumbnail']		   = preg_replace( "/^http:/i", "", $image['images']['thumbnail'] );
							$image['images']['standard_resolution'] = preg_replace( "/^http:/i", "", $image['images']['standard_resolution'] );
							$image['images']['low_resolution']	  = preg_replace( "/^http:/i", "", $image['images']['low_resolution'] );
							$instagram[] = array(
								'description'   => $image['caption']['text'],
								'link'		  	=> $image['link'],
								'time'		  	=> $image['created_time'],
								'comments'	  	=> $image['comments']['count'],
								'likes'		 	=> $image['likes']['count'],
								'thumbnail'	 	=> $image['images']['thumbnail'],
								'large'		 	=> $image['images']['standard_resolution'],
								'small'		 	=> $image['images']['low_resolution'],
								'type'		  	=> $image['type']
							);
						}
					}
				break;
				default:
					foreach ( $images as $image ) {
						$image['thumbnail_src'] = preg_replace( "/^https:/i", "", $image['thumbnail_src'] );
						$image['thumbnail'] = str_replace( 's640x640', 's160x160', $image['thumbnail_src'] );
						$image['medium'] = str_replace( 's640x640', 's320x320', $image['thumbnail_src'] );
						$image['large'] = $image['thumbnail_src'];
						$image['display_src'] = preg_replace( "/^https:/i", "", $image['display_src'] );
						if ( $image['is_video'] == true ) {
							$type = 'video';
						} else {
							$type = 'image';
						}
						$caption = esc_html__( 'Instagram Image', 'woodmart' );
						if ( ! empty( $image['caption'] ) ) {
							$caption = $image['caption'];
						}
						$instagram[] = array(
							'description'   => $caption,
							'link'		  	=> '//instagram.com/p/' . $image['code'],
							'time'		  	=> $image['date'],
							'comments'	  	=> $image['comments']['count'],
							'likes'		 	=> $image['likes']['count'],
							'thumbnail'	 	=> $image['thumbnail'],
							'medium'		=> $image['medium'],
							'large'			=> $image['large'],
							'original'		=> $image['display_src'],
							'type'		  	=> $type
						);
					}
				break;
			}
			// do not set an empty transient - should help catch private or empty accounts
			if ( ! empty( $instagram ) ) {
				$instagram = woodmart_compress( maybe_serialize( $instagram ) );
				set_transient( 'instagram-media-new-'.sanitize_title_with_dashes( $username ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS*2 ) );
			}
		}
		if ( ! empty( $instagram ) ) {
			$instagram = maybe_unserialize( woodmart_decompress( $instagram ) );
			return array_slice( $instagram, 0, $slice );
		} else {
			return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'woodmart' ) );
		}
	}
}

if( !function_exists( 'woodmart_instagram_images_only' ) ) {
	function woodmart_instagram_images_only($media_item) {
		if ($media_item['type'] == 'image')
			return true;

		return false;
	}
}