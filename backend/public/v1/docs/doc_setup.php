<?php

/**
* @OA\Info(
*   title="API",
*   description="HomingHome API",
*   version="1.0",
*   @OA\Contact(
*       email="luka.prlenda@stu.ibu.edu.ba",
*       name="Luka Prlenda"
*   )
* )
* @OA\Server(
*   url="http://localhost/HomingHome/backend/",
*   description="API server"
* )
* @OA\Server(
*   url="https://hominghome-kzvl5.ondigitalocean.app/hominghome-backend/",
*   description="API server"
* )
* @OA\SecurityScheme(
*   securityScheme="ApiKey",
*   type="apiKey",
*   in="header",
*   name="Authentication"
* )
*/
?>