<?php
$info_block_title       = carbon_get_the_post_meta('info_block_title');
$info_block_description = carbon_get_the_post_meta('info_block_description');
$info_block_list        = carbon_get_the_post_meta('info_block_list');
$infoBlock_image    = carbon_get_the_post_meta('crb_info_block_image');
?>

<section class="infoBlock-section pt-10">
    <div class="infoBlock-section__inner">

        <div class="infoBlock-section__content">

            <?php if ($info_block_title || $info_block_description) : ?>
                <div class="infoBlock-section__title" data-scroll-animation="fade">

                    <?php if ($info_block_title) : ?>
                        <h2>
                            <?php echo esc_html($info_block_title); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($info_block_description) : ?>
                        <div class="infoBlock-section__subtitle">
                            <?php echo esc_html($info_block_description); ?>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endif; ?>


            <?php if (!empty($info_block_list)) : ?>
                <div class="infoBlock-section__list" data-scroll-animation="fade-left">

                    <?php foreach ($info_block_list as $item) : ?>

                        <div class="infoBlock-section__item">

                            <?php if (!empty($item['info_block_list_item_title'])) : ?>
                                <h3 class="infoBlock-section__item-title">
                                    <?php echo esc_html($item['info_block_list_item_title']); ?>
                                </h3>
                            <?php endif; ?>

                            <?php if (!empty($item['info_block_list_item_text'])) : ?>
                                <div class="infoBlock-section__item-text">
                                    <?php echo wp_kses_post($item['info_block_list_item_text']); ?>
                                </div>
                            <?php endif; ?>

                        </div>

                    <?php endforeach; ?>

                </div>
            <?php endif; ?>

        </div>

        <?php if ($infoBlock_image) : ?>
            <?php
            $image_url = wp_get_attachment_image_url($infoBlock_image, 'full');

            ?>
            <div data-scroll-animation="fade-right" class="infoBlock-section__image" style="background:url('<?php echo $image_url ?>'); background-size: cover; background-position: center;">

            </div>
        <?php endif; ?>


    </div>
</section>