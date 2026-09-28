<?php

/**
 * Template name: Шаблон (wide)
 */
get_header() ?>
<!-- <section class="page-title-block">
    <div class="fixed-container">
        <?php //site_breadcrumbs() 
        ?>


    </div>
</section> -->

<section class="page-content">
    <div class="page-title-block page-header" data-scroll-animation="brightness">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('full', [
                'class' => 'page-header__img',
            ]); ?>
        <?php endif; ?>
        <div class="fixed-container">
            <?php //site_breadcrumbs();  
            ?>
            <h1 class="page-title" data-scroll-animation="fade-down">
                <?= the_title() ?>
            </h1>

        </div>
    </div>

    <div class="page-content__inner">

        <?php the_content(); ?>

    </div>

    <?php get_template_part('sections/form-section2') ?>


</section>



<?php get_footer() ?>