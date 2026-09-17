<?php

$project_id = get_query_var('project_id');

if (!$project_id) {
    return;
}

$title = get_the_title($project_id);

$image = get_the_post_thumbnail_url(
    $project_id,
    'full'
);

?>

<article class="project-item">

    <a
        href="#modal-<?php echo esc_attr($project_id); ?>"
        class="project-item__link"
        data-project-id="<?php echo esc_attr($project_id); ?>">

        <?php if ($image) : ?>

            <img
                src="<?php echo esc_url($image); ?>"
                alt="<?php echo esc_attr($title); ?>">

        <?php endif; ?>

        <div class="project-item__content">

            <h3 class="project-item__title">
                <?php echo esc_html($title); ?>
            </h3>

        </div>

    </a>

</article>