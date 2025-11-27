<?php

/**
 *  @OA\Get(
 *      path="/listing/address/{status}",
 *      tags={"listing"},
 *      summary="Fetch listing address by status.",
 *      @OA\Parameter(
 *          name="status",
 *          in="path",
 *          required=true,
 *          description="listing status",
 *          @OA\Schema(
 *              type="string",
 *              enum={"Active","Sold!","Do not want to sell","Something else","Inappropriate","Not compliant with rules"},
 *              example="Active"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Fetch listing address by status."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /listing/address/@status', function($status){
    Flight::json(Flight::listingService()->get_address_by_status($status));
});

/**
 *  @OA\Get(
 *      path="/listing/{status}",
 *      tags={"listing"},
 *      summary="Fetch listing by status.",
 *      @OA\Parameter(
 *          name="status",
 *          in="path",
 *          required=true,
 *          description="listing status",
 *          @OA\Schema(
 *              type="string",
 *              enum={"Active","Sold!","Do not want to sell","Something else","Inappropriate","Not compliant with rules"},
 *              example="Active"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Fetch listing by status."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /listing/@status', function($status){
    Flight::json(Flight::listingService()->get_by_status($status));
});

/**
 *  @OA\Get(
 *      path="/listing/first/{status}",
 *      tags={"listing"},
 *      summary="Fetch first listing by status.",
 *      @OA\Parameter(
 *          name="status",
 *          in="path",
 *          required=true,
 *          description="listing status",
 *          @OA\Schema(
 *              type="string",
 *              enum={"Active","Sold!","Do not want to sell","Something else","Inappropriate","Not compliant with rules"},
 *              example="Active"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Fetch first listing by status."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /listing/first/@status', function($status){
    Flight::json(Flight::listingService()->get_first_by_status($status));
});

/**
 *  @OA\Get(
 *      path="/listing/first/{status}/{type}",
 *      tags={"listing"},
 *      summary="Fetch first listing by status and type.",
 *      @OA\Parameter(
 *          name="status",
 *          in="path",
 *          required=true,
 *          description="listing status",
 *          @OA\Schema(
 *              type="string",
 *              enum={"Active","Sold!","Do not want to sell","Something else","Inappropriate","Not compliant with rules"},
 *              example="Active"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="type",
 *          in="path",
 *          required=true,
 *          description="Type of property listed",
 *          @OA\Schema(
 *              type="string", example="Luxury Villa"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Fetch first listing by status and type."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /listing/first/@status/@type', function($status, $type){
    Flight::json(Flight::listingService()->get_first_by_type_and_status($type, $status));
});

/**
 *  @OA\Get(
 *      path="/listing/{status}/{type}",
 *      tags={"listing"},
 *      summary="Fetch listings by status and type.",
 *      @OA\Parameter(
 *          name="status",
 *          in="path",
 *          required=true,
 *          description="listing status",
 *          @OA\Schema(
 *              type="string",
 *              enum={"Active","Sold!","Do not want to sell","Something else","Inappropriate","Not compliant with rules"},
 *              example="Active"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="type",
 *          in="path",
 *          required=true,
 *          description="Type of property listed",
 *          @OA\Schema(
 *              type="string", example="Luxury Villa"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Fetch listings by status and type."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /listing/@status/@type', function($status, $type){
    Flight::json(Flight::listingService()->get_by_type_and_status($type, $status));
});

/**
 *  @OA\Get(
 *      path="/listing/first_N/{status}/{number}",
 *      tags={"listing"},
 *      summary="Fetch first N listings by status.",
 *      @OA\Parameter(
 *          name="status",
 *          in="path",
 *          required=true,
 *          description="listing status",
 *          @OA\Schema(
 *              type="string",
 *              enum={"Active","Sold!","Do not want to sell","Something else","Inappropriate","Not compliant with rules"},
 *              example="Active"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="number",
 *          in="path",
 *          required=true,
 *          description="Number of first listings to fetch",
 *          @OA\Schema(
 *              type="integer", example=10
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Fetch first N listings by status."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /listing/first_N/@status/@number', function($status, $number){
    Flight::json(Flight::listingService()->get_first_N_of_status($status, $number));
});

/**
 *  @OA\Get(
 *      path="/listing",
 *      tags={"listing"},
 *      summary="Fetch all listings.",
 *      @OA\Response(
 *          response=200,
 *          description="Fetch all listings."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /listing', function(){
    Flight::json(Flight::listingService()->get_all_listings());
});

/**
 *  @OA\Post(
 *      path="/listing",
 *      tags={"listing"},
 *      summary="Add a new listing",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"property_id", "status"},
 *              @OA\Property(
 *                  property="property_id",
 *                  type="integer",
 *                  example=1,
 *                  description="ID of property."
 *              ),
 *              @OA\Property(
 *                  property="status",
 *                  type="string",
 *                  enum={"Active","Sold!","Do not want to sell","Something else","Inappropriate","Not compliant with rules"},
 *                  example="Active",
 *                  description="Status of listing."
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Listing added successfully."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('POST /listing', function(){
    Flight::auth_middleware()->authorizeRoles([Roles::ADMIN, Roles::USER]);

    $request = Flight::request()->data->getData();

    Flight::json([
        'message' => "Listing added successfully",
        'data' => Flight::listingService()->add_listing($request)
    ]);
});

/**
 *  @OA\Patch(
 *      path="/listing/{id}",
 *      tags={"listing"},
 *      summary="Update an existing listing",
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
 *                  property="property_id",
 *                  type="integer",
 *                  example=1,
 *                  description="ID of property."
 *              ),
 *              @OA\Property(
 *                  property="status",
 *                  type="string",
 *                  enum={"Active","Sold!","Do not want to sell","Something else","Inappropriate","Not compliant with rules"},
 *                  example="Active",
 *                  description="Status of listing."
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Listing edited successfully."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('PATCH /listing/@id', function($id){
    Flight::auth_middleware()->authorizeRoles([Roles::ADMIN, Roles::USER]);

    $data = Flight::request()->data->getData();
    $id_column = Flight::request()->query['id_column'] ?? "id";
    
    Flight::json([
        'message' => "Listing edited successfully",
        'data' => Flight::listingService()->update_listing($data, $id, $id_column)
    ]);
});

/**
 *  @OA\Delete(
 *      path="/listing/{id}",
 *      tags={"listing"},
 *      summary="Delete the listing by ID",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Listing ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Listing deleted successfully."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('DELETE /listing/@id', function($id){
    Flight::auth_middleware()->authorizeRoles([Roles::ADMIN, Roles::USER]);

    Flight::listingService()->delete_listing($id);
    Flight::json(['message' => "Listing deleted successfully"]);
});

?>