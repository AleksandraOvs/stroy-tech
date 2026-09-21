<?php
$projects_title = carbon_get_post_meta(
    get_the_ID(),
    'crb_projects_block_title'
);

$about_projects = carbon_get_post_meta(
    get_the_ID(),
    'crb_about_projects_list'
);

$project_slides = carbon_get_post_meta(
    get_the_ID(),
    'crb_projects_list'
);

//$project_slides = array_reverse($project_slides);

?>

<section class="projects" id="projects">

    <div class="projects-image">
        <img
            src="<?php echo esc_url(get_stylesheet_directory_uri() . '/imgs/projects-bg.webp'); ?>"
            alt=""
            class="projects-background">
    </div>



    <div class="projects__title__inner">
        <div class="fixed-container">
            <?php if ($projects_title) : ?>
                <h2 class="projects__title">
                    <?php echo esc_html($projects_title); ?>
                </h2>
            <?php endif; ?>
            <?php if ($about_projects) : ?>

                <ul class="projects__about list-style-markers dark-markers">

                    <?php foreach ($about_projects as $item) : ?>

                        <?php if (!empty($item['crb_about_projects_list_item'])) : ?>

                            <li>
                                <?php echo esc_html($item['crb_about_projects_list_item']); ?>
                            </li>

                        <?php endif; ?>

                    <?php endforeach; ?>

                </ul>

            <?php endif; ?>

        </div>





    </div>

    <div class="fixed-container">

        <?php if ($project_slides) : ?>

            <div class="projects__slider swiper">
                <div class="projects__navigation">

                    <?php

                    $prev = '<svg width="66" height="15" viewBox="0 0 66 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M0.292893 6.6569C-0.0976333 7.04743 -0.0976334 7.68059 0.292892 8.07111L6.65685 14.4351C7.04738 14.8256 7.68054 14.8256 8.07107 14.4351C8.46159 14.0446 8.46159 13.4114 8.07107 13.0209L2.41422 7.36401L8.07107 1.70715C8.46159 1.31663 8.46159 0.683465 8.07107 0.292941C7.68054 -0.0975836 7.04738 -0.0975837 6.65685 0.292941L0.292893 6.6569ZM66 7.36401L66 6.36401L1 6.36401L1 7.36401L1 8.36401L66 8.36401L66 7.36401Z" fill="white"/>
</svg>
';
                    $next = '<svg width="66" height="15" viewBox="0 0 66 15" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M65.7071 8.07112C66.0976 7.6806 66.0976 7.04743 65.7071 6.65691L59.3431 0.292946C58.9526 -0.0975785 58.3195 -0.0975785 57.9289 0.292946C57.5384 0.68347 57.5384 1.31664 57.9289 1.70716L63.5858 7.36401L57.9289 13.0209C57.5384 13.4114 57.5384 14.0446 57.9289 14.4351C58.3195 14.8256 58.9526 14.8256 59.3431 14.4351L65.7071 8.07112ZM0 7.36401V8.36401H65V7.36401V6.36401H0V7.36401Z" fill="white"/>
</svg>
';

                    ?>
                    <button
                        class="projects__prev"
                        type="button"
                        aria-label="Предыдущий проект"><?php echo $prev ?></button>

                    <button
                        class="projects__next"
                        type="button"
                        aria-label="Следующий проект"><?php echo $next ?></button>

                </div>

                <div class="swiper-wrapper">

                    <?php foreach ($project_slides as $slide) : ?>

                        <?php
                        $projects = $slide['projects'] ?? [];

                        if (empty($projects)) {
                            continue;
                        }

                        $projects_count = count($projects);
                        ?>

                        <div
                            class="projects__slide swiper-slide projects__slide--<?php echo esc_attr($projects_count); ?>">

                            <?php foreach ($projects as $project) : ?>

                                <?php
                                $project_id = !empty($project['id'])
                                    ? $project['id']
                                    : 0;

                                if (!$project_id) {
                                    continue;
                                }

                                set_query_var(
                                    'project_id',
                                    $project_id
                                );

                                get_template_part(
                                    'template-parts/project-item'
                                );
                                ?>

                            <?php endforeach; ?>

                        </div>

                    <?php endforeach; ?>

                </div>


            </div>

            <div class="projects-popups">

                <?php foreach ($project_slides as $slide) : ?>

                    <?php
                    $projects = $slide['projects'] ?? [];

                    if (empty($projects)) {
                        continue;
                    }
                    ?>

                    <?php foreach ($projects as $project) : ?>

                        <?php
                        $project_id = !empty($project['id'])
                            ? $project['id']
                            : 0;

                        if (!$project_id) {
                            continue;
                        }

                        $title = get_the_title($project_id);
                        ?>

                        <div
                            class="gallery-modal"
                            id="modal-<?php echo esc_attr($project_id); ?>"
                            hidden>

                            <div class="gallery-modal__overlay"></div>

                            <div class="gallery-modal__content">

                                <button
                                    type="button"
                                    class="gallery-modal__close"
                                    aria-label="Закрыть">
                                    <svg
                                        width="13"
                                        height="13"
                                        viewBox="0 0 13 13"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M6.8125 6.10156L12.2031 11.5L11.5 12.2031L6.10156 6.8125L0.703125 12.2031L0 11.5L5.39062 6.10156L0 0.703125L0.703125 0L6.10156 5.39062L11.5 0L12.2031 0.703125L6.8125 6.10156Z"
                                            fill="#3B0070" />
                                    </svg>
                                </button>

                                <?php
                                get_template_part(
                                    'template-parts/photogallery/gallery-item',
                                    null,
                                    [
                                        'project_id' => $project_id,
                                        'title'      => $title,
                                    ]
                                );
                                ?>

                            </div>

                        </div>

                    <?php endforeach; ?>

                <?php endforeach; ?>

            </div>


        <?php endif; ?>


    </div>

</section>