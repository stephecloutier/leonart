<?php
    $current_order = $_SESSION[ 'post-order' ];
    //$current_order_by = $_SESSION[ 'post-order-by' ];
 ?>

<form method="POST" class="switcher sorting__form">
    <label for="post-order" class="sorting__label">Trier par &hellip;</label>
    <select id="post-order" name="post-order" onchange="this.form.submit()" class="sorting__select">
      <option value="DESC" <?php selected( $current_order, 'DESC' ); ?> class="sorting__option">Plus récentes</option>
      <option value="ASC" <?php selected( $current_order, 'ASC' ); ?> class="sorting__option">Plus anciennes</option>
    </select>
    <noscript>
        <input type="submit" value="Trier" class="sorting__button">
    </noscript>
</form>
