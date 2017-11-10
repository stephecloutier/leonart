<?php

/*
    Template Name: Archive des artistes
*/
get_header();
 ?>
<main>
    <a href="<?= sl_get_page_url('template-program.php'); ?>" class="link-back" title="Retourner sur la page du programme">Retourner au programme</a>

    <h1 class="main-title">Les Artistes</h1>
    <?php $posts = new WP_Query(['showposts' => -1, 'post_type' => 'artists', 'orderby' => 'rand',]); ?>
    <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
    <?php $fields = get_fields(); ?>
    <a href="<?= the_permalink(); ?>" title="Aller sur la page de l’artiste <?= $fields['artist-name']; ?>">
        <figure>
            <?php $image = $fields['artist-img'];?>
            <img src="<?= $image['sizes']['smallest']; ?>"  alt="Photo de l’artiste <?= $fields['artist-name']; ?>">
            <span class="artists__name"><?= $fields['artist-name']; ?></span>
            <?php $artistID = $post->ID; ?>
            <?php if(sl_get_taxonomies($artistID, 'artistic-disciplines')): ?>
            <p class="artists__disciplines"><?= sl_get_taxonomies($artistID, 'artistic-disciplines'); ?></p>
            <?php endif; ?>
            <div class="artists__overlay"></div>
        </figure>
    </a>
    <?php endwhile; endif; ?>
    <a href="<?= sl_get_page_url('template-program.php'); ?>" class="link-back" title="Retourner sur la page du programme">Retourner au programme</a>
</main>


<?php get_footer(); ?>
