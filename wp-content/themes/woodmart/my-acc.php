<?php
/* Template name: my-account */

get_header(); ?>


<?php 
	
	// Get content width and sidebar position
	$content_class = "test";

?>

   <section class="container-fullhd start-section">
        <div class="lk">
          <menu class="asside_left">
            <li class="asside_left__item"><a class="asside_left__link" href="lk_index.html"><span class="asside_left__icon asside_left__icon_index"></span>Главная</a></li>
            <li class="asside_left__item"><a class="asside_left__link" href="lk_orders.html"><span class="asside_left__icon asside_left__icon_orders"></span>Заказы</a></li>
            <li class="asside_left__item"><a class="asside_left__link" href="lk_document.html"><span class="asside_left__icon asside_left__icon_document"></span>Документы</a></li>
            <li class="asside_left__item"><a class="asside_left__link" href="lk_service.html"><span class="asside_left__icon asside_left__icon_service"></span>Cервис</a></li>
            <li class="asside_left__item"><a class="asside_left__link" href="lk_profile.html"><span class="asside_left__icon asside_left__icon_profile"></span>Профиль</a></li>
            <li class="asside_left__item"><a class="asside_left__link" href="lk_edit.html"><span class="asside_left__icon asside_left__icon_company"></span>Профиль компаниии</a></li>
            <li class="asside_left__item"><a class="asside_left__link" href="lk_settings.html"><span class="asside_left__icon asside_left__icon_settings"></span>Настройки</a></li>
          </menu>
          <div class="LkIndex">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <div class="LkIndex-SmallContainer LkIndex-SmallContainer_Discount">
              <p class="LkIndex-Count LkIndex-Count_Val">15%</p>
              <p class="LkIndex-Head">Ваша скидка</p>
              <div class="LkIndex-SmallContainer_ProgressBar">
                <div class="LkIndex-ProgressBarCount"><span class="LkIndex-ProgressBar_Min"></span><span class="LkIndex-ProgressBar_Max"></span></div>
                <div class="LkIndex-ProgressBar" data-value="15" data-min="10" data-max="20"></div>
                <p>До следующего уровня скидки&nbsp<span>122 654</span><span>&nbspРуб</span></p>
              </div>
            </div>
            <div class="LkIndex-SmallContainer LkIndex-SmallContainer_NewOrders">
              <p class="LkIndex-Count">13 465</p>
              <p class="LkIndex-Head">Новых заказов</p>
            </div>
            <div class="LkIndex-SmallContainer LkIndex-SmallContainer_InWorkOrders">
              <p class="LkIndex-Count">1 203</p>
              <p class="LkIndex-Head">Заказав в работе</p>
            </div>
            <div class="LkIndex-SmallContainer LkIndex-SmallContainer_FinishedOrders LkIndex-SmallContainer_Last">
              <p class="LkIndex-Count">678</p>
              <p class="LkIndex-Head">Завершенных заказов</p>
            </div>
            <div class="LkIndex-BigContainer">
              <p class="LkIndex-Head_Big">Активность Ваших магазинов</p>
              <div id="piechartMagazine" style="width: 831px; height: 400px;"></div>
            </div>
            <div class="LkIndex-BigContainer LkIndex-BigContainer_Last">
              <p class="LkIndex-Head_Big">Активность Ваших магазинов</p>
              <div id="piechartAssortiment" style="width: 831px; height: 400px;"></div>
            </div>
            <div class="LkIndex-MediumContainer LkIndex-MediumContainer_Promo">
              <p class="LkIndex-Head_Big">Доступные промо коды</p>
              <div class="LkIndex-Slider">
                <div class="LkIndex-SliderPromo">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div>
                <div class="LkIndex-SliderPromo">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div>
                <div class="LkIndex-SliderPromo">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div>
                <div class="LkIndex-SliderPromo">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div>
                <div class="LkIndex-SliderPromo">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div>
                <div class="LkIndex-SliderPromo">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div>
                <div class="LkIndex-SliderPromo">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div>
              </div>
              <p class="LkIndex-SliderPromoCount">1/18</p>
            </div>
            <div class="LkIndex-MediumContainer LkIndex-MediumContainer_Last">
              <p class="LkIndex-Head_Big">Действующие акции</p>
              <!--TODO Добавить див для внутреннего скрола-->
              <ul class="LkIndex-ActionList">
                <li class="LkIndex-ActionItem"><a class="LkIndex-ActionLink" href="#"><span class="LkIndex-ActionDash">&mdash;&nbsp</span><span class="LkIndex-ActionName">Lorem Ipsum - это текст-"рыба", часто используемый в печать</span></a></li>
                <li class="LkIndex-ActionItem"><a class="LkIndex-ActionLink" href="#"><span class="LkIndex-ActionDash">&mdash;&nbsp</span><span class="LkIndex-ActionName">Lorem Ipsum - это текст-"рыба", часто используемый в печать</span></a></li>
                <li class="LkIndex-ActionItem"><a class="LkIndex-ActionLink" href="#"><span class="LkIndex-ActionDash">&mdash;&nbsp</span><span class="LkIndex-ActionName">Lorem Ipsum - это текст-"рыба", часто используемый в печать</span></a></li>
                <li class="LkIndex-ActionItem"><a class="LkIndex-ActionLink" href="#"><span class="LkIndex-ActionDash">&mdash;&nbsp</span><span class="LkIndex-ActionName">Lorem Ipsum - это текст-"рыба", часто используемый в печать</span></a></li>
                <li class="LkIndex-ActionItem"><a class="LkIndex-ActionLink" href="#"><span class="LkIndex-ActionDash">&mdash;&nbsp</span><span class="LkIndex-ActionName">Lorem Ipsum - это текст-"рыба", часто используемый в печать</span></a></li>
                <li class="LkIndex-ActionItem"><a class="LkIndex-ActionLink" href="#"><span class="LkIndex-ActionDash">&mdash;&nbsp</span><span class="LkIndex-ActionName">Lorem Ipsum - это текст-"рыба", часто используемый в печать</span></a></li>
                <li class="LkIndex-ActionItem"><a class="LkIndex-ActionLink" href="#"><span class="LkIndex-ActionDash">&mdash;&nbsp</span><span class="LkIndex-ActionName">Lorem Ipsum - это текст-"рыба", часто используемый в печать</span></a></li>
              </ul>
            </div>
            <div class="LkIndex-XlContainer">
              <p class="LkIndex-Head_Big">Новинки товаров</p>
              <div class="LkIndex-ProductWrap">
                <div class="LkProduct"><a class="modalLink LkProduct-Head" href="#" data-id="quickview">Кресло-кровать для родовспоможения ЫС-М1</a><a class="LkProduct-Link" href="#"><img class="LkProduct-Image" src="images/product/product__image.png" alt="Кресло-кровать для родовспоможения ЫС-М1"></a>
                  <div class="LkProduct-Price">
                    <p class="LkProduct-Cost">47 990<span class="LkProduct-Value">&nbsp₽</span></p>
                  </div><img class="LkProduct-Rating" src="images/product/rating.png" alt="рейтинг">
                </div>
                <div class="LkProduct"><a class="modalLink LkProduct-Head" href="#" data-id="quickview">Кресло-кровать для родовспоможения ЫС-М1</a><a class="LkProduct-Link" href="#"><img class="LkProduct-Image" src="images/product/product__image.png" alt="Кресло-кровать для родовспоможения ЫС-М1"></a>
                  <div class="LkProduct-Price">
                    <p class="LkProduct-Cost">47 990<span class="LkProduct-Value">&nbsp₽</span></p>
                  </div><img class="LkProduct-Rating" src="images/product/rating.png" alt="рейтинг">
                </div>
                <div class="LkProduct"><a class="modalLink LkProduct-Head" href="#" data-id="quickview">Кресло-кровать для родовспоможения ЫС-М1</a><a class="LkProduct-Link" href="#"><img class="LkProduct-Image" src="images/product/product__image.png" alt="Кресло-кровать для родовспоможения ЫС-М1"></a>
                  <div class="LkProduct-Price">
                    <p class="LkProduct-Cost">47 990<span class="LkProduct-Value">&nbsp₽</span></p>
                  </div><img class="LkProduct-Rating" src="images/product/rating.png" alt="рейтинг">
                </div>
                <div class="LkProduct"><a class="modalLink LkProduct-Head" href="#" data-id="quickview">Кресло-кровать для родовспоможения ЫС-М1</a><a class="LkProduct-Link" href="#"><img class="LkProduct-Image" src="images/product/product__image.png" alt="Кресло-кровать для родовспоможения ЫС-М1"></a>
                  <div class="LkProduct-Price">
                    <p class="LkProduct-Cost">47 990<span class="LkProduct-Value">&nbsp₽</span></p>
                  </div><img class="LkProduct-Rating" src="images/product/rating.png" alt="рейтинг">
                </div>
                <div class="LkProduct"><a class="modalLink LkProduct-Head" href="#" data-id="quickview">Кресло-кровать для родовспоможения ЫС-М1</a><a class="LkProduct-Link" href="#"><img class="LkProduct-Image" src="images/product/product__image.png" alt="Кресло-кровать для родовспоможения ЫС-М1"></a>
                  <div class="LkProduct-Price">
                    <p class="LkProduct-Cost">47 990<span class="LkProduct-Value">&nbsp₽</span></p>
                  </div><img class="LkProduct-Rating" src="images/product/rating.png" alt="рейтинг">
                </div>
                <div class="LkProduct"><a class="modalLink LkProduct-Head" href="#" data-id="quickview">Кресло-кровать для родовспоможения ЫС-М1</a><a class="LkProduct-Link" href="#"><img class="LkProduct-Image" src="images/product/product__image.png" alt="Кресло-кровать для родовспоможения ЫС-М1"></a>
                  <div class="LkProduct-Price">
                    <p class="LkProduct-Cost">47 990<span class="LkProduct-Value">&nbsp₽</span></p>
                  </div><img class="LkProduct-Rating" src="images/product/rating.png" alt="рейтинг">
                </div>
              </div>
              <p class="LkIndex-ProductCount">1/18</p>
            </div>
            <div class="LkIndex-XlContainer LkIndex-XlContainer_Last">
              <p class="LkIndex-Head_Big">Рекомендуемые видео</p>
              <div class="LkIndex-VideoWrap">
                <iframe width="650" height="365" src="https://www.youtube.com/embed/G4sS2Uzwwqk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <iframe width="650" height="365" src="https://www.youtube.com/embed/TyF6SKxaANo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <iframe width="650" height="365" src="https://www.youtube.com/embed/KD_hdv2oI80" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <iframe width="650" height="365" src="https://www.youtube.com/embed/0dRQJRtEODc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
              </div>
              <p class="LkIndex-VideoCount">1/18</p>
            </div>
          </div>
          <menu class="asside_right">
            <li class="asside_right__item"><a class="asside_right__link" href="lk_index.html">Сравнение товаров<span class="asside_right__icon asside_right__icon_compar"></span></a></li>
            <li class="asside_right__item"><a class="asside_right__link" href="lk_orders.html">Избранные товары<span class="asside_right__icon asside_right__icon_favorites"></span></a></li>
            <li class="asside_right__item"><a class="asside_right__link" href="lk_document.html">Корзина<span class="asside_right__icon asside_right__icon_basket"></span></a></li>
            <li class="asside_right__item"><a class="asside_right__link" id="filterOpen" href="lk_service.html">Фильтры<span class="asside_right__icon asside_right__icon_filters"></span></a>
              <form class="orders__filter-popup LkFilterHide" id="filterPopup">
                <input class="orders__filter-search" type="text" name="filterSearch" id="filterSearch" placeholder="Поиск по заказам">
                <label class="orders__filter-label" for="filterData">Дата заказа
                  <input class="orders__filter-input" type="text" name="filterData" id="filterData" placeholder="Выберите диапазон дат">
                </label>
                <label class="orders__filter-label" for="filterNumber">Номер заказа
                  <input class="orders__filter-input" type="text" name="filterNumber" id="filterNumber" placeholder="Введите номер заказа">
                </label>
                <p class="orders__filter-label">Статус заказа
                  <div class="Select Select_BorderBottom" id="filterStatsu"><a class="Select-Head" id="SelectFilter" href="#" data-value="None">
                      <sapn class="StatusOrder-Text StatusOrder-Text_Placeholder">Выберите статус</sapn></a>
                    <div class="Select-Catalog"><a class="Select-Item" href="#" data-value="None">
                        <sapn class="StatusOrder-Text StatusOrder-Text_Placeholder">Не выбрано</sapn></a><a class="Select-Item" href="#" data-value="Delivered"><span class="StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_Delivered"></span>
                          <sapn class="StatusOrder-Text">Доставлено</sapn></span></a><a class="Select-Item" href="#" data-value="InDelivered"><span class="StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_InDelivered"></span>
                          <sapn class="StatusOrder-Text">В доставке</sapn></span></a><a class="Select-Item" href="#" data-value="PendingPayment"><span class="StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_PendingPayment"></span>
                          <sapn class="StatusOrder-Text">Ожидает оплаты</sapn></span></a><a class="Select-Item" href="#" data-value="Paid"><span class="StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_Paid"></span>
                          <sapn class="StatusOrder-Text">Оплачен</sapn></span></a><a class="Select-Item" href="#" data-value="NotVerifed"><span class="StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_NotVerifed"></span>
                          <sapn class="StatusOrder-Text">Не подтвержден</sapn></span></a><a class="Select-Item" href="#" data-value="Canseled"><span class="StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_Canseled"></span>
                          <sapn class="StatusOrder-Text">Отменен</sapn></span></a><a class="Select-Item" href="#" data-value="InProcessing"><span class="StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_InProcessing"></span>
                          <sapn class="StatusOrder-Text">В обработке</sapn></span></a><a class="Select-Item" href="#" data-value="ShipmentProhibited"><span class="StatusOrder"><span class="StatusOrder-Color StatusOrder-Color_ShipmentProhibited"></span>
                          <sapn class="StatusOrder-Text">Отгрузка запрещена</sapn></span></a></div>
                  </div>
                </p>
                <p class="orders__filter-label">Заказ на имя
                  <div class="Select Select_BorderBottom" id="filterName"><a class="Select-Head" id="SelectName" href="#" data-value="None">
                      <sapn class="StatusOrder-Text StatusOrder-Text_Placeholder">Выберите ФИО</sapn></a>
                    <div class="Select-Catalog"><a class="Select-Item" href="#" data-value="None">
                        <sapn class="StatusOrder-Text StatusOrder-Text_Placeholder">Не выбрано</sapn></a><a class="Select-Item" href="#" data-value="User1">
                        <sapn class="StatusOrder-Text">Июрагим Оглы Муса</sapn></a><a class="Select-Item" href="#" data-value="User2">
                        <sapn class="StatusOrder-Text">Авдеев Игорь Викторович</sapn></a><a class="Select-Item" href="#" data-value="User3">
                        <sapn class="StatusOrder-Text">Хан Султан Хазлед Лери</sapn></a><a class="Select-Item" href="#" data-value="User4">
                        <sapn class="StatusOrder-Text">Фамилия Имя Отчество</sapn></a></div>
                  </div>
                </p>
                <label class="orders__filter-label" for="sumStart">Сумма от:
                  <div class="sum__wrapp">
                    <input class="orders__filter-sum-start" type="text" name="sumStart" id="sumStart"><span class="orders__filter-dash">&mdash;</span>
                    <input class="orders__filter-sum-end" type="text" name="sumEnd" id="sumEnd">
                  </div>
                </label>
                <button class="Button Button_Color_Not Button_Size_Sm" type="reset" id="FilterReset"><span class="Button-Text Button-Text_Color_Black"><span class="Button-Icon Button-Icon_Cancel"></span>Сбросить фильтр</span></button>
                <!--button.orders__filter-button.button.button_white.button_icon.button_md(type="reset")
                span.button__text.button__text_white
                    span.button__icon.button__icon_cancel
                    | Сбросить фильтр
                -->
              </form>
            </li>
          </menu>
        </div>
      </section><!-- .site-content -->


<?php get_sidebar(); ?>

<?php get_footer(); ?>