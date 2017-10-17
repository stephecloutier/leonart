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
        
    </section>
</main>


<?php get_footer(); ?>
