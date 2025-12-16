<?php

/**
 *  @OA\Get(
 *      path="/properties/area",
 *      tags={"properties"},
 *      summary="Fetch areas of properties.",
 *      @OA\Response(
 *          response=200,
 *          description="Fetch areas of properties."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /properties/area', function(){
    Flight::json(Flight::propertiesService()->get_all_area());
});

/**
 *  @OA\Get(
 *      path="/properties/sum/area",
 *      tags={"properties"},
 *      summary="Fetch sum area of properties.",
 *      @OA\Response(
 *          response=200,
 *          description="Fetch sum area of properties."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /properties/sum/area', function(){
    Flight::json(Flight::propertiesService()->get_sum_area());
});

/**
 *  @OA\Get(
 *      path="/properties",
 *      tags={"properties"},
 *      summary="Fetch all properties.",
 *      @OA\Response(
 *          response=200,
 *          description="Fetch all properties."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /properties', function(){
    Flight::json(Flight::propertiesService()->get_all_properties());
});

/**
 *  @OA\Post(
 *      path="/properties",
 *      tags={"properties"},
 *      summary="Add a new property",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"user_id", "type_id", "location", "bedrooms", "bathrooms", "area", "floor", "parking", "price", "picture", "description"},
 *              @OA\Property(
 *                  property="user_id",
 *                  type="integer",
 *                  example=1,
 *                  description="ID of interested user."
 *              ),
 *              @OA\Property(
 *                  property="type_id",
 *                  type="integer",
 *                  example=1,
 *                  description="ID of property type."
 *              ),
 *              @OA\Property(
 *                  property="location",
 *                  type="string",
 *                  example="24 New Street Miami, OR 24560",
 *                  description="Location of the property."
 *              ),
 *              @OA\Property(
 *                  property="bedrooms",
 *                  type="integer",
 *                  example=1,
 *                  description="Number of bedrooms."
 *              ),
 *              @OA\Property(
 *                  property="bathrooms",
 *                  type="integer",
 *                  example=1,
 *                  description="Number of bathrooms."
 *              ),
 *              @OA\Property(
 *                  property="area",
 *                  type="integer",
 *                  example=100,
 *                  description="Area of property."
 *              ),
 *              @OA\Property(
 *                  property="floor",
 *                  type="integer",
 *                  example=3,
 *                  description="Number of floors."
 *              ),
 *              @OA\Property(
 *                  property="parking",
 *                  type="integer",
 *                  example=3,
 *                  description="Number of parking spaces."
 *              ),
 *              @OA\Property(
 *                  property="price",
 *                  type="integer",
 *                  example=1000000,
 *                  description="Price of property."
 *              ),
 *              @OA\Property(
 *                  property="picture",
 *                  type="string",
 *                  format="byte",
 *                  description="Base64 picture of property."
 *              ),
 *              @OA\Property(
 *                  property="description",
 *                  type="string",
 *                  example="This is a description of the property",
 *                  description="Description of the property"
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Property added successfully."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('POST /properties', function(){
    Flight::auth_middleware()->authorizeRoles([Roles::ADMIN, Roles::USER]);

    $request = Flight::request()->data->getData();

    Flight::json([
        'message' => "Property added successfully",
        'data' => Flight::propertiesService()->add_property($request)
    ]);
});

/**
 *  @OA\Patch(
 *      path="/properties/{id}",
 *      tags={"properties"},
 *      summary="Update an existing property",
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
 *                  property="user_id",
 *                  type="integer",
 *                  example=1,
 *                  description="ID of interested user."
 *              ),
 *              @OA\Property(
 *                  property="type_id",
 *                  type="integer",
 *                  example=1,
 *                  description="ID of property type."
 *              ),
 *              @OA\Property(
 *                  property="location",
 *                  type="string",
 *                  example="24 New Street Miami, OR 24560",
 *                  description="Location of the property."
 *              ),
 *              @OA\Property(
 *                  property="bedrooms",
 *                  type="integer",
 *                  example=1,
 *                  description="Number of bedrooms."
 *              ),
 *              @OA\Property(
 *                  property="bathrooms",
 *                  type="integer",
 *                  example=1,
 *                  description="Number of bathrooms."
 *              ),
 *              @OA\Property(
 *                  property="area",
 *                  type="integer",
 *                  example=100,
 *                  description="Area of property."
 *              ),
 *              @OA\Property(
 *                  property="floor",
 *                  type="integer",
 *                  example=3,
 *                  description="Number of floors."
 *              ),
 *              @OA\Property(
 *                  property="parking",
 *                  type="integer",
 *                  example=3,
 *                  description="Number of parking spaces."
 *              ),
 *              @OA\Property(
 *                  property="price",
 *                  type="integer",
 *                  example=1000000,
 *                  description="Price of property."
 *              ),
 *              @OA\Property(
 *                  property="picture",
 *                  type="string",
 *                  format="byte",
 *                  description="Base64 picture of property."
 *              ),
 *              @OA\Property(
 *                  property="description",
 *                  type="string",
 *                  example="This is a description of the property",
 *                  description="Description of the property"
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Property edited successfully."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('PATCH /properties/@id', function($id){
    Flight::auth_middleware()->authorizeRoles([Roles::ADMIN, Roles::USER]);

    $data = Flight::request()->data->getData();
    $id_column = Flight::request()->query['id_column'] ?? "id";
    
    Flight::json([
        'message' => "Property edited successfully",
        'data' => Flight::propertiesService()->update_property($data, $id, $id_column)
    ]);
});

/**
 *  @OA\Delete(
 *      path="/properties/{id}",
 *      tags={"properties"},
 *      summary="Delete the property by ID",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Property ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Property deleted successfully."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('DELETE /properties/@id', function($id){
    Flight::auth_middleware()->authorizeRoles([Roles::ADMIN, Roles::USER]);

    Flight::propertiesService()->delete_property($id);
    Flight::json(['message' => "Property deleted successfully"]);
});

?>