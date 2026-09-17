<?php
$tasks_title = carbon_get_the_post_meta('tasks_title');
$tasks_list  = carbon_get_the_post_meta('crb_tasks_list');
?>

<section class="tasks-section">

    <div class="fixed-container">

        <?php if ($tasks_title) : ?>
            <h2 class="section-title" data-scroll-animation="fade-left">
                <?php echo esc_html($tasks_title); ?>
            </h2>
        <?php endif; ?>

        <?php if (!empty($tasks_list)) : ?>
            <div class="tasks-section__list">

                <?php foreach ($tasks_list as $task) : ?>

                    <div class="tasks-section__item" data-scroll-animation="fade-up">

                        <?php if (!empty($task['crb_tasks_list_title'])) : ?>
                            <h3 class="tasks-section__item-title">
                                <?php echo esc_html($task['crb_tasks_list_title']); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if (!empty($task['crb_tasks_list_text'])) : ?>
                            <div class="tasks-section__item-text">
                                <?php echo wp_kses_post($task['crb_tasks_list_text']); ?>
                            </div>
                        <?php endif; ?>

                    </div>

                <?php endforeach; ?>

            </div>
        <?php endif; ?>

    </div>

</section>