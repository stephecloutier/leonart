<?php

add_action('init', 'sl_register_types');
add_filter('wp_title', 'custom_wp_title');


// image thumbnails \\
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');

    add_image_size('smallest', 250, 9999);
    add_image_size('partner-footer', 9999, 40);
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

    register_post_type('partners', [
        'label' => 'Partenaires',
        'labels' => [
            'singular_name' => 'partenaire',
            'add_new_item' => 'Ajouter un nouveau partenaire'
        ],
        'description' => 'Permet d’administrer les partenaires affichés sur le site',
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-groups',
        'has_archive' => false,
    ]);

    register_taxonomy('artistic-disciplines', array('artists', 'activities'), [
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
    Global variables
*/

$htmlTimestampFormat = '%Y-%m-%dT%H:%M';



/*
    Retrieves the absolute URI for given asset in this theme
*/

function get_theme_asset($src = '') {
    return get_template_directory_uri() . '/assets/' . trim($src, '/');
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


/*
    Get page ID from template name
*/
function sl_get_page_id_from_template($templateName) {
    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        'meta_value' => 'template-parts/' . $templateName,
        'hierarchical' => 0
    ));

    foreach($pages as $page){
        return $page->ID;
    }
}

/*
    Get page url from ID
*/
function sl_get_page_url($templateName) {
    return get_page_link(sl_get_page_id_from_template($templateName));
}


/*
    Returns string corresponding to the alt from given ACF image
*/

function sl_get_image_alt($fieldName) {
    if(get_field($fieldName)) $image = get_field($fieldName);
    if(get_sub_field($fieldName)) $image = get_sub_field($fieldName);
    if(!get_field($fieldName) &&!get_sub_field($fieldName)) $image = $fieldName;
    if(!$image) return false;
    if($image['alt']) return $image['alt'];
    if($image['description']) return $image['description'];
    if($image['caption']) return $image['caption'];
    return false;
}

/*
    Echoes taxonomy list
*/

function sl_get_taxonomies($postID, $taxonomyName) {
    $terms = wp_get_post_terms($postID, $taxonomyName);
    $count = count($terms);
    $taxonomies = '';
    for($i = 0; $i < $count; $i++) {
        if($i == $count - 2) {
            $taxonomies .= $terms[$i]->name . ' &amp; ';
        } elseif($i == $count - 1) {
            $taxonomies .= $terms[$i]->name;
        } else {
            $taxonomies .= $terms[$i]->name . ', ';
        }
    }
    return $taxonomies;
}

/*
    Retrieves posts of a related post using the ID, the related post-type and the key that makes the relation
*/

function sl_get_relationship_posts($ID, $relatedPostType, $relatedPostKey) {
    $posts = get_posts(array(
                'post_type' => $relatedPostType,
                'meta_query' => array(
                    array(
                        'key' => $relatedPostKey, // name of custom field
                        'value' => '"' . $ID . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
                        'compare' => 'LIKE'
                    )
                )
            ));
    return $posts;
}

/*
    Retrieves every ID for given field and returns an array
*/

function sl_get_ids($field) {
    if(!$field) return false;
    $array = [];
    foreach($field as $item) {
        $array[] = $item->ID;
    }
    return $array;
}


/*
 * Function to remove all tags from given fields
*/

function sl_remove_all_tags($field) {
    $newString = str_replace(['<p>', '</p>'], ' ', $field);
    $newString = preg_replace('/<.*?>/', '', $newString);
    return trim($newString);
}

/*
 *  Return custom excerpt from given field for given length
*/
function sl_get_the_excerpt($content, $length = null) {
    if(!$toGet) $excerpt = $content;
    if(is_null($length) || strlen($excerpt) <= $length) {
        return $excerpt;
    }

    $string = '';
    $words = explode(' ', $excerpt);
    foreach($words as $word) {
        // +2 is needed in order to include the next space and the &hellip; in the character count.
        if(strlen($string) + strlen($word) + 2 > $length) break;
        $string .= ' ' . $word;
    }
    return trim($string) . '&hellip;';
}
