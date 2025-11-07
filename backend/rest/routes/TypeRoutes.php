<?php

Flight::route('GET /type/@type', function($type){
    Flight::json(Flight::typeService()->get_by_type($type));
});

Flight::route('GET /type', function(){
    Flight::json(Flight::typeService()->get_all_types());
});

Flight::route('POST /type', function(){
    $request = Flight::request()->data->getData();

    Flight::json([
        'message' => "Type added successfully",
        'data' => Flight::typeService()->add_type($request)
    ]);
});

Flight::route('PUT /type/@id', function($id){
    $data = Flight::request()->data->getData();
    $id_column = Flight::request()->query['id_column'] ?? "id";
    
    Flight::json([
        'message' => "Type edited successfully",
        'data' => Flight::typeService()->update_type($data, $id, $id_column)
    ]);
});

Flight::route('DELETE /type/@id', function($id){
    Flight::typeService()->delete_type($id);
    Flight::json(['message' => "Type deleted successfully"]);
});

?>