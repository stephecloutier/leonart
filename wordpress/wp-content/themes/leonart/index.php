<?php
/*
    Template Name: Homepage
*/
get_header();
?>
<main>
    <div class="banner">
        <span class="banner__title">Saint-Léon'Art</span>
        <span class="banner__content"><?= get_field('banner-text'); ?></span>
    </div>

    <div class="intro">
        <span class="intro__title">Un vaste parcours artistique</span>
        <?= get_field('intro-text'); ?>
        <a href="" class="intro__link arrow-link">En savoir plus <span class="hidden">sur l'évènement Saint-Léon'Art</span></a>
    </div>

    <section class="home-artists">
        <h2 class="home-artists__title home-title">
            Quelques artistes
        </h2>
        <?php $posts = new WP_Query(['showposts' => 8, 'post_type' => 'artists']); ?>
        <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
        <?php $fields = get_fields(); ?>
        <a href="<?= the_permalink(); ?>" title="Aller sur la page de l’artiste <?= $fields['artist-name']; ?>">
            <figure>
                <?php $image = $fields['artist-img'];?>
                <img src="<?= $image['sizes']['smallest']; ?>"  alt="Photo de l’artiste <?= $fields['artist-name']; ?>">
                <span class="home-artists__name"></span>
                <span class="home-artists__disciplines"></span>
                <div class="home-artists__overlay"></div>
            </figure>
        </a>
        <?php endwhile; endif; ?>

        <a href="<?= get_post_type_archive_link('artists'); ?>" title="Aller sur la page de tous les artistes">Voir tous les artistes</a>
    </section>

    <section class="home-agenda">
        <h2 class="home-agenda__title home-title">
            Les évènements à venir
        </h2>
        [insérer l'agenda ici]
        <a href="" title="Aller sur la page de l'agenda">Voir l'agenda complet</a>
    </section>

    <section class="home-newsletter">
        <h2 class="home-newsletter__title home-title">
            Vous voulez rester informé&nbsp;?
        </h2>
        <h3 class="home-newsletter__subtitle">Inscrivez-vous à la <em>newsletter&nbsp;!</em></h3>
        [insérer le form ici]
    </section>

    <section class="home-news">
        <h2 class="home-news__title home-title">
            Les dernières news
        </h2>
        <?php $posts = new WP_Query(['showposts' => 2, 'post_type' => 'news']); ?>
        <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
        <?php $fields = get_fields(); ?>
        <a href="<?= the_permalink(); ?>">
            <h3 class="home-news__title"><?= $fields['news-title']; ?></h3>
            <time datetime=""><?= the_date('j F Y'); ?></time>
            <?php $image = $fields['news-img'];?>
            <img src="<?= $image['sizes']['smallest']; ?>" alt="<?php if(sl_get_image_alt('news-img')) echo sl_get_image_alt('news-img'); else echo 'Image de la news ' . $fields['news-title']; ?>">
            <div class="home-news__content"><?= $fields['news-content']; ?></div>
            <a href="<?= the_permalink(); ?>" class="home-news__link">En lire plus <span class="hidden">sur <?= $fields['news-title']; ?></span></a>
        </a>
        <?php endwhile; endif; ?>
        <a href="<?= get_post_type_archive_link('news'); ?>" title="Aller sur la page des news">Voir toutes les news</a>
    </section>

    <?php if(get_field('enable-instagram')): ?>
    <section class="home-instagram">
        <h2 class="home-instagram__title home-title">
            Notre fil instagram
        </h2>
        [insérer le fil instagram ici]
        <a href="" title="Aller sur notre fil instagram">Aller sur notre fil instagram</a>
    </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
