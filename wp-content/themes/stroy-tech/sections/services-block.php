<?php
$projects_title = carbon_get_post_meta(get_the_ID(), 'crb_projects_block_title');
$about_projects  = carbon_get_post_meta(get_the_ID(), 'crb_about_projects_list');
$projects        = carbon_get_post_meta(get_the_ID(), 'crb_projects_list');
?>

<section class="projects">

    <div class="container">

        <?php if ($projects_title) : ?>
            <h2 class="projects__title">
                <?php echo esc_html($projects_title); ?>
            </h2>
        <?php endif; ?>


        <?php if ($about_projects) : ?>

            <ul class="projects__about">

                <?php foreach ($about_projects as $item) : ?>

                    <?php if (!empty($item['crb_about_projects_list_item'])) : ?>

                        <li>
                            <?php echo esc_html($item['crb_about_projects_list_item']); ?>
                        </li>

                    <?php endif; ?>

                <?php endforeach; ?>

            </ul>

        <?php endif; ?>


        <?php if ($projects) : ?>

            <div class="projects__slider swiper">

                <div class="swiper-wrapper">

                    <?php foreach ($projects as $project) : ?>

                        <?php
                        $project_id = !empty($project['id'])
                            ? $project['id']
                            : 0;
                        ?>

                        <?php if ($project_id) : ?>

                            <?php
                            set_query_var('project_id', $project_id);
                            get_template_part('template-parts/project-item');
                            ?>

                        <?php endif; ?>

                    <?php endforeach; ?>

                </div>

                <div class="projects__navigation">

                    <button
                        class="projects__prev"
                        type="button"
                        aria-label="Предыдущий проект"></button>

                    <button
                        class="projects__next"
                        type="button"
                        aria-label="Следующий проект"></button>

                </div>

            </div>

        <?php endif; ?>

    </div>

</section>