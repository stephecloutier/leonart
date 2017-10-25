<?php
/*
    Template Name: Artiste
*/
get_header();
$fields = get_fields();
?>
<main>
    <a href="<?= sl_get_page_url('archive-artist.php'); ?>" class="link-back" title="Aller sur la page de tous les artistes">Retourner à tous les artistes</a>
    <h1><?= $fields['artist-name']; ?></h1>
    <div class="taxonomies">
        <?= sl_get_taxonomies($post->ID, 'artistic-disciplines'); ?>
    </div>
    <div class="artist__social">
        <?php if($fields['artist-facebook']): ?>
            <a href="<?= $fields['artist-facebook']; ?>" class="artist__social social-facebook" title="Aller sur le facebook de l'artiste <?= $fields['artist-name']; ?>">Facebook</a>
        <?php endif; ?>
        <?php if($fields['artist-linkedin']): ?>
            <a href="<?= $fields['artist-linkedin']; ?>" class="artist__social social-linkedin" title="Aller sur le linkedin de l'artiste <?= $fields['artist-name']; ?>">LinkedIn</a>
        <?php endif; ?>
        <?php if($fields['artist-twitter']): ?>
            <a href="<?= $fields['artist-twitter']; ?>" class="artist__social social-twitter" title="Aller sur le twitter de l'artiste <?= $fields['artist-name']; ?>">Twitter</a>
        <?php endif; ?>
        <?php if($fields['artist-instagram']): ?>
            <a href="<?= $fields['artist-instagram']; ?>" class="artist__social social-instagram" title="Aller sur le instagram de l'artiste <?= $fields['artist-name']; ?>">Instagram</a>
        <?php endif; ?>
        <?php if($fields['artist-pinterest']): ?>
            <a href="<?= $fields['artist-pinterest']; ?>" class="artist__social social-pinterest" title="Aller sur le pinterest de l'artiste <?= $fields['artist-name']; ?>">Pinterest</a>
        <?php endif; ?>
    </div>
    <div class="artist__content">
        <div class="artist__c1">
            <?php $artistImage = $fields['artist-img']; ?>
            <img src="<?= $artistImage['url']; ?>" alt="Photo de l'artiste <?= $fields['artist-name']; ?>" width="<?= $artistImage['sizes']['medium-width']; ?>" height="<?= $artistImage['sizes']['medium-height']; ?>">
            <div class="artist__contact">
                <?php if($fields['artist-phone']): ?>
                <span class="artist__phone"><?= $fields['artist-phone']; ?></span>
                <?php endif; ?>
                <?php if($fields['artist-mail']): ?>
                <a href="<?= $fields['artist-mail'] ?>" title="Envoyer un mail à l'artiste <?= $fields['artist-name']; ?>"><?= $fields['artist-mail'] ?></a>
                <?php endif; ?>
                <?php if($fields['artist-address']): ?>
                <div class="artist__address">
                    <?= $fields['artist-address']; ?>
                </div>
                <?php endif; ?>
                <?php if($fields['artist-website']): ?>
                <span class="artist__website" title="Visiter le site web de l'artiste <?= $fields['artist-name']; ?>"><?= $fields['artist-website']; ?></span>
                <?php endif; ?>
            </div>
            <div class="artist__c2">
                <?= $fields['artist-description']; ?>
            </div>
        </div>

    </div>
</main>

<?php get_footer(); ?>
