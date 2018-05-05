<?php

$config = parse_ini_file('config.ini', true);

define('DB_HOST', $config['database']['host']);
define('DB_USER', $config['database']['username']);
define('DB_PASS', $config['database']['password']);
define('DB_NAME', $config['database']['schema']);

define('RUTA_APP',dirname(dirname(__FILE__)));

define('RUTA_URL', $config['application']['route']);

define('NAME_APP', $config['application']['name']);
define('VERSION_APP', $config['application']['version']);