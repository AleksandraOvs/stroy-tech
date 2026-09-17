<?php

$project_id = $args['project_id'] ?? 0;
$title      = $args['title'] ?? '';

if (!$project_id) {
    return;
}

$gallery_imgs = carbon_get_post_meta(
    $project_id,
    'project_gallery'
);

/*
 * Оставляем только реально выбранные изображения
 */
$gallery_images = [];

if (!empty($gallery_imgs)) {

    foreach ($gallery_imgs as $gallery_img) {

        $image_id = $gallery_img['crb_project_image'] ?? 0;

        if ($image_id) {
            $gallery_images[] = $image_id;
        }
    }
}

?>

<div class="project-popup__gallery-wrapper">



    <?php if (!empty($gallery_images)) : ?>

        <div class="swiper project-popup__gallery">

            <div class="swiper-wrapper">

                <?php foreach ($gallery_images as $image_id) : ?>

                    <div class="swiper-slide project-popup__slide">

                        <?php
                        echo wp_get_attachment_image(
                            $image_id,
                            'full',
                            false,
                            [
                                'class' => 'project-popup__image',
                                'alt'   => $title,
                            ]
                        );
                        ?>

                    </div>

                <?php endforeach; ?>

            </div>
            <div class="project-popup__slider__arrows">
                <button
                    type="button"
                    class="project-popup__prev"
                    aria-label="Предыдущее изображение">
                    <svg width="66" height="15" viewBox="0 0 66 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.292893 6.65715C-0.0976333 7.04767 -0.0976334 7.68083 0.292892 8.07136L6.65685 14.4353C7.04738 14.8258 7.68054 14.8258 8.07107 14.4353C8.46159 14.0448 8.46159 13.4116 8.07107 13.0211L2.41422 7.36425L8.07107 1.7074C8.46159 1.31687 8.46159 0.683709 8.07107 0.293185C7.68054 -0.0973395 7.04738 -0.0973395 6.65685 0.293185L0.292893 6.65715ZM66 7.36426L66 6.36426L1 6.36425L1 7.36425L1 8.36425L66 8.36426L66 7.36426Z" fill="#3B0070" />
                    </svg>

                </button>

                <button
                    type="button"
                    class="project-popup__next"
                    aria-label="Следующее изображение">
                    <svg width="66" height="15" viewBox="0 0 66 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M65.7071 8.07136C66.0976 7.68084 66.0976 7.04768 65.7071 6.65715L59.3431 0.29319C58.9526 -0.0973344 58.3195 -0.0973344 57.9289 0.29319C57.5384 0.683714 57.5384 1.31688 57.9289 1.7074L63.5858 7.36426L57.9289 13.0211C57.5384 13.4116 57.5384 14.0448 57.9289 14.4353C58.3195 14.8259 58.9526 14.8259 59.3431 14.4353L65.7071 8.07136ZM0 7.36426L0 8.36426L65 8.36426V7.36426V6.36426L0 6.36426L0 7.36426Z" fill="#3B0070" />
                    </svg>

                </button>
            </div>








        </div>



        <div class="project-popup__content__inner__text">
            <?php if ($title) : ?> <h3 class="project-popup__title"> <?php echo esc_html($title); ?> </h3> <?php endif; ?> <?php $project_content = get_post_field('post_content', $project_id); ?> <?php if ($project_content) : ?> <div class="project-popup__content"> <?php echo apply_filters('the_content', $project_content); ?> </div> <?php endif; ?>
        </div>





    <?php else : ?>

        <div class="project-popup__empty">
            Галерею этого проекта мы еще не успели добавить
        </div>

    <?php endif; ?>



</div>