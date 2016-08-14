<?php
require "../vendor/autoload.php";
use App\App;

$app = new App(include('../config/config.php'));
$app->run();
$app->done();

echo "<pre>";
print_r($app);
