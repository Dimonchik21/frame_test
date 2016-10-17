<?
//start project

define('BASE_DIR', getcwd());
require '/framework/core/bootstap.php';

$app = new CoreUploading( require('settings.php') );


var_dump($app->app);

