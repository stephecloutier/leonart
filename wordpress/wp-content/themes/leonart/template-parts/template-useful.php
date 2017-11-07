<?php
/*
    Template Name: Page "En Pratique"
*/
get_header();
//$agendaFields = get_fields(sl_get_page_id_from_template('template-agenda.php'));
//$date = new DateTime($agendaFields['agenda-dates'][0]['agenda-date']);
$fields = get_fields();
?>

<main>
    <h1 class="main-title">En Pratique</h1>
    <?php if($fields['useful-intro']): ?>
    <div class="intro">
        <?= $fields['useful-intro']; ?>
    </div>
    <?php endif; ?>

    <section>
        <h2>Les lieux clés</h2>
        <img src="<?= $fields['useful-map']['url']; ?>" alt="Carte du quartier Saint-Léonard" width="1200">
        <ol class="places">
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
            <li>
                <a href="<?= the_permalink(); ?>">
                    <?= $placesFields['place-name']; ?>
                </a>
            </li>
            <?php endwhile; endif; ?>
        </ol>

        <a href="<?= sl_get_page_url('template-program.php'); ?>">Voir les évènements sur ces lieux</a>
    </section>

    <section>
        <h2 class="hidden">Autres infos</h2>

        <div>
            <span class="subtitle--underline">Infos parking</span>
            <?= $fields['useful-parking']; ?>
        </div>


        <div>
            <span class="subtitle--underline">Transports en commun</span>
            <?= $fields['useful-transport']; ?>
        </div>
    </section>

    <div class="cta cta--white">
        Vous voulez planifier votre week-end&nbsp;?
        <a href="<?= sl_get_page_url('template-agenda.php'); ?>" class="button--white" title="Aller sur l'agenda">Aller voir l'agenda</a>
    </div>
</main>


<?php get_footer(); ?>
