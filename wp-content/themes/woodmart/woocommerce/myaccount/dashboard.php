<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div class="LkIndex">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <div class="LkIndex-SmallContainer LkIndex-SmallContainer_Discount">
              <p class="LkIndex-Count LkIndex-Count_Val">15%</p>
              <p class="LkIndex-Head">Ваша скидка</p>
              <div class="LkIndex-SmallContainer_ProgressBar">
                <div class="LkIndex-ProgressBarCount"><span class="LkIndex-ProgressBar_Min">10%</span><span class="LkIndex-ProgressBar_Max">20%</span></div>
                <div class="LkIndex-ProgressBar ui-progressbar ui-widget ui-widget-content" data-value="15" data-min="10" data-max="20" role="progressbar" aria-valuemin="0" aria-valuemax="20" aria-valuenow="15"><div class="ui-progressbar-value LkIndex-ProgressBar_Value ui-widget-header" style="width: 75%;"></div></div>
                <p>До следующего уровня скидки&nbsp;<span>122 654</span><span>&nbsp;Руб</span></p>
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
              <div id="piechartMagazine" style="width: 831px; height: 400px;"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 831px; height: 400px;"><div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;" aria-label="A chart."><svg width="831" height="400" aria-label="A chart." style="overflow: hidden;"><defs id="defs"></defs><rect x="0" y="0" width="831" height="400" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><path d="M416,139.5L416,78A123,123,0,0,1,531.8980934206149,242.19019229703133L473.94904671030747,221.59509614851567A61.5,61.5,0,0,0,416,139.5" stroke="#ffffff" stroke-width="1" fill="#97cc64"></path></g><g><path d="M355.78632860753714,188.48745519726302L295.5726572150743,175.97491039452603A123,123,0,0,1,416,78L416,139.5A61.5,61.5,0,0,0,355.78632860753714,188.48745519726302" stroke="#ffffff" stroke-width="1" fill="#fd5a3e"></path></g><g><path d="M473.94904671030747,221.59509614851567L531.8980934206149,242.19019229703133A123,123,0,0,1,295.5726572150743,175.97491039452603L355.78632860753714,188.48745519726302A61.5,61.5,0,0,0,473.94904671030747,221.59509614851567" stroke="#ffffff" stroke-width="1" fill="#ffd963"></path></g><g><g><g><text text-anchor="end" x="696" y="141.57367119901113" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#000000">ООО "Дезиген"</text></g><g><text text-anchor="end" x="696" y="164.22632880098888" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#9e9e9e">30.4%</text></g></g><g><path d="M491.5,148.5L553.5,148.5L553.5,148.5L696.5,148.5" stroke="#636363" stroke-width="1" stroke-opacity="0.7" fill-opacity="1" fill="none"></path><circle cx="491.5" cy="148.5" r="2" stroke="none" stroke-width="0" fill-opacity="0.7" fill="#636363"></circle></g><g><g><text text-anchor="start" x="136" y="283.5736711990111" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#000000">ИП "SEOGROUP"</text></g><g><text text-anchor="start" x="136" y="306.2263288009889" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#9e9e9e">47.8%</text></g></g><g><path d="M391.5,290.5L279.5,290.5L279.5,290.5L136.5,290.5" stroke="#636363" stroke-width="1" stroke-opacity="0.7" fill-opacity="1" fill="none"></path><circle cx="391.5" cy="290.5" r="2" stroke="none" stroke-width="0" fill-opacity="0.7" fill="#636363"></circle></g><g><g><text text-anchor="start" x="136" y="122.57367119901113" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#000000">ООО "Верстальщик"</text></g><g><text text-anchor="start" x="136" y="145.22632880098888" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#9e9e9e">21.7%</text></g></g><g><path d="M358.5,129.5L279.5,129.5L279.5,129.5L136.5,129.5" stroke="#636363" stroke-width="1" stroke-opacity="0.7" fill-opacity="1" fill="none"></path><circle cx="358.5" cy="129.5" r="2" stroke="none" stroke-width="0" fill-opacity="0.7" fill="#636363"></circle></g></g><g></g></svg><div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Task</th><th>Hours per Day</th></tr></thead><tbody><tr><td>ООО "Дезиген"</td><td>7</td></tr><tr><td>ИП "SEOGROUP"</td><td>11</td></tr><tr><td>ООО "Верстальщик"</td><td>5</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 410px; left: 841px; white-space: nowrap; font-family: Arial; font-size: 14px;">21.7%</div><div></div></div></div>
            </div>
            <div class="LkIndex-BigContainer LkIndex-BigContainer_Last">
              <p class="LkIndex-Head_Big">Активность Ваших магазинов</p>
              <div id="piechartAssortiment" style="width: 831px; height: 400px;"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 831px; height: 400px;"><div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;" aria-label="A chart."><svg width="831" height="400" aria-label="A chart." style="overflow: hidden;"><defs id="defs"></defs><rect x="0" y="0" width="831" height="400" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><path d="M416,201L416,78A123,123,0,0,1,539,201L416,201A0,0,0,0,0,416,201" stroke="#ffffff" stroke-width="1" fill="#97cc64"></path></g><g><path d="M416,201L539,201A123,123,0,0,1,496.54787027527004,293.9571976455738L416,201A0,0,0,0,0,416,201" stroke="#ffffff" stroke-width="1" fill="#ffd963"></path></g><g><path d="M416,201L496.54787027527004,293.9571976455738A123,123,0,0,1,467.096046599232,312.8847354286058L416,201A0,0,0,0,0,416,201" stroke="#ffffff" stroke-width="1" fill="#fd5a3e"></path></g><g><path d="M416,201L381.3468955085042,319.0176357545832A123,123,0,0,1,416,78L416,201A0,0,0,0,0,416,201" stroke="#ffffff" stroke-width="1" fill="#a955b8"></path></g><g><path d="M416,201L467.096046599232,312.8847354286058A123,123,0,0,1,381.3468955085042,319.0176357545832L416,201A0,0,0,0,0,416,201" stroke="#ffffff" stroke-width="1" fill="#77b6e7"></path></g><g><g><g><text text-anchor="end" x="696" y="129.57367119901113" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#000000">Рециркуляторы</text></g><g><text text-anchor="end" x="696" y="152.22632880098888" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#9e9e9e">25%</text></g></g><g><path d="M481.5,136.5L553.5,136.5L553.5,136.5L696.5,136.5" stroke="#636363" stroke-width="1" stroke-opacity="0.7" fill-opacity="1" fill="none"></path><circle cx="481.5" cy="136.5" r="2" stroke="none" stroke-width="0" fill-opacity="0.7" fill="#636363"></circle></g><g><g><text text-anchor="end" x="696" y="196.24734239802225" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#000000">Кислородные</text><text text-anchor="end" x="696" y="214.57367119901113" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#000000">концентраторы</text></g><g><text text-anchor="end" x="696" y="237.22632880098888" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#9e9e9e">13.6%</text></g></g><g><path d="M505.5,224.5L553.5,224.5L553.5,221.5L696.5,221.5" stroke="#636363" stroke-width="1" stroke-opacity="0.7" fill-opacity="1" fill="none"></path><circle cx="505.5" cy="224.5" r="2" stroke="none" stroke-width="0" fill-opacity="0.7" fill="#636363"></circle></g><g><g><text text-anchor="end" x="696" y="254.57367119901113" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#000000">Тонометры</text></g><g><text text-anchor="end" x="696" y="277.2263288009889" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#9e9e9e">4.5%</text></g></g><g><path d="M466.5,279.5L553.5,279.5L553.5,261.5L696.5,261.5" stroke="#636363" stroke-width="1" stroke-opacity="0.7" fill-opacity="1" fill="none"></path><circle cx="466.5" cy="279.5" r="2" stroke="none" stroke-width="0" fill-opacity="0.7" fill="#636363"></circle></g><g><g><text text-anchor="end" x="696" y="299.5736711990111" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#000000">Увлажнители воздуха</text></g><g><text text-anchor="end" x="696" y="322.2263288009889" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#9e9e9e">11.4%</text></g></g><g><path d="M416.5,293.5L553.5,293.5L553.5,306.5L696.5,306.5" stroke="#636363" stroke-width="1" stroke-opacity="0.7" fill-opacity="1" fill="none"></path><circle cx="416.5" cy="293.5" r="2" stroke="none" stroke-width="0" fill-opacity="0.7" fill="#636363"></circle></g><g><g><text text-anchor="start" x="136" y="181.57367119901113" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#000000">Другое</text></g><g><text text-anchor="start" x="136" y="204.22632880098888" font-family="Arial" font-size="14" stroke="none" stroke-width="0" fill="#9e9e9e">45.5%</text></g></g><g><path d="M325.5,188.5L279.5,188.5L279.5,188.5L136.5,188.5" stroke="#636363" stroke-width="1" stroke-opacity="0.7" fill-opacity="1" fill="none"></path><circle cx="325.5" cy="188.5" r="2" stroke="none" stroke-width="0" fill-opacity="0.7" fill="#636363"></circle></g></g><g></g></svg><div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Task</th><th>Hours per Day</th></tr></thead><tbody><tr><td>Рециркуляторы</td><td>11</td></tr><tr><td>Кислородные концентраторы</td><td>6</td></tr><tr><td>Тонометры</td><td>2</td></tr><tr><td>Увлажнители воздуха</td><td>5</td></tr><tr><td>Другое</td><td>20</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 410px; left: 841px; white-space: nowrap; font-family: Arial; font-size: 14px;">45.5%</div><div></div></div></div>
            </div>
            <div class="LkIndex-MediumContainer LkIndex-MediumContainer_Promo">
              <p class="LkIndex-Head_Big">Доступные промо коды</p>
              <div class="LkIndex-Slider slick-initialized slick-slider"><i class="slide-left slick-arrow" style=""></i><div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 12000px; transform: translate3d(-800px, 0px, 0px);"><div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" style="width: 800px;" tabindex="-1"><div><div class="LkIndex-SliderPromo" style="width: 100%; display: inline-block;">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div></div></div><div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 800px;"><div><div class="LkIndex-SliderPromo" style="width: 100%; display: inline-block;">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div></div></div><div class="slick-slide" data-slick-index="1" aria-hidden="true" style="width: 800px;" tabindex="-1"><div><div class="LkIndex-SliderPromo" style="width: 100%; display: inline-block;">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div></div></div><div class="slick-slide" data-slick-index="2" aria-hidden="true" style="width: 800px;" tabindex="-1"><div><div class="LkIndex-SliderPromo" style="width: 100%; display: inline-block;">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div></div></div><div class="slick-slide" data-slick-index="3" aria-hidden="true" style="width: 800px;" tabindex="-1"><div><div class="LkIndex-SliderPromo" style="width: 100%; display: inline-block;">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div></div></div><div class="slick-slide" data-slick-index="4" aria-hidden="true" style="width: 800px;" tabindex="-1"><div><div class="LkIndex-SliderPromo" style="width: 100%; display: inline-block;">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div></div></div><div class="slick-slide" data-slick-index="5" aria-hidden="true" style="width: 800px;" tabindex="-1"><div><div class="LkIndex-SliderPromo" style="width: 100%; display: inline-block;">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div></div></div><div class="slick-slide" data-slick-index="6" aria-hidden="true" style="width: 800px;" tabindex="-1"><div><div class="LkIndex-SliderPromo" style="width: 100%; display: inline-block;">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" style="width: 800px;" tabindex="-1"><div><div class="LkIndex-SliderPromo" style="width: 100%; display: inline-block;">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="8" aria-hidden="true" style="width: 800px;" tabindex="-1"><div><div class="LkIndex-SliderPromo" style="width: 100%; display: inline-block;">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="9" aria-hidden="true" style="width: 800px;" tabindex="-1"><div><div class="LkIndex-SliderPromo" style="width: 100%; display: inline-block;">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="10" aria-hidden="true" style="width: 800px;" tabindex="-1"><div><div class="LkIndex-SliderPromo" style="width: 100%; display: inline-block;">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="11" aria-hidden="true" style="width: 800px;" tabindex="-1"><div><div class="LkIndex-SliderPromo" style="width: 100%; display: inline-block;">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="12" aria-hidden="true" style="width: 800px;" tabindex="-1"><div><div class="LkIndex-SliderPromo" style="width: 100%; display: inline-block;">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="13" aria-hidden="true" style="width: 800px;" tabindex="-1"><div><div class="LkIndex-SliderPromo" style="width: 100%; display: inline-block;">
                  <p class="LkIndex-SliderPromoText">Промо-код:<span class="LkIndex-SliderPromoCode">93ops12r-ksdv</span></p>
                  <p class="LkIndex-SliderPromoTextDiscount">Скидка:<span class="LkIndex-SliderPromoDiscount">5%</span></p>
                  <p class="LkIndex-SliderPromoText">Действителен до:<span class="LkIndex-SliderPromoDate">27.06.18</span></p>
                </div></div></div></div></div><i class="slide-right slick-arrow" style=""></i></div>
              <p class="LkIndex-SliderPromoCount">1 / 7</p>
            </div>
            <div class="LkIndex-MediumContainer LkIndex-MediumContainer_Last">
              <p class="LkIndex-Head_Big">Действующие акции</p>
              <!--TODO Добавить див для внутреннего скрола-->
              <ul class="LkIndex-ActionList">
                <li class="LkIndex-ActionItem"><a class="LkIndex-ActionLink" href="#"><span class="LkIndex-ActionDash">—&nbsp;</span><span class="LkIndex-ActionName">Lorem Ipsum - это текст-"рыба", часто используемый в печать</span></a></li>
                <li class="LkIndex-ActionItem"><a class="LkIndex-ActionLink" href="#"><span class="LkIndex-ActionDash">—&nbsp;</span><span class="LkIndex-ActionName">Lorem Ipsum - это текст-"рыба", часто используемый в печать</span></a></li>
                <li class="LkIndex-ActionItem"><a class="LkIndex-ActionLink" href="#"><span class="LkIndex-ActionDash">—&nbsp;</span><span class="LkIndex-ActionName">Lorem Ipsum - это текст-"рыба", часто используемый в печать</span></a></li>
                <li class="LkIndex-ActionItem"><a class="LkIndex-ActionLink" href="#"><span class="LkIndex-ActionDash">—&nbsp;</span><span class="LkIndex-ActionName">Lorem Ipsum - это текст-"рыба", часто используемый в печать</span></a></li>
                <li class="LkIndex-ActionItem"><a class="LkIndex-ActionLink" href="#"><span class="LkIndex-ActionDash">—&nbsp;</span><span class="LkIndex-ActionName">Lorem Ipsum - это текст-"рыба", часто используемый в печать</span></a></li>
                <li class="LkIndex-ActionItem"><a class="LkIndex-ActionLink" href="#"><span class="LkIndex-ActionDash">—&nbsp;</span><span class="LkIndex-ActionName">Lorem Ipsum - это текст-"рыба", часто используемый в печать</span></a></li>
                <li class="LkIndex-ActionItem"><a class="LkIndex-ActionLink" href="#"><span class="LkIndex-ActionDash">—&nbsp;</span><span class="LkIndex-ActionName">Lorem Ipsum - это текст-"рыба", часто используемый в печать</span></a></li>
              </ul>
            </div>
            <div class="LkIndex-XlContainer">
              <p class="LkIndex-Head_Big">Новинки товаров</p>
              <div class="LkIndex-ProductWrap slick-initialized slick-slider"><i class="LkIndex-ProductWrap_ArrowRight slick-arrow" style=""></i><div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 3920px; transform: translate3d(-560px, 0px, 0px);"><div class="slick-slide slick-cloned" data-slick-index="-2" aria-hidden="true" style="width: 280px;" tabindex="-1"><div><div class="LkProduct" style="width: 100%; display: inline-block;"><a class="modalLink LkProduct-Head" href="#" data-id="quickview" tabindex="-1">Кресло-кровать для родовспоможения ЫС-М1</a><a class="LkProduct-Link" href="#" tabindex="-1"><img class="LkProduct-Image" src="images/product/product__image.png" alt="Кресло-кровать для родовспоможения ЫС-М1"></a>
                  <div class="LkProduct-Price">
                    <p class="LkProduct-Cost">47 990<span class="LkProduct-Value">&nbsp;₽</span></p>
                  </div><img class="LkProduct-Rating" src="images/product/rating.png" alt="рейтинг">
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" style="width: 280px;" tabindex="-1"><div><div class="LkProduct" style="width: 100%; display: inline-block;"><a class="modalLink LkProduct-Head" href="#" data-id="quickview" tabindex="-1">Кресло-кровать для родовспоможения ЫС-М1</a><a class="LkProduct-Link" href="#" tabindex="-1"><img class="LkProduct-Image" src="images/product/product__image.png" alt="Кресло-кровать для родовспоможения ЫС-М1"></a>
                  <div class="LkProduct-Price">
                    <p class="LkProduct-Cost">47 990<span class="LkProduct-Value">&nbsp;₽</span></p>
                  </div><img class="LkProduct-Rating" src="images/product/rating.png" alt="рейтинг">
                </div></div></div><div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 280px;"><div><div class="LkProduct" style="width: 100%; display: inline-block;"><a class="modalLink LkProduct-Head" href="#" data-id="quickview" tabindex="0">Кресло-кровать для родовспоможения ЫС-М1</a><a class="LkProduct-Link" href="#" tabindex="0"><img class="LkProduct-Image" src="images/product/product__image.png" alt="Кресло-кровать для родовспоможения ЫС-М1"></a>
                  <div class="LkProduct-Price">
                    <p class="LkProduct-Cost">47 990<span class="LkProduct-Value">&nbsp;₽</span></p>
                  </div><img class="LkProduct-Rating" src="images/product/rating.png" alt="рейтинг">
                </div></div></div><div class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 280px;"><div><div class="LkProduct" style="width: 100%; display: inline-block;"><a class="modalLink LkProduct-Head" href="#" data-id="quickview" tabindex="0">Кресло-кровать для родовспоможения ЫС-М1</a><a class="LkProduct-Link" href="#" tabindex="0"><img class="LkProduct-Image" src="images/product/product__image.png" alt="Кресло-кровать для родовспоможения ЫС-М1"></a>
                  <div class="LkProduct-Price">
                    <p class="LkProduct-Cost">47 990<span class="LkProduct-Value">&nbsp;₽</span></p>
                  </div><img class="LkProduct-Rating" src="images/product/rating.png" alt="рейтинг">
                </div></div></div><div class="slick-slide" data-slick-index="2" aria-hidden="true" style="width: 280px;" tabindex="-1"><div><div class="LkProduct" style="width: 100%; display: inline-block;"><a class="modalLink LkProduct-Head" href="#" data-id="quickview" tabindex="-1">Кресло-кровать для родовспоможения ЫС-М1</a><a class="LkProduct-Link" href="#" tabindex="-1"><img class="LkProduct-Image" src="images/product/product__image.png" alt="Кресло-кровать для родовспоможения ЫС-М1"></a>
                  <div class="LkProduct-Price">
                    <p class="LkProduct-Cost">47 990<span class="LkProduct-Value">&nbsp;₽</span></p>
                  </div><img class="LkProduct-Rating" src="images/product/rating.png" alt="рейтинг">
                </div></div></div><div class="slick-slide" data-slick-index="3" aria-hidden="true" style="width: 280px;" tabindex="-1"><div><div class="LkProduct" style="width: 100%; display: inline-block;"><a class="modalLink LkProduct-Head" href="#" data-id="quickview" tabindex="-1">Кресло-кровать для родовспоможения ЫС-М1</a><a class="LkProduct-Link" href="#" tabindex="-1"><img class="LkProduct-Image" src="images/product/product__image.png" alt="Кресло-кровать для родовспоможения ЫС-М1"></a>
                  <div class="LkProduct-Price">
                    <p class="LkProduct-Cost">47 990<span class="LkProduct-Value">&nbsp;₽</span></p>
                  </div><img class="LkProduct-Rating" src="images/product/rating.png" alt="рейтинг">
                </div></div></div><div class="slick-slide" data-slick-index="4" aria-hidden="true" style="width: 280px;" tabindex="-1"><div><div class="LkProduct" style="width: 100%; display: inline-block;"><a class="modalLink LkProduct-Head" href="#" data-id="quickview" tabindex="-1">Кресло-кровать для родовспоможения ЫС-М1</a><a class="LkProduct-Link" href="#" tabindex="-1"><img class="LkProduct-Image" src="images/product/product__image.png" alt="Кресло-кровать для родовспоможения ЫС-М1"></a>
                  <div class="LkProduct-Price">
                    <p class="LkProduct-Cost">47 990<span class="LkProduct-Value">&nbsp;₽</span></p>
                  </div><img class="LkProduct-Rating" src="images/product/rating.png" alt="рейтинг">
                </div></div></div><div class="slick-slide" data-slick-index="5" aria-hidden="true" style="width: 280px;" tabindex="-1"><div><div class="LkProduct" style="width: 100%; display: inline-block;"><a class="modalLink LkProduct-Head" href="#" data-id="quickview" tabindex="-1">Кресло-кровать для родовспоможения ЫС-М1</a><a class="LkProduct-Link" href="#" tabindex="-1"><img class="LkProduct-Image" src="images/product/product__image.png" alt="Кресло-кровать для родовспоможения ЫС-М1"></a>
                  <div class="LkProduct-Price">
                    <p class="LkProduct-Cost">47 990<span class="LkProduct-Value">&nbsp;₽</span></p>
                  </div><img class="LkProduct-Rating" src="images/product/rating.png" alt="рейтинг">
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" style="width: 280px;" tabindex="-1"><div><div class="LkProduct" style="width: 100%; display: inline-block;"><a class="modalLink LkProduct-Head" href="#" data-id="quickview" tabindex="-1">Кресло-кровать для родовспоможения ЫС-М1</a><a class="LkProduct-Link" href="#" tabindex="-1"><img class="LkProduct-Image" src="images/product/product__image.png" alt="Кресло-кровать для родовспоможения ЫС-М1"></a>
                  <div class="LkProduct-Price">
                    <p class="LkProduct-Cost">47 990<span class="LkProduct-Value">&nbsp;₽</span></p>
                  </div><img class="LkProduct-Rating" src="images/product/rating.png" alt="рейтинг">
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" style="width: 280px;" tabindex="-1"><div><div class="LkProduct" style="width: 100%; display: inline-block;"><a class="modalLink LkProduct-Head" href="#" data-id="quickview" tabindex="-1">Кресло-кровать для родовспоможения ЫС-М1</a><a class="LkProduct-Link" href="#" tabindex="-1"><img class="LkProduct-Image" src="images/product/product__image.png" alt="Кресло-кровать для родовспоможения ЫС-М1"></a>
                  <div class="LkProduct-Price">
                    <p class="LkProduct-Cost">47 990<span class="LkProduct-Value">&nbsp;₽</span></p>
                  </div><img class="LkProduct-Rating" src="images/product/rating.png" alt="рейтинг">
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="8" aria-hidden="true" style="width: 280px;" tabindex="-1"><div><div class="LkProduct" style="width: 100%; display: inline-block;"><a class="modalLink LkProduct-Head" href="#" data-id="quickview" tabindex="-1">Кресло-кровать для родовспоможения ЫС-М1</a><a class="LkProduct-Link" href="#" tabindex="-1"><img class="LkProduct-Image" src="images/product/product__image.png" alt="Кресло-кровать для родовспоможения ЫС-М1"></a>
                  <div class="LkProduct-Price">
                    <p class="LkProduct-Cost">47 990<span class="LkProduct-Value">&nbsp;₽</span></p>
                  </div><img class="LkProduct-Rating" src="images/product/rating.png" alt="рейтинг">
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="9" aria-hidden="true" style="width: 280px;" tabindex="-1"><div><div class="LkProduct" style="width: 100%; display: inline-block;"><a class="modalLink LkProduct-Head" href="#" data-id="quickview" tabindex="-1">Кресло-кровать для родовспоможения ЫС-М1</a><a class="LkProduct-Link" href="#" tabindex="-1"><img class="LkProduct-Image" src="images/product/product__image.png" alt="Кресло-кровать для родовспоможения ЫС-М1"></a>
                  <div class="LkProduct-Price">
                    <p class="LkProduct-Cost">47 990<span class="LkProduct-Value">&nbsp;₽</span></p>
                  </div><img class="LkProduct-Rating" src="images/product/rating.png" alt="рейтинг">
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="10" aria-hidden="true" style="width: 280px;" tabindex="-1"><div><div class="LkProduct" style="width: 100%; display: inline-block;"><a class="modalLink LkProduct-Head" href="#" data-id="quickview" tabindex="-1">Кресло-кровать для родовспоможения ЫС-М1</a><a class="LkProduct-Link" href="#" tabindex="-1"><img class="LkProduct-Image" src="images/product/product__image.png" alt="Кресло-кровать для родовспоможения ЫС-М1"></a>
                  <div class="LkProduct-Price">
                    <p class="LkProduct-Cost">47 990<span class="LkProduct-Value">&nbsp;₽</span></p>
                  </div><img class="LkProduct-Rating" src="images/product/rating.png" alt="рейтинг">
                </div></div></div><div class="slick-slide slick-cloned" data-slick-index="11" aria-hidden="true" style="width: 280px;" tabindex="-1"><div><div class="LkProduct" style="width: 100%; display: inline-block;"><a class="modalLink LkProduct-Head" href="#" data-id="quickview" tabindex="-1">Кресло-кровать для родовспоможения ЫС-М1</a><a class="LkProduct-Link" href="#" tabindex="-1"><img class="LkProduct-Image" src="images/product/product__image.png" alt="Кресло-кровать для родовспоможения ЫС-М1"></a>
                  <div class="LkProduct-Price">
                    <p class="LkProduct-Cost">47 990<span class="LkProduct-Value">&nbsp;₽</span></p>
                  </div><img class="LkProduct-Rating" src="images/product/rating.png" alt="рейтинг">
                </div></div></div></div></div><i class="LkIndex-ProductWrap_ArrowLeft slick-arrow" style=""></i></div>
              <p class="LkIndex-ProductCount">1 / 6</p>
            </div>
            <div class="LkIndex-XlContainer LkIndex-XlContainer_Last">
              <p class="LkIndex-Head_Big">Рекомендуемые видео</p>
              <div class="LkIndex-VideoWrap slick-initialized slick-slider"><i class="LkIndex-VideoWrap_ArrowRight slick-arrow" style=""></i><div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 5850px; transform: translate3d(-650px, 0px, 0px);"><div class="slick-slide slick-cloned" data-slick-index="-1" aria-hidden="true" style="width: 650px;" tabindex="-1"><div><iframe width="650" height="365" src="https://www.youtube.com/embed/0dRQJRtEODc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" style="width: 100%; display: inline-block;"></iframe></div></div><div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 650px;"><div><iframe width="650" height="365" src="https://www.youtube.com/embed/G4sS2Uzwwqk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" style="width: 100%; display: inline-block;"></iframe></div></div><div class="slick-slide" data-slick-index="1" aria-hidden="true" style="width: 650px;" tabindex="-1"><div><iframe width="650" height="365" src="https://www.youtube.com/embed/TyF6SKxaANo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" style="width: 100%; display: inline-block;"></iframe></div></div><div class="slick-slide" data-slick-index="2" aria-hidden="true" style="width: 650px;" tabindex="-1"><div><iframe width="650" height="365" src="https://www.youtube.com/embed/KD_hdv2oI80" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" style="width: 100%; display: inline-block;"></iframe></div></div><div class="slick-slide" data-slick-index="3" aria-hidden="true" style="width: 650px;" tabindex="-1"><div><iframe width="650" height="365" src="https://www.youtube.com/embed/0dRQJRtEODc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" style="width: 100%; display: inline-block;"></iframe></div></div><div class="slick-slide slick-cloned" data-slick-index="4" aria-hidden="true" style="width: 650px;" tabindex="-1"><div><iframe width="650" height="365" src="https://www.youtube.com/embed/G4sS2Uzwwqk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" style="width: 100%; display: inline-block;"></iframe></div></div><div class="slick-slide slick-cloned" data-slick-index="5" aria-hidden="true" style="width: 650px;" tabindex="-1"><div><iframe width="650" height="365" src="https://www.youtube.com/embed/TyF6SKxaANo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" style="width: 100%; display: inline-block;"></iframe></div></div><div class="slick-slide slick-cloned" data-slick-index="6" aria-hidden="true" style="width: 650px;" tabindex="-1"><div><iframe width="650" height="365" src="https://www.youtube.com/embed/KD_hdv2oI80" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" style="width: 100%; display: inline-block;"></iframe></div></div><div class="slick-slide slick-cloned" data-slick-index="7" aria-hidden="true" style="width: 650px;" tabindex="-1"><div><iframe width="650" height="365" src="https://www.youtube.com/embed/0dRQJRtEODc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen="" style="width: 100%; display: inline-block;"></iframe></div></div></div></div><i class="LkIndex-VideoWrap_ArrowLeft slick-arrow" style=""></i></div>
              <p class="LkIndex-VideoCount">1 / 4</p>
            </div>
          </div>


<p><?php
	/* translators: 1: user display name 2: logout url */
	printf(
		__( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ),
		'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
		esc_url( wc_logout_url( wc_get_page_permalink( 'myaccount' ) ) )
	);
?></p>

<p><?php
	printf(
		__( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a> and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' ),
		esc_url( wc_get_endpoint_url( 'orders' ) ),
		esc_url( wc_get_endpoint_url( 'edit-address' ) ),
		esc_url( wc_get_endpoint_url( 'edit-account' ) )
	);
?></p>

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
