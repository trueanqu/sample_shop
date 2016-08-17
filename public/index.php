<?php
require "../vendor/autoload.php";
use App\App;

$app = App::getInstance();
$app->run();
$app->done();

echo "<pre>";
var_dump($app);
