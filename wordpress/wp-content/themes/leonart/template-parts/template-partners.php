<?php
/*
    Template Name: Page des Partenaires
*/
get_header();
$fields = get_fields();
?>

<main>
    <h1 class="main-title">Partenaires</h1>
    <p class="intro"><?= $fields['partners-intro']; ?></p>
    <ul>
        <?php
            $posts = new WP_Query([
                'showposts' => -1,
                'post_type' => 'partners',
                'orderby' => 'rand',
            ]);
        ?>
        <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
            <?php $partners = get_fields(); ?>
        <li>
            <?php if($partners['partner-url']): ?>
            <a href="<?= $partners['partner-url']; ?>">
            <?php endif; ?>

            <?php if($partners['partner-img']): ?>
            <img src="<?= $partners['partner-img']['url']; ?>" alt="<?= $partners['partner-name']; ?>">
            <?php else: ?>
            <span class="no-logo"><?= $partners['partner-name']; ?></span>
            <?php endif; ?>

            <?php if($partners['partner-url']): ?>
            </a>
            <?php endif; ?>

            <?php if($partners['partner-facebook']): ?>
                <a href="<?= $partners['partner-facebook']; ?>" class="partner__social social-facebook" title="Aller sur le facebook de <?= $partners['partner-name']; ?>">Facebook</a>
            <?php endif; ?>
            <?php if($partners['partner-linkedin']): ?>
                <a href="<?= $partners['partner-linkedin']; ?>" class="partner__social social-linkedin" title="Aller sur le linkedin de <?= $partners['partner-name']; ?>">LinkedIn</a>
            <?php endif; ?>
            <?php if($partners['partner-twitter']): ?>
                <a href="<?= $partners['partner-twitter']; ?>" class="partner__social social-twitter" title="Aller sur le twitter de <?= $partners['partner-name']; ?>">Twitter</a>
            <?php endif; ?>
            <?php if($partners['partner-instagram']): ?>
                <a href="<?= $partners['partner-instagram']; ?>" class="partner__social social-instagram" title="Aller sur le instagram de <?= $partners['partner-name']; ?>">Instagram</a>
            <?php endif; ?>
        </li>
        <?php endwhile; endif; ?>
    </ul>


    <div class="cta cta--white">
        Qu'est-ce que Saint-Léon'Art&nbsp;?
        <a href="<?= sl_get_page_url('template-about.php'); ?>" class="button--white" title="Aller sur la page À propos">Découvrez l'évènement</a>
    </div>
</main>

<?php get_footer(); ?>
