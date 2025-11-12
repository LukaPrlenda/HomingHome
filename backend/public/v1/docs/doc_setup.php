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
*   url="https://production_server_to_add/backend/",
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