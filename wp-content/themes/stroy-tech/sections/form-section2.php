<?php
$feedback_title2       = carbon_get_the_post_meta('crb_feedback_block2_title');
$feedback_description2 = carbon_get_the_post_meta('crb_feedback_block2_description');
$feedback_form2        = carbon_get_the_post_meta('crb_feedback2_form');

if ($feedback_title2 || $feedback_description2 || !empty($feedback_form2)) :
?>

    <section class="form-section">
        <div class="form-section__inner">

            <?php if ($feedback_title2 || $feedback_description2) : ?>
                <div class="form-section__title --second-var" data-scroll-animation="fade-left">

                    <?php if ($feedback_title2) : ?>
                        <h2>
                            <?php echo esc_html($feedback_title2); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if ($feedback_description2) : ?>
                        <div class="form-section__description">
                            <?php echo wp_kses_post($feedback_description2); ?>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

            <?php if (!empty($feedback_form2)) : ?>
                <div class="form-section__form --second-var" data-scroll-animation="fade-right">

                    <?php
                    $form_id2 = $feedback_form2[0]['id'];

                    echo do_shortcode(
                        '[contact-form-7 id="' . esc_attr($form_id2) . '"]'
                    );
                    ?>

                </div>
            <?php endif; ?>

        </div>
    </section>

<?php endif; ?>