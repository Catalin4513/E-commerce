<?php

define('BASE_PATH', realpath(__DIR__.'/../../'));

require_once dirname(__DIR__) . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(BASE_PATH);

$dotenv->load();
