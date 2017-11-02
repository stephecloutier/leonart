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
            <h2 class="subtitle subtitle--various"><?= $various['event-various-title']; ?></h2>
            <?php if($various['event-has-place']): ?>
            <?php $place = get_fields($various['event-place'][0]->ID); ?>
            <a href="<?= get_permalink($various['event-place'][0]->ID); ?>">
                <span class="place"><?= $place['place-name']; ?></span> - <?= $place['place-address']; ?>
            </a>
            <?php elseif($various['event-address']): ?>
            <span class="place"><?= $various['event-address']; ?></span>
            <?php endif; ?>
            <?php if($various['event-various-datetimes']): ?>
            <ul class="various__datimes">
                <?php foreach($various['event-various-datetimes'] as $datetimes): ?>
                    <?php foreach($datetimes as $datetime): ?>
                    <?php $date = new DateTime($datetime); ?>
                <li>
                    <time datetime="<?= strftime($htmlTimestampFormat, $date->getTimestamp()); ?>"><?= strftime("%A %e %B - %kh%M", $date->getTimestamp()); ?></time>
                </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>
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

    <a href="<?= sl_get_page_url('template-program.php'); ?>" class="link-back" title="Aller sur la page du programme">Retourner sur le programme</a>
</main>

<?php get_footer(); ?>
