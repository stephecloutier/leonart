<?php if($posts->have_posts()) : while($posts->have_posts()) : $posts->the_post(); ?>
<?php $fields = get_fields(); $newsContent = sl_remove_all_tags($fields['news-content']); ?>
<a href="<?= the_permalink(); ?>">
    <h3 class="news__title"><?= $fields['news-title']; ?></h3>
    <time datetime=""><?= the_date('j F Y'); ?></time>
    <?php $image = $fields['news-img'];?>
    <img src="<?= $image['sizes']['smallest']; ?>" alt="<?php if(sl_get_image_alt('news-img')) echo sl_get_image_alt('news-img'); else echo 'Image de la news ' . $fields['news-title']; ?>">
    <p class="news__content"><?= sl_get_the_excerpt($newsContent, 280); ?></p>
    <a href="<?= the_permalink(); ?>" class="home-news__link">En lire plus <span class="hidden">sur <?= $fields['news-title']; ?></span></a>
</a>
<?php endwhile; endif; ?>
