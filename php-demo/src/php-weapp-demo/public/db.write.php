<?php

require './init.php';

use \QCloud_WeApp_SDK\Mysql\Mysql as DB;

try {
    $row_count = DB::insert("ifeng", ['name' => 'jeffeng']);
    echo 'DB Insert Succed: ', $row_count, PHP_EOL;
} catch (Exception $e) {
    echo 'DB Insert Failed: ', $e->getMessage(), PHP_EOL;
}
