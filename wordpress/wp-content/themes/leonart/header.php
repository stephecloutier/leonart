<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Stéphanie Cloutier">
        <meta name="description" content="Site web du parcours artistique Saint-Léon'Art, à Liège, en Belgique">

        <title><?php wp_title(''); ?></title>
    </head>

    <body>

    <header>
        <h1>
            <a href="<?= get_home_url(); ?>" title="Aller à l'accueil">
                Saint-Léon'Art [insérer svg]
            </a>
        </h1>

        <nav>
            <h2 class="hidden">Navigation des réseaux sociaux</h2>
            <ul>
                <?php foreach (sl_get_nav_items('social_media') as $item): ?>
                    <li>
                        <a href="<?= $item->url; ?>"><?= $item->label; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <nav>
            <h2 class="hidden">Navigation principale</h2>
            <ul>
                <?php foreach(sl_get_nav_items('main') as $item): ?>
                    <li>
                        <a href="<?= $item->url; ?>"><?= $item->label; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </header>
