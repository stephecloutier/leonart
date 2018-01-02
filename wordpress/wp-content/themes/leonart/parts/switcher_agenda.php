<?php
$terms = get_terms('artistic-disciplines', [
    'post_type' => ['post', 'activities'],
    'fields' => 'all',
    'hide_empty' => true,
]);

$dates = get_fields(sl_get_page_id_from_template('template-agenda.php'))['agenda-dates'];

 ?>
<form method="GET" class="sorting__form sorting__form hide" id="filter-activities">
    <span class="sorting__label">Filtrer les activités &hellip;</span>
    <div class="sorting__filters">
        <div class="sorting__filter-type">
            <label for="post-filter-activities" class="sorting__label sorting__label--multi">Par discipline artistique</label>
            <select id="post-filter-activities" name="post-filter-activities" class="sorting__select">
                <option value="none" class="sorting__option">Toutes</option>
                <?php foreach($terms as $term): ?>
                <option value="<?= $term->slug; ?>"><?= $term->name; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="sorting__filter-type">
            <label for="post-filter-activities-date" class="sorting__label sorting__label--multi">Par date</label>
            <select id="post-filter-activities-date" name="post-filter-activities-date" class="sorting__select">
                <option value="none" class="sorting__option">Toutes</option>
                <?php foreach($dates as $date): ?>
                    <?php $theDate = new DateTime($date['agenda-date']); $formattedDate = strftime('%d/%m', $theDate->getTimestamp()); ?>
                <option value="<?= $formattedDate; ?>"><?= $formattedDate; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</form>
