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
                    <a class="useful__places-link" href="<?= the_permalink(); ?>">
                        <?= $placesFields['place-name']; ?>
                    </a>
                </li>
                <?php endwhile; endif; ?>
            </ol>

            <a class="cta-archive cta-archive--white useful__cta" href="<?= sl_get_page_url('template-program.php'); ?>">
                <span class="cta-archive__text">Voir les évènements sur ces lieux</span>
            </a>
        </div>
    </section>

    <section class="useful__other">
        <h2 class="hidden">Autres infos</h2>

        <?php if(isset($fields['useful-parking'])): ?>
        <div class="useful__block">
            <span class="useful__subtitle-underlined">Infos parking</span>
            <?= $fields['useful-parking']; ?>
        </div>
        <?php endif; ?>
        <?php if(isset($fields['useful-transport'])): ?>
        <div class="useful__block">
            <span class="useful__subtitle-underlined">Transports en commun</span>
            <?= $fields['useful-transport']; ?>
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
