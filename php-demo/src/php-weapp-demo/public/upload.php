<?php

require './init.php';

use \QCloud_WeApp_SDK\Cos as cos;

$cos = cos\CosAPI::getInstance();

$result = $cos->upload("wafer2-1251178460", "test.txt", "hello cloudbase!");

echo 'Upload Result:', PHP_EOL;
var_dump($result);
echo PHP_EOL;

$url = $cos->getObjectUrl("wafer2-1251178460", "test.txt", time()+86400);
echo 'Url: ', $url, PHP_EOL;
