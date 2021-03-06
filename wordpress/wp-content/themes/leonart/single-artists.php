<?php
/*
    Template Name: Artiste
*/
$artistID = get_the_id();
$fields = get_fields();
get_header();

?>
<main>
    <a href="<?= get_post_type_archive_link('artists') ?>" class="link-back" title="Aller sur la page de tous les artistes">Retourner à tous les artistes</a>
    <h1 class="main-title"><?= $fields['artist-name']; ?></h1>
    <?php if(sl_get_taxonomies($artistID, 'artistic-disciplines')): ?>
    <div class="artist__taxonomies">
        <?= sl_get_taxonomies($artistID, 'artistic-disciplines'); ?>
    </div>
    <?php endif; ?>
    <div class="artist__social">
        <?php $socialIcons = socialIcons(); ?>
        <?php if($fields['artist-facebook']): ?>
            <a href="<?= $fields['artist-facebook']; ?>" class="artist__social-link social-facebook" title="Aller sur le facebook de l'artiste <?= $fields['artist-name']; ?>">
                <?= $socialIcons['facebook']; ?>
                <span class="hidden">Facebook</span>
            </a>
        <?php endif; ?>
        <?php if($fields['artist-linkedin']): ?>
            <a href="<?= $fields['artist-linkedin']; ?>" class="artist__social-link social-linkedin" title="Aller sur le linkedin de l'artiste <?= $fields['artist-name']; ?>">
                <?= $socialIcons['linkedin']; ?>
                <span class="hidden">LinkedIn</span>
            </a>
        <?php endif; ?>
        <?php if($fields['artist-twitter']): ?>
            <a href="<?= $fields['artist-twitter']; ?>" class="artist__social-link social-twitter" title="Aller sur le twitter de l'artiste <?= $fields['artist-name']; ?>">
                <?= $socialIcons['twitter']; ?>
                <span class="hidden">Twitter</span>
            </a>
        <?php endif; ?>
        <?php if($fields['artist-instagram']): ?>
            <a href="<?= $fields['artist-instagram']; ?>" class="artist__social-link social-instagram" title="Aller sur le instagram de l'artiste <?= $fields['artist-name']; ?>">
                <?= $socialIcons['instagram']; ?>
                <span class="hidden">Instagram</span>
            </a>
        <?php endif; ?>
        <?php if($fields['artist-pinterest']): ?>
            <a href="<?= $fields['artist-pinterest']; ?>" class="artist__social-link social-pinterest" title="Aller sur le pinterest de l'artiste <?= $fields['artist-name']; ?>">
                <?= $socialIcons['pinterest']; ?>
                <span class="hidden">Pinterest</span>
            </a>
        <?php endif; ?>
    </div>
    <section class="artist__content">
        <h2 class="hidden">À propos de <?= $fields['artist-name']; ?></h2>
        <div class="artist__line">
            <div class="artist__block artist__picture">
                <?php $artistImage = $fields['artist-img']; ?>
                <img class="artist__photo" src="<?= $artistImage['url']; ?>" alt="<?= sl_get_image_alt($artistImage) ? sl_get_image_alt($artistImage) : $fields['artist-name']; ?>">
                <div class="artist__contact">
                    <?php if($fields['artist-phone']): ?>
                    <span class="artist__phone artist__contact-line"><?= $fields['artist-phone']; ?></span>
                    <?php endif; ?>
                    <?php if($fields['artist-address']): ?>
                    <div class="artist__address artist__contact-line">
                        <?= $fields['artist-address']; ?>
                    </div>
                    <?php endif; ?>
                    <?php if($fields['artist-mail']): ?>
                    <a class="artist__mail artist__contact-line" href="<?= $fields['artist-mail'] ?>" title="Envoyer un mail à l'artiste <?= $fields['artist-name']; ?>"><?= $fields['artist-mail']; ?></a>
                    <?php endif; ?>
                    <?php if($fields['artist-website']): ?>
                    <a href="<?= $fields['artist-website']; ?>" class="artist__website artist__contact-line" title="Visiter le site web de l'artiste <?= $fields['artist-name']; ?>"><?= $fields['artist-website']; ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="artist__block artist__description">
                <?= $fields['artist-description']; ?>
            </div>
        </div>
        <?php
            $images = $fields['artist-work'];
            $activities = sl_get_relationship_posts($artistID, 'activities', 'event-expo-artists');
            $expositionsID = [];
            foreach($activities as $activity) {
                $id = $activity->ID;
                $expositionsID[] = $id;
            }
            if($images || $expositionsID):
        ?>
        <div class="artist__line artist__line--full">
            <div class="artist__inner-line">
                <?php
                    if($images):
                ?>
                <div class="artist__block artist__gallery">
                    <span class="artist__subtitle">Aperçu des &oelig;uvres de <?= $fields['artist-name']; ?></span>
                    <ul class="artist__img-list">
                        <?php foreach($images as $image): ?>
                            <?php $alt = sl_get_image_alt($image); ?>
                        <li class="artist__img-item">
                            <a
                                href="<?= $image['url']; ?>"
                                data-lightbox="gallery-artist"
                                data-title="<?= ($alt ? $alt : '&OElig;uvre de l’artiste ' . $fields['artist-name']); ?>"
                                data-alt
                                title="Voir l'image en plus grand">
                                <img
                                    class="artist__work"
                                    src="<?= $image['sizes']['smallest']; ?>"
                                    alt="<?= ($alt ? $alt : '&OElig;uvre de l’artiste ' . $fields['artist-name']); ?>">
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                <?php if($expositionsID): ?>
                <aside class="artist__block artist__places">
                    <h3 class="artist__subtitle artist__subtitle--white">Où retrouver <?= $fields['artist-name']; ?> lors de l'évènement&nbsp;?</h3>
                    <ul class="artist__places-list">
                    <?php foreach($expositionsID as $id): ?>
                        <?php $exposition = get_fields($id); ?>
                        <li class="artist__places-item">
                            <a class="artist__places-link" href="<?= get_permalink($exposition['event-expo-place'][0]->ID); ?>" title="Aller sur la page du lieu <?= $exposition['event-expo-place'][0]->post_title; ?>"><?= $exposition['event-expo-place'][0]->post_title; ?></a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </aside>
                <?php else: ?>
                <div class="artist__block--filler"></div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </section>
    <a href="<?= get_post_type_archive_link('artists'); ?>" class="link-back" title="Aller sur la page de tous les artistes">Retourner à tous les artistes</a>
</main>

<?php get_footer(); ?>
