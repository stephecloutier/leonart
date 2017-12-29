<?php
/*
    Template Name: Archive des news
*/

get_header();
 ?>

<main>
    <h1 class="main-title">News</h1>

    <div class="news__wrapper">
        <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'paged' => $paged,
                'posts_per_page' => 6,
                'post_type' => 'news',
                'order' => 'DESC'
            );
            $posts = new WP_Query($args);
         ?>
        <?php get_template_part('parts/switcher_session'); ?>
        <?php get_template_part('parts/news'); ?>
    </div>
    <?php if(function_exists('wp_pagenavi')): ?>
    <div class="pagination__wrapper">
        <?php wp_pagenavi(array('query' => $posts)); ?>
    </div>
    <?php endif; ?>

    <div class="cta">
        <div class="cta--inner">
            <span class="cta__catch-phrase">Besoin d'informations sur Saint-Léon'Art&nbsp;?</span>
            <a href="<?= sl_get_page_url('template-infos.php'); ?>" class="cta-archive cta-archive--white" title="Aller sur la page en pratique"><span class="cta-archive__text">Voir les infos pratiques</span></a>
        </div>
    </div>
</main>


<?php get_footer(); ?>
