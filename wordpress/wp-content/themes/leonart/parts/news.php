<div class="news__wrapper">
    <?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
    <?php
        $fields = get_fields();
        $newsContent = sl_remove_all_tags($fields['news-content']);
        $date = new DateTime(get_the_date('d-m-Y'));
        $datetime = strftime('%Y-%m-%dT%H:%M', $date->getTimestamp());

    ?>
    <div class="single-news">
        <a href="<?= the_permalink(); ?>" class="single-news__inner">
            <h3 class="single-news__title"><?= $fields['news-title']; ?></h3>
            <time class="single-news__date" datetime="<?= $datetime; ?>">
                <?= strftime('%d %B %Y', $date->getTimestamp()); ?>
            </time>
            <?php
                if($fields['news-img']) {
                    $image = $fields['news-img'];
                    $imageSize = $image['sizes']['smallest'];
                } else {
                    $image = get_template_directory_uri() . '/assets/images/banner-image.jpg';
                    $imageSize = $image;
                }
            ?>
            <figure class="single-news__figure">
                <img class="single-news__img" src="<?= $imageSize; ?>" alt="<?= sl_get_image_alt($image) ? sl_get_image_alt($image) : 'Image de la news ' . $fields['news-title']; ?>">
            </figure>
            <p class="single-news__content"><?= sl_get_the_excerpt($newsContent, 280); ?></p>
            <span href="<?= the_permalink(); ?>" class="single-news__link arrow-link arrow-link--raspberry">
                En lire plus<span class="hidden"> sur <?= $fields['news-title']; ?></span><!--
            --></span>
        </a>
    </div>
    <?php endwhile; endif; ?>
</div>
