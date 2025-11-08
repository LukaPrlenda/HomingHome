<?php

Flight::route('GET /properties/area', function(){
    Flight::json(Flight::propertiesService()->get_all_area());
});

Flight::route('GET /properties/sum/area', function(){
    Flight::json(Flight::propertiesService()->get_sum_area());
});

Flight::route('GET /properties', function(){
    Flight::json(Flight::propertiesService()->get_all_properties());
});

Flight::route('POST /properties', function(){
    $request = Flight::request()->data->getData();

    Flight::json([
        'message' => "Propertie added successfully",
        'data' => Flight::propertiesService()->add_property($request)
    ]);
});

Flight::route('PUT /properties/@id', function($id){
    $data = Flight::request()->data->getData();
    $id_column = Flight::request()->query['id_column'] ?? "id";
    
    Flight::json([
        'message' => "Propertie edited successfully",
        'data' => Flight::propertiesService()->update_property($data, $id, $id_column)
    ]);
});

Flight::route('DELETE /properties/@id', function($id){
    Flight::interestService()->delete_property($id);
    Flight::json(['message' => "Propertie deleted successfully"]);
});

?>