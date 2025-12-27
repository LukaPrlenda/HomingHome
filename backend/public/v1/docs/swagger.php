<?php

require __DIR__ . '/../../../vendor/autoload.php';

define('LOCALSERVER', 'http://localhost/HomingHome/backend/');
define('PRODSERVER', 'https://hominghome-kzvl5.ondigitalocean.app/hominghome-backend/');

if($_SERVER['SERVER_NAME'] == 'localhost'  || $_SERVER['SERVER_NAME'] == '127.0.0.1'){
    define('BASE_URL', 'http://localhost/HomingHome/backend/');
}
else{
    define('BASE_URL', 'https://hominghome-kzvl5.ondigitalocean.app/hominghome-backend/');
}

$openapi = \OpenApi\Generator::scan([
    __DIR__ . '/doc_setup.php',
    __DIR__ . '/../../../rest/routes'
]);
header('Content-Type: application/json');
echo $openapi->toJson();

?>