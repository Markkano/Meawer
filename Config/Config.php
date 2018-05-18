<?php namespace Config;
define('ROOT', dirname(__DIR__).'/');
define('BASE_URL', '/Meawer/');

## Base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '35331374');
define('DB_NAME', 'Meawer');

define('IMG_PATH_UPLOAD', ROOT.'Upload/Images/');
define('IMG_PATH', BASE_URL.'Upload/Images/');

define('MAX_IMG_SIZE', 5000000);
?>
