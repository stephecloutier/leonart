<?php
/*
    Template Name: Page des Partenaires
*/
$fields = get_fields();
get_header();

?>

<main>
    <h1 class="main-title">Partenaires</h1>
    <p class="intro"><?= $fields['partners-intro']; ?></p>
    <div class="partners__wrapper">
        <ul class="partners">
            <?php
                $posts = new WP_Query([
                    'showposts' => -1,
                    'post_type' => 'partners',
                    'orderby' => 'rand',
                ]);
            ?>
            <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
                <?php $partners = get_fields(); ?>
            <li class="partners__item">
                <?php if($partners['partner-url']): ?>
                <a class="partners__link" href="<?= $partners['partner-url']; ?>" title="Visiter le site web du partenaire <?= $partners['partner-name']; ?>">
                <?php else: ?>
                <div class="partners__border">
                <?php endif; ?>
                    <?php if($partners['partner-img']): ?>
                    <img class="partners__img" src="<?= $partners['partner-img']['url']; ?>" alt="<?= $partners['partner-name']; ?>">
                    <?php else: ?>
                    <span class="partners__name"><?= $partners['partner-name']; ?></span>
                    <?php endif; ?>

                <?php if(!$partners['partner-url']): ?>
                </div>
                <?php else: ?>
                </a>
                <?php endif; ?>

                <?php $socialIcons = socialIcons(); ?>
                <?php
                    if($partners['partner-facebook'] || $partners['partner-linkedin'] || $partners['partner-twitter'] || $partners['partner-instagram']):
                ?>
                <div class="partners__social-icons">
                    <?php if($partners['partner-facebook']): ?>
                        <a href="<?= $partners['partner-facebook']; ?>" class="partners__social l-social-nav__link l-social-nav__link--raspberry" title="Aller sur le facebook de <?= $partners['partner-name']; ?>">
                            <?= $socialIcons['facebook']; ?>
                            <span class="hidden">Facebook</span>
                        </a>
                    <?php endif; ?>
                    <?php if($partners['partner-linkedin']): ?>
                        <a href="<?= $partners['partner-linkedin']; ?>" class="partners__social l-social-nav__link l-social-nav__link--raspberry" title="Aller sur le linkedin de <?= $partners['partner-name']; ?>">
                            <?= $socialIcons['linkedin']; ?>
                            <span class="hidden">LinkedIn</span>
                        </a>
                    <?php endif; ?>
                    <?php if($partners['partner-twitter']): ?>
                        <a href="<?= $partners['partner-twitter']; ?>" class="partners__social l-social-nav__link l-social-nav__link--raspberry" title="Aller sur le twitter de <?= $partners['partner-name']; ?>">
                            <?= $socialIcons['twitter']; ?>
                            <span class="hidden">Twitter</span>
                        </a>
                    <?php endif; ?>
                    <?php if($partners['partner-instagram']): ?>
                        <a href="<?= $partners['partner-instagram']; ?>" class="partners__social  l-social-nav__link l-social-nav__link--raspberry" title="Aller sur le instagram de <?= $partners['partner-name']; ?>">
                            <?= $socialIcons['instagram']; ?>
                            <span class="hidden">Instagram</span>
                        </a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </li>
            <?php endwhile; endif; ?>
        </ul>
    </div>
    
    <div class="cta">
        <div class="cta--inner">
            <span class="cta__catch-phrase">Qu'est-ce que Saint-Léon'Art&nbsp;?</span>
            <a href="<?= sl_get_page_url('template-about.php'); ?>" class="cta-archive cta-archive--white" title="Aller sur la page À propos"><span class="cta-archive__text">Découvrez l'évènement</span></a>
        </div>
    </div>
</main>

<?php get_footer(); ?>
