<?php
define("ROOT_PATH", realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..'));
chdir(ROOT_PATH);
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

require_once('app/system/autoload.php');

function debug(...$params)
{
    foreach ($params as $param) {
        print_r($param);
    }
}