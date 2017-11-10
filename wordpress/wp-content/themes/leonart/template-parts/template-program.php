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
                    <?php while(have_rows('event-expo-list')) : the_row(); ?>
                    <li>
                        <?= get_sub_field('event-expo-item'); ?>
                    </li>
                    <?php endwhile; ?>
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
                    <?php while(have_rows('event-datetimes')) : the_row(); ?>
                        <?php $date = new DateTime(get_sub_field('event-datetime')); ?>
                        <li>
                            <time datetime="<?= strftime($htmlTimestampFormat, $date->getTimestamp()); ?>"><?= strftime("%A %e %B - %kh%M", $date->getTimestamp()); ?></time>
                        </li>
                    <?php endwhile; ?>
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
        <div class="program__work">
            <?php $posts = new WP_Query([
                'showposts' => 4,
                'post_type' => 'activities',
                'meta_query' => array(
                    array(
                        'key' => 'event-type',
                        'value' => 'work',
                        'compare' => 'LIKE'
                    )
                ),
                'orderby' => 'rand',
            ]); ?>
            <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
            <?php $shows = get_fields(); $image = $shows['event-work-img']; ?>
            <a href="" title="Voir l'image de l'œuvre <?= $shows['event-work-title']; ?> en plus grand">
                <img src="<?= $image['sizes']['smallest']; ?>" alt="<?php echo (sl_get_image_alt($image) ? sl_get_image_alt : 'Image de l\'œuvre ' . $shows['event-work-title']); ?>">
            </a>
            <?php endwhile; endif; ?>
        </div>
        <a href="<?= sl_get_page_url('template-work.php'); ?>" title="Aller sur la page des œuvres dans l'espace urbain">Voir toutes les &oelig;uvres</a>
    </section>

    <section id="divers">
        <h2>Évènements divers</h2>
        <div class="program__various">
            <?php $posts = new WP_Query([
                'showposts' => 4,
                'post_type' => 'activities',
                'meta_query' => array(
                    array(
                        'key' => 'event-type',
                        'value' => 'various',
                        'compare' => 'LIKE'
                    )
                ),
                'orderby' => 'rand',
            ]); ?>
            <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
            <?php $various = get_fields(); ?>
            <div>
                <h3 class="program__subtitle"><?= $various['event-various-title']; ?></h3>
                <?php if($various['event-has-place']): ?>
                <?php $place = get_fields($various['event-place'][0]->ID); ?>
                <a href="<?= get_permalink($various['event-place'][0]->ID); ?>">
                    <span class="place"><?= $place['place-name']; ?></span> - <?= $place['place-address']; ?>
                </a>
                <?php elseif($various['event-address']): ?>
                <span class="place"><?= $various['event-address']; ?></span>
                <?php endif; ?>
                <?php if($various['event-datetimes']): ?>
                <ul class="various__datimes">
                    <?php while(have_rows('event-datetimes')) : the_row(); ?>
                        <?php $date = new DateTime(get_sub_field('event-datetime')); ?>
                    <li>
                        <time datetime="<?= strftime($htmlTimestampFormat, $date->getTimestamp()); ?>"><?= strftime("%A %e %B - %kh%M", $date->getTimestamp()); ?></time>
                    </li>
                    <?php endwhile; ?>
                </ul>
                <?php endif; ?>
                <?php if($various['event-various-desc']): ?>
                <div class="various__description">
                    <?= $various['event-various-desc']; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endwhile; endif; ?>
        </div>
        <a href="<?= sl_get_page_url('template-various-events.php'); ?>" title="Aller sur la page des évènements divers">Voir tous les évènements divers</a>
    </section>

    <section id="artistes">
        <h2>Les artistes</h2>
        <?php $posts = new WP_Query(['showposts' => 8, 'post_type' => 'artists']); ?>
        <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
        <?php $artists = get_fields(); ?>
        <a href="<?= the_permalink(); ?>" title="Aller sur la page de l’artiste <?= $artists['artist-name']; ?>">
            <figure>
                <?php $image = $artists['artist-img'];?>
                <img src="<?= $image['sizes']['smallest']; ?>"  alt="Photo de l’artiste <?= $artists['artist-name']; ?>">
                <span class="artists__name"><?= $artists['artist-name']; ?></span>
                <?php $artistID = $post->ID; ?>
                <?php if(sl_get_taxonomies($artistID, 'artistic-disciplines')): ?>
                <p class="artists__disciplines"><?= sl_get_taxonomies($artistID, 'artistic-disciplines'); ?></p>
                <?php endif; ?>
                <div class="artists__overlay"></div>
            </figure>
        </a>
        <?php endwhile; endif; ?>
        <a href="<?= get_post_type_archive_link('artists'); ?>" title="Aller sur la page de tous les artistes">Voir tous les artistes</a>
    </section>

    <div class="cta cta--white">
        Envie de voir un planning chronologique de l'évènement&nbsp;?
        <a href="<?= sl_get_page_url('template-agenda.php'); ?>" class="button--white" title="Aller sur l'agenda">Voir l'agenda complet</a>
    </div>
</main>


<?php get_footer(); ?>
