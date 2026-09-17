<div class="mobile-menu">

    <?php
    wp_nav_menu([
        'theme_location' => 'main_menu',
        'container'      => false,
        'menu_class'     => 'main-menu',
        'menu_id'        => '',
        'fallback_cb'    => false,
        'link_before'    => '',
        'link_after'     => '',
        // 'walker'           => new MAIN_Menu_Walker
    ]);
    ?>

    <div class="toggle-menu__contacts">

        <?php
        $phone = carbon_get_theme_option('crb_phone');
        $phone_link = carbon_get_theme_option('crb_phone_link');

        $email = carbon_get_theme_option('crb_email');
        $email_link = carbon_get_theme_option('crb_email_link');

        $tel_svg = '<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M16.4168 20.0086H16.7868C17.0968 19.9986 17.3868 19.8386 17.5668 19.5786L19.8368 16.3086C19.9868 16.0886 20.0468 15.8186 19.9968 15.5486C19.9723 15.417 19.9216 15.2916 19.8478 15.18C19.7739 15.0683 19.6784 14.9726 19.5668 14.8986L14.6568 11.6286C14.2468 11.3586 13.6968 11.4186 13.3668 11.7786L11.4868 13.8086C10.7268 13.3586 9.45683 12.5486 8.45683 11.5486C7.45683 10.5486 6.64683 9.2786 6.19683 8.5286L8.22683 6.6486C8.58683 6.3186 8.65683 5.7686 8.37683 5.3586L5.10683 0.448597C4.95683 0.228597 4.72683 0.0685966 4.46683 0.0185966C4.19683 -0.0314034 3.92683 0.0185967 3.70683 0.178597L0.436826 2.4386C0.176826 2.6186 0.0168259 2.9086 0.00682586 3.2186C-0.0231741 3.9286 -0.153174 10.2586 4.79683 15.1986C9.25683 19.6586 14.8368 19.9986 16.4168 19.9986V20.0086Z" fill="#ffffff"/>
</svg>';
        $email_svg = '<svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.2005 0.005267C15.1323 -0.00175567 15.0636 -0.00175567 14.9955 0.005267H0.995469C0.905741 0.00664956 0.816607 0.0201037 0.730469 0.045267L7.95547 7.24027L15.2005 0.005267Z" fill="#ffffff"/>
<path d="M15.94 0.700287L8.66 7.95029C8.47264 8.13654 8.21919 8.24108 7.955 8.24108C7.69081 8.24108 7.43736 8.13654 7.25 7.95029L0.035 0.755287C0.0128197 0.836807 0.00105934 0.92081 0 1.00529V11.0053C0 11.2705 0.105357 11.5249 0.292893 11.7124C0.48043 11.8999 0.734784 12.0053 1 12.0053H15C15.2652 12.0053 15.5196 11.8999 15.7071 11.7124C15.8946 11.5249 16 11.2705 16 11.0053V1.00529C15.996 0.901114 15.9758 0.798205 15.94 0.700287ZM1.685 11.0053H0.99V10.2903L4.625 6.68529L5.33 7.39029L1.685 11.0053ZM14.99 11.0053H14.29L10.645 7.39029L11.35 6.68529L14.985 10.2903L14.99 11.0053Z" fill="#ffffff"/>
</svg>
';
        //$callback_button_text = carbon_get_theme_option('crb_callback_button_text');
        //$callback_form_id = carbon_get_theme_option('crb_callback_button_shortcode');
        ?>


        <?php if ($phone): ?>


            <a
                href="<?php echo esc_url($phone_link ?: 'tel:' . preg_replace('/[^0-9+]/', '', $phone)); ?>"
                class="header__phone"> <?php echo $tel_svg; ?>
                <?php echo esc_html($phone); ?>
            </a>

        <?php endif; ?>

        <?php if ($email): ?>


            <a
                href="<?php echo esc_url($email_link ?: 'mailto:' . $email); ?>"
                class="header__email"><?php echo $email_svg; ?>
                <?php echo esc_html($email); ?>
            </a>


        <?php endif; ?>


    </div>

</div>