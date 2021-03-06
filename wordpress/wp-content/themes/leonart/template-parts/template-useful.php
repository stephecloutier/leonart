<?php
/*
    Template Name: Page "En Pratique"
*/
//$agendaFields = get_fields(sl_get_page_id_from_template('template-agenda.php'));
//$date = new DateTime($agendaFields['agenda-dates'][0]['agenda-date']);
$fields = get_fields();
get_header();

?>

<main>
    <h1 class="main-title">En Pratique</h1>
    <?php if($fields['useful-intro']): ?>
    <div class="intro useful__intro">
        <?= $fields['useful-intro']; ?>
    </div>
    <?php endif; ?>

    <section class="useful__places">
        <div class="useful__places--inner">
            <h2 class="useful__subtitle">Les lieux clés</h2>
            <img class="useful__map" src="<?= $fields['useful-map']['url']; ?>" alt="Carte du quartier Saint-Léonard" width="1200">
            <ol class="useful__places-list">
                <?php
                    $posts = new WP_Query([
                        'showposts' => -1,
                        'post_type' => 'places',
                        'orderby' => 'meta_value_num',
                        'meta_key' => 'place-number',
                        'order' => 'ASC',
                    ]);
                ?>
                <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
                <?php $placesFields = get_fields(); ?>
                <li class="useful__places-item">
                    <span class="useful__places-number"><?= $placesFields['place-number']; ?></span>
                    <span class="useful__places-name">
                        <a class="useful__places-link" href="<?= the_permalink(); ?>">
                            <?= $placesFields['place-name']; ?>
                        </a>
                    </span>
                </li>
                <?php endwhile; endif; ?>
            </ol>

            <a class="cta-archive cta-archive--white-yellow useful__cta" href="<?= sl_get_page_url('template-program.php'); ?>">
                <span class="cta-archive__text">Voir les évènements sur ces lieux</span>
            </a>
        </div>
    </section>

    <section class="useful__other">
        <h2 class="hidden">Autres infos</h2>

        <?php if(isset($fields['useful-parking'])): ?>
        <div class="useful__block useful__block--parking">
            <div class="useful__block--inner">
                <span class="useful__subtitle-underlined">Infos parking</span>
                <div class="useful__wysiwyg wysiwyg">
                    <?= $fields['useful-parking']; ?>
                </div>
            </div>
            <div class="useful__block--svg">
                <svg class="useful__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 570 532"><path class="parking-sign" d="M535.3 14H392.6c-5 0-8.4 3.4-8.4 8.4v142.7c0 5 3.4 8.4 8.4 8.4h58.8v260.2h-16.8c-5 0-8.4 3.4-8.4 8.4v25.2h-16.8c-5 0-8.4 3.4-8.4 8.4v33.6c0 5 3.4 8.4 8.4 8.4h100.7c5 0 8.4-3.4 8.4-8.4v-33.6c0-5-3.4-8.4-8.4-8.4h-16.8v-25.2c0-5-3.4-8.4-8.4-8.4h-16.8V173.5h67.1c5 0 8.4-3.4 8.4-8.4V22.4c.1-5-3.3-8.4-8.3-8.4zm-33.6 486.8h-83.9V484h84l-.1 16.8zm-25.2-33.6h-33.6v-16.8h33.6v16.8zm50.4-310.5H401V30.8h125.9v125.9z"/><path class="parking-sign" d="M451.3 139.9c5 0 8.4-3.4 8.4-8.4v-16.8h8.4c18.5 0 33.6-15.1 33.6-33.6s-15.1-33.6-33.6-33.6h-16.8c-5 0-8.4 3.4-8.4 8.4v75.6c0 5 3.4 8.4 8.4 8.4zm33.6-58.7c0 9.2-7.6 16.8-16.8 16.8h-8.4V64.4h8.4c9.3 0 16.8 7.5 16.8 16.8z"/><g><path class="car" d="M395.9 425.3V333c0-14.3-10.9-25.2-25.2-25.2h-4.2c-4.2 0-7.6-2.5-8.4-5.9l-29.4-102.4v-.8c-6.7-15.1-21.8-25.2-38.6-25.2H132.4c-16.8 0-31.9 10.1-38.6 25.2v.8L64.4 301.9c-1.7 3.4-5 5.9-8.4 5.9h-4.2c-14.3 0-25.2 10.9-25.2 25.2v92.3c0 14.3 10.9 25.2 25.2 25.2v42c0 14.3 10.9 25.2 25.2 25.2h16.8c14.3 0 25.2-10.9 25.2-25.2v-42h184.7v42c0 14.3 10.9 25.2 25.2 25.2h16.8c14.3 0 25.2-10.9 25.2-25.2v-42c14.1 0 25-10.9 25-25.2zm-293.7 67.1c0 5-3.4 8.4-8.4 8.4H77c-5 0-8.4-3.4-8.4-8.4v-42h33.6v42zm251.8 0c0 5-3.4 8.4-8.4 8.4h-16.8c-5 0-8.4-3.4-8.4-8.4v-42H354v42zm25.1-67.1c0 5-3.4 8.4-8.4 8.4H51.8c-5 0-8.4-3.4-8.4-8.4V333c0-5 3.4-8.4 8.4-8.4H56c10.9 0 21-7.6 24.3-18.5l29.4-101.6c4.2-8.4 12.6-14.3 22.7-14.3h157.8c9.2 0 18.5 5 22.7 14.3l29.4 101.6c3.4 10.9 13.4 18.5 24.3 18.5h4.2c5 0 8.4 3.4 8.4 8.4l-.1 92.3z"/><path class="car" d="M102.2 341.3c-18.5 0-33.6 15.1-33.6 33.6s15.1 33.6 33.6 33.6 33.6-15.1 33.6-33.6-15.2-33.6-33.6-33.6zm0 50.4c-9.2 0-16.8-7.6-16.8-16.8s7.6-16.8 16.8-16.8 16.8 7.6 16.8 16.8-7.6 16.8-16.8 16.8zM320.4 341.3c-18.5 0-33.6 15.1-33.6 33.6s15.1 33.6 33.6 33.6 33.6-15.1 33.6-33.6-15.1-33.6-33.6-33.6zm0 50.4c-9.2 0-16.8-7.6-16.8-16.8s7.6-16.8 16.8-16.8 16.8 7.6 16.8 16.8-7.6 16.8-16.8 16.8zM228.1 383.3h-33.6c-5 0-8.4 3.4-8.4 8.4s3.4 8.4 8.4 8.4h33.6c5 0 8.4-3.4 8.4-8.4s-3.4-8.4-8.4-8.4zM244.9 349.7h-67.1c-5 0-8.4 3.4-8.4 8.4s3.4 8.4 8.4 8.4h67.1c5 0 8.4-3.4 8.4-8.4-.1-5-3.4-8.4-8.4-8.4zM130.7 307.8h162c5 0 10.1-2.5 13.4-6.7s4.2-10.1 2.5-15.1l-20.1-67.1c-1.7-6.7-8.4-11.8-15.9-11.8H150.8c-7.6 0-13.4 4.2-15.9 11.8L114.8 286c-1.7 5-.8 10.9 2.5 15.1 3.3 4.2 8.4 6.7 13.4 6.7zm20.1-84h121.7l20.1 67.1h-162l20.2-67.1z"/></g></svg>
            </div>
        </div>
        <?php endif; ?>
        <?php if(isset($fields['useful-transport'])): ?>
        <div class="useful__block useful__block--transport">
            <div class="useful__block--inner">
                <span class="useful__subtitle-underlined">Transports en commun</span>
                <div class="useful__wysiwyg wysiwyg">
                    <?= $fields['useful-transport']; ?>
                </div>
            </div>
            <div class="useful__block--svg">
                <svg class="useful__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 981 547"><path class="bus" d="M559 353.1c-21.7 0-39.3 18.1-39.3 40.3 0 22.2 17.6 40.3 39.3 40.3 21.7 0 39.3-18.1 39.3-40.3-.1-22.2-17.7-40.3-39.3-40.3zm0 59.8c-10.2 0-18.4-8.7-18.4-19.5 0-10.7 8.3-19.5 18.4-19.5 10.2 0 18.4 8.7 18.4 19.5s-8.3 19.5-18.4 19.5zM351.7 353.1c-21.7 0-39.3 18.1-39.3 40.3 0 22.2 17.6 40.3 39.3 40.3 21.7 0 39.3-18.1 39.3-40.3 0-22.2-17.6-40.3-39.3-40.3zm0 59.8c-10.2 0-18.4-8.7-18.4-19.5 0-10.7 8.3-19.5 18.4-19.5 10.2 0 18.4 8.7 18.4 19.5.1 10.8-8.2 19.5-18.4 19.5zM422.7 383h65.2v20.9h-65.2z"/><path class="bus" d="M671.7 100.3h-18.1c-4.6-33-33-58.6-67.3-58.6h-262c-34.3 0-62.7 25.5-67.3 58.6h-18c-15.8 0-28.7 13.2-28.7 29.4v92.9c0 16.2 12.9 29.4 28.7 29.4h17.4v154.1c0 32.7 23.3 60.1 54.1 66.5v18.3c0 22.5 17.3 40.8 38.7 40.8h6.1c21.3 0 38.7-18.3 38.7-40.8V474h122.8v16.9c0 22.5 17.3 40.8 38.7 40.8h6.1c21.3 0 38.7-18.3 38.7-40.8v-18.3c30.9-6.4 54.1-33.8 54.1-66.5V252h17.4c15.8 0 28.7-13.2 28.7-29.4v-92.9c-.1-16.2-13-29.4-28.8-29.4zM324.4 62.6h262c26 0 47.1 21.1 47.1 47.1v21.2H277.3v-21.2c0-26 21.1-47.1 47.1-47.1zm-47.1 89.1h166.5v157.1H277.3V151.7zm187.3 0h168.8v157.1H464.6V151.7zM239 231.1c-4.3 0-7.8-3.8-7.8-8.5v-92.9c0-4.7 3.5-8.5 7.8-8.5h17.4v109.9H239zm134.1 259.8c0 11-8 20-17.8 20h-6.1c-9.8 0-17.8-9-17.8-20V474h41.7v16.9zm188.4 20h-6.1c-9.8 0-17.8-9-17.8-20V474h41.7v16.9c0 11-8 20-17.8 20zm24.8-57.8h-262c-26 0-47.1-21.1-47.1-47.1v-76.4h356.1V406c.1 26-21 47.1-47 47.1zm93.2-230.5c0 4.7-3.5 8.5-7.8 8.5h-17.4V121.2h17.4c4.3 0 7.8 3.8 7.8 8.5v92.9z"/><g><path class="tree" d="M869.5 310.2c3.3-3.3 3.3-8.6 0-11.9a8.39 8.39 0 0 0-11.9 0l-49.3 49.3v-49.3-142.2c0-4.7-3.8-8.4-8.4-8.4s-8.4 3.8-8.4 8.4v121.8L742 228.6a8.39 8.39 0 0 0-11.9 0 8.39 8.39 0 0 0 0 11.9l61.3 61.3v228.8c0 4.7 3.8 8.4 8.4 8.4s8.4-3.8 8.4-8.4V371.4l61.3-61.2zM718.3 337.3c0 5 4 9 9 9s9-4 9-9-4-9-9-9-9 4-9 9zM872.5 127.6c0-5-4-9-9-9s-9 4-9 9 4 9 9 9 9-4 9-9zM851.5 94.5c0-5-4-9-9-9s-9 4-9 9 4 9 9 9 9-4.1 9-9z"/><g><path class="tree" d="M767.8 428.6C712.2 416.6 669 374 654.2 321v43.6c4.5 7.9 9.7 15.4 15.5 22.5 24 29.4 57.6 50 94.5 57.9 4.6 1 9-1.9 10-6.5 1.1-4.4-1.8-8.9-6.4-9.9zM930 175.2c2.4-10 3.5-20.3 3.5-30.7 0-73.8-60-133.8-133.8-133.8-58.3 0-108 37.5-126.3 89.7 5.9.4 11.3 2.6 15.7 6.1 15.8-45.9 59.4-78.9 110.6-78.9 64.5 0 116.9 52.4 116.9 116.9 0 10.4-1.4 20.6-4 30.6-.7 2.7-.1 5.6 1.7 7.7 23.5 27.3 36.4 62.2 36.4 98.3 0 70.7-50.1 132.7-119 147.6-4.6 1-7.4 5.5-6.5 10 .9 4 4.3 6.7 8.2 6.7.6 0 1.2-.1 1.8-.2 36.9-8 70.5-28.5 94.5-57.9 24.4-29.8 37.8-67.5 37.8-106.1.1-38.8-13.2-76.2-37.5-106z"/></g></g><g><path class="tree" d="M213.8 336.7c2.8-2.8 2.8-7.2 0-10s-7.4-2.8-10.2 0l-42.3 41.4v-41.4-119.3c0-3.9-3.2-7.1-7.2-7.1s-7.2 3.2-7.2 7.1v102.2l-42.3-41.4c-2.8-2.8-7.4-2.8-10.2 0-2.8 2.8-2.8 7.2 0 10l52.5 51.4v192c0 3.9 3.2 7.1 7.2 7.1s7.2-3.2 7.2-7.1V388.1l52.5-51.4zM84.2 359.4c0 4.2 3.5 7.5 7.7 7.5s7.7-3.4 7.7-7.5c0-4.2-3.5-7.5-7.7-7.5s-7.7 3.3-7.7 7.5zM99.6 191.1c4.2 0 7.7-3.4 7.7-7.5 0-4.2-3.5-7.5-7.7-7.5s-7.7 3.4-7.7 7.5 3.4 7.5 7.7 7.5zM117.6 163.3c4.2 0 7.7-3.4 7.7-7.5 0-4.2-3.5-7.5-7.7-7.5s-7.7 3.4-7.7 7.5 3.5 7.5 7.7 7.5z"/><g><path class="tree" d="M256.4 406.1v-16.7c-18.2 23.2-44.5 40.2-75 46.7-3.9.8-6.4 4.6-5.5 8.4.7 3.3 3.7 5.6 7.1 5.6.5 0 1-.1 1.5-.2 27.3-5.8 52.5-19.4 72.2-39-.2-1.6-.3-3.2-.3-4.8zM154 99.6c21.9 0 42.1 6.9 58.6 18.6 1.9-4.5 4.8-8.4 8.5-11.4C202.2 93.4 179 85.5 154 85.5c-63.2 0-114.6 50.3-114.6 112.2 0 8.7 1 17.3 3 25.7-20.8 25-32.2 56.4-32.2 88.8s11.5 64 32.4 89c20.6 24.7 49.4 41.9 81 48.6 3.9.8 7.7-1.6 8.6-5.4.8-3.8-1.6-7.6-5.5-8.4-59.1-12.5-102-64.5-102-123.8 0-30.2 11.1-59.5 31.2-82.5 1.6-1.8 2.1-4.2 1.5-6.5-2.3-8.3-3.5-17-3.5-25.6-.1-54 44.9-98 100.1-98z"/></g></g></svg>
            </div>
        </div>
        <?php endif; ?>
    </section>

    <div class="cta">
        <div class="cta--inner">
            <span class="cta__catch-phrase">Vous voulez planifier votre week-end&nbsp;?</span>
            <a href="<?= sl_get_page_url('template-agenda.php'); ?>" class="cta-archive cta-archive--white" title="Aller sur l'agenda"><span class="cta-archive__text">Aller voir l'agenda</span></a>
        </div>
    </div>
</main>


<?php get_footer(); ?>
