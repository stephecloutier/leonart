<?php
/*
    Template Name: Lieu
*/
$fields = get_fields();
get_header();

?>
<main>
    <a href="<?= sl_get_page_url('template-useful.php'); ?>" class="link-back" title="Aller sur la page en pratique">Retourner sur la page En Pratique</a>
    <h1 class="main-title"><?= $fields['place-name']; ?></h1>
    <div class="place__address"><?= $fields['place-address']; ?></div>
    <div class="place__social">
        <?php if($fields['place-website']): ?>
            <a href="<?= $fields['place-website']; ?>" class="social-website" title="Aller sur le site web du lieu <?= $fields['place-name']; ?>">Site web du lieu <?= $fields['place-name']; ?></a>
        <?php endif; ?>
        <?php if($fields['place-facebook']): ?>
            <a href="<?= $fields['place-facebook']; ?>" class="social-facebook" title="Aller sur le facebook du lieu <?= $fields['place-name']; ?>">Facebook <span class="hidden">du lieu</span></a>
        <?php endif; ?>
    </div>

    <?php if($place['place-website']): ?>
    <a class="expo__social" href="<?= $place['place-website']; ?>" title="Aller sur le site web de <?= $place['place-name']; ?>">
        <?= $socialIcons['website']; ?>
        <span class="hidden">Site web de <?= $place['place-name']; ?></span>
    </a>
    <?php endif; ?>
    <?php if($place['place-facebook']): ?>
    <a class="expo__social" href="<?= $place['place-facebook']; ?>" title="Aller sur la page Facebook de <?= $place['place-name']; ?>">
        <?= $socialIcons['facebook']; ?>
        <span class="hidden">Facebook de <?= $place['place-name']; ?></span>
    </a>
    <?php endif; ?>
    <?php if($fields['place-gallery']): ?>
    <div class="place__images">
        <?php foreach ($fields['place-gallery'] as $image): ?>
        <img src="<?= $image['sizes']['medium']; ?>" alt="<?= sl_get_image_alt($image) ? sl_get_image_alt($image) : 'Photo du lieu ' . $fields['place-name']; ?>">
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="place__desc">
        <?php if(isset($fields['place-phone']) || isset($fields['place-mail'])): ?>
        <div class="place__contact">
            <?php if(isset($fields['place-phone'])): ?>
                <a href="tel:<?= $fields['place-phone']; ?>"><?= $fields['place-phone']; ?></a>
            <?php endif; ?>
            <?php if(isset($fields['place-mail'])): ?>
                <a href="mailto:<?= $fields['place-mail']; ?>"><?= $fields['place-mail']; ?></a>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <div class="place__description">
            <?= $fields['place-desc']; ?>
        </div>
    </div>


    <a href="<?= sl_get_page_url('template-useful.php'); ?>" class="link-back" title="Aller sur la page en pratique">Retourner sur la page En Pratique</a>

    <div class="cta">
        <div class="cta--inner">
            <span class="cta__catch-phrase">Envie de découvrir des artistes&nbsp;?</span>
            <a href="<?= get_post_type_archive_link('artists'); ?>" class="cta-archive cta-archive--white" title="Aller sur la page des artistes"><span class="cta-archive__text">Voir tous les artistes</span></a>
        </div>
    </div>
</main>

<?php get_footer(); ?>
