<?php

require './init.php';

use \QCloud_WeApp_SDK\Mysql\Mysql as DB;

try {
    $rows = DB::select("ifeng");

    echo 'DB Read Success: ', PHP_EOL;
    print_r($rows);
} catch (Exception $e) {
    echo 'DB Read Failed: ', $e->getMessage(), PHP_EOL;
}
