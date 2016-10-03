<?php
require "../vendor/autoload.php";
use Framework\App;

$app = App::getInstance();
$app->run();
$app->done();

