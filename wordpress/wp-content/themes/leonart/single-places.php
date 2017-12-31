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
    <div class="place__inner">
        <div class="place__social l-social-nav">
            <?php $socialIcons = socialIcons(); ?>
            <?php if($fields['place-website']): ?>
                <a href="<?= $fields['place-website']; ?>" class="social-website l-social-nav__link l-social-nav__link--raspberry" title="Aller sur le site web du lieu <?= $fields['place-name']; ?>">
                    <?= $socialIcons['website']; ?>
                    <span class="hidden">Site web du lieu <?= $fields['place-name']; ?></span>
                </a>
            <?php endif; ?>
            <?php if($fields['place-facebook']): ?>
                <a href="<?= $fields['place-facebook']; ?>" class="social-facebook l-social-nav__link l-social-nav__link--raspberry" title="Aller sur le Facebook du lieu <?= $fields['place-name']; ?>">
                    <?= $socialIcons['facebook']; ?>
                    <span class="hidden">Facebook du lieu <?= $fields['place-name']; ?></span>
                </a>
            <?php endif; ?>
        </div>

        <div class="place__text">
            <div class="place__infos">

                <?php if($fields['place-time']): ?>
                <div class="place__time">
                    <?= $fields['place-time']; ?>
                </div>
                <?php endif; ?>
                <?php if($fields['place-phone'] || $fields['place-mail']): ?>
                <div class="place__contact">
                    <?php if($fields['place-phone']): ?>
                        <a class="place__phone" href="tel:<?= $fields['place-phone']; ?>"><?= $fields['place-phone']; ?></a>
                    <?php endif; ?>
                    <?php if($fields['place-mail']): ?>
                        <a class="place__mail" href="mailto:<?= $fields['place-mail']; ?>"><?= $fields['place-mail']; ?></a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php if($fields['place-map']): ?>
                <a
                    href="https://www.google.com/maps/search/?api=1&query=<?= $fields['place-map']['address']; ?>"
                    title="Aller sur Google Maps"
                    class="place__map-link">
                    <img
                        src="https://maps.googleapis.com/maps/api/staticmap?&center=<?= $fields['place-map']['lat'] . ',' . $fields['place-map']['lng']; ?>&zoom=15&size=350x200&maptype=roadmap&language=fr&markers=color=red|<?= $fields['place-map']['lat'] . ',' . $fields['place-map']['lng']; ?>&key=AIzaSyCZURCUTjeBBlDuFfr7_O7a_cg31pHEL58"
                        alt=""
                        class="place__map-img"
                        width="350"
                        height="200">
                </a>
                <?php endif; ?>
                <?php if(isset($fields['place-address'])): ?>
                <div class="place__address">
                    <?= $fields['place-address']; ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="place__description wysiwyg">
                <?= $fields['place-desc']; ?>
            </div>
        </div>

        <?php if($fields['place-gallery']): ?>
        <div class="place__images">
            <?php foreach ($fields['place-gallery'] as $image): ?>
            <img class="place__image" src="<?= $image['sizes']['large']; ?>" alt="<?= sl_get_image_alt($image) ? sl_get_image_alt($image) : 'Photo du lieu ' . $fields['place-name']; ?>">
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>

    <a href="<?= sl_get_page_url('template-useful.php'); ?>" class="link-back link-back--bottom" title="Aller sur la page en pratique">Retourner sur la page En Pratique</a>

    <div class="cta">
        <div class="cta--inner">
            <span class="cta__catch-phrase">Envie de découvrir des artistes&nbsp;?</span>
            <a href="<?= get_post_type_archive_link('artists'); ?>" class="cta-archive cta-archive--white" title="Aller sur la page des artistes"><span class="cta-archive__text">Voir tous les artistes</span></a>
        </div>
    </div>
</main>

<?php get_footer(); ?>
