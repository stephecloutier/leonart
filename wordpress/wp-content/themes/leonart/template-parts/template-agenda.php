<?php

/*
    Template Name: Agenda
*/
get_header();
$fields = get_fields();
$activityFields = get_fields(sl_get_page_id_from_template('template-expositions.php'));

?>

<main>
    <h1 class="main-title">Agenda</h1>
    <div class="agenda__sorting">
        <span>Trier par...</span>
        <select name="date" id="">

        </select>
        <select name="type" id="">

        </select>
        <select name="lieu" id="">

        </select>
    </div>
    <div class="agenda">
        <span class="sorting-name">[toutes les activités]</span>
        <?php foreach($fields['agenda-dates'] as $dates): ?>
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
                <?php
                    $posts = new WP_Query([
                    'showposts' => -1,
                    'post_type' => 'activities',
                    'meta_query' => array(
                        array(
                            'key' => 'event-datetimes',
                            'compare' => 'EXISTS',
                        )
                    ),
                    ]);
                ?>
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
    </div>
</main>

<?php get_footer(); ?>
