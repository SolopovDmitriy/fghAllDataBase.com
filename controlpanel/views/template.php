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

if (isset($moduls) && count($moduls) > 0) {
    foreach ($moduls as $key => $path) {
        if (file_exists($path)) {
            require_once($path);
        }
    }
}
if (!empty($contentView)) {
    require_once $contentView;
}

?>
