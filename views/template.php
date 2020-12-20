<?php
if (!empty($data['error'])) {
    ?>
    <div class="alert alert-danger" role="alert">
        <?= $data['error'] ?>
    </div>
    <?php
}
if (!empty($data['success'])) {
    ?>
    <div class="alert alert-success" role="alert">
        <?= $data['success'] ?>
    </div>

    <?php
}
require_once $contentView;
?>



