<?php
/**
 * The template for displaying product search form
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 2.5.0
 */
$ajax_args = apply_filters( 'woodmart_ajax_search_args', array( 'count' => 15 ) );
woodmart_header_block_search_extended( false, true, true, $ajax_args, true ); ?>