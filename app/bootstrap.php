<?php
session_start();
define('BASE_PATH', __DIR__);
define('ENCRYPTION_KEY', '!@@#%_my_serect_key_for_encryption_@#$!&');

require '../vendor/autoload.php';

use Illuminate\Config\Repository;
$configPath = BASE_PATH . DIRECTORY_SEPARATOR .'config' . DIRECTORY_SEPARATOR;
$config = new Repository();
foreach(glob($configPath . "*.php") as $phpFile){
    $config -> set(
        basename($phpFile, '.php'),
        require_once "$phpFile"
    );
}
$routesPath = BASE_PATH . DIRECTORY_SEPARATOR .'routes' . DIRECTORY_SEPARATOR;
foreach(glob($routesPath . "*.php") as $phpFile){
    require_once "$phpFile";
}
use Illuminate\Database\Capsule\Manager as Capsule;
$dbConfig = $config->get("app.db");
$capsule = new Capsule();
$capsule->addConnection($dbConfig);
$capsule->setAsGlobal();
$capsule->bootEloquent();
