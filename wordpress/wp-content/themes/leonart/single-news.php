<?php
/*
    Template Name: News individuelle
*/
get_header();
$fields = get_fields();
$image = $fields['news-img'];
$currentID = $post->ID;
 ?>

<main>
    <a href="<?= sl_get_page_url('archive-news.php'); ?>" class="news__back">Retourner aux news</a>

    <h1><?= $fields['news-title']; ?></h1>
    <div class="news__content">
        <time class="news__date" datetime="<?= get_the_date('Y-m-d'); ?>"><?= get_the_date('j F Y'); ?></time>
        <img src="<?= $image['url']; ?>" width="<?= $image['sizes']['large-width'] ?>" height="<?= $image['sizes']['large-height'] ?>" alt="<?php if(sl_get_image_alt('news-img')) echo sl_get_image_alt('news-img'); else echo 'Image de la news ' . $fields['news-title']; ?>">
        <div class="news__text">
            <?= $fields['news-content']; ?>
        </div>

        [Partage facebook &amp; Twitter]
    </div>

    <h2>Les dernières news</h2>
    <div class="news__last">
        <?php $posts = new WP_Query(['showposts' => 2, 'post_type' => 'news']); ?>
        <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
        <?php $fields = get_fields(); ?>
        <div class="news__other  <?php if(get_the_ID() == $currentID) echo 'news__current'; ?>">
            <a href="<?= the_permalink(); ?>" class="news__thumb">
                <h3 class="home-news__title"><?= $fields['news-title']; ?></h3>
                <time datetime=""><?= the_date('j F Y'); ?></time>
                <?php $image = $fields['news-img'];?>
                <img src="<?= $image['url']; ?>" width="<?= $image['sizes']['smallest-width']; ?>" height="<?= $image['sizes']['smallest-height']; ?>" alt="Photo de la news <?= $fields['news-title']; ?>">
                <div class="news__content"><?= $fields['news-content']; ?></div>
                <a href="<?= the_permalink(); ?>" class="home-news__link">En lire plus <span class="hidden">sur <?= $fields['news-title']; ?></span></a>
            </a>
        </div>
    <?php endwhile; endif; ?>
    </div>

    <a href="<?= sl_get_page_url('archive-news.php'); ?>" class="news__back">Retourner aux news</a>
</main>

<?php get_footer(); ?>
