var woodmartThemeModule;

(function($) {
    "use strict";

    woodmartThemeModule = (function() {


        var woodmartTheme = {
            popupEffect: 'mfp-move-horizontal',
            supports_html5_storage: false,
            shopLoadMoreBtn: '.woodmart-products-load-more.load-on-scroll',
            bootstrapTooltips: '.woodmart-tooltip, .product-actions-btns > a, .wrapp-buttons .woodmart-buttons > div:not(.woodmart-add-btn) a, .wrapp-buttons .woodmart-buttons .woodmart-add-btn, body:not(.catalog-mode-on) .woodmart-hover-base:not(.product-in-carousel) .woodmart-buttons > div:not(.woodmart-add-btn) a, body:not(.catalog-mode-on) .woodmart-hover-base.hover-width-small:not(.product-in-carousel) .woodmart-add-btn, .woodmart-hover-base .product-compare-button a',
            ajaxLinks: '.woodmart-product-categories a, .widget_product_categories a, .widget_layered_nav_filters a, .filters-area a, body:not(.woocommerce-account) .woocommerce-pagination a, .woodmart-shop-tools a, .woodmart-woocommerce-layered-nav a',
            mainCarouselArg : {
                rtl: $('body').hasClass('rtl'),
                items: 1,
                autoplay: ( woodmart_settings.product_slider_autoplay ),
                autoplayTimeout:3000,
                loop: ( woodmart_settings.product_slider_autoplay ),
                dots: false,
                nav: true,
                autoHeight: ( woodmart_settings.product_slider_auto_height == 'yes' ),
                navText:false,
                onRefreshed: function() {
                    $(window).resize();
                }
            }
        };

        // .quick-view a, .product-grid-item .product-compare-button a, .product-grid-item .yith-wcwl-add-to-wishlist a

        /* Storage Handling */
        try {
            woodmartTheme.supports_html5_storage = ( 'sessionStorage' in window && window.sessionStorage !== null );

            window.sessionStorage.setItem( 'woodmart', 'test' );
            window.sessionStorage.removeItem( 'woodmart' );
        } catch( err ) {
            woodmartTheme.supports_html5_storage = false;
        }

        return {

            init: function() {
                
                this.headerBanner();

                this.fastClicker();

                this.fixedHeaders();

                this.splitNavHeader();

                this.visibleElements();

                this.bannersHover();

                this.portfolioEffects();

                this.parallax();

                this.googleMap();

                this.scrollTop();

                this.quickViewInit();

                this.quickShop();

                this.sidebarMenu();

                this.widgetsHidable();

                this.addToCart();

                this.productImages();

                this.productAccordion();

                this.productImagesGallery();

                this.stickyDetails();

                this.stickyColumn();

                this.mfpPopup();

                this.swatchesVariations();

                this.swatchesOnGrid();

                this.blogMasonry();

                this.blogLoadMore();

                this.productsLoadMore();

                this.productsTabs();

                this.portfolioLoadMore();

                this.equalizeColumns();

                this.menuSetUp();

                this.menuOffsets();

                this.onePageMenu();

                this.mobileNavigation();

                this.simpleDropdown();

                this.wishList();

                this.compare();

                this.promoPopup();

                this.contentPopup();

                this.productVideo();

                this.product360Button();

                this.cookiesPopup();

                this.btnsToolTips();

                this.stickyFooter();

                this.updateWishListNumberInit();

                this.cartWidget();

                this.ajaxFilters();

                this.shopPageInit();

                this.filtersArea();

                this.categoriesMenu();

                this.headerCategoriesMenu();

                this.searchFullScreen();

                this.loginTabs();

                this.countDownTimer();

                this.shopHiddenSidebar();

                this.nanoScroller();

                this.woocommerceNotices();

                this.woocommerceQuantity();

                this.RTL();

                this.woocommerceComments();
                
                this.onRemoveFromCart();

                this.gradientShift();

                this.videoPoster();

                this.initZoom();

                this.woocommerceWrappTable();
                
                this.mobileSearchIcon();

                this.fullScreenMenu();
                
                this.produtLoaderPosition();
                
                this.loginDropdown();
                              
                $(window).resize();

                $('body').addClass('document-ready');

            },
            
            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Header banner
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
             
            headerBanner: function() {
                var banner_version = woodmart_settings.header_banner_version,
                    banner_btn = woodmart_settings.header_banner_close_btn,
                    banner_enabled = woodmart_settings.header_banner_enabled;
                if( $.cookie( 'woodmart_tb_banner_' + banner_version ) == 'closed' || banner_btn == false || banner_enabled == false ) return;
                var banner = $( '.header-banner' );
                
                $( 'body' ).addClass( 'header-banner-display' );
            
                banner.on( 'click', '.close-header-banner', function( e ) {
                    e.preventDefault();
                    closeBanner();
                })

                var closeBanner = function() {
                    $( 'body' ).removeClass( 'header-banner-display' ).addClass( 'header-banner-hide' );
                    $.cookie( 'woodmart_tb_banner_' + banner_version, 'closed', { expires: 60, path: '/' } );
                };

            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Login dropdown
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            loginDropdown : function(){
                $( '.menu-item-register' ).on( 'mouseover', function () {
                    $( this ).addClass( 'opened' );
                } ).on( 'mouseout', function ( event ) {
                    if ( !$( event.target ).is( 'input' ) ) {
                        $( this ).removeClass( 'opened' );
                    }
                } ).on( 'mouseleave', function () {
                    var _this = $( this );
                    setTimeout( function(){
                        _this.removeClass( 'opened' );
                    }, 300 );
                } );
            },
                        
            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Product loder position
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            produtLoaderPosition : function(){
                $( window ).resize( function(){
                    $( '.woodmart-products-loader' ).each(function() {
                        var $loader = $( this ),
                            $loaderWrap = $loader.parent();
                        
                        if ( $loader.length == 0 ) return;
                            
                        $loader.css( 'left', $loaderWrap.offset().left + $loaderWrap.outerWidth() / 2 );
                    } );
                } );
            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Full screen menu
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            fullScreenMenu : function(){
                $( '.full-screen-burger-icon' ).on( 'click', function() {
                    $( 'body' ).toggleClass( 'full-screen-menu-open' );
                });

                $( document ).keyup( function( e ) {
                    if ( e.keyCode === 27 ) $( '.full-screen-close-icon' ).click();
                });

                $( '.full-screen-close-icon' ).on( 'click', function() {
                    $( 'body' ).removeClass( 'full-screen-menu-open' );
                    setTimeout(function(){
                        $( '.full-screen-nav .menu-item-has-children' ).removeClass( 'sub-menu-open' );
                        $( '.full-screen-nav .menu-item-has-children .icon-sub-fs' ).removeClass( 'up-icon' );
                    }, 200)
                });

                $( '.full-screen-nav .menu > .menu-item.menu-item-has-children, .full-screen-nav .menu-item-design-default.menu-item-has-children .menu-item-has-children' ).append( '<span class="icon-sub-fs"></span>' );

                $( '.full-screen-nav' ).on( 'click', '.icon-sub-fs', function(e) {
                    var $icon = $( this ),
                        $parentItem = $icon.parent();

                    e.preventDefault();
                    if ( $parentItem.hasClass( 'sub-menu-open' ) ) {
                        $parentItem.removeClass( 'sub-menu-open' );
                        $icon.removeClass( 'up-icon' );
                    } else {
                        $parentItem.siblings( '.sub-menu-open' ).find( '.icon-sub-fs' ).removeClass( 'up-icon' );
                        $parentItem.siblings( '.sub-menu-open' ).removeClass( 'sub-menu-open' );
                        $parentItem.addClass( 'sub-menu-open' );
                        $icon.addClass( 'up-icon' );
                    }
                });
            },
            
            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * On remove from cart widget
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
             
            onRemoveFromCart : function(){
                $( document ).on('click', '.widget_shopping_cart .remove', function(e) {
                    e.preventDefault();
                    $(this).parent().addClass('removing-process');
                });
            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Mobile search icon 
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            
            mobileSearchIcon : function(){
                var body = $( 'body' );
                $( '.mobile-search-icon.search-button' ).on('click', function(e) {
                    if ( $(window).width() > 1024 ) return;
                    
                    e.preventDefault();
                    if ( !body.hasClass( 'act-mobile-menu' ) ) {
                        body.addClass( 'act-mobile-menu' );
                        $( '.mobile-nav .searchform' ).find('input[type="text"]').focus();
                    }
                });
                
            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Fast Clicker
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
             
            fastClicker : function(){
                if ('addEventListener' in document) {
                    document.addEventListener('DOMContentLoaded', function() {
                        FastClick.attach(document.body);
                    }, false);
                }
            },
            
            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Init Zoom
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            initZoom: function() {
                if ( woodmart_settings.zoom_enable != 'yes' ) return false;

                var $zoomTarget = $( '.woocommerce-product-gallery__image:not(:first)' ),
                    zoomEnabled = false;

                $( $zoomTarget ).each( function( index, target ) {
                    var image = $( target ).find( 'img' );
                    if ( image.data( 'large_image_width' ) > $( '.woocommerce-product-gallery' ).width() ) {
                        zoomEnabled = true;
                        return false;
                    }
                } );

               // But only zoom if the img is larger than its container.
                if ( zoomEnabled ) {
                    var zoomOptions = {
                        touch: false
                    };

                    if ( 'ontouchstart' in window ) {
                        zoomOptions.on = 'click';
                    }

                    $zoomTarget.trigger( 'zoom.destroy' );
                    $zoomTarget.zoom( zoomOptions );
                }
            },
            
            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Video Poster
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            videoPoster: function() {
                $( '.woodmart-video-poster-wrapper' ).on( 'click', function() {
                    var videoWrapper = $( this ),
                        video = videoWrapper.siblings( 'iframe' ),
                        videoScr =  video.attr( 'src' ),
                        videoNewSrc = videoScr + '&autoplay=1';

                    if  ( videoScr.indexOf( 'vimeo.com' ) + 1 ) {
                        videoNewSrc = videoScr + '?autoplay=1';
                    }
                    video.attr( 'src',videoNewSrc );
                    videoWrapper.addClass( 'hidden-poster' );
                })
            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Product Hover
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            productHover : function(){

                $('.woodmart-hover-base').each(function(){

                    var $product = $(this);

                    $product.imagesLoaded(function() {

                        // Read more details button

                        var btnHTML = '<a href="#" class="more-details-btn"><span>' + 'more' + '</a></span>',
                            content = $product.find('.hover-content'),
                            inner = content.find('.hover-content-inner'),
                            contentHeight = content.outerHeight(),
                            innerHeight = inner.outerHeight(),
                            delta = innerHeight - contentHeight;

                        if( content.hasClass( 'more-description' ) ) return;

                        if( delta > 30 ) {
                            content.addClass('more-description');
                            content.append(btnHTML);
                        } else if( delta > 0 ) {
                            content.css( 'height', contentHeight + delta );
                        }

                        // Bottom block height

                        reculc( $product );
                    });

                });

                $('body').on('click', '.more-details-btn', function(e) {
                    e.preventDefault();
                    $(this).parent().addClass('show-full-description');
                        reculc( $(this).parents('.woodmart-hover-base') );
                });

                if( $(window).width() <= 1024 ) {
                    $('.woodmart-hover-base').on('click', function( e ) {
                        var hoverClass = 'state-hover';
                        if( ! $(this).hasClass(hoverClass) ) {
                            e.preventDefault();
                            $('.' + hoverClass ).removeClass(hoverClass);
                            $(this).addClass(hoverClass);
                        }
                    });
                    $(document).on('click touchstart',function(e){
                        if ( $(e.target).closest('.state-hover').length == 0 ) {
                            $('.state-hover').removeClass('state-hover');
                        }
                    });
                }

                var reculc = function( $el ) {

                    if( $el.hasClass('product-in-carousel') ) {
                        return;
                    }

                    var heightHideInfo = $el.find('.fade-in-block').outerHeight();

                    $el.find('.content-product-imagin').css({
                        marginBottom : -heightHideInfo
                    });

                    $el.addClass('hover-ready');
                };

                $('.product-grid-item').each(function() {
                    var $el = $(this),
                        widthHiddenInfo = $el.outerWidth();

                    if($(window).width() <= 1024 && $el.hasClass('woodmart-hover-icons')) return;

                    if( widthHiddenInfo < 255 || $(window).width() <= 1024 ) {
                        $el.removeClass('hover-width-big').addClass('hover-width-small'); 
                    } else {
                        $el.removeClass('hover-width-small').addClass('hover-width-big'); 
                    }
                })

            },  
            
            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Fixed Headers
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            
            fixedHeaders: function(){

                var getHeaderHeight = function(includeMargin) {
                    var headerHeight = header.outerHeight(includeMargin);

                    if( body.hasClass( 'sticky-navigation-only' ) ) {
                        headerHeight = header.find( '.navigation-wrap' ).outerHeight(true);
                    }

                    return headerHeight;
                };

                var headerSpacer = function() {
                    if(stickyHeader.hasClass(headerStickedClass)) return;
                    $('.header-spacing').height(getHeaderHeight(true));
                };

                var body = $("body"),
                    header = $(".main-header"),
                    stickyHeader = header,
                    headerHeight = getHeaderHeight(false),
                    headerStickedClass = "act-scroll",
                    stickyClasses = '',
                    stickyStart = 0,
                    links = header.find('.main-nav .menu>li>a');

                if( ! body.hasClass('enable-sticky-header') || body.hasClass('global-header-vertical') || header.length == 0 ) return;

                var catalog = ( header.find('.vertical-navigation').length ) ? header.find('.vertical-navigation').clone().html() : '',
                    //logo = header.find(".site-logo").clone().html(),
                    //navigation = ( header.find(".main-nav").length ) ? header.find(".main-nav").clone().html() : '',
                    searchExtended = ( header.find('.search-extended').length ) ? header.find(".search-extended").clone().html() : '',
                    rightColumn = ( header.find(".right-column").length ) ? header.find(".right-column").clone().html() : '',
                    //leftSide = header.find(".header-left-side").clone().html(),
                    extraClass = header.data('sticky-class');

                if ( header.hasClass( 'header-categories' ) ) {
                    catalog = ( header.find('.vertical-navigation').length ) ? header.find('.vertical-navigation').clone().html() : '';
                    rightColumn = ( header.find(".secondary-header .right-column").length ) ? header.find(".secondary-header .right-column").clone().html() : '';
                    searchExtended = ( header.find(".secondary-header .search-extended").length ) ? header.find(".secondary-header .search-extended").clone().html() : '';
                }
                
                rightColumn = rightColumn.replace( /id="_wpnonce"/g, 'id="_wpnonce_2"' ).replace( /id="password"/g, 'id="password_2"' ).replace( /id="username"/g, 'id="username_2"' );
                
                var headerClone = [
                    '<div class="sticky-header header-categories header-clone ' + extraClass + '">',
                        '<div class="secondary-header">',
                            '<div class="container">',
                                '<div class="secondary-inner">',
                                    '<div class="vertical-navigation header-categories-nav show-on-hover" role="navigation">' + catalog + '</div>',
                                    //'<div class="header-left-side">' + leftSide + '</div>',
                                    //'<div class="site-logo">' + logo + '</div>',
                                    //'<div class="main-nav site-navigation woodmart-navigation">' + navigation + '</div>',
                                    '<div class="search-extended">' + searchExtended + '</div>',
                                    '<div class="right-column">' + rightColumn + '</div>',
                                '</div>',
                            '</div>',
                        '</div>',
                    '</div>',
                ].join('');
                
                if( $( '.topbar-wrapp' ).length > 0 ) {
                    stickyStart += $( '.topbar-wrapp' ).outerHeight();
                }
                
                if( $( '.header-banner' ).length > 0 ) {
                    if ( body.hasClass( 'header-banner-display' ) ) {
                        stickyStart += $( '.header-banner' ).outerHeight();
                    }
                }
                
                if( body.hasClass( 'sticky-header-real' ) || header.hasClass('header-menu-top') ) {
                    var headerSpace = $('<div/>').addClass('header-spacing');
                    header.before(headerSpace);
                    if( ! header.hasClass('header-menu-top') ) header.addClass('header-sticky-real');

                    $(window).on('resize', headerSpacer);
                    
                    $(window).on("scroll", function(e){
                        if ( body.hasClass( 'header-banner-hide' ) ) {
                            stickyStart = ( $( '.topbar-wrapp' ).length > 0 )? $( '.topbar-wrapp' ).outerHeight() : 0;
                        }
                        if($(this).scrollTop() > stickyStart){
                            stickyHeader.addClass(headerStickedClass);
                        }else {
                            stickyHeader.removeClass(headerStickedClass);
                        }    
                    });

                } else if( body.hasClass( 'sticky-header-clone' ) ) {
                    header.before( headerClone );
                    stickyHeader = $('.sticky-header');
                }

                // Change header height smooth on scroll
                if( body.hasClass( 'woodmart-header-smooth' ) ) {

                    $(window).on("scroll", function(e){
                        var space = ( 120 - $(this).scrollTop() ) / 2;

                        if(space >= 60 ){
                            space = 60;
                        } else if( space <= 30 ) {
                            space = 30;
                        }
                        links.css({
                            paddingTop: space,
                            paddingBottom: space
                        });
                    });

                }

                if(body.hasClass("woodmart-header-overlap") || body.hasClass( 'sticky-navigation-only' )){
                }

                if(!body.hasClass("woodmart-header-overlap") && body.hasClass("sticky-header-clone")){
                    header.attr('class').split(' ').forEach(function(el) {
                        if( el.indexOf('main-header') == -1 && el.indexOf('header-') == -1) {
                            stickyClasses += ' ' + el;
                        }
                    });

                    stickyHeader.addClass(stickyClasses);
                    
                    stickyStart += headerHeight;
                    
                    $(window).on("scroll", function(e){
                        if ( body.hasClass( 'header-banner-hide' ) ) {
                            stickyStart = $( '.topbar-wrapp' ).outerHeight() + headerHeight;
                        }
                        if($(this).scrollTop() > stickyStart){
                            stickyHeader.addClass(headerStickedClass);
                        }else {
                            stickyHeader.removeClass(headerStickedClass);
                        }
                    });
                }

                body.addClass('sticky-header-prepared');
            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Vertical header
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

             verticalHeader: function() {

                var $header = $('.header-vertical').first();

                if( $header.length < 1 ) return;

                var $body, $window, $sidebar, top = false,
                    bottom = false, windowWidth, adminOffset, windowHeight, lastWindowPos = 0,
                    topOffset = 0, bodyHeight, headerHeight, resizeTimer, Y = 0, delta,
                    headerBottom, viewportBottom, scrollStep;

                $body          = $( document.body );
                $window        = $( window );
                adminOffset    = $body.is( '.admin-bar' ) ? $( '#wpadminbar' ).height() : 0;

                $window
                    .on( 'scroll', scroll )
                    .on( 'resize', function() {
                        clearTimeout( resizeTimer );
                        resizeTimer = setTimeout( resizeAndScroll, 500 );
                    } );

                resizeAndScroll();

                for ( var i = 1; i < 6; i++ ) {
                    setTimeout( resizeAndScroll, 100 * i );
                }


                // Sidebar scrolling.
                function resize() {
                    windowWidth = $window.width();

                    if ( 1024 > windowWidth ) {
                        top = bottom = false;
                        $header.removeAttr( 'style' );
                    }
                }

                function scroll() {
                    var windowPos = $window.scrollTop();

                    if ( 1024 > windowWidth ) {
                        return;
                    }

                    headerHeight   = $header.height();
                    headerBottom   = headerHeight + $header.offset().top;
                    windowHeight   = $window.height();
                    bodyHeight     = $body.height();
                    viewportBottom = windowHeight + $window.scrollTop();
                    delta          = headerHeight - windowHeight;
                    scrollStep     = lastWindowPos - windowPos;

                    // If header height larger than window viewport
                    if ( delta > 0 ) {
                        // Scroll down
                        if ( windowPos > lastWindowPos ) {

                            // If bottom overflow

                            if( headerBottom > viewportBottom ) {
                                Y += scrollStep;
                            }

                            if( Y < -delta ) {
                                bottom = true;
                                Y = -delta;
                            }

                            top = false;

                        } else if ( windowPos < lastWindowPos )  { // Scroll up

                            // If top overflow

                            if( $header.offset().top < $window.scrollTop() ) {
                                Y += scrollStep;
                            }

                            if( Y >= 0 ) {
                                top = true;
                                Y = 0;
                            }

                            bottom = false;

                        } else {

                            if( headerBottom < viewportBottom ) {
                                Y = windowHeight - headerHeight;
                            }

                            if( Y >= 0 ) {
                                top = true;
                                Y = 0;
                            }
                        }
                    } else {
                        Y = 0;
                    }

                    // Change header Y coordinate
                    $header.css({
                        top: Y
                    });

                    lastWindowPos = windowPos;
                }

                function resizeAndScroll() {
                    resize();
                    scroll();
                }

             },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Split navigation header
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            splitNavHeader: function() {

                var header = $('.header-split');

                if( header.length <= 0 ) return;

                var navigation = header.find('.main-nav'),
                    navItems = navigation.find('.menu > li'),
                    itemsNumber = navItems.length,
                    rtl = $('body').hasClass('rtl'),
                    midIndex = parseInt( itemsNumber/2 + 0.5 * rtl - .5 ),
                    midItem = navItems.eq( midIndex ),
                    logo = header.find('.site-logo > .woodmart-logo-wrap'),
                    logoWidth,
                    leftWidth = 0,
                    rule = ( ! rtl ) ? 'marginRight' : 'marginLeft',
                    rightWidth = 0;

                var recalc = function() {
                    logoWidth = logo.outerWidth(),
                    leftWidth = 5,
                    rightWidth = 0;

                    for (var i = itemsNumber - 1; i >= 0; i--) {
                        var itemWidth = navItems.eq(i).outerWidth();
                        if( i > midIndex ) {
                            rightWidth += itemWidth;
                        } else {
                            leftWidth += itemWidth;
                        }
                    };

                    var diff = leftWidth - rightWidth;

                    if( rtl ) {
                        if( leftWidth > rightWidth ) {
                            navigation.find('.menu > li:first-child').css('marginRight', -diff);
                        } else {
                            navigation.find('.menu > li:last-child').css('marginLeft', diff + 5);
                        }
                    } else {
                        if( leftWidth > rightWidth ) {
                            navigation.find('.menu > li:last-child').css('marginRight', diff + 5);
                        } else {
                            navigation.find('.menu > li:first-child').css('marginLeft', -diff);
                        }
                    }

                    midItem.css(rule, logoWidth);

                };

                logo.imagesLoaded(function() {
                    recalc();
                    header.addClass('menu-calculated');
                });

                $(window).on('resize', recalc);

            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Counter shortcode method
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            counterShortcode: function(counter) {
                if( counter.attr('data-state') == 'done' || counter.text() != counter.data('final') ) {
                    return;
                }
                counter.prop('Counter',0).animate({
                    Counter: counter.text()
                }, {
                    duration: 3000,
                    easing: 'swing',
                    step: function (now) {
                        if( now >= counter.data('final')) {
                            counter.attr('data-state', 'done');
                        }
                        counter.text(Math.ceil(now));
                    }
                });
            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Activate methods in viewport
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            visibleElements: function() {

                $('.woodmart-counter .counter-value').each(function(){
                    $(this).waypoint(function(){
                        woodmartThemeModule.counterShortcode($(this));
                    }, { offset: '100%' });
                });

            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Banner hover effect with jquery panr
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            bannersHover: function() {
                $(".promo-banner.banner-hover-parallax").panr({
                    sensitivity: 20,
                    scale: false,
                    scaleOnHover: true,
                    scaleTo: 1.15,
                    scaleDuration: .34,
                    panY: true,
                    panX: true,
                    panDuration: 0.5,
                    resetPanOnMouseLeave: true
                });
            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Portfolio hover effects
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            portfolioEffects: function() {
                $(".woodmart-portfolio-holder .portfolio-parallax").panr({
                    sensitivity: 15,
                    scale: false,
                    scaleOnHover: true,
                    scaleTo: 1.12,
                    scaleDuration: 0.45,
                    panY: true,
                    panX: true,
                    panDuration: 1.5,
                    resetPanOnMouseLeave: true
                });
            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * add class in wishlist
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            wishList: function() {
                var body = $("body");

                body.on("click", ".add_to_wishlist", function() {

                    $(this).parent().addClass("feid-in");

                });

            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Compare button
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            compare: function() {
                var body = $("body"),
                    button = $("a.compare");

                body.on("click", "a.compare", function() {
                    $(this).addClass("loading");
                });

                body.on("yith_woocompare_open_popup", function() {
                    button.removeClass("loading");
                    body.addClass("compare-opened");
                });

                body.on('click', '#cboxClose, #cboxOverlay', function() {
                    body.removeClass("compare-opened");
                });

            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Promo popup
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            promoPopup: function() {
                if( woodmart_settings.enable_popup != 'yes' || ( woodmart_settings.promo_popup_hide_mobile == 'yes' && $(window).width() < 768 ) ) return;
                var popup = $( '.woodmart-promo-popup' ),
                    shown = false,
                    pages = $.cookie('woodmart_shown_pages');

                if( ! pages ) pages = 0;

                if( pages < woodmart_settings.popup_pages) {
                    pages++;
                    $.cookie('woodmart_shown_pages', pages, { expires: 7, path: '/' } );
                    return false;
                }

                var showPopup = function() {
                    $.magnificPopup.open({
                        items: {
                            src: '.woodmart-promo-popup'
                        },
                        type: 'inline',       
                        removalDelay: 500, //delay removal by X to allow out-animation
                        callbacks: {
                            beforeOpen: function() {
                                this.st.mainClass = woodmartTheme.popupEffect + ' promo-popup-wrapper';
                            },
                            open: function() {
                            // Will fire when this exact popup is opened
                            // this - is Magnific Popup object
                            },
                            close: function() {
                                $.cookie('woodmart_popup', 'shown', { expires: 7, path: '/' } );
                            }
                            // e.t.c.
                        }
                    });
                };

                if ( $.cookie('woodmart_popup') != 'shown' ) {
                    if( woodmart_settings.popup_event == 'scroll' ) {
                        $(window).scroll(function() {
                            if( shown ) return false;
                            if( $(document).scrollTop() >= woodmart_settings.popup_scroll ) {
                                showPopup();
                                shown = true;
                            }
                        });
                    } else {
                        setTimeout(function() {
                            showPopup();
                        }, woodmart_settings.popup_delay );
                    }
                }

                $('.woodmart-open-newsletter').on('click',function(e){
                    e.preventDefault();
                    showPopup();
                })
            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Content in popup element
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            contentPopup: function() {
                var popup = $( '.woodmart-open-popup' );

                popup.magnificPopup({
                    type: 'inline',      
                    removalDelay: 500, //delay removal by X to allow out-animation
                    callbacks: {
                        beforeOpen: function() {
                            this.st.mainClass = woodmartTheme.popupEffect + ' content-popup-wrapper';
                        },
                    }
                });

            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Product video button
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            productVideo: function() {
                $('.product-video-button a').magnificPopup({
                    type: 'iframe',
                    // removalDelay: 500, //delay removal by X to allow out-animation
                    // callbacks: {
                    //     beforeOpen: function() {
                    //         this.st.mainClass = woodmartTheme.popupEffect;
                    //     }
                    // },
                    preloader: false,
                    fixedContentPos: false
                });
            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Product 360 button
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            product360Button: function() {
                $('.product-360-button a').magnificPopup({
                    type: 'inline',
                    mainClass: 'mfp-fade',
                    // removalDelay: 500, //delay removal by X to allow out-animation
                    // callbacks: {
                    //     beforeOpen: function() {
                    //         this.st.mainClass = woodmartTheme.popupEffect;
                    //     }
                    // },
                    preloader: false,
                    fixedContentPos: false,
                    callbacks: {
                        open: function() {
                            $(window).resize()
                        },
                    },
                });
            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Cookies law
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            cookiesPopup: function() {
                var cookies_version = woodmart_settings.cookies_version;
                if( $.cookie( 'woodmart_cookies_' + cookies_version ) == 'accepted' ) return;
                var popup = $( '.woodmart-cookies-popup' );

                setTimeout(function() {
                    popup.addClass('popup-display');
                    popup.on('click', '.cookies-accept-btn', function(e) {
                        e.preventDefault();
                        acceptCookies();
                    })
                }, 2500 );

                var acceptCookies = function() {
                    popup.removeClass('popup-display').addClass('popup-hide');
                    $.cookie( 'woodmart_cookies_' + cookies_version, 'accepted', { expires: 60, path: '/' } );
                };
            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Google map
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            googleMap: function() {
                var gmap = $(".google-map-container-with-content");

                $(window).resize(function() {
                    gmap.css({
                        'height': gmap.find('.woodmart-google-map.with-content').outerHeight()
                    })
                });

            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * mobile responsive navigation
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            woocommerceWrappTable: function() {

                var wooTable = $(".shop_table:not(.shop_table_responsive):not(.woocommerce-checkout-review-order-table)").wrap("<div class='responsive-table'></div>");
            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Menu preparation
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            menuSetUp: function() {
                var hasChildClass = 'menu-item-has-children',
                    mainMenu = $('.woodmart-navigation').find('ul.menu'),
                    lis = mainMenu.find(' > li'),
                    openedClass = 'item-menu-opened';

                $('.mobile-nav').find('ul.site-mobile-menu').find(' > li').has('.sub-menu-dropdown').addClass(hasChildClass);

                mainMenu.on('click', ' > .item-event-click > a', function(e) {
                    e.preventDefault();
                    if(  ! $(this).parent().hasClass(openedClass) ) {
                        $('.' + openedClass).removeClass(openedClass);
                    }
                    $(this).parent().toggleClass(openedClass);
                });

                $(document).click(function(e) {
                    var target = e.target;
                    if ( $('.' + openedClass).length > 0 && ! $(target).is('.item-event-hover') && ! $(target).parents().is('.item-event-hover') && !$(target).parents().is('.' + openedClass + '')) {
                        mainMenu.find('.' + openedClass + '').removeClass(openedClass);
                        return false;
                    }
                });

                var menuForIPad = function() {
                    if( $(window).width() <= 1024 ) {
                        mainMenu.find(' > .menu-item-has-children.item-event-hover').each(function() {
                            $(this).data('original-event', 'hover').removeClass('item-event-hover').addClass('item-event-click');
                        });
                    } else {
                        mainMenu.find(' > .item-event-click').each(function() {
                            if( $(this).data('original-event') == 'hover' ) {
                                $(this).removeClass('item-event-click').addClass('item-event-hover');
                            }
                        });
                    }
                };

                $(window).on('resize', menuForIPad);
            },
            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Keep navigation dropdowns in the screen
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            menuOffsets: function() {

                var mainMenu = $('.main-nav').find('ul.menu'),
                    lis = mainMenu.find(' > li.menu-item-design-sized, li.menu-item-design-full-width');


                mainMenu.on('hover', ' > li.menu-item-design-sized, li.menu-item-design-full-width', function(e) {
                    setOffset( $(this) );
                });

                var setOffset = function( li ) {

                    var dropdown = li.find(' > .sub-menu-dropdown'),
                        styleID = 'arrow-offset',
                        $header = $('.main-header'),
                        siteWrapper = $('.website-wrapper');

                    dropdown.attr('style', '');

                    var dropdownWidth = dropdown.outerWidth(),
                        dropdownOffset = dropdown.offset(),
                        screenWidth = $(window).width(),
                        bodyRight = siteWrapper.outerWidth() + siteWrapper.offset().left,
                        viewportWidth = ( $('body').hasClass('wrapper-boxed') ) ? bodyRight : screenWidth,
                        extraSpace = ( li.hasClass( 'menu-item-design-full-width' ) ) ? 0 : 10;

                        if( ! dropdownWidth || ! dropdownOffset ) return;
                        
                        var dropdownOffsetRight = screenWidth - dropdownOffset.left - dropdownWidth;
                        
                        if( $('body').hasClass('rtl') && dropdownOffsetRight + dropdownWidth >= viewportWidth && ( li.hasClass( 'menu-item-design-sized' ) || li.hasClass( 'menu-item-design-full-width' ) ) && ! $header.hasClass('header-vertical') ) {
                            // If right point is not in the viewport
                            var toLeft = dropdownOffsetRight + dropdownWidth - viewportWidth;

                            dropdown.css({
                                right: - toLeft - extraSpace
                            }); 

                        } else if( dropdownOffset.left + dropdownWidth >= viewportWidth && ( li.hasClass( 'menu-item-design-sized' ) || li.hasClass( 'menu-item-design-full-width' ) ) && ! $header.hasClass('header-vertical') ) {
                            // If right point is not in the viewport
                            var toRight = dropdownOffset.left + dropdownWidth - viewportWidth;

                            dropdown.css({
                                left: - toRight - extraSpace
                            }); 
                        }
                        
                };

                lis.each(function() {
                    setOffset( $(this) );
                    $(this).addClass('with-offsets');
                });
            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * One page menu
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            onePageMenu: function() {

                var scrollToRow = function(hash) {
                    var row = $('.vc_row#' + hash);

                    if( row.length < 1 ) return;

                    var position = row.offset().top;

                    $('html, body').animate({
                        scrollTop: position - 150
                    }, 800);
                };

                var activeMenuItem = function(hash) {
                    var itemHash;
                    $('.onepage-link').each(function() {
                        itemHash = $(this).find('> a').attr('href').split('#')[1];

                        if( itemHash == hash ) {
                            $('.onepage-link').removeClass('current-menu-item');
                            $(this).addClass('current-menu-item');
                        }

                    });
                };

                $('body').on('click', '.onepage-link > a', function(e) {
                    var $this = $(this),
                        hash = $this.attr('href').split('#')[1];

                    if( $('.vc_row#' + hash).length < 1 ) return;

                    e.preventDefault();

                    scrollToRow(hash);

                    // close mobile menu
                    $('.woodmart-close-side').trigger('click');
                });

                if( $('.onepage-link').length > 0 ) {
                    $('.entry-content > .vc_row').waypoint(function() {
                        var hash = $(this).attr('id');
                        activeMenuItem(hash);
                    }, { offset: 150 });

                    $('.onepage-link').removeClass('current-menu-item');


                    // URL contains hash
                    var locationHash = window.location.hash.split('#')[1];

                    if(window.location.hash.length > 1) {
                        setTimeout(function(){
                            scrollToRow(locationHash);
                        }, 500);
                    }

                }
            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * mobile responsive navigation
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            mobileNavigation: function() {

                var body = $("body"),
                    mobileNav = $(".mobile-nav"),
                    wrapperSite = $(".website-wrapper"),
                    dropDownCat = $(".mobile-nav .site-mobile-menu .menu-item-has-children"),
                    elementIcon = '<span class="icon-sub-menu"></span>',
                    butOpener = $(".icon-sub-menu");

                dropDownCat.append(elementIcon);

                mobileNav.on("click", ".icon-sub-menu", function(e) {
                    e.preventDefault();

                    if ($(this).parent().hasClass("opener-page")) {
                        $(this).parent().removeClass("opener-page").find("> ul").slideUp(200);
                        $(this).parent().removeClass("opener-page").find(".sub-menu-dropdown .container > ul, .sub-menu-dropdown > ul").slideUp(200);
                        $(this).parent().find('> .icon-sub-menu').removeClass("up-icon");
                    } else {
                        $(this).parent().addClass("opener-page").find("> ul").slideDown(200);
                        $(this).parent().addClass("opener-page").find(".sub-menu-dropdown .container > ul, .sub-menu-dropdown > ul").slideDown(200);
                        $(this).parent().find('> .icon-sub-menu').addClass("up-icon");
                    }
                });

                mobileNav.on('click', '.mobile-nav-tabs li', function() {
                    if( $(this).hasClass('active') ) return;
                    var menuName = $(this).data('menu');
                    $(this).parent().find('.active').removeClass('active');
                    $(this).addClass('active');
                    $('.mobile-menu-tab').removeClass('active');
                    $('.mobile-' + menuName + '-menu').addClass('active');
                });


                mobileNav.on('click', '.menu-item-register > a', function( e ) {
                    if( $('.menu-item-register').find('.sub-menu-dropdown').length < 1 ) return;

                    e.preventDefault();
                    
                    $('body').toggleClass('login-form-popup');
                    closeMenu();
                });



                body.on("click", ".close-login-form", function() {

                    $('body').removeClass('login-form-popup');
                    openMenu();

                });

                body.on("click", ".mobile-nav-icon", function() {
                    
                    if (body.hasClass("act-mobile-menu")) {
                        closeMenu();
                    } else {
                        openMenu();
                    }

                });

                body.on("click touchstart", ".woodmart-close-side", function() {
                    closeMenu();
                });

                function openMenu() {
                    body.addClass("act-mobile-menu");
                }

                function closeMenu() {
                    body.removeClass("act-mobile-menu");
                    $( '.mobile-nav .searchform input[type=text]' ).blur();
                }
            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Simple dropdown for category select on search form
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            simpleDropdown: function() {
                $('.input-dropdown-inner').each(function() {
                    var dd = $(this);
                    var btn = dd.find('> a');
                    var input = dd.find('> input');
                    var list = dd.find('> .list-wrapper');
                    
                    inputPadding();
                    
                    $(document).click(function(e) {
                        var target = e.target;
                        if (dd.hasClass('dd-shown') && !$(target).is('.input-dropdown-inner') && !$(target).parents().is('.input-dropdown-inner')) {
                            hideList();
                            return false;
                        }
                    });

                    btn.on('click', function(e) {
                        e.preventDefault();

                        if (dd.hasClass('dd-shown')) {
                            hideList();
                        } else {
                            showList();
                        }
                        return false;
                    });

                    list.on('click', 'a', function(e) {
                        e.preventDefault();
                        var value = $(this).data('val');
                        var label = $(this).text();
                        list.find('.current-item').removeClass('current-item');
                        $(this).parent().addClass('current-item');
                        if (value != 0) {
                            list.find('ul:not(.children) > li:first-child').show();
                        } else if (value == 0) {
                            list.find('ul:not(.children) > li:first-child').hide();
                        }
                        btn.text(label);
                        input.val(value);
                        hideList();
                        inputPadding();
                    });


                    function showList() {
                        dd.addClass('dd-shown');
                        list.slideDown(100);
                        setTimeout(function() {
                            woodmartThemeModule.nanoScroller();
                        }, 300);
                    }

                    function hideList() {
                        dd.removeClass('dd-shown');
                        list.slideUp(100);
                    }
                    
                    function inputPadding() {
                        var paddingValue = dd.innerWidth() + dd.parent().siblings( '.searchsubmit' ).innerWidth() + 17,
                            padding = 'padding-right';
                        if( $( 'body' ).hasClass( 'rtl' ) ) padding = 'padding-left';
                        
                        dd.parent().parent().find( '.s' ).css( padding, paddingValue );
                    }
                });

            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Function to make columns the same height
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            equalizeColumns: function() {

                $.fn.woodmart_equlize = function(options) {

                    var settings = $.extend({
                        child: "",
                    }, options);

                    var that = this;

                    if (settings.child != '') {
                        that = this.find(settings.child);
                    }

                    var resize = function() {

                        var maxHeight = 0;
                        var height;
                        that.each(function() {
                            $(this).attr('style', '');
                            if ($(window).width() > 767 && $(this).outerHeight() > maxHeight)
                                maxHeight = $(this).outerHeight();
                        });

                        that.each(function() {
                            $(this).css({
                                minHeight: maxHeight
                            });
                        });

                    }

                    $(window).bind('resize', function() {
                        resize();
                    });
                    setTimeout(function() {
                        resize();
                    }, 200);
                    setTimeout(function() {
                        resize();
                    }, 500);
                    setTimeout(function() {
                        resize();
                    }, 800);
                }

                $('.equal-columns').each(function() {
                    $(this).woodmart_equlize({
                        child: '> [class*=col-]'
                    });
                });
            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Enable masonry grid for blog
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            blogMasonry: function() {
                if (typeof($.fn.isotope) == 'undefined' || typeof($.fn.imagesLoaded) == 'undefined') return;
                var $container = $('.masonry-container');

                // initialize Masonry after all images have loaded
                $container.imagesLoaded(function() {
                    $container.isotope({
                        gutter: 0,
                        isOriginLeft: ! $('body').hasClass('rtl'),
                        itemSelector: '.blog-design-masonry, .blog-design-mask, .masonry-item'
                    });
                });

                $('.masonry-filter').on('click', 'a', function(e) {
                    e.preventDefault();
                    $('.masonry-filter').find('.filter-active').removeClass('filter-active');
                    $(this).addClass('filter-active');
                    var filterValue = $(this).attr('data-filter');
                    $container.isotope({
                        filter: filterValue
                    });
                });

            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Helper function that make btn click when you scroll page to it
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            clickOnScrollButton: function( btnClass, destroy, offset ) {
                if( typeof $.waypoints != 'function' ) return;
                
                var $btn = $(btnClass );
                if( destroy ) {
                    $btn.waypoint('destroy');
                }

                if( ! offset ) {
                    offset = 0;
                }

                $btn.waypoint(function(){
                    $btn.trigger('click');
                }, { offset: function() {
                    return $(window).outerHeight() + parseInt(offset);                    
                } });
            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Load more button for blog shortcode
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            blogLoadMore: function() {
                var btnClass = '.woodmart-blog-load-more.load-on-scroll',
                    process = false;

                woodmartThemeModule.clickOnScrollButton( btnClass , false, false );

                $('.woodmart-blog-load-more').on('click', function(e) {
                    e.preventDefault();

                    if( process ) return;

                    process = true;

                    var $this = $(this),
                        holder = $this.parent().siblings('.woodmart-blog-holder'),
                        source = holder.data('source'),
                        action = 'woodmart_get_blog_' + source,
                        ajaxurl = woodmart_settings.ajaxurl,
                        dataType = 'json',
                        method = 'POST',
                        atts = holder.data('atts'),
                        paged = holder.data('paged');

                    $this.addClass('loading');

                    var data = {
                        atts: atts, 
                        paged: paged, 
                        action: action
                    };

                    if( source == 'main_loop' ) {
                        ajaxurl = $(this).attr('href');
                        method = 'GET';
                        data = {};
                    }

                    $.ajax({
                        url: ajaxurl,
                        data: data,
                        dataType: dataType,
                        method: method,
                        success: function(data) {

                            var items = $(data.items);

                            if( items ) {
                                if( holder.hasClass('masonry-container') ) {
                                    // initialize Masonry after all images have loaded  
                                    holder.append(items).isotope( 'appended', items );
                                    holder.imagesLoaded().progress(function() {
                                        holder.isotope('layout');
                                        woodmartThemeModule.clickOnScrollButton( btnClass , true, false );
                                    });
                                } else {
                                    holder.append(items);
                                    woodmartThemeModule.clickOnScrollButton( btnClass , true, false );
                                }

                                holder.data('paged', paged + 1);

                                if( source == 'main_loop' ) {
                                    $this.attr('href', data.nextPage);
                                    if( data.status == 'no-more-posts' ) {
                                        $this.hide().remove();
                                    }
                                }
                            }

                            if( data.status == 'no-more-posts' ) {
                                $this.hide();
                            }

                        },
                        error: function(data) {
                            console.log('ajax error');
                        },
                        complete: function() {
                            $this.removeClass('loading');
                            process = false;
                        },
                    });

                });

            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Load more button for products shortcode
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            productsLoadMore: function() {

                var process = false,
                    intervalID;

                $('.woodmart-products-element').each(function() {
                    var $this = $(this),
                        cache = [],
                        inner = $this.find('.woodmart-products-holder');

                    if( ! inner.hasClass('pagination-arrows') ) return;

                    cache[1] = {
                        items: inner.html(),
                        status: 'have-posts'
                    };

                    $this.on('recalc', function() {
                        calc();
                    });

                    $(window).resize(function() {
                        calc();
                    });

                    var calc = function() {
                        var height = inner.outerHeight();
                        $this.stop().css({height: height});
                    };


                    // sticky buttons

                    var body = $('body'),
                        btnWrap = $this.find('.products-footer'),
                        btnLeft = btnWrap.find('.woodmart-products-load-prev'),
                        btnRight = btnWrap.find('.woodmart-products-load-next'),
                        loadWrapp = $this.find('.woodmart-products-loader'),
                        scrollTop,
                        holderTop,
                        btnLeftOffset,
                        btnRightOffset,
                        holderBottom,
                        holderHeight,
                        holderWidth,
                        btnsHeight,
                        offsetArrow = 50,
                        offset,
                        windowWidth;

                    if( body.hasClass('rtl') ) {
                        btnLeft = btnRight;
                        btnRight = btnWrap.find('.woodmart-products-load-prev');
                    }

                    $(window).scroll(function() {
                        buttonsPos();
                    });

                    function buttonsPos() {

                        offset = $(window).height() / 2;

                        windowWidth = $(window).outerWidth(true);

                        holderWidth = $this.outerWidth(true);

                        scrollTop = $(window).scrollTop();

                        holderTop = $this.offset().top - offset;

                        btnLeftOffset = $this.offset().left - offsetArrow;

                        btnRightOffset = btnLeftOffset + holderWidth + offsetArrow;

                        btnsHeight = btnLeft.outerHeight();

                        holderHeight = $this.height() - btnsHeight;

                        holderBottom = holderTop + holderHeight;

                        btnLeft.css({
                            'left' : btnLeftOffset + 'px'
                        });

                        btnRight.css({
                            'left' : btnRightOffset + 'px'
                        });

                        // Right arrow position for vertical header
                        // if( $('.main-header').hasClass('header-vertical') && ! body.hasClass('rtl') ) {
                        //     btnRightOffset -= $('.main-header').outerWidth();
                        // } else if( $('.main-header').hasClass('header-vertical') && body.hasClass('rtl') ) {
                        //     btnRightOffset += $('.main-header').outerWidth();
                        // }

                        btnRight.css({
                            'left' : btnRightOffset + 'px'
                        });

                        if (scrollTop < holderTop || scrollTop > holderBottom) {
                            btnWrap.removeClass('show-arrow');
                            loadWrapp.addClass('hidden-loader');
                        } else {
                            btnWrap.addClass('show-arrow');
                            loadWrapp.removeClass('hidden-loader');
                        }

                    };

                    $this.find('.woodmart-products-load-prev, .woodmart-products-load-next').off('click').on('click', function(e) {

                        e.preventDefault();

                        if( process || $(this).hasClass('disabled') ) return; process = true;

                        clearInterval(intervalID);

                        var $this = $(this),
                            holder = $this.parent().parent().prev(),
                            next = $this.parent().find('.woodmart-products-load-next'),
                            prev = $this.parent().find('.woodmart-products-load-prev'),
                            atts = holder.data('atts'),
                            action = 'woodmart_get_products_shortcode',
                            ajaxurl = woodmart_settings.ajaxurl,
                            dataType = 'json',
                            method = 'POST',
                            paged = holder.attr('data-paged');

                        paged++;

                        if( $this.hasClass('woodmart-products-load-prev') ) {
                            if( paged < 2 ) return;
                            paged = paged - 2;
                        }

                        loadProducts( 'arrows', atts, ajaxurl, action, dataType, method, paged, holder, $this, cache, function(data) {
                            holder.addClass('woodmart-animated-products');

                            if( data.items ) {
                                holder.html(data.items).attr('data-paged', paged);
                                holder.imagesLoaded().progress(function() {
                                    holder.parent().trigger('recalc');
                                });

                                woodmartThemeModule.productHover();
                                woodmartThemeModule.btnsToolTips();
                            }

                            if( $(window).width() < 768 ) {
                                $('html, body').stop().animate({
                                    scrollTop: holder.offset().top - 150
                                }, 400);
                            }

                            var iter = 0;
                            intervalID = setInterval(function() {
                                holder.find('.product-grid-item').eq(iter).addClass('woodmart-animated');
                                iter++;
                            }, 100);

                            if( paged > 1 ) {
                                prev.removeClass('disabled');
                            } else {
                                prev.addClass('disabled');
                            }

                            if( data.status == 'no-more-posts' ) {
                                next.addClass('disabled');
                            } else {
                                next.removeClass('disabled');
                            }
                        });

                    });
                });


                woodmartThemeModule.clickOnScrollButton( woodmartTheme.shopLoadMoreBtn , false, woodmart_settings.infinit_scroll_offset );

                $(document).off('click', '.woodmart-products-load-more').on('click', '.woodmart-products-load-more',  function(e) {
                    e.preventDefault();

                    if( process ) return; process = true;

                    var $this = $(this),
                        holder = $this.parent().siblings('.woodmart-products-holder'),
                        source = holder.data('source'),
                        action = 'woodmart_get_products_' + source,
                        ajaxurl = woodmart_settings.ajaxurl,
                        dataType = 'json',
                        method = 'POST',
                        atts = holder.data('atts'),
                        paged = holder.data('paged');

                    paged++;

                    if( source == 'main_loop' ) {
                        ajaxurl = $(this).attr('href');
                        method = 'GET';
                    }

                    loadProducts( 'load-more', atts, ajaxurl, action, dataType, method, paged, holder, $this, [], function(data) {
                        if( data.items ) {
                            if( holder.hasClass('grid-masonry') ) {
                                isotopeAppend(holder, data.items);
                            } else {
                                holder.append(data.items);
                            }

                            holder.imagesLoaded().progress(function() {
                                woodmartThemeModule.clickOnScrollButton( woodmartTheme.shopLoadMoreBtn , true, woodmart_settings.infinit_scroll_offset );
                            });

                            holder.data('paged', paged);

                            woodmartThemeModule.productHover();
                            woodmartThemeModule.btnsToolTips();
                        }

                        if( source == 'main_loop' ) {
                            $this.attr('href', data.nextPage);
                            if( data.status == 'no-more-posts' ) {
                                $this.hide().remove();
                            }
                        }

                        if( data.status == 'no-more-posts' ) {
                            $this.hide();
                        }
                    });

                });

                var loadProducts = function( btnType, atts, ajaxurl, action, dataType, method, paged, holder, btn, cache, callback) {
                    var data = {
                        atts: atts, 
                        paged: paged, 
                        action: action,
                        woo_ajax: 1
                    };

                    if( cache[paged] ) {
                        holder.addClass('loading');
                        setTimeout(function() {
                            callback(cache[paged]);
                            holder.removeClass('loading');
                            process = false;
                        }, 300);
                        return;
                    }

                    if (btnType == 'arrows') holder.addClass('loading').parent().addClass('element-loading');

                    btn.addClass('loading');

                    if( action == 'woodmart_get_products_main_loop' ) {
                        var loop = holder.find('.product').last().data('loop');
                        data = {
                            loop: loop,
                            woo_ajax: 1
                        };
                    }

                    $.ajax({
                        url: ajaxurl,
                        data: data,
                        dataType: dataType,
                        method: method,
                        success: function(data) {
                            cache[paged] = data;
                            callback( data );
                        },
                        error: function(data) {
                            console.log('ajax error');
                        },
                        complete: function() {
                            if (btnType == 'arrows') holder.removeClass('loading').parent().removeClass('element-loading');
                            btn.removeClass('loading');
                            process = false;
                            woodmartThemeModule.compare();
                            woodmartThemeModule.productHover();
                            woodmartThemeModule.countDownTimer();
                        },
                    });
                };

                var isotopeAppend = function(el, items) {
                    // initialize Masonry after all images have loaded
                    var items = $(items);
                    el.append(items).isotope( 'appended', items );
                    el.imagesLoaded().progress(function() {
                        el.isotope('layout');
                    });
                };

            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Products tabs element AJAX loading
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            productsTabs: function() {


                var process = false;

                $('.woodmart-products-tabs').each(function() {
                    var $this = $(this),
                        $inner = $this.find('.woodmart-tab-content'),
                        cache = [];

                    if( $inner.find('.owl-carousel').length < 1 ) {
                        cache[0] = {
                            html: $inner.html()
                        };
                    }

                    $this.find('.products-tabs-title li').on('click', function(e) {
                        e.preventDefault();

                        var $this = $(this),
                            atts = $this.data('atts'),
                            index = $this.index();

                        if( process || $this.hasClass('active-tab-title') ) return; process = true;

                        loadTab(atts, index, $inner, $this, cache,  function(data) {
                            if( data.html ) {
                                $inner.html(data.html);
                                woodmartThemeModule.productHover();
                                woodmartThemeModule.btnsToolTips();
                                woodmartThemeModule.shopMasonry();
                                woodmartThemeModule.productsLoadMore();
                                woodmartThemeModule.countDownTimer();
                            }
                        });

                    });

                    var $nav = $this.find('.tabs-navigation-wrapper'),
                        $subList = $nav.find('ul'),
                        time = 300;

                    $nav.on('click', '.open-title-menu', function() {
                        var $btn = $(this);

                        if( $subList.hasClass('list-shown') ) {
                            $btn.removeClass('toggle-active');
                            $subList.stop().slideUp(time).removeClass('list-shown');
                        } else {
                            $btn.addClass('toggle-active');
                            $subList.addClass('list-shown');
                            setTimeout(function() {
                                $('body').one('click', function(e) {
                                    var target = e.target;
                                    if ( ! $(target).is('.tabs-navigation-wrapper') && ! $(target).parents().is('.tabs-navigation-wrapper')) {
                                        $btn.removeClass('toggle-active');
                                        $subList.removeClass('list-shown');
                                        return false;
                                    }
                                });
                            },10);
                        }

                    })
                    .on('click', 'li', function() {
                        var $btn = $nav.find('.open-title-menu'),
                            text = $(this).text();

                        if( $subList.hasClass('list-shown') ) {
                            $btn.removeClass('toggle-active').text(text);
                            $subList.removeClass('list-shown');
                        }
                    });

                });

                var loadTab = function(atts, index, holder, btn, cache, callback) {

                    btn.parent().find('.active-tab-title').removeClass('active-tab-title');
                    btn.addClass('active-tab-title')

                    if( cache[index] ) {
                        holder.addClass('loading');
                        setTimeout(function() {
                            callback(cache[index]);
                            holder.removeClass('loading');
                            process = false;
                        }, 300);
                        return;
                    }

                    holder.addClass('loading').parent().addClass('element-loading');

                    btn.addClass('loading');

                    $.ajax({
                        url: woodmart_settings.ajaxurl,
                        data: {
                            atts: atts,
                            action: 'woodmart_get_products_tab_shortcode'
                        },
                        dataType: 'json',
                        method: 'POST',
                        success: function(data) {
                            cache[index] = data;
                            callback( data );
                        },
                        error: function(data) {
                            console.log('ajax error');
                        },
                        complete: function() {
                            holder.removeClass('loading').parent().removeClass('element-loading');
                            btn.removeClass('loading');
                            process = false;
                            woodmartThemeModule.compare();
                        },
                    });
                };


            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Load more button for portfolio shortcode
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            portfolioLoadMore: function() {

                if( typeof $.waypoints != 'function' ) return;

                var waypoint = $('.woodmart-portfolio-load-more.load-on-scroll').waypoint(function(){
                        $('.woodmart-portfolio-load-more.load-on-scroll').trigger('click');
                    }, { offset: '100%' }),
                    process = false;

                $('.woodmart-portfolio-load-more').on('click', function(e) {
                    e.preventDefault();

                    if( process ) return;

                    process = true;

                    var $this = $(this),
                        holder = $this.parent().parent().find('.woodmart-portfolio-holder'),
                        source = holder.data('source'),
                        action = 'woodmart_get_portfolio_' + source,
                        ajaxurl = woodmart_settings.ajaxurl,
                        dataType = 'json',
                        method = 'POST',
                        timeout,
                        atts = holder.data('atts'),
                        paged = holder.data('paged');

                    $this.addClass('loading');

                    var data = {
                        atts: atts,
                        paged: paged,
                        action: action
                    };

                    if( source == 'main_loop' ) {
                        ajaxurl = $(this).attr('href');
                        method = 'GET';
                        data = {};
                    }


                    $.ajax({
                        url: ajaxurl,
                        data: data,
                        dataType: dataType,
                        method: method,
                        success: function(data) {

                            var items = $(data.items);

                            if( items ) {
                                if( holder.hasClass('masonry-container') ) {
                                    // initialize Masonry after all images have loaded
                                    holder.append(items).isotope( 'appended', items );
                                    holder.imagesLoaded().progress(function() {
                                        holder.isotope('layout');

                                        clearTimeout(timeout);

                                        timeout = setTimeout(function() {
                                            $('.woodmart-portfolio-load-more.load-on-scroll').waypoint('destroy');
                                            waypoint = $('.woodmart-portfolio-load-more.load-on-scroll').waypoint(function(){
                                                $('.woodmart-portfolio-load-more.load-on-scroll').trigger('click');
                                            }, { offset: '100%' });
                                        }, 1000);
                                    });
                                } else {
                                    holder.append(items);
                                }

                                holder.data('paged', paged + 1);

                                $this.attr('href', data.nextPage);
                            }

                            woodmartThemeModule.mfpPopup();
                            woodmartThemeModule.portfolioEffects();
                            
                            if( data.status == 'no-more-posts' ) {
                                $this.hide();
                            }

                        },
                        error: function(data) {
                            console.log('ajax error');
                        },
                        complete: function() {
                            $this.removeClass('loading');
                            process = false;
                        },
                    });

                });

            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Enable masonry grid for shop isotope type
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            shopMasonry: function() {
                if (typeof($.fn.isotope) == 'undefined' || typeof($.fn.imagesLoaded) == 'undefined') return;
                var $container = $('.elements-grid.grid-masonry');
                // initialize Masonry after all images have loaded
                $container.imagesLoaded(function() {
                    $container.isotope({
                        isOriginLeft: ! $('body').hasClass('rtl'),
                        itemSelector: '.category-grid-item, .product-grid-item',
                    });
                });

                // Categories masonry
                $(window).resize(function() {
                    var $catsContainer = $('.categories-masonry');
                    var colWidth = ( $catsContainer.hasClass( 'categories-style-masonry' ) )  ? '.category-grid-item' : '.col-md-3.category-grid-item' ;
                    $catsContainer.imagesLoaded(function() {
                        $catsContainer.isotope({
                            resizable: false,
                            isOriginLeft: ! $('body').hasClass('rtl'),
                            layoutMode: 'packery',
                            packery: {
                                gutter: 0,
                                columnWidth: colWidth
                            },
                            itemSelector: '.category-grid-item',
                            // masonry: {
                                // gutter: 0
                            // }
                        });
                    });
                });

            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * MEGA MENU
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            sidebarMenu: function() {
                var heightMegaMenu = $(".widget_nav_mega_menu #menu-categories").height();
                var heightMegaNavigation = $(".categories-menu-dropdown").height();
                var subMenuHeight = $(".widget_nav_mega_menu ul > li.menu-item-design-sized > .sub-menu-dropdown, .widget_nav_mega_menu ul > li.menu-item-design-full-width > .sub-menu-dropdown");
                var megaNavigationHeight = $(".categories-menu-dropdown ul > li.menu-item-design-sized > .sub-menu-dropdown, .categories-menu-dropdown ul > li.menu-item-design-full-width > .sub-menu-dropdown");
                subMenuHeight.css(
                    "min-height", heightMegaMenu + "px"
                );

                megaNavigationHeight.css(
                    "min-height", heightMegaNavigation + "px"
                );
            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Hide widget on title click
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            widgetsHidable: function() {
                
                $(document).on('click', '.widget-hidable .widget-title', function() {
                    var content = $(this).siblings('ul, div, form, label, select');
                    $(this).parent().toggleClass('widget-hidden');
                    content.stop().slideToggle(200);
                });

            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Product thumbnail images & photo swipe gallery
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            productImages: function() {


                // Init photoswipe

                var currentImage,
                    $productGallery = $('.woocommerce-product-gallery'),
                    $mainImages = $('.woocommerce-product-gallery__wrapper'),
                    $thumbs = $productGallery.find('.thumbnails'),
                    currentClass = 'current-image',
                    gallery = $('.photoswipe-images'),
                    PhotoSwipeTrigger = '.woodmart-show-product-gallery',
                    galleryType = 'photo-swipe'; // magnific photo-swipe

                $thumbs.addClass('thumbnails-ready');

                if( $productGallery.hasClass( 'image-action-popup') ) {
                    PhotoSwipeTrigger += ', .woocommerce-product-gallery__image a';
                }

                $productGallery.on('click', '.woocommerce-product-gallery__image a', function(e) {
                    e.preventDefault();
                });

                $productGallery.on('click', PhotoSwipeTrigger, function(e) {
                    e.preventDefault();

                    currentImage = $(this).attr('href');

                    if( galleryType == 'magnific' ) {
                        $.magnificPopup.open({
                            type: 'image',
                            image: {
                                verticalFit: false
                            },
                            items: getProductItems(),
                            gallery: {
                                enabled: true,
                                navigateByImgClick: false
                            },
                        }, 0);
                    }

                    if( galleryType == 'photo-swipe' ) {

                        // build items array
                        var items = getProductItems();

                        callPhotoSwipe( getCurrentGalleryIndex(e), items );

                    }

                });

                $thumbs.on('click', '.image-link', function(e) {
                    e.preventDefault();

                    // if( $thumbs.hasClass('thumbnails-large') ) {
                    //     var index = $(e.currentTarget).index() + 1;
                    //     var items = getProductItems();
                    //     callPhotoSwipe(index, items);
                    //     return;
                    // }

                    // var href = $(this).attr('href'),
                    //     src  = $(this).attr('data-single-image'),
                    //     width = $(this).attr('data-width'),
                    //     height = $(this).attr('data-height'),
                    //     title = $(this).attr('title');

                    // $thumbs.find('.' + currentClass).removeClass(currentClass);
                    // $(this).addClass(currentClass);

                    // if( $mainImages.find('img').attr('src') == src ) return;

                    // $mainImages.addClass('loading-image').attr('href', href).find('img').attr('src', src).attr('srcset', src).one('load', function() {
                    //     $mainImages.removeClass('loading-image').data('width', width).data('height', height).attr('title', title);
                    // });

                });

                gallery.each(function() {
                    var $this = $(this);
                    $this.on('click', 'a', function(e) {
                        e.preventDefault();
                        var index = $(e.currentTarget).data('index') - 1;
                        var items = getGalleryItems($this, []);
                        callPhotoSwipe(index, items);
                    } );
                })

                var callPhotoSwipe = function( index, items ) {
                    var pswpElement = document.querySelectorAll('.pswp')[0];

                    if( $('body').hasClass('rtl') ) {
                        index = items.length - index - 1;
                        items = items.reverse();
                    }

                    // define options (if needed)
                    var options = {
                        // optionName: 'option value'
                        // for example:
                        index: index, // start at first slide
                        shareButtons:[
                            {id:'facebook', label:woodmart_settings.share_fb, url:'https://www.facebook.com/sharer/sharer.php?u={{url}}'},
                            {id:'twitter', label:woodmart_settings.tweet, url:'https://twitter.com/intent/tweet?text={{text}}&url={{url}}'},
                            {id:'pinterest', label:woodmart_settings.pin_it, url:'http://www.pinterest.com/pin/create/button/'+
                                                                '?url={{url}}&media={{image_url}}&description={{text}}'},
                            {id:'download', label:woodmart_settings.download_image, url:'{{raw_image_url}}', download:true}
                        ],
                        // getThumbBoundsFn: function(index) {

                        //     // get window scroll Y
                        //     var pageYScroll = window.pageYOffset || document.documentElement.scrollTop; 
                        //     // optionally get horizontal scroll

                        //     // get position of element relative to viewport
                        //     var rect = $target.offset(); 

                        //     // w = width
                        //     return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};


                        // }
                    };

                    // Initializes and opens PhotoSwipe
                    var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
                    gallery.init();
                };

                var getCurrentGalleryIndex = function( e ) {
                    if( $mainImages.hasClass('owl-carousel') )
                        return $mainImages.find('.owl-item.active').index();
                    else return $(e.currentTarget).parent().parent().index();
                };

                var getProductItems = function() {
                    var items = [];

                    $mainImages.find('figure a img').each(function() {
                        var src = $(this).attr('data-large_image'),
                            width = $(this).attr('data-large_image_width'),
                            height = $(this).attr('data-large_image_height'),
                            caption = $(this).data('caption');

                            items.push({
                                src: src,
                                w: width,
                                h: height,
                                title: ( woodmart_settings.product_images_captions == 'yes' ) ? caption : false
                            });

                    });

                    return items;
                };

                var getGalleryItems = function( $gallery, items ) {
                    var src, width, height, title;

                    $gallery.find('a').each(function() {
                        src = $(this).attr('href');
                        width = $(this).data('width');
                        height = $(this).data('height');
                        title = $(this).attr('title');
                        if( ! isItemInArray(items, src) ) {
                            items.push({
                                src: src,
                                w: width,
                                h: height,
                                title: title
                            });
                        }
                    });

                    return items;
                };

                var isItemInArray = function( items, src ) {
                    var i;
                    for (i = 0; i < items.length; i++) {
                        if (items[i].src == src) {
                            return true;
                        }
                    }

                    return false;
                };

                /* Fix zoom for first item firstly */

                if( $productGallery.hasClass( 'image-action-zoom') ) {
                    var zoom_target   = $( '.woocommerce-product-gallery__image' );
                    var image_to_zoom = zoom_target.find( 'img' );

                    // But only zoom if the img is larger than its container.
                    if ( image_to_zoom.attr( 'width' ) > $( '.woocommerce-product-gallery' ).width() ) {
                        zoom_target.trigger( 'zoom.destroy' );
                        zoom_target.zoom({
                            touch: false
                        });
                    }
                }

            },
            
            productImagesGallery: function() {


                var $mainImages = $('.woocommerce-product-gallery__image:eq(0) img'),
                    $thumbs = $('.images .thumbnails'), // magnific photo-swipe
                    $mainOwl = $('.woocommerce-product-gallery__wrapper');

                if( woodmart_settings.product_gallery.images_slider ) {
                    if ( woodmart_settings.product_slider_auto_height == 'yes' ) {
                        $('.product-images').imagesLoaded(function() {
                            initMainGallery();
                        });
                    }else{
                        initMainGallery();
                    }
                }

                if( woodmart_settings.product_gallery.thumbs_slider.enabled && woodmart_settings.product_gallery.images_slider ) {
                    initThumbnailsMarkup();
                    if( woodmart_settings.product_gallery.thumbs_slider.position == 'left' && jQuery(window).width() > 1024 ) {
                        initThumbnailsVertical();
                    } else {
                        initThumbnailsHorizontal();
                    }
                }


                function initMainGallery() {

                   $('.woocommerce-product-gallery__wrapper').addClass('owl-carousel').owlCarousel(woodmartTheme.mainCarouselArg);

                };

                function initThumbnailsMarkup() {
                    var markup = '';

                    $('.woocommerce-product-gallery__image').each(function() {
                        markup += '<div class="product-image-thumbnail"><img src="' + $(this).data('thumb') + '" /></div>';
                    });

                    $thumbs.append(markup);

                };

                function initThumbnailsVertical() {
                    $thumbs.slick({
                        slidesToShow: woodmart_settings.product_gallery.thumbs_slider.items.vertical_items,
                        slidesToScroll: woodmart_settings.product_gallery.thumbs_slider.items.vertical_items,
                        vertical: true,
                        verticalSwiping: true,
                        infinite: false,
                    });

                    $thumbs.on('click', '.product-image-thumbnail', function(e) {
                        var i = $(this).index();
                        $mainOwl.trigger('to.owl.carousel', i);
                    });

                    $mainOwl.on('changed.owl.carousel', function(e) {
                        var i = e.item.index;
                        $thumbs.slick('slickGoTo', i);
                        $thumbs.find('.active-thumb').removeClass('active-thumb');
                        $thumbs.find('.product-image-thumbnail').eq(i).addClass('active-thumb');
                    });
                    
                    $thumbs.find('.product-image-thumbnail').eq(0).addClass('active-thumb');
                };

                function initThumbnailsHorizontal() {
                    $thumbs.addClass('owl-carousel').owlCarousel({
                        rtl: $('body').hasClass('rtl'),
                        items: woodmart_settings.product_gallery.thumbs_slider.items.desktop,
                        responsive: {
                            979: {
                                items: woodmart_settings.product_gallery.thumbs_slider.items.desktop
                            },
                            768: {
                                items: woodmart_settings.product_gallery.thumbs_slider.items.desktop_small
                            },
                            479: {
                                items: woodmart_settings.product_gallery.thumbs_slider.items.tablet
                            },
                            0: {
                                items: woodmart_settings.product_gallery.thumbs_slider.items.mobile
                            }
                        },
                        dots:false,
                        nav: true,
                        // mouseDrag: false,
                        navText: false,
                    });

                    var $thumbsOwl = $thumbs.owlCarousel();

                    $thumbs.on('click', '.owl-item', function(e) {
                        var i = $(this).index();
                        $thumbsOwl.trigger('to.owl.carousel', i);
                        $mainOwl.trigger('to.owl.carousel', i);
                    });

                    $mainOwl.on('changed.owl.carousel', function(e) {
                        var i = e.item.index;
                        $thumbsOwl.trigger('to.owl.carousel', i);
                        $thumbs.find('.active-thumb').removeClass('active-thumb');
                        $thumbs.find('.product-image-thumbnail').eq(i).addClass('active-thumb');
                    });

                    $thumbs.find('.product-image-thumbnail').eq(0).addClass('active-thumb');
                };

                // Update first thumbnail on variation change

            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Product accordion
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            productAccordion: function() {
                var $accordion = $('.wc-tabs-wrapper');

                var time = 300;

                var hash  = window.location.hash;
                var url   = window.location.href;
            
                if ( hash.toLowerCase().indexOf( 'comment-' ) >= 0 || hash === '#reviews' || hash === '#tab-reviews' ) {
                    $accordion.find('.tab-title-reviews').addClass('active');
                } else if ( url.indexOf( 'comment-page-' ) > 0 || url.indexOf( 'cpage=' ) > 0 ) {
                    $accordion.find('.tab-title-reviews').addClass('active');
                } else {
                    $accordion.find('.woodmart-accordion-title').first().addClass('active');
                }

                $accordion.on('click', '.woodmart-accordion-title', function( e ) {
                    e.preventDefault();
                        
                    var $this = $(this),
                        $panel = $this.siblings('.woocommerce-Tabs-panel');
                        
                    var curentIndex = $this.parent().index();
                    var oldIndex = $this.parent().siblings().find('.active').parent('.woodmart-tab-wrapper').index();
                    
                    if( $this.hasClass('active') ) {
                        oldIndex = curentIndex;
                        $this.removeClass('active');
                        $panel.stop().slideUp(time);
                    } else {
                        $accordion.find('.woodmart-accordion-title').removeClass('active');
                        $accordion.find('.woocommerce-Tabs-panel').slideUp();
                        $this.addClass('active');
                        $panel.stop().slideDown(time);
                    }
                    
                    if ( oldIndex == -1 ) oldIndex = curentIndex;

                    $(window).resize();
                    
                    setTimeout( function() {
                        $(window).resize();
                        if ( $( window ).width() < 1024 && curentIndex > oldIndex ) {
                            $('html, body').animate({
                                scrollTop: $this.offset().top - $this.outerHeight() - $('.sticky-header').outerHeight() - 50
                            }, 500);
                        }   
                    }, time);

                } );
            },
            
            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Sticky details block for special product type
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            stickyDetails: function() {
                if( 
                    ! $('body').hasClass('woodmart-product-sticky-on') 
                    || $( window ).width() <= 1024
                ) return;

                var details = $('.entry-summary');


                details.each(function() {
                    var $column = $(this),
                        offset = 40,
                        $inner = $column.find('.summary-inner'),
                        $images = $column.parent().find('.product-images-inner');

                    if( $('body').hasClass('enable-sticky-header') ) {
                        offset = 150;
                    }

                    $images.imagesLoaded(function() {
                        var diff = $inner.outerHeight() - $images.outerHeight();

                        if( diff < -100 ) {
                            $inner.stick_in_parent({
                                offset_top: offset
                            });
                        } else if( diff > 100 ) {
                            $images.stick_in_parent({
                                offset_top: offset
                            });
                        }

                        $( window ).resize(function() {
                            
                            if ( $( window ).width() <= 1024 ) {
                                $inner.trigger('sticky_kit:detach');
                                $images.trigger('sticky_kit:detach');
                            }else if( $inner.outerHeight() < $images.outerHeight() ) {
                                $inner.stick_in_parent({
                                    offset_top: offset
                                });
                            }else{
                                $images.stick_in_parent({
                                    offset_top: offset
                                });
                            }

                        }); 
                    });

                });

            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Sticky column for portfolio items
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            stickyColumn: function() {
                var details = $('.woodmart-sticky-column');

                details.each(function() {
                    var $column = $(this),
                        offset = 0;

                    if( $('body').hasClass('enable-sticky-header') ) {
                        offset = 150;
                    }

                    $column.find(' > .vc_column-inner > .wpb_wrapper').stick_in_parent({
                        offset_top: offset
                    });
                })

            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Use magnific popup for images
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            mfpPopup: function() {
                
                $('.gallery').magnificPopup({
                    delegate: ' > a',
                    type: 'image',
                    removalDelay: 500, //delay removal by X to allow out-animation
                    callbacks: {
                        beforeOpen: function() {
                            this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                            this.st.mainClass = woodmartTheme.popupEffect;
                        }
                    },
                    image: {
                        verticalFit: true
                    },
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true
                    },
                });

                $('[data-rel="mfp"]').magnificPopup({
                    type: 'image',
                    removalDelay: 500, //delay removal by X to allow out-animation
                    callbacks: {
                        beforeOpen: function() {
                            this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                            this.st.mainClass = woodmartTheme.popupEffect;
                        }
                    },
                    image: {
                        verticalFit: true
                    },
                    gallery: {
                        enabled: false,
                        navigateByImgClick: false
                    },
                });

                $('[data-rel="mfp[projects-gallery]"]').magnificPopup({
                    type: 'image',
                    removalDelay: 500, //delay removal by X to allow out-animation
                    callbacks: {
                        beforeOpen: function() {
                            this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                            this.st.mainClass = woodmartTheme.popupEffect;
                        }
                    },
                    image: {
                        verticalFit: true
                    },
                    gallery: {
                        enabled: true,
                        navigateByImgClick: false
                    },
                });


                $(document).on('click', '.mfp-img', function() {
                    var mfp = jQuery.magnificPopup.instance; // get instance
                    mfp.st.image.verticalFit = !mfp.st.image.verticalFit; // toggle verticalFit on and off
                    mfp.currItem.img.removeAttr('style'); // remove style attribute, to remove max-width if it was applied
                    mfp.updateSize(); // force update of size
                });
            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * WooCommerce adding to cart
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            addToCart: function() {
                var that = this,
                    timeoutNumber = 0;

                that.addToCartAllTypes();

                $('body').bind('added_to_cart', function(event, fragments, cart_hash) {

                    if( woodmart_settings.add_to_cart_action == 'popup' ) {

                        var html = [
                            '<div class="added-to-cart">',
                                '<h4>' + woodmart_settings.added_to_cart + '</h4>',
                                '<a href="#" class="btn btn-style-link btn-color-default close-popup">' + woodmart_settings.continue_shopping + '</a>',
                                '<a href="' + woodmart_settings.cart_url + '" class="btn btn-color-primary view-cart">' + woodmart_settings.view_cart + '</a>',
                            '</div>',
                        ].join("");

                        $.magnificPopup.open({
                            removalDelay: 500, //delay removal by X to allow out-animation
                            callbacks: {
                                beforeOpen: function() {
                                    this.st.mainClass = woodmartTheme.popupEffect + '  cart-popup-wrapper';
                                },
                            },
                            items: {
                                src: '<div class="mfp-with-anim white-popup popup-added_to_cart">' + html + '</div>',
                                type: 'inline'
                            }
                        });

                        $('.white-popup').on('click', '.close-popup', function(e) {
                            e.preventDefault();
                            $.magnificPopup.close();
                        });

                    } else if( woodmart_settings.add_to_cart_action == 'widget' ) {
                        
                        clearTimeout(timeoutNumber);

                        if( $('.cart-widget-opener').length > 0 ) {
                            $('.cart-widget-opener').trigger('click');
                        } else if( $('.act-scroll .woodmart-shopping-cart').length > 0 ) {
                            $('.act-scroll .woodmart-shopping-cart').addClass('display-widget');
                            timeoutNumber = setTimeout(function() {
                                 $('.display-widget').removeClass('display-widget');
                            }, 3500 );
                        } else {
                            $('.main-header .woodmart-shopping-cart').addClass('display-widget');
                            timeoutNumber = setTimeout(function() {
                                 $('.display-widget').removeClass('display-widget');
                            }, 3500 );
                        }
                    }

                    that.btnsToolTips();

                });
            },

            addToCartAllTypes: function() {
                if( woodmart_settings.ajax_add_to_cart == false ) return;
                // AJAX add to cart for all types of products

                $('body').on('submit', 'form.cart', function(e) {
                    e.preventDefault();
        
                    var $form = $(this),
                        $thisbutton = $form.find('.button'),
                        data = $form.serialize();

                    data += '&action=woodmart_ajax_add_to_cart';

                    if( $thisbutton.val() ) {
                        data += '&add-to-cart=' + $thisbutton.val();
                    }

                    $thisbutton.removeClass( 'added not-added' );
                    $thisbutton.addClass( 'loading' );

                    // Trigger event
                    $( document.body ).trigger( 'adding_to_cart', [ $thisbutton, data ] );

                    $.ajax({
                        url: woodmart_settings.ajaxurl,
                        data: data,
                        method: 'POST',
                        success: function(response) {
                            if ( ! response ) {
                                return;
                            }

                            var this_page = window.location.toString();

                            this_page = this_page.replace( 'add-to-cart', 'added-to-cart' );

                            if ( response.error && response.product_url ) {
                                window.location = response.product_url;
                                return;
                            }

                            // Redirect to cart option
                            if ( wc_add_to_cart_params.cart_redirect_after_add === 'yes' ) {

                                window.location = wc_add_to_cart_params.cart_url;
                                return;

                            } else {

                                $thisbutton.removeClass( 'loading' );

                                var fragments = response.fragments;
                                var cart_hash = response.cart_hash;


                                // Block fragments class
                                if ( fragments ) {
                                    $.each( fragments, function( key ) {
                                        $( key ).addClass( 'updating' );
                                    });
                                }

                                // Replace fragments
                                if ( fragments ) {
                                    $.each( fragments, function( key, value ) {
                                        $( key ).replaceWith( value );
                                    });
                                }

                                // Show notices
                                if( response.notices.indexOf( 'error' ) > 0 ) {
                                    $('body').append(response.notices);
                                    $thisbutton.addClass( 'not-added' );
                                } else {
                                    if( woodmart_settings.add_to_cart_action == 'widget' )
                                        $.magnificPopup.close();

                                    // Changes button classes
                                    $thisbutton.addClass( 'added' );
                                    // Trigger event so themes can refresh other areas
                                    $( document.body ).trigger( 'added_to_cart', [ fragments, cart_hash, $thisbutton ] );
                                }

                            }
                        },
                        error: function() {
                            console.log('ajax adding to cart error');
                        },
                        complete: function() {},
                    });

                });

            },

            updateWishListNumberInit: function() {

                if( woodmart_settings.wishlist == 'no' ) return;

                var that = this;

                if ( woodmartTheme.supports_html5_storage ) {

                    try {
                        var wishlistNumber = sessionStorage.getItem( 'woodmart_wishlist_number' ),
                            cookie_hash  = $.cookie( 'woodmart_wishlist_hash');


                        if ( wishlistNumber === null || wishlistNumber === undefined || wishlistNumber === '' ) {
                            wishlistNumber = 0;
                        }

                        if ( cookie_hash === null || cookie_hash === undefined || cookie_hash === '' ) {
                            cookie_hash = 0;
                        }

                        if ( wishlistNumber == cookie_hash ) {
                            this.setWishListNumber(wishlistNumber);
                        } else {
                            throw 'No wishlist number';
                        }

                    } catch( err ) {
                        this.updateWishListNumber();
                    }

                } else {
                    this.updateWishListNumber();
                }

                $('body').bind('added_to_cart added_to_wishlist removed_from_wishlist', function() {
                    that.updateWishListNumber();
                    that.btnsToolTips();
                    that.woocommerceWrappTable();
                });

            },

            updateCartWidgetFromLocalStorage: function() {

                var that = this;

                if ( woodmartTheme.supports_html5_storage ) {

                    try {
                        var wc_fragments = $.parseJSON( sessionStorage.getItem( wc_cart_fragments_params.fragment_name ) );

                        if ( wc_fragments && wc_fragments['div.widget_shopping_cart_content'] ) {

                            $.each( wc_fragments, function( key, value ) {
                                $( key ).replaceWith(value);
                            });

                            $( document.body ).trigger( 'wc_fragments_loaded' );
                        } else {
                            throw 'No fragment';
                        }

                    } catch( err ) {
                        console.log('cant update cart widget');
                    }
                }

            },

            updateWishListNumber: function() {
                var that = this;
                $.ajax({
                    url: woodmart_settings.ajaxurl,
                    data: {
                        action: 'woodmart_wishlist_number'
                    },
                    method: 'get',
                    success: function(data) {
                        that.setWishListNumber(data);
                        if ( woodmartTheme.supports_html5_storage ) {
                            sessionStorage.setItem( 'woodmart_wishlist_number', data );
                        }
                    }
                });
            },

            setWishListNumber: function( num ) {
                num = ($.isNumeric(num)) ? num : 0;
                $('.woodmart-wishlist-info-widget a > span').text(num);
            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Side shopping cart widget
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            cartWidget: function() {
                var widget = $('.cart-widget-opener'),
                    btn = widget.find('a'),
                    body = $('body');

                widget.on('click', function(e) {
                    e.preventDefault();

                    if( isOpened() ) {
                        closeWidget();
                    } else {
                        setTimeout( function() {
                            openWidget();
                        }, 10);
                    }

                });

                body.on("click touchstart", ".woodmart-close-side", function() {
                    if( isOpened() ) {
                        closeWidget();
                    }
                });

                body.on("click", ".widget-close", function( e ) {
                    e.preventDefault();
                    if( isOpened() ) {
                        closeWidget();
                    }
                });
                
                $( document ).keyup( function( e ) {
            		if ( e.keyCode === 27 && isOpened() ) closeWidget();
            	});

                var closeWidget = function() {
                    $('body').removeClass('woodmart-cart-opened');
                };

                var openWidget = function() {
                    if ( isCart() || isCheckout() ) return false;
                    $('body').addClass('woodmart-cart-opened');

                };

                var isOpened = function() {
                    return $('body').hasClass('woodmart-cart-opened');
                };

                var isCart = function() {
                    return $('body').hasClass('woocommerce-cart');
                };
                
                var isCheckout = function() {
                    return $('body').hasClass('woocommerce-checkout');
                };
            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Parallax effect
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            parallax: function() {
                if( $(window).width() <= 1024) return;
                
                $('.parallax-yes').each(function() {
                    var $bgobj = $(this);
                    $(window).scroll(function() {
                        var yPos = -($(window).scrollTop() / $bgobj.data('speed'));
                        var coords = 'center ' + yPos + 'px';
                        $bgobj.css({
                            backgroundPosition: coords
                        });
                    });
                });

                $('.woodmart-parallax').each(function(){
                    var $this = $(this);
                    if($this.hasClass('wpb_column')) {
                        $this.find('> .vc_column-inner').parallax("50%", 0.3);
                    } else {
                        $this.parallax("50%", 0.3);
                    }
                });

            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Scroll top button
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            scrollTop: function() {
                //Check to see if the window is top if not then display button
                $(window).scroll(function() {
                    if ($(this).scrollTop() > 100) {
                        $('.scrollToTop').addClass('button-show');
                    } else {
                        $('.scrollToTop').removeClass('button-show');
                    }
                });

                //Click event to scroll to top
                $('.scrollToTop').click(function() {
                    $('html, body').animate({
                        scrollTop: 0
                    }, 800);
                    return false;
                });
            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Quick View
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            quickViewInit: function() {
                var that = this;
                // Open popup with product info when click on Quick View button
                $(document).on('click', '.open-quick-view', function(e) {

                    e.preventDefault();

                    var productId = $(this).data('id'),
                        loopName = $(this).data('loop-name'),
                        closeText = woodmart_settings.close,
                        loadingText = woodmart_settings.loading,
                        loop = $(this).data('loop'),
                        prev = '',
                        next = '',
                        loopBtns = $('.quick-view').find('[data-loop-name="' + loopName + '"]'),
                        btn = $(this);

                    btn.addClass('loading');

                    if (typeof loopBtns[loop - 1] != 'undefined') {
                        prev = loopBtns.eq(loop - 1).addClass('quick-view-prev');
                        prev = $('<div>').append(prev.clone()).html();
                    }

                    if (typeof loopBtns[loop + 1] != 'undefined') {
                        next = loopBtns.eq(loop + 1).addClass('quick-view-next');
                        next = $('<div>').append(next.clone()).html();
                    }

                    that.quickViewLoad(productId, btn, prev, next, closeText, loadingText);

                });
            },

            quickViewLoad: function(id, btn, prev, next, closeText, loadingText) {
                var data = {
                    id: id,
                    action: "woodmart_quick_view"
                };

                $.ajax({
                    url: woodmart_settings.ajaxurl,
                    data: data,
                    method: 'get',
                    success: function(data) {
                        // Open directly via API
                        $.magnificPopup.open({
                            items: {
                                src: '<div class="mfp-with-anim popup-quick-view">' + data + '</div>', // can be a HTML string, jQuery object, or CSS selector
                                type: 'inline'
                            },
                            tClose: closeText,
                            tLoading: loadingText,
                            removalDelay: 500, //delay removal by X to allow out-animation
                            callbacks: {
                                beforeOpen: function() {
                                    this.st.mainClass = woodmartTheme.popupEffect + ' quick-view-wrapper';
                                },
                                open: function() {
                                    $( '.variations_form' ).each( function() {
                                        $( this ).wc_variation_form().find('.variations select:eq(0)').change();
                                    });
                                    $('.variations_form').trigger('wc_variation_form');
                                    $('body').trigger('woodmart-quick-view-displayed');
                                    woodmartThemeModule.swatchesVariations();

                                    woodmartThemeModule.btnsToolTips();
                                    setTimeout(function() {
                                        woodmartThemeModule.nanoScroller();
                                    }, 300);
                                }
                            },
                        });

                    },
                    complete: function() {
                        btn.removeClass('loading');
                    },
                    error: function() {
                    },
                });
            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Quick Shop
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            quickShop: function() {
                
                var btnSelector = '.quick-shop-on.product-type-variable .add_to_cart_button';


                $(document).on('click', btnSelector, function( e ) {
                    e.preventDefault();

                    var $this = $(this),
                        $product = $this.parents('.product').first(),
                        $content = $product.find('.quick-shop-form'),
                        id = $product.data('id'),
                        loadingClass = 'btn-loading';

                    if( $this.hasClass(loadingClass) ) return;


                    // Simply show quick shop form if it is already loaded with AJAX previously
                    if( $product.hasClass('quick-shop-loaded') ) {
                        $product.addClass('quick-shop-shown');
                        return;
                    }

                    $this.addClass(loadingClass);
                    $product.addClass('loading-quick-shop');

                    $.ajax({
                        url: woodmart_settings.ajaxurl,
                        data: {
                            action: 'woodmart_quick_shop',
                            id: id
                        },
                        method: 'get',
                        success: function(data) {

                            // insert variations form
                            $content.append(data);

                            initVariationForm($product);
                            $('body').trigger('woodmart-quick-view-displayed');
                            woodmartThemeModule.swatchesVariations();
                            woodmartThemeModule.btnsToolTips();

                        },
                        complete: function() {
                            $this.removeClass(loadingClass);
                            $product.removeClass('loading-quick-shop');
                            $product.addClass('quick-shop-shown quick-shop-loaded');
                        },
                        error: function() {
                        },
                    });

                })

                .on('click', '.quick-shop-close', function() {
                    var $this = $(this),
                        $product = $this.parents('.product');

                    $product.removeClass('quick-shop-shown');
                });

                $( document.body ).on( 'added_to_cart', function() {
                    $( '.product' ).removeClass( 'quick-shop-shown' );
                });

                function initVariationForm( $product ) {
                    $product.find( '.variations_form' ).wc_variation_form().find('.variations select:eq(0)').change();
                    $product.find('.variations_form').trigger('wc_variation_form');
                }

            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * ToolTips titles
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            btnsToolTips: function() {

                if ( $(window).width() < 1024 ) return;

                var $tooltips = $('.woodmart-css-tooltip, .product-grid-item:not(.woodmart-hover-base):not(.woodmart-hover-icons) .woodmart-buttons > div a, .woodmart-hover-base.product-in-carousel .woodmart-buttons > div a'),
                    $bootstrapTooltips = $(woodmartTheme.bootstrapTooltips);

                    // .product-grid-item .add_to_cart_button


                $tooltips.each(function() {
                    $(this).find('.woodmart-tooltip-label').remove();
                    $(this).addClass('woodmart-tltp').prepend('<span class="woodmart-tooltip-label">' + $(this).text() +'</span>');
                })

                .off('mouseover.tooltips')

                .on('mouseover.tooltips', function() {
                    var $label = $(this).find('.woodmart-tooltip-label'),
                        width = $label.outerWidth();

                    if ( $('body').hasClass('rtl') ) {
                        $label.css({
                            marginRight: - parseInt( width/2 )
                        })
                    }else{
                        $label.css({
                            marginLeft: - parseInt( width/2 )
                        })
                    }
                });

                // Bootstrap tooltips

                $bootstrapTooltips.tooltip({
                    animation: false,
                    container: 'body',
                    trigger : 'hover',
                    title: function() {
                        if( $(this).find('.added_to_cart').length > 0 ) return $(this).find('.add_to_cart_button').text();
                        return $(this).text();
                    }
                });

            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Sticky footer: margin bottom for main wrapper
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            stickyFooter: function() {

                if( ! $('body').hasClass( 'sticky-footer-on' ) || $(window).width() <= 1024 ) return;

                var $body = $('body'),
                    $footer = $('.footer-container'),
                    $footerContent = $footer.find('.main-footer, .copyrights-wrapper .container'),
                    footerHeight = $footer.outerHeight(),
                    $page = $('.main-page-wrapper'),
                    $doc = $(document),
                    $window = $(window),
                    docHeight = $doc.outerHeight(),
                    windowHeight = $window.outerHeight(),
                    position,
                    bottomSpace,
                    opacity;

                if( $('.woodmart-prefooter').length > 0 ) {
                    $page = $('.woodmart-prefooter');
                }

                var footerOffset = function() {
                    $page.css({
                        marginBottom: $footer.outerHeight()
                    })
                };

                var footerEffect = function() {
                    position        = $doc.scrollTop();
                    docHeight       = $doc.outerHeight();
                    windowHeight    = $window.outerHeight();
                    bottomSpace     = ( docHeight - (position + windowHeight) );
                    footerHeight    = $footer.outerHeight();
                    opacity         = parseFloat( (bottomSpace ) / footerHeight).toFixed(5);

                    // $footer.removeClass('footer-act-sticky').addClass('footer-not-act-sticky');
                    $footer.removeClass('footer-act-sticky');
                    $body.removeClass('footer-act-sticky-global');
                    // If scrolled to footer
                    if( bottomSpace > footerHeight ) return;

                    $footerContent.css({
                        opacity: (1 - opacity)
                    });

                    // $footer.addClass('footer-act-sticky').removeClass('footer-not-act-sticky');
                    $footer.addClass('footer-act-sticky');
                    $body.addClass('footer-act-sticky-global');

                };

                $window.on('resize', footerOffset);
                $window.on('scroll', footerEffect);

                $footer.imagesLoaded(function() {
                    footerOffset();
                });

            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Swatches variations
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            swatchesVariations: function() {

                    var $variation_forms = $('.variations_form');

                    $variation_forms.each(function() {
                        var $variation_form = $(this);

                        if( $variation_form.data('swatches') ) return;
                        $variation_form.data('swatches', true);

                        // If AJX
                        if( ! $variation_form.data('product_variations') ) {
                            $variation_form.find('.swatches-select').find('> div').addClass('swatch-enabled');
                        }

                        $('.woodmart-swatch[selected="selected"]').addClass('active-swatch').attr('selected', false);

                        if ( $( '.swatches-select > div' ).hasClass( 'active-swatch' ) ) {
                            $variation_form.addClass( 'variation-swatch-selected' );
                        }

                        $variation_form.on('click', '.swatches-select > div', function() {
                            var value = $(this).data('value');
                            var id = $(this).parent().data('id');

                            $variation_form.trigger( 'check_variations', [ 'attribute_' + id, true ] );
                            resetSwatches($variation_form);

                            //$variation_form.find('select#' + id).val('').trigger('change');
                            //$variation_form.trigger('check_variations');

                            if ($(this).hasClass('active-swatch')) {
                                // Removed since 2.9 version as not necessary
                                // $variation_form.find( '.variations select' ).val( '' ).change();
                                // $variation_form.trigger( 'reset_data' );
                                // $(this).removeClass('active-swatch')
                                return;
                            }

                            if ($(this).hasClass('swatch-disabled')) return;
                            $variation_form.find('select#' + id).val(value).trigger('change');
                            $(this).parent().find('.active-swatch').removeClass('active-swatch');
                            $(this).addClass('active-swatch');
                            resetSwatches($variation_form);
                        })


                        // On clicking the reset variation button
                        .on( 'click', '.reset_variations', function( event ) {
                            $variation_form.find('.active-swatch').removeClass('active-swatch');
                        } )

                        .on('reset_data', function() {

                            var all_attributes_chosen  = true;
                            var some_attributes_chosen = false;

                            $variation_form.find( '.variations select' ).each( function() {
                                var attribute_name = $( this ).data( 'attribute_name' ) || $( this ).attr( 'name' );
                                var value          = $( this ).val() || '';

                                if ( value.length === 0 ) {
                                    all_attributes_chosen = false;
                                } else {
                                    some_attributes_chosen = true;
                                }

                            });

                            if( all_attributes_chosen ) {
                                $(this).parent().find('.active-swatch').removeClass('active-swatch');
                            }

                            $variation_form.removeClass('variation-swatch-selected');

                            var $mainOwl = $('.woocommerce-product-gallery__wrapper');

                            if( ! $mainOwl.hasClass('owl-carousel') ) return;

                            if ( woodmart_settings.product_slider_auto_height == 'yes' ) {
                                $('.product-images').imagesLoaded(function() {
                                    $mainOwl = $mainOwl.owlCarousel(woodmartTheme.mainCarouselArg);
                                    $mainOwl.trigger('refresh.owl.carousel');
                                });
                            }else{
                                $mainOwl = $mainOwl.owlCarousel(woodmartTheme.mainCarouselArg);
                                $mainOwl.trigger('refresh.owl.carousel');
                            }
                            

                            $mainOwl.trigger('to.owl.carousel', 0);

                            resetSwatches($variation_form);
                        })


                        // Update first tumbnail
                        .on('reset_image', function() {
                            var $thumb = $( '.thumbnails .product-image-thumbnail img' ).first();
                            if ( !isQuickView() ) {
                                $thumb.wc_reset_variation_attr( 'src' );
                            }
                        })
                        .on( 'show_variation', function( e, variation, purchasable) {
                            
                            var $thumb = $('.thumbnails .product-image-thumbnail img').first();

                            $variation_form.addClass('variation-swatch-selected');

                            var image_src = variation.image.src;
                            
                            if ( !image_src ) return;

                            if ( !isQuickView() ) {
                                $thumb.wc_set_variation_attr('src', image_src);
                            }

                            var $mainOwl = $('.woocommerce-product-gallery__wrapper');

                            if( ! $mainOwl.hasClass('owl-carousel') ) return;

                            if ( woodmart_settings.product_slider_auto_height == 'yes' ) {
                                $('.product-images').imagesLoaded(function() {
                                    $mainOwl = $mainOwl.owlCarousel(woodmartTheme.mainCarouselArg);
                                    $mainOwl.trigger('refresh.owl.carousel');
                                });
                            }else{
                                $mainOwl = $mainOwl.owlCarousel(woodmartTheme.mainCarouselArg);
                                $mainOwl.trigger('refresh.owl.carousel');
                            }

                            var $thumbs = $('.images .thumbnails');

                            $mainOwl.trigger('to.owl.carousel', 0);

                            if( $thumbs.hasClass('owl-carousel') ) {
                                $thumbs.owlCarousel().trigger('to.owl.carousel', 0);
                                $thumbs.find('.active-thumb').removeClass('active-thumb');
                                $thumbs.find('.product-image-thumbnail').eq(0).addClass('active-thumb');
                            } else {
                                $thumbs.slick('slickGoTo', 0);
                                if ( !$thumbs.find('.product-image-thumbnail').eq(0).hasClass('active-thumb') ) {
                                    $thumbs.find('.active-thumb').removeClass('active-thumb');
                                    $thumbs.find('.product-image-thumbnail').eq(0).addClass('active-thumb');  
                                }
                            }

                        } );
                    })

                    var resetSwatches = function($variation_form) {

                        // If using AJAX
                        if( ! $variation_form.data('product_variations') ) return;

                        $variation_form.find('.variations select').each(function() {

                            var select = $(this);
                            var swatch = select.parent().find('.swatches-select');
                            var options = select.html();
                            // var options = select.data('attribute_html');
                            options = $(options);

                            swatch.find('> div').removeClass('swatch-enabled').addClass('swatch-disabled');

                            options.each(function(el) {
                                var value = $(this).val();

                                if( $(this).hasClass('enabled') ) {
                                // if( ! el.disabled ) {
                                    swatch.find('div[data-value="' + value + '"]').removeClass('swatch-disabled').addClass('swatch-enabled');
                                } else {
                                    swatch.find('div[data-value="' + value + '"]').addClass('swatch-disabled').removeClass('swatch-enabled');
                                }

                            });

                        });
                    };

                    var isQuickView = function() {
                        return $( '.single-product-content' ).hasClass( 'product-quick-view' );
                    };

            },

            swatchesOnGrid: function() {

                $('body').on('click', '.swatch-on-grid', function() {

                    var src, srcset, image_sizes;

                    var imageSrc = $(this).data('image-src'),
                        imageSrcset = $(this).data('image-srcset'),
                        imageSizes = $(this).data('image-sizes');

                    if( typeof imageSrc == 'undefined' ) return;

                    var product = $(this).parents('.product-grid-item'),
                        image = product.find('img').first(),
                        srcOrig = image.data('original-src'),
                        srcsetOrig = image.data('original-srcset'),
                        sizesOrig = image.data('original-sizes');

                    if( typeof srcOrig == 'undefined' ) {
                        image.data('original-src', image.attr('src'));
                    }

                    if( typeof srcsetOrig == 'undefined' ) {
                        image.data('original-srcset', image.attr('srcset'));
                    }

                    if( typeof sizesOrig == 'undefined' ) {
                        image.data('original-sizes', image.attr('sizes'));
                    }


                    if( $(this).hasClass('current-swatch') ) {
                        src = srcOrig;
                        srcset = srcsetOrig;
                        image_sizes = sizesOrig;
                        $(this).removeClass('current-swatch');
                        product.removeClass('product-swatched');
                    } else {
                        $(this).parent().find('.current-swatch').removeClass('current-swatch');
                        $(this).addClass('current-swatch');
                        product.addClass('product-swatched');
                        src = imageSrc;
                        srcset = imageSrcset;
                        image_sizes = imageSizes;
                    }

                    if( image.attr('src') == src ) return;

                    product.addClass('loading-image');

                    image.attr('src', src).attr('srcset', srcset).attr('image_sizes', image_sizes).one('load', function() {
                        product.removeClass('loading-image');
                    });

                });

            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Ajax filters
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            ajaxFilters: function() {

                if( ! $('body').hasClass('woodmart-ajax-shop-on') ) return;

                var that = this,
                    products = $('.products');

                $('body').on('click', '.products-footer .woocommerce-pagination a', function(e) {
                    var type = true;
                    scrollToTop(type);
                });

                $(document).pjax(woodmartTheme.ajaxLinks, '.main-page-wrapper', {
                    timeout: 5000,
                    scrollTo: false
                });

                if ( woodmart_settings.price_filter_action == 'click' ) {
                    $( document ).on('click', '.widget_price_filter form .button', function() {
                        var form = $( '.widget_price_filter form');
                        $.pjax({
                            container: '.main-page-wrapper',
                            timeout: 4000,
                            url: form.attr('action'),
                            data: form.serialize(),
                            scrollTo: false
                        });

                        return false;
                    });
                }else if ( woodmart_settings.price_filter_action == 'submit' ) {
                    $( document ).on('submit', '.widget_price_filter form', function(event) {
                        var container = $( '.main-page-wrapper' );
                        $.pjax.submit( event, container );
                    });
                }

                $(document).on('pjax:error', function(xhr, textStatus, error, options) {
                    console.log('pjax error ' + error);
                });

                $(document).on('pjax:start', function(xhr, options) {
                    $('body').addClass('woodmart-loading');
                    woodmartThemeModule.hideShopSidebar();
                });

                $(document).on('pjax:complete', function(xhr, textStatus, options) {

                    that.shopPageInit();
                    var type = false;
                    scrollToTop(type);

                    $('body').removeClass('woodmart-loading');

                });

                $(document).on('pjax:end', function(xhr, textStatus, options) {

                    $('body').removeClass('woodmart-loading');

                });

                var scrollToTop = function( type ) {
                    if ( woodmart_settings.ajax_scroll == 'no' && type == false ) return false;
                    
                    var $scrollTo = $(woodmart_settings.ajax_scroll_class),
                        scrollTo = $scrollTo.offset().top - woodmart_settings.ajax_scroll_offset;

                    $('html, body').stop().animate({
                        scrollTop: scrollTo
                    }, 400);
                };
            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * init shop page JS functions
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            shopPageInit: function() {
                this.shopMasonry();
                //this.filtersArea();
                this.ajaxSearch();
                this.productHover();
                this.btnsToolTips();
                this.compare();
                this.filterDropdowns();
                this.sortByWidget();
                this.categoriesMenuBtns();
                this.categoriesAccordion();
                this.woocommercePriceSlider();
                this.updateCartWidgetFromLocalStorage(); // refresh cart in sidebar
                this.countDownTimer();
                this.nanoScroller();
                this.shopLoader();
                
                woodmartThemeModule.clickOnScrollButton( woodmartTheme.shopLoadMoreBtn , false, woodmart_settings.infinit_scroll_offset );

                // Bootstrap tooltips reset

                $('body > .tooltip').remove();
            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Shop loader position
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            shopLoader: function() {
                var loaderClass = '.woodmart-shop-loader',
                    contentClass = '.products',
                    sidebarClass = '.area-sidebar-shop',
                    sidebarLeftClass = 'sidebar-left',
                    hiddenClass = 'hidden-loader',
                    hiddenTopClass = 'hidden-from-top',
                    hiddenBottomClass = 'hidden-from-bottom';

                var loaderVerticalPosition = function() {
                    var $products = $(contentClass),
                        $loader = $products.parent().find(loaderClass);

                    if ( $products.length < 1 ) return;

                    var offset = $(window).height() / 2,
                        scrollTop = $(window).scrollTop(),
                        holderTop = $products.offset().top - offset,
                        holderHeight = $products.height(),
                        holderBottom = holderTop + holderHeight - 130;

                    if (scrollTop < holderTop) {
                        $loader.addClass(hiddenClass + ' ' + hiddenTopClass);
                    } else if( scrollTop > holderBottom ) {
                        $loader.addClass(hiddenClass + ' ' + hiddenBottomClass);
                    } else {
                        $loader.removeClass(hiddenClass + ' ' + hiddenTopClass + ' ' + hiddenBottomClass);
                    }
                };

                var loaderHorizontalPosition = function () {
                    var $products = $(contentClass),
                        $sidebar = $(sidebarClass),
                        $loader = $products.parent().find(loaderClass),
                        sidebarWidth = $sidebar.outerWidth();

                    if ( $products.length < 1 ) return;

                    if( sidebarWidth > 0 && $sidebar.hasClass(sidebarLeftClass) ) {
                        if ( $('body').hasClass('rtl') ) {
                            $loader.css({
                                'marginLeft': - sidebarWidth / 2 - 15
                            })
                        }else{
                            $loader.css({
                                'marginLeft': sidebarWidth / 2 - 15
                            })
                        }
                    } else if( sidebarWidth > 0 ) {
                        if ( $('body').hasClass('rtl') ) {
                            $loader.css({
                                'marginLeft': sidebarWidth / 2 - 15
                            })
                        }else{
                            $loader.css({
                                'marginLeft': - sidebarWidth / 2 - 15
                            })
                        }
                    }

                };

                $(window).off('scroll.loaderVerticalPosition');
                $(window).off('loaderHorizontalPosition');

                $(window).on('scroll.loaderVerticalPosition', loaderVerticalPosition);
                $(window).on('resize.loaderHorizontalPosition', loaderHorizontalPosition);

                loaderVerticalPosition();
                loaderHorizontalPosition();
            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Add filters dropdowns compatibility
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            filterDropdowns: function() {

                $('.woodmart-woocommerce-layered-nav').on('change', 'select', function() {
                    var slug = $( this ).val();

                    var href = $(this).data('filter-url').replace('WOODMART_FILTER_VALUE', slug);

                    $(this).siblings('.filter-pseudo-link').attr('href', href);

                     var event;
                     var pseudoLink = $(this).siblings('.filter-pseudo-link');

                     //This is true only for IE,firefox
                     if(document.createEvent){
                     // To create a mouse event , first we need to create an event and then initialize it.
                        event = document.createEvent("MouseEvent");
                        event.initMouseEvent("click",true,true,window,0,0,0,0,0,false,false,false,false,0,null);
                     }
                     else{
                        event = new MouseEvent('click', {
                            'view': window,
                            'bubbles': true,
                            'cancelable': true
                        });
                     }

                     pseudoLink[0].dispatchEvent(event);
                });
             },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * "Sort by" widget reinit
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            sortByWidget: function() {

                $( '.woocommerce-ordering' ).on( 'change', 'select.orderby', function() {
                    $( this ).closest( 'form' ).find('[name="_pjax"]').remove();
                    $( this ).closest( 'form' ).submit();
                });

                // $( '.woocommerce-ordering' ).off( 'change', 'select.orderby');
                
                // $( '.woocommerce-ordering' ).on( 'change', 'select.orderby', function() {
                //     var $form = $( '.woocommerce-ordering' );
                    
                //     $form.find('[name="_pjax"]').remove();
                    
                //     $.pjax({
                //         container: '.main-page-wrapper', 
                //         timeout: 4000,
                //         data: $form.serialize(),
                //         scrollTo: false
                //     });
                // });
            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Back in history
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            backHistory: function() {
                history.go(-1);

                setTimeout(function(){
                    $('.filters-area').removeClass('filters-opened').stop().hide();
                    $('.open-filters').removeClass('btn-opened');
                    if( $(window).width() <= 1024 ) {
                        $('.woodmart-product-categories').removeClass('categories-opened').stop().hide();
                        $('.woodmart-show-categories').removeClass('button-open');
                    }
                
                    woodmartThemeModule.btnsToolTips();
                    woodmartThemeModule.categoriesAccordion();
                
                }, 20);


            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Categories menu for mobile
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            categoriesMenu: function() {
                if( $(window).width() > 1024 ) return;

                var categories = $('.woodmart-product-categories'),
                    subCategories = categories.find('li > ul'),
                    button = $('.woodmart-show-categories'),
                    time = 200;

                //this.categoriesMenuBtns();

                $('body').on('click','.icon-drop-category', function(){
                    if($(this).closest('.has-sub').find('> ul').hasClass('child-open')){
                        $(this).removeClass("woodmart-act-icon").closest('.has-sub').find('> ul').slideUp(time).removeClass('child-open');
                    }else {
                        $(this).addClass("woodmart-act-icon").closest('.has-sub').find('> ul').slideDown(time).addClass('child-open');
                    }
                }); 

                $('body').on('click', '.woodmart-show-categories', function(e) {
                    e.preventDefault();

                    if( isOpened() ) {
                        closeCats();
                    } else {
                        //setTimeout(function() {
                            openCats();
                        //}, 50);
                    }
                });

                $('body').on('click', '.woodmart-product-categories a', function(e) {
                    closeCats();
                    categories.stop().attr('style', '');
                });

                var isOpened = function() {
                    return $('.woodmart-product-categories').hasClass('categories-opened');
                };

                var openCats = function() {
                    $('.woodmart-product-categories').addClass('categories-opened').stop().slideDown(time);
                    $('.woodmart-show-categories').addClass('button-open');

                };

                var closeCats = function() {
                    $('.woodmart-product-categories').removeClass('categories-opened').stop().slideUp(time);
                    $('.woodmart-show-categories').removeClass('button-open');
                };
            },

            categoriesMenuBtns: function() {
                if( $(window).width() > 1024 ) return;

                var categories = $('.woodmart-product-categories'),
                    subCategories = categories.find('li > ul'),
                    iconDropdown = '<span class="icon-drop-category"></span>';

                categories.addClass('responsive-cateogires');
                subCategories.parent().addClass('has-sub').find('> .category-nav-link').prepend(iconDropdown);
            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Header Categories menu for mobile
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            headerCategoriesMenu: function() {
                if( $(window).width() > 1024 ) return;
                
                var categories = $('.header-categories-nav'),
                    catsUl = categories.find('.categories-menu-dropdown'),
                    subCategories = categories.find('.menu-item-has-children'),
                    button = categories.find('.menu-opener'),
                    time = 200,
                    iconDropdown = '<span class="drop-category"></span>';

                subCategories.find('> a').before(iconDropdown);

                catsUl.on('click','.drop-category', function(){
                    var sublist = $(this).parent().find('> .sub-menu-dropdown, >.sub-sub-menu');
                    if(sublist.hasClass('child-open')){
                        $(this).removeClass("act-icon");
                        sublist.slideUp(time).removeClass('child-open');
                    }else {
                        $(this).addClass("act-icon");
                        sublist.slideDown(time).addClass('child-open');
                    }
                }); 

                categories.on('click', '.menu-opener', function(e) {
                    e.preventDefault();

                    if( isOpened() ) {
                        closeCats();
                    } else {
                        //setTimeout(function() {
                            openCats();
                        //}, 50);
                    }
                });

                catsUl.on('click', 'a', function(e) {
                    closeCats();
                    catsUl.stop().attr('style', '');
                });

                var isOpened = function() {
                    return catsUl.hasClass('categories-opened');
                };

                var openCats = function() {
                    catsUl.addClass('categories-opened').stop().slideDown(time);
                    button.addClass('button-open');
                    
                };

                var closeCats = function() {
                    catsUl.removeClass('categories-opened').stop().slideUp(time);
                    button.removeClass('button-open');
                };

            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Categories toggle accordion
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            categoriesAccordion: function() {
                if( woodmart_settings.categories_toggle == 'no' ) return;

                var $widget = $('.widget_product_categories'),
                    $list = $widget.find('.product-categories'),
                    time = 300;

                $list.find('.cat-parent').each(function() {
                    if( $(this).find(' > .woodmart-cats-toggle').length > 0 ) return;
                    if( $(this).find(' > .children').length == 0 ) return;
                    $(this).append( '<div class="woodmart-cats-toggle"></div>' );
                });

                $list.on('click', '.woodmart-cats-toggle', function() {
                    var $btn = $(this),
                        $subList = $btn.prev();

                    if( $subList.hasClass('list-shown') ) {
                        $btn.removeClass('toggle-active');
                        $subList.stop().slideUp(time).removeClass('list-shown');
                    } else {
                        $subList.parent().parent().find('> li > .list-shown').slideUp().removeClass('list-shown');
                        $subList.parent().parent().find('> li > .toggle-active').removeClass('toggle-active');
                        $btn.addClass('toggle-active');
                        $subList.stop().slideDown(time).addClass('list-shown');
                    }
                });

                if( $list.find('li.current-cat.cat-parent, li.current-cat-parent').length > 0 ) {
                    $list.find('li.current-cat.cat-parent, li.current-cat-parent').find('> .woodmart-cats-toggle').click();
                }

            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * WooCommerce price filter slider with ajax
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */

            woocommercePriceSlider: function() {

                // woocommerce_price_slider_params is required to continue, ensure the object exists
                if ( typeof woocommerce_price_slider_params === 'undefined' || $( '.price_slider_amount #min_price' ).length < 1 || ! $.fn.slider ) {
                    return false;
                }

                if( $( '.price_slider' ).find('.ui-slider-range').length > 0 ) return;

                // Get markup ready for slider
                $( 'input#min_price, input#max_price' ).hide();
                $( '.price_slider, .price_label' ).show();

                // Price slider uses jquery ui
                var min_price = $( '.price_slider_amount #min_price' ).data( 'min' ),
                    max_price = $( '.price_slider_amount #max_price' ).data( 'max' ),
                    current_min_price = parseInt( min_price, 10 ),
                    current_max_price = parseInt( max_price, 10 );

                if ( $('.products').attr('data-min_price') && $('.products').attr('data-min_price').length > 0 ) {
                    current_min_price = parseInt( $('.products').attr('data-min_price'), 10 );
                }
                if ( $('.products').attr('data-max_price') && $('.products').attr('data-max_price').length > 0 ) {
                    current_max_price = parseInt( $('.products').attr('data-max_price'), 10 );
                }

                $( '.price_slider' ).slider({
                    range: true,
                    animate: true,
                    min: min_price,
                    max: max_price,
                    values: [ current_min_price, current_max_price ],
                    create: function() {

                        $( '.price_slider_amount #min_price' ).val( current_min_price );
                        $( '.price_slider_amount #max_price' ).val( current_max_price );

                        $( document.body ).trigger( 'price_slider_create', [ current_min_price, current_max_price ] );
                    },
                    slide: function( event, ui ) {

                        $( 'input#min_price' ).val( ui.values[0] );
                        $( 'input#max_price' ).val( ui.values[1] );

                        $( document.body ).trigger( 'price_slider_slide', [ ui.values[0], ui.values[1] ] );
                    },
                    change: function( event, ui ) {

                        $( document.body ).trigger( 'price_slider_change', [ ui.values[0], ui.values[1] ] );
                    }
                });

                setTimeout(function() {
                    $( document.body ).trigger( 'price_slider_create', [ current_min_price, current_max_price ] );
                }, 10);
            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Filters area
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            filtersArea: function() {
                var filters = $('.filters-area'),
                    btn = $('.open-filters'),
                    time = 200;

                $('body').on('click', '.open-filters', function(e) {
                    e.preventDefault();

                    if( isOpened() ) {
                        closeFilters();
                    } else {
                        openFilters();
                    }

                });

                $('body').on('click', woodmartTheme.ajaxLinks, function() {
                    if( isOpened() ) {
                        closeFilters();
                    }
                });

                var isOpened = function() {
                    filters = $('.filters-area')
                    return filters.hasClass('filters-opened');
                };

                var closeFilters = function() {
                    filters = $('.filters-area')
                    filters.removeClass('filters-opened');
                    filters.stop().slideUp(time);
                    $('.open-filters').removeClass('btn-opened');
                };

                var openFilters = function() {
                    filters = $('.filters-area')
                    filters.stop().slideDown(time);
                    $('.open-filters').addClass('btn-opened');
                    setTimeout(function() {
                        filters.addClass('filters-opened');
                        woodmartThemeModule.nanoScroller();
                    }, time);
                };
            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Ajax Search for products
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            ajaxSearch: function() {

                var url = woodmart_settings.ajaxurl + '?action=woodmart_ajax_search',
                    form = $('form.woodmart-ajax-search'),
                    escapeRegExChars = function (value) {
                        return value.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
                    };

                form.each(function() {
                    var $this = $(this),
                        number = parseInt( $this.data('count') ),
                        thumbnail = parseInt( $this.data('thumbnail') ),
                        product_cat = $this.find('[name="product_cat"]').val(),
                        $results = $this.parent().find('.woodmart-search-results'),
                        postType = $this.data('post-type'),
                        price = parseInt( $this.data('price') );

                    if( number > 0 ) {
                        url += '&number=' + number;
                    }

                    url += '&post_type=' + postType;

                    $results.on('click', '.view-all-products', function() {
                        $this.submit();
                    });

                    /*if(product_cat) {
                        url += '&product_cat=' + product_cat;
                    }*/

                    $this.find('[type="text"]').autocomplete({
                        serviceUrl: url,
                        appendTo: $results,

                        onSelect: function (suggestion) {
                            if( suggestion.permalink.length > 0)
                                window.location.href = suggestion.permalink;
                        },
                        onSearchStart: function (query) {
                            $this.addClass('search-loading');
                        },
                        beforeRender: function (container) {

                            if( container[0].childElementCount > 2 )
                                $(container).append('<div class="view-all-products"><span>' + woodmart_settings.all_results + '</span></div>');

                        },
                        onSearchComplete: function(query, suggestions) {
                            $this.removeClass('search-loading');
                            if( $(window).width() >= 1024 ) {
                                $(".woodmart-scroll").nanoScroller({
                                    paneClass: 'woodmart-scroll-pane',
                                    sliderClass: 'woodmart-scroll-slider',
                                    contentClass: 'woodmart-scroll-content',
                                    preventPageScrolling: true
                                });                 
                            }
               
                        },
                        formatResult: function( suggestion, currentValue ) {
                            if( currentValue == '&' ) currentValue = "&#038;";
                            var pattern = '(' + escapeRegExChars(currentValue) + ')',
                                returnValue = '';

                            if( thumbnail && suggestion.thumbnail ) {
                                returnValue += ' <div class="suggestion-thumb">' + suggestion.thumbnail + '</div>';
                            }
                            
                            returnValue += '<div class="suggestion-title product-title">' + suggestion.value
                                .replace(new RegExp(pattern, 'gi'), '<strong>$1<\/strong>')
                                // .replace(/&/g, '&amp;')
                                .replace(/</g, '&lt;')
                                .replace(/>/g, '&gt;')
                                .replace(/"/g, '&quot;')
                                .replace(/&lt;(\/?strong)&gt;/g, '<$1>') + '</div>';

                            if ( suggestion.no_found ) returnValue = '<div class="suggestion-title no-found-msg">' + suggestion.value + '</div>';

                            if( price && suggestion.price ) {
                                returnValue += ' <div class="suggestion-price price">' + suggestion.price + '</div>';
                            }

                            return returnValue;
                        }
                    });

                    $( 'body' ).click( function() { 
                        $this.find( '[type="text"]' ).autocomplete( 'hide' );
                    } );

                    $( '.woodmart-search-results' ).click( function( e ) { 
                        e.stopPropagation(); 
                    } );

                });

            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Search full screen
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            searchFullScreen: function() {

                var body = $('body'),
                    searchWrapper = $('.woodmart-search-wrapper'),
                    offset = 0;


                body.on('click', '.search-button > a', function(e) {

                    e.preventDefault();
                    
                    if( $('.search-button').hasClass('woodmart-search-dropdown') || $(window).width() < 1024 ) return;

                    if( $('.sticky-header.act-scroll').length > 0 ) {
                        searchWrapper = $('.sticky-header .woodmart-search-wrapper');
                    } else {
                        searchWrapper = $('.main-header .woodmart-search-wrapper');
                    }
                    if( isOpened() ) {
                        closeWidget();
                    } else {
                        setTimeout( function() {
                            openWidget();
                        }, 10);
                    }
                })


                body.on("click", ".woodmart-close-search, .main-header, .sticky-header, .topbar-wrapp, .main-page-wrapper, .header-banner", function(event) {

                    if ( ! $(event.target).is('.woodmart-close-search') && $(event.target).closest(".woodmart-search-wrapper").length ) return;

                    if( isOpened() ) {
                        closeWidget();
                    }
                });


                var closeByEsc = function( e ) {
                    if (e.keyCode === 27) {
                        closeWidget();
                        body.unbind('keyup', closeByEsc);
                    }
                };


                var closeWidget = function() {
                    $('body').removeClass('woodmart-search-opened');
                    searchWrapper.removeClass('search-overlap');
                };

                var openWidget = function() {
                    var bar = $('#wpadminbar').outerHeight();

                    var offset = $('.main-header').outerHeight() + bar;

                    if( ! $('.main-header').hasClass('act-scroll') ) {
                        offset += $('.topbar-wrapp').outerHeight();
                        if ( $('body').hasClass( 'header-banner-display' ) ) {
                            offset += $('.header-banner').outerHeight();
                        }
                    }

                    if( $('.sticky-header').hasClass('header-clone') && $('.sticky-header').hasClass('act-scroll') ) {
                        offset = $('.sticky-header').outerHeight() + bar;
                    }

                    if( $('.main-header').hasClass('header-menu-top') && $('.header-spacing') ) {
                        offset = $('.header-spacing').outerHeight() + bar;
                    }


                    searchWrapper.css('top', offset);
                        
                    // Close by esc
                    body.bind('keyup', closeByEsc);

                    $('body').addClass('woodmart-search-opened');
                    searchWrapper.addClass('search-overlap');
                    setTimeout(function() {
                        searchWrapper.find('input[type="text"]').focus();
                        $(window).one('scroll', function() {
                            if( isOpened() ) {
                                closeWidget();
                            }
                        });
                    }, 300);
                };

                var isOpened = function() {
                    return $('body').hasClass('woodmart-search-opened');
                };
            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Login tabs for my account page
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            loginTabs: function() {
                var tabs = $('.woodmart-register-tabs'),
                    btn = tabs.find('.woodmart-switch-to-register'),
                    title = $('.col-register-text h2'),
                    login = tabs.find('.col-login'),
                    loginText = tabs.find('.login-info'),
                    register = tabs.find('.col-register'),
                    classOpened = 'active-register',
                    loginLabel = btn.data('login'),
                    registerLabel = btn.data('register');

                btn.click(function(e) {
                    e.preventDefault();

                    if( isShown() ) {
                        hideRegister();
                    } else {
                        showRegister();
                    }

                    var scrollTo = $('.main-page-wrapper').offset().top - 100;

                    if( $(window).width() < 768 ) {
                        $('html, body').stop().animate({
                            scrollTop: tabs.offset().top - 90
                        }, 400);
                    }
                });

                var showRegister = function() {
                    tabs.addClass(classOpened);
                    btn.text(loginLabel);
                    if ( loginText.length > 0 ) {
                        title.text(registerLabel);
                    }
                };

                var hideRegister = function() {
                    tabs.removeClass(classOpened);
                    btn.text(registerLabel);
                    if ( loginText.length > 0 ) {
                        title.text(loginLabel);
                    }
                };

                var isShown = function() {
                    return tabs.hasClass(classOpened);
                };
            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Sale final date countdown
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            countDownTimer: function() {

                $( '.woodmart-timer' ).each(function(){
                    var time = moment.tz( $(this).data('end-date'), $(this).data('timezone') );
                    $( this ).countdown( time.toDate(), function( event ) {
                        $( this ).html( event.strftime(''
                            + '<span class="countdown-days">%-D <span>' + woodmart_settings.countdown_days + '</span></span> '
                            + '<span class="countdown-hours">%H <span>' + woodmart_settings.countdown_hours + '</span></span> '
                            + '<span class="countdown-min">%M <span>' + woodmart_settings.countdown_mins + '</span></span> '
                            + '<span class="countdown-sec">%S <span>' + woodmart_settings.countdown_sec + '</span></span>'));
                    });
                });

            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Hidden sidebar button
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            shopHiddenSidebar: function() {

                $('body').on('click', '.woodmart-show-sidebar-btn', function() {
                    if( $('.sidebar-container').hasClass('show-hidden-sidebar') ) {
                        woodmartThemeModule.hideShopSidebar();
                    } else {
                        showSidebar();
                    }
                });

                $('body').on("click touchstart", ".woodmart-close-side, .woodmart-close-sidebar-btn", function() {
                    woodmartThemeModule.hideShopSidebar();
                });

                var showSidebar = function() {
                    $('.sidebar-container').addClass('show-hidden-sidebar');
                    $('body').addClass('woodmart-show-hidden-sidebar');
                    $('.woodmart-show-sidebar-btn').addClass('btn-clicked');

                    if( $(window).width() >= 1024 ) {
                        $(".sidebar-inner.woodmart-sidebar-scroll").nanoScroller({
                            paneClass: 'woodmart-scroll-pane',
                            sliderClass: 'woodmart-scroll-slider',
                            contentClass: 'woodmart-sidebar-content',
                            preventPageScrolling: false
                        }); 
                    }
                };
            },

            hideShopSidebar: function() {
                $('.woodmart-show-sidebar-btn').removeClass('btn-clicked');
                $('.sidebar-container').removeClass('show-hidden-sidebar');
                $('body').removeClass('woodmart-show-hidden-sidebar');
                $(".sidebar-inner.woodmart-scroll").nanoScroller({ destroy: true });
            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Init nanoscroller
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            nanoScroller: function() {

                if( $(window).width() < 1024 ) return;

                $(".woodmart-scroll").nanoScroller({
                    paneClass: 'woodmart-scroll-pane',
                    sliderClass: 'woodmart-scroll-slider',
                    contentClass: 'woodmart-scroll-content',
                    preventPageScrolling: false
                });

                $( 'body' ).bind( 'wc_fragments_refreshed wc_fragments_loaded added_to_cart', function() {
                    $(".widget_shopping_cart .woodmart-scroll").nanoScroller({
                        paneClass: 'woodmart-scroll-pane',
                        sliderClass: 'woodmart-scroll-slider',
                        contentClass: 'woodmart-scroll-content',
                        preventPageScrolling: false
                    });
                } );
            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * WooCommerce pretty notices
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            woocommerceNotices: function() {
                var notices = '.woocommerce-error, .woocommerce-info, .woocommerce-message, div.wpcf7-response-output, #yith-wcwl-popup-message, .mc4wp-alert, .dokan-store-contact .alert-success, .yith_ywraq_add_item_product_message';

                $('body').on('click', notices, function() {
                    var $msg = $(this);
                    hideMessage( $msg );
                });

                var showAllMessages = function() {
                    $notices.addClass('shown-notice');
                };

                var hideAllMessages = function() {
                    hideMessage( $notices );
                };

                var hideMessage = function( $msg ) {
                    $msg.removeClass('shown-notice').addClass('hidden-notice');
                };
            },


            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Quantityt +/-
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            woocommerceQuantity: function() {
                if ( ! String.prototype.getDecimals ) {
                    String.prototype.getDecimals = function() {
                        var num = this,
                            match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                        if ( ! match ) {
                            return 0;
                        }
                        return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
                    }
                }
                
                $( document ).on( 'click', '.plus, .minus', function() {
                    // Get values
                    var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
                        currentVal  = parseFloat( $qty.val() ),
                        max         = parseFloat( $qty.attr( 'max' ) ),
                        min         = parseFloat( $qty.attr( 'min' ) ),
                        step        = $qty.attr( 'step' );

                    // Format values
                    if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
                    if ( max === '' || max === 'NaN' ) max = '';
                    if ( min === '' || min === 'NaN' ) min = 0;
                    if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

                    // Change the value
                    if ( $( this ).is( '.plus' ) ) {
                        if ( max && ( currentVal >= max ) ) {
                            $qty.val( max );
                        } else {
                            $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
                        }
                    } else {
                        if ( min && ( currentVal <= min ) ) {
                            $qty.val( min );
                        } else if ( currentVal > 0 ) {
                            $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
                        }
                    }

                    // Trigger change event
                    $qty.trigger( 'change' );
                });

            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Fix RTL issues
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            RTL: function() {
                if( ! $('body').hasClass('rtl') ) return;

                $(document).on("vc-full-width-row", function(event, el) {
                    var $rows = $( '[data-vc-full-width="true"]' );
                    $rows.each(function() {
                        var $this = $(this),
                            $elFull = $this.next('.vc_row-full-width'),
                            elMarginRight = parseInt($this.css('margin-right'), 10),
                            windowWidth = $(window).width(),
                            offset = windowWidth - $elFull.offset().left - $elFull.width() - - elMarginRight;

                        $this.css({
                            left: offset
                        });

                        if( $('.main-header').hasClass('header-vertical') ) {
                            var paddingLeft = $this.css('padding-left'),
                                paddingRight = $this.css('padding-right');

                            $this.css({
                                paddingLeft: paddingRight,
                                paddingRight: paddingLeft
                            });

                        }
                    });
                })
            },

            /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * Fix comments
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            woocommerceComments: function() {
                var hash  = window.location.hash;
                var url   = window.location.href;

                if ( hash.toLowerCase().indexOf( 'comment-' ) >= 0 || hash === '#reviews' || hash === '#tab-reviews' || url.indexOf( 'comment-page-' ) > 0 || url.indexOf( 'cpage=' ) > 0 ) {

                    setTimeout(function() {
                        window.scrollTo(0, 0);
                    }, 1);

                    setTimeout(function() {
                        $('html, body').stop().animate({
                            scrollTop: $(hash).offset().top-100
                        }, 400);
                    }, 10);

                }
            },

             /**
             *-------------------------------------------------------------------------------------------------------------------------------------------
             * WoodMart gradient
             *-------------------------------------------------------------------------------------------------------------------------------------------
             */
            gradientShift: function() {
                $( '.woodmart_gradient' ).each( function() {
                    var selector = $( this );
                    var parent = selector.prev();
                    parent.css( 'position','relative' );
                    parent.prepend( selector );
                });
            },
        }
    }());

})(jQuery);


jQuery(document).ready(function() {

    woodmartThemeModule.init();

});