<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
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
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_edit_account_form' ); ?>


<div class="profile">
<form class="woocommerce-EditAccountForm edit-account" action="" method="post">
            <h2 class="profile__head head-lk"><span class="head-lk__icon head-lk__icon_profile"></span>Редактирование профиля</h2>
            <div class="profile__wrapp">
              <div class="profile__user-edit">
                <label class="profile__label" for="ProfileName">Имя
                  <input class="profile__input" type="text" name="account_first_name" id="account_first_name" value="<?php echo esc_attr( $user->first_name ); ?>" />
                </label>
                <label class="profile__label" for="ProfileSurname">Фамилия
                  <input class="profile__input" type="text" name="account_last_name" id="account_last_name" value="<?php echo esc_attr( $user->last_name ); ?>" />
                </label>
                <label class="profile__label" for="ProfileMiddleName">Отчество
                  <input class="profile__input" type="text" name="account_middle_name" value="<?php echo esc_attr(get_the_author_meta( 'account_middle_name', $user->ID )); ?>" />
                </label>
                <label class="profile__label" for="ProfilePhone">Номер телефона
                  <input class="profile__input" type="text" name="tel" value="<?php echo esc_attr(get_the_author_meta( 'tel', $user->ID )); ?>"/>
                </label>
                <label class="profile__label" for="ProfileMail">Электронная почта
                  <input class="profile__input" type="text" name="account_email" id="account_email" value="<?php echo esc_attr( $user->user_email ); ?>" />
                </label>
              </div>
              <div class="profile__pass-edit">
                <div class="profile__input-goup">
                  <label class="profile__label" for="ProfileOldPass">Старый пароль
                    <input class="profile__input" type="text" name="password_current" id="password_current" />
                  </label>
                  <label class="profile__label" for="ProfileNewPass">Новый пароль
                    <input class="profile__input" type="text" name="password_1" id="password_1" />
                  </label>
                  <label class="profile__label" for="ProfileConfirmPass">Подтверждение пароля
                    <input class="profile__input" type="text" name="password_2" id="password_2" />
                  </label>
                </div>
                <div class="profile__social-group">
                  <p class="profile__text">Привязка социальных сетей</p>
                  <div class="profile__social social"><a class="social__element social__element_vk-lg social__element_lg social__link" href="#"></a><a class="social__element social__element_fb-lg social__element_lg social__link" href="#"></a><a class="social__element social__element_od-lg social__element_lg social__link" href="#"></a><a class="social__element social__element_in-lg social__element_lg social__link" href="#"></a><a class="social__element social__element_you-lg social__element_lg social__link" href="#"></a></div>
                </div>
              </div>
            </div>
            <div class="profile__checkbox">
              <label class="control control-checkbox" for="profileRass">
                <input class="check__form-input--checkbox" type="checkbox" name="profileRass" id="profileRass">
                <div class="control_indicator"></div><span class="check__form-checkbox--information">Получать рассылку о акции и новостях на электронную почту</span>
              </label>
              <label class="control control-checkbox" for="profileUved">
                <input class="check__form-input--checkbox" type="checkbox" name="profileUved" id="profileUved">
                <div class="control_indicator"></div><span class="check__form-checkbox--information">Получать уведомления об изменениях в заказе на электроную почту</span>
              </label>
              <label class="control control-checkbox" for="profilePhoneRss">
                <input class="check__form-input--checkbox" type="checkbox" name="profilePhone" id="profilePhoneRss">
                <div class="control_indicator"></div><span class="check__form-checkbox--information">Получать уведомления об изменениях в заказе на телефон</span>
              </label>
            </div>
            <div class="profile__button-wrapp button__wrapp"><a class="Button Button_Color_Not Button_Size_Sm"><span class="Button-Text Button-Text_Color_Black"><span class="Button-Icon Button-Icon_Cancel"></span>Отмена</span></a><a class="Button Button_Color_Red Button_Size_Lg"><span class="Button-Text Button-Text_Color_White Button-Text_Uppercase">Сохранить</span></a>
              <!--button.profile__cancel-button.button.button_white.button_icon.button_md
              span.button__text.button__text_white
                  span.button__icon.button__icon_cancel
                  | Отмена
              -->
              <!--button.product__button.button.button_icon.button_md
              span.button__text
                  | Сохранить
              -->
            </div>
          </div>
<?php do_action( 'woocommerce_edit_account_form' ); ?>

	<p>
		<?php wp_nonce_field( 'save_account_details' ); ?>
		<button type="submit" class="woocommerce-Button button" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
		<input type="hidden" name="action" value="save_account_details" />
	</p>

	<?php do_action( 'woocommerce_edit_account_form_end' ); ?>
</form>





	

<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
