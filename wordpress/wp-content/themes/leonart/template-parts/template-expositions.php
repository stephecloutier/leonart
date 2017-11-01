<?php
/*
    Template Name: Page des expositions
*/
get_header();
$fields = get_fields();
?>

<main>
    <a href="<?= sl_get_page_url('template-program.php'); ?>" class="link-back" title="Retourner à la page du programme">Retourner au programme</a>
    <h1 class="main-title">Expositions</h1>
    <span class="expo__hours"><?= $fields['expo-time']; ?></span>

    <div class="expos">
        
    </div>

    <div class="cta cta--white">
        Besoin d'informations sur les différents lieux d'expositions&nbsp;?
        <a href="<?= sl_get_page_url('template-useful.php'); ?>" class="button--white" title="Aller sur la page En Pratique">Aller sur les infos pratiques</a>
    </div>
</main>
<?php get_footer(); ?>
