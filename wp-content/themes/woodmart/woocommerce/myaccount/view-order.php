<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>


 <section class="start-section container-fullhd">
        <div class="lk">
         <div class="orders">
            <header class="orders__header">
              <h2 class="orders__head head-lk"><span class="head-lk__icon head-lk__icon_orders"></span>Заказ&nbsp;<span></span>№<?php echo ($order->get_order_number());?> от <?php echo wc_format_datetime( $order->get_date_created() );?></h2>
              <div class="orders__filter"><a class="orders__filter-link" href="#"><span class="orders__filter-icon orders__filter-icon_create"></span>Подтвердить оплату</a><a class="orders__filter-link" href="#"><span class="orders__filter-icon orders__filter-icon_create"></span>Дублировать заказ</a><a class="orders__filter-link" href="#"><span class="orders__filter-icon orders__filter-icon_create"></span>Новый заказ</a></div>
            </header>
            <div class="orders__tabs">
              <ul class="orders__tabs-list tabs">
                <li class="order__tabs-element tabs__element"><a class="orders__tabs-link tabs__link" href="#orderInfo">Информация о заказе</a></li>
                <li class="order__tabs-element tabs__element"><a class="orders__tabs-link tabs__link" href="#orderStatus">Состав заказа</a></li>
              </ul>
              <div class="orders__tabs" id="orderInfo">
               <!--  <div class="orders-info__timeline">
                  <ul>
                    <li> 
                      <p class="orders-info__timeline-data">26.02.2018<span>10:20</span></p><img src="images/lk/timeline_green.svg">
                      <p class="orders-info__timeline-status">
                         Новый заказ<span>Заказ оформлен</span></p>
                    </li>
                    <li> 
                      <p class="orders-info__timeline-data">26.02.2018<span>10:20</span></p><img src="images/lk/timeline_green.svg">
                      <p class="orders-info__timeline-status">
                         Оплата<span>Оплачено</span></p>
                    </li>
                    <li> 
                      <p class="orders-info__timeline-data">26.02.2018<span>10:20</span></p><img src="images/lk/timeline_yellow.svg">
                      <p class="orders-info__timeline-status">
                         Комплектация<span>Комплектуется</span></p>
                    </li>
                    <li> 
                      <p class="orders-info__timeline-data"> <span> </span></p><img src="images/lk/timeline_grey.svg">
                      <p class="orders-info__timeline-status orders-info__timeline-status-unavailable">
                         Доставка<span> </span></p>
                    </li>
                    <li> 
                      <p class="orders-info__timeline-data"> <span> </span></p><img src="images/lk/timeline_boll-grey.svg">
                      <p class="orders-info__timeline-status orders-info__timeline-status-unavailable">Выполнен<span></span></p>
                    </li>
                  </ul>

                </div> -->
                <div class="orders-info__wrapper">
                  <div class="orders-info__form">
                    <div class="orders-info__label">Ф.И.О.:<!-- Если нельзя редактировать - текст внутри этого класса, импут не появляется (во всех случаях ниже), если есть возможность редактирвать - выводим импуты (селекты и лейблы) --></div>
                    <div class="orders-info__select orders-info__select-disabled"><?php echo esc_html($order->get_formatted_billing_full_name( ));?></div>
                    <label class="orders-info__label" for="ordercompany">Компания:</label>
                    <select class="orders-info__select" id="ordercompany">
					
					<?php 
					print_r ($order->get_customer_id( ));
					$cust_acf = 'user_'. $order->get_customer_id( );
					while( have_rows('company', $cust_acf) ): the_row(); ?>

						<option><?php the_sub_field('comp_name'); 		?></option>

					<?php 
					$adres = get_sub_field('adress');
					
					endwhile; ?>
                      
					  
					  
                    </select>
                    <label class="orders-info__label" for="orderadress">Адрес доставки:</label>
                    <select class="orders-info__select" id="orderadress">
                      <option><?php echo $adres; ?></option>
                    
                    </select>
                    <label class="orders-info__label" for="orderdelivery">Тип доставки:</label>
                    <select class="orders-info__select" id="orderdelivery">
                      <option>Доставка курьером</option>
                      <option>Самовывоз</option>
                    </select>
                    <label class="orders-info__label" for="ordercomment">Комментарий:</label>
                    <textarea class="orders-info__textarea" id="ordercomment">Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона.</textarea>
                  </div>
                  <div class="orders-info__score">
                    <div class="orders-info__title">
                      <h4>Счета</h4>
                    </div>
                  <!--   <div class="orders-info__score-group"><i class="orders-info__score-group__icon orders-info__score-group__icon-pdf"></i><a href="#">Счет&nbsp;<span>
                           №2104/1 от 16.10.2017№2104/1 от 16.10.2017</span></a></div>
                    <div class="orders-info__score-group"><i class="orders-info__score-group__icon orders-info__score-group__icon-xls"></i><a href="#">Счет&nbsp;<span>
                           №2104/1 от 16.10.2017№2104/1 от 16.10.2017</span></a></div>
                    <div class="orders-info__score-group"><i class="orders-info__score-group__icon orders-info__score-group__icon-doc"></i><a href="#">Счет&nbsp;<span>
                           №2104/1 от 16.10.2017№2104/1 от 16.10.2017</span></a></div>
                    <div class="orders-info__score-group"><i class="orders-info__score-group__icon orders-info__score-group__icon-zip"></i><a href="#">Счет&nbsp;<span>
                           №2104/1 от 16.10.2017№2104/1 от 16.10.2017</span></a></div>
                    <div class="orders-info__score-group"><i class="orders-info__score-group__icon orders-info__score-group__icon-ppt"></i><a href="#">Счет&nbsp;<span>
                           №2104/1 от 16.10.2017№2104/1 от 16.10.2017</span></a></div> -->
                  </div>
                  <div class="orders-info__log">
                    <div class="orders-info__title">
                      <h4>История заказа</h4>
                    </div>
                    <div class="orders-info__log-wrapper">
                      <div class="orders-info__log-item">
                        <div class="orders-info__log-item-data">
                          <p>
                               [<span><?php echo wc_format_datetime( $order->get_date_created() );?></span>]:</p>
                        </div>
                        <div class="orders-info__log-item-inner">
                          <p>Заказ оформлен</p>
                        </div>
                      </div>
                      <div class="orders-info__log-item">
                        <div class="orders-info__log-item-data">
                          <p>
                               [<span>22.22.2012 10:30</span>]:</p>
                        </div>
                        <div class="orders-info__log-item-inner">
                          <p>Вы внесли изменения в состав заказа</p>
                        </div>
                      </div>
                      <div class="orders-info__log-item">
                        <div class="orders-info__log-item-data">
                          <p>
                               [<span>22.22.2012 10:30</span>]:</p>
                        </div>
                        <div class="orders-info__log-item-inner">
                          <p>Менеджер подтвердил наличие товаров и согласовал условия доставки</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="orders__tabs" id="orderStatus">
                <div class="orders-status">
                  <div class="orders-status__table">
                    <table>
                      <tr>
                        <th>Артикул</th>
                        <th>Наименования</th>
                        <th>Кол-во</th>
                        <th>Цена</th>
                        <th>Сумма</th>
                      </tr>
                      <tr>
                        <td>15682564822</td>
                        <td>Кресло-кровать медицинская многофункциональная трансформирующаяся для родовспоможения "Armed": SC-A</td>
                        <td>
                           1</td>
                        <td>1 200 330 000 000 ₽</td>
                        <td>1 200 330 000 000 ₽</td>
                      </tr>
                    </table>
                  </div>
                  <div class="orders-status__footer">
                    <div class="orders-status__footer-buttons"><a class="Button Button_Color_Red Button_Size_M" href="lk_ordersChange.html"><span class="Button-Text Button-Text_Color_White Button-Text_Size_L"><span class="Button-Icon Button-Icon_Pencil"></span>Редактировать</span></a>
                      <button class="Button Button_Color_NotColor Button_Size_M"><span class="Button-Text Button-Text_Size_L"><span class="Button-Icon Button-Icon_CancelRed"></span>Удалить заказ</span></button>
                    </div>
                    <div class="orders-status__footer-price">
                      <div class="orders-status__footer-table orders-ur">
                        <div class="orders-status__footer-table-header">
                          <p>Итого:</p>
                          <p>123123123<span>&nbsp;&#8381;</span></p>
                        </div>
                        <div class="orders-status__footer-table-body">
                          <div class="orders-status__footer-table-tr">
                            <div class="orders-status__footer-table-td">
                              <p>Всего товаров:</p>
                              <p>12</p>
                            </div>
                            <div class="orders-status__footer-table-td">
                              <p>Вес:</p>
                              <p>23</p>
                            </div>
                          </div>
                          <div class="orders-status__footer-table-tr">
                            <div class="orders-status__footer-table-td">
                              <p>Объем: </p>
                              <p>12</p>
                            </div>
                            <div class="orders-status__footer-table-td">
                              <p>В т.ч. НДС:</p>
                              <p>1 200<span>&nbsp;&#8381;</span></p>
                            </div>
                          </div>
                          <div class="orders-status__footer-table-tr">
                            <div class="orders-status__footer-table-td">
                              <p>Скидка Промо-кода:</p>
                              <p class="detail__table-item__success">25%</p>
                            </div>
                            <div class="orders-status__footer-table-td">
                              <p>Выгода:</p>
                              <p class="detail__table-item__success">30 000 000<span>&nbsp;&#8381;</span></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="orders-status__footer-table orders-fiz">
                        <div class="orders-status__footer-table-header">
                          <p>Итого:</p>
                          <p>123123123<span>&nbsp;&#8381;</span></p>
                        </div>
                        <div class="orders-status__footer-table-body">
                          <div class="orders-status__footer-table-tr">
                            <div class="orders-status__footer-table-td">
                              <p>Всего товаров:</p>
                              <p>12</p>
                            </div>
                          </div>
                          <div class="orders-status__footer-table-tr">
                            <div class="orders-status__footer-table-td">
                              <p>Объем: </p>
                              <p>12</p>
                            </div>
                          </div>
                          <div class="orders-status__footer-table-tr">
                            <div class="orders-status__footer-table-td">
                              <p>Скидка Промо-кода:</p>
                              <p class="detail__table-item__success">25%</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="orders-click">
                    <button class="orders-click-ur">Юридическое лицо</button>
                    <button class="orders-click-fiz">Физическое лицо</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <menu class="asside_right">
            <li class="asside_right__item"><a class="asside_right__link" href="lk_index.html">Сравнение товаров<span class="asside_right__icon asside_right__icon_compar"></span></a></li>
            <li class="asside_right__item"><a class="asside_right__link" href="lk_orders.html">Избранные товары<span class="asside_right__icon asside_right__icon_favorites"></span></a></li>
            <li class="asside_right__item"><a class="asside_right__link" href="lk_document.html">Корзина<span class="asside_right__icon asside_right__icon_basket"></span></a></li>
            <li class="asside_right__item"><a class="asside_right__link" id="filterOpen" href="lk_service.html">Фильтры<span class="asside_right__icon asside_right__icon_filters"></span></a>
              <form class="orders__filter-popup orders__filter-popup_hide" id="filterPopup">
                <input class="orders__filter-search" type="text" name="filterSearch" id="filterSearch" placeholder="Поиск по заказам">
                <label class="orders__filter-label" for="filterData">Дата заказа
                  <input class="orders__filter-input" type="text" name="filterData" id="filterData">
                </label>
                <label class="orders__filter-label" for="filterNumber">Номер заказа
                  <input class="orders__filter-input" type="text" name="filterNumber" id="filterNumber">
                </label>
                <label class="orders__filter-label" for="filterStatus">Статус заказа
                  <!--TODO Стилизация custom Select, доработка выбора даты-->
                  <select class="orders__filter-select" name="filterStatus" id="filterStatus">
                    <option class="orders__filter-option" value="" disabled selected>Не выбрано</option>
                    <option class="orders__filter-option" value=""><span class="orders__status-color orders__status-color_blue"></span>В ожидании</option>
                    <option class="orders__filter-option" value="">Доставлено</option>
                    <option class="orders__filter-option" value="">В доставке</option>
                    <option class="orders__filter-option" value="">Оплачено</option>
                    <option class="orders__filter-option" value="">Не подтвержден</option>
                    <option class="orders__filter-option" value="">Отменен</option>
                    <option class="orders__filter-option" value="">В обработке</option>
                  </select>
                </label>
                <label class="orders__filter-label" for="filterName">Заказ на имя
                  <select class="orders__filter-select" name="filterName" id="filterName">
                    <option class="orders__filter-option" value="">Фамилия Имя Отчество</option>
                    <option class="orders__filter-option" value="">Фамилия Имя Отчество</option>
                    <option class="orders__filter-option" value="">Фамилия Имя Отчество</option>
                    <option class="orders__filter-option" value="">Фамилия Имя Отчество</option>
                  </select>
                </label>
                <label class="orders__filter-label" for="sumStart">Сумма от:
                  <div class="sum__wrapp">
                    <input class="orders__filter-sum-start" type="text" name="sumStart" id="sumStart"><span class="orders__filter-dash">&mdash;</span>
                    <input class="orders__filter-sum-end" type="text" name="sumEnd" id="sumEnd">
                  </div>
                </label>
                <button class="Button Button_Color_Not Button_Size_Sm"><span class="Button-Text Button-Text_Color_Black"><span class="Button-Icon Button-Icon_Cancel"></span>Сбросить фильтр</span></button>
                <!--button.orders__filter-button.button.button_white.button_icon.button_md(type="reset")
                span.button__text.button__text_white
                    span.button__icon.button__icon_cancel
                    | Сбросить фильтр
                -->
              </form>
            </li>
          </menu>
        </div>
      </section>
    


   <section>
