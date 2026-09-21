<?php
$reviews_title = carbon_get_the_post_meta('reviews_title');
$reviews_list  = carbon_get_the_post_meta('reviews_list');
?>

<section class="reviews-section">

    <div class="fixed-container">

        <?php if ($reviews_title) : ?>
            <div class="reviews-section__title" data-scroll-animation="fade">
                <h2>
                    <?php echo esc_html($reviews_title); ?>
                </h2>
            </div>
        <?php endif; ?>


        <?php if (!empty($reviews_list)) : ?>

            <div class="reviews-slider swiper" data-scroll-animation="fade-left">

                <div class="swiper-wrapper">

                    <?php foreach ($reviews_list as $item) : ?>

                        <?php
                        $review_image_id = $item['review_item'] ?? 0;

                        if (!$review_image_id) {
                            continue;
                        }

                        $review_full_url = wp_get_attachment_image_url(
                            $review_image_id,
                            'full'
                        );

                        $review_alt = get_post_meta(
                            $review_image_id,
                            '_wp_attachment_image_alt',
                            true
                        );
                        ?>

                        <div class="reviews-slider__slide swiper-slide">

                            <a
                                href="<?php echo esc_url($review_full_url); ?>"
                                class="reviews-slider__link"
                                data-fancybox="reviews"
                                data-caption="<?php echo esc_attr($review_alt); ?>">
                                <?php
                                echo wp_get_attachment_image(
                                    $review_image_id,
                                    'large',
                                    false,
                                    [
                                        'class' => 'reviews-slider__image',
                                        'alt'   => $review_alt,
                                    ]
                                );
                                ?>
                            </a>

                        </div>

                    <?php endforeach; ?>

                </div>


                <div class="slider-navigation">
                    <div class="reviews-slider__prev swiper-button-prev"> <svg width="66" height="15" viewBox="0 0 66 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.292893 6.65715C-0.0976333 7.04767 -0.0976334 7.68083 0.292892 8.07136L6.65685 14.4353C7.04738 14.8258 7.68054 14.8258 8.07107 14.4353C8.46159 14.0448 8.46159 13.4116 8.07107 13.0211L2.41422 7.36425L8.07107 1.7074C8.46159 1.31687 8.46159 0.683709 8.07107 0.293185C7.68054 -0.0973395 7.04738 -0.0973395 6.65685 0.293185L0.292893 6.65715ZM66 7.36426L66 6.36426L1 6.36425L1 7.36425L1 8.36425L66 8.36426L66 7.36426Z" fill="#3B0070" />
                        </svg>
                    </div>
                    <div class="reviews-slider__next swiper-button-next"><svg width="66" height="15" viewBox="0 0 66 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M65.7071 8.07136C66.0976 7.68084 66.0976 7.04768 65.7071 6.65715L59.3431 0.29319C58.9526 -0.0973344 58.3195 -0.0973344 57.9289 0.29319C57.5384 0.683714 57.5384 1.31688 57.9289 1.7074L63.5858 7.36426L57.9289 13.0211C57.5384 13.4116 57.5384 14.0448 57.9289 14.4353C58.3195 14.8259 58.9526 14.8259 59.3431 14.4353L65.7071 8.07136ZM0 7.36426L0 8.36426L65 8.36426V7.36426V6.36426L0 6.36426L0 7.36426Z" fill="#3B0070" />
                        </svg></div>
                </div>

                <!-- 
                <div class="reviews-slider__pagination swiper-pagination"></div> -->

            </div>

        <?php endif; ?>

    </div>

</section>