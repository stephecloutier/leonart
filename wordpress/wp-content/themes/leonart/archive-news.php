<?php
/*
    Template Name: Archive des news
*/

get_header();
 ?>

<main>
    <h1>News</h1>

    <div class="news__sorting">
        <span class="news__sorting-title"> Trier par &hellip;</span>
        <form action="#" method="GET">
            <select class="" name="dates">
                <option value="DESC">Plus récentes</option>
                <option value="ASC">Plus anciennces</option>
            </select>
            <select class="" name="categories">
                <option value="">Catégories</option>
            </select>
            <!-- Catégories de news ?? Création d'une autre taxonomie ? -->
        </form>
    </div>

    <div class="news__wrapper">
        <?php
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $posts = new WP_Query([
                    'posts_per_page' => 2,
                    'paged' => $paged,
                    'post_type' => 'news',
                    'orderby' => [
                        'meta_value'=>'DESC',
                    ],
                ]);
        ?>
        <?php get_template_part('parts/news'); ?>
        <?php if(function_exists('wp_pagenavi')): ?>
            <div class="pagination__wrapper">
                <?php wp_pagenavi(array('query' => $posts)); ?>
            </div>
        <?php endif; ?>
    </div>


    <div class="cta">
        <div class="cta--inner">
            <span class="cta__catch-phrase">Besoin d'informations sur Saint-Léon'Art&nbsp;?</span>
            <a href="<?= sl_get_page_url('template-infos.php'); ?>" class="cta-archive cta-archive--white" title="Aller sur la page en pratique"><span class="cta-archive__text">Voir les infos pratiques</span></a>
        </div>
    </div>
</main>


<?php get_footer(); ?>
