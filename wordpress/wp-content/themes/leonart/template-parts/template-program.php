<?php

/*
    Template Name: Programme
*/
get_header();
 ?>

<main>
    <h1>Programme</h1>

    <section id="expositions">
        <h2>Les expositions</h2>
    </section>

    <section id="concerts">
        <h2>Concerts &amp; spectacles</h2>
    </section>

    <section id="oeuvres">
        <h2>&OElig;uvres dans l'espace urbain</h2>
    </section>

    <section id="divers">
        <h2>Évènements divers</h2>
    </section>

    <section id="artistes">
        <h2>Les artistes</h2>
    </section>

    <div class="cta--white">
        Envie de voir un planning chronologique de l'évènement&nbsp;?
        <a href="<?= sl_get_page_url('template-agenda.php'); ?>" class="button--white" title="Aller sur l'agenda">Voir l'agenda complet</a>
    </div>
</main>


<?php get_footer(); ?>
