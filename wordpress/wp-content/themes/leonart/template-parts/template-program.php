<?php

/*
    Template Name: Programme
*/
get_header();
$fields = get_fields();
$expoFields = get_fields(sl_get_page_id_from_template('template-expositions.php'));
?>

<main>
    <h1 class="main-title">Programme</h1>

    <section id="expositions">
        <h2>Les expositions</h2>
        <div><?= $expoFields['expo-time']; ?></div>
        <div class="program__expos">
            <?php $posts = new WP_Query([
                'showposts' => 4,
                'post_type' => 'activities',
                'meta_query' => array(
                    array(
                        'key' => 'event-type',
                        'value' => 'expo',
                        'compare' => 'LIKE'
                    )
                ),
                'orderby' => 'rand',
            ]); ?>
            <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
            <?php
                $fields = get_fields();
                $relationPlace = get_field('event-expo-place');
                $place = get_fields($relationPlace[0]->ID);
                $relationArtist = get_field('event-expo-artists');
                $artistsID = sl_get_ids($relationArtist);
            ?>
            <div class="program__expo">
                <span class="program__subtitle"><?= $place['place-name']; ?></span>
                <p class="place__address"><?= $place['place-address']; ?></p>
                <?php if($place['place-website']): ?>
                <a href="<?= $place['place-website']; ?>" title="Aller sur le site web de <?= $place['place-name']; ?>">Website</a>
                <?php endif; ?>
                <?php if($place['place-facebook']): ?>
                <a href="<?= $place['place-facebook']; ?>" title="Aller sur la page Facebook de <?= $place['place-name']; ?>">Facebook</a>
                <?php endif; ?>
                <?php if($fields['event-expo-type']): ?>
                <span class="expo__type"><?= $fields['event-expo-type']; ?></span>
                <?php endif; ?>
                <?php if(have_rows('event-expo-list')): ?>
                <ul>
                    <?php foreach($fields['event-expo-list'] as $items): ?>
                        <?php foreach($items as $item): ?>
                    <li>
                        <?php echo $item; ?>
                    </li>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <?php if($artistsID): ?>
                <h3>Artistes présents</h3>
                <ul>
                <?php foreach($artistsID as $id): ?>
                    <?php $artist = get_fields($id); ?>
                    <li>
                        <a href="<?= get_permalink($id); ?>">
                            <?= $artist['artist-name']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
            <?php endwhile; endif; ?>
            <a href="<?= sl_get_page_url('template-expositions.php'); ?>" title="Aller sur la page des expositions">Voir toutes les expositions</a>
        </div>

    </section>

    <section id="concerts">
        <h2>Concerts &amp; spectacles</h2>
    </section>

    <section id="oeuvres">
        <h2>&OElig;uvres dans l'espace urbain</h2>
    </section>

    <section id="divers">
        <h2>Évènements divers</h2>
    </section>

    <section id="artistes">
        <h2>Les artistes</h2>
    </section>

    <div class="cta cta--white">
        Envie de voir un planning chronologique de l'évènement&nbsp;?
        <a href="<?= sl_get_page_url('template-agenda.php'); ?>" class="button--white" title="Aller sur l'agenda">Voir l'agenda complet</a>
    </div>
</main>


<?php get_footer(); ?>
