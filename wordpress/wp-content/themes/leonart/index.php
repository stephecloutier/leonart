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
        <?php $posts = new WP_Query(['showposts' => 8, 'post_type' => 'artists', 'orderby' => 'rand',]); ?>
        <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
        <?php $fields = get_fields(); ?>
        <a href="<?= the_permalink(); ?>" title="Aller sur la page de l’artiste <?= $fields['artist-name']; ?>">
            <figure>
                <?php $image = $fields['artist-img'];?>
                <img src="<?= $image['sizes']['smallest']; ?>"  alt="Photo de l’artiste <?= $fields['artist-name']; ?>">
                <span class="artists__name"><?= $fields['artist-name']; ?></span>
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

    <section class="home-agenda">
        <h2 class="home-agenda__title home-title">
            Les évènements à venir
        </h2>
        <?php
            //$posts = new WP_Query(['showposts' => 3, 'post_type' => 'activities']);
            $agendaFields = get_fields(sl_get_page_id_from_template('template-agenda.php'));
        ?>
        <?php
            $posts = new WP_Query([
            'showposts' => 3,
            'post_type' => 'activities',
            'meta_query' => array(
                array(
                    'key' => 'event-datetimes',
                    'compare' => 'EXISTS',
                )
            ),
            ]);
            var_dump($posts->posts);
        ?>
        <?php foreach($agendaFields['agenda-dates'] as $dates): ?>
            <div class="agenda__day">
                <div class="agenda__date">
                    <?php
                        $date = new DateTime($dates['agenda-date']);
                        $day = strftime('%d', $date->getTimestamp());
                    ?>
                    <time datetime="<?= strftime($htmlTimestampFormat, $date->getTimestamp()); ?>">
                        <span class="agenda__date--day"><?= strftime('%A', $date->getTimestamp()); ?></span>
                        <span class="agenda__date--numbers"><?= strftime('%d/%m', $date->getTimestamp()); ?></span>
                    </time>
                </div>
                <div class="agenda__activities">
                <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
                    <?php $activity = get_fields($post->ID); ?>
                    <?php foreach($activity['event-datetimes'] as $datetimes): ?>
                        <?php
                            $activityDate = new DateTime($datetimes['event-datetime']);
                            $activityDay = strftime('%d', $activityDate->getTimestamp());
                        ?>
                        <?php if($activityDay == $day): ?>
                        <time class="activity__time"><?= strftime('%Hh%M', $activityDate->getTimestamp()); ?></time>
                        <div class="activity__infos"><?= $activity['event-title']; ?></div>
                            <?php if($activity['event-has-place']): ?>
                                <?php
                                    $relationPlace = $activity['event-place'];
                                    $place = get_fields($relationPlace[0]->ID);
                                ?>
                            <?php elseif($activity['event-address']): ?>

                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endwhile; endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
        <a href="<?= sl_get_page_url('template-agenda.php'); ?>" title="Aller sur la page de l'agenda">Voir l'agenda complet</a>
    </section>

    <section class="home-newsletter">
        <h2 class="home-newsletter__title home-title">
            Vous voulez rester informé&nbsp;?
        </h2>
        <h3 class="home-newsletter__subtitle">Inscrivez-vous à la <em>newsletter&nbsp;!</em></h3>
        [insérer le form ici]
    </section>

    <section class="news">
        <h2 class="news__title home-title">
            Les dernières news
        </h2>
        <?php $posts = new WP_Query(['showposts' => 2, 'post_type' => 'news']); ?>
        <?php get_template_part('parts/news'); ?>
        <a href="<?= get_post_type_archive_link('news'); ?>" title="Aller sur la page des news">Voir toutes les news</a>
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
