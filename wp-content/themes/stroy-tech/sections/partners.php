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

                    <div class="slider-navigation">
                        <div class="slider__prev swiper-button-prev"> <svg width="66" height="15" viewBox="0 0 66 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.292893 6.65715C-0.0976333 7.04767 -0.0976334 7.68083 0.292892 8.07136L6.65685 14.4353C7.04738 14.8258 7.68054 14.8258 8.07107 14.4353C8.46159 14.0448 8.46159 13.4116 8.07107 13.0211L2.41422 7.36425L8.07107 1.7074C8.46159 1.31687 8.46159 0.683709 8.07107 0.293185C7.68054 -0.0973395 7.04738 -0.0973395 6.65685 0.293185L0.292893 6.65715ZM66 7.36426L66 6.36426L1 6.36425L1 7.36425L1 8.36425L66 8.36426L66 7.36426Z" fi070" />
                            </svg>
                        </div>
                        <div class="slider__next swiper-button-next"><svg width="66" height="15" viewBox="0 0 66 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M65.7071 8.07136C66.0976 7.68084 66.0976 7.04768 65.7071 6.65715L59.3431 0.29319C58.9526 -0.0973344 58.3195 -0.0973344 57.9289 0.29319C57.5384 0.683714 57.5384 1.31688 57.9289 1.7074L63.5858 7.36426L57.9289 13.0211C57.5384 13.4116 57.5384 14.0448 57.9289 14.4353C58.3195 14.8259 58.9526 14.8259 59.3431 14.4353L65.7071 8.07136ZM0 7.36426L0 8.36426L65 8.36426V7.36426V6.36426L0 6.36426L0 7.36426Z" fill="#3B0070" />
                            </svg></div>
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