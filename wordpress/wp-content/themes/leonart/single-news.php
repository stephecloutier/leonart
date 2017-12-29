<?php
/*
    Template Name: News individuelle
*/
$fields = get_fields();
$image = $fields['news-img'];
$currentID = $post->ID;
get_header();
 ?>

<main>
    <a href="<?= get_post_type_archive_link('news'); ?>" class="link-back" title="Aller sur la page de news">Retourner aux news</a>

    <h1 class="main-title"><?= $fields['news-title']; ?></h1>
    <div class="news__content">
        <time class="news__date" datetime="<?= get_the_date('Y-m-d'); ?>"><?= get_the_date('j F Y'); ?></time>
        <img src="<?= $image['url']; ?>"
            width="<?= $image['sizes']['large-width'] ?>"
            height="<?= $image['sizes']['large-height'] ?>"
            alt="<?= sl_get_image_alt($image) ? sl_get_image_alt($image) : 'Image de la news ' . $fields['news-title']; ?>">
        <div class="news__text">
            <?= $fields['news-content']; ?>
        </div>

        [Partage facebook &amp; Twitter]
    </div>

    <h2>Les dernières news</h2>
    <div class="news__last">
        <?php
            $posts = new WP_Query([
                'showposts' => 2,
                'post_type' => 'news',
                'post__not_in' => array($post->ID),
            ]);
        ?>
        <?php get_template_part('parts/news'); ?>
    </div>

    <a href="<?= get_post_type_archive_link('news'); ?>" class="news__back">Retourner aux news</a>
</main>

<?php get_footer(); ?>
