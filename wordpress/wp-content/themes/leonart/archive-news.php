<?php
/*
    Template Name: Archive des news
*/

get_header();
 ?>

<main>
    <h1>News</h1>

    <div class="news__sorting">
        <form action="#" method="GET">
            <select class="" name="dates">
                <option value="up">Plus récentes</option>
                <option value="down">Plus anciennces</option>
            </select>
            <!-- Catégories de news ?? Création d'une autre taxonomie ? -->
        </form>
    </div>

    <div class="news__wrapper">
        <?php
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $posts = new WP_Query([
                    'posts_per_page' => 1,
                    'paged' => $paged,
                    'post_type' => 'news',
                    'orderby' => [
                        'meta_value'=>'DESC',
                    ],
                ]);
        ?>
        <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
            <?php $fields = get_fields(); ?>
            <a href="<?= the_permalink(); ?>">
                <h3 class="news__title"><?= $fields['news-title']; ?></h3>
                <time datetime=""><?= the_date('j F Y'); ?></time>
                <?php $image = $fields['news-img'];?>
                <img src="<?= $image['url']; ?>" width="<?= $image['sizes']['smallest-width']; ?>" height="<?= $image['sizes']['smallest-height']; ?>" alt="Photo de la news <?= $fields['news-title']; ?>">
                <div class="news__content"><?= $fields['news-content']; ?></div>
                <a href="<?= the_permalink(); ?>" class="news__link">En lire plus <span class="hidden">sur <?= $fields['news-title']; ?></span></a>
            </a>
        <?php endwhile; endif; ?>
        <?php if(function_exists('wp_pagenavi')): ?>
            <div class="pagination__wrapper">
                <?php wp_pagenavi(array('query' => $posts)); ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="cta--white cta--news">
        Besoin d'informations sur Saint-Léon'Art&nbsp;?
        <a href="<?= sl_get_page_url('template-infos.php'); ?>" class="button--white" title="Aller sur la page en pratique">Voir les infos pratiques</a>
    </div>
</main>


<?php get_footer(); ?>
