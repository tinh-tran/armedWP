=== YITH WooCommerce Multi-step Checkout Premium ===

Contributors: yithemes
Tags: woocommerce, multi-step checkout, yit, yith, yithemes
Requires at least: 4.0
Tested up to: 4.7
Stable tag: 1.3.11
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Changelog ==

= 1.3.12 =

* Added: Support to WooCommerce Points ad Rewards
* Fixed: Vertical style doesn't works with WooCommerce points and rewards plugin
* Fixed: yith_wcms_use_cookie hook doesn't works

= 1.3.11 =

* Added: Support to WordPress 4.7
* Fixed: Unable to deactivate free version

= 1.3.10 =

* Added: Support to The Retailer theme
* Added: Support to Storefront theme
* Added: Payment section header
* Added: German language 21% (only frontend) by Rolf
* Fixed: Removed duplicate alt class in next/prev button

= 1.3.9 =

* Added: Supporto to Avada 5
* Added: Support to WooCommerce SecureSubmit Payment Gateway plugin
* Added: Support to WooCommerce CurabillCw Payment Gateway plugin
* Added: Support to WooCommerce PostFinanceCw Payment Gateway plugin
* Added: Support to WooCommerce BarclaycardCw Payment Gateway plugin
* Added: Option to change the label for next button in login step
* Tweak: Prevent duplicate payments id in for-checkout php DOM
* Fixed: Missing $checkout object in woocommerce_before_checkout_shipping_form action
* Fixed: Empty Shipping tab
* Fixed: Empty Order review and Payment tab on Avada 5.0.3

= 1.3.8 =

* Added: Option to set fadeIn/fadeOut transition
* Tweak: Add support to deprecated method WC()->cart->get_checkout_url()
* Tweak: Removed old options record
* Added: yith_wcms_form_checkout_login_message hook for return customer message on login step
* Fixed: No address filled in after login at step
* Fixed: Skip billing step with ajax live validaton if user click on timeline

= 1.3.7 =

* Added: Italian and Spanish language files available
* Fixed: Delete step and form cookie after order complete

= 1.3.6 =

* Added: Support to WooCommerce Payments Discounts
* Fixed: Timeline issue with iPhone
* Fixed: Payments doesn't show if multistep checkout are deactivated
* Fixed: Payments box disappears after select a payment type
* Fixed: Payments box loop reload issue after select a payment type

= 1.3.5 =

* Added: Support to Avada theme Version 4.0.x
* Added: Support to WooCommerce checkout add-ons
* Tweak: Code revision for increase performance
* Fixed: Timeline Style issue on mobile device
* Fixed: Blank screen on Payment tab
* Fixed: Blank screen on Payment tab with some payment gateway
* Fixed: Previous button appears after click on next step if "Display returning customer login reminder on the "Checkout" page" option is disabled

= 1.3.4 =

* Fixed: Billing address doesn't show for logged in users

= 1.3.3 =

* Fixed: Billing address are shown in login step

= 1.3.2 =

* Added: Support to WooCommerce 2.6-beta-2
* Fixed: Unable to click on next step wityh guest checkout enabled
* Fixed: Unable to remove returning customer login reminder on the "Checkout" page

= 1.3.1 =

* Fixed: Users can't login in checkout

= 1.3.0 =

* Added: Support to YITH WooCommerce Gift Cards
* Added: Support to YITH WooCommerce Customize My Account Page Premium
* Tweak: Disabled timeline if a live validation is enabled
* Tweak: Cached javascript file doesn't reload after plugin update
* Fixed: Translation problem in login form
* Fixed: Return to current step after page refresh or apply a coupon or a gift cards

= 1.2.1 =

* Updated: Language files
* Fixed: Unable to set timeline with WordPress 4.5

= 1.2.0 =

* Added: Support to WooCommerce Ship to Multiple Addresses
* Fixed: Duplicated coupon box with Avada Theme
* Fixed: Unable to go to next step for not logged in users with Chrome browser

= 1.1.3 =

* Added: yith_wcms_load_checkout_template_from_plugin hook to enable main template overriding by theme
* Added: Support to WooCommerce Gateway Stripe plugin
* Fixed: Place order button text doesn't work

= 1.1.2 =

* Fixed: Checkout as guest doesn't work

= 1.1.1 =

* Updated: Plugin core framework

= 1.1.0 =

* Added: Support to WooCommerce 2.5-RC1
* Added: Support to WordPress 4.4.1
* Added: wpml-config.xml file for WPML Support
* Added: Disable previous button in last step
* Tweak: Plugin core framework
* Updated: All language files

= 1.0.8 =

* Tweak: Required checkout fields get correct class from localize script
* Updated: Text domain from yith_wcms to yith-woocommerce-multi-step-checkout

= 1.0.7 =

* Fixed: issue in paying old unpaid orders

= 1.0.6 =

* Added: Partial Spanish translation (by Daniel Aparisi)
* Tweak: Performance improved with new plugin core 2.0

= 1.0.5 =

* Fixed: Fatal error on form-checkout.php template if overwrite by theme

= 1.0.4 =

* Added: Italian translation (By Lidia Cirrone)
* Fixed: jQuery Issue With Payment Methods

= 1.0.3 =

* Added: Support to WooCommerce 2.4

= 1.0.2 =

* Fixed: Warning on checkout login page

= 1.0.1 =

* Initial release
