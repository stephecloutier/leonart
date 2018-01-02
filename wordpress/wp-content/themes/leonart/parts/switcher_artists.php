<?php
    $terms = get_terms('artistic-disciplines', [
        'post_type' => ['post', 'artists'],
        'fields' => 'all',
        'hide_empty' => true,
    ]);

 ?>
<form method="GET" class="sorting__form hide" id="filter-artists">
    <label for="post-filter-artists" class="sorting__label">Filtrer les artistes &hellip;</label>
    <select id="post-filter-artists" name="post-filter-artists" class="sorting__select">
        <option value="none" class="sorting__option">Tous</option>
        <?php foreach($terms as $term): ?>
        <option value="<?= $term->slug; ?>"><?= $term->name; ?></option>
        <?php endforeach; ?>
    </select>
</form>
