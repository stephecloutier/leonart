        <footer class="footer">
            <h1 class="hidden">Footer</h1>
            <div class="footer__l1">
                <div class="footer__infos footer__column">
                    <img src="" alt="Logo géométrique Saint-Léon'Art">
                    <span>Saint-Léon'Art</span>
                    <ul>
                        <?php foreach (sl_get_nav_items('social_media') as $item): ?>
                            <li>
                                <a href="<?= $item->url; ?>"><?= $item->label; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="footer__contact footer__column">
                    <span class="footer__title">Des questions&nbsp;? Contactez-nous&nbsp;!</span>
                    [insérer le numéro de téléphone]
                    [insérer l'adresse mail]
                </div>
                <div class="footer__newsletter footer__column">
                    <span class="footer__title">Inscrivez-vous à notre <em class="english-word">newsletter</em>&nbsp;!</span>
                </div>
            </div>
            <div class="footer__l2">
                <div class="footer__partenaires">
                    <span class="footer__title">Avec la collaboration et le soutiens de</span>
                    <ul>
                        <?php $posts = new WP_Query(['showposts' => -1, 'post_type' => 'partners']); ?>
                        <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
                            <?php $fields = get_fields(); ?>
                            <li>
                                <img src="<?= $fields['partner-img']['sizes']['partner-footer']; ?>" alt="<?= $fields['partner-name']; ?>">
                            </li>
                        <?php endwhile; endif; ?>
                    </ul>

                </div>

                <div class="footer__twitter">
                    <?= do_shortcode('[custom-twitter-feeds]'); ?>
                </div>
            </div>
            <div class="footer__l3">
                Icônes par Dave Gandy, Bogdan Rosu, SimpleIcon, Zurb,  Freepik et Smashicons sur <a href="www.flaticon.com" title="Aller sur le site flaticon">flaticon.com</a>
            </div>
            <nav class="footer__nav">
                <h2 class="hidden">Navigation principale</h2>
                <ul>
                    <?php foreach(sl_get_nav_items('main') as $item): ?>
                        <li class="footer__list-item">
                            <a class="footer__list-link" href="<?= $item->url; ?>"><?= $item->label; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <div class="footer__credits">
                &copy; 2017 Stéphanie Cloutier
            </div>
        </footer>
    </body>
</html>
