<?php
date_default_timezone_set('Asia/Shanghai');

ini_set('display_errors', 'On');
error_reporting(E_ALL);

define("HOME", dirname(dirname(__FILE__)));

require HOME . "/vendor/autoload.php";

use \QCloud_WeApp_SDK\Conf as Config;

Config::setup(array(
    //小城 AppId 及 AppSecret
    'appId'     =>  '',
    'appSecret' =>  '',

    //MySQL数据库配置
    'mysql' => array(
        'host'  =>  '10.0.0.0',
        'port'  =>  3306,
        'user'  =>  'root',
        'pass'  =>  'password',
        'db'    =>  'db_name',
        'char'  =>  'utf8mb4',
    ),

    //文件上传bucket配置
    'cos' => array(
        'region'        =>  'ap-shanghai',
        'fileBucket'    =>  'wafer2',
        'uploadFolder'  =>  '/wafer2/',
    ),

    // 微信登录态有效期
    'wxLoginExpires' => 7200,
    'wxMessageToken' => 'abcdefgh',

    //腾讯云账号appid及密钥
    "qcloudAppId"       =>  1000000000,
    "qcloudSecretId"    =>  'AKIDxxxxxxxxyyyyyyyyyyzzzzzzzzzzi',
    "qcloudSecretKey"  =>  'SecretKeySecretKeySecretKey',
));

if (!function_exists('debug')) {
    function debug($option){}
}
