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
    <div class="individual-news__wrapper">
        <a href="<?= get_post_type_archive_link('news'); ?>" class="link-back" title="Aller sur la page de news">Retourner aux news</a>
        <div class="individual-news__inner">
            <h1 class="main-title individual-news__title"><?= $fields['news-title']; ?></h1>
            <div class="individual-news__content">
                <time class="individual-news__date" datetime="<?= get_the_date('Y-m-d'); ?>"><?= get_the_date('j F Y'); ?></time>
                <?php if($image): ?>
                <div class="individual-news__img-wrapper"><!--
                    --><img src="<?= $image['url']; ?>"
                        alt="<?= sl_get_image_alt($image) ? sl_get_image_alt($image) : 'Image de la news ' . $fields['news-title']; ?>"
                        class="individual-news__img"><!--
                --></div>
                <?php endif; ?>
                <div class="individual-news__text wysiwyg">
                    <?= $fields['news-content']; ?>
                </div>

                <!--[Partage facebook &amp; Twitter]-->
            </div>
        </div>
    </div>

    <section class="individual-news__last">
        <h2 class="individual-news__subtitle">Les dernières news</h2>
        <?php
            $posts = new WP_Query([
                'showposts' => 2,
                'post_type' => 'news',
                'post__not_in' => array($currentID),
            ]);
        ?>
        <?php get_template_part('parts/news'); ?>
    </section>

    <a href="<?= get_post_type_archive_link('news'); ?>" class="link-back link-back--bottom">Retourner aux news</a>
</main>

<?php get_footer(); ?>
