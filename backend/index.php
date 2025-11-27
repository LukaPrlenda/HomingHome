<?php

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

Flight::route("/*", function () {
    if(
        strpos(Flight::request()->url, "/auth/login") === 0
        || strpos(Flight::request()->url, "/auth/signup") === 0
    ) {
        return TRUE;
    }
    else {
        try{
            $token = Flight::request()->getHeader("Authentication");
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