<p><?php
	/* translators: 1: order number 2: order date 3: order status */
	printf(
		__( 'Order #%1$s was placed on %2$s and is currently %3$s.', 'woocommerce' ),
		'<mark class="order-number">' . $order->get_order_number() . '</mark>',
		'<mark class="order-date">' . wc_format_datetime( $order->get_date_created() ) . '</mark>',
		'<mark class="order-status">' . wc_get_order_status_name( $order->get_status() ) . '</mark>'
	);
?></p>

<?php if ( $notes = $order->get_customer_order_notes() ) : ?>
	<h2><?php _e( 'Order updates', 'woocommerce' ); ?></h2>
	<ol class="woocommerce-OrderUpdates commentlist notes">
		<?php foreach ( $notes as $note ) : ?>
		<li class="woocommerce-OrderUpdate comment note">
			<div class="woocommerce-OrderUpdate-inner comment_container">
				<div class="woocommerce-OrderUpdate-text comment-text">
					<p class="woocommerce-OrderUpdate-meta meta"><?php echo date_i18n( __( 'l jS \o\f F Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) ); ?></p>
					<div class="woocommerce-OrderUpdate-description description">
						<?php echo wpautop( wptexturize( $note->comment_content ) ); ?>
					</div>
	  				<div class="clear"></div>
	  			</div>
				<div class="clear"></div>
			</div>
		</li>
		<?php endforeach; ?>
	</ol>
	   </section>
<?php endif; ?>

<?php do_action( 'woocommerce_view_order', $order_id ); ?>
