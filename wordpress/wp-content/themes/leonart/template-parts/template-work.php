<?php
/*
    Template Name: Page des œuvres dans l'espace urbain
*/
get_header();
?>

<main>
    <a href="<?= sl_get_page_url('template-program.php'); ?>" class="link-back" title="Aller sur la page du programme">Retourner sur le programme</a>
    <h1 class="main-title">Les &oelig;uvres <br/>dans l'espace urbain</h1>
    <div class="work work--inner">
        <?php $posts = new WP_Query([
            'showposts' => -1,
            'post_type' => 'activities',
            'meta_query' => array(
                array(
                    'key' => 'event-type',
                    'value' => 'work',
                    'compare' => 'LIKE'
                )
            ),
            'orderby' => 'rand',
        ]); ?>
        <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
        <?php $oeuvres = get_fields(); $image = $oeuvres['event-work-img']; ?>
        <a href="<?= $image['url']; ?>" title="Voir l'œuvre <?= $oeuvres['event-work-title']; ?> en plus grand" class="work__link"  data-lightbox="gallery-oeuvres" data-title="<?php echo (sl_get_image_alt($image) ? sl_get_image_alt($image) : 'Image de l\'œuvre ' . $oeuvres['event-work-title']); ?>" data-alt>
            <img class="work__img" src="<?= $image['sizes']['smallest']; ?>" alt="<?php echo (sl_get_image_alt($image) ? sl_get_image_alt($image) : 'Image de l\'œuvre ' . $oeuvres['event-work-title']); ?>">
        </a>
        <?php endwhile; endif; ?>
    </div>
    <a href="<?= sl_get_page_url('template-program.php'); ?>" class="link-back" title="Aller sur la page du programme">Retourner sur le programme</a>
</main>

<?php get_footer(); ?>
