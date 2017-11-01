<?php
/*
    Template Name: Page des expositions
*/
get_header();
$fields = get_fields();
// $expositions = get_posts(array(
//             'post_type' => 'activities',
//             'meta_query' => array(
//                 array(
//                     'key' => 'event-type',
//                     'value' => 'expo',
//                     'compare' => 'LIKE'
//                 )
//             )
//         ));
// $relationPlace = $expositions['event-expo-place'];
// $place = get_fields($relationPlace[0]->ID);
// $relationArtist = get_field('event-expo-artists');
// $artistsID = sl_get_ids($relationArtist);
?>

<main>
    <a href="<?= sl_get_page_url('template-program.php'); ?>" class="link-back" title="Retourner à la page du programme">Retourner au programme</a>
    <h1 class="main-title">Expositions</h1>
    <span class="expo__hours"><?= $fields['expo-time']; ?></span>

    <div class="expos">
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
        <div class="expo">
            <a href="<?= the_permalink(); ?>" title="Aller sur la page du lieu <?= $place['place-name']; ?>">
                <span class="program__subtitle"><?= $place['place-name']; ?></span>
            </a>
            <p class="place__address"><?= $place['place-address']; ?></p>
            <?php if($place['place-website']): ?>
            <a href="<?= $place['place-website']; ?>" title="Aller sur le site web de <?= $place['place-name']; ?>">Website</a>
            <?php endif; ?>
            <?php if($place['place-facebook']): ?>
            <a href="<?= $place['place-facebook']; ?>" title="Aller sur la page Facebook de <?= $place['place-name']; ?>">Facebook</a>
            <?php endif; ?>
            <?php if($fields['event-expo-type']): ?>
            <span class="expo__type"><?= $fields['event-expo-type']; ?></span>
            <?php endif; ?>
            <?php if(have_rows('event-expo-list')): ?>
            <ul>
                <?php foreach($expositions['event-expo-list'] as $items): ?>
                    <?php foreach($items as $item): ?>
                <li>
                    <?php echo $item; ?>
                </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <?php if($artistsID): ?>
            <h3>Artistes présents</h3>
            <ul>
            <?php foreach($artistsID as $id): ?>
                <?php $artist = get_fields($id); ?>
                <li>
                    <a href="<?= get_permalink($id); ?>" title="Aller sur la page de l'artiste <?= $artist['artist-name']; ?>">
                        <?= $artist['artist-name']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
        <?php endwhile; endif; ?>
    </div>

    <div class="cta cta--white">
        Besoin d'informations sur les différents lieux d'expositions&nbsp;?
        <a href="<?= sl_get_page_url('template-useful.php'); ?>" class="button--white" title="Aller sur la page En Pratique">Aller sur les infos pratiques</a>
    </div>
</main>
<?php get_footer(); ?>
