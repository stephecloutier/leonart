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
        <?php $postnb = 0; ?>
        <?php $posttotal = wp_count_posts('news')->publish; ?>
        <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
            <?php $fields = get_fields(); ?>
            <a href="<?= the_permalink(); ?>">
                <h3 class="news__title"><?= $fields['news-title']; ?></h3>
                <time datetime=""><?= the_date('j F Y'); ?></time>
                <?php $image = $fields['news-img'];?>
                <img src="<?= $image['url']; ?>" width="<?= $image['sizes']['smallest-width']; ?>" height="<?= $image['sizes']['smallest-height']; ?>" alt="<?php if(sl_get_image_alt('news-img')) echo sl_get_image_alt('news-img'); else echo 'Image de la news ' . $fields['news-title']; ?>">
                <div class="news__content"><?= $fields['news-content']; ?></div>
                <a href="<?= the_permalink(); ?>" class="news__link">En lire plus <span class="hidden">sur <?= $fields['news-title']; ?></span></a>
            </a>
            <?php $postnb++; ?>
            <?php if($postnb == 2 || ($posttotal < 2 && ($wp_query->current_post +1) == ($wp_query->post_count))): ?>
            <div class="cta--white cta--news">
                Vous cherchiez plutôt le planning de l'évènement&nbsp;?
                <a href="<?= sl_get_page_url('template-agenda.php'); ?>" class="button--white" title="Aller sur l'agenda">Voir l'agenda</a>
            </div>
            <?php endif; ?>
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
