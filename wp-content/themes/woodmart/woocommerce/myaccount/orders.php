<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_orders', $has_orders ); ?>

<?php if ( $has_orders ) : ?>

<div class="orders">
            <header class="orders__header">
              <h2 class="orders__head head-lk"><span class="head-lk__icon head-lk__icon_orders"></span>Заказы</h2>
              <div class="orders__filter"><a class="orders__filter-link" href="#"><span class="orders__filter-icon orders__filter-icon_create"></span>Новый заказ</a>
                <!--a.orders__filter-link#filterOpen(href="#")
                span.orders__filter-icon.orders__filter-icon_filter
                | Фильтр
                -->
              </div>
			  </header>
            <div class="orders__tabs">
         <!--      <ul class="orders__tabs-list tabs">
                <li class="order__tabs-element tabs__element"><a class="orders__tabs-link tabs__link" href="#orderTabs1">В процессе</a></li>
                <li class="order__tabs-element tabs__element"><a class="orders__tabs-link tabs__link" href="#orderTabs2">Не завершенные</a></li>
                <li class="order__tabs-element tabs__element"><a class="orders__tabs-link tabs__link" href="#orderTabs3">Последние</a></li>
              </ul> -->
              <div class="orders__tabs" id="orderTabs1">
                <div class="orders__table table">
                  <div class="orders__head table__head">
				  <a class="order__head-link table__head-link table__head-active" href="#">Cтатус<span class="order__head-arrow table__head-arrow"></span></a>
				  <a class="order__head-link table__head-link" href="#">Номер заказа<span class="order__head-arrow table__head-arrow"></span></a>
				  <a class="order__head-link table__head-link table__element_customer" href="#">Состав заказа</a>
				  <a class="order__head-link table__head-link table__element_customer" href="#">Заказчик<span class="order__head-arrow table__head-arrow"></span></a>
				  <a class="order__head-link table__head-link" href="#">Дата<span class="order__head-arrow table__head-arrow"></span></a>
				  <a class="order__head-link table__head-link" href="#">Сумма<span class="order__head-arrow table__head-arrow"></span></a>
				  <a class="order__head-link table__head-link table__element_actions" href="#">Действие</a></div>
				  
				 
				  <?php foreach ( $customer_orders->orders as $customer_order ) :
				$order      = wc_get_order( $customer_order );
				$item_count = $order->get_item_count();
				?>
				  
                  <div class="orders__body table__body">
                    <div class="orders__row table__row">
                      <p class="orders__status table__element"><span class="orders__status-color orders__status-color_blue"></span><?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?></p>
                      <p class="orders__orderNumber table__element"><?php echo _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number(); ?></p>
                      <p class="orders__customer table__element table__element_customer">В заказе <?php echo $item_count; ?> наименований</p>
                      <p class="orders__customer table__element table__element_customer"><?php echo esc_html($order->get_formatted_billing_full_name( ));?></p>
                      <p class="orders__data table__element"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></p>
                      <p class="orders__sum table__element"><?php echo   $order->get_total(); ?>&nbsp;<span class="woocommerce-Price-currencySymbol"><span class="rur">р<span>уб.</span></span></span></p>
                      <div class="orders__actions table__element table__element_actions">
					  <a class="orders__icon orders__icon_save" href="#"></a>
					  <a class="orders__icon orders__icon_print" href="#"></a>
					  <a class="orders__icon orders__icon_edit" href="<?php echo esc_url( $order->get_view_order_url() ); ?>"></a>
					  <a class="orders__icon orders__icon_copy" href="#"></a></div>
                    </div>
                   
				   
				
					
					<?php endforeach; ?>
					
                    </div>
					
					
                  </div>
                  <!-- <p class="orders__quantity-text">Показывать на странице
                    <select class="orders__quantity">
                      <option class="orders__quantity-value" value="10">10</option>
                      <option class="orders__quantity-value" value="20">20</option>
                      <option class="orders__quantity-value" value="50">50</option>
                      <option class="orders__quantity-value" value="100">100</option>
                      <option class="orders__quantity-value" value="150">150</option>
                      <option class="orders__quantity-value" value="300">300</option>
                    </select>из&nbsp<span class="orders__quantity-all">29</span>
                  </p> -->
                </div>
              </div>
            
            </div>
          </div>








<!-- 
	<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
		<thead>
			<tr>
				<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
					<th class="woocommerce-orders-table__header woocommerce-orders-table__header-<?php echo esc_attr( $column_id ); ?>"><span class="nobr"><?php echo esc_html( $column_name ); ?></span></th>
				<?php endforeach; ?>
			</tr>
		</thead>

		<tbody>
			<?php foreach ( $customer_orders->orders as $customer_order ) :
				$order      = wc_get_order( $customer_order );
				$item_count = $order->get_item_count();
				?>
				<tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?> order">
					<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
						<td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
							<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
								<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

							<?php elseif ( 'order-number' === $column_id ) : ?>
								<a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
									<?php echo _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number(); ?>
								</a>

							<?php elseif ( 'order-date' === $column_id ) : ?>
								<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>

							<?php elseif ( 'order-status' === $column_id ) : ?>
								<?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>

							<?php elseif ( 'order-total' === $column_id ) : ?>
								<?php
								/* translators: 1: formatted order total 2: total order items */
								printf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count );
								?>

							<?php elseif ( 'order-actions' === $column_id ) : ?>
								<?php
								$actions = wc_get_account_orders_actions( $order );
								
								if ( ! empty( $actions ) ) {
									foreach ( $actions as $key => $action ) {
										echo '<a href="' . esc_url( $action['url'] ) . '" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
									}
								}
								?>
							<?php endif; ?>
						</td>
					<?php endforeach; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
 -->
	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php _e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php _e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else : ?>
	<div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
		<a class="woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php _e( 'Go shop', 'woocommerce' ) ?>
		</a>
		<?php _e( 'No order has been made yet.', 'woocommerce' ); ?>
	</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
