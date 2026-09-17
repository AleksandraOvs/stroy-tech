<?php
$feedback_title       = carbon_get_the_post_meta('crb_feedback_block_title');
$feedback_description = carbon_get_the_post_meta('crb_feedback_block_description');
$feedback_form        = carbon_get_the_post_meta('crb_feedback_form');

if ($feedback_title || $feedback_description || !empty($feedback_form)) :
?>

    <section class="form-section">
        <div class="form-section__inner">



            <?php if ($feedback_title || $feedback_description) : ?>
                <div class="form-section__title" data-scroll-animation="fade-left">

                    <?php if ($feedback_title) : ?>
                        <h2>
                            <?php echo esc_html($feedback_title); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($feedback_description) : ?>
                        <div class="form-section__description">
                            <?php echo wp_kses_post($feedback_description); ?>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

            <?php if (!empty($feedback_form)) : ?>
                <div class="form-section__form" data-scroll-animation="fade-right">

                    <?php
                    $form_id = $feedback_form[0]['id'];

                    echo do_shortcode(
                        '[contact-form-7 id="' . esc_attr($form_id) . '"]'
                    );
                    ?>

                </div>
            <?php endif; ?>




        </div>
    </section>

<?php endif; ?>