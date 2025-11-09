<?php

/**
 *  @OA\Get(
 *      path="/user/role/{is_admin}",
 *      tags={"user"},
 *      summary="Fetch users by role.",
 *      @OA\Parameter(
 *          name="is_admin",
 *          in="path",
 *          required=true,
 *          description="Role of the user",
 *          @OA\Schema(
 *              type="integer",
 *              enum={0, 1},
 *              example=0
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Fetch user by role."
 *      )
 *  )
 */
Flight::route('GET /user/role/@is_admin', function($is_admin){
    Flight::json(Flight::userService()->get_by_role($is_admin));
});

/**
 *  @OA\Get(
 *      path="/user/usersnames/{is_admin}",
 *      tags={"user"},
 *      summary="Fetch user names by role.",
 *      @OA\Parameter(
 *          name="is_admin",
 *          in="path",
 *          required=true,
 *          description="Role of the user",
 *          @OA\Schema(
 *              type="integer",
 *              enum={0, 1},
 *              example=0
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Fetch usersnames by role."
 *      )
 *  )
 */
Flight::route('GET /user/usersnames/@is_admin', function($is_admin){
    Flight::json(Flight::userService()->get_all_usersnames($is_admin));
});

/**
 *  @OA\Get(
 *      path="/user/{id}",
 *      tags={"user"},
 *      summary="Fetch user by ID.",
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
 *      )
 *  )
 */
Flight::route('GET /user/@id', function($id){
    Flight::json(Flight::userService()->get_by_id($id));
});

/**
 *  @OA\Get(
 *      path="/user/basic_data/{id}",
 *      tags={"user"},
 *      summary="Fetch basic user data by ID.",
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
 *      )
 *  )
 */
Flight::route('GET /user/basic_data/@id', function($id){
    Flight::json(Flight::userService()->get_basic_data_by_id($id));
});

/**
 *  @OA\Get(
 *      path="/user/username/{username}",
 *      tags={"user"},
 *      summary="Fetch user by username.",
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
 *      )
 *  )
 */
Flight::route('GET /user/username/@username', function($username){
    Flight::json(Flight::userService()->get_by_username($username));
});

/**
 *  @OA\Get(
 *      path="/user",
 *      tags={"user"},
 *      summary="Fetch all users.",
 *      @OA\Response(
 *          response=200,
 *          description="Fetch all users."
 *      )
 *  )
 */
Flight::route('GET /user', function(){
    Flight::json(Flight::userService()->get_all_users());
});

/**
 *  @OA\Post(
 *      path="/user",
 *      tags={"user"},
 *      summary="Add a new user",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"name", "surname", "date_of_birth", "gender", "email", "phone_number", "country", "current_address", "is_agent", "username", "password", "is_admin"},
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
 *                  property="is_admin",
 *                  type="integer",
 *                  enum={0, 1},
 *                  example=0,
 *                  description="Is user an admin."
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="User added successfully."
 *      )
 *  )
 */
Flight::route('POST /user', function(){
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
 *                  property="is_admin",
 *                  type="integer",
 *                  enum={0, 1},
 *                  example=0,
 *                  description="Is user an admin."
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="User edited successfully."
 *      )
 *  )
 */
Flight::route('PATCH /user/@id', function($id){
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
 *      )
 *  )
 */
Flight::route('DELETE /user/@id', function($id){
    Flight::userService()->delete_user($id);
    Flight::json(['message' => "User deleted successfully"]);
});

?>