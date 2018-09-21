<?php

if (isset($error) && is_string($error)) { ?>
    <h1><?= $error ?></h1>
<?php } else { ?>
    <h1>Ошибка</h1>
<?php } ?>
