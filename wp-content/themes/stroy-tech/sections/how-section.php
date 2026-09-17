<?php
$how_title = carbon_get_the_post_meta('how_title');
$how_list  = carbon_get_the_post_meta('how_list');
?>

<section class="how-section">

    <div class="fixed-container">

        <?php if ($how_title) : ?>

            <h2 class="section-title" data-scroll-animation="fade">
                <?php echo esc_html($how_title); ?>
            </h2>

        <?php endif; ?>


        <?php if (!empty($how_list)) : ?>
            <div class="how-section__list">

                <?php
                $index = 0;
                foreach ($how_list as $item) : $index++; ?>

                    <div class="how-section__item">
                        <p class="item-index" data-scroll-animation="brightness"><?php echo $index; ?></p>
                        <div class="how-section__item__inner">
                            <?php if (!empty($item['how_list_item_title'])) : ?>
                                <div class="how-section__item__title">
                                    <?php echo wp_kses_post($item['how_list_item_title']); ?>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($item['how_list_item'])) : ?>
                                <div class="how-section__item__text">
                                    <?php echo wp_kses_post($item['how_list_item']); ?>
                                </div>

                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        <?php endif; ?>

    </div>

</section>