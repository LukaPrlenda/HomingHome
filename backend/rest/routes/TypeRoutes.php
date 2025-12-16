<?php

/**
 *  @OA\Get(
 *      path="/type/{type}",
 *      tags={"type"},
 *      summary="Fetch type by type.",
 *      @OA\Parameter(
 *          name="type",
 *          in="path",
 *          required=true,
 *          description="Type of property",
 *          @OA\Schema(
 *              type="string",
 *              example="Luxury Villa"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Fetch type by type."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /type/@type', function($type){
    Flight::json(Flight::typeService()->get_by_type($type));
});

/**
 *  @OA\Get(
 *      path="/type",
 *      tags={"type"},
 *      summary="Fetch all types.",
 *      @OA\Response(
 *          response=200,
 *          description="Fetch all types."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /type', function(){
    Flight::json(Flight::typeService()->get_all_types());
});

/**
 *  @OA\Post(
 *      path="/type",
 *      tags={"type"},
 *      summary="Add a new type",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"type"},
 *              @OA\Property(
 *                  property="type",
 *                  type="string",
 *                  example="Luxury Villa",
 *                  description="Type of property."
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Type added successfully."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('POST /type', function(){
    Flight::auth_middleware()->authorizeRole(Roles::ADMIN);

    $request = Flight::request()->data->getData();

    Flight::json([
        'message' => "Type added successfully",
        'data' => Flight::typeService()->add_type($request)
    ]);
});

/**
 *  @OA\Patch(
 *      path="/type/{id}",
 *      tags={"type"},
 *      summary="Update an existing type",
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
 *                  property="type",
 *                  type="string",
 *                  example="Luxury Villa",
 *                  description="Type of property."
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Type edited successfully."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('PATCH /type/@id', function($id){
    Flight::auth_middleware()->authorizeRole(Roles::ADMIN);

    $data = Flight::request()->data->getData();
    $id_column = Flight::request()->query['id_column'] ?? "id";
    
    Flight::json([
        'message' => "Type edited successfully",
        'data' => Flight::typeService()->update_type($data, $id, $id_column)
    ]);
});

/**
 *  @OA\Delete(
 *      path="/type/{id}",
 *      tags={"type"},
 *      summary="Delete the type by ID",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Type ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Type deleted successfully."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('DELETE /type/@id', function($id){
    Flight::auth_middleware()->authorizeRole(Roles::ADMIN);

    Flight::typeService()->delete_type($id);
    Flight::json(['message' => "Type deleted successfully"]);
});

?>