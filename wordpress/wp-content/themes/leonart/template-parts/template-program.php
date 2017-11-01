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
                <a href="<?= get_permalink($relationPlace[0]->ID); ?>" title="Aller sur la page du lieu <?= $place['place-name']; ?>">
                    <h3 class="program__subtitle"><?= $place['place-name']; ?></h3>
                </a>
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
                <h4>Artistes présents</h4>
                <ul>
                <?php foreach($artistsID as $id): ?>
                    <?php $artist = get_fields($id); ?>
                    <li>
                        <a href="<?= get_permalink($id); ?>" title="Aller sur la page de l'artiste <?= $artist['artist-name']; ?>">
                            <?= $artist['artist-name']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
            <?php endwhile; endif; ?>
        </div>
        <a href="<?= sl_get_page_url('template-expositions.php'); ?>" title="Aller sur la page des expositions">Voir toutes les expositions</a>
    </section>

    <section id="concerts">
        <h2>Concerts &amp; spectacles</h2>
        <div class="program__shows">
            <?php $posts = new WP_Query([
                'showposts' => 4,
                'post_type' => 'activities',
                'meta_query' => array(
                    array(
                        'key' => 'event-type',
                        'value' => 'show',
                        'compare' => 'LIKE'
                    )
                ),
                'orderby' => 'rand',
            ]); ?>
            <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
            <?php $shows = get_fields(); ?>
            <div class="program__show">
                <h3 class="program__subtitle program__subtitle--show"><?= $shows['event-show-title']; ?></h3>
                <ul class="show__datimes">
                    <?php foreach($shows['event-show-datetimes'] as $datetimes): ?>
                        <?php foreach($datetimes as $datetime): ?>
                        <?php
                            $date = new DateTime($datetime);
                        ?>
                    <li>
                        <time datetime="<?= strftime($htmlTimestampFormat, $date->getTimestamp()); ?>"><?= strftime("%A %e %B - %kh%M", $date->getTimestamp()); ?></time>
                    </li>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </ul>
                <?php if($shows['event-has-place']): ?>
                    <?php
                        $relationPlace = $shows['event-place'];
                        $place = get_fields($relationPlace[0]->ID);
                    ?>
                <a href="<?= get_permalink($relationPlace[0]->ID); ?>" class="key-place" title="Aller sur la page du lieu <?= $place['place-name']; ?>"><?= $place['place-name']; ?></a>
                <span class="place"><?= $place['place-address']; ?></span>
                <?php else: ?>
                <span class="place"><?= $shows['event-address']; ?></span>
                <?php endif; ?>
            </div>
            <?php endwhile; endif; ?>
        </div>
        <a href="<?= sl_get_page_url('template-shows.php'); ?>" title="Aller sur la page des concerts et spectacles">Voir tous les concerts et spectacles</a>
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
