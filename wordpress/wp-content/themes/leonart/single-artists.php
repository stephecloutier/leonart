<?php
/*
    Template Name: Artiste
*/
get_header();
$fields = get_fields();
?>
<main>
    <a href="<?= sl_get_page_url('archive-artist.php'); ?>" class="link-back" title="Aller sur la page de tous les artistes">Retourner à tous les artistes</a>
    <h1><?= $fields['artist-name']; ?></h1>
    <?php
        echo sl_get_taxonomies($post->ID, 'artistic-disciplines');
     ?>

</main>

<?php get_footer(); ?>
