<section class="hero">
    <?php
    $title = carbon_get_post_meta(get_the_ID(), 'hero_title');
    $title_accent = carbon_get_post_meta(get_the_ID(), 'hero_title_accent');
    $description = carbon_get_post_meta(get_the_ID(), 'hero_description');
    $button = carbon_get_post_meta(get_the_ID(), 'hero_button');
    $background = carbon_get_post_meta(get_the_ID(), 'hero_background');
    ?>
    <?php if ($background) :
        //print_r($background);
    ?>
        <?php if ($background) : ?>
            <?php echo '<img class="hero__image" src="' . esc_url($background) . '" alt="background">'; ?>
        <?php endif; ?>

    <?php endif; ?>



    <div class="hero__inner">
        <div class="hero__inner__content">
            <?php if ($title || $title_accent) : ?>
                <h1 class="hero__title" data-scroll-animation="brightness">
                    <?php echo esc_html($title); ?>

                    <?php if ($title_accent) : ?>
                        <span>
                            <?php echo esc_html($title_accent); ?>
                        </span>
                    <?php endif; ?>
                </h1>
            <?php endif; ?>

            <?php if ($description) : ?>
                <div class="hero__description" data-scroll-animation="fade-down">
                    <?php echo apply_filters('the_content', $description); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($button[0])) : ?>
                <a
                    class="button button-light"
                    href="<?php echo esc_url($button[0]['url']); ?>">
                    <span><?php echo esc_html($button[0]['text']); ?></span>
                </a>
                <div class="button-description">
                    <svg width="21" height="17" viewBox="0 0 21 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.75 11.0625L5.5625 15.875L20 0.75" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span>Отвечаем моментально</span>
                </div>
        </div>

        <div class="hero-inner__advs" data-scroll-animation="fade-right">
            <?php
                $hero_advs = carbon_get_post_meta(get_the_ID(), 'hero_advs');
            ?>
            <?php if ($hero_advs) : ?>


                <ul class="hero-advs list-style-markers">

                    <?php foreach ($hero_advs as $adv) : ?>

                        <?php if (!empty($adv['text'])) : ?>
                            <li class="hero-advs__item">
                                <?php echo esc_html($adv['text']); ?>
                            </li>
                        <?php endif; ?>

                    <?php endforeach; ?>

                </ul>


            <?php endif; ?>
        </div>

    </div>

<?php endif; ?>









</section>