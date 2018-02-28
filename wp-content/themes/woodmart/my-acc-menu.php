
<?php $current_user = wp_get_current_user();

 $meta_user = get_user_meta( $current_user->ID );
    ?>


<!-- <pre><?php print_r ($meta_user);?></pre> -->
<div class="infolk">
          <div class="infolk__notifaction"></div>
          <div class="infolk__info">
            <div class="infolk__info-manager-wrapp">
					<?	$manager = get_user_meta( $current_user->ID, 'manager');	
					//print_r ($manager);
					
					$manager_meta = get_user_meta( $manager[0]);
					//print_r ($manager_meta);
					
					?>
			
			
              <div class="infolk__info-manager"><img class="infolk__info-foto" src="<?php echo esc_url( get_avatar_url( $manager[0] ) ); ?>" alt="<?php echo esc_html($manager_meta['last_name']['0'].' '.$manager_meta['first_name']['0']);?>">
                <div class="infolk__info-text-manager">
                  <p class="infolk__info-text"><?php echo esc_html($manager_meta['last_name']['0'].' '.$manager_meta['first_name']['0']);?>
				  <span class="infolk__info-name">(Ваш менеджер)</span></p>
				  <a class="infolk__link" href="tel:<?php echo $manager_meta['billing_phone']['0'];?>">
				  <span class="infolk__icon infolk__icon_tel"></span><?php echo $manager_meta['billing_phone']['0'];?></a>
				  <a class="infolk__link" href="mail:<?php echo esc_html($manager_meta['billing_email']['0']);?>">
				  <span class="infolk__icon infolk__icon_mailsm"></span><?php echo esc_html($manager_meta['billing_email']['0']);?></a>
                </div>
              </div>
            </div>
            <div class="infolk__info-user" id="ClientClik">
              <div class="infolk__user-data">
                <p class="infolk__user-company"><?php echo esc_html($meta_user['company_0_comp_name']['0']);?></p>
                <p class="infolk__user-name"><?php echo esc_html( $current_user->display_name ) ;?></p>
              </div><img class="infolk__user-foto" src="<?php echo esc_url( get_avatar_url(  $current_user->ID ) ); ?>"  style="height:37px" alt="">
              <div class="Client">
                <div class="Client-Organization mCustomScrollbar _mCS_10 mCS_no_scrollbar" style="position: relative; overflow: visible;"><div id="mCSB_10" class="mCustomScrollBox mCS-client mCSB_vertical mCSB_outside" style="max-height: 185px;" tabindex="0"><div id="mCSB_10_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr"><a class="Client-Item Client-Link" href="#"><img class="Client-Foto mCS_img_loaded" src="images/Header/client_foto/Foto.png" alt="Фото клиента">
                    <div class="Client-Info">
                      <p class="Client-Name">Имя клиента или название организации</p>
                      <p class="Client-OrdersCount">11234 заказов</p>
                    </div></a><a class="Client-Item Client-Link" href="#"><img class="Client-Foto mCS_img_loaded" src="images/Header/client_foto/Foto_2.png" alt="Фото клиента">
                    <div class="Client-Info">
                      <p class="Client-Name">Имя клиента или название организации</p>
                      <p class="Client-OrdersCount">11234 заказов</p>
                    </div></a><a class="Client-Item Client-Link" href="#"><img class="Client-Foto mCS_img_loaded" src="images/Header/client_foto/Foto_3.png" alt="Фото клиента">
                    <div class="Client-Info">
                      <p class="Client-Name">Имя клиента или название организации</p>
                      <p class="Client-OrdersCount">11234 заказов</p>
                    </div></a><a class="Client-Item Client-Link" href="#"><img class="Client-Foto mCS_img_loaded" src="images/Header/client_foto/Foto.png" alt="Фото клиента">
                    <div class="Client-Info">
                      <p class="Client-Name">Имя клиента или название организации</p>
                      <p class="Client-OrdersCount">11234 заказов</p>
                    </div></a></div></div><div id="mCSB_10_scrollbar_vertical" class="mCSB_scrollTools mCSB_10_scrollbar mCS-client mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_10_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
                <div class="Clien-PrivateAccaunt">
                  <p class="Client-Text">Личный аккаунт</p><a class="Client-Item Client-Link" href="#"><img class="Client-Foto" src="images/Header/client_foto/Foto_3.png" alt="Фото клиента">
                    <div class="Client-Info">
                      <p class="Client-Name">Имя клиента</p>
                      <p class="Client-OrdersCount">11234 заказов</p>
                    </div></a>
                </div>
              </div>
            </div>
          </div>
          <div class="infolk__exit"><a class="infolk__mail" href="#" id="MailClick"><span class="infolk__icon infolk__icon_mail"></span><span class="infolk__alarm infolk__alarm_mail"></span></a>
            <div class="Mail">
              <p class="Mail-Head">Новых сообщений:&nbsp;<span class="Mail-CountMail">8</span></p>
              <div class="Mail-List mCustomScrollbar _mCS_11 mCS_no_scrollbar" style="position: relative; overflow: visible;"><div id="mCSB_11" class="mCustomScrollBox mCS-client mCSB_vertical mCSB_outside" style="max-height: 328px;" tabindex="0"><div id="mCSB_11_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
                <div class="Mail-Item">
                  <p class="Mail-MessageHead">Изменение статуса заказа</p>
                  <p class="Mail-Message">Статус вашего заказа №&nbsp;<span class="Mail-NumberOrder">152462</span>&nbsp; был изменен на&nbsp;<span class="Mail-StatusOrder StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_Delivered"></span><span class="StatusOrder-Text">Доставлен</span></span></p>
                  <p class="Mail-Date">24 окт 2017 12:30</p>
                </div>
                <div class="Mail-Item">
                  <p class="Mail-MessageHead">Изменение статуса заказа</p>
                  <p class="Mail-Message">Статус вашего заказа №&nbsp;<span class="Mail-NumberOrder">152462</span>&nbsp; был изменен на&nbsp;<span class="Mail-StatusOrder StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_InDelivered"></span><span class="StatusOrder-Text">В доставке</span></span></p>
                  <p class="Mail-Date">24 окт 2017 12:30</p>
                </div>
                <div class="Mail-Item">
                  <p class="Mail-MessageHead">Изменение статуса заказа</p>
                  <p class="Mail-Message">Статус вашего заказа №&nbsp;<span class="Mail-NumberOrder">152462</span>&nbsp; был изменен на&nbsp;<span class="Mail-StatusOrder StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_Paid"></span><span class="StatusOrder-Text">Оплачен</span></span></p>
                  <p class="Mail-Date">24 окт 2017 12:30</p>
                </div>
                <div class="Mail-Item">
                  <p class="Mail-MessageHead">Изменение статуса заказа</p>
                  <p class="Mail-Message">Статус вашего заказа №&nbsp;<span class="Mail-NumberOrder">152462</span>&nbsp; был изменен на&nbsp;<span class="Mail-StatusOrder StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_PendingPayment"></span><span class="StatusOrder-Text">Ожидает оплаты</span></span></p>
                  <p class="Mail-Date">24 окт 2017 12:30</p>
                </div>
                <div class="Mail-Item">
                  <p class="Mail-MessageHead">Изменение статуса заказа</p>
                  <p class="Mail-Message">Статус вашего заказа №&nbsp;<span class="Mail-NumberOrder">152462</span>&nbsp; был изменен на&nbsp;<span class="Mail-StatusOrder StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_InProcessing"></span><span class="StatusOrder-Text">В обработке</span></span></p>
                  <p class="Mail-Date">24 окт 2017 12:30</p>
                </div>
                <div class="Mail-Item">
                  <p class="Mail-MessageHead">Изменение статуса заказа</p>
                  <p class="Mail-Message">Статус вашего заказа №&nbsp;<span class="Mail-NumberOrder">152462</span>&nbsp; был изменен на&nbsp;<span class="Mail-StatusOrder StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_NotVerifed"></span><span class="StatusOrder-Text">Не подтвержден</span></span></p>
                  <p class="Mail-Date">24 окт 2017 12:30</p>
                </div>
                <div class="Mail-Item">
                  <p class="Mail-MessageHead">Изменение статуса заказа</p>
                  <p class="Mail-Message">Статус вашего заказа №&nbsp;<span class="Mail-NumberOrder">152462</span>&nbsp; был изменен на&nbsp;<span class="Mail-StatusOrder StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_Canseled"></span><span class="StatusOrder-Text">Отменен</span></span></p>
                  <p class="Mail-Date">24 окт 2017 12:30</p>
                </div>
                <div class="Mail-Item">
                  <p class="Mail-MessageHead">Изменение статуса заказа</p>
                  <p class="Mail-Message">Статус вашего заказа №&nbsp;<span class="Mail-NumberOrder">152462</span>&nbsp; был изменен на&nbsp;<span class="Mail-StatusOrder StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_ShipmentProhibited"></span><span class="StatusOrder-Text StatusOrder-Text_ShipmentProhibited">Отгрузка запрещена</span>
                      <!--TODO Добавить ТулТип--></span></p>
                  <p class="Mail-Date">24 окт 2017 12:30</p>
                </div>
              </div></div><div id="mCSB_11_scrollbar_vertical" class="mCSB_scrollTools mCSB_11_scrollbar mCS-client mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_11_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
            </div><a class="infolk__ring" href="#" id="NotificatinClient"><span class="infolk__icon infolk__icon_ring"></span><span class="infolk__alarm infolk__alarm_ring"></span></a>
            <div class="Notification">
              <p class="Notification-Head">Новых уведомлений:&nbsp;<span class="Notification-CountNotification">8</span></p>
              <div class="Notification-List mCustomScrollbar _mCS_12 mCS_no_scrollbar" style="position: relative; overflow: visible;"><div id="mCSB_12" class="mCustomScrollBox mCS-client mCSB_vertical mCSB_outside" style="max-height: 328px;" tabindex="0"><div id="mCSB_12_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
                <div class="Notification-Item">
                  <p class="Notification-MessageHead">Изменение статуса заказа</p>
                  <p class="Notification-Message">Статус вашего заказа №&nbsp;<span class="Notification-NumberOrder">152462</span>&nbsp; был изменен на&nbsp;<span class="Notification-StatusOrder StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_Delivered"></span><span class="StatusOrder-Text">Доставлен</span></span></p>
                  <p class="Notification-Date">24 окт 2017 12:30</p>
                </div>
                <div class="Notification-Item">
                  <p class="Notification-MessageHead">Изменение статуса заказа</p>
                  <p class="Notification-Message">Статус вашего заказа №&nbsp;<span class="Notification-NumberOrder">152462</span>&nbsp; был изменен на&nbsp;<span class="Notification-StatusOrder StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_InDelivered"></span><span class="StatusOrder-Text">В доставке</span></span></p>
                  <p class="Notification-Date">24 окт 2017 12:30</p>
                </div>
                <div class="Notification-Item">
                  <p class="Notification-MessageHead">Изменение статуса заказа</p>
                  <p class="Notification-Message">Статус вашего заказа №&nbsp;<span class="Notification-NumberOrder">152462</span>&nbsp; был изменен на&nbsp;<span class="Notification-StatusOrder StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_Paid"></span><span class="StatusOrder-Text">Оплачен</span></span></p>
                  <p class="Notification-Date">24 окт 2017 12:30</p>
                </div>
                <div class="Notification-Item">
                  <p class="Notification-MessageHead">Изменение статуса заказа</p>
                  <p class="Notification-Message">Статус вашего заказа №&nbsp;<span class="Notification-NumberOrder">152462</span>&nbsp; был изменен на&nbsp;<span class="Notification-StatusOrder StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_PendingPayment"></span><span class="StatusOrder-Text">Ожидает оплаты</span></span></p>
                  <p class="Notification-Date">24 окт 2017 12:30</p>
                </div>
                <div class="Notification-Item">
                  <p class="Notification-MessageHead">Изменение статуса заказа</p>
                  <p class="Notification-Message">Статус вашего заказа №&nbsp;<span class="Notification-NumberOrder">152462</span>&nbsp; был изменен на&nbsp;<span class="Notification-StatusOrder StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_InProcessing"></span><span class="StatusOrder-Text">В обработке</span></span></p>
                  <p class="Notification-Date">24 окт 2017 12:30</p>
                </div>
                <div class="Notification-Item">
                  <p class="Notification-MessageHead">Изменение статуса заказа</p>
                  <p class="Notification-Message">Статус вашего заказа №&nbsp;<span class="Notification-NumberOrder">152462</span>&nbsp; был изменен на&nbsp;<span class="Notification-StatusOrder StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_NotVerifed"></span><span class="StatusOrder-Text">Не подтвержден</span></span></p>
                  <p class="Notification-Date">24 окт 2017 12:30</p>
                </div>
                <div class="Notification-Item">
                  <p class="Notification-MessageHead">Изменение статуса заказа</p>
                  <p class="Notification-Message">Статус вашего заказа №&nbsp;<span class="Notification-NumberOrder">152462</span>&nbsp; был изменен на&nbsp;<span class="Notification-StatusOrder StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_Canseled"></span><span class="StatusOrder-Text">Отменен</span></span></p>
                  <p class="Notification-Date">24 окт 2017 12:30</p>
                </div>
                <div class="Notification-Item">
                  <p class="Notification-MessageHead">Изменение статуса заказа</p>
                  <p class="Notification-Message">Статус вашего заказа №&nbsp;<span class="Notification-NumberOrder">152462</span>&nbsp; был изменен на&nbsp;<span class="Notification-StatusOrder StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_ShipmentProhibited"></span><span class="StatusOrder-Text StatusOrder-Text_ShipmentProhibited">Отгрузка запрещена</span>
                      <!--TODO Добавить ТулТип--></span></p>
                  <p class="Notification-Date">24 окт 2017 12:30</p>
                </div>
              </div></div><div id="mCSB_12_scrollbar_vertical" class="mCSB_scrollTools mCSB_12_scrollbar mCS-client mCSB_scrollTools_vertical" style="display: none;"><div class="mCSB_draggerContainer"><div id="mCSB_12_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 30px; top: 0px;"><div class="mCSB_dragger_bar" style="line-height: 30px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
            </div><a class="infolk__exit-link" href="<?php echo esc_url( wc_get_account_endpoint_url( 'customer-logout' ) ); ?>"><span class="infolk__icon infolk__icon_exit"></span></a>
          </div>
        </div>