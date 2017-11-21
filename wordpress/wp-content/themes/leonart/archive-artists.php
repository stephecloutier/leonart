<?php

/*
    Template Name: Archive des artistes
*/
get_header();
 ?>
<main>
    <a href="<?= sl_get_page_url('template-program.php'); ?>" class="link-back" title="Retourner sur la page du programme">Retourner au programme</a>
    <h1 class="main-title">Les Artistes</h1>
    <div class="artists archive-artists">
        <ul class="artists__list">
            <?php $posts = new WP_Query(['showposts' => -1, 'post_type' => 'artists', 'orderby' => 'rand',]); ?>
            <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
            <?php $fields = get_fields(); ?>
            <li class="artists__item">
                <a href="<?= the_permalink(); ?>" title="Aller sur la page de l’artiste <?= $fields['artist-name']; ?>" class="artists__link">
                    <figure class="artists__figure">
                        <?php $image = $fields['artist-img'];?>
                        <img src="<?= $image['url']; ?>"  alt="Photo de l’artiste <?= $fields['artist-name']; ?>" class="artists__img">
                        <div class="artists__overlay">
                            <span class="artists__link-text">Visiter sa page</span>
                        </div>
                        <div class="artists__text-bg">
                            <div class="artists__info">
                                <span class="artists__name"><?= $fields['artist-name']; ?></span>
                                <?php $artistID = $post->ID; ?>
                                <?php if(sl_get_taxonomies($artistID, 'artistic-disciplines')): ?>
                                <p class="artists__disciplines"><?= sl_get_taxonomies($artistID, 'artistic-disciplines'); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                    </figure>
                </a>
                <?php endwhile; endif; ?>
            </li>
        </ul>
    </div>
    <a href="<?= sl_get_page_url('template-program.php'); ?>" class="link-back link-back--bottom" title="Retourner sur la page du programme">Retourner au programme</a>
</main>


<?php get_footer(); ?>
