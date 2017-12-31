<?php
/*
    Template Name: À propos
*/
$fields = get_fields();
get_header();
?>

<main>
    <h1 class="main-title">À propos</h1>
    <div class="intro"><?= $fields['about-intro']; ?></div>

    <?php if($fields['about-show-press']): ?>
    <a href="#press" title="Défiler jusqu'à l'espace presse">Besoin de documents&nbsp;? Aller sur l'espace presse</a>
    <?php endif; ?>

    <section class="about__objectives">
        <h2 class="subtitle--underline">Les objectifs</h2>
        <ul class="about__objectives-list">
            <?php while(have_rows('about-objectives')) : the_row(); ?>
                <li class="about__objectives-item">
                    <?= get_sub_field('objective'); ?>
                </li>
            <?php endwhile; ?>
        </ul>
    </section>

    <?php if($fields['about-organizers']): ?>
    <section class="about__orga">
        <h2 class="subtitle--underline">Les organisateurs</h2>
        <ul class="about__orga-list">
            <?php while(have_rows('about-organizers')) : the_row(); ?>
                <li class="about__orga-item">
                    <img class="about__orga-name" src="<?= get_sub_field('img')['sizes']['smallest']; ?>" alt="<?= sl_get_image_alt(get_sub_field('img')) ? sl_get_image_alt(get_sub_field('img')) : 'Image de l\'organisateur ' . get_sub_field('name');  ?>">
                    <div class="about__orga-infos">
                        <span class="about__orga-name">
                            <?= get_sub_field('name'); ?>
                        </span>
                        <?php if(get_sub_field('function')): ?>
                        <span class="about__orga-function"><?= get_sub_field('function'); ?></span>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </section>
    <?php endif; ?>
    <div class="cta cta--raspberry">
        <div class="cta--inner">
            <span class="cta__catch-phrase">Des questions sur Saint-Léon'Art&nbsp;?</span>
            <a href="<?= sl_get_page_url('template-contact.php'); ?>" class="cta-archive cta-archive--white" title="Aller sur la page contact"><span class="cta-archive__text">Contactez-nous&nbsp;!</span></a>
        </div>
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

    <div class="cta cta--reverse">
        <div class="cta--inner">
            <span class="cta__catch-phrase">Découvrez nos partenaires pour l'évènement&nbsp;!</span>
            <a href="<?= sl_get_page_url('template-partners.php'); ?>" class="cta-archive cta-archive--white" title="Aller sur la page des partenaires"><span class="cta-archive__text">Voir les partenaires</span></a>
        </div>
    </div>

    <?php if($fields['about-show-press']): ?>
    <section id="press">
        <h2 class="subtitle--simple">Espace presse</h2>
        <div>
            <?php
                $posts = new WP_Query([
                    'showposts' => -1,
                    'post_type' => 'documents',
                ]);
            ?>
            <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
            <?php $doc = get_fields(); ?>
            <div>
                <h3><?= $doc['documents-name']; ?></h3>
                <div><?= $doc['documents-desc']; ?></div>
                <a href="<?= $doc['documents-file']['url']; ?>" title="Télécharger le document <?= $doc['documents-name']; ?>">Télécharger<span class="hidden"> le document <?= $doc['documents-name']; ?></span></a>
            </div>
            <?php endwhile; endif; ?>
        </div>

    </section>
    <?php endif; ?>
</main>


<?php get_footer(); ?>
