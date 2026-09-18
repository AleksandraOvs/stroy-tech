<section class="services" id="services">

    <div class="fixed-container">

        <h2 class="section-title" data-scroll-animation="brightness">
            Любая конфигурация,<br>цвет&nbsp;RAL и&nbsp;заполнение
        </h2>

        <?php
        $services = new WP_Query([
            'post_type'      => 'services',
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
        ]);
        ?>

        <?php if ($services->have_posts()) : ?>

            <div class="services__list">

                <?php while ($services->have_posts()) : $services->the_post(); ?>

                    <?php get_template_part('template-parts/service-item'); ?>

                <?php endwhile; ?>

            </div>

        <?php endif; ?>

        <?php wp_reset_postdata(); ?>

    </div>

</section>