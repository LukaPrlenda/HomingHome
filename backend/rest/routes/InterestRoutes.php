<?php

Flight::route('GET /interest/@status', function($status){
    Flight::json(Flight::interestService()->get_by_status($status));
});

Flight::route('GET /interest/interested/@status/@id', function($status, $id){
    Flight::json(Flight::interestService()->get_by_status_and_interested_id($status, $id));
});

Flight::route('GET /interest/owner/@status/@id', function($status, $id){
    Flight::json(Flight::interestService()->get_by_status_and_owner_id($status, $id));
});

Flight::route('GET /interest', function(){
    Flight::json(Flight::interestService()->get_all_interests());
});

Flight::route('POST /interest', function(){
    $request = Flight::request()->data->getData();

    Flight::json([
        'message' => "Interest added successfully",
        'data' => Flight::interestService()->add_interest($request)
    ]);
});

Flight::route('PUT /interest/@id', function($id){
    $data = Flight::request()->data->getData();
    $id_column = Flight::request()->query['id_column'] ?? "id";
    
    Flight::json([
        'message' => "Interest edited successfully",
        'data' => Flight::interestService()->update_interest($data, $id, $id_column)
    ]);
});

Flight::route('DELETE /interest/@id', function($id){
    Flight::interestService()->delete_interest($id);
    Flight::json(['message' => "Interest deleted successfully"]);
});

?>