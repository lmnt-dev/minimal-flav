<?php
/**
 * @var 'primary'|'secondary' $type
 * @var string $body
 */
?>
<div class="alert alert-<?= $type ?? 'primary' ?>" role="alert">
  <?= $body ?>
</div>
