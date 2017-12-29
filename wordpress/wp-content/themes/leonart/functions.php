<?php

add_action('init', 'sl_register_types');
add_filter('wp_title', 'custom_wp_title');


// image thumbnails \\
if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');

    add_image_size('smallest', 250, 9999);
    add_image_size('partner-footer', 9999, 100);
    add_image_size('artist', 400, 400);
}

// navigation \\
register_nav_menus( array(
    'main' => 'La navigation principale du site',
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
        'has_archive' => false,
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

    register_post_type('documents', [
        'label' => 'Documents',
        'labels' => [
            'singular_name' => 'document',
            'add_new_item' => 'Ajouter un nouveau document'
        ],
        'description' => 'Permet d’administrer les documents (par exemple de presse) affichés et téléchargeables sur le site',
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-category',
        'has_archive' => false,
    ]);

    register_post_type('social-medias', [
        'label' => 'Réseaux sociaux',
        'labels' => [
            'singular_name' => 'Réseau social',
            'add_new_item' => 'Ajouter un nouveau réseau social'
        ],
        'description' => 'Permet d’administrer les réseaux sociaux affichés sur le site',
        'public' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-facebook-alt',
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
function socialIcons() {
    return include dirname(__FILE__) . '/components/social-icons.php';
}
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

function sl_get_image_alt($image) {
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

/*
    Return posts query containing 4 posts, ordering first by featured posts and then by random. (For use on the program page)
*/

function sl_get_featured_random_activities($eventType) {
    $featuredPosts = new WP_Query([
        'showposts' => 4,
        'post_type' => 'activities',
        'meta_query' => array(
            array(
                'key' => 'event-type',
                'value' => $eventType,
                'compare' => 'LIKE'
            )
        ),
        'meta_key' => 'event-show-first',
        'meta_value' => 'true',
    ]);

    $randomPosts = new WP_Query([
        'showposts' => 4 - count($featuredPosts),
        'post_type' => 'activities',
        'meta_query' => array(
            array(
                'key' => 'event-type',
                'value' => $eventType,
                'compare' => 'LIKE'
            )
        ),
        'meta_key' => 'event-show-first',
        'meta_value' => 'false',
        'orderby' => 'rand',
    ]);

    $posts = new WP_Query();
    $posts->posts = array_merge( $featuredPosts->posts, $randomPosts->posts );
    $posts->post_count = count( $posts->posts );

    return $posts;
}


/*  Plugin bits to have a Select Input to filter activities post type with the chosen activity type */
add_action( 'restrict_manage_posts', 'wpse45436_admin_posts_filter_restrict_manage_posts' );

function wpse45436_admin_posts_filter_restrict_manage_posts(){
    $type = 'post';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }

    if ('activities' == $type){

        $values = array(
            'Expositions' => 'expo',
            'Concerts & spectacles' => 'show',
            'Œuvres dans l\'espace urbain' => 'work',
            'Évènements divers' => 'various',
        );
        ?>
        <select name="ADMIN_FILTER_FIELD_VALUE">
        <option value=""><?php _e('Filtrer par... (tout)', 'wose45436'); ?></option>
        <?php
            $current_v = isset($_GET['ADMIN_FILTER_FIELD_VALUE'])? $_GET['ADMIN_FILTER_FIELD_VALUE']:'';
            foreach ($values as $label => $value) {
                printf
                    (
                        '<option value="%s"%s>%s</option>',
                        $value,
                        $value == $current_v? ' selected="selected"':'',
                        $label
                    );
                }
        ?>
        </select>
        <?php
    }
}

/* adding filter to wordpress administration (activities post type) */

add_filter( 'parse_query', 'wpse45436_posts_filter' );

function wpse45436_posts_filter( $query ){
    global $pagenow;
    $type = 'post';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }
    if ( 'activities' == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['ADMIN_FILTER_FIELD_VALUE']) && $_GET['ADMIN_FILTER_FIELD_VALUE'] != '') {
        $query->query_vars['meta_key'] = 'event-type';
        $query->query_vars['meta_value'] = $_GET['ADMIN_FILTER_FIELD_VALUE'];
    }
}

/* session */
add_action( 'init', 'switch_session' );
function switch_session() {
    // Session init
    if( ! session_id() )
        session_start();

    // If switcher is used, change values
    if( isset( $_POST[ 'post-order' ] ) ) {
        $_SESSION[ 'post-order' ] = ( 'ASC' == $_POST['post-order'] ) ? 'ASC' : 'DESC';
    }

    /*
    if( isset( $_GET[ 'post-order-by' ] ) ) {
        $_SESSION[ 'post-order-by' ] = ( 'price' == $_GET['post-order-by'] ) ? 'price' : 'date';
    }
    */

    // Default values
    if( ! isset( $_SESSION[ 'post-order' ] ) )
        $_SESSION[ 'post-order' ] = 'ASC';

    /*
    if( ! isset( $_SESSION[ 'post-order-by' ] ) )
        $_SESSION[ 'post-order-by' ] = 'price';
    */
}

/* filter query elements */
add_action( 'pre_get_posts', 'switch_output_order' );
function switch_output_order($query) {
    if( !is_admin() && (is_post_type_archive('news') || is_page_template('archive-news.php'))  ) {

        // tri par prix
        /*
        if( 'price' == $_SESSION[ 'post-order-by' ] ) {
            $query->set( 'meta_key', '_price' );
            $query->set( 'orderby', 'meta_value_num');
        }
        */
        /*
        * Par défaut, WordPress tri par date, donc il n'y a pas besoin d'effectuer'
        * un autre overide pour le tri par date
        *
        * Sauf si, par exemple, vous voulez trier selon une date
        * autre que la publication de l'article...
        */

        // Tri croissant ou décroissant
        $query->set( 'order', $_SESSION[ 'post-order' ] );
    }
}
