<?php
/*
    Template Name: Page des œuvres dans l'espace urbain
*/
get_header();
?>

<main>
    <a href="<?= sl_get_page_url('template-program.php'); ?>" class="link-back" title="Aller sur la page du programme">Retourner sur le programme</a>
    <h1 class="main-title">Les &oelig;uvres dans l'espace urbain</h1>
    <div class="work">
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
        <?php $shows = get_fields(); $image = $shows['event-work-img']; ?>
        <a href="" title="Voir l'image de l'œuvre <?= $shows['event-work-title']; ?> en plus grand">
            <img src="<?= $image['sizes']['smallest']; ?>" alt="<?php echo (sl_get_image_alt($image) ? sl_get_image_alt : 'Image de l\'œuvre ' . $shows['event-work-title']); ?>">
        </a>
        <?php endwhile; endif; ?>
    </div>
    <a href="<?= sl_get_page_url('template-program.php'); ?>" class="link-back" title="Aller sur la page du programme">Retourner sur le programme</a>
</main>

<?php get_footer(); ?>
