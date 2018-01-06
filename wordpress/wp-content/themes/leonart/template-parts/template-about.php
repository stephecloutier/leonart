<?php
/*
    Template Name: À propos
*/
$fields = get_fields();
get_header();
?>

<main class="about__wrapper">
    <h1 class="main-title">À propos</h1>
    <div class="intro"><?= $fields['about-intro']; ?></div>

    <?php if($fields['about-show-press']): ?>
    <a class="about__anchor anchor-link" href="#press" title="Défiler jusqu'à l'espace presse">Besoin de documents&nbsp;? Aller sur l'espace presse</a>
    <?php endif; ?>

    <section class="about__objectives">
        <div class="about__objectives-wrapper">
            <h2 class="about__subtitle">Les objectifs</h2>
            <ul class="about__objectives-list">
                <?php while(have_rows('about-objectives')) : the_row(); ?>
                    <li class="about__objectives-item">
                        <span class="about__objective"><?= get_sub_field('objective'); ?></span>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
        <div class="about__objectives-svg">
            <svg class="objectives-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 502 364"><path class="obj-tree" d="M107.2 261.5c31.5-3.7 56-30.6 56-63 0-56.3-54.4-174.2-56.7-179.2-1.2-2.6-3.9-4.3-6.8-4.3s-5.6 1.7-6.8 4.3c-2.3 5-56.7 122.8-56.7 179.2 0 32.5 24.5 59.3 56 63v73c5 0 10 0 15-.4v-72.6zm-15-95v37.9L81 193.2c-2.9-2.9-7.7-2.9-10.6 0-2.9 2.9-2.9 7.7 0 10.6l21.8 21.8v20.8c-23.2-3.6-41-23.7-41-47.9 0-41.6 33.7-123.6 48.5-157.6 14.8 33.9 48.5 116 48.5 157.6 0 24.2-17.8 44.3-41 47.9v-44.8l21.8-21.8c2.9-2.9 2.9-7.7 0-10.6-2.9-2.9-7.7-2.9-10.6 0l-11.2 11.2v-13.9c0-4.1-3.4-7.5-7.5-7.5s-7.5 3.4-7.5 7.5zM165.5 334.9h15.3l.1-.3h-15.4z"/><path class="obj-table" d="M323.7 295h-15.9-.6v-17h8.5c4.1 0 7.5-3.4 7.5-7.5s-3.4-7.5-7.5-7.5h-8.5v-9h8.5c4.1 0 7.5-3.4 7.5-7.5s-3.4-7.5-7.5-7.5h-144c-4.1 0-7.5 3.4-7.5 7.5s3.4 7.5 7.5 7.5h8.5v9h-8.5c-4.1 0-7.5 3.4-7.5 7.5s3.4 7.5 7.5 7.5h8.5v17h-.5-16c-4.1 0-7.5 3.4-7.5 7.5s3.4 7.5 7.5 7.5h6.8l-5 24.6h15.3l5-24.6h115.7l5 24.6H322l-5-24.6h6.8c4.1 0 7.5-3.4 7.5-7.5-.1-4.1-3.4-7.5-7.6-7.5zm-31.5 0h-97v-17h97v17zm0-32h-97v-9h97v9z"/><path class="obj-table" d="M475.7 335h-48.5v-.1h-15v.1h-49v-.1h-15v.1H322l-.1-.4h-15.3l.1.4H180.8v-.1h-15.3v.1h-58.2v-.9c-5 .4-10 .4-15 .4v.5H27.7c-4.1 0-7.5 3.4-7.5 7.5s3.4 7.5 7.5 7.5h448c4.1 0 7.5-3.4 7.5-7.5s-3.3-7.5-7.5-7.5zm-170.6.4h43.5-43.5z"/><path class="obj-tree" d="M427.2 269.3c18.2-3.3 32-18.6 32-36.8 0-9.2-3.7-32.2-9.7-53.3-8.6-30.2-18-44.2-29.8-44.2s-21.3 14.1-29.8 44.2c-6 21-9.7 44-9.7 53.3 0 18.2 13.8 33.5 32 36.8v65.6h15v-65.6zm-15-30.8v15.4c-9.9-2.9-17-11.4-17-21.4 0-6.7 2.9-26.7 8.5-46.9 8-29.4 14.8-34.7 16-35.5 1.3.8 8 6.2 16 35.5 5.5 20.2 8.5 40.2 8.5 46.9 0 10-7.1 18.5-17 21.4v-15.4c0-4.1-3.4-7.5-7.5-7.5s-7.5 3.4-7.5 7.5z"/><path class="obj-table" d="M363.2 148.8c9.3-3.1 16-11.9 16-22.3v-32c0-4.1-3.4-7.5-7.5-7.5h-8.5v-9h16.5c4.1 0 7.5-3.4 7.5-7.5s-3.4-7.5-7.5-7.5h-48c-4.1 0-7.5 3.4-7.5 7.5s3.4 7.5 7.5 7.5h16.5v9h-8.5c-4.1 0-7.5 3.4-7.5 7.5v32c0 10.3 6.7 19.1 16 22.3v186.1h15V148.8zm-16-22.3V102h17v24.5c0 4.7-3.8 8.5-8.5 8.5s-8.5-3.8-8.5-8.5z"/></svg>
        </div>
    </section>

    <?php if($fields['about-organizers']): ?>
    <section class="about__orga">
        <h2 class="about__subtitle">Les organisateurs</h2>
        <ul class="about__orga-list">
            <?php while(have_rows('about-organizers')) : the_row(); ?><!--
                --><li class="about__orga-item">
                    <figure class="about__orga-figure">
                        <img class="about__orga-img" src="<?= get_sub_field('img')['url']; ?>" alt="<?= sl_get_image_alt(get_sub_field('img')) ? sl_get_image_alt(get_sub_field('img')) : get_sub_field('name');  ?>">
                    </figure><!--
                    --><div class="about__orga-infos">
                        <span class="about__orga-name">
                            <?= get_sub_field('name'); ?>
                        </span>
                        <?php if(get_sub_field('function')): ?>
                        <span class="about__orga-function"><?= get_sub_field('function'); ?></span>
                        <?php endif; ?>
                    </div>
                </li><!--
            --><?php endwhile; ?>
        </ul>
    </section>
    <?php endif; ?>
    <div class="cta cta--raspberry cta--about">
        <div class="cta--inner">
            <span class="cta__catch-phrase">Des questions sur Saint-Léon'Art&nbsp;?</span>
            <a href="<?= sl_get_page_url('template-contact.php'); ?>" class="cta-archive cta-archive--white" title="Aller sur la page contact"><span class="cta-archive__text">Contactez-nous&nbsp;!</span></a>
        </div>
    </div>

    <?php if($fields['about-numbers']): ?>
    <section class="about__numbers">
        <h2 class="about__subtitle">L'année <?= $fields['about-year']; ?> en chiffres</h2>
        <ul class="about__numbers-list">
            <li class="about__numbers-item">
                <div class="about__numbers-svg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 454 502"><path class="numbers-artist" d="M437 474.7h-39.7v-118c1.1-.4 2.1-1.1 3-2.1 20.4-23.9 4.8-42.2-1.8-50-1-1.2-2.2-2.6-2.6-3.2-1.9-3.1-2-10.1-1.5-14 .4-3.1-1.1-6.1-3.8-7.5-2.7-1.5-6.1-1.1-8.4.9-10.4 8.7-16 19.2-16.8 31.1-1.5 22.8 15.7 42.1 16.4 42.9.2.2.4.4.6.5v119.5h-20.7v-15.4c0-35.2-9.4-62.4-27.9-80.7-23.6-23.4-53.2-23.5-54.4-23.5h-37.6v-23.9c24-9.9 39.2-26.5 48.4-40.9 14.4-22.4 17.7-44 17.8-44.9.1-.4.1-.7.1-1.1v-1.6c5.3-1.3 9.9-4 13.5-8 10.6-11.8 10-30.3 9.2-37.7-.6-5.7-3.1-10.4-7.4-13.7-1.1-.9-2.4-1.6-3.6-2.3 7-1 13.1-3.7 18.1-7.9 13.4-11.3 13.4-29.7 13.4-30.4 0-15.5-6.3-30.9-18.7-45.8-10.5-12.5-25-24.4-43.2-35.2-10.4-6.3-21.5-11.9-32.9-16.8 1.7-7.4 1.2-21.4-11.9-29.8-3.5-2.2-8.1-1.2-10.4 2.3-2.2 3.5-1.2 8.1 2.3 10.4 5.3 3.4 5.9 8.4 5.7 11.4-19-7-38-11.7-54.2-13.2-51.6-4.8-90.5 12.2-108.1 28.3-8.5 7.8-13.1 16-13.1 23.7 0 16.4 10.9 25.8 18.4 30.4-2 5.6-4.6 14.2-5.8 24.1-2.3 18.5 1.2 34.3 10 46.3-3.2.8-6.6 2.1-9.4 4.3-4.3 3.3-6.8 8.1-7.4 13.7-.8 7.4-1.4 26 9.2 37.7 3.7 4.1 8.3 6.8 13.7 8.1v1.6c0 .4 0 .7.1 1.1.1.9 3.4 22.5 17.8 44.9 9.2 14.4 24.4 30.9 48.4 40.9v23.9h-37.5c-1.2 0-30.9.1-54.5 23.5-18.5 18.4-27.9 45.5-27.9 80.7v15.4H15.5c-4.1 0-7.5 3.4-7.5 7.5s3.4 7.5 7.5 7.5H437c4.1 0 7.5-3.4 7.5-7.5s-3.3-7.5-7.5-7.5zm-56.7-162c.2-2.3.6-4.5 1.3-6.6.4 1 .9 2 1.4 2.9 1 1.7 2.4 3.4 4.1 5.3 7.6 8.9 12.4 16.3 3.9 27.9-3.8-4.9-11.6-16.9-10.7-29.5zm-69.9-88c-.7.8-1.5 1.5-2.4 2v-33.6c2.3.3 4.7.9 6.1 2 .7.6 1.5 1.4 1.7 3.4 1 8.7 0 20.2-5.4 26.2zM90 65.5c23-21 65.1-27.4 96.6-24.4 27.6 2.6 65.7 16 95 33.5 20.4 12.2 54.6 37.2 54.6 68.2 0 .1-.1 12.3-8.1 19-4.6 3.9-11.4 5.4-20 4.6v-12.5c3.4 2.3 8 1.4 10.3-1.9 2.4-3.4 1.6-8.1-1.8-10.5-27.1-19.2-53.7-31.6-78.2-39.6-.7-.3-1.4-.6-2.1-.7-29.1-9.2-55-12.2-75.3-12.5-33.7-.5-57.7 5.8-65.8 8.3-4.3-2.2-13.3-8-13.3-18.8-.1-2.6 2.1-7.2 8.1-12.7zm7.7 91.5c-.7.6-1.2 1.2-1.6 2-5.8-18.5 1.3-40.2 4.2-48 7.6-2.3 29.1-7.7 58.8-7.4-27.1 3.5-37.7 9.4-39.2 10.3-2.2 1.4-3.6 3.8-3.6 6.4v20.8L97.7 157zm-4.6 67.7c-5.4-6-6.3-17.4-5.5-26.2.2-2 1-2.8 1.7-3.4 1.5-1.2 3.9-1.8 6.3-2.1v33.7c-.9-.5-1.7-1.2-2.5-2zm33.3 58c-11.7-18-15.3-35.8-15.8-38.9v-78l18-15.4c1.7-1.4 2.6-3.5 2.6-5.7v-19.5c2.7-1 7-2.4 13.1-3.8 11-2.5 30.4-5.4 60.6-5.4h28.6c18.8 6.1 38.9 15 59.5 27.8v99.9c-.5 3.1-4.1 20.9-15.8 38.9-16.8 25.8-41.9 40-74.7 42.2h-1.4c-32.7-2.1-57.9-16.3-74.7-42.1zm43 87.4c4.1 0 7.5-3.4 7.5-7.5v-26.5c7.2 1.8 15 3.1 23.5 3.7h2.9c8.5-.6 16.3-1.8 23.5-3.7v26.5c0 4.1 3.4 7.5 7.5 7.5h28.1c-2.9 30.8-28.9 54.9-60.5 54.9-11.8 0-23.2-3.4-33-9.7-5.1-3.3-10.9-.7-17 2.3 0-.2.1-.4.1-.5 1.8-7.1 3.3-13.3.1-17.9-6.1-8.6-9.7-18.6-10.7-29h28zM57.1 459.3c0-88.2 64.5-89.2 67.3-89.2h2c1 13 5.3 25.5 12.6 36.4-.2 1.7-1 4.9-1.5 6.9-2 8.1-3.7 15 1.1 19.6 5.4 5.1 12.7 1.5 19.1-1.6 1.4-.7 3.6-1.8 5-2.3 11.8 7.1 25.3 10.9 39.2 10.9 39.8 0 72.5-30.9 75.5-69.9h2c.6 0 24.7.2 43.8 19.1 15.6 15.5 23.5 39 23.5 70.1v15.4H57.1v-15.4z"/><circle class="numbers-artist" cx="148.6" cy="182" r="9"/><circle class="numbers-artist" cx="255.1" cy="182" r="9"/><path class="numbers-artist" d="M199.9 234.8h3.9c9.9 0 18-8.1 18-18 0-4.1-3.4-7.5-7.5-7.5s-7.5 3.4-7.5 7.5c0 1.7-1.3 3-3 3h-3.9c-1.7 0-3-1.3-3-3 0-4.1-3.4-7.5-7.5-7.5s-7.5 3.4-7.5 7.5c0 9.9 8.1 18 18 18zM248.3 274.8c2.6-3.2 2.1-7.9-1.1-10.5-3.2-2.6-7.9-2.1-10.5 1.1-.1.1-9.1 9.9-33 9.9-24.8 0-36.9-10.3-37.5-10.8-3.1-2.7-7.8-2.5-10.6.5-2.8 3.1-2.6 7.8.5 10.6.7.6 16.5 14.7 47.6 14.7 31.2 0 43.4-13.9 44.6-15.5z"/></svg>
                </div>
                <span class="about__numbers-num"><?= $fields['about-artists-nb']; ?></span><!--
                -->artistes
            </li>
            <li class="about__numbers-item">
                <div class="about__numbers-svg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 482 258"><path class="number-ticket" d="M465 89.4c4.1 0 7.5-3.4 7.5-7.5v-48c0-13-10.5-23.5-23.5-23.5H33c-13 0-23.5 10.5-23.5 23.5v48c0 4.1 3.4 7.5 7.5 7.5 22.3 0 40.5 18.2 40.5 40.5S39.4 170.4 17 170.4c-4.1 0-7.5 3.4-7.5 7.5v48c0 13 10.5 23.5 23.5 23.5h416c13 0 23.5-10.5 23.5-23.5v-48c0-4.1-3.4-7.5-7.5-7.5-22.3 0-40.5-18.2-40.5-40.5s18.2-40.5 40.5-40.5zm-55.5 40.5c0 28.1 20.9 51.3 48 55v41c0 4.7-3.8 8.5-8.5 8.5h-80.5v-16.5c0-4.1-3.4-7.5-7.5-7.5s-7.5 3.4-7.5 7.5v16.5H33c-4.7 0-8.5-3.8-8.5-8.5v-41c27.1-3.7 48-26.9 48-55s-20.9-51.3-48-55v-41c0-4.7 3.8-8.5 8.5-8.5h320.5v16.5c0 4.1 3.4 7.5 7.5 7.5s7.5-3.4 7.5-7.5v-16-.5H449c4.7 0 8.5 3.8 8.5 8.5v41c-27 3.7-48 26.9-48 55z"/><path class="number-ticket" d="M361 114.4c-4.1 0-7.5 3.4-7.5 7.5v16c0 4.1 3.4 7.5 7.5 7.5s7.5-3.4 7.5-7.5v-16c0-4.1-3.3-7.5-7.5-7.5zM361 66.4c-4.1 0-7.5 3.4-7.5 7.5v16c0 4.1 3.4 7.5 7.5 7.5s7.5-3.4 7.5-7.5v-16c0-4.1-3.3-7.5-7.5-7.5zM361 162.4c-4.1 0-7.5 3.4-7.5 7.5v16c0 4.1 3.4 7.5 7.5 7.5s7.5-3.4 7.5-7.5v-16c0-4.1-3.3-7.5-7.5-7.5zM305 58.4H121c-8.5 0-15.5 7-15.5 15.5v112c0 8.5 7 15.5 15.5 15.5h184c8.5 0 15.5-7 15.5-15.5v-112c0-8.5-6.9-15.5-15.5-15.5zm.5 127.5c0 .3-.2.5-.5.5H121c-.3 0-.5-.2-.5-.5v-112c0-.3.2-.5.5-.5h184c.3 0 .5.2.5.5v112z"/><path class="number-ticket" d="M273 106.4H153c-4.1 0-7.5 3.4-7.5 7.5s3.4 7.5 7.5 7.5h120c4.1 0 7.5-3.4 7.5-7.5s-3.3-7.5-7.5-7.5zM177 138.4h-24c-4.1 0-7.5 3.4-7.5 7.5s3.4 7.5 7.5 7.5h24c4.1 0 7.5-3.4 7.5-7.5s-3.3-7.5-7.5-7.5zM273 138.4h-64c-4.1 0-7.5 3.4-7.5 7.5s3.4 7.5 7.5 7.5h64c4.1 0 7.5-3.4 7.5-7.5s-3.3-7.5-7.5-7.5z"/></svg>
                </div>
                <span class="about__numbers-num"><?= $fields['about-visitors-nb']; ?></span><!--
                -->visiteurs
            </li>
            <li class="about__numbers-item">
                <div class="about__numbers-svg">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 546 400"><path class="number-art" d="M519.8 9.4h-494c-4.7 0-8.5 3.8-8.5 8.5v366c0 4.7 3.8 8.5 8.5 8.5h494c4.7 0 8.5-3.8 8.5-8.5v-366c0-4.7-3.8-8.5-8.5-8.5zm-46.5 55v145.1c-58.7.7-92.4 9.9-122.2 18-2.8.8-5.6 1.5-8.3 2.2l-44.4-44.4c-17.8-17.8-46.2-18.5-64.8-2.2l-40.2-40.2c-9.2-9.2-24.1-9.2-33.2 0l-87.9 87.9V64.4h401zm-200.8 177c-.6 0-1.2.1-1.7.3-18.2-5.4-38.5-10.5-61.3-13.4l32.4-32.4c12.7-12.7 33.3-12.7 46 0L326 234c-15.8 3.6-32.6 6.5-53.5 7.4zm-182.9-6.7l81.2-81.2c3.3-3.3 8.7-3.3 12 0l40.1 40.1-32.8 32.8c-29.3-2-62.6-.3-100.5 8.3zM72.3 337.4v-82.8c45-12.7 87.2-16.7 128.7-12.2 37.2 4 67.6 14.1 94.3 22.9 24.5 8.1 45.6 15.1 65.4 15.1 4.1 0 7.5-3.4 7.5-7.5s-3.4-7.5-7.5-7.5c-15.8 0-33.9-5.5-54.6-12.3 17.9-2.8 33.1-6.9 48.8-11.2 30.3-8.2 61.7-16.7 118.3-17.4v112.9H72.3zm405.4-288H67.9l-25-25h459.8l-25 25zM57.3 60v281.9l-25 25V35l25 25zm10.6 292.4h409.8l25 25H42.9l25-25zm420.4-10.6V60l25-25v331.8l-25-25z"/><path class="number-art" d="M384.8 168.4c17.4 0 31.5-14.1 31.5-31.5s-14.1-31.5-31.5-31.5-31.5 14.1-31.5 31.5 14.1 31.5 31.5 31.5zm0-48c9.1 0 16.5 7.4 16.5 16.5s-7.4 16.5-16.5 16.5-16.5-7.4-16.5-16.5 7.4-16.5 16.5-16.5z"/></svg>
                </div>
                <span class="about__numbers-num"><?= $fields['about-expos-nb']; ?></span><!--
                -->expositions
            </li>
        </ul>
    </section>
    <?php endif; ?>

    <div class="cta cta--reverse">
        <div class="cta--inner">
            <span class="cta__catch-phrase">Découvrez nos partenaires pour l'évènement&nbsp;!</span>
            <a href="<?= sl_get_page_url('template-partners.php'); ?>" class="cta-archive cta-archive--white" title="Aller sur la page des partenaires"><span class="cta-archive__text">Voir les partenaires</span></a>
        </div>
    </div>

    <?php if($fields['about-show-press']): ?>
    <section id="press" class="about__press">
        <h2 class="about__subtitle-press">Espace presse</h2>
        <div class="about__documents">
            <?php
                $posts = new WP_Query([
                    'showposts' => -1,
                    'post_type' => 'documents',
                ]);
            ?>
            <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
            <?php $doc = get_fields(); ?>
            <div class="about__document">
                <h3 class="about__subtitle-document"><?= $doc['documents-name']; ?></h3>
                <div class="about__document-desc"><?= $doc['documents-desc']; ?></div>
                <a class="about__document-link" href="<?= $doc['documents-file']['url']; ?>" title="Télécharger le document <?= $doc['documents-name']; ?>">Télécharger<span class="hidden"> le document <?= $doc['documents-name']; ?></span></a>
            </div>
            <?php endwhile; endif; ?>
        </div>

    </section>
    <?php endif; ?>
</main>


<?php get_footer(); ?>
