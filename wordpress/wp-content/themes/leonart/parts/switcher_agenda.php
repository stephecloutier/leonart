<?php
$terms = get_terms('artistic-disciplines', [
    'post_type' => ['post', 'activities'],
    'fields' => 'all',
    'hide_empty' => true,
]);

$dates = get_fields(sl_get_page_id_from_template('template-agenda.php'))['agenda-dates'];

 ?>
<form method="GET" class="sorting__form sorting__form hide" id="filter-activities">
    <label class="sorting__label">Filtrer les activités&hellip;</label>
    <div class="sorting__filters">
        <div class="sorting__filter-type">
            <select id="post-filter-activities" name="post-filter-activities" class="sorting__select">
                <option value="none" class="sorting__option">Toutes</option>
                <?php foreach($terms as $term): ?>
                <option value="<?= $term->slug; ?>"><?= $term->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</form>
