        <footer class="footer">
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
                <span class="footer__title">Avec la collaboration et le soutiens de</span>
                [Insérer les partenaires ici]
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
