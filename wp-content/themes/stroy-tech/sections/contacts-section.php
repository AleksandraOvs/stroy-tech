<?php
$phone              = carbon_get_theme_option('crb_phone');
$phone_link         = carbon_get_theme_option('crb_phone_link');

$email              = carbon_get_theme_option('crb_email');
$email_link         = carbon_get_theme_option('crb_email_link');

$callback_text      = carbon_get_theme_option('crb_callback_button_text');

$address            = carbon_get_theme_option('crb_address');
$hours              = carbon_get_theme_option('crb_hours');
$map                = carbon_get_theme_option('crb_map');

$messengers         = carbon_get_theme_option('messengers');
?>

<section class="contacts-section">
    <?php if ($map) : ?>
        <div class="contacts-section__map">
            <?php echo $map; ?>
        </div>
    <?php endif; ?>
    <div class="fixed-container">

        <div class="contacts-section__content" data-scroll-animation="brightness">
            <?php if ($address) : ?>
                <div class="contacts-section__address">
                    <span>Адрес: </span><?php echo wp_kses_post($address); ?>
                </div>
            <?php endif; ?>

            <?php if ($hours) : ?>
                <div class="contacts-section__hours">
                    <span>Время работы: </span><?php echo wp_kses_post($hours); ?>
                </div>
            <?php endif; ?>

            <?php if ($phone) : ?>
                <div class="contacts-section__phone">
                    <span>Тел.: </span><a href="<?php echo esc_url($phone_link ?: 'tel:' . preg_replace('/[^0-9+]/', '', $phone)); ?>">
                        <?php echo esc_html($phone); ?>
                    </a>
                </div>
            <?php endif; ?>


            <?php if ($email) : ?>
                <div class="contacts-section__email">
                    <span>E-mail: </span> <a href="<?php echo esc_url($email_link ?: 'mailto:' . $email); ?>">
                        <?php echo esc_html($email); ?>
                    </a>
                </div>
            <?php endif; ?>

            <?php if (!empty($messengers)) : ?>
                <div class="contacts-section__messengers">

                    <?php foreach ($messengers as $messenger) : ?>

                        <?php
                        $icon = $messenger['icon'] ?? '';
                        $name = $messenger['name'] ?? '';
                        $link = $messenger['link'] ?? '';
                        ?>

                        <?php if ($link) : ?>

                            <a
                                href="<?php echo esc_url($link); ?>"
                                class="contacts-section__messenger"
                                target="_blank"
                                rel="noopener noreferrer">

                                <?php if ($icon) : ?>
                                    <img
                                        src="<?php echo esc_url($icon); ?>"
                                        alt="<?php echo esc_attr($name); ?>">
                                <?php endif; ?>

                                <?php if ($name) : ?>
                                    <span>
                                        <?php echo esc_html($name); ?>
                                    </span>
                                <?php endif; ?>

                            </a>

                        <?php endif; ?>

                    <?php endforeach; ?>

                </div>
            <?php endif; ?>

        </div>




    </div>
</section>