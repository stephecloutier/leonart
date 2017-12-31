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
    <a class="about__anchor anchor-link" href="#press" title="Défiler jusqu'à l'espace presse">Besoin de documents&nbsp;? Aller sur l'espace presse</a>
    <?php endif; ?>

    <section class="about__objectives">
        <div>
            <h2 class="about__subtitle">Les objectifs</h2>
            <ul class="about__objectives-list">
                <?php while(have_rows('about-objectives')) : the_row(); ?>
                    <li class="about__objectives-item">
                        <span class="about__objective"><?= get_sub_field('objective'); ?></span>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
        <div class="about__objectives-svg">
            <svg class="objectives-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 502 364"><path class="obj-tree" d="M107.2 261.5c31.5-3.7 56-30.6 56-63 0-56.3-54.4-174.2-56.7-179.2-1.2-2.6-3.9-4.3-6.8-4.3s-5.6 1.7-6.8 4.3c-2.3 5-56.7 122.8-56.7 179.2 0 32.5 24.5 59.3 56 63v73c5 0 10 0 15-.4v-72.6zm-15-95v37.9L81 193.2c-2.9-2.9-7.7-2.9-10.6 0-2.9 2.9-2.9 7.7 0 10.6l21.8 21.8v20.8c-23.2-3.6-41-23.7-41-47.9 0-41.6 33.7-123.6 48.5-157.6 14.8 33.9 48.5 116 48.5 157.6 0 24.2-17.8 44.3-41 47.9v-44.8l21.8-21.8c2.9-2.9 2.9-7.7 0-10.6-2.9-2.9-7.7-2.9-10.6 0l-11.2 11.2v-13.9c0-4.1-3.4-7.5-7.5-7.5s-7.5 3.4-7.5 7.5zM165.5 334.9h15.3l.1-.3h-15.4z"/><path class="obj-table" d="M323.7 295h-15.9-.6v-17h8.5c4.1 0 7.5-3.4 7.5-7.5s-3.4-7.5-7.5-7.5h-8.5v-9h8.5c4.1 0 7.5-3.4 7.5-7.5s-3.4-7.5-7.5-7.5h-144c-4.1 0-7.5 3.4-7.5 7.5s3.4 7.5 7.5 7.5h8.5v9h-8.5c-4.1 0-7.5 3.4-7.5 7.5s3.4 7.5 7.5 7.5h8.5v17h-.5-16c-4.1 0-7.5 3.4-7.5 7.5s3.4 7.5 7.5 7.5h6.8l-5 24.6h15.3l5-24.6h115.7l5 24.6H322l-5-24.6h6.8c4.1 0 7.5-3.4 7.5-7.5-.1-4.1-3.4-7.5-7.6-7.5zm-31.5 0h-97v-17h97v17zm0-32h-97v-9h97v9z"/><path class="obj-table" d="M475.7 335h-48.5v-.1h-15v.1h-49v-.1h-15v.1H322l-.1-.4h-15.3l.1.4H180.8v-.1h-15.3v.1h-58.2v-.9c-5 .4-10 .4-15 .4v.5H27.7c-4.1 0-7.5 3.4-7.5 7.5s3.4 7.5 7.5 7.5h448c4.1 0 7.5-3.4 7.5-7.5s-3.3-7.5-7.5-7.5zm-170.6.4h43.5-43.5z"/><path class="obj-tree" d="M427.2 269.3c18.2-3.3 32-18.6 32-36.8 0-9.2-3.7-32.2-9.7-53.3-8.6-30.2-18-44.2-29.8-44.2s-21.3 14.1-29.8 44.2c-6 21-9.7 44-9.7 53.3 0 18.2 13.8 33.5 32 36.8v65.6h15v-65.6zm-15-30.8v15.4c-9.9-2.9-17-11.4-17-21.4 0-6.7 2.9-26.7 8.5-46.9 8-29.4 14.8-34.7 16-35.5 1.3.8 8 6.2 16 35.5 5.5 20.2 8.5 40.2 8.5 46.9 0 10-7.1 18.5-17 21.4v-15.4c0-4.1-3.4-7.5-7.5-7.5s-7.5 3.4-7.5 7.5z"/><path class="obj-table" d="M363.2 148.8c9.3-3.1 16-11.9 16-22.3v-32c0-4.1-3.4-7.5-7.5-7.5h-8.5v-9h16.5c4.1 0 7.5-3.4 7.5-7.5s-3.4-7.5-7.5-7.5h-48c-4.1 0-7.5 3.4-7.5 7.5s3.4 7.5 7.5 7.5h16.5v9h-8.5c-4.1 0-7.5 3.4-7.5 7.5v32c0 10.3 6.7 19.1 16 22.3v186.1h15V148.8zm-16-22.3V102h17v24.5c0 4.7-3.8 8.5-8.5 8.5s-8.5-3.8-8.5-8.5z"/></svg>
        </div>
    </section>

    <?php if($fields['about-organizers']): ?>
    <section class="about__orga">
        <h2 class="about__subtitle">Les organisateurs</h2>
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
    <section class="about__numbers">
        <h2 class="about__subtitle">L'année <?= $fields['about-year']; ?> en chiffres</h2>
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
    <section id="press" class="about__press">
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
