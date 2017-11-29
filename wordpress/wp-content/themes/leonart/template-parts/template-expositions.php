<?php
/*
    Template Name: Page des expositions
*/
$fields = get_fields();
get_header();

?>

<main>
    <a href="<?= sl_get_page_url('template-program.php'); ?>" class="link-back" title="Retourner à la page du programme">Retourner au programme</a>
    <h1 class="main-title">Expositions</h1>
    <div class="expos__hours"><?= $fields['expo-time']; ?></div>

    <div class="expos expos--inner">
        <?php $posts = new WP_Query([
            'showposts' => -1,
            'post_type' => 'activities',
            'meta_query' => array(
                array(
                    'key' => 'event-type',
                    'value' => 'expo',
                    'compare' => 'LIKE'
                )
            ),
        ]); ?>
        <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
        <?php
            $expositions = get_fields();
            $relationPlace = get_field('event-expo-place');
            $place = get_fields($relationPlace[0]->ID);
            $relationArtist = get_field('event-expo-artists');
            $artistsID = sl_get_ids($relationArtist);
        ?>
        <div class="program__expo">
            <a href="<?= get_permalink($relationPlace[0]->ID); ?>" title="Aller sur la page du lieu <?= $place['place-name']; ?>">
                <h3 class="program__subtitle"><?= $place['place-name']; ?></h3>
            </a>
            <div class="program__place">
                <?= $place['place-address']; ?>
            </div>

            <?php if($fields['event-expo-type']): ?>
            <span class="expo__type">(<?= $fields['event-expo-type']; ?>)</span>
            <?php endif; ?>
            <?php if(have_rows('event-expo-list')): ?>
            <ul class="expo__list expo__list--expo">
                <?php while(have_rows('event-expo-list')) : the_row(); ?>
                <li class="expo__item">
                    <span class="expo__item--content">
                        <?= get_sub_field('event-expo-item'); ?>
                    </span>
                </li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
            <?php if($artistsID): ?>
            <h4 class="expo__artists-title">Artistes présents</h4>
            <ul class="expo__list expo__list--artist">
            <?php foreach($artistsID as $id): ?>
                <?php $artist = get_fields($id); ?>
                <li class="expo__item">
                    <a class="expo__artist" href="<?= get_permalink($id); ?>" title="Aller sur la page de l'artiste <?= $artist['artist-name']; ?>">
                        <span class="expo__item--content">
                            <?= $artist['artist-name']; ?>
                        </span>
                    </a>
                </li>
            <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
        <?php endwhile; endif; ?>
    </div>

    <div class="cta">
        <div class="cta--inner">
            <span class="cta__catch-phrase">Besoin d'informations sur les différents lieux d'expositions&nbsp;?</span>
            <a href="<?= sl_get_page_url('template-useful.php'); ?>" class="cta-archive cta-archive--white" title="Aller sur la page En Pratique"><span class="cta-archive__text">Aller sur les infos pratiques</span></a>
        </div>
    </div>
</main>
<?php get_footer(); ?>
