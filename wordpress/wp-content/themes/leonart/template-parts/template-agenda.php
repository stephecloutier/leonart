<?php

/*
    Template Name: Agenda
*/
$fields = get_fields();
$activityFields = get_fields(sl_get_page_id_from_template('template-expositions.php'));

$posts = new WP_Query([
    'showposts' => -1,
    'post_type' => 'activities',
    'meta_query' => [
        [
            'key' => 'event-datetimes',
            'compare' => 'EXISTS',
        ]
    ],
]);

get_header();

?>

<main>
    <h1 class="main-title">Agenda</h1>
    <!--
    <div class="agenda__sorting">
        <span>Trier par...</span>
        <select name="date" id="">

        </select>
        <select name="type" id="">

        </select>
        <select name="lieu" id="">

        </select>
    </div>
-->
    <div class="agenda">
        <div class="agenda__inner">
            <?php if(have_rows('agenda-dates')): ?>
                <?php foreach($fields['agenda-dates'] as $dates): ?>
                    <div class="agenda__day">
                        <!-- start of one day -->
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
                            <!-- début des activités -->
                            <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
                                <?php $activity = get_fields($post->ID); ?>
                                    <?php foreach($activity['event-datetimes'] as $datetimes): ?>
                                    <?php
                                        $activityDate = new DateTime($datetimes['event-date']);
                                        $activityDay = strftime('%d', $activityDate->getTimestamp());
                                        $activityStartTime = new DateTime($datetimes['event-time']);
                                        $activityEndTime = new DateTime($datetimes['event-end-time']);

                                    ?>
                                    <?php if($activityDay == $day): ?>
                                        <div class="activity">
                                            <time class="activity__time" datetime="<?= strftime($htmlTimestampFormat, $activityStartTime->getTimestamp()); ?>">
                                                <?= strftime('%Hh%M', $activityStartTime->getTimestamp()); ?>
                                                <?php if($datetimes['event-end-time']): ?>
                                                <span class="activity__endtime"> - <?= strftime('%Hh%M', $activityEndTime->getTimestamp()); ?></span>
                                                <?php endif; ?>
                                            </time>

                                            <div class="activity__infos">
                                                <span class="activity__title">
                                                    <?= $activity['event-title']; ?>
                                                </span>
                                                <?php if($activity['event-has-place']): ?>
                                                    <?php
                                                        $relationPlace = $activity['event-place'];
                                                        $place = get_fields($relationPlace[0]->ID);
                                                    ?>
                                                    <div class="activity__address">
                                                        <a href="<?= get_permalink($relationPlace[0]->ID) ?>" title="Visiter la page du lieu <?= $place['place-name']; ?>">
                                                            <span class="activity__address-name">
                                                                <?= $place['place-name']; ?>
                                                            </span>
                                                            <?= $place['place-address']; ?>
                                                        </a><!--
                                                    --></div>
                                                <?php elseif($activity['event-address']): ?>
                                                    <div class="activity__address">
                                                        <?= $activity['event-address']; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; //if($activityDay == $day) ?>
                                <?php endforeach; //datetimes ?>
                            <?php endwhile; endif; //theloop ?>
                            <!-- fin des activités -->
                        </div>
                        <!-- end of one day -->
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="cta">
        <div class="cta--inner">
            <span class="cta__catch-phrase">Vous voulez être au courant des dernières news&nbsp;?</span>
            <a href="<?= get_post_type_archive_link('news'); ?>" class="cta-archive cta-archive--white" title="Aller sur la page de news"><span class="cta-archive__text">Aller sur les news</span></a>
        </div>
    </div>
</main>

<?php get_footer(); ?>
