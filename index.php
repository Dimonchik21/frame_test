<?php

define('BASE_DIR', getcwd());
require '/framework/core/bootstap.php';

$app = new CoreUploading( require('settings.php') );

print_r($app);
