<?php

/*
    Template Name: Archive des artistes
*/
get_header();
 ?>
<main>
    <a href="<?= sl_get_page_url('template-program.php'); ?>" class="link-back" title="Retourner sur la page du programme">Retourner au programme</a>

    <h1>Les Artistes</h1>
    <?php $posts = new WP_Query(['showposts' => -1, 'post_type' => 'artists']); ?>
    <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
    <?php $fields = get_fields(); ?>
    <a href="<?= the_permalink(); ?>" title="Aller sur la page de l’artiste <?= $fields['artist-name']; ?>">
        <figure>
            <?php $image = $fields['artist-img'];?>
            <img src="<?= $image['sizes']['smallest']; ?>"  alt="Photo de l’artiste <?= $fields['artist-name']; ?>">
            <span class="artists__name"></span>
            <span class="artists__disciplines"></span>
            <div class="artists__overlay"></div>
        </figure>
    </a>
    <?php endwhile; endif; ?>
    <a href="<?= sl_get_page_url('template-program.php'); ?>" class="link-back" title="Retourner sur la page du programme">Retourner au programme</a>
</main>


<?php get_footer(); ?>
