<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Stéphanie Cloutier">
        <meta name="description" content="Site web du parcours artistique Saint-Léon'Art, à Liège, en Belgique">
        <?php setlocale(LC_ALL, 'fr_BE.utf8'); ?>
        <title><?php wp_title(''); ?></title>

        <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/main.css">
    </head>

    <body>
        <svg class="svgDefs">
            <defs>
                <filter id="svg-colored-dropshadow" height="130%" class="svg__shadow">
                    <feOffset dx="0" dy="2" result="offOut" />
                    <feGaussianBlur stdDeviation="4" in="offOut" result="blurOut" />
                    <feComponentTransfer>
                        <feFuncA type="linear" slope="0.5" />
                    </feComponentTransfer>
                    <feMerge>
                        <feMergeNode />
                        <feMergeNode in="SourceGraphic" />
                    </feMerge>
                </filter>
                <filter id="svg-black-dropshadow" height="130%" class="svg__shadow">
                    <feOffset dx="0" dy="2" in="SourceAlpha" result="offOut" />
                    <feGaussianBlur stdDeviation="4" in="offOut" result="blurOut" />
                    <feComponentTransfer>
                        <feFuncA type="linear" slope="0.5" />
                    </feComponentTransfer>
                    <feMerge>
                        <feMergeNode />
                        <feMergeNode in="SourceGraphic" />
                    </feMerge>
                </filter>
            </defs>
        </svg>
    <header class="header">
        <h1 class="header__main-title">
            <a href="<?= get_home_url(); ?>" title="Aller à l'accueil" class="c-logo">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 108 86" class="c-logo__svg" preserveAspectRatio="xMidYMid meet">
                    <path d="M22 16.1c1.8 1.5 2.7 3.2 2.7 5.2 0 2.5-1.3 4.5-3.8 6.1-2.2 1.3-4.6 2-7.3 2-1.9 0-3.7-.3-5.4-1-1.9-.8-3.4-1.8-4.4-3.2-.2-.3-.2-.5-.1-.8.1-.1.3-.3.5-.4l6-2.8c.3-.2.8-.1 1.5.2.8.3 1.4.5 1.8.5.5 0 1.1-.1 1.6-.3.7-.3 1-.6 1-1.1 0-.9-.8-1.4-2.5-1.3-1.1 0-2.1-.1-3.1-.3-2-.4-3.8-1.3-5.4-2.7-1.8-1.6-2.7-3.4-2.7-5.4 0-2.6 1.3-4.7 3.8-6.2 2.2-1.4 4.6-2.1 7.3-2.1 2.1 0 4.1.4 6 1.3 2.1 1 3.6 2.4 4.4 4.1.1.2.1.4.1.5 0 .4-.3.6-.8.8L17 11.4c-.5.2-.8.2-.9.1-.1-.1-.3-.2-.5-.4-.5-.3-1.1-.5-2-.5-.5 0-1.1.1-1.6.3-.7.3-1 .6-1 1.1 0 .5.3.8 1 1.1.5.2 1 .3 1.6.3 1.3 0 2.8.3 4.4.8 1.7.5 3 1.2 4 1.9z"/>
                    <path d="M38.6 3.6l12.5 24.8c.1.2.1.3.1.4 0 .4-.4.6-1.2.6h-5.4c-.6 0-1 0-1.2-.1-.2-.1-.4-.4-.7-.9-.4-.7-1-1.1-1.9-1.1H32c-.8 0-1.4.3-1.7 1-.2.5-.5.8-.6.9-.2.1-.6.1-1.2.1h-5.6c-.8 0-1.3-.2-1.3-.6 0-.1 0-.3.1-.5L34.4 3.6c.5-.9 1.2-1.3 2.1-1.3.9-.1 1.6.4 2.1 1.3zm-.8 15.2c-.2-.4-.5-1-.9-1.9-.1-.1-.2-.2-.4-.2-.1 0-.2.1-.4.2-.2.4-.6 1.1-1 1.9-.1.3 0 .5.3.6h2.1c.2 0 .3-.1.3-.3v-.3z"/>
                    <path d="M57.6 2.4c.6 0 .9.3.9.9v25.3c0 .6-.3.9-.9.9h-6.9c-.6 0-.9-.3-.9-.9V3.3c0-.6.3-.9.9-.9h6.9zM80.1 2.4c.6 0 .9.3.9.9v25.6c0 .5-.2.8-.5.8h-.2c-.5-.1-.8-.3-1-.4L70 23.2c-.3-.2-.5-.1-.5.2v5c0 .7-.3 1-1 1h-6.8c-.6 0-.9-.3-.9-.9V3.1c0-.5.2-.8.7-.7.5.1.8.2.9.3l9 6.1c.3.1.4.2.6.2.2 0 .3-.2.3-.6V3.3c0-.6.3-.9 1-.9h6.8zM83.3 2.5H104c.7 0 1 .3 1 .8v6.4c0 .5-.3.8-1 .8h-5.3c-.5 0-.7.3-.7.8v17.2c0 .6-.3.9-.9.9h-6.9c-.6 0-.9-.3-.9-.9V11.3c0-.6-.2-.8-.7-.8h-5.3c-.7 0-1-.3-1-.8V3.3c0-.6.3-.8 1-.8zM12.1 29.2c.6 0 .9.3.9.9v16.7c0 .6.3.9.8.9h7.1c.6 0 .9.3.9.9v6.9c0 .6-.3.9-.9.9H5.2c-.6 0-.9-.3-.9-.9V30.1c0-.6.3-.9.9-.9h6.9z"/>
                    <path d="M21.8 29.2h18.5c.6 0 1 .3 1 .8v6.4c0 .5-.3.8-1 .8h-9.8c-.7 0-1 .3-.9.9 0 .6.3.9.9.9h8.8c.6 0 .9.2.9.8v5.9c0 .5-.3.7-.9.7h-8.9c-.5 0-.8.3-.8 1 0 .6.3.9.8.9h9.9c.6 0 1 .3 1 .8v6.1c0 .5-.3.8-1 .8-2.1 0-5.1 0-9.2.1-4.1 0-7.2.1-9.2.1-.6 0-.9-.3-.9-.9V30.1c0-.6.3-.9.8-.9z"/>
                    <path d="M55.1 28.3c4 0 7.4 1.4 10.2 4.2 2.8 2.8 4.2 6.2 4.2 10.2 0 4-1.4 7.4-4.2 10.2-2.8 2.8-6.2 4.2-10.2 4.2-4 0-7.4-1.4-10.2-4.2-2.8-2.8-4.2-6.2-4.2-10.2 0-4 1.4-7.4 4.2-10.2 2.9-2.8 6.2-4.2 10.2-4.2zm0 8.7c-1.6 0-2.9.6-4 1.7s-1.7 2.5-1.7 4c0 1.6.6 2.9 1.7 4s2.4 1.7 4 1.7 2.9-.6 4-1.7 1.7-2.4 1.7-4-.6-2.9-1.7-4c-1.1-1.2-2.4-1.7-4-1.7z"/>
                    <path d="M88.7 29.2c.6 0 .9.3.9.9v25.6c0 .5-.2.8-.5.8h-.2c-.5-.1-.8-.3-1-.4L78.6 50c-.3-.2-.5-.1-.5.2v5c0 .7-.4 1-1 1h-6.8c-.6 0-.9-.3-.9-.9V29.9c0-.5.2-.8.7-.7.5.1.8.2.9.3l9 6.1c.2.2.4.2.5.2.2 0 .3-.2.3-.6v-5.1c0-.6.3-.9 1-.9h6.9zM104.3 29.2c.5 0 .7.2.7.7l-1 6.4c-.1.5-.3.8-.7.8h-2.8c-.5 0-.8-.1-.9-.6v-.1c0-.1.2-.3.5-.8.2-.2.1-.3-.3-.3h-.9c-.5 0-.7-.2-.7-.7v-4.7c0-.5.2-.7.7-.7h5.4zM19.3 57.2L31.9 82c.1.2.1.3.1.4 0 .4-.4.6-1.2.6h-5.4c-.6 0-1 0-1.2-.1-.2-.1-.4-.4-.7-.9-.4-.7-1-1.1-1.9-1.1h-8.8c-.8 0-1.4.3-1.7 1-.2.5-.5.8-.6.9-.2.2-.6.2-1.3.2H3.6c-.8 0-1.3-.2-1.3-.6 0-.1 0-.3.1-.5l12.5-24.7c.5-.9 1.2-1.3 2.1-1.3 1.1-.1 1.9.4 2.3 1.3zm-.8 15.2c-.2-.4-.5-1-.9-1.9-.1-.1-.3-.2-.4-.2-.1 0-.2.1-.4.2-.2.4-.6 1.1-1 1.9-.1.3 0 .5.3.6h2.1c.2 0 .3-.1.3-.3v-.3z"/>
                    <path d="M38.6 76.5c-.1-.2-.3-.3-.5-.3s-.3.1-.4.5v5.5c0 .6-.3.9-.9.9H30c-.6 0-.9-.3-.9-.9V56.9c0-.6.3-.9.8-.9h11.5c2.4 0 4.5.6 6.2 2 1.8 1.4 2.9 3.2 3.4 5.5.2.7.2 1.5.2 2.2 0 1.3-.2 2.6-.7 3.9-.8 2-2.1 3.6-4 4.6-.3.2-.4.3-.4.6 0 .2.1.4.3.7l4.5 6.8c.2.2.2.4.2.5 0 .2-.2.3-.5.3h-6.9c-.6 0-1-.3-1.4-.9l-3.7-5.7zm.2-12.4h-.2c-.6 0-.8.3-.9.8v2.2c0 .6.3.8.8.8h.3c1.5-.1 2.6-.2 3.2-.4.7-.2 1.1-.8 1.1-1.6s-.4-1.3-1.1-1.6c-.6-.1-1.6-.2-3.2-.2z"/>
                    <path d="M50.1 56.1h18.4c.7 0 1 .3 1 .8v6.4c0 .5-.3.8-1 .8h-4.2c-.5 0-.7.3-.7.8v17.2c0 .6-.3.9-.9.9h-6.9c-.6 0-.9-.3-.9-.9V64.9c0-.6-.2-.8-.7-.8H50c-.7 0-1-.3-1-.8v-6.4c0-.6.4-.8 1.1-.8z"/>
                </svg>
                <span class="hidden">Saint-Léon'Art</span>
            </a>
        </h1>

        <nav class="l-social-nav">
            <h2 class="hidden">Navigation des réseaux sociaux</h2>
            <ul class="l-social-nav__list">
                <?php $posts = new WP_Query(['showposts' => -1, 'post_type' => 'social-medias']); ?>
                <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
                    <?php
                        $socialFields = get_fields();
                        $socialIcons = socialIcons();
                    ?>
                    <li class="l-social-nav__item">
                        <a class="l-social-nav__link l-social-nav__link--<?= $socialFields['social-name']; ?>" href="<?= $socialFields['social-link']; ?>" title="Aller sur le <?= $socialFields['social-name']; ?> de Saint-Léon'Art">
                            <?= $socialIcons[$socialFields['social-name']]; ?>
                            <span class="hidden"><?= $socialFields['social-name']; ?></span>
                        </a>
                    </li>
                <?php endwhile; endif; ?>
            </ul>
        </nav>

        <nav class="l-main-nav <?php if(is_front_page()) echo 'l-main-nav--home'; ?>">
            <h2 class="hidden">Navigation principale</h2>
            <ul class="l-main-nav__list">
                <?php foreach(sl_get_nav_items('main') as $item): ?>
                    <li class="l-main-nav__item">
                        <a class="l-main-nav__link" href="<?= $item->url; ?>"><?= $item->label; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <?php if(is_page(sl_get_page_id_from_template('template-program.php'))): ?>
        <nav class="l-program-nav">
            <h2 class="hidden">Navigation secondaire du programme</h2>
            <ul class="l-program-nav__list">
                <li class="l-program-nav__item">
                    <a class="l-program-nav__link" href="#expositions">Expositions</a>
                </li>
                <li class="l-program-nav__item">
                    <a class="l-program-nav__link" href="#concerts">Concerts &amp; spectacles</a>
                </li>
                <li class="l-program-nav__item">
                    <a class="l-program-nav__link" href="#oeuvres">&OElig;uvres dans l'espace urbain</a>
                </li>
                <li class="l-program-nav__item">
                    <a class="l-program-nav__link" href="#divers">Évènements divers</a>
                </li>
            </ul>
        </nav>
        <?php endif; ?>
    </header>
