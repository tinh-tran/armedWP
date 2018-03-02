<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$product_images_class  	= woodmart_product_images_class();
$product_summary_class 	= woodmart_product_summary_class();
$single_product_class  	= woodmart_single_product_class();
$content_class 			= woodmart_get_content_class();
$product_design 		= woodmart_product_design();

$container_summary = 'container';

if( woodmart_get_opt( 'single_full_width' ) ) {
	$container_summary = 'container-fluid';
}


?>

<?php if ( $product_design == 'alt' ): ?>
	<div class="single-breadcrumbs-wrapper">
		<div class="container">
			<?php woocommerce_breadcrumb(); ?>
			<?php if ( woodmart_get_opt( 'products_nav' ) ): ?>
				<?php woodmart_products_nav(); ?>
			<?php endif ?>
		</div>
	</div>
<?php endif ?>

<div class="container">
	<?php
		/**
		 * woocommerce_before_single_product hook
		 *
		 * @hooked wc_print_notices - 10
		 */
		 do_action( 'woocommerce_before_single_product' );

		 if ( post_password_required() ) {
		 	echo get_the_password_form();
		 	return;
		 }

	?>
</div>
<div id="product-<?php the_ID(); ?>" <?php post_class( $single_product_class ); ?>>

	<div class="<?php echo esc_attr( $container_summary ); ?>">

		<div class="row product-image-summary-wrap">
			<div class="product-image-summary <?php echo esc_attr( $content_class ); ?>">
				<div class="row product-image-summary-inner">
					<div class="<?php echo esc_attr( $product_images_class ); ?> product-images">
						<div class="product-images-inner">
							<?php
								/**
								 * woocommerce_before_single_product_summary hook
								 *
								 * @hooked woocommerce_show_product_sale_flash - 10
								 * @hooked woocommerce_show_product_images - 20
								 */
								do_action( 'woocommerce_before_single_product_summary' );
							?>
						</div>
					</div>
					<div class="<?php echo esc_attr( $product_summary_class ); ?> summary entry-summary">
						<div class="summary-inner">
							<?php if ( $product_design == 'default' ): ?>

							<?php endif ?>

                            <div class="short-description">
                                <?php
                                if ( !function_exists( 'woocommerce_template_single_excerpt' ) ) {
                                    require_once '/includes/wc-template-functions.php';
                                }
                                // NOTICE! Understand what this does before running.
                                $result = woocommerce_template_single_excerpt();
                                ?>
                            </div>

                            <?php echo do_shortcode("[vc_separator]"); ?>


                            <div class="view__inner-feature">


                                <?php

                                /*
                                 * Задаем переменные для вывода характеристик
                                 * ==========================================
                                 * Основные характеристики
                                 */
                                $varWeight = "_weight";
                                $weight = get_field_object($varWeight);

                                // Кислородные концентраторы
                                $concentrators = acf_get_fields('4616');
                                // Рециркуляторы
                                $recirculators = acf_get_fields('4626');
                                // Коляски
                                $kolyaskis     = acf_get_fields('4663');

                                ?>

                                <div class="view__item-feature__text">
                                    <div class="view__item-feature__text-name view-feature-title">
                                        <p>Характеристики:</p>
                                    </div>
                                    <div class="view__item-feature__text-value view-feature-title view-feature-width"><a href="#detail">Все характеристики</a></div>
                                </div>

                                <?php // Габаритные размеры Высота-Ширина-Глубина
                                    if( get_field('_height') ):
                                ?>
                                    <div class="view__item-feature__text">
                                        <div class="view__item-feature__text-name">
                                            <p>Габаритные размеры (ВхШхГ) (± 5%)</p>
                                        </div>
                                        <div class="view__item-feature__text-value">
                                            <p><?php the_field('_height'); ?>x<?php the_field('_width'); ?>x<?php the_field('_length'); ?> мм</p>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php //Вес товара
                                    if( $weight ):
                                ?>
                                    <div class="view__item-feature__text">
                                        <div class="view__item-feature__text-name">
                                            <p><?php echo $weight['label']; ?></p>
                                        </div>
                                        <div class="view__item-feature__text-value">
                                            <p><?php echo $weight['value']; ?> кг</p>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php
                                /*
                                 * =========================================
                                 * Кислородные концентраторы
                                 * =========================================
                                 */
                                    if( $concentrators )
                                        $i = 0;
                                    {
                                        foreach( $concentrators as $concentrator )
                                        { $i++;
                                        if($i >5) break;
                                            $value = get_field( $concentrator['name'] );
                                            if ($concentrator['choices']){
                                                $map = array(
                                                    'yes' => '<i class="icon-ok"></i>'
                                                );
                                                $value = $map[ $value ];
                                            } else {
                                            }
                                            if( $value && $value != 'no') {
                                                echo '<div class="view__item-feature__text">';
                                                    echo '<div class="view__item-feature__text-name"><p>' . $concentrator['label'] . '</p></div>';
                                                    echo '<div class="view__item-feature__text-value"><p>' . $value . '</p></div>';
                                                echo '</div>';
                                            }
                                        }
                                    }
                                ?>

                                <?php
                                /*
                                 * =========================================
                                 * Рециркуляторы
                                 * =========================================
                                 */
                                if( $recirculators )
                                    $i = 0;
                                {
                                    foreach( $recirculators as $recirculator )
                                    { $i++;
                                    if($i >5) break;
                                        $value = get_field( $recirculator['name'] );
                                        if ($recirculator['choices']){
                                            $map = array(
                                                'yes' => '<i class="icon-ok"></i>'
                                            );
                                            $value = $map[ $value ];
                                        } else {
                                        }
                                        if( $value && $value != 'no') {
                                            echo '<div class="view__item-feature__text">';
                                                echo '<div class="view__item-feature__text-name"><p>' . $recirculator['label'] . '</p></div>';
                                                echo '<div class="view__item-feature__text-value"><p>' . $value . '</p></div>';
                                            echo '</div>';
                                        }
                                    }
                                }
                                ?>

                                <?php
                                /*
                                 * =========================================
                                 * Коляски
                                 * =========================================
                                 */
                                if( $kolyaskis )
                                    $i = 0;
                                {
                                    foreach( $kolyaskis as $kolyaski )
                                    { $i++;
                                        if($i >6) break;
                                        $value = get_field( $kolyaski['name'] );
                                        if ($kolyaski['choices']){
                                            $map = array(
                                                'yes' => '<i class="icon-ok"></i>'
                                            );
                                            $value = $map[ $value ];
                                        } else {
                                        }
                                        if( $value && $value != 'no') {
                                            echo '<div class="view__item-feature__text">';
                                                echo '<div class="view__item-feature__text-name"><p>' . $kolyaski['label'] . '</p></div>';
                                                echo '<div class="view__item-feature__text-value"><p>' . $value . '</p></div>';
                                            echo '</div>';
                                        }
                                    }
                                }
                                ?>
                            </div>


                            <div class="add-to-cart">
                                <?php
                                if ( !function_exists( 'woocommerce_template_single_add_to_cart' ) ) {
                                    require_once '/includes/wc-template-functions.php';
                                }
                                // NOTICE! Understand what this does before running.
                                $result = woocommerce_template_single_add_to_cart();
                                ?>
                            </div>

                            <!-- TODO Обычное отображение summary информации (Сделать в мобильке) -->
                            <div>
                                <?php
                                    /**
                                     * woocommerce_single_product_summary hook
                                     *
                                     * @hooked woocommerce_template_single_title - 5
                                     * @hooked woocommerce_template_single_rating - 10
                                     * @hooked woocommerce_template_single_price - 10
                                     * @hooked woocommerce_template_single_excerpt - 20
                                     * @hooked woocommerce_template_single_add_to_cart - 30
                                     * @hooked woocommerce_template_single_meta - 40
                                     * @hooked woocommerce_template_single_sharing - 50
                                     */
                                    //do_action( 'woocommerce_single_product_summary' );
                                ?>
                            </div>
						</div>
					</div>
				</div><!-- .summary -->
			</div>

			<?php 
				/**
				 * woocommerce_sidebar hook
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				do_action( 'woocommerce_sidebar' );
			?>

		</div>
		
		<?php
			/**
			 * woodmart_after_product_content hook
			 *
			 * @hooked woodmart_product_extra_content - 20
			 */
			do_action( 'woodmart_after_product_content' );
		?>

	</div>


	<div class="product-tabs-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 poduct-tabs-inner">

                    <section id="advantages">

                        <div class="wpb_text_column wpb_content_element  dropdown-catalog__category_title product-single__title">
                            <h2>Преимущества</h2>
                        </div>


                        <div class="slider-advantages">
                            <?php if( have_rows('advantages') ): ?>

                                    <?php while( have_rows('advantages') ): the_row();

                                        // vars
                                        $title = get_sub_field('advantages_title');
                                        $image = get_sub_field('advantages_images');
                                        $content = get_sub_field('advantages_description');

                                        ?>


                                            <div class="advantages-item">
                                                <img src="<?php echo $image; ?>" alt="" />
                                                <div class="single-product__preim">
                                                    <h5><?php echo $title; ?></h5>
                                                    <p><?php echo $content; ?></p>
                                                </div>
                                            </div>


                                    <?php endwhile; ?>
                        </div>
                        <?php endif; ?>
                    </section>

                    <?php echo do_shortcode("[vc_separator]"); ?>

                    <section id="video">
                        <div class="wpb_text_column wpb_content_element  dropdown-catalog__category_title product-single__title">
                            <h2>Видео</h2>
                        </div>

                        <div class="slider-video">
                            <?php if( have_rows('video') ): ?>

                                <?php while( have_rows('video') ): the_row();

                                //vars
                                $title = get_sub_field('video_title');
                                $link = get_sub_field('video_link');

                                ?>

                                    <div class="video-item">
                                        <h2 class="wpb_heading wpb_video_heading"><?php echo $title; ?></h2>
                                        <!--<div style="width:509px;height:286px;" class="youtube" id="<?php echo $link; ?>" data-params="modestbranding=1&showinfo=0&controls=0&vq=hd720"></div>-->
                                        <iframe width="509" height="286" src="https://www.youtube.com/embed/<?php echo $link; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>


                            <?php endwhile; ?>
                        </div>
                        <?php endif; ?>
                    </section>

                    <?php echo do_shortcode("[vc_separator]"); ?>

                    <section id="detail">
                        <div class="wpb_text_column wpb_content_element  dropdown-catalog__category_title product-single__title">
                            <h2>Характеристики</h2>
                        </div>

                        <div class="wpb_text_column detail__table-title">
                            <div class="wpb_wrapper">
                                <p>Основные характеристики</p>

                            </div>
                        </div>
                        <table class="detail__table" id="detail-table">
                            <tbody>
                            <?php // Габаритные размеры
                                if ( get_field('_height') ):
                            ?>
                                <tr>
                                    <th>
                                        <p class="detail__table-item">Габаритные размеры (ВхШхГ) (± 5%)</p>
                                    </th>
                                    <td>
                                        <p class="detail__table-item"><?php the_field('_height'); ?>x<?php the_field('_width'); ?>x<?php the_field('_length'); ?> мм</p>
                                    </td>
                                </tr>
                            <?php endif; ?>

                            <?php // Вес продукта
                                if ($weight):
                            ?>
                                <tr>
                                    <th>
                                        <p class="detail__table-item"><?php echo $weight['label']; ?></p>
                                    </th>
                                    <td>
                                        <p class="detail__table-item"><?php echo $weight['value']; ?></p>
                                    </td>
                                </tr>
                            <?php endif; ?>

                            <?php
                            /*
                             * =========================================
                             * Кислородные концентраторы
                             * =========================================
                             */
                            if( $concentrators )
                            {
                                foreach( $concentrators as $concentrator )
                                {
                                    $value = get_field( $concentrator['name'] );
                                    if ($concentrator['choices']){
                                        $map = array(
                                            'yes' => '<i class="icon-ok"></i>'
                                        );
                                        $value = $map[ $value ];
                                    } else {
                                    }
                                    if( $value && $value != 'no') {
                                        echo '<tr>';
                                            echo '<th><p class="detail__table-item">' . $concentrator['label'] . '</p></th>';
                                            echo '<td><p class="detail__table-item">' . $value . '</p></td>';
                                        echo '</tr>';
                                    }
                                }
                            }
                            ?>

                            <?php
                            /*
                             * =========================================
                             * Рециркуляторы
                             * =========================================
                             */
                            if( $recirculators )
                            {
                                foreach( $recirculators as $recirculator )
                                {
                                    $value = get_field( $recirculator['name'] );
                                    if ($recirculator['choices']){
                                        $map = array(
                                            'yes' => '<i class="icon-ok"></i>'
                                        );
                                        $value = $map[ $value ];
                                    } else {
                                    }
                                    if( $value && $value != 'no') {
                                        echo '<tr>';
                                            echo '<th><p class="detail__table-item">' . $recirculator['label'] . '</p></th>';
                                            echo '<td><p class="detail__table-item">' . $value . '</p></td>';
                                        echo '</tr>';
                                    }
                                }
                            }
                            ?>

                            <?php
                            /*
                             * =========================================
                             * Коляски
                             * =========================================
                             */
                            if( $kolyaskis )
                            {
                                foreach( $kolyaskis as $kolyaski )
                                {
                                    $value = get_field( $kolyaski['name'] );
                                    if ($kolyaski['choices']){
                                        $map = array(
                                            'yes' => '<i class="icon-ok"></i>'
                                        );
                                        $value = $map[ $value ];
                                    } else {
                                    }
                                    if( $value && $value != 'no') {
                                        echo '<tr>';
                                            echo '<th><p class="detail__table-item">' . $kolyaski['label'] . '</p></th>';
                                            echo '<td><p class="detail__table-item">' . $value . '</p></td>';
                                        echo '</tr>';
                                    }
                                }
                            }
                            ?>

                            </tbody>
                        </table>


                        <div class="wpb_text_column detail__table-title">
                            <div class="wpb_wrapper">
                                <p>Прочие</p>

                            </div>
                        </div>
                        <table class="detail__table">
                            <tbody>

                                <tr>
                                    <th>
                                        <p class="detail__table-item">Гарантия<a class="product__question product__question-detail" title="Информация о гарантии или другом" href="#"></a></p>
                                    </th>
                                    <td>
                                        <p class="detail__table-item detail__table-item__success">Есть</p>
                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </section>

                    <?php echo do_shortcode("[vc_separator]"); ?>

                    <section id="complect">
                        <div class="wpb_text_column wpb_content_element  dropdown-catalog__category_title product-single__title">
                            <h2>Состав комплекта</h2>
                        </div>
                    </section>

                    <?php echo do_shortcode("[vc_separator]"); ?>

                    <section id="full-description">
                        <div class="wpb_text_column wpb_content_element  dropdown-catalog__category_title product-single__title">
                            <h2>Описание товара</h2>
                        </div>
                        <div class="wpb_text_column wpb_content_element  description_product">
                            <?php the_field('full_description'); ?>
                        </div>

                    </section>

                    <?php echo do_shortcode("[vc_separator]"); ?>

					<?php
						/**
						 * woocommerce_after_single_product_summary hook
						 *
						 * @hooked woocommerce_output_product_data_tabs - 10
						 * @hooked woocommerce_upsell_display - 15
						 * @hooked woocommerce_output_related_products - 20
						 */
						do_action( 'woocommerce_after_single_product_summary' );
					?>
				</div>
			</div>	
		</div>
	</div>

	<?php
		do_action( 'woodmart_after_product_tabs' );
	?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
