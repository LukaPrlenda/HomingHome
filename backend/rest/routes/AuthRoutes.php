<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

/**
 *  @OA\Post(
 *      path="/auth/signin",
 *      tags={"auth"},
 *      summary="Signin a new user",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"name", "surname", "date_of_birth", "gender", "email", "phone_number", "country", "current_address", "is_agent", "username", "password"},
 *              @OA\Property(
 *                  property="name",
 *                  type="string",
 *                  example="Fin",
 *                  description="Name of the user."
 *              ),
 *              @OA\Property(
 *                  property="surname",
 *                  type="string",
 *                  example="Skywalker",
 *                  description="Surname of the user."
 *              ),
 *              @OA\Property(
 *                  property="date_of_birth",
 *                  type="string",
 *                  format="date",
 *                  example="2000-10-10",
 *                  description="Date of birth of the user."
 *              ),
 *              @OA\Property(
 *                  property="gender",
 *                  type="string",
 *                  enum={"Male","Female","Neutral"},
 *                  example="Male",
 *                  description="Gender of the user."
 *              ),
 *              @OA\Property(
 *                  property="email",
 *                  type="string",
 *                  example="skywalker@gmail.com",
 *                  description="Email of the user."
 *              ),
 *              @OA\Property(
 *                  property="phone_number",
 *                  type="string",
 *                  example="0038761123456",
 *                  description="Phone number of the user."
 *              ),
 *              @OA\Property(
 *                  property="country",
 *                  type="string",
 *                  example="Croatia",
 *                  description="Country of the user."
 *              ),
 *              @OA\Property(
 *                  property="current_address",
 *                  type="string",
 *                  example="Sarajevska 1",
 *                  description="Current address of the user."
 *              ),
 *              @OA\Property(
 *                  property="is_agent",
 *                  type="integer",
 *                  enum={0, 1},
 *                  example=0,
 *                  description="Is user an agent."
 *              ),
 *              @OA\Property(
 *                  property="username",
 *                  type="string",
 *                  example="Fn2187",
 *                  description="Username of the user."
 *              ),
 *              @OA\Property(
 *                  property="password",
 *                  type="string",
 *                  example="youwontevergessit1234567890",
 *                  description="Password of the user."
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="User added successfully."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route("POST /auth/signin", function () {
    $data = Flight::request()->data->getData();

    $response = Flight::authService()->signin($data);

    if ($response['success']) {
        Flight::json([
            'message' => 'User signed successfully',
            'data' => $response['data']
        ]);
    }
    else {
        Flight::halt(500, $response['error']);
    }
});

/**
 *  @OA\Post(
 *      path="/auth/login",
 *      tags={"auth"},
 *      summary="Login a new user",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"username", "password"},
 *              @OA\Property(
 *                  property="username",
 *                  type="string",
 *                  example="Fn2187",
 *                  description="Username of the user."
 *              ),
 *              @OA\Property(
 *                  property="password",
 *                  type="string",
 *                  example="youwontevergessit1234567890",
 *                  description="Password of the user."
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="User added successfully."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route("POST /auth/login", function () {
    $data = Flight::request()->data->getData();

    $response = Flight::authService()->login($data);

    if ($response['success']) {
        Flight::json([
            'message' => 'User logged successfully',
            'data' => $response['data']
        ]);
    }
    else {
        Flight::halt(500, $response['error']);
    }
});
?>