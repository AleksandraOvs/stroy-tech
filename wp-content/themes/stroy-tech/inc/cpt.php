<?php

/**
 * -----------------------------------------------------
 * CPT: Проекты
 * -----------------------------------------------------
 */
function register_projects_cpt()
{

    register_post_type('projects', [
        'labels' => [
            'name'               => 'Проекты',
            'singular_name'      => 'Проект',
            'menu_name'          => 'Проекты',
            'add_new'            => 'Добавить проект',
            'add_new_item'       => 'Добавить новый проект',
            'edit_item'          => 'Редактировать проект',
            'new_item'           => 'Новый проект',
            'view_item'          => 'Просмотреть проект',
            'search_items'       => 'Искать проекты',
            'not_found'          => 'Проекты не найдены',
            'not_found_in_trash' => 'В корзине проектов нет',
        ],

        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-portfolio',

        'supports' => [
            'title',
            'editor',
            'thumbnail',
            'excerpt',
        ],

        'has_archive'         => true,
        'rewrite' => [
            'slug'       => 'projects',
            'with_front' => false,
        ],

        // Поддержка стандартных категорий и тегов
        'taxonomies' => [
            'category',
            'post_tag',
        ],

        'show_in_rest'        => true,
    ]);
}
add_action('init', 'register_projects_cpt');

/**
 *  SERVICES
 */

function register_services_cpt()
{
    register_post_type('services', [
        'labels' => [
            'name'               => 'Услуги',
            'singular_name'      => 'Услуга',
            'menu_name'          => 'Услуги',
            'add_new'            => 'Добавить услугу',
            'add_new_item'       => 'Добавить новую услугу',
            'edit_item'          => 'Редактировать услугу',
            'new_item'           => 'Новая услуга',
            'view_item'          => 'Просмотреть услугу',
            'search_items'       => 'Искать услуги',
            'not_found'          => 'Услуги не найдены',
            'not_found_in_trash' => 'В корзине услуг нет',
        ],

        'public'       => true,
        'show_ui'      => true,
        'show_in_menu' => true,

        'menu_position' => 6,
        'menu_icon'     => 'dashicons-portfolio',

        'supports' => [
            'title',
            'editor',
            'thumbnail',
            'excerpt',
        ],

        'taxonomies' => [
            'category',
            'post_tag',
        ],

        'has_archive' => true,

        'rewrite' => [
            'slug'       => 'services',
            'with_front' => false,
        ],

        'show_in_rest' => true,
    ]);
}

add_action('init', 'register_services_cpt');
