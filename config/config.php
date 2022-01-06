<?php

$path = realpath(__DIR__);
DEFINE('ROOT_DIR', realpath(__DIR__ . '/../'));
DEFINE('SRC_DIR', realpath(__DIR__ . '/../src/'));

// Database definitions 

DEFINE('DB_DRIVER', 'mysql');
DEFINE('DB_HOST', 'db');
DEFINE('DB_ROOT', 'root');
DEFINE('DB_NAME', 'todo_mvc');
DEFINE('DB_USER', 'user');
DEFINE('DB_PASSWORD','123456');

DEFINE('APP_ENV', 'dev');
