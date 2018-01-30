<?php if ( ! defined('WOODMART_THEME_DIR')) exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------------------------------
 * Init Theme Settings and Options with Redux plugin
 * ------------------------------------------------------------------------------------------------
 */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    $opt_name = 'woodmart_options';
    
    $woodmart_selectors = woodmart_get_config( 'selectors' );

    $args = array(
        'opt_name'             => $opt_name,
        'display_name'         => woodmart_get_theme_info( 'Name' ),
        'display_version'      => woodmart_get_theme_info( 'Version' ),
        'menu_type'            => 'menu',
        'allow_sub_menu'       => true,
        'menu_title'           => esc_html__( 'Theme Settings', 'woodmart' ),
        'page_title'           => esc_html__( 'Theme Settings', 'woodmart' ),
        'google_api_key'       => '',
        'google_update_weekly' => false,
        'async_typography'     => false,
        'admin_bar'            => true,
        'admin_bar_icon'       => 'dashicons-portfolio',
        'admin_bar_priority'   => 50,
        'global_variable'      => '',
        'dev_mode'             => false,
        'update_notice'        => true,
        'customizer'           => true,
        'page_priority'        => 61,
        'page_parent'          => 'themes.php',
        'page_permissions'     => 'manage_options',
        'menu_icon'            => WOODMART_ASSETS . '/images/theme-admin-icon.svg', 
        'last_tab'             => '',
        'page_icon'            => 'icon-themes',
        'page_slug'            => '_options',
        'save_defaults'        => true,
        'default_show'         => false,
        'default_mark'         => '',
        'show_import_export'   => true,
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        'output_tag'           => true,
        'footer_credit'        =>  '1.0',                  
        'database'             => '',
        'system_info'          => false,
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    Redux::setArgs( $opt_name, $args );


    Redux::setSection( $opt_name, array(
        'title' => esc_html__('General', 'woodmart'), 
        'id' => 'general',
        'icon' => 'el-icon-home',
        'fields' => array (
            array (
                'id' => 'favicon',
                'type' => 'media',
                'desc' => 'Upload image: png, ico',
                'operator' => 'and',
                'title' => 'Favicon image',
            ),
            array (
                'id' => 'favicon_retina',
                'type' => 'media',
                'desc' => 'Upload image: png, ico',
                'operator' => 'and',
                'title' => 'Favicon retina image',
            ),
            array (
                'id'       => 'page_comments',
                'type'     => 'switch',
                'title'    => esc_html__('Show comments on page', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'google_map_api_key',
                'type'     => 'text',
                'title'    => esc_html__('Google map API key', 'woodmart'),
                'subtitle' => wp_kses( __('Obtain API key <a href="https://developers.google.com/maps/documentation/javascript/get-api-key" target="_blank">here</a> to use our Google Map VC element.', 'woodmart'), array(
                        'a' => array( 
                            'href' => array(), 
                            'target' => array()
                        )
                    ) ),
                'tags'     => 'google api key'
            ),

        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('General Layout', 'woodmart'), 
        'id' => 'layout',
        'icon' => 'el-icon-website',
        'fields' => array (
            array (
                'id'       => 'site_width',
                'type'     => 'select',
                'title'    => esc_html__('Site width', 'woodmart'),
                'subtitle' => esc_html__('You can make your content wrapper boxed or full width', 'woodmart'),
                'options'  => array(
                   'full-width' => esc_html__('Full width', 'woodmart'), 
                   'boxed' => esc_html__('Boxed', 'woodmart'), 
                   'full-width-content' => esc_html__('Content full width', 'woodmart'), 
                   'wide' => esc_html__('Wide (1600 px)', 'woodmart'), 
                ),
                'default' => 'full-width',
                'tags'     => 'boxed full width wide'
            ),
             array (
                'id'       => 'main_layout',
                'type'     => 'image_select',
                'title'    => esc_html__('Sidebar position', 'woodmart'), 
                'subtitle' => esc_html__('Select main content and sidebar alignment.', 'woodmart'),
                'options'  => array(
                    'full-width'      => array(
                        'alt'   => 'Without', 
                        'img'   => ReduxFramework::$_url.'assets/img/1col.png'
                    ),
                    'sidebar-left'      => array(
                        'alt'   => 'Left', 
                        'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
                    ),
                    'sidebar-right'      => array(
                        'alt'   => 'Right', 
                        'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
                    ),
                ),
                'default' => 'sidebar-right',
                'tags'     => 'sidebar left sidebar right'
            ),
            array (
                'id'       => 'sidebar_width',
                'type'     => 'button_set',
                'title'    => esc_html__('Sidebar size', 'woodmart'),
                'subtitle' => esc_html__('You can set different sizes for your pages sidebar', 'woodmart'),
                'options'  => array(
                   2 => esc_html__('Small', 'woodmart'), 
                   3 => esc_html__('Medium', 'woodmart'),
                   4 => esc_html__('Large', 'woodmart'),
                ),
                'default' => 3,
                'tags'     => 'small sidebar large sidebar'
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Page heading', 'woodmart'), 
        'id' => 'page_titles',
        'icon' => 'el-icon-check',
        'fields' => array (
            array (
                'id'       => 'page-title-design',
                'type'     => 'button_set',
                'title'    => esc_html__('Page title design', 'woodmart'),
                'options'  => array(
                   'default' => esc_html__('Default', 'woodmart'), 
                   'centered' => esc_html__('Centered', 'woodmart'),  
                   'disable' => esc_html__('Disable', 'woodmart'), 
                ),
                'default' => 'centered',
                'tags'     => 'page heading design'
            ),
            array (
                'id'       => 'breadcrumbs',
                'type'     => 'switch',
                'title'    => esc_html__('Show breadcrumbs', 'woodmart'),
                'subtitle' => esc_html__('Displays a full chain of links to the current page.', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'title-background',
                'type'     => 'background',
                'title'    => esc_html__('Pages heading background', 'woodmart'),
                'subtitle' => esc_html__('Set background image or color, that will be used as a default for all page titles, shop page and blog.', 'woodmart'),
                'desc'     => esc_html__('You can also specify other image for particular page', 'woodmart'),
                'output'   => array('.page-title-default'),
                'default'  => array(
                    'background-color' => '#0a0a0a',
                    'background-position' => 'center center',
                    'background-size' => 'cover'
                ),
                'tags'     => 'page title color page title background'
            ),
            array (
                'id'       => 'page-title-size',
                'type'     => 'button_set',
                'title'    => esc_html__('Page title size', 'woodmart'),
                'subtitle' => esc_html__('You can set different sizes for your pages titles', 'woodmart'),
                'options'  => array(
                   'default' => esc_html__('Default',  'woodmart'), 
                   'small' => esc_html__('Small',  'woodmart'), 
                   'large' => esc_html__('Large', 'woodmart'), 
                ),
                'default' => 'default',
                'tags'     => 'page heading size breadcrumbs size'
            ),
            array (
                'id'       => 'page-title-color',
                'type'     => 'button_set',
                'title'    => esc_html__('Text color for page title', 'woodmart'),
                'subtitle' => esc_html__('You can set different colors depending on it\'s background. May be light or dark', 'woodmart'),
                'options'  => array(
                   'default' => esc_html__('Default',  'woodmart'), 
                   'light' => esc_html__('Light', 'woodmart'),  
                   'dark' => esc_html__('Dark', 'woodmart'), 
                ),
                'default' => 'light'
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Header', 'woodmart'),
        'id' => 'header',
        'icon' => 'el-icon-wrench'
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Logo', 'woodmart'),
        'id' => 'header-logo',
        'subsection' => true,
        'fields' => array (
            array (
                'id' => 'logo',
                'type' => 'media',
                'desc' => esc_html__('Upload image: png, jpg or gif file', 'woodmart'),
                'operator' => 'and',
                'title' => esc_html__('Logo image', 'woodmart'), 
            ),
            array (
                'id' => 'logo-sticky',
                'type' => 'media',
                'desc' => esc_html__('Upload image: png, ico', 'woodmart'), 
                'operator' => 'and',
                'title' => esc_html__('Logo image for sticky header', 'woodmart'), 
            ),
            array (
                'id' => 'logo-white',
                'type' => 'media',
                'desc' => esc_html__('Upload image: png, jpg or gif file', 'woodmart'),
                'operator' => 'and',
                'title' => esc_html__('Logo image - white', 'woodmart'),
                'tags'     => 'white logo white'
            ),
            array(
                'id'        => 'logo_img_width',
                'type'      => 'slider',
                'title'     => esc_html__('Logo image maximum width (px)', 'woodmart'),
                'desc'      => esc_html__('Set maximum width for logo image in the header. In pixels', 'woodmart'),
                "default"   => 250,
                "min"       => 50,
                "step"      => 1,
                "max"       => 600,
                'display_value' => 'label',
                'tags'     => 'logo width logo size'
            ),
            array(
                'id'             => 'logo_padding',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'units'          => array('px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Logo image padding', 'woodmart'),
                'desc'           => esc_html__('Add some spacing around your logo image', 'woodmart'),
                'default'            => array(
                    'padding-top'     => '10px',
                    'padding-right'   => '0px',
                    'padding-bottom'  => '10px',
                    'padding-left'    => '0px',
                    'units'          => 'px',
                ),
                'tags'     => 'logo padding logo spacing'
            ),
            array(
                'id'    => 'info_warning',
                'type'  => 'info',
                'title' => esc_html__('Responsive options', 'woodmart'),
                'style' => 'warning',
                'desc'  => esc_html__('Following options are optional. You can specify different options for each screen size.', 'woodmart')
            ),
            array(
                'id'        => 'logo_responsive_sizes',
                'type'      => 'switch',
                'title'     => esc_html__('Enable responsive options', 'woodmart'),
                "default"   => true
            ),
            array(
                'id'        => 'logo_img_width_tablet',
                'type'      => 'slider',
                'title'     => esc_html__('Logo width (px) for tablets', 'woodmart'),
                'desc'      => esc_html__('768-992px screen width', 'woodmart'),
                "default"   => 190,
                "min"       => 20,
                "step"      => 1,
                "max"       => 600,
                'display_value' => 'label',
                'required' => array(
                     array('logo_responsive_sizes','equals', array(true)),
                )
            ),
            array(
                'id'             => 'logo_padding_tablet',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'units'          => array('px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Logo image padding on tablets', 'woodmart'),
                'desc'           => esc_html__('768-992px screen width', 'woodmart'),
                'default'            => array(
                    'padding-top'     => '10px',
                    'padding-right'   => '0px',
                    'padding-bottom'  => '10px',
                    'padding-left'    => '0px',
                    'units'          => 'px'
                ),
                'required' => array(
                     array('logo_responsive_sizes','equals', array(true)),
                )
            ),
            array(
                'id'        => 'logo_img_width_mobile',
                'type'      => 'slider',
                'title'     => esc_html__('Logo width (px) for mobile', 'woodmart'),
                'desc'      => esc_html__('320-767px screen width', 'woodmart'),
                "default"   => 140,
                "min"       => 20,
                "step"      => 1,
                "max"       => 600,
                'display_value' => 'label',
                'required' => array(
                     array('logo_responsive_sizes','equals', array(true)),
                )
            ),
            array(
                'id'             => 'logo_padding_mobile',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'units'          => array('px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Logo image padding on mobile devices', 'woodmart'),
                'desc'           => esc_html__('320-767px screen width', 'woodmart'),
                'default'            => array(
                    'padding-top'     => '10px',
                    'padding-right'   => '0px',
                    'padding-bottom'  => '10px',
                    'padding-left'    => '0px',
                    'units'          => 'px'
                ),
                'required' => array(
                     array('logo_responsive_sizes','equals', array(true)),
                )
            ),
        )
    ) );


    Redux::setSection( $opt_name, array(
        'title' => 'Top bar',
        'id' => 'header-topbar',
        'subsection' => true,
        'fields' => array(
            array(
                'id'       => 'top-bar',
                'type'     => 'switch',
                'title'    => esc_html__('Top bar', 'woodmart'),
                'subtitle' => esc_html__('Information about the header', 'woodmart'),
                'default'  => true,
            ),
            array(
                'id'       => 'top-bar-color',
                'type'     => 'select',
                'title'    => esc_html__('Top bar text color', 'woodmart'),
                'options'  => array(
                   'dark' => esc_html__('Dark', 'woodmart'), 
                   'light' => esc_html__('Light', 'woodmart'),  
                ),
                'default' => 'light'
            ),
            array(
                'id'       => 'top-bar-bg',
                'type'     => 'background',
                'title'    => esc_html__('Top bar background', 'woodmart'),
                'output'   => array('.topbar-wrapp'),
                'default'  => array(
                    'background-color' => '#83b735'
                ),
                'tags'     => 'top bar color topbar color topbar background'
            ),
            array(
                'id'       => 'header_text',
                'type'     => 'text',
                'title'    => esc_html__('Top bar LEFT text', 'woodmart'),
                'subtitle' => esc_html__('Place here text you want to see in the left place of header top bar. You can use shortcodes. Ex.: [social_buttons] or place an HTML Block built with Visual Composer builder there like [html_block id="258"]', 'woodmart'),
                'default' => '<strong class="color-white">ADD ANYTHING HERE OR JUST REMOVE IT FROM THEME SETTINGS...</strong>',
                'tags'     => 'top bar text topbar text'
            ),
            array(
                'id'       => 'top_bar_right_text',
                'type'     => 'text',
                'title'    => esc_html__('Top bar RIGHT text', 'woodmart'),
                'subtitle' => esc_html__('Place here text you want to see in the RIGHT part of header top bar. You can use shortcodes. Ex.: [social_buttons] or place an HTML Block built with Visual Composer builder there like [html_block id="258"]', 'woodmart'),
                'default' => '[social_buttons type="follow" size="small"]',
                'tags'     => 'top bar text topbar text'
            ),
             array(
                'id'        => 'top_bar_height',
                'type'      => 'slider',
                'title'     => esc_html__( 'Top bar height for desktop', 'woodmart' ),
                'default'   => 42,
                'min'       => 24,
                'step'      => 1,
                'max'       => 100,
                'display_value' => 'label'
            ),
            array(
                'id'        => 'top_bar_mobile_height',
                'type'      => 'slider',
                'title'     => esc_html__( 'Top bar height for mobile', 'woodmart' ),
                'default'   => 38,
                'min'       => 24,
                'step'      => 1,
                'max'       => 100,
                'display_value' => 'label'
            )
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Header Layout', 'woodmart'), 
        'id' => 'header-header',
        'subsection' => true,
        'fields' => array (
            array(
                'id'       => 'header_full_width',
                'type'     => 'switch',
                'title'    => esc_html__('Header full Width', 'woodmart'),
                'subtitle' => esc_html__('Make header full width', 'woodmart'),
                'default'  => false,
                'tags'     => 'full width header'
            ),
            array(
                'id'       => 'sticky_header',
                'type'     => 'switch',
                'title'    => esc_html__('Sticky Header', 'woodmart'),
                'subtitle' => esc_html__('Enable/disable sticky header option', 'woodmart'),
                'default'  => true,
            ),
            array(
                'id'       => 'header-overlap',
                'type'     => 'switch',
                'title'    => esc_html__('Header above the content', 'woodmart'),
                'subtitle' => esc_html__('Overlap page content with this header (header is transparent).', 'woodmart'),
                'default'  => false,
                'required' => array(
                    array('header','equals', array('simple','shop', 'split')),
                ),
                'tags'     => 'header overlap header overlay'
            ),
            array (
                'id'       => 'header',
                'type'     => 'image_select',
                'title'    => esc_html__('Header design', 'woodmart'),
                'subtitle' => esc_html__('Set your header design', 'woodmart'),
                'options'  => array(
                    'advanced' => array(
                        'title' => 'Advanced',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/header-advanced.png',
                    ),
                    'shop' => array(
                        'title' => 'E-Commerce',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/header-shop.png',
                    ),
                    'base' => array(
                        'title' => 'Base header',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/header-base.png',
                    ),
                    'simple' => array(
                        'title' => 'Simplified',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/header-simple.png',
                    ),
                    'split' => array(
                        'title' => 'Double menu',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/header-split.png',
                    ),
                    'logo-center' => array(
                        'title' => 'Logo center',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/header-logo-center.png',
                    ),
                    'categories' => array(
                        'title' => 'With categories menu',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/header-categories.png',
                    ),
                    'menu-top' => array(
                        'title' => 'Menu in top bar',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/header-menu-top.png',
                    ),
                ),
                'default' => 'base',
                'tags'     => 'header layout header type header design header base header style'
            ),
            array(
                'id'       => 'header_mobile',
                'type'     => 'image_select',
                'title'    => esc_html__('Header on mobile devices', 'woodmart'),
                'subtitle' => esc_html__('Set your header design for mobile devices', 'woodmart'),
                'options'  => array(
                    'center' => array(
                        'title' => 'Logo center',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/header-mobile-center.png',
                    ),
                    'left' => array(
                        'title' => 'Mobile menu left',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/header-mobile-left.png',
                    ),
                    'right' => array(
                        'title' => 'Mobile menu right',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/header-mobile-right.png',
                    ),
                ),
                'default' => 'center',
                'tags'     => 'mobile header'
            ),
            array(
                'id'        => 'header_height',
                'type'      => 'slider',
                'title'     => esc_html__('Header height', 'woodmart'),
                "default"   => 105,
                "min"       => 40,
                "step"      => 1,
                "max"       => 220,
                'display_value' => 'label',
                'required' => array(
                    array('header','!=', array('vertical')),
                ),
                'tags'     => 'header size logo height logo size'
            ),
            array(
                'id'        => 'sticky_header_height',
                'type'      => 'slider',
                'title'     => esc_html__('Sticky header height', 'woodmart'),
                "default"   => 75,
                "min"       => 40,
                "step"      => 1,
                "max"       => 180,
                'display_value' => 'label',
                'required' => array(
                    array('header','!=', array('vertical')),
                )
            ),
            array(
                'id'        => 'mobile_header_height',
                'type'      => 'slider',
                'title'     => esc_html__('Mobile header height', 'woodmart'),
                'default'   => 60,
                'min'       => 40,
                'step'      => 1,
                'max'       => 120,
                'display_value' => 'label',
                'tags'     => 'mobile header size mobile logo height mobile logo size'
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Shopping cart widget', 'woodmart'),
        'id' => 'header-cart',
        'subsection' => true,
        'fields' => array (
            array (
                'id'       => 'cart_position',
                'type'     => 'button_set',
                'title'    => esc_html__('Shopping cart position', 'woodmart'),
                'subtitle' => esc_html__('Shopping cart widget may be placed in the header or as a sidebar.', 'woodmart'),
                'options'  => array(
                    'side' => 'Hidden sidebar',
                    'dropdown' => 'Dropdown widget in header',
                ),
                'default' => 'side',
                'tags'      => 'cart widget'
            ),
            array (
                'id'       => 'shopping_cart',
                'type'     => 'select',
                'title'    => esc_html__('Shopping cart design', 'woodmart'),
                'subtitle' => esc_html__('Set your shopping cart widget design in the header', 'woodmart'),
                'options'  => array(
                   1 => esc_html__('Design 1', 'woodmart'),
                   2 => esc_html__('Design 2', 'woodmart'), 
                   3 => esc_html__('Design 3', 'woodmart'),
                   4 => esc_html__('Design 4', 'woodmart'),
                   'disable' => esc_html__('Disable', 'woodmart'),
                ),
                'default' => 2,
                'tags'      => 'cart widget style cart widget design'
            ),
            array (
                'id'       => 'shopping_icon_alt',
                'type'     => 'switch',
                'title'    => esc_html__('Alternative shopping cart icon', 'woodmart'),
                'subtitle' => esc_html__('Use alternative cart icon in header icons links', 'woodmart'),
                'default' => 1
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Style & colors','woodmart'),
        'id' => 'header-style',
        'subsection' => true,
        'fields' => array (
            array (
                'id'       => 'header_color_scheme',
                'type'     => 'select',
                'title'    => esc_html__('Header text color', 'woodmart'),
                'subtitle' => esc_html__('You can change colors of links and icons for the header', 'woodmart'),
                'options'  => array(
                   'dark' => esc_html__('Dark','woodmart'), 
                   'light' => esc_html__('Light','woodmart'),  
                ),
                'default' => 'dark',
                'tags'     => 'header color'
            ),
            array(
                'id'       => 'header_background',
                'type'     => 'background',
                'title'    => esc_html__('Header background', 'woodmart'),
                'output'    => array('.main-header, .sticky-header.header-clone, .header-spacing'),
                'tags'     => 'header color'
            ),
            array(
                'id'       => 'header-border',
                'type'     => 'border',
                'title'    => esc_html__('Header Border', 'woodmart'),
                'output'   => array('.main-header'),
                'subtitle'     => esc_html__('Border bottom for the header.', 'woodmart'),
                'top'      => false,
                'left'     => false,
                'right'    => false,
            ),
            array(
                'id'       => 'header_dropdowns_dark',
                'type'     => 'switch',
                'title'    => esc_html__('Header dropdowns dark', 'woodmart'),
                'subtitle' => esc_html__('Mega menu dropdowns, search and shopping cart.', 'woodmart'),
                'default' => false
            ),
            array (
                'id'       => 'icons_design',
                'type'     => 'select',
                'title'    => esc_html__('Icons font for header icons', 'woodmart'),
                'subtitle' => esc_html__('Choose between two icon fonts: Font Awesome and Line Icons', 'woodmart'),
                'options'  => array(
                    'line' => 'Line Icons',
                    'fontawesome' => 'Font Awesome',
                ),
                'tags' => 'font awesome icons shopping cart icon',
                'default' => 'line'
            ),
        ),
    ) );


    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Menu', 'woodmart'), 
        'id' => 'header-menu',
        'subsection' => true,
        'fields' => array (
            array (
                'id'       => 'full_screen_menu',
                'type'     => 'switch',
                'title'    => esc_html__('Full screen menu', 'woodmart'),
                'subtitle' => esc_html__('Enable to show your menu in full screen style', 'woodmart'),
                'default' => false
            ),
            array (
                'id'       => 'menu_align',
                'type'     => 'button_set',
                'title'    => esc_html__('Main menu align', 'woodmart'),
                'subtitle' => esc_html__('Set menu text position on some headers', 'woodmart'),
                'options'  => array(
                   'left' => esc_html__('Left', 'woodmart'),  
                   'center' => esc_html__('Center', 'woodmart'),  
                   'right' => esc_html__('Right', 'woodmart'),  
                ),
                'default' => 'left',
                'tags'     => 'menu center menu',
                'required' => array(
                    array( 'full_screen_menu', 'equals', false )
                )
            ),
            array (
                'id'       => 'menu_style',
                'type'     => 'select',
                'title'    => esc_html__('Menu style', 'woodmart'),
                'subtitle' => esc_html__('You can change menu style in the header', 'woodmart'),
                'options'  => array(
                    'default' => 'Default',
                    'bordered' => 'Bordered',
                ),
                'default' => 'default'
            ),
            array (
                'id'       => 'mobile_categories',
                'type'     => 'switch',
                'title'    => esc_html__('Shop categories in mobile menu', 'woodmart'),
                'subtitle' => esc_html__('Enable to show your store categories in the mobile naviation on mobile devices', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'mobile_categories_menu',
                'type'     => 'select',
                'title'    => esc_html__('Mobile menu (categories)', 'woodmart'),
                'data'     => 'menus',
                'required' => array(
                     array( 'mobile_categories','equals', true ),
                )
            ),
            array (
                'id'       => 'mobile_menu_position',
                'type'     => 'button_set',
                'title'    => esc_html__('Mobile menu side', 'woodmart'),
                'subtitle' => esc_html__('Choose from which side mobile navigation will be shown', 'woodmart'),
                'options'  => array(
                    'left' => 'Left',
                    'right' => 'Right',
                ),
                'default' => 'left'
            ),
            array(
                'id'       => 'header-menu-text',
                'type'     => 'text',
                'title'    => esc_html__('Header menu text', 'woodmart'),
                'subtitle' => esc_html__('Place a few words like phone number, share buttons etc. that will be displayed right next after the main menu.', 'woodmart'),
                'default'  => '[html_block id="259"]',
                'required' => array(
                     array('header','equals', array('base')),
                )
            ),
            array(
                'id'       => 'menu_color_scheme',
                'type'     => 'select',
                'title'    => esc_html__('Menu color scheme', 'woodmart'),
                'options'  => array(
                    'dark' => 'Dark',
                    'light' => 'Light',
                ),
                'default' => 'dark',
                'required' => array(
                     array('header','equals', array('logo-center', 'base', 'menu-top')),
                )
            ),
            array(
                'id'       => 'menu_background',
                'type'     => 'background',
                'title'    => esc_html__('Menu background', 'woodmart'),
                'output'    => array('.navigation-wrap, .header-menu-top .navigation-wrap'),
                // 'default'  => array(
                //     'background-color' => '#83b735'
                // ),
                'required' => array(
                     array('header','equals', array('logo-center', 'base', 'menu-top')),
                )
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Categories menu', 'woodmart'),  
        'id' => 'header-categories',
        'subsection' => true,
        'fields' => array (
            array(
                'id'       => 'categories-menu',
                'type'     => 'select',
                'title'    => esc_html__('Categories menu', 'woodmart'),
                'subtitle' => esc_html__('Use your custom menu as a categories navigation for particular headers.', 'woodmart'),
                'data'     => 'menus'
            ),
            array (
                'id'       => 'categories_menu_color_scheme',
                'type'     => 'select',
                'title'    => esc_html__('Categories menu color scheme', 'woodmart'),
                'options'  => array(
                    'dark' => 'Dark',
                    'light' => 'Light',
                ),
                'default' => 'light'
            ),
            array(
                'id'       => 'categories_menu_background',
                'type'     => 'background',
                'title'    => esc_html__('Categories menu background', 'woodmart'),
                'default'  => array(
                    'background-color' => '#83b735'
                ),
                'output'    => array('.header-categories-nav .menu-opener')
            ),
        ),
    ) );


    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Search', 'woodmart'),
        'id' => 'header-search',
        'subsection' => true,
        'fields' => array (
            array (
                'id'       => 'header_search',
                'type'     => 'button_set',
                'title'    => esc_html__('Search widget', 'woodmart'),
                'subtitle'    => esc_html__('Display search icon in the header in different views', 'woodmart'),
                'options'  => array(
                  'dropdown' => esc_html__('Dropdown', 'woodmart'),  
                  'full-screen' => esc_html__('Full screen', 'woodmart'),  
                  'disable' => esc_html__('Disable', 'woodmart'),  
                ),
                'default' => 'full-screen'
            ),
            array (
                'id'       => 'mobile_search_icon',
                'type'     => 'switch',
                'title'    => esc_html__('Search icon on mobile', 'woodmart'),
                'default' => 0,
                'required' => array(
                    array( 'header_search', '!=', array( 'disable' ) ),
                ),
            ),
            array (
                'id'       => 'search_ajax',
                'type'     => 'switch',
                'title'    => esc_html__('AJAX Search', 'woodmart'),
                'default' => 1
            ),
            array (
                'id'       => 'search_post_type',
                'type'     => 'select',
                'title'    => esc_html__('Search post type', 'woodmart'), 
                'subtitle' => esc_html__('You can set up site search for posts or for products (woocommerce)', 'woodmart'),
                'options'  => array(
                    'product' => esc_html__('Product', 'woodmart'), 
                    'post' => esc_html__('Post', 'woodmart'), 
                    'portfolio' => esc_html__('Portfolio', 'woodmart'), 
                ),
                'default' => 'product'
            ),
            // array (
            //     'id'       => 'widget_toggle',
            //     'type'     => 'switch',
            //     'title'    => esc_html__('Widgets hide by title click', 'woodmart'), 
            //     'subtitle' => esc_html__('If enabled you will be able to close widgets by clicking on it\'s title', 'woodmart'),
            //     'default' => false
            // ),
            array(
                'id'       => 'search_by_sku',
                'type'     => 'switch',
                'title'    => esc_html__('Search by product SKU', 'woodmart'), 
                'default' => true
            ),
            array(
                'id'       => 'search_categories',         
                'type'     => 'switch',
                'title'    => esc_html__('Categories dropdown in WOO search form', 'woodmart'),
                'subtitle' => esc_html__('Display categories select that allows users search products by category', 'woodmart'),
                'default' => true
            )
        ),
    ) );
    
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'My account links', 'woodmart' ),  
        'id' => 'header_my_account',
        'subsection' => true,
        'fields' => array (
            array (
                'id'       => 'header_my_account_style',
                'type'     => 'select',
                'title'    => esc_html__( 'Style', 'woodmart' ),
                'options'  => array(
                    'text' => esc_html__( 'Text', 'woodmart' ),
                    'icon' => esc_html__( 'Icon', 'woodmart' )
                ),
                'default' => 'text'
            ),
            array (
                'id'       => 'header_links',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show in the HEADER', 'woodmart' ),
                'default' => 1
            ),
            array (
                'id'       => 'topbar_links',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show in the TOP BAR', 'woodmart' ),
                'default' => 0
            ),
            array (
                'id'       => 'links_with_username',
                'type'     => 'switch',
                'title'    => esc_html__( 'With username', 'woodmart' ),
                'default' => 0
            )
        ),
    ) );
    
    Redux::setSection( $opt_name, array(
        'title' => 'Header banner',
        'id' => 'header-banner',
        'subsection' => true,
        'fields' => array(
            array(
                'id'       => 'header_banner',
                'type'     => 'switch',
                'title'    => esc_html__( 'Header banner', 'woodmart' ),
                'subtitle' => esc_html__( 'Header banner above the header', 'woodmart' ),
                'default'  => false,
            ),
            array(
                'id'       => 'header_banner_link',
                'type'     => 'text',
                'title'    => esc_html__( 'Banner link', 'woodmart' ),
                'tags'     => 'header banner text link'
            ),
            array(
                'id'       => 'header_banner_shortcode',
                'type'     => 'editor',
                'title'    => esc_html__( 'Banner content', 'woodmart' ),
                'subtitle' => esc_html__( 'Place here shortcodes you want to see in the banner above the header. You can use shortcodes. Ex.: [social_buttons] or place an HTML Block built with Visual Composer builder there like [html_block id="258"]', 'woodmart' ),
                'tags'     => 'header banner text content'
            ),
            array(
               'id'        => 'header_banner_height',
               'type'      => 'slider',
               'title'     => esc_html__( 'Banner height for desktop', 'woodmart' ),
               'default'   => 40,
               'min'       => 0,
               'step'      => 1,
               'max'       => 200,
               'display_value' => 'label'
            ),
            array(
               'id'        => 'header_banner_mobile_height',
               'type'      => 'slider',
               'title'     => esc_html__( 'Banner height for mobile', 'woodmart' ),
               'default'   => 40,
               'min'       => 0,
               'step'      => 1,
               'max'       => 200,
               'display_value' => 'label'
            ),
            array(
                'id'       => 'header_banner_color',
                'type'     => 'select',
                'title'    => esc_html__( 'Banner text color', 'woodmart' ),
                'options'  => array(
                   'dark' => esc_html__( 'Dark', 'woodmart' ), 
                   'light' => esc_html__( 'Light', 'woodmart' ),  
                ),
                'default' => 'light'
            ),
            array(
                'id'       => 'header_banner_bg',
                'type'     => 'background',
                'title'    => esc_html__( 'Banner background', 'woodmart' ),
                'output'   => array( '.header-banner' ),
                'tags'     => 'header banner color background'
            ),
            array(
                'id'       => 'header_close_btn',
                'type'     => 'switch',
                'title'    => esc_html__( 'Close button', 'woodmart' ),
                'subtitle' => esc_html__( 'Show close banner button', 'woodmart' ),
                'default'  => true,
            ),
            array(
                'id'       => 'header_banner_version',
                'type'     => 'text',
                'title'    => esc_html__( 'Banner version', 'woodmart' ),
                'subtitle' => esc_html__( 'If you change your banner you can increase their version to show the banner to all visitors again.', 'woodmart' ),
                'default' => 1,
                'required' => array(
                    array( 'header_close_btn', 'equals', true ),
                ),
            )
        ),
    ) );
    
    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Other', 'woodmart'),  
        'id' => 'header-other',
        'subsection' => true,
        'fields' => array (
            array (
                'id'       => 'header_wishlist',
                'type'     => 'button_set',
                'title'    => esc_html__('Display wishlist icon', 'woodmart'),
                'options'  => array(
                    'header' => 'header',
                    'topbar' => 'top bar',
                    'disable' => 'disable'
                ),
                'default' => 'header'
            ),
            array (
                'id'       => 'login_dropdown',
                'type'     => 'switch',
                'title'    => esc_html__('Login form in dropdown', 'woodmart'),
                'default' => 1
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Footer', 'woodmart'), 
        'id' => 'footer',
        'icon' => 'el-icon-photo',
        'fields' => array(
            array(
                'id'       => 'disable_footer',
                'type'     => 'switch',
                'title'    => esc_html__('Footer', 'woodmart'),
                'default' => true
            ),
            array(
                'id'       => 'footer-layout',
                'type'     => 'image_select',
                'title'    => esc_html__('Footer layout', 'woodmart'),
                'subtitle' => esc_html__('Choose your footer layout. Depending on columns number you will have different number of widget areas for footer in Appearance->Widgets', 'woodmart'),
                'options'  => array(
                    1 => array(
                        'title' => 'Single Column',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/footer-1.png'
                    ),
                    2 => array(
                        'title' => 'Two Columns',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/footer-2.png'
                    ),
                    3 => array(
                        'title' => 'Three Columns',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/footer-3.png'
                    ),
                    4 => array(
                        'title' => 'Four Columns',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/footer-4.png'
                    ),
                    5 => array(
                        'title' => 'Six Columns',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/footer-5.png'
                    ),
                    6 => array(
                        'title' => '1/4 + 1/2 + 1/4',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/footer-6.png'
                    ),
                    7 => array(
                        'title' => '1/2 + 1/4 + 1/4',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/footer-7.png'
                    ),
                    8 => array(
                        'title' => '1/4 + 1/4 + 1/2',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/footer-8.png'
                    ),
                    9 => array(
                        'title' => 'Two rows',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/footer-9.png'
                    ),
                    10 => array(
                        'title' => 'Two rows',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/footer-10.png'
                    ),
                    11 => array(
                        'title' => 'Two rows',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/footer-11.png'
                    ),
                    12 => array(
                        'title' => 'Two rows',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/footer-12.png'
                    ),
                    13 => array(
                        'title' => 'Five columns',
                        'img' => WOODMART_ASSETS_IMAGES . '/settings/footer-13.png'
                    ),
                ),
                'default' => 13
            ),
            array(
                'id'       => 'footer-style',
                'type'     => 'select',
                'title'    => esc_html__('Footer text color', 'woodmart'),
                'subtitle' => esc_html__('Choose your footer color scheme', 'woodmart'),
                'options'  => array(
                  'dark' => esc_html__('Dark', 'woodmart'),  
                  'light' => esc_html__('Light', 'woodmart'), 
                ),
                'default' => 'dark'
            ),
            array(
                'id'       => 'footer-bar-bg',
                'type'     => 'background',
                'title'    => esc_html__('Footer background', 'woodmart'),
                'output'    => array('.footer-container'),
                'default'  => array(
                    'background-color' => '#ffffff'
                ),
                'tags'     => 'footer color'
            ),
            array(
                'id'       => 'sticky_footer',
                'type'     => 'switch',
                'title'    => esc_html__('Sticky footer', 'woodmart'),
                'default' => false
            ),
            array(
                'id'       => 'disable_copyrights',
                'type'     => 'switch',
                'title'    => esc_html__('Copyrights', 'woodmart'),
                'default' => true
            ),
            array(
                'id'       => 'copyrights-layout',
                'type'     => 'select',
                'title'    => esc_html__('Copyrights layout', 'woodmart'),
                'options'  => array(
                   'two-columns' => esc_html__('Two columns', 'woodmart'),  
                   'centered' => esc_html__('Centered', 'woodmart'),  
                ),
                'default' => 'two-columns'
            ),
            array(
                'id'       => 'copyrights',
                'type'     => 'text',
                'title'    => esc_html__('Copyrights text', 'woodmart'),
                'subtitle' => esc_html__('Place here text you want to see in the copyrights area. You can use shortocdes. Ex.: [social_buttons]', 'woodmart'),
                'default' => '<small><a href="http://woodmart.xtemos.com"><strong>WOODMART</strong></a> <i class="fa fa-copyright"></i>  2017 CREATED BY <a href="http://xtemos.com"><strong><span style="color: red; font-size: 12px;">X</span>-TEMOS STUDIO</strong></a>. PREMIUM E-COMMERCE SOLUTIONS.</small>'
            ),
            array(
                'id'       => 'copyrights2',
                'type'     => 'text',
                'title'    => esc_html__('Text next to copyrights', 'woodmart'),
                'subtitle' => esc_html__('You can use shortcodes. Ex.: [social_buttons] or place an HTML Block built with Visual Composer builder there like [html_block id="258"]', 'woodmart'),
                'default' => '<img src="//woodmart.xtemos.com/wp-content/uploads/2017/01/payments.png">' //'[social_buttons align="right" style="colored" size="small"]'
            ),
            array(
                'id'=>'prefooter_area',
                'type' => 'textarea',
                'title' => esc_html__('HTML before footer', 'woodmart'),
                'subtitle' => esc_html__('Custom HTML Allowed (wp_kses)', 'woodmart'),
                'desc' => esc_html__('This is the text before footer field, again good for additional info. You can place here any shortcode, for ex.: [html_block id=""]', 'woodmart'),
                'validate' => 'html_custom',
                'default' => '[html_block id="258"]',
                'allowed_html' => array(
                    'a' => array(
                        'href' => array(),
                        'title' => array()
                    ),
                    'br' => array(),
                    'em' => array(),
                    'p' => array(),
                    'div' => array(),
                    'strong' => array()
                ),
                'tags'     => 'prefooter'
            ),
            array(
                'id'       => 'scroll_top_btn',
                'type'     => 'switch',
                'title'    => esc_html__( 'Scroll to top button', 'woodmart' ),
                'default' => true
            ),
        ), 
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Typography', 'woodmart'),
        'id' => 'typography',
        'icon' => 'el-icon-fontsize',
        'fields' => array (
            array(
                'id'          => 'text-font',
                'type'        => 'typography',
                'title'       => esc_html__('Text font', 'woodmart'),
                'all_styles'  => true,
                'google'      => true,
                'font-backup' => true,
                'text-align'  => false,
                'letter-spacing' => true,
                'output'      => $woodmart_selectors['text-font'],
                'units'       =>'px',
                'subtitle'    => esc_html__('Set you typography options for body, paragraphs.', 'woodmart'),
                'default'     => array(
                    'font-family' => 'Lato',
                    'google'      => true,
                    'font-backup' => 'Arial, Helvetica, sans-serif'
                ),
                'tags'     => 'typography'
            ),
            array(
                'id'          => 'primary-font',
                'type'        => 'typography',
                'title'       => esc_html__('Primary font', 'woodmart'),
                'all_styles'  => true,
                'google'      => true,
                'font-backup' => true,
                'font-size'   => false,
                'line-height' => false,
                'text-align'  => false,
                'letter-spacing' => true,
                'output'      => $woodmart_selectors['primary-font'],
                'units'       =>'px',
                'subtitle'    => esc_html__('Set you typography options for titles, post names.', 'woodmart'),
                'default'     => array(
                    'font-family' => 'Poppins',
                    'google'      => true,
                    'font-backup' => "'MS Sans Serif', Geneva, sans-serif"
                ),
                'tags'     => 'typography'
            ),
            array(
                'id'          => 'post-titles-font',
                'type'        => 'typography',
                'title'       => esc_html__('Entities names', 'woodmart'),
                'all_styles'  => true,
                'google'      => true,
                'font-backup' => true,
                'font-size'   => false,
                'color'       => false,
                'line-height' => false,
                'text-align'  => false,
                'letter-spacing' => true,
                'output'      => $woodmart_selectors['titles-font'],
                'units'       =>'px',
                'subtitle'    => esc_html__('Titles for posts, products, categories and pages', 'woodmart'),
                'default'     => array(
                    'font-family' => 'Poppins',
                    'google'      => true,
                    'font-backup' => "'MS Sans Serif', Geneva, sans-serif"
                ),
                'tags'        => 'typography'
            ),
            array(
                'id'          => 'secondary-font',
                'type'        => 'typography',
                'title'       => esc_html__('Secondary font', 'woodmart'),
                'all_styles'  => true,
                'google'      => true,
                'font-backup' => true,
                'font-size'   => false,
                'line-height' => false,
                'text-align'  => false,
                'letter-spacing' => true,
                'output'      => $woodmart_selectors['secondary-font'],
                'units'       =>'px',
                'subtitle'    => esc_html__('Use for secondary titles (use CSS class "font-alt" or "title-alt")', 'woodmart'),
                'default'     => array(
                    'font-family' => 'Lato',
                    'font-weight' => 400,
                    'google'      => true,
                    'font-backup' => "'MS Sans Serif', Geneva, sans-serif"
                ),
                'tags'     => 'typography'
            ),
            array(
                'id'          => 'widget-titles-font',
                'type'        => 'typography',
                'title'       => esc_html__('Widget titles font', 'woodmart'),
                'all_styles'  => true,
                'google'      => true,
                'font-backup' => true,
                'font-size'   => true,
                'line-height' => true,
                'text-align'  => true,
                'letter-spacing' => true,
                'output'      => $woodmart_selectors['widget-titles-font'],
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Poppins',
                    'font-weight' => 600,
                    'google'      => true,
                ),
                'tags'     => 'typography'
            ),
            array(
                'id'          => 'navigation-font',
                'type'        => 'typography',
                'title'       => esc_html__('Navigation font', 'woodmart'),
                'all_styles'  => true,
                'google'      => true,
                'font-backup' => true,
                'font-size'   => true,
                'line-height' => false,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing' => true,
                'output'      => $woodmart_selectors['navigation-font'],
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Lato',
                    'font-weight' => 700,
                    'font-size' => '13px',
                    'google'      => true,
                    'font-backup' => "'MS Sans Serif', Geneva, sans-serif"
                ),
                'tags'     => 'typography'
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Typekit Fonts', 'woodmart'),
        'id' => 'typekit_font',
        'subsection' => true,
        'fields' => array(
            array(
                'title' => 'Typekit Kit ID',
                'id' => 'typekit_id',
                'type' => 'text',
                'desc' => esc_html__('Enter your ', 'woodmart') . '<a target="_blank" href="https://typekit.com/account/kits">Typekit Kit ID</a>.',
            ),
            array(
                'title' => 'Typekit Typekit Font Face',
                'id' => 'typekit_fonts',
                'type' => 'text',
                'desc' => esc_html__('Example: futura-pt, lato', 'woodmart'),
            ),
        ),
    ) );


    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Styles and colors', 'woodmart'),
        'id' => 'colors',
        'icon' => 'el-icon-brush'
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Styles and colors', 'woodmart'),
        'id' => 'colors',
        'icon' => 'el-icon-brush',
        'fields' => array (
            array(
                'id'       => 'primary-color',
                'type'     => 'color',
                'title'    => esc_html__('Primary Color', 'woodmart'), 
                'subtitle' => esc_html__('Pick a background color for the theme buttons and other colored elements.', 'woodmart'),
                'validate' => 'color',
                'output'   => $woodmart_selectors['primary-color'],
                'default'  => '#83b735'
            ),
            array(
                'id'       => 'secondary-color',
                'type'     => 'color',
                'title'    => esc_html__('Secondary Color', 'woodmart'), 
                'validate' => 'color',
                'output'   => $woodmart_selectors['secondary-color']
            ),
            array(
                'id'       => 'dark_version',
                'type'     => 'switch',
                'title'    => esc_html__('Dark version', 'woodmart'), 
                'subtitle' => esc_html__('Turn your website color to dark version', 'woodmart'),
                'default' => false
            ),
            array(
                'id'   => 'buttons_info',
                'type' => 'info',
                'style' => 'info',
                'desc' => esc_html__('Settings for all buttons used in the template.', 'woodmart')
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Pages background', 'woodmart'),
        'subsection' => true,
        'id' => 'colors-bgs',
        'fields' => array (
            array (
                'id'   => 'bgs_info',
                'type' => 'info',
                'style' => 'info',
                'desc' => esc_html__('Background for body, and pages', 'woodmart')
            ),
            array (
                'id'       => 'body-background',
                'type'     => 'background',
                'title'    => esc_html__('Site background', 'woodmart'),
                'subtitle' => esc_html__('Set background image or color for body. Only for BOXED layout', 'woodmart'),
                'output'   => array('body'),
            ),
            array (
                'id'       => 'pages-background',
                'type'     => 'background',
                'title'    => esc_html__('Wrapper background for ALL pages', 'woodmart'),
                'output'   => array('.page .main-page-wrapper')
            ),
            array (
                'id'       => 'shop-background',
                'type'     => 'background',
                'title'    => esc_html__('Background for SHOP pages', 'woodmart'),
                'output'   => array('.woodmart-archive-shop .main-page-wrapper'),
            ),
            array (
                'id'       => 'product-background',
                'type'     => 'background',
                'title'    => esc_html__('Single product background', 'woodmart'),
                'subtitle' => esc_html__('Set background for your products page. You can also specify different background for particular products while editing it.', 'woodmart'),
                'output'   => array('.single-product .site-content')
            ),
            array (
                'id'       => 'blog-background',
                'type'     => 'background',
                'title'    => esc_html__('Background for BLOG', 'woodmart'),
                'output'   => array('.woodmart-archive-blog .main-page-wrapper')
            ),
            array (
                'id'       => 'blog-post-background',
                'type'     => 'background',
                'title'    => esc_html__('Background for BLOG single post', 'woodmart'),
                'output'   => array('.single-post .main-page-wrapper')
            ),
            array (
                'id'       => 'portfolio-background',
                'type'     => 'background',
                'title'    => esc_html__('Background for PORTFOLIO', 'woodmart'),
                'output'   => array('.woodmart-archive-portfolio .main-page-wrapper')
            ),
            array (
                'id'       => 'portfolio-project-background',
                'type'     => 'background',
                'title'    => esc_html__('Background for PORTFOLIO project', 'woodmart'),
                'output'   => array('.single-portfolio .main-page-wrapper')
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Buttons', 'woodmart'),
        'subsection' => true,
        'id' => 'colors-btns',
        'fields' => array (
            array (
                'id'   => 'buttons_info',
                'type' => 'info',
                'style' => 'info',
                'desc' => esc_html__('There are three categories of buttons presented in the theme: default, WooCommerce buttons and accent buttons. You can choose different styles for all of them separately.', 'woodmart')
            ),
            array (
                'id'       => 'btns_default_style',
                'type'     => 'button_set',
                'title'    => esc_html__('Default buttons styles', 'woodmart'),
                'subtitle' => esc_html__('Almost all standard buttons through the site', 'woodmart'),
                'options'  => array(
                    'flat' => 'flat',
                    '3d' => '3D',
                    'rounded' => 'rounded'
                ),
                'default' => 'flat'
            ),
            array (
                'id'       => 'btns_shop_style',
                'type'     => 'button_set',
                'title'    => esc_html__('WooCommerce buttons styles', 'woodmart'),
                'subtitle' => esc_html__('Shopping buttons like "Add to cart", "Checkout", "Login", "Register" etc.', 'woodmart'),
                'options'  => array(
                    'flat' => 'flat',
                    '3d' => '3D',
                    'rounded' => 'rounded'
                ),
                'default' => '3d'
            ),
            array (
                'id'       => 'btns_accent_style',
                'type'     => 'button_set',
                'title'    => esc_html__('Accent buttons styles', 'woodmart'),
                'subtitle' => esc_html__('"Call to action" buttons', 'woodmart'),
                'options'  => array(
                    'flat' => 'flat',
                    '3d' => '3D',
                    'rounded' => 'rounded'
                ),
                'default' => 'flat'
            ),
            array (
                'id'   => 'buttons_default_info',
                'type' => 'info',
                'style' => 'info',
                'desc' => esc_html__('Set background and color schemes for default buttons in idle and hover states.', 'woodmart')
            ),
            array (
                'id'       => 'btns_default_bg',
                'type'     => 'color',
                'title'    => esc_html__('[Default] Background for buttons', 'woodmart'),
                'output'   => array(
                    'background-color' => current($woodmart_selectors['btns-default'])
                )
            ),
            array (
                'id'       => 'btns_default_color_scheme',
                'type'     => 'select',
                'title'    => esc_html__('[Default] Text color scheme', 'woodmart'),
                'subtitle' => esc_html__('You can change colors of links for them', 'woodmart'),
                'options'  => array(
                    'dark' => 'Dark',
                    'light' => 'Light',
                ),
                'default' => 'dark'
            ),
            array (
                'id'       => 'btns_default_bg_hover',
                'type'     => 'color',
                'title'    => esc_html__('[Default hover] Background', 'woodmart'),
                'output'   => array(
                    'background-color' => woodmart_append_hover_state( $woodmart_selectors['btns-default'], true )
                ),
                'tags' => 'buttons background button color buttons color'
            ),
            array (
                'id'       => 'btns_default_color_scheme_hover',
                'type'     => 'select',
                'title'    => esc_html__('[Default hover] Text color scheme', 'woodmart'),
                'subtitle' => esc_html__('You can change colors of links for them', 'woodmart'),
                'options'  => array(
                    'dark' => 'Dark',
                    'light' => 'Light',
                ),
                'default' => 'dark'
            ),

            array (
                'id'   => 'buttons_shop_info',
                'type' => 'info',
                'style' => 'info',
                'desc' => esc_html__('Set background and color schemes for shop buttons in idle and hover states.', 'woodmart')
            ),
            array (
                'id'       => 'btns_shop_bg',
                'type'     => 'color',
                'title'    => esc_html__('[Shop] Background for buttons', 'woodmart'),
                'output'   => array(
                    'background-color' => current($woodmart_selectors['btns-shop'])
                ),
                'default' => '#83b735'
            ),
            array (
                'id'       => 'btns_shop_color_scheme',
                'type'     => 'select',
                'title'    => esc_html__('[Shop] Text color scheme', 'woodmart'),
                'subtitle' => esc_html__('You can change colors of links for them', 'woodmart'),
                'options'  => array(
                    'dark' => 'Dark',
                    'light' => 'Light',
                ),
                'default' => 'light'
            ),
            array (
                'id'       => 'btns_shop_bg_hover',
                'type'     => 'color',
                'title'    => esc_html__('[Shop hover] Background on hover', 'woodmart'),
                'output'   => array(
                    'background-color' => woodmart_append_hover_state( $woodmart_selectors['btns-shop'], true )
                ),
                'default' => '#83b735'
            ),
            array (
                'id'       => 'btns_shop_color_scheme_hover',
                'type'     => 'select',
                'title'    => esc_html__('[Shop hover] Text color scheme on hover', 'woodmart'),
                'subtitle' => esc_html__('You can change colors of links for them', 'woodmart'),
                'options'  => array(
                    'dark' => 'Dark',
                    'light' => 'Light',
                ),
                'default' => 'light'
            ),
            array (
                'id'   => 'buttons_accent_info',
                'type' => 'info',
                'style' => 'info',
                'desc' => esc_html__('Set background and color schemes for accent buttons in idle and hover states.', 'woodmart')
            ),
            array (
                'id'       => 'btns_accent_bg',
                'type'     => 'color',
                'title'    => esc_html__('[Accent] Background for buttons', 'woodmart'),
                'output'   => array(
                    'background-color' => current($woodmart_selectors['btns-accent'])
                ),
                'default' => '#83b735'
            ),
            array (
                'id'       => 'btns_accent_color_scheme',
                'type'     => 'select',
                'title'    => esc_html__('[Accent] Text color scheme', 'woodmart'),
                'subtitle' => esc_html__('You can change colors of links for them', 'woodmart'),
                'options'  => array(
                    'dark' => 'Dark',
                    'light' => 'Light',
                ),
                'default' => 'light'
            ),
            array (
                'id'       => 'btns_accent_bg_hover',
                'type'     => 'color',
                'title'    => esc_html__('[Accent hover] Background on hover', 'woodmart'),
                'output'   => array(
                    'background-color' => woodmart_append_hover_state( $woodmart_selectors['btns-accent'], true )
                ),
                'default' => '#83b735'
            ),
            array (
                'id'       => 'btns_accent_color_scheme_hover',
                'type'     => 'select',
                'title'    => esc_html__('[Accent hover] Text color scheme on hover', 'woodmart'),
                'subtitle' => esc_html__('You can change colors of links for them', 'woodmart'),
                'options'  => array(
                    'dark' => 'Dark',
                    'light' => 'Light',
                ),
                'default' => 'light'
            ),

        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Forms style', 'woodmart'),
        'subsection' => true,
        'id' => 'form_style',
        'fields' => array (
            array(
                'id'       => 'form_fields_style',
                'type'     => 'select',
                'title'    => esc_html__('Form fields style', 'woodmart'),
                'subtitle' => esc_html__('Choose your form style', 'woodmart'),
                'options'  => array(
                    'rounded' => 'Rounded',
                    'square' => 'Square',
                    'underlined' => 'Underlined',
                ),
                'default' => 'square'
            ),
            array(
                'id'       => 'form_border_width',
                'type'     => 'button_set',
                'title'    => esc_html__('Form border width', 'woodmart'),
                'subtitle' => esc_html__('Choose your form border width', 'woodmart'),
                'options'  => array(
                    1 => '1',
                    2 => '2',
                ),
                'default' => 2
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Blog', 'woodmart'),
        'id' => 'blog',
        'icon' => 'el-icon-pencil',
        'fields' => array (
            array (
                'id'       => 'blog_layout',
                'type'     => 'image_select',
                'title'    => esc_html__('Blog Layout', 'woodmart'),
                'subtitle' => esc_html__('Select main content and sidebar alignment for blog pages.', 'woodmart'),
                'options'  => array(
                    'full-width'      => array(
                        'alt'   => '1 Column',
                        'img'   => ReduxFramework::$_url.'assets/img/1col.png'
                    ),
                    'sidebar-left'      => array(
                        'alt'   => '2 Column Left',
                        'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
                    ),
                    'sidebar-right'      => array(
                        'alt'   => '2 Column Right',
                        'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
                    ),
                ),
                'default' => 'sidebar-right'
            ),
            array (
                'id'       => 'blog_sidebar_width',
                'type'     => 'button_set',
                'title'    => esc_html__('Blog Sidebar size', 'woodmart'),
                'subtitle' => esc_html__('You can set different sizes for your blog pages sidebar', 'woodmart'),
                'options'  => array(
                    2 => 'small',
                    3 => 'medium',
                    4 => 'large'
                ),
                'default' => 3
            ),
            array (
                'id'       => 'blog_design',
                'type'     => 'select',
                'title'    => esc_html__('Blog Design', 'woodmart'),
                'subtitle' => esc_html__('You can use different design for your blog styled for the theme.', 'woodmart'),
                'options'  => array(
                    'default' => 'Default',
                    'default-alt' => 'Default alternative',
                    'small-images' => 'Small images',
                    'chess' => 'Chess',
                    'masonry' => 'Masonry grid'
                ),
                'default' => 'masonry'
            ),
            array (
                'id'       => 'blog_columns',
                'type'     => 'button_set',
                'title'    => esc_html__('Blog items columns', 'woodmart'),
                'subtitle' => esc_html__('For masonry grid design', 'woodmart'),
                'options'  => array(
                    2 => '2',
                    3 => '3',
                    4 => '4',
                ),
                'default' => 3,
                'required' => array(
                     array('blog_design','equals','masonry'),
                )
            ),
            array (
                'id'       => 'blog_style',
                'type'     => 'button_set',
                'title'    => esc_html__('Blog Style', 'woodmart'),
                'options'  => array(
                    'flat' => 'Flat',
                    'shadow' => 'With shadow',
                ),
                'default' => 'shadow'
            ),
            array (
                'id'       => 'blog_excerpt',
                'type'     => 'button_set',
                'title'    => esc_html__('Posts excerpt', 'woodmart'),
                'subtitle' => esc_html__('If you will set this option to "Excerpt" then you are able to set custom excerpt for each post or it will be cutted from the post content. If you choose "Full content" then all content will be shown, or you can also add "Read more button" while editing the post and by doing this cut your excerpt length as you need.', 'woodmart'),
                'options'  => array(
                    'excerpt' => 'Excerpt',
                    'full' => 'Full content'
                ),
                'default' => 'full'
            ),
            array (
                'id'       => 'blog_words_or_letters',
                'type'     => 'button_set',
                'title'    => esc_html__('Excerpt length by words or letters', 'woodmart'),
                'options'  => array(
                    'word' => 'Words',
                    'letter' => 'Letters'
                ),
                'default' => 'letter',
                'required' => array(
                    array('blog_excerpt','equals', 'excerpt'),
                )
            ),
            array (
                'id'       => 'blog_excerpt_length',
                'type'     => 'text',
                'title'    => esc_html__('Excerpt length', 'woodmart'),
                'subtitle' => esc_html__('Number of words or letters that will be displayed for each post if you use "Excerpt" mode and don\'t set custom excerpt for each post.', 'woodmart'),
                'default' => 135,
                'required' => array(
                     array('blog_excerpt','equals', 'excerpt'),
                )
            ),
            array (
                'id'       => 'blog_share',
                'type'     => 'switch',
                'title'    => esc_html__('Share buttons', 'woodmart'),
                'subtitle' => esc_html__('Display share icons on single post page', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'blog_navigation',
                'type'     => 'switch',
                'title'    => esc_html__('Posts navigation', 'woodmart'),
                'subtitle' => esc_html__('Next and previous posts links on single post page', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'blog_author_bio',
                'type'     => 'switch',
                'title'    => esc_html__('Author bio', 'woodmart'),
                'subtitle' => esc_html__('Display information about the post author', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'blog_related_posts',
                'type'     => 'switch',
                'title'    => esc_html__('Related posts', 'woodmart'),
                'subtitle' => esc_html__('Show related posts on single post page (by tags)', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'blog_pagination',
                'type'     => 'button_set',
                'title'    => esc_html__('Blog pagination', 'woodmart'),
                'options'  => array(
                    'pagination' => 'Pagination links',
                    'load_more' => '"Load more" button',
                    'infinit' => 'Infinit scrolling',
                ),
                'default' => 'pagination'
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Portfolio', 'woodmart'),
        'id' => 'portfolio',
        'icon' => 'el-icon-th',
        'fields' => array (
            array (
                'id'       => 'portoflio_style',
                'type'     => 'select',
                'title'    => esc_html__('Portfolio Style', 'woodmart'),
                'subtitle' => esc_html__('You can use different styles for your projects.', 'woodmart'),
                'options'  => array(
                    'hover' => esc_html__('Show text on mouse over', 'woodmart'),
                    'hover-inverse' => esc_html__('Alternative', 'woodmart'),
                    'text-shown' => esc_html__('Text under image', 'woodmart'),
                    'parallax' => esc_html__('Mouse move parallax', 'woodmart'),
                ),
                'default' => 'hover'
            ),
            array (
                'id'       => 'portfolio_full_width',
                'type'     => 'switch',
                'title'    => esc_html__('Full Width portfolio', 'woodmart'),
                'subtitle' => esc_html__('Makes container 100% width of the page', 'woodmart'),
                'default' => false
            ),
            array (
                'id'       => 'projects_columns',
                'type'     => 'button_set',
                'title'    => esc_html__('Projects columns', 'woodmart'),
                'subtitle' => esc_html__('How many projects you want to show per row', 'woodmart'),
                'options'  => array(
                    2 => '2',
                    3 => '3',
                    4 => '4',
                    6 => '6'
                ),
                'default' => 3
            ),
            array (
                'id'       => 'portfolio_spacing',
                'type'     => 'button_set',
                'title'    => esc_html__('Space between projects', 'woodmart'),
                'subtitle' => esc_html__('You can set different spacing between blocks on portfolio page', 'woodmart'),
                'options'  => array(
                    0 => '0',
                    2 => '2',
                    6 => '5',
                    10 => '10',
                    20 => '20',
                    30 => '30'
                ),
                'default' => 30
            ),
            array (
                'id'       => 'portfolio_pagination',
                'type'     => 'button_set',
                'title'    => esc_html__('Portfolio pagination', 'woodmart'),
                'options'  => array(
                    'pagination' =>esc_html__( 'Pagination links', 'woodmart'),
                    'load_more' => esc_html__('"Load more" button', 'woodmart'),
                    'infinit' => esc_html__('Infinit scrolling', 'woodmart'),
                ),
                'default' => 'pagination'
            ),
            array (
                'id'       => 'portoflio_per_page',
                'type'     => 'text',
                'title'    => esc_html__('Items per page', 'woodmart'),
                'default' => 12
            ),
            array (
                'id'       => 'portoflio_orderby',
                'type'     => 'select',
                'title'    => esc_html__('Portfolio order by', 'woodmart'),
                'options'  => array(
                    'date' =>esc_html__( 'Date', 'woodmart'),
                    'ID' => esc_html__( 'ID', 'woodmart'),
                    'title' => esc_html__( 'Title', 'woodmart'),
                    'modified' => esc_html__( 'Modified', 'woodmart'),
                    'menu_order' => esc_html__( 'Menu order', 'woodmart')
                ),
                'default' => 'date'
            ),
            array (
                'id'       => 'portoflio_order',
                'type'     => 'select',
                'title'    => esc_html__('Portfolio order', 'woodmart'),
                'options'  => array(
                    'DESC' =>esc_html__( 'DESC', 'woodmart'),
                    'ASC' => esc_html__( 'ASC', 'woodmart'),
                ),
                'default' => 'DESC'
            ),
            array (
                'id'       => 'portfolio_navigation',
                'type'     => 'switch',
                'title'    => esc_html__('Projects navigation', 'woodmart'),
                'subtitle' => esc_html__('Next and previous projects links on single project page', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'portfolio_related',
                'type'     => 'switch',
                'title'    => esc_html__('Related Projects', 'woodmart'),
                'subtitle' => esc_html__('Show related projects carousel.', 'woodmart'),
                'default' => true
            ),
            array (
                'id'   => 'portfolio_filters_info',
                'type' => 'info',
                'style' => 'info',
                'desc' => esc_html__('Portfolio filters options', 'woodmart')
            ),
            array (
                'id'       => 'portoflio_filters',
                'type'     => 'switch',
                'title'    => esc_html__('Show categories filters', 'woodmart'),
                'default'  => true
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Shop', 'woodmart'),
        'id' => 'shop',
        'icon' => 'el-icon-shopping-cart',
        'fields' => array (
            array (
                'id'       => 'shop_filters',
                'type'     => 'switch',
                'title'    => esc_html__('Shop filters', 'woodmart'),
                'subtitle' => esc_html__('Enable shop filters widget\'s area above the products.', 'woodmart'),
                'default' => false
            ),
            array (
                'id'       => 'ajax_shop',
                'type'     => 'switch',
                'title'    => esc_html__('AJAX shop', 'woodmart'),
                'subtitle' => esc_html__('Enable AJAX functionality for filters widgets on shop.', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'ajax_scroll',
                'type'     => 'switch',
                'title'    => esc_html__('Scroll to top after AJAX', 'woodmart'), 
                'subtitle' => esc_html__('Disable scroll to top after AJAX.', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'hover_image',
                'type'     => 'switch',
                'title'    => esc_html__('Hover image', 'woodmart'), 
                'subtitle' => esc_html__('Disable hover image.', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'shop_countdown',
                'type'     => 'switch',
                'title'    => esc_html__('Countdown timer', 'woodmart'),
                'subtitle' => esc_html__('Show timer for products that have scheduled date for the sale price', 'woodmart'),
                'default' => false
            ),
            array (
                'id'       => 'quick_view',
                'type'     => 'switch',
                'title'    => esc_html__('Quick View', 'woodmart'),
                'subtitle' => esc_html__('Enable Quick view option. Ability to see the product information with AJAX.', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'quick_view_variable',
                'type'     => 'switch',
                'title'    => esc_html__('Show variations on quick view', 'woodmart'),
                'subtitle' => esc_html__('Enable Quick view option for variable products. Will allow your users to purchase variable products directly from the quick view.', 'woodmart'),
                'default' => true,
                'required' => array(
                     array('quick_view','equals',true),
                )
            ),
            array (
                'id'       => 'add_to_cart_action',
                'type'     => 'button_set',
                'title'    => esc_html__('Action after add to cart', 'woodmart'),
                'subtitle' => esc_html__('Choose between showing informative popup and opening shopping cart widget. Only for shop page.', 'woodmart'),
                'options'  => array(
                    'popup' => esc_html__('Show popup', 'woodmart'),
                    'widget' => esc_html__('Display widget', 'woodmart'),
                    'nothing' => esc_html__('No action', 'woodmart'),
                ),
                'default' => 'widget',
            ),
            array (
                'id'       => 'quick_shop_variable',
                'type'     => 'switch',
                'title'    => esc_html__('"Quick Shop" for variable products', 'woodmart'),
                'subtitle' => esc_html__('Allow your users to purchase variable products directly from the shop page.', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'empty_cart_text',
                'type'     => 'textarea',
                'title'    => esc_html__('Empty cart text', 'woodmart'),
                'subtitle' => esc_html__('Text will be displayed if user don\'t add any products to cart', 'woodmart'),      
                 'default'  => 'Before proceed to checkout you must add some products to your shopping cart.<br> You will find a lot of interesting products on our "Shop" page.',
            ),
        ),
    ) );


    Redux::setSection( $opt_name, array(
        'title' => 'Products grid',
        'id' => 'shop-grid',
        'subsection' => true,
        'fields' => array (
            array (
                'id'       => 'shop_per_page',
                'type'     => 'text',
                'title'    => esc_html__('Products per page', 'woodmart'),
                'subtitle' => esc_html__('Number of products per page', 'woodmart'),
                'default' => 12
            ),
            array (
                'id'       => 'per_page_links',
                'type'     => 'switch',
                'title'    => esc_html__('Products per page links', 'woodmart'),
                'subtitle' => esc_html__('Allow customers to change number of products per page', 'woodmart'),
                'default' => true
            ),
            array (
                'id' => 'per_page_options',
                'type' => 'text',
                'title' => esc_html__('Products per page variations', 'woodmart'),
                'default' => '9,24,36',
                'desc' => esc_html__('For ex.: 12,24,36,-1. Use -1 to show all products on the page', 'woodmart'),
                'required' => array(
                     array('per_page_links','equals',true),
                )
            ),
            array (
                'id'       => 'products_columns',
                'type'     => 'button_set',
                'title'    => esc_html__('Products columns', 'woodmart'),
                'subtitle' => esc_html__('How many products you want to show per row', 'woodmart'),
                'options'  => array(
                    2 => '2',
                    3 => '3',
                    4 => '4',
                    6 => '6'
                ),
                'default' => 3,
                'required' => array(
                     array('shop_view','not','list'),
                )
            ),
            array (
                'id'       => 'shop_pagination',
                'type'     => 'button_set',
                'title'    => esc_html__('Products pagination', 'woodmart'),
                'options'  => array(
                    'pagination' => esc_html__( 'Pagination', 'woodmart'),
                    'more-btn' => esc_html__('"Load more" button', 'woodmart'),
                    'infinit' => esc_html__( 'Infinit scrolling', 'woodmart'),
                ),
                'default' => 'pagination'
            ),
            array (
                'id'       => 'products_columns_mobile',
                'type'     => 'button_set',
                'title'    => esc_html__('Products columns on mobile', 'woodmart'),
                'subtitle' => esc_html__('How many products you want to show per row on mobile devices', 'woodmart'),
                'options'  => array(
                    1 => '1',
                    2 => '2',
                ),
                'default' => 2,
                'required' => array(
                     array('shop_view','not','list'),
                )
            ),
            array (
                'id'       => 'per_row_columns_selector',
                'type'     => 'switch',
                'title'    => esc_html__('Number of columns selector', 'woodmart'),
                'subtitle' => esc_html__('Allow customers to change number of columns per row', 'woodmart'),
                'default' => true,
                'required' => array(
                     array('shop_view','not','list'),
                )
            ),
            array (
                'id'       => 'shop_view',
                'type'     => 'button_set',
                'title'    => __('Shop products view', 'woodmart'), 
                'subtitle' => __('You can set different view mode for the shop page', 'woodmart'),
                'options'  => array(
                    'grid' => __('Grid', 'woodmart'),  
                    'list' => __('List', 'woodmart'),  
                    'grid_list' => __('Grid / List', 'woodmart'), 
                    'list_grid' => __('List / Grid', 'woodmart'), 
                ),
                'default' => 'grid'
            ),
            array (
                'id'       => 'products_columns_variations',
                'type'     => 'button_set',
                'title'    => esc_html__('Available products columns variations', 'woodmart'),
                'subtitle' => esc_html__('What columns users may select to be displayed on the product page', 'woodmart'),
                'multi'    => true,
                'options'  => array(
                    2 => '2',
                    3 => '3',
                    4 => '4',
                    6 => '6'
                ),
                'default' => array(2,3,4),
                'required' => array(
                     array('per_row_columns_selector','equals',true),
                )
            ),
            array (
                'id'       => 'products_spacing',
                'type'     => 'button_set',
                'title'    => esc_html__('Space between products', 'woodmart'),
                'subtitle' => esc_html__('You can set different spacing between blocks on shop page', 'woodmart'),
                'options'  => array(
                    0 => '0',
                    2 => '2',
                    6 => '5',
                    10 => '10',
                    20 => '20',
                    30 => '30'
                ),
                'default' => 30,
                'required' => array(
                     array('shop_view','not','list'),
                )
            ),
        ),
    ) );



    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Products & categories styles', 'woodmart'),
        'id' => 'shop-styles',
        'subsection' => true,
        'fields' => array (
            array (
                'id'       => 'products_masonry',
                'type'     => 'switch',
                'title'    => esc_html__('Masonry grid', 'woodmart'),
                'subtitle' => esc_html__('Products may have different sizes', 'woodmart'),
                'default' => false,
                'required' => array(
                     array('shop_view','not','list'),
                )
            ),
            array (
                'id'       => 'products_different_sizes',
                'type'     => 'switch',
                'title'    => esc_html__('Products grid with different sizes', 'woodmart'),
                'default' => false,
                'required' => array(
                     array('shop_view','not','list'),
                )
            ),
            array (
                'id'       => 'products_hover',
                'type'     => 'select',
                'title'    => esc_html__('Hover on product', 'woodmart'),
                'subtitle' => esc_html__('Choose one of those hover effects for products', 'woodmart'),
                'options'  => woodmart_get_config( 'product-hovers' ),
                'default' => 'base',
                'required' => array(
                     array('shop_view','not','list'),
                )
            ),
            array (
                'id'       => 'base_hover_content',
                'type'     => 'button_set',
                'title'    => esc_html__('Hover content', 'woodmart'),
                'options'  => array(
                    'excerpt' => esc_html__('Excerpt', 'woodmart'),
                    'additional_info' => esc_html__('Additional information', 'woodmart'),
                ),
                'required' => array(
                     array('products_hover','equals','base'),
                ),
                'default' => 'excerpt'
            ),
            array (
                'id'       => 'categories_design',
                'type'     => 'select',
                'title'    => esc_html__('Categories design', 'woodmart'),
                'subtitle' => esc_html__('Choose one of those designs for categories', 'woodmart'),
                'options'  => woodmart_get_config( 'categories-designs' ),
                'default' => 'default'
            ),
            array (
                'id'       => 'categories_under_title',
                'title'    => esc_html__('Show product category next to title', 'woodmart'),
                'type'     => 'switch',
                'default'  => false
            ),
            array (
                'id'       => 'brands_under_title',
                'title'    => esc_html__('Show product brands next to title', 'woodmart'),
                'type'     => 'switch',
                'default'  => false
            ),
        ),
    ) );


    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Sidebar & Page title', 'woodmart'),
        'id' => 'shop-layout',
        'subsection' => true,
        'fields' => array (
            array (
                'id'       => 'shop_layout',
                'type'     => 'image_select',
                'title'    => esc_html__('Shop Layout', 'woodmart'),
                'subtitle' => esc_html__('Select main content and sidebar alignment for shop pages.', 'woodmart'),
                'options'  => array(
                    'full-width'      => array(
                        'alt'   => esc_html__('1 Column', 'woodmart'),
                        'img'   => ReduxFramework::$_url.'assets/img/1col.png'
                    ),
                    'sidebar-left'      => array(
                        'alt'   => esc_html__('2 Column Left', 'woodmart'),
                        'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
                    ),
                    'sidebar-right'      => array(
                        'alt'   => esc_html__('2 Column Right', 'woodmart'),
                        'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
                    ),
                ),
                'default' => 'sidebar-left'
            ),
            array (
                'id'       => 'shop_sidebar_width',
                'type'     => 'button_set',
                'title'    => esc_html__('Sidebar size', 'woodmart'),
                'subtitle' => esc_html__('You can set different sizes for your shop pages sidebar', 'woodmart'),
                'options'  => array(
                    2 => 'small',
                    3 => 'medium',
                    4 => 'large'
                ),
                'default' => 3,
                'required' => array(
                     array('shop_layout','!=','full-width'),
                )
            ),
            array (
                'id'       => 'shop_hide_sidebar',
                'type'     => 'switch',
                'title'    => esc_html__('Off canvas sidebar for mobile', 'woodmart'),
                'subtitle' => esc_html__('You can can hide sidebar and show nicely on button click on the shop page.', 'woodmart'),
                'default' => true,
                'required' => array(
                     array('shop_layout','!=','full-width'),
                )
            ),
            array (
                'id'       => 'shop_hide_sidebar_tablet',
                'type'     => 'switch',
                'title'    => esc_html__('Off canvas sidebar for tablet', 'woodmart'),
                'subtitle' => esc_html__('You can can hide sidebar and show nicely on button click on the shop page.', 'woodmart'),
                'default' => true,
                'required' => array(
                     array('shop_layout','!=','full-width'),
                )
            ),
            array (
                'id'       => 'shop_hide_sidebar_desktop',
                'type'     => 'switch',
                'title'    => esc_html__('Off canvas sidebar for desktop', 'woodmart'),
                'subtitle' => esc_html__('You can can hide sidebar and show nicely on button click on the shop page.', 'woodmart'),
                'default' => false,
                'required' => array(
                     array('shop_layout','!=','full-width'),
                )
            ),
            array (
                'id'       => 'shop_title',
                'type'     => 'switch',
                'title'    => esc_html__('Shop title', 'woodmart'),
                'subtitle' => esc_html__('Show title for shop page, product categories or tags.', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'shop_categories',
                'type'     => 'switch',
                'title'    => esc_html__('Categories menu in page heading', 'woodmart'),
                'subtitle' => esc_html__('Show categories menu below page title', 'woodmart'),
                'default' => 1
            ),
            array (
                'id'       => 'shop_categories_ancestors',
                'type'     => 'switch',
                'title'    => esc_html__('Show current category ancestors', 'woodmart'),
                'default' => 0,
                'required' => array(
                     array('shop_categories','equals',true),
                )
            ),
            array (
                'id'       => 'show_categories_neighbors',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show category neighbors if there is no children', 'woodmart' ),
                'default' => 0,
                'required' => array(
                    array( 'shop_categories_ancestors', 'equals', true ),
                )
            ),
            array (
                'id'       => 'shop_products_count',
                'type'     => 'switch',
                'title'    => esc_html__('Show products count for each category', 'woodmart'),
                'default' => 1,
                'required' => array(
                     array('shop_categories','equals',true),
                )
            )
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Attribute swatches', 'woodmart'),
        'id' => 'shop-swatches',
        'subsection' => true,
        'fields' => array (
            array (
                'id'       => 'grid_swatches_attribute',
                'type'     => 'select',
                'title'    => esc_html__('Grid swatch attribute to display', 'woodmart'),
                'subtitle' => esc_html__('Choose attribute that will be shown on products grid', 'woodmart'),
                'data'  => 'taxonomy',
            ),
            array (
                'id'       => 'swatches_use_variation_images',
                'type'     => 'switch',
                'title'    => esc_html__('Use images from product variations', 'woodmart'),
                'subtitle' => esc_html__('If enabled swatches buttons will be filled with images choosed for product variations and not with images uploaded to attribute terms.', 'woodmart'),
                'default' => false
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Brands', 'woodmart'),
        'id' => 'shop-brand',
        'subsection' => true,
        'fields' => array (
            array (
                'id'       => 'brands_attribute',
                'type'     => 'select',
                'title'    => esc_html__('Brand attribute', 'woodmart'),
                'subtitle' => esc_html__('If you want to show brand image on your product page select desired attribute here', 'woodmart'),
                'data'  => 'taxonomy',
                'default' => 'pa_brand'
            ),
            array (
                'id'       => 'product_page_brand',
                'type'     => 'switch',
                'title'    => esc_html__('Brand position on the product page', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'product_brand_location',
                'type'     => 'button_set',
                'title'    => esc_html__('Show brand on the single product page', 'woodmart'),
                'options'  => array(
                    'about_title' => esc_html__('Above product title', 'woodmart'),
                    'sidebar' => esc_html__('Sidebar', 'woodmart'),
                ),
                'required' => array(
                     array('product_page_brand','equals',true),
                ),
                'default' => 'about_title'
            ),
            array (
                'id'       => 'brand_tab',
                'type'     => 'switch',
                'title'    => esc_html__('Show tab with brand information', 'woodmart'),
                'subtitle' => esc_html__('If enabled you will see additional tab with brand description on the single product page. Text will be taken from "Description" field for each brand (attribute term).', 'woodmart'),
                'default' => true
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Catalog mode', 'woodmart'),
        'id' => 'shop-catalog',
        'subsection' => true,
        'fields' => array (
            array (
                'id'       => 'catalog_mode',
                'type'     => 'switch',
                'title'    => esc_html__('Enable catalog mode', 'woodmart'),
                'subtitle' => esc_html__('You can hide all "Add to cart" buttons, cart widget, cart and checkout pages. This will allow you to showcase your products as an online catalog without ability to make a purchase.', 'woodmart'),
                'default' => false
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Cookie Law Info', 'woodmart'),
        'id' => 'shop-cookie',
        'subsection' => true,
        'fields' => array (
            array (
                'id'       => 'cookies_info',
                'type'     => 'switch',
                'title'    => esc_html__('Show cookies info', 'woodmart'),
                'subtitle' => esc_html__('Under EU privacy regulations, websites must make it clear to visitors what information about them is being stored. This specifically includes cookies. Turn on this option and user will see info box at the bottom of the page that your web-site is using cookies.', 'woodmart'),
                'default' => false
            ),
            array (
                'id'       => 'cookies_text',
                'type'     => 'editor',
                'title'    => esc_html__('Popup text', 'woodmart'),
                'subtitle' => esc_html__('Place here some information about cookies usage that will be shown in the popup.', 'woodmart'),
                'default' => esc_html__('We use cookies to improve your experience on our website. By browsing this website, you agree to our use of cookies.', 'woodmart'),
            ),
            array (
                'id'       => 'cookies_policy_page',
                'type'     => 'select',
                'title'    => esc_html__('Page with details', 'woodmart'),
                'subtitle' => esc_html__('Choose page that will contain detailed information about your Privacy Policy', 'woodmart'),
                'data'     => 'pages'
            ),
            array (
                'id'       => 'cookies_version',
                'type'     => 'text',
                'title'    => esc_html__('Cookies version', 'woodmart'),
                'subtitle' => esc_html__('If you change your cookie policy information you can increase their version to show the popup to all visitors again.', 'woodmart'),
                'default' => 1,
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Promo popup', 'woodmart'),
        'id' => 'shop-popup',
        'subsection' => true,
        'fields' => array (
            array (
                'id'       => 'promo_popup',
                'type'     => 'switch',
                'title'    => esc_html__('Enable promo popup', 'woodmart'),
                'subtitle' => esc_html__('Show promo popup to users when they enter the site.', 'woodmart'),
                'default' => 0
            ),
            array (
                'id'       => 'popup_text',
                'type'     => 'editor',
                'title'    => esc_html__('Promo popup text', 'woodmart'),
                'subtitle' => esc_html__('Place here some promo text or use HTML block and place here it\'s shortcode', 'woodmart'),
                'default' => ''
            ),
            array (
                'id'       => 'popup_event',
                'type'     => 'button_set',
                'title'    => esc_html__('Show popup after', 'woodmart'),
                'options'  => array(
                    'time' => esc_html__('some time', 'woodmart'),
                    'scroll' => esc_html__('user scroll', 'woodmart'),
                ),
                'default' => 'time'
            ),
            array (
                'id'       => 'promo_timeout',
                'type'     => 'text',
                'title'    => esc_html__('Popup delay', 'woodmart'),
                'subtitle' => esc_html__('Show popup after some time (in milliseconds)', 'woodmart'),
                'default' => '2000',
                'required' => array(
                     array('popup_event','equals', 'time'),
                )
            ),
            array(
                'id'        => 'popup_scroll',
                'type'      => 'slider',
                'title'     => esc_html__('Show after user scroll down the page', 'woodmart'),
                'subtitle' => esc_html__('Set the number of pixels users have to scroll down before popup opens', 'woodmart'),
                "default"   => 1000,
                "min"       => 100,
                "step"      => 50,
                "max"       => 5000,
                'display_value' => 'label',
                'required' => array(
                     array('popup_event','equals', 'scroll'),
                )
            ),
            array(
                'id'        => 'popup_pages',
                'type'      => 'slider',
                'title'     => esc_html__('Show after number of pages visited', 'woodmart'),
                'subtitle' => esc_html__('You can choose how much pages user should change before popup will be shown.', 'woodmart'),
                "default"   => 0,
                "min"       => 0,
                "step"      => 1,
                "max"       => 10,
                'display_value' => 'label'
            ),
            array (
                'id'       => 'popup-background',
                'type'     => 'background',
                'title'    => esc_html__('Popup background', 'woodmart'),
                'subtitle' => esc_html__('Set background image or color for promo popup', 'woodmart'),
                'output'   => array('.woodmart-promo-popup'),
                'default'  => array(
                    'background-color' => '#111111',
                    'background-repeat' => 'no-repeat',
                    'background-size' => 'contain',
                    'background-position' => 'left center',
                )
            ),
            array (
                'id'       => 'promo_popup_hide_mobile',
                'type'     => 'switch',
                'title'    => esc_html__('Hide for mobile devices', 'woodmart'),
                'default' => 1
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Widgets', 'woodmart'),
        'id' => 'shop-widgets',
        'subsection' => true,
        'fields' => array (
            array (
                'id'       => 'categories_toggle',
                'type'     => 'switch',
                'title'    => esc_html__('Toggle function for categories widget', 'woodmart'),
                'subtitle' => esc_html__('Turn it on to enable accordion JS for the WooCommerce Product Categories widget. Useful if you have a lot of categories and subcategories.', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'widgets_scroll',
                'type'     => 'switch',
                'title'    => esc_html__('Scroll for filters widgets', 'woodmart'),
                'subtitle' => esc_html__('You can limit your Layered Navigation widgets by height and enable nice scroll for them. Useful if you have a lot of product colors/sizes or other attributes for filters.', 'woodmart'),
                'default' => true
            ),
            array(
                'id'        => 'widget_heights',
                'type'      => 'slider',
                'title'     => esc_html__('Height for filters widgets', 'woodmart'),
                "default"   => 280,
                "min"       => 100,
                "step"      => 1,
                "max"       => 800,
                'display_value' => 'label',
                'required' => array(
                     array('widgets_scroll','equals', true),
                )
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Product labels', 'woodmart'),
        'id' => 'shop-labels',
        'subsection' => true,
        'fields' => array (
            array (
                'id'       => 'label_shape',
                'type'     => 'button_set',
                'title'    => esc_html__('Label shape', 'woodmart'),
                'options'  => array(
                    'rounded' => esc_html__('Rounded', 'woodmart'),
                    'rectangular' => esc_html__('Rectangular', 'woodmart'),
                ),
                'default' => 'rounded'
            ),
            array (
                'id'       => 'percentage_label',
                'type'     => 'switch',
                'title'    => esc_html__('Shop sale label in percentage', 'woodmart'),
                'subtitle' => esc_html__('Works with Simple, Variable and External products only.', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'new_label',
                'type'     => 'switch',
                'title'    => esc_html__('"New" label on products', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'hot_label',
                'type'     => 'switch',
                'title'    => esc_html__('"Hot" label on products', 'woodmart'),
                'subtitle' => esc_html__('Your products marked as "Featured" will have a badge with "Hot" label.', 'woodmart'),
                'default' => true
            )
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Product Page', 'woodmart'),
        'id' => 'product_page',
        'icon' => 'el-icon-tags',
        'fields' => array (
            array (
                'id'   => 'product_layout_info',
                'type' => 'info',
                'style' => 'info',
                'desc' => esc_html__('Product page layout and design options', 'woodmart')
            ),
            array (
                'id'       => 'single_product_layout',
                'type'     => 'image_select',
                'title'    => esc_html__('Single Product Sidebar', 'woodmart'),
                'subtitle' => esc_html__('Select main content and sidebar alignment for single product pages.', 'woodmart'),
                'options'  => array(
                    'full-width'      => array(
                        'alt'   => esc_html__('1 Column', 'woodmart'),
                        'img'   => ReduxFramework::$_url.'assets/img/1col.png'
                    ),
                    'sidebar-left'      => array(
                        'alt'   => esc_html__('2 Column Left', 'woodmart'),
                        'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
                    ),
                    'sidebar-right'      => array(
                        'alt'   => esc_html__('2 Column Right', 'woodmart'),
                        'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
                    ),
                ),
                'default' => 'full-width'
            ),
            array (
                'id'       => 'single_sidebar_width',
                'type'     => 'button_set',
                'title'    => esc_html__('Sidebar size', 'woodmart'),
                'subtitle' => esc_html__('You can set different sizes for your single product pages sidebar', 'woodmart'),
                'options'  => array(
                    2 =>  esc_html__('small', 'woodmart'),
                    3 =>  esc_html__('medium', 'woodmart'),
                    4 =>  esc_html__('large','woodmart')
                ),
                'default' => 3
            ),
            array (
                'id'       => 'single_full_width',
                'type'     => 'switch',
                'title'    => esc_html__('Full width product page', 'woodmart'),
                'default' => false
            ),
            array (
                'id'       => 'product_design',
                'type'     => 'select',
                'title'    => esc_html__('Product page design', 'woodmart'),
                'subtitle' => esc_html__('Choose between different predefined designs', 'woodmart'),
                'options'  => array(
                    'default' => 'Default',
                    'alt' => 'Centered'
                ),
                'default' => 'default'
            ),
            array (
                'id'       => 'product_sticky',
                'type'     => 'switch',
                'title'    => esc_html__('Sticky product', 'woodmart'),
                'default' => false
            ),
            array (
                'id'       => 'product_summary_shadow',
                'type'     => 'switch',
                'title'    => esc_html__('Add shadow to product summary block', 'woodmart'),
                'default' => false
            ),
            array (
                'id'       => 'size_guides',
                'type'     => 'switch',
                'title'    => esc_html__('Size guides', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'single_ajax_add_to_cart',
                'type'     => 'switch',
                'title'    => esc_html__('AJAX Add to cart', 'woodmart'),
                'default' => true
            ),
        ),
    ) );


    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Images', 'woodmart'),
        'id' => 'product_page-images',
        'subsection' => true,
        'fields' => array (
            array (
                'id'       => 'single_product_style',
                'type'     => 'select',
                'title'    => esc_html__('Product image width', 'woodmart'),
                'subtitle' => esc_html__('You can choose different page layout depending on the product image size you need', 'woodmart'),
                'options'  => array(
                    1 => 'Small image',
                    2 => 'Medium',
                    3 => 'Large'
                ),
                'default' => 2,
                'required' => array(
                     array('product_design','not','sticky'),
                )
            ),
            array (
                'id'       => 'thums_position',
                'type'     => 'select',
                'title'    => esc_html__('Thumbnails position', 'woodmart'),
                'subtitle' => esc_html__('Use vertical or horizontal position for thumbnails', 'woodmart'),
                'options'  => array(
                    'left' => esc_html__('Left (vertical position)', 'woodmart'),
                    'bottom' => esc_html__('Bottom (horizontal carousel)', 'woodmart'),
                    'bottom_column' => esc_html__('Bottom (1 column)', 'woodmart'),
                    'bottom_grid' => esc_html__('Bottom (2 columns)', 'woodmart'),
                    'bottom_combined' => esc_html__('Combined grid', 'woodmart'),
                    'without' => esc_html__('Without', 'woodmart'),
                ),
                'default' => 'bottom',
                'required' => array(
                     array('product_design','not','sticky'),
                )
            ),
            array (
                'id'       => 'image_action',
                'type'     => 'button_set',
                'title'    => esc_html__('Main image click action', 'woodmart'), 
                'options'  => array(
                    'zoom' => esc_html__('Zoom', 'woodmart'), 
                    'popup' => esc_html__('Photoswipe popup', 'woodmart'), 
                    'none' => esc_html__('None', 'woodmart'), 
                ),
                'default' => 'zoom',
            ),
            array (
               'id'       => 'product_slider_auto_height',
               'type'     => 'switch',
               'title'    => esc_html__('Main carousel auto height', 'woodmart'), 
               'default' => false
            ),
            array (
                'id'       => 'photoswipe_icon',
                'type'     => 'switch',
                'title'    => esc_html__('Show "Zoom image" icon', 'woodmart'), 
                'subtitle' => esc_html__('Click to open image in popup and swipe to zoom', 'woodmart'),
                'default' => true,
                'required' => array(
                     array('image_action','not','popup'),
                )
            ),
            array (
                'id'       => 'product_images_captions',
                'type'     => 'switch',
                'title'    => esc_html__('Images captions on Photo Swipe lightbox', 'woodmart'),
                'default' => false
            ),
        ),
    ) );


    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Show / hide elements', 'woodmart'),
        'id' => 'product_page-show-hide',
        'subsection' => true,
        'fields' => array (
            array (
                'id'   => 'product_visibility_info',
                'type' => 'info',
                'style' => 'info',
                'desc' => esc_html__('Product page elements visibility', 'woodmart')
            ),
            array (
                'id'       => 'product_short_description',
                'type'     => 'switch',
                'title'    => esc_html__('Short description', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'product_show_meta',
                'type'     => 'button_set',
                'title'    => esc_html__('Show product meta', 'woodmart'),
                'desc' => esc_html__('Categories, tags, SKU', 'woodmart'),
                'options'  => array(
                    'add_to_cart' => esc_html__('After "Add to cart" button', 'woodmart'),
                    'after_tabs' => esc_html__('After tabs', 'woodmart'),
                    'hide' => esc_html__('Hide', 'woodmart'),
                ),
                'default' => 'add_to_cart'
            ),
            array (
                'id'       => 'product_countdown',
                'type'     => 'switch',
                'title'    => esc_html__('Countdown timer', 'woodmart'),
                'subtitle' => esc_html__('Show timer for products that have scheduled date for the sale price', 'woodmart'),
                'default' => false
            ),
            array (
                'id'       => 'upsells_position',
                'type'     => 'button_set',
                'title'    => esc_html__('Upsells products position', 'woodmart'),
                'subtitle' => esc_html__('If use "Sidebar" be sure that you have enabled it for the product page layout', 'woodmart'),
                'options'  => array(
                    'standard' => esc_html__('Standard', 'woodmart'), 
                    'sidebar' => esc_html__('Sidebar', 'woodmart'), 
                ),
                'default' => 'standard'
            ),
            array (
                'id'       => 'products_nav',
                'title'    => esc_html__('Products navigation', 'woodmart'), 
                'type'     => 'switch',
                'default'  => true
            ),
            //Related products
            array (
                'id'       => 'relater_divider',
                'type'     => 'divide',
            ),
            array (
                'id'       => 'related_products',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show related products', 'woodmart' ),
                'default' => true
            ),
            array (
                'id'       => 'related_product_count',
                'type'     => 'text',
                'title'    => esc_html__( 'Related product count', 'woodmart' ), 
                'default'  => 8,
                'required' => array(
                    array( 'related_products', 'equals', true ),
                )
            ),
            array (
                'id'       => 'related_product_columns',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Related product columns', 'woodmart' ),
                'subtitle' => esc_html__( 'How many products you want to show per row', 'woodmart' ),
                'options'  => array(
                    2 => '2',
                    3 => '3',
                    4 => '4',
                    6 => '6'
                ),
                'default' => 4,
                'required' => array(
                    array( 'related_products', 'equals', true ),
                )
            ),
            array (
                'id'       => 'related_product_view',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Related product view', 'woodmart' ),
                'subtitle' => esc_html__( 'You can set different view mode for the related products', 'woodmart' ),
                'options'  => array(
                    'grid' => 'Grid',
                    'slider' => 'Slider',
                ),
                'default' => 'slider',
                'required' => array(
                    array( 'related_products', 'equals', true ),
                )
            )
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Share buttons', 'woodmart'),
        'id' => 'product_page-share',
        'subsection' => true,
        'fields' => array (
            array (
                'id'       => 'product_share',
                'type'     => 'switch',
                'title'    => esc_html__('Show share buttons', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'product_share_type',
                'type'     => 'button_set',
                'title'    => esc_html__('Share buttons type', 'woodmart'),
                'options'  => array(
                    'share' => esc_html__('Share', 'woodmart'),
                    'follow' => esc_html__('Follow', 'woodmart'),
                ),
                'default' => 'share',
                'required' => array(
                     array('product_share','equals', true),
                )
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Tabs', 'woodmart'),
        'id' => 'product_page-tabs',
        'subsection' => true,
        'fields' => array (
            array (
                'id'       => 'product_tabs_layout',
                'type'     => 'button_set',
                'title'    => esc_html__('Tabs layout', 'woodmart'),
                'options'  => array(
                    'tabs' => esc_html__('Tabs', 'woodmart'),
                    'accordion' => esc_html__('Accordion', 'woodmart'),
                ),
                'default' => 'tabs'
            ),
            array (
                'id'       => 'product_tabs_location',
                'type'     => 'button_set',
                'title'    => esc_html__('Tabs location', 'woodmart'),
                'options'  => array(
                    'standard' => esc_html__('Standard', 'woodmart'),
                    'summary' => esc_html__('After "Add to cart" button', 'woodmart'),
                ),
                'default' => 'standard',
                'required' => array(
                     array('product_tabs_layout','equals', array('accordion')),
                )
            ),
            array (
                'id'       => 'reviews_location',
                'type'     => 'button_set',
                'title'    => esc_html__('Reviews location', 'woodmart'),
                'options'  => array(
                    'tabs' => esc_html__('Tabs', 'woodmart'),
                    'separate' => esc_html__('Separate section', 'woodmart'),
                ),
                'default' => 'tabs'
            ),
            array (
                'id'       => 'hide_tabs_titles',
                'title'    => esc_html__('Hide tabs headings', 'woodmart'),
                'type'     => 'switch',
                'default'  => true
            ),
            array (
                'id'       => 'additional_tab_title',
                'type'     => 'text',
                'title'    => esc_html__('Additional tab title', 'woodmart'),
                'subtitle' => esc_html__('Leave empty to disable custom tab', 'woodmart'),
                'default'  => 'Shipping & Delivery'
            ),
            array (
                'id'       => 'additional_tab_text',
                'type'     => 'textarea',
                'title'    => esc_html__('Additional tab content', 'woodmart'),
                'default'  => ''
            ),
        ),
    ) );


    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Login/Register', 'woodmart'),
        'id' => 'social-login',
        'icon' => 'el-icon-group',
        'fields' => array (
            array (
                'id'       => 'login_tabs',
                'type'     => 'switch',
                'title'    => esc_html__('Login page tabs', 'woodmart'),
                'subtitle' => esc_html__('Enable tabs for login and register forms', 'woodmart'),
                'default' => 1
            ),
            array (
                'id'       => 'reg_text',
                'type'     => 'editor',
                'title'    => esc_html__('Registration text', 'woodmart'),
                'subtitle' => esc_html__('Show some information about registration on your web-site', 'woodmart'),
                'default' => 'Registering for this site allows you to access your order status and history. Just fill in the fields below, and we\'ll get a new account set up for you in no time. We will only ask you for information necessary to make the purchase process faster and easier.'
            ),
            array (
                'id'       => 'login_text',
                'type'     => 'editor',
                'title'    => esc_html__('Login text', 'woodmart'),
                'subtitle' => esc_html__('Show some information about login on your web-site', 'woodmart'),
                'default' => ''
            ),
            array (
                'id'       => 'my_account_links',
                'type'     => 'switch',
                'title'    => esc_html__('Dashboard icons menu', 'woodmart'),
                'default' => 1
            ),
            array (
                'id'       => 'my_account_wishlist',
                'type'     => 'switch',
                'title'    => esc_html__('Wishlist on my account page', 'woodmart'),
                'default' => 1
            ),
            array (
                'id'   => 'facebook_info',
                'type' => 'info',
                'style' => 'info',
                'desc' => 'Enable login/register with Facebook on your web-site.
                To do that you need to create an APP on the Facebook <a href="https://developers.facebook.com/" target="_blank">https://developers.facebook.com/</a>.
                Then go to APP settings and copy App ID and App Secret there.'
            ),
            array (
                'id'       => 'fb_app_id',
                'type'     => 'text',
                'title'    => esc_html__('Facebook App ID', 'woodmart'),
                'default' => ''
            ),
            array (
                'id'       => 'fb_app_secret',
                'type'     => 'text',
                'title'    => esc_html__('Facebook App Secret', 'woodmart'),
                'default' => ''
            ),
            array (
                'id'   => 'google_info',
                'type' => 'info',
                'style' => 'info',
                'desc' => 'You can enable login/register with Google on your web-site.
                To do that you need to Create a Google APIs project at <a href="https://code.google.com/apis/console/" target="_blank">https://code.google.com/apis/console/</a>.
                Make sure to go to API Access tab and Create an OAuth 2.0 client ID. Choose Web application for Application type. Make sure that redirect URI is set to actual OAuth 2.0 callback URL, usually http://SITE.COM/my-account/google/oauth2callback'
            ),
            array (
                'id'       => 'goo_app_id',
                'type'     => 'text',
                'title'    => esc_html__('Google App ID', 'woodmart'),
                'default' => ''
            ),
            array (
                'id'       => 'goo_app_secret',
                'type'     => 'text',
                'title'    => esc_html__('Google App Secret', 'woodmart'),
                'default' => ''
            ),
            array (
                'id'   => 'vk_info',
                'type' => 'info',
                'style' => 'info',
                'desc' => 'To enable login/register with vk.com you need to create an APP here <a href="https://vk.com/dev" target="_blank">https://vk.com/dev</a>.
                Then go to APP settings and copy App ID and App Secret there.
                You also need to insert Redirect URI like this example http://YOURSITE.COM/my-account/vkontakte/int_callback'
            ),
            array (
                'id'       => 'vk_app_id',
                'type'     => 'text',
                'title'    => esc_html__('VKontakte App ID', 'woodmart'),
                'default' => ''
            ),
            array (
                'id'       => 'vk_app_secret',
                'type'     => 'text',
                'title'    => esc_html__('VKontakte App Secret', 'woodmart'),
                'default' => ''
            ),
        ),
    ) );


    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Custom CSS', 'woodmart'),
        'id' => 'custom_css',
        'icon' => 'el-icon-css',
        'fields' => array (
            array (
                'id' => 'custom_css',
                'type' => 'ace_editor',
                'mode' => 'css',
                'title' => esc_html__('Global Custom CSS', 'woodmart'),
            ),
            array (
                'id' => 'css_desktop',
                'type' => 'ace_editor',
                'mode' => 'css',
                'title' => esc_html__('Custom CSS for desktop', 'woodmart'),
            ),
            array (
                'id' => 'css_tablet',
                'type' => 'ace_editor',
                'mode' => 'css',
                'title' => esc_html__('Custom CSS for tablet', 'woodmart'),
            ),
            array (
                'id' => 'css_wide_mobile',
                'type' => 'ace_editor',
                'mode' => 'css',
                'title' => esc_html__('Custom CSS for mobile landscape', 'woodmart'),
            ),
            array (
                'id' => 'css_mobile',
                'type' => 'ace_editor',
                'mode' => 'css',
                'title' => esc_html__('Custom CSS for mobile', 'woodmart'),
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Custom JS', 'woodmart'),
        'id' => 'custom_js',
        'icon' => 'el-icon-magic',
        'fields' => array (
            array (
                'id' => 'custom_js',
                'type' => 'ace_editor',
                'mode' => 'javascript',
                'title' => esc_html__('Global Custom JS', 'woodmart'),
            ),
            array (
                'id' => 'js_ready',
                'type' => 'ace_editor',
                'mode' => 'javascript',
                'title' => esc_html__('On document ready', 'woodmart'),
                'desc' => esc_html__('Will be executed on $(document).ready()', 'woodmart')
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Social profiles', 'woodmart'),
        'id' => 'social',
        'icon' => 'el-icon-group',
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Links to social profiles', 'woodmart'),
        'id' => 'social-follow',
        'subsection' => true,
        'fields' => array (
            array (
                'id'   => 'info_follow',
                'type' => 'info',
                'desc' => esc_html__('Configurate your [social_buttons] shortcode. You can leave field empty to remove particular link. Note that there are two types of social buttons. First one is SHARE buttons [social_buttons type="share"]. It displays icons that share your page in social media. And the second one is FOLLOW buttons [social_buttons type="follow"]. Simply displays links to your social profiles. You can configure both types here.', 'woodmart')
            ),
            array (
                'id'       => 'fb_link',
                'type'     => 'text',
                'title'    => esc_html__('Facebook link', 'woodmart'),
                'default' => '#'
            ),
            array (
                'id'       => 'twitter_link',
                'type'     => 'text',
                'title'    => esc_html__('Twitter link', 'woodmart'),
                'default' => '#'
            ),
            array (
                'id'       => 'google_link',
                'type'     => 'text',
                'title'    => esc_html__('Google+', 'woodmart'),
                'default' => '#'
            ),
            array (
                'id'       => 'isntagram_link',
                'type'     => 'text',
                'title'    => esc_html__('Instagram', 'woodmart'),
                'default' => '#'
            ),
            array (
                'id'       => 'pinterest_link',
                'type'     => 'text',
                'title'    => esc_html__('Pinterest link', 'woodmart'),
                'default' => '#'
            ),
            array (
                'id'       => 'youtube_link',
                'type'     => 'text',
                'title'    => esc_html__('Youtube link', 'woodmart'),
                'default' => '#'
            ),
            array (
                'id'       => 'tumblr_link',
                'type'     => 'text',
                'title'    => esc_html__('Tumblr link', 'woodmart'),
                'default' => ''
            ),
            array (
                'id'       => 'linkedin_link',
                'type'     => 'text',
                'title'    => esc_html__('LinkedIn link', 'woodmart'),
                'default' => ''
            ),
            array (
                'id'       => 'vimeo_link',
                'type'     => 'text',
                'title'    => esc_html__('Vimeo link', 'woodmart'),
                'default' => ''
            ),
            array (
                'id'       => 'flickr_link',
                'type'     => 'text',
                'title'    => esc_html__('Flickr link', 'woodmart'),
                'default' => ''
            ),
            array (
                'id'       => 'github_link',
                'type'     => 'text',
                'title'    => esc_html__('Github link', 'woodmart'),
                'default' => ''
            ),
            array (
                'id'       => 'dribbble_link',
                'type'     => 'text',
                'title'    => esc_html__('Dribbble link', 'woodmart'),
                'default' => ''
            ),
            array (
                'id'       => 'behance_link',
                'type'     => 'text',
                'title'    => esc_html__('Behance link', 'woodmart'),
                'default' => ''
            ),
            array (
                'id'       => 'soundcloud_link',
                'type'     => 'text',
                'title'    => esc_html__('SoundCloud link', 'woodmart'),
                'default' => ''
            ),
            array (
                'id'       => 'spotify_link',
                'type'     => 'text',
                'title'    => esc_html__('Spotify link', 'woodmart'),
                'default' => ''
            ),
            array (
                'id'       => 'ok_link',
                'type'     => 'text',
                'title'    => esc_html__('OK link', 'woodmart'),
                'default' => ''
            ),
            array (
                'id'       => 'social_email',
                'type'     => 'switch',
                'default'  => true,
                'title'    => esc_html__('Email for social links', 'woodmart')
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => 'Share buttons',
        'id' => 'social-share',
        'subsection' => true,
        'fields' => array (
            array (
                'id'   => 'info_share',
                'type' => 'info',
                'desc' => esc_html__('Configurate your [social_buttons] shortcode. You can leave field empty to remove particular link. Note that there are two types of social buttons. First one is SHARE buttons [social_buttons type="share"]. It displays icons that share your page in social media. And the second one is FOLLOW buttons [social_buttons type="follow"]. Simply displays links to your social profiles. You can configure both types here.', 'woodmart')
            ),
            array (
                'id'       => 'share_fb',
                'default'  => true,
                'type'     => 'switch',
                'title'    => esc_html__('Share in facebook', 'woodmart')
            ),
            array (
                'id'       => 'share_twitter',
                'default'  => true,
                'type'     => 'switch',
                'title'    => esc_html__('Share in twitter', 'woodmart')
            ),
            array (
                'id'       => 'share_google',
                'type'     => 'switch',
                'default'  => true,
                'title'    => esc_html__('Share in google plus', 'woodmart')
            ),
            array (
                'id'       => 'share_pinterest',
                'type'     => 'switch',
                'default'  => true,
                'title'    => esc_html__('Share in pinterest', 'woodmart')
            ),
            array (
                'id'       => 'share_ok',
                'type'     => 'switch',
                'default'  => false,
                'title'    => esc_html__('Share in OK', 'woodmart')
            ),
            array (
                'id'       => 'share_whatsapp',
                'type'     => 'switch',
                'default'  => false,
                'title'    => esc_html__('Share in whatsapp', 'woodmart')
            ),
            array (
                'id'       => 'share_email',
                'type'     => 'switch',
                'default'  => true,
                'title'    => esc_html__('Email for share links', 'woodmart')
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Performance', 'woodmart'),
        'id' => 'performance',
        'icon' => 'el-icon-cog',
        'fields' => array (
            array (
                'id'       => 'minified_css',
                'type'     => 'switch',
                'title'    => esc_html__('Include minified CSS', 'woodmart'),
                'subtitle' => esc_html__('Minified version of style.css file will be loaded (style.min.css)', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'minified_js',
                'type'     => 'switch',
                'title'    => esc_html__('Include minified JS', 'woodmart'),
                'subtitle' => esc_html__('Minified version of functions.js and device.js file will be loaded', 'woodmart'),
                'default' => true
            ),
            array (
                'id'       => 'combined_js',
                'type'     => 'switch',
                'title'    => esc_html__('Combine JS files', 'woodmart'),
                'subtitle' => esc_html__('Combine all third party libraries and theme functions into one JS file (theme.min.js)', 'woodmart'),
                'default' => false
            ),
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Other', 'woodmart'),
        'id' => 'other',
        'icon' => 'el-icon-cog',
        'fields' => array (
            array (
                'id'       => 'dummy_import',
                'type'     => 'switch',
                'title'    => esc_html__('Show Dummy Content link in admin menu', 'woodmart'),
                'default' => true
            ),
        ),
    ) );


    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Maintenance', 'woodmart'),
        'id' => 'maintenance',
        'icon' => 'el-icon-cog',
        'fields' => array (
            array (
                'id'       => 'maintenance_mode',
                'type'     => 'switch',
                'title'    => esc_html__('Enable maintenance mode', 'woodmart'),
                'subtitle' => esc_html__('This will block non-logged users access to the site.', 'woodmart'),
                'description' => esc_html__('If enabled you need to create maintenance page in Dashboard - Pages - Add new. Choose "Template" to be "Maintenance" in "Page attributes". Or you can import the page from our demo in Dashboard - Dummy Content', 'woodmart'),
                'default' => false
            ),
        ),
    ) );

    // Load extensions
    Redux::setExtensions( $opt_name, get_parent_theme_file_path( WOODMART_3D . '/options/ext/' ) );

    function woodmart_removeDemoModeLink() { // Be sure to rename this function to something more unique
        if ( class_exists('ReduxFrameworkPlugin') ) {
            remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
        }
        if ( class_exists('ReduxFrameworkPlugin') ) {
            remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
        }
    }
    add_action('init', 'woodmart_removeDemoModeLink', 1520);
