<?php
/*
    Template Name: Page des évènements divers
*/
get_header();
?>

<main>
    <a href="<?= sl_get_page_url('template-program.php'); ?>" class="link-back" title="Aller sur la page du programme">Retourner sur le programme</a>
    <h1 class="main-title">Les évènements divers</h1>

    <div class="various">
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
        <div class="event">
            <h3 class="subtitle"><?= $various['event-title']; ?></h3>
            <?php if($various['event-datetimes']): ?>
            <ul class="various__datetimes">
                <?php while(have_rows('event-datetimes')) : the_row(); ?>
                <?php 
                    $date = new DateTime(get_sub_field('event-date')); 
                    $time = new DateTime(get_sub_field('event-time'));
                    $endTime = new DateTime(get_sub_field('event-end-time'));
                ?>
            <li>
                <time datetime="<?= strftime('%Y-%m-%d', $date->getTimestamp()) . 'T' . strftime('%Hh%M', $time->getTimestamp()); ?>">
                        <?= ucfirst(strftime("%A %e %B", $date->getTimestamp())) . ' // ' . strftime('%Hh%M', $time->getTimestamp()); ?>
                        <?php if(get_sub_field('event-end-time')): ?>
                            <span class="activity__endtime"> - <?= strftime('%Hh%M', $endTime->getTimestamp()); ?></span>
                        <?php endif; ?>
                </time>
            </li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
            <?php if($various['event-has-place']): ?>
            <?php $place = get_fields($various['event-place'][0]->ID); ?>
            <a title="Aller sur la page du lieu <?= $place['place-name']; ?>" class="program__place" href="<?= get_permalink($various['event-place'][0]->ID); ?>">
                <span class="program__place--name"><?= $place['place-name']; ?></span> - <div class="program__place--address"><?= sl_remove_all_tags($place['place-address']); ?></div>
            </a>
            <?php elseif($various['event-address']): ?>
            <span class="program__place"><?= $various['event-address']; ?></span>
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
