<?php

/**
 *  @OA\Get(
 *      path="/interest/{status}",
 *      tags={"interest"},
 *      summary="Fetch interests by status.",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\Parameter(
 *          name="status",
 *          in="path",
 *          required=true,
 *          description="Status of interest",
 *          @OA\Schema(
 *              type="string",
 *              enum={"Active","No more interested","Found property","Removed","Something else","Inappropriate","Not compliant with rules"},
 *              example="Active"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Fetch interests by status."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /interest/@status', function($status){
    Flight::auth_middleware()->authorizeRoles([Roles::ADMIN, Roles::USER]);

    Flight::json(Flight::interestService()->get_by_status($status));
});

/**
 *  @OA\Get(
 *      path="/interest/interested/{status}/{id}",
 *      tags={"interest"},
 *      summary="Fetch interests by status and interested user ID.",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\Parameter(
 *          name="status",
 *          in="path",
 *          required=true,
 *          description="Status of interest",
 *          @OA\Schema(
 *              type="string",
 *              enum={"Active","No more interested","Found property","Removed","Something else","Inappropriate","Not compliant with rules"},
 *              example="Active"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Interested user ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Fetch interests by status and interested user ID."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /interest/interested/@status/@id', function($status, $id){
    Flight::auth_middleware()->authorizeRoles([Roles::ADMIN, Roles::USER]);

    Flight::json(Flight::interestService()->get_by_status_and_interested_id($status, $id));
});

/**
 *  @OA\Get(
 *      path="/interest/owner/{status}/{id}",
 *      tags={"interest"},
 *      summary="Fetch interests by status and owner ID.",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\Parameter(
 *          name="status",
 *          in="path",
 *          required=true,
 *          description="Status of interest",
 *          @OA\Schema(
 *              type="string",
 *              enum={"Active","No more interested","Found property","Removed","Something else","Inappropriate","Not compliant with rules"},
 *              example="Active"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Owner ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Fetch interests by status and owner ID."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /interest/owner/@status/@id', function($status, $id){
    Flight::auth_middleware()->authorizeRoles([Roles::ADMIN, Roles::USER]);
    Flight::auth_middleware()->authorizeUserID($id);

    Flight::json(Flight::interestService()->get_by_status_and_owner_id($status, $id));
});

/**
 *  @OA\Get(
 *      path="/interest/owner/first_N/{status}/{id}/{number}",
 *      tags={"interest"},
 *      summary="Fetch interests by status and owner ID.",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\Parameter(
 *          name="status",
 *          in="path",
 *          required=true,
 *          description="Status of interest",
 *          @OA\Schema(
 *              type="string",
 *              enum={"Active","No more interested","Found property","Removed","Something else","Inappropriate","Not compliant with rules"},
 *              example="Active"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Owner ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Parameter(
 *          name="number",
 *          in="path",
 *          required=true,
 *          description="Number of first interests to fetch",
 *          @OA\Schema(
 *              type="integer", example=10
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Fetch interests by status and owner ID."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /interest/owner/first_N/@status/@id/@number', function($status, $id, $number){
    Flight::auth_middleware()->authorizeRoles([Roles::ADMIN, Roles::USER]);
    Flight::auth_middleware()->authorizeUserID($id);

    Flight::json(Flight::interestService()->get_by_status_and_owner_id_first_N($status, $id, $number));
});

/**
 *  @OA\Get(
 *      path="/interest",
 *      tags={"interest"},
 *      summary="Fetch all interests.",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\Response(
 *          response=200,
 *          description="Fetch all interests."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('GET /interest', function(){
    Flight::auth_middleware()->authorizeRoles([Roles::ADMIN, Roles::USER]);

    Flight::json(Flight::interestService()->get_all_interests());
});

/**
 *  @OA\Post(
 *      path="/interest",
 *      tags={"interest"},
 *      summary="Add a new interest",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(
 *              required={"property_id", "user_id", "status", "message"},
 *              @OA\Property(
 *                  property="property_id",
 *                  type="integer",
 *                  example=1,
 *                  description="ID of property."
 *              ),
 *              @OA\Property(
 *                  property="user_id",
 *                  type="integer",
 *                  example=1,
 *                  description="ID of interested user."
 *              ),
 *              @OA\Property(
 *                  property="status",
 *                  type="string",
 *                  enum={"Active","No more interested","Found property","Removed","Something else","Inappropriate","Not compliant with rules"},
 *                  example="Active",
 *                  description="Status of interest."
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="This is a message",
 *                  description="Message content"
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Interest added successfully."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('POST /interest', function(){
    Flight::auth_middleware()->authorizeRoles([Roles::ADMIN, Roles::USER]);

    $request = Flight::request()->data->getData();
    $response = Flight::interestService()->add_interest($request);

    if ($response['success']) {
        Flight::json([
            'message' => 'Interest added successfully',
            'data' => $response['data']
        ]);
    }
    else {
        Flight::halt(500, $response['error']);
    }
});

/**
 *  @OA\Patch(
 *      path="/interest/{id}",
 *      tags={"interest"},
 *      summary="Update an existing interest",
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
 *                  property="user_id",
 *                  type="integer",
 *                  example=1,
 *                  description="ID of interested user."
 *              ),
 *              @OA\Property(
 *                  property="status",
 *                  type="string",
 *                  enum={"Active","No more interested","Found property","Removed","Something else","Inappropriate","Not compliant with rules"},
 *                  example="Active",
 *                  description="Status of interest."
 *              ),
 *              @OA\Property(
 *                  property="message",
 *                  type="string",
 *                  example="This is a message",
 *                  description="Message content"
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Interest edited successfully."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('PATCH /interest/@id', function($id){
    Flight::auth_middleware()->authorizeRoles([Roles::ADMIN, Roles::USER]);

    $data = Flight::request()->data->getData();
    $id_column = Flight::request()->query['id_column'] ?? "id";
    
    Flight::json([
        'message' => "Interest edited successfully",
        'data' => Flight::interestService()->update_interest($data, $id, $id_column)
    ]);
});

/**
 *  @OA\Delete(
 *      path="/interest/{id}",
 *      tags={"interest"},
 *      summary="Delete the interest by ID",
 *      security={
 *          {"ApiKey": {}}
 *      },
 *      @OA\Parameter(
 *          name="id",
 *          in="path",
 *          required=true,
 *          description="Interest ID",
 *          @OA\Schema(type="integer", example=1)
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Interest deleted successfully."
 *      ),
 *      @OA\Response(
 *          response=500,
 *          description="Internal error."
 *      )
 *  )
 */
Flight::route('DELETE /interest/@id', function($id){
    Flight::auth_middleware()->authorizeRoles([Roles::ADMIN, Roles::USER]);

    Flight::interestService()->delete_interest($id);
    Flight::json(['message' => "Interest deleted successfully"]);
});

?>