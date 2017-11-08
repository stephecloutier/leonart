<?php
/*
    Template Name: À propos
*/
get_header();
$fields = get_fields();
?>

<main>
    <h1 class="main-title">À propos</h1>
    <div class="intro"><?= $fields['about-intro']; ?></div>

    <?php if($fields['about-show-press']): ?>
    <a href="#press" title="Défiler jusqu'à l'espace presse">Besoin de documents&nbsp;? Aller sur l'espace presse</a>
    <?php endif; ?>

    <section>
        <h2 class="subtitle--underline">Les objectifs</h2>
        <ul>
            <?php while(have_rows('about-objectives')) : the_row(); ?>
                <li>
                    <?= get_sub_field('objective'); ?>
                </li>
            <?php endwhile; ?>
        </ul>
    </section>

    <?php if($fields['about-organizers']): ?>
    <section>
        <h2 class="subtitle--underline">Les organisateurs</h2>
        <ul>
            <?php while(have_rows('about-organizers')) : the_row(); ?>
                <li>
                    <?= get_sub_field('name'); ?>
                    <?php if(get_sub_field('function')): ?>
                    <span class="organizer-function"><?= get_sub_field('function'); ?></span>
                    <?php endif; ?>
                    <img src="<?= get_sub_field('img')['sizes']['smallest']; ?>" alt="<?= sl_get_image_alt(get_sub_field('img')) ? sl_get_image_alt(get_sub_field('img')) : 'Image de l\'organisateur ' . get_sub_field('name');  ?>">
                </li>
            <?php endwhile; ?>
        </ul>
    </section>
    <?php endif; ?>
    <div class="cta cta--white">
        Des questions sur Saint-Léon'Art&nbsp;?
        <a href="<?= sl_get_page_url('template-contact.php'); ?>" class="button--white" title="Aller sur la page contact">Contactez-nous&nbsp;!</a>
    </div>

    <?php if($fields['about-numbers']): ?>
    <section>
        <h2 class="subtitle--underline">L'année <?= $fields['about-year']; ?> en chiffres</h2>
        <ul class="numbers">
            <li>
                [image de l'icône]
                <span class="number"><?= $fields['about-artists-nb']; ?></span>
                artistes
            </li>
            <li>
                [image de l'icône]
                <span class="number"><?= $fields['about-visitors-nb']; ?></span>
                visiteurs
            </li>
            <li>
                [image de l'icône]
                <span class="number"><?= $fields['about-expos-nb']; ?></span>
                expositions
            </li>
        </ul>
    </section>
    <?php endif; ?>

    <div class="cta cta--white">
        Découvrez nos partenaires pour l'évènement&nbsp;!
        <a href="<?= sl_get_page_url('template-partners.php'); ?>" class="button--white" title="Aller sur la page des partenaires">Voir les partenaires</a>
    </div>

    <?php if($fields['about-show-press']): ?>
    <section id="press">
        <h2 class="subtitle--simple">Espace presse</h2>
        [post-type pour doc. de l'espace presse]
    </section>
    <?php endif; ?>
</main>


<?php get_footer(); ?>
