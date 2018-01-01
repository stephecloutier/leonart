        <footer class="footer">
            <div class="footer__inner">
                <h1 class="hidden">Footer</h1>
                <div class="footer__line footer__line--1">
                    <div class="footer__infos footer__column">
                        <div class="footer__logo">
                            <svg class="footer__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 276 296"><path class="svg__circle" d="M256.1 147.8c0 65.4-53 118.4-118.4 118.4s-118.4-53-118.4-118.4 53-118.4 118.4-118.4 118.4 53 118.4 118.4"/><path class="svg__rectangle" d="M76 11.8h123.6v272H76z"/><path class="svg__para" d="M271 157.8L4.5-.4v138.1L271 295.9V158.4z"/></svg>
                            <span class="footer__sl">Saint <span class="footer__sl--line">Léon'Art</span></span>
                        </div>
                        <nav class="l-social-nav footer__social-nav">
                            <h2 class="hidden">Navigation des réseaux sociaux</h2>
                            <ul class="l-social-nav__list">
                                <?php $posts = new WP_Query(['showposts' => -1, 'post_type' => 'social-medias']); ?>
                                <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
                                    <?php
                                        $socialFields = get_fields();
                                        $socialIcons = socialIcons();
                                    ?>
                                    <li class="l-social-nav__item">
                                        <a class="l-social-nav__link l-social-nav__link--raspberry l-social-nav__link--<?= $socialFields['social-name']; ?>" href="<?= $socialFields['social-link']; ?>" title="Aller sur le <?= $socialFields['social-name']; ?> de Saint-Léon'Art">
                                            <?= $socialIcons[$socialFields['social-name']]; ?>
                                            <span class="hidden"><?= $socialFields['social-name']; ?></span>
                                        </a>
                                    </li>
                                <?php endwhile; endif; ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="footer__contact footer__column">
                        <a href="<?= sl_get_page_url('template-contact.php'); ?>" title="Aller sur la page contact" class="footer__title">Des questions&nbsp;? Contactez-nous&nbsp;!</a>
                        <?php $contact = get_fields(sl_get_page_id_from_template('template-contact.php')); ?>
                        <h2 class="contact__name"><?= $contact['contact-organizer-name']; ?></h2>
                        <div class="contact__infos">
                            <span class="contact__phone"><?= $contact['contact-organizer-phone']; ?></span>
                            <div class="contact__address">
                                <?= $contact['contact-organizer-address']; ?>
                            </div>
                            <a href="mailto:<?= $contact['contact-organizer-mail']; ?>" class="contact__mail" title="Envoyer un mail à <?= $contact['contact-organizer-name']; ?>"><?= $contact['contact-organizer-mail']; ?></a>
                        </div>
                    </div>
                    <div class="footer__newsletter footer__column newsletter--footer">
                        <?= do_shortcode('[mc4wp_form id="309"]'); ?>
                    </div>
                </div>
                <div class="footer__line footer__line--2">
                    <div class="footer__partenaires footer__column partenaires">
                        <a title="Aller sur la page des partenaires" href="<?= sl_get_page_url('template-partners.php'); ?>" class="footer__title">Avec la collaboration et le soutiens de</a>
                        <ul class="partenaires__list">
                            <?php $posts = new WP_Query(['showposts' => -1, 'post_type' => 'partners']); ?>
                            <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
                                <?php $fields = get_fields(); ?>
                                <li class="partenaires__item">
                                    <img src="<?= $fields['partner-img']['sizes']['partner-footer']; ?>" alt="<?= $fields['partner-name']; ?>">
                                </li>
                            <?php endwhile; endif; ?>
                        </ul>
                    </div>

                    <div class="footer__twitter footer__column">
                        <span class="footer__title">Notre fil Twitter</span>
                        <?= do_shortcode('[custom-twitter-feeds]'); ?>
                    </div>
                </div>
                <div class="footer__line footer__line--3">
                    Icônes par Dave Gandy, Bogdan Rosu, SimpleIcon, Zurb, Freepik et Smashicons sur <a class="footer__link" href="www.flaticon.com" title="Aller sur le site flaticon">flaticon.com</a>
                </div>
                <nav class="footer__nav">
                    <h2 class="hidden">Navigation principale</h2>
                    <ul class="footer__list">
                        <?php foreach(sl_get_nav_items('main') as $item): ?>
                            <li class="footer__item">
                                <a class="footer__link" href="<?= $item->url; ?>"><?= $item->label; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
                <div class="footer__credits">
                    <a href="http://stephanie.cloutier.pro" title="Visiter le portfolio de Stéphanie Cloutier">
                        <small>&copy; 2017 Stéphanie Cloutier</small>
                    </a>
                </div>
            </footer>
            </div>
        <script src="<?= get_template_directory_uri(); ?>/assets/js/filter.js"></script>
        <script src="<?= get_template_directory_uri(); ?>/assets/js/lightbox-plus-jquery.js"></script>
    </body>
</html>
