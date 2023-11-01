<?php

include __DIR__ . "/../src/App/functions.php";

$app = include __DIR__ . "/../src/App/bootstrap.php";

$app->run();


//ini_set('memory_limit', '255M');
//echo ini_get('memory_limit');
//phpinfo();