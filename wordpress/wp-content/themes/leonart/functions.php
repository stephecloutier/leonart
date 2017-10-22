<?php

add_action('init', 'sl_register_types');
add_filter('wp_title', 'custom_wp_title');


// image thumbnails \\
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');

    add_image_size('smallest', 250, 9999);
}

// navigation \\
register_nav_menus( array(
    'main' => 'La navigation principale du site',
    'social_media' => 'La navigation des réseaux sociaux',
) );

/*
    Register custom post types and taxonomies during initialization
*/
function sl_register_types() {
    register_post_type('artists', [
        'label' => 'Artistes',
        'labels' => [
            'singular_name' => 'artiste',
            'add_new_item' => 'Ajouter un nouvel artiste'
        ],
        'description' => 'Permet d’administrer les artistes affichés sur le site',
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-admin-customizer',
        'has_archive' => true,
    ]);

    register_post_type('places', [
        'label' => 'Lieux',
        'labels' => [
            'singular_name' => 'lieu',
            'add_new_item' => 'Ajouter un nouveau lieu clé'
        ],
        'description' => 'Permet d’administrer les lieux clés de Saint Léon’Art',
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-location',
        'has_archive' => true,
    ]);

    register_post_type('activities', [
        'label' => 'Activités',
        'labels' => [
            'singular_name' => 'activité',
            'add_new_item' => 'Ajouter une nouvelle activité au programme'
        ],
        'description' => 'Permet d’administrer les divers types d’activités affichées sur le site',
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-list-view',
    ]);

    register_post_type('news', [
        'label' => 'News',
        'labels' => [
            'singular_name' => 'news',
            'add_new_item' => 'Ajouter une nouvelle news'
        ],
        'description' => 'Permet d’administrer les news affichées sur le site',
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-megaphone',
        'has_archive' => true,
    ]);

    register_taxonomy('artistic-disciplines', array('artist', 'program'), [
        'label' => 'Disciplines artistiques',
        'labels' => [
            'singular_name' =>'Discipline artistique',
            'edit_item' => 'Éditer la discipline',
            'add_new_item' => 'Ajouter une nouvelle discipline artistique'
        ],
        'description' => 'Permet de lier un artiste, un évènement ou une exposition à une discipline donnée',
        'public' => true,
        'hierarchical' => false,
    ]);
}

/*
    Hooks into wp_title() content formatting
*/

function custom_wp_title($title) {
    if(empty($title)) {
        $title = 'Accueil';
    }
    $title .= ' | ' . get_bloginfo('name');
    return trim($title);
}

/*
    Get navigation links (objects) for given location
*/

function sl_get_nav_items($location) {
    $id = sl_get_nav_id($location);
    $nav = [];
    if(!$id) {
        return $nav;
    }

    foreach(wp_get_nav_menu_items($id) as $object) {
        $item = new stdClass();
        $item->url = $object->url;
        $item->label = $object->title;
        $nav[$object->ID] = $item;
    }
    return $nav;
}

/*
    Get navigation id for given location
*/

function sl_get_nav_id($location) {
    foreach (get_nav_menu_locations() as $navLocation => $id) {
        if($navLocation == $location) {
            return $id;
        }
    }
    return false;
}
