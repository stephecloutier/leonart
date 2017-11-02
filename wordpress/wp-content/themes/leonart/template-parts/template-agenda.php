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
            <?php foreach ($dates as $dateOutput): ?>
                <div class="agenda__day">
                    <div class="agenda__date">
                        <?php $date = new DateTime($dateOutput); ?>
                        <time datetime="<?= strftime($htmlTimestampFormat, $date->getTimestamp()); ?>">
                            <span class="agenda__date--day"><?= strftime('%A', $date->getTimestamp()); ?></span>
                            <span class="agenda__date--numbers"><?= strftime('%d/%m', $date->getTimestamp()); ?></span>
                        </time>
                    </div>
                    <div class="agenda__activities">
                        <?php $posts = new WP_Query([
                            'showposts' => -1,
                            'post_type' => 'activities',
                        ]); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
</main>

<?php get_footer(); ?>
