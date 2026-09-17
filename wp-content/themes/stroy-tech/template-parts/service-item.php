<?php
$service_id = get_the_ID();

// Изображение
$image = get_the_post_thumbnail_url($service_id, 'full');

// Подробности услуги
$details = carbon_get_post_meta($service_id, 'service_details');
?>

<article class="service-item" data-scroll-animation="fade">

    <div class="service-item__image">

        <?php if ($image) : ?>

            <img
                src="<?php echo esc_url($image); ?>"
                alt="<?php echo esc_attr(get_the_title($service_id)); ?>">

        <?php else : ?>

            <img
                src="<?php echo esc_url(get_template_directory_uri() . '/imgs/svg/placeholder.svg'); ?>"
                alt="">

        <?php endif; ?>

    </div>

    <div class="service-item__content">

        <h3 class="service-item__title">
            <?php echo esc_html(get_the_title($service_id)); ?>
        </h3>

        <?php if (!empty($details)) : ?>

            <ul class="service-item__details list-style-markers">

                <?php foreach ($details as $detail) : ?>

                    <?php if (!empty($detail['text'])) : ?>

                        <li class="service-item__detail">
                            <?php echo esc_html($detail['text']); ?>
                        </li>

                    <?php endif; ?>

                <?php endforeach; ?>

            </ul>

        <?php endif; ?>

    </div>

</article>