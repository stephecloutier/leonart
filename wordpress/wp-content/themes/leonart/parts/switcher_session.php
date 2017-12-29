<?php
    $current_order = $_SESSION[ 'post-order' ];
    //$current_order_by = $_SESSION[ 'post-order-by' ];
 ?>

<form method="POST" class="switcher">
    <p><label for="post-order">Trier par &hellip;</label>
      <select id="post-order" name="post-order" onchange="this.form.submit()">
          <option value="DESC" <?php selected( $current_order, 'DESC' ); ?>>Plus récentes</option>
          <option value="ASC" <?php selected( $current_order, 'ASC' ); ?>>Plus anciennes</option>
      </select></p>
      <noscript>
          <input type="submit" value="Trier">
      </noscript>
</form>
