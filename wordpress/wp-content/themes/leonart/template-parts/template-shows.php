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
            <h3 class="program__subtitle program__subtitle--show"><?= $shows['event-title']; ?></h3>
            <ul class="show__datetimes">
                <?php while(have_rows('event-datetimes')) : the_row(); ?>
                    <?php $date = new DateTime(get_sub_field('event-datetime')); ?>
                    <li>
                        <time datetime="<?= strftime($htmlTimestampFormat, $date->getTimestamp()); ?>"><?= ucfirst(strftime("%A %e %B - %kh%M", $date->getTimestamp())); ?></time>
                    </li>
                <?php endwhile; ?>
            </ul>
            <?php if($shows['event-has-place']): ?>
                <?php
                    $relationPlace = $shows['event-place'];
                    $place = get_fields($relationPlace[0]->ID);
                ?>
            <a title="Aller sur la page du lieu <?= $place['place-name']; ?>" class="program__place" href="<?= get_permalink($various['event-place'][0]->ID); ?>">
                <span class="program__place--name"><?= $place['place-name']; ?></span> - <div class="program__place--address"><?= sl_remove_all_tags($place['place-address']); ?></div>
            </a>
            <?php else: ?>
            <span class="program__place--alone"><?= $shows['event-address']; ?></span>
            <?php endif; ?>
        </div>
        <?php endwhile; endif; ?>
    </div>
    <a class="link-back" href="<?= sl_get_page_url('template-program.php'); ?>" title="Aller sur la page du programme">Retourner sur le programme</a>
</main>

<?php get_footer(); ?>
