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
    register_post_type('artist', [
        'label' => 'Artistes',
        'labels' => [
            'singular_name' => 'artiste',
            'add_new_item' => 'Ajouter un nouvel artiste'
        ],
        'description' => 'Permet d’administrer les artistes affichés sur le site',
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-admin-customizer',
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
