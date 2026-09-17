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


                <!-- <div class="reviews-slider__prev swiper-button-prev"></div>
                <div class="reviews-slider__next swiper-button-next"></div>

                <div class="reviews-slider__pagination swiper-pagination"></div> -->

            </div>

        <?php endif; ?>

    </div>

</section>