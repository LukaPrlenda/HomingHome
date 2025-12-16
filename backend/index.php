<?php
//For handeling OPTIONS request on local host

header("Access-Controle-Allow-Origin: *");
header("Access-Controle-Allow-Headers: Content-Type, Authorization");
header("Access-Controle-Allow-Methods: POST, DELETE, OPTIONS");

if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    return 0;
}




require 'vendor/autoload.php';

require_once __DIR__ . '/rest/services/Admin_messagesService.php';
require_once __DIR__ . '/rest/services/AuthService.php';
require_once __DIR__ . '/rest/services/InterestService.php';
require_once __DIR__ . '/rest/services/ListingService.php';
require_once __DIR__ . '/rest/services/PropertiesService.php';
require_once __DIR__ . '/rest/services/TypeService.php';
require_once __DIR__ . '/rest/services/UserService.php';

require_once __DIR__ . '/middleware/AuthMiddleware.php';


use Firebase\JWT\JWT;
use Firebase\JWT\Key;


Flight::register('admin_messagesService', 'Admin_messagesService');
Flight::register('authService', 'AuthService');
Flight::register('interestService', 'InterestService');
Flight::register('listingService', 'ListingService');
Flight::register('propertiesService', 'PropertiesService');
Flight::register('typeService', 'TypeService');
Flight::register('userService', 'UserService');

Flight::register('auth_middleware', 'AuthMiddleware');


Flight::before("start", function () {
    $method = $_SERVER['REQUEST_METHOD'];

    if(
        strpos(Flight::request()->url, "/auth/login") === 0
        || strpos(Flight::request()->url, "/auth/signup") === 0
        || ($method == 'GET' && strpos(Flight::request()->url, "/listing") === 0)
        || ($method == 'GET' && strpos(Flight::request()->url, "/properties") === 0)
        || ($method == 'GET' && strpos(Flight::request()->url, "/type") === 0)
    ) {
        return TRUE;
    }
    else {
        try{
            $token = Flight::request()->getHeader("Authentication");
            if(Flight::auth_middleware()->verifyToken($token))
                return TRUE;
        }
        catch (\Exception $e) {
            Flight::halt(401, $e->getMessage());
        }
    }
});


require_once __DIR__ . '/rest/routes/Admin_messagesRoutes.php';
require_once __DIR__ . '/rest/routes/AuthRoutes.php';
require_once __DIR__ . '/rest/routes/InterestRoutes.php';
require_once __DIR__ . '/rest/routes/ListingRoutes.php';
require_once __DIR__ . '/rest/routes/PropertiesRoutes.php';
require_once __DIR__ . '/rest/routes/TypeRoutes.php';
require_once __DIR__ . '/rest/routes/UserRoutes.php';




Flight::start();

?>