<?php
/*
    Template Name: Contact
*/
$fields = get_fields();
get_header();

?>

<main>
    <h1 class="main-title">Contact</h1>
    <div class="contact__wrapper">
        <div class="contact__inner">
            <section class="contact__aside">
                <h2 class="hidden">Informations sur l'ASBL organisatrice</h2>
                <span class="contact__name"><?= $fields['contact-organizer-name']; ?></span>
                <div class="contact__infos">
                    <span class="contact__infos--phone"><?= $fields['contact-organizer-phone']; ?></span>
                    <div class="contact__infos--address">
                        <?= $fields['contact-organizer-address']; ?>
                    </div>
                    <a href="mailto:<?= $fields['contact-organizer-mail']; ?>" class="contact__infos--mail" title="Envoyer un mail à <?= $fields['contact-organizer-name']; ?>"><?= $fields['contact-organizer-mail']; ?></a>
                </div>
            </section>

            <section class="contact__form">
                <h2 class="hidden">Formulaire de contact</h2>
                <span class="contact__form-info">Les champs munis d'un * sont obligatoires</span>
                <?= do_shortcode('[contact-form-7 id="308" title="Formulaire de contact"]'); ?>
            </section>
        </div>
    </div>

    <div class="cta cta--raspberry contact__cta">
        <div class="cta--inner">
            <span class="cta__catch-phrase">Envie de voir notre programmation&nbsp;?</span>
            <a href="<?= sl_get_page_url('template-program.php'); ?>" class="cta-archive cta-archive--white" title="Aller sur la page programme"><span class="cta-archive__text">Découvrez le programme</span></a>
        </div>
    </div>
</main>

<?php get_footer(); ?>
