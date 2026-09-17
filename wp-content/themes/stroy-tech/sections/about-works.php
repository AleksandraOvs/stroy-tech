<?php
$works_title    = carbon_get_the_post_meta('crb_about_works_title');
$works_subtitle = carbon_get_the_post_meta('crb_about_works_subtitle');
$works_list     = carbon_get_the_post_meta('crb_about_works_list');
$works_image    = carbon_get_the_post_meta('crb_about_works_image');
?>

<section class="infoBlock-section">
    <div class="infoBlock-section__inner">

        <div class="infoBlock-section__content">
            <div class="infoBlock-section__title" data-scroll-animation="fade">
                <?php if ($works_title) : ?>
                    <h2 class="">
                        <?php echo esc_html($works_title); ?>
                    </h2>
                <?php endif; ?>

                <?php if ($works_subtitle) : ?>
                    <div class="infoBlock-section__subtitle">
                        <?php echo esc_html($works_subtitle); ?>
                    </div>
                <?php endif; ?>
            </div>


            <?php if (!empty($works_list)) : ?>
                <div class="infoBlock-section__list" data-scroll-animation="fade-left">

                    <?php foreach ($works_list as $item) : ?>

                        <div class="infoBlock-section__item">

                            <?php if (!empty($item['crb_about_works_list_item_title'])) : ?>
                                <h3 class="works-section__item-title">
                                    <?php echo esc_html($item['crb_about_works_list_item_title']); ?>
                                </h3>
                            <?php endif; ?>

                            <?php if (!empty($item['crb_about_works_list_item_text'])) : ?>
                                <div class="works-section__item-text">
                                    <?php echo wp_kses_post($item['crb_about_works_list_item_text']); ?>
                                </div>
                            <?php endif; ?>

                        </div>

                    <?php endforeach; ?>

                </div>
            <?php endif; ?>
        </div>

        <?php if ($works_image) : ?>
            <?php
            $image_url = wp_get_attachment_image_url($works_image, 'full');

            ?>
            <div data-scroll-animation="fade-right" class="infoBlock-section__image" style="background:url('<?php echo $image_url ?>'); background-size: cover; background-position: center;">

            </div>
        <?php endif; ?>


    </div>
</section>