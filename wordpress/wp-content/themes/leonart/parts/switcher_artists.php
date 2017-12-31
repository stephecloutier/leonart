<?php
    $current_order = $_SESSION[ 'post-filter-artists' ];
    $_terms = get_terms([
        'taxonomy' => 'artistic-disciplines',
        'hide_empty' => true,
    ]);
 ?>
<form method="GET" class="sorting__form hide" id="filter-artists">
    <label for="post-filter-artists" class="sorting__label">Filtrer les artistes &hellip;</label>
    <select id="post-filter-artists" name="post-filter-artists" class="sorting__select">
        <option value="none" class="sorting__option">Tous</option>
        <?php foreach($_terms as $term): ?>
        <option value="<?= $term->slug; ?>"><?= $term->name; ?></option>
        <?php endforeach; ?>
    </select>
</form>
