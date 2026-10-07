<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package eshop
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] = m[i] || function() {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })(window, document, 'script', 'https://mc.yandex.ru/metrika/tag.js?id=113519109', 'ym');

        ym(113519109, 'init', {
            ssr: true,
            webvisor: true,
            clickmap: true,
            ecommerce: "dataLayer",
            referrer: document.referrer,
            url: location.href,
            accurateTrackBounce: true,
            trackLinks: true
        });
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/113519109" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

    <!-- Favicon -->
    <link rel="icon" href="<?php echo get_stylesheet_directory_uri() . '/imgs/favi/favicon.ico' ?>" sizes="any" />

    <link rel="icon" href="<?php echo get_stylesheet_directory_uri() . '/imgs/favi/favicon.svg' ?>" type="image/svg+xml" />
    <link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri() . '/imgs/favi/favicon.svg' ?>" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="wrapper">
        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'eshop'); ?></a>

        <header id="masthead" class="header">
            <div class="fixed-container">
                <!-- header logo -->
                <?php
                $header_logo_id = get_theme_mod('header_logo');
                $header_logo_url = $header_logo_id ? wp_get_attachment_image_url($header_logo_id, 'full') : '';

                $site_name = get_bloginfo('name');
                $site_description = get_bloginfo('description');
                ?>

                <div class="header-logo">

                    <?php if ($header_logo_url) { ?>
                        <a class="header-logo__image" href="<?php echo esc_url(home_url('/')); ?>">
                            <img
                                src="<?= esc_url($header_logo_url); ?>"
                                alt="<?= esc_attr($site_name); ?>">
                        </a>

                    <?php } else {
                    ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="header-logo__site-info">

                            <?php if ($site_name): ?>
                                <p class="site-name">
                                    <?= esc_html($site_name); ?>
                                </p>
                            <?php endif; ?>

                        </a>
                    <?php
                    } ?>



                </div>

                <?php
                wp_nav_menu([
                    'theme_location' => 'main_menu',
                    'container'      => false,
                    'menu_class'     => 'main-menu',
                    'menu_id'        => '',
                    'fallback_cb'    => false,
                    'link_before'    => '',
                    'link_after'     => '',
                    'walker'           => new MAIN_Menu_Walker
                ]);
                ?>

                <div class="header__contacts">

                    <?php
                    $phone = carbon_get_theme_option('crb_phone');
                    $phone_link = carbon_get_theme_option('crb_phone_link');

                    $email = carbon_get_theme_option('crb_email');
                    $email_link = carbon_get_theme_option('crb_email_link');

                    $callback_button_text = carbon_get_theme_option('crb_callback_button_text');
                    $callback_form_id = carbon_get_theme_option('crb_callback_button_shortcode');
                    ?>

                    <div class="header__contacts__links">
                        <?php if (!empty($phone)) : ?>

                            <?php
                            $phone_href = !empty($phone_link)
                                ? $phone_link
                                : 'tel:' . preg_replace('/[^\d+]/', '', $phone);
                            ?>

                            <a
                                href="<?php echo esc_attr($phone_href); ?>"
                                class="header__phone">
                                <?php echo esc_html($phone); ?>
                            </a>

                        <?php
                            print_r($phone_link);
                        endif; ?>

                        <?php if (!empty($email)) : ?>

                            <?php
                            $email_href = !empty($email_link)
                                ? $email_link
                                : 'mailto:' . sanitize_email($email);

                            print_r($email_link);
                            ?>

                            <a
                                href="<?php echo esc_attr($email_href); ?>"
                                class="header__email">
                                <?php echo esc_html($email); ?>
                            </a>

                        <?php endif; ?>
                    </div>



                    <?php if ($callback_button_text && $callback_form_id): ?>

                        <button
                            type="button"
                            class="header__callback-button button"
                            data-fancybox
                            data-src="#callback-form-<?php echo esc_attr($callback_form_id); ?>">
                            <span><?php echo esc_html($callback_button_text); ?></span>
                        </button>

                        <div
                            id="callback-form-<?php echo esc_attr($callback_form_id); ?>"
                            class="callback-form"
                            style="display: none;">
                            <?php
                            echo do_shortcode(
                                '[contact-form-7 id="' . absint($callback_form_id) . '"]'
                            );
                            ?>
                        </div>

                    <?php endif; ?>
                    <button class="menu-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>





                <!-- end of header logo -->
            </div>





        </header><!-- #masthead -->

        <?php get_template_part('template-parts/mobile-menu')
        ?>