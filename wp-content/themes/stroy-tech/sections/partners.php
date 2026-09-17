<?php
$partners_subtitle = carbon_get_the_post_meta('subtitle');
$partners_title    = carbon_get_the_post_meta('title');
$partners_slides   = carbon_get_the_post_meta('slider-partners');
?>

<section class="partners-section">
    <div class="partners-section__inner">

        <div class="partners-section__inner__header">
            <?php if ($partners_title) : ?>
                <h2 class="partners-section__title">
                    <?php echo esc_html($partners_title); ?>
                </h2>
            <?php endif; ?>
            <?php if ($partners_subtitle) : ?>
                <div class="partners-section__subtitle">
                    <?php echo esc_html($partners_subtitle); ?>
                </div>
            <?php endif; ?>
        </div>


        <?php if (!empty($partners_slides)) : ?>
            <div class="fixed-container">
                <div class="partners-slider swiper">

                    <div class="swiper-wrapper">

                        <?php foreach ($partners_slides as $slide) : ?>

                            <?php
                            $partner_name = $slide['crb_partner_name'] ?? '';
                            $partner_logo = $slide['crb_partner_logo'] ?? 0;
                            ?>

                            <div class="partners-slider__slide swiper-slide">

                                <?php if ($partner_logo) : ?>


                                    <?php
                                    echo wp_get_attachment_image(
                                        $partner_logo,
                                        'full',
                                        false,
                                        [
                                            'alt' => $partner_name
                                                ? esc_attr($partner_name)
                                                : '',
                                        ]
                                    );
                                    ?>


                                <?php endif; ?>

                            </div>

                        <?php endforeach; ?>

                    </div>

                    <!-- Навигация -->
                    <!-- <div class="partners-slider__prev swiper-button-prev"></div>
                    <div class="partners-slider__next swiper-button-next"></div> -->

                    <!-- Пагинация -->
                    <!-- <div class="partners-slider__pagination swiper-pagination"></div> -->

                </div>
            </div>


        <?php endif; ?>


    </div>
</section>