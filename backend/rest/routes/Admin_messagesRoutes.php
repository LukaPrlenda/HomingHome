<?php

/**
 *  @OA\Get(
 *      path="/admin_messages/user/{id}",
 *      tags={"admin_messages"},
 *      summary="Fetch the admin messages by user ID.",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="User ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Fetch the admin messages for user."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /admin_messages/user/@id', function($id){
    Flight::json(Flight::admin_messagesService()->get_by_user_id($id));
});

/**
 *  @OA\Get(
 *      path="/admin_messages/property/{id}",
 *      tags={"admin_messages"},
 *      summary="Fetch the admin messages by property ID.",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Property ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Fetch the admin messages for property."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /admin_messages/property/@id', function($id){
    Flight::json(Flight::admin_messagesService()->get_by_property_id($id));
});

/**
 *  @OA\Get(
 *      path="/admin_messages",
 *      tags={"admin_messages"},
 *      summary="Fetch all admin messages",
 *      @OA\Response(
 *          response=200,
 *          description="Fetch all admin messages."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /admin_messages', function(){
    Flight::json(Flight::admin_messagesService()->get_all_admin_messages());
});

/**
 *  @OA\Post(
 *      path="/admin_messages",
 *      tags={"admin_messages"},
 *      summary="Add a new admin message",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"user_id", "property_id", "message"},
 *              @OA\Property(
 *                  property="user_id",
 *                  type="integer",
 *                  example=1,
 *                  description="Message for user with this ID."
 *              ),
 *              @OA\Property(
 *                  property="property_id",
 *                  type="integer",
 *                  example=1,
 *                  description="Message regarding property with this ID."
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="This is a message from admin",
 *                  description="Message content"
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Admin message added successfully."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('POST /admin_messages', function(){
    $request = Flight::request()->data->getData();

    Flight::json([
        'message' => "Admin message added successfully",
        'data' => Flight::admin_messagesService()->add_to_admin($request)
    ]);
});

/**
 *  @OA\Patch(
 *      path="/admin_messages/{id}",
 *      tags={"admin_messages"},
 *      summary="Update an existing admin message",
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
 *                  property="user_id",
 *                  type="integer",
 *                  example=1,
 *                  description="Message for user with this ID."
 *              ),
 *              @OA\Property(
 *                  property="property_id",
 *                  type="integer",
 *                  example=1,
 *                  description="Message regarding property with this ID."
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="This is a message from admin",
 *                  description="Message content"
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Admin message edited successfully."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('PATCH /admin_messages/@id', function($id){
    $data = Flight::request()->data->getData();
    $id_column = Flight::request()->query['id_column'] ?? "id";
    
    Flight::json([
        'message' => "Admin message edited successfully",
        'data' => Flight::admin_messagesService()->update_admin($data, $id, $id_column)
    ]);
});

/**
 *  @OA\Delete(
 *      path="/admin_messages/{id}",
 *      tags={"admin_messages"},
 *      summary="Delete the admin message by ID",
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Admin message ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Admin message deleted successfully."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('DELETE /admin_messages/@id', function($id){
    Flight::admin_messagesService()->delete_admin($id);
    Flight::json(['message' => "Admin message deleted successfully"]);
});

?>