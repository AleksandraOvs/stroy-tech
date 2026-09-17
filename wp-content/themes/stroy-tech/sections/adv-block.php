<?php
$adv_block_title = carbon_get_the_post_meta('adv_block_title');
$adv_block_list  = carbon_get_the_post_meta('adv_block_list');
?>

<section class="advantages-section">
    <div class="fixed-container">

        <?php if ($adv_block_title) : ?>
            <div class="section-title" data-scroll-animation="fade">
                <h2>
                    <?php echo esc_html($adv_block_title); ?>
                </h2>
            </div>
        <?php endif; ?>


        <?php if (!empty($adv_block_list)) : ?>
            <div class="advantages-section__list">

                <?php foreach ($adv_block_list as $item) : ?>

                    <div class="advantages-section__item" data-scroll-animation="fade">

                        <?php if (!empty($item['adv_block_list_item_title'])) : ?>
                            <div class="advantages-section__item-title">
                                <?php echo wp_kses_post($item['adv_block_list_item_title']); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($item['adv_block_list_item_text'])) : ?>
                            <div class="advantages-section__item-text">
                                <?php echo wp_kses_post($item['adv_block_list_item_text']); ?>
                            </div>
                        <?php endif; ?>

                    </div>

                <?php endforeach; ?>

            </div>
        <?php endif; ?>


        <p class="block-sign">С каждым клиентом общается лично<br> генеральный директор</p>
    </div>

</section>