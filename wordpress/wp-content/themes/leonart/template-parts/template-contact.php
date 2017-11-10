<?php
/*
    Template Name: Contact
*/
get_header();
$fields = get_fields();
?>

<main>
    <h1 class="main-title">Contact</h1>

    <section>
        <h2 class="hidden">Informations sur l'ASBL organisatrice</h2>
        <h3><?= $fields['contact-organizer-name']; ?></h3>
        <div class="contact__infos">
            <span class="contact__infos--phone"><?= $fields['contact-organizer-phone']; ?></span>
            <div class="contact__infos--address">
                <?= $fields['contact-organizer-address']; ?>
            </div>
            <a href="mailto:<?= $fields['contact-organizer-mail']; ?>" class="contact__infos--mail" title="Envoyer un mail à <?= $fields['contact-organizer-name']; ?>"><?= $fields['contact-organizer-mail']; ?></a>
        </div>
    </section>

    <section>
        <h2 class="hidden">Formulaire de contact</h2>
        <?= do_shortcode('[ninja_form id=1]'); ?>
    </section>
</main>

<?php get_footer(); ?>
