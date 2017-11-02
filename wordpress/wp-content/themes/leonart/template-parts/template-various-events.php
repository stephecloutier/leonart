<?php
/*
    Template Name: Page des évènements divers
*/
get_header();
?>

<main>
    <a href="<?= sl_get_page_url('template-program.php'); ?>" class="link-back" title="Aller sur la page du programme">Retourner sur le programme</a>
    <h1 class="main-title">Les évènements divers</h1>

    <div class="various-events">
        <?php $posts = new WP_Query([
            'showposts' => -1,
            'post_type' => 'activities',
            'meta_query' => array(
                array(
                    'key' => 'event-type',
                    'value' => 'various',
                    'compare' => 'LIKE'
                )
            ),
        ]); ?>
        <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
        <?php $various = get_fields(); ?>
        <div class="various-event">
            <h3 class="subtitle subtitle--various"><?= $various['event-various-title']; ?></h3>
            <ul class="various-event__datimes">
                <?php foreach($various['event-various-datetimes'] as $datetimes): ?>
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
            <?php if($various['event-has-place']): ?>
                <?php
                    $relationPlace = $various['event-place'];
                    $place = get_fields($relationPlace[0]->ID);
                ?>
            <a href="<?= get_permalink($relationPlace[0]->ID); ?>" class="key-place" title="Aller sur la page du lieu <?= $place['place-name']; ?>"><?= $place['place-name']; ?></a>
            <span class="place"><?= $place['place-address']; ?></span>
            <?php else: ?>
            <span class="place"><?= $various['event-address']; ?></span>
            <?php endif; ?>
        </div>
        <?php endwhile; endif; ?>
    </div>

    <a href="<?= sl_get_page_url('template-program.php'); ?>" class="link-back" title="Aller sur la page du programme">Retourner sur le programme</a>
</main>

<?php get_footer(); ?>
