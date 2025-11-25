<?php

require 'vendor/autoload.php';

require_once __DIR__ . '/rest/services/Admin_messagesService.php';
require_once __DIR__ . '/rest/services/AuthService.php';
require_once __DIR__ . '/rest/services/InterestService.php';
require_once __DIR__ . '/rest/services/ListingService.php';
require_once __DIR__ . '/rest/services/PropertiesService.php';
require_once __DIR__ . '/rest/services/TypeService.php';
require_once __DIR__ . '/rest/services/UserService.php';


Flight::register('admin_messagesService', 'Admin_messagesService');
Flight::register('authService', 'AuthService');
Flight::register('interestService', 'InterestService');
Flight::register('listingService', 'ListingService');
Flight::register('propertiesService', 'PropertiesService');
Flight::register('typeService', 'TypeService');
Flight::register('userService', 'UserService');


require_once __DIR__ . '/rest/routes/Admin_messagesRoutes.php';
require_once __DIR__ . '/rest/routes/AuthRoutes.php';
require_once __DIR__ . '/rest/routes/InterestRoutes.php';
require_once __DIR__ . '/rest/routes/ListingRoutes.php';
require_once __DIR__ . '/rest/routes/PropertiesRoutes.php';
require_once __DIR__ . '/rest/routes/TypeRoutes.php';
require_once __DIR__ . '/rest/routes/UserRoutes.php';




Flight::start();

?>