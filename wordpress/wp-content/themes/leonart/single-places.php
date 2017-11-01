<?php
/*
    Template Name: Lieu
*/
get_header();
$fields = get_fields();
?>
<main>
    <h1 class="main-title"><?= $fields['place-name']; ?></h1>
</main>

<?php get_footer(); ?>
