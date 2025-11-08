<?php

require __DIR__ . '/../../../vendor/autoload.php';

define('LOCALSERVER', 'http://localhost/HomingHome/backend/');
define('PRODSERVER', 'https://production_server_to_add/backend/');

if($_SERVER['SERVER_NAME'] == 'localhost'  || $_SERVER['SERVER_NAME'] == '127.0.0.1'){
    define('BASE_URL', 'http://localhost/HomingHome/backend/');
}
else{
    define('BASE_URL', 'https://production_server_to_add/backend/');
}

$openapi = \OpenApi\Generator::scan([
    __DIR__ . '/doc_setup.php',
    __DIR__ . '/../../../rest/routes'
]);
header('Content-Type: application/json');
echo $openapi->toJson();

?>