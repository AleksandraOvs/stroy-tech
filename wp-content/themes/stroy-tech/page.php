<?php get_header() ?>
<!-- <section class="page-title-block">
    <div class="fixed-container">
        <?php //site_breadcrumbs() 
        ?>


    </div>
</section> -->

<section class="page-content">
    <div class="page-title-block">
        <div class="fixed-container">
            <?php site_breadcrumbs();  ?>
            <h1 class="page-title" data-scroll-animation="fade-down">
                <?= the_title() ?>
            </h1>

        </div>
    </div>

    <div class="page-content__inner">
        <div class="fixed-container">
            <?php the_content(); ?>
        </div>

    </div>


</section>

<?php //get_template_part('template-parts/section-contacts') 
?>


<?php get_footer() ?>