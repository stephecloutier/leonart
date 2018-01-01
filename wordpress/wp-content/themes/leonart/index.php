<?php
/*
    Template Name: Homepage
*/
$fields = get_fields();
get_header();
?>
<main>
    <div class="intro__wrapper">
        <div class="banner">
            <div class="banner__inner">
                <span class="banner__title">Saint-Léon'Art</span>
                <span class="banner__content"><?= $fields['banner-text']; ?></span>
            </div>
        </div>

        <div class="intro intro--home">
            <span class="intro__title home-title">Un vaste parcours artistique</span>
            <div class="intro__content"><?= $fields['intro-text']; ?></div>
            <a href="<?= sl_get_page_url('template-about.php'); ?>" class="arrow-link arrow-link--raspberry">En savoir plus<span class="hidden"> sur l'évènement Saint-Léon'Art</span></a>
        </div>
    </div>

    <section class="artists home-section">
        <div class="artists__inner">
        <h2 class="artists__title home-title">
            Quelques artistes
        </h2>
        <ul class="artists__list">
            <?php $posts = new WP_Query(['showposts' => 8, 'post_type' => 'artists', 'orderby' => 'rand',]); ?>
            <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
            <?php $fields = get_fields(); ?>
            <li class="artists__item">
                <a href="<?= the_permalink(); ?>" title="Aller sur la page de l’artiste <?= $fields['artist-name']; ?>" class="artists__link">
                    <figure class="artists__figure">
                        <?php $image = $fields['artist-img'];?>
                        <img src="<?= $image['url']; ?>"  alt="<?= sl_get_image_alt($image) ? sl_get_image_alt($image) : $fields['artist-name']; ?>" class="artists__img">
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
        <a href="<?= get_post_type_archive_link('artists'); ?>" title="Aller sur la page de tous les artistes" class="cta-archive cta-archive--artists"><span class="cta-archive__text">Voir tous les artistes</span></a>
    </section>

    <section class="agenda agenda--home home-section">
        <h2 class="agenda__title home-title">
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
        ?>
        <div class="agenda__inner">
            <?php foreach($agendaFields['agenda-dates'] as $dates): ?>
                <div class="agenda__day">
                    <?php
                        $date = new DateTime($dates['agenda-date']);
                        $day = strftime('%d', $date->getTimestamp());
                    ?>
                    <div class="agenda__date agenda__date--<?= strftime('%A', $date->getTimestamp()); ?>">
                        <time class="agenda__time" datetime="<?= strftime($htmlTimestampFormat, $date->getTimestamp()); ?>">
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
                            <div class="activity">
                                <time class="activity__time"><?= strftime('%Hh%M', $activityDate->getTimestamp()); ?></time>
                                <div class="activity__title"><?= $activity['event-title']; ?></div>
                                    <?php if($activity['event-has-place']): ?>
                                        <?php
                                            $relationPlace = $activity['event-place'];
                                            $place = get_fields($relationPlace[0]->ID);
                                        ?>
                                    <?php elseif($activity['event-address']): ?>

                                    <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endwhile; endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <a href="<?= sl_get_page_url('template-agenda.php'); ?>" title="Aller sur la page de l'agenda" class="cta-archive cta-archive--agenda"><span class="cta-archive__text">Voir l'agenda complet</span></a>
    </section>

    <section class="newsletter newsletter--home home-section" id="newsletter">
        <h2 class="newsletter__title home-title home-title--white">
            Vous voulez rester informé&nbsp;?
        </h2>
        <?= do_shortcode('[mc4wp_form id="309"]'); ?>
    </section>

    <section class="news news--home home-section">
        <h2 class="news__title home-title">
            Les dernières news
        </h2>
        <?php $posts = new WP_Query(['showposts' => 2, 'post_type' => 'news']); ?>
        <?php get_template_part('parts/news'); ?>
        <a href="<?= get_post_type_archive_link('news'); ?>" title="Aller sur la page des news" class="cta-archive cta-archive--news"><span class="cta-archive__text">Voir toutes les news</span></a>
    </section>

    <?php if(get_field('enable-instagram')): ?>
    <section class="instagram home-section">
        <h2 class="instagram__title home-title home-title--white">
            Notre fil instagram
        </h2>
        [insérer le fil instagram ici]
        <a href="" title="Aller sur notre fil instagram" class="cta-archive cta-archive--instagram"><span class="cta-archive__text">Aller sur notre fil instagram</span></a>
    </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
