<?php

/**
 *  @OA\Get(
 *      path="/user/role/{role}",
 *      tags={"user"},
 *      summary="Fetch users by role.",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\Parameter(
 *          name="role",
 *          in="path",
 *          required=true,
 *          description="Role of the user",
 *          @OA\Schema(
 *              type="string",
 *              enum={"admin","user"},
 *              example="user"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Fetch user by role."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /user/role/@role', function($role){
    Flight::auth_middleware()->authorizeRole(Roles::ADMIN);

    Flight::json(Flight::userService()->get_by_role($role));
});

/**
 *  @OA\Get(
 *      path="/user/usersnames/{role}",
 *      tags={"user"},
 *      summary="Fetch user names by role.",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\Parameter(
 *          name="role",
 *          in="path",
 *          required=true,
 *          description="Role of the user",
 *          @OA\Schema(
 *              type="string",
 *              enum={"admin","user"},
 *              example="user"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Fetch usernames and email by role."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /user/usersnames/@role', function($role){
    Flight::auth_middleware()->authorizeRole(Roles::ADMIN);

    Flight::json(Flight::userService()->get_all_usersnames($role));
});

/**
 *  @OA\Get(
 *      path="/user/{id}",
 *      tags={"user"},
 *      summary="Fetch user by ID.",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="User ID",
 *          @OA\Schema(
 *              type="integer",
 *              example=1
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Fetch user by ID."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /user/@id', function($id){
    Flight::auth_middleware()->authorizeRoles([Roles::ADMIN, Roles::USER]);
    Flight::auth_middleware()->authorizeUserID($id);

    Flight::json(Flight::userService()->get_by_id($id));
});

/**
 *  @OA\Get(
 *      path="/user/basic_data/{id}",
 *      tags={"user"},
 *      summary="Fetch basic user data by ID.",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="User ID",
 *          @OA\Schema(
 *              type="integer",
 *              example=1
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Fetch basic user data by ID."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /user/basic_data/@id', function($id){
    Flight::auth_middleware()->authorizeRoles([Roles::ADMIN, Roles::USER]);
    Flight::auth_middleware()->authorizeUserID($id);

    Flight::json(Flight::userService()->get_basic_data_by_id($id));
});

/**
 *  @OA\Get(
 *      path="/user/username/{username}",
 *      tags={"user"},
 *      summary="Fetch user by username.",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\Parameter(
 *          name="username",
 *          in="path",
 *          required=true,
 *          description="User username",
 *          @OA\Schema(
 *              type="string",
 *              example="username"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Fetch user by username."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /user/username/@username', function($username){
    Flight::auth_middleware()->authorizeRoles([Roles::ADMIN, Roles::USER]);

    Flight::json(Flight::userService()->get_by_username($username));
});

/**
 *  @OA\Get(
 *      path="/user",
 *      tags={"user"},
 *      summary="Fetch all users.",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\Response(
 *          response=200,
 *          description="Fetch all users."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /user', function(){
    Flight::auth_middleware()->authorizeRole(Roles::ADMIN);

    Flight::json(Flight::userService()->get_all_users());
});

/**
 *  @OA\Post(
 *      path="/user",
 *      tags={"user"},
 *      summary="Add a new user",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"name", "surname", "date_of_birth", "gender", "email", "phone_number", "country", "current_address", "is_agent", "username", "password", "role"},
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
 *              ),
 *              @OA\Property(
 *                  property="role",
 *                  type="string",
 *                  enum={"admin","user"},
 *                  example="user",
 *                  description="Role of the user."
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
Flight::route('POST /user', function(){
    Flight::auth_middleware()->authorizeRoles([Roles::ADMIN, Roles::USER]);

    $request = Flight::request()->data->getData();

    Flight::json([
        'message' => "User added successfully",
        'data' => Flight::userService()->add_user($request)
    ]);
});

/**
 *  @OA\Patch(
 *      path="/user/{id}",
 *      tags={"user"},
 *      summary="Update an existing user",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Value of ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Parameter(
 *          name="id_column",
 *          in="query",
 *          required=false,
 *          description="Column to use as ID",
 *          @OA\Schema(type="string", example="id")
 *      ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
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
 *              ),
 *              @OA\Property(
 *                  property="role",
 *                  type="string",
 *                  enum={"admin","user"},
 *                  example="user",
 *                  description="Role of the user."
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="User edited successfully."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('PATCH /user/@id', function($id){
    Flight::auth_middleware()->authorizeRoles([Roles::ADMIN, Roles::USER]);
    Flight::auth_middleware()->authorizeUserID($id);

    $data = Flight::request()->data->getData();
    $id_column = Flight::request()->query['id_column'] ?? "id";
    
    Flight::json([
        'message' => "User edited successfully",
        'data' => Flight::userService()->update_user($data, $id, $id_column)
    ]);
});

/**
 *  @OA\Delete(
 *      path="/user/{id}",
 *      tags={"user"},
 *      summary="Delete the user by ID",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="User ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="User deleted successfully."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('DELETE /user/@id', function($id){
    Flight::auth_middleware()->authorizeRoles([Roles::ADMIN, Roles::USER]);
    Flight::auth_middleware()->authorizeUserID($id);

    Flight::userService()->delete_user($id);
    Flight::json(['message' => "User deleted successfully"]);
});

?>