<?php

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
    Hooks into wp_title() content formatting
*/

function custom_wp_title($title) {
    if(empty($title)) {
        $title = 'Accueil';
    }
    $title .= ' | ' . get_bloginfo('name');
    return trim($title);
}
