<?php

/*
    Template Name: Programme
*/
$fields = get_fields();
$expoFields = get_fields(sl_get_page_id_from_template('template-expositions.php'));
get_header();

?>

<main class="program">
    <h1 class="main-title">Programme</h1>
    <div class="program__activities">
        <section id="expositions" class="program__expos program__activity">
            <h2 class="program__title">Les expositions</h2>
            <div><?= $expoFields['expo-time']; ?></div>
            <div class="program__expos--inner program__activity--inner">
                <?php $posts = sl_get_featured_random_activities('expo'); ?>
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
            <a href="<?= sl_get_page_url('template-expositions.php'); ?>" title="Aller sur la page des expositions" class="arrow-link arrow-link--raspberry">Voir toutes les expositions</a>
        </section>

        <section id="concerts" class="program__shows program__activity">
            <h2 class="program__title program__title--show">Concerts &amp; spectacles</h2>
            <div class="program__shows--inner program__activity--inner">
                <?php $posts = sl_get_featured_random_activities('show'); ?>

                <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
                <?php $shows = get_fields(); ?>
                <div class="program__show">
                    <h3 class="program__subtitle program__subtitle--show"><?= $shows['event-title']; ?></h3>
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
            <a href="<?= sl_get_page_url('template-shows.php'); ?>" title="Aller sur la page des concerts et spectacles" class="arrow-link arrow-link--orange">Voir tous les concerts et spectacles</a>
        </section>

        <section id="oeuvres" class="program__work program__activity">
            <h2 class="program__title">&OElig;uvres dans l'espace urbain</h2>
            <div class="program__work--inner program__activity--inner">
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
            <a href="<?= sl_get_page_url('template-work.php'); ?>" title="Aller sur la page des œuvres dans l'espace urbain" class="arrow-link">Voir toutes les &oelig;uvres</a>
        </section>

        <section id="divers" class="program__various program__activity">
            <h2 class="program__title">Évènements divers</h2>
            <div class="program__various--inner program__activity--inner">
                <?php $posts = sl_get_featured_random_activities('various'); ?>

                <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
                <?php $various = get_fields(); ?>
                <div>
                    <h3 class="program__subtitle"><?= $various['event-title']; ?></h3>
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
            <a href="<?= sl_get_page_url('template-various-events.php'); ?>" title="Aller sur la page des évènements divers" class="arrow-link arrow-link--raspberry">Voir tous les évènements divers</a>
        </section>
    </div>

    <section id="artistes" class="program__artists">
        <div class="artists artists-program">
            <div class="artists__list">
                <h2 class="program__title program__title--artists">Les artistes</h2>
                <ul>
                    <?php $posts = new WP_Query(['showposts' => 8, 'post_type' => 'artists', 'orderby' => 'rand',]); ?>
                    <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
                    <?php $fields = get_fields(); ?>
                    <li class="artists__item">
                        <a href="<?= the_permalink(); ?>" title="Aller sur la page de l’artiste <?= $fields['artist-name']; ?>" class="artists__link">
                            <figure class="artists__figure">
                                <?php $image = $fields['artist-img'];?>
                                <img src="<?= $image['url']; ?>"  alt="Photo de l’artiste <?= $fields['artist-name']; ?>" class="artists__img">
                                <div class="artists__overlay">
                                    <span class="artists__link-text">Visiter sa page</span>
                                </div>
                                <div class="artists__text-bg">
                                    <div class="artists__info">
                                        <span class="artists__name"><?= $fields['artist-name']; ?></span>
                                        <?php $artistID = $post->ID; ?>
                                        <?php if(sl_get_taxonomies($artistID, 'artistic-disciplines')): ?>
                                        <p class="artists__disciplines"><?= sl_get_taxonomies($artistID, 'artistic-disciplines'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </figure>
                        </a>
                        <?php endwhile; endif; ?>
                    </li>
                </ul>
            </div>
        </div>
        <a href="<?= get_post_type_archive_link('artists'); ?>" title="Aller sur la page de tous les artistes" class="arrow-link arrow-link--pink arrow-link--skew"><span class="cta-archive__text">Voir tous les artistes</span></a>
    </section>

    <div class="cta cta--white">
        Envie de voir un planning chronologique de l'évènement&nbsp;?
        <a href="<?= sl_get_page_url('template-agenda.php'); ?>" class="button--white" title="Aller sur l'agenda">Voir l'agenda complet</a>
    </div>
</main>


<?php get_footer(); ?>
