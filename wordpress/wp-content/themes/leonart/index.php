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
        [insérer les artistes ici]
        <!-- $image['sizes']['smallest'] -->
        <a href="" title="Aller sur la page de tous les artistes">Voir tous les artistes</a>
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
        [insérer les news ici]
        <a href="" title="Aller sur la page des news">Voir toute l'actualité</a>
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
