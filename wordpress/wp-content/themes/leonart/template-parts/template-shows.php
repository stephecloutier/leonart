<?php
/*
    Template Name: Page des concerts & spectacles
*/
get_header();
?>

<main>
    <a class="link-back" href="<?= sl_get_page_url('template-program.php'); ?>" title="Aller sur la page du programme">Retourner sur le programme</a>

    <h1 class="main-title">Les concerts &amp; spectacles</h1>

    <div class="shows">
        <?php $posts = new WP_Query([
            'showposts' => -1,
            'post_type' => 'activities',
            'meta_query' => array(
                array(
                    'key' => 'event-type',
                    'value' => 'show',
                    'compare' => 'LIKE'
                )
            ),
        ]); ?>
        <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
        <?php $shows = get_fields(); ?>
        <div class="show">
            <h3 class="subtitle subtitle--show"><?= $shows['event-show-title']; ?></h3>
            <ul class="show__datimes">
                <?php foreach($shows['event-datetimes'] as $datetimes): ?>
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
    <a class="link-back" href="<?= sl_get_page_url('template-program.php'); ?>" title="Aller sur la page du programme">Retourner sur le programme</a>
</main>

<?php get_footer(); ?>
