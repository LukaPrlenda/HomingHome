<?php

Flight::route('GET /admin_messages/user/@id', function($id){
    Flight::json(Flight::admin_messagesService()->get_by_user_id($id));
});

Flight::route('GET /admin_messages/property/@id', function($id){
    Flight::json(Flight::admin_messagesService()->get_by_property_id($id));
});

Flight::route('GET /admin_messages', function(){
    Flight::json(Flight::admin_messagesService()->get_all_admin_messages());
});

Flight::route('POST /admin_messages', function(){
    $request = Flight::request()->data->getData();

    Flight::json([
        'message' => "Admin message added successfully",
        'data' => Flight::admin_messagesService()->add_to_admin($request)
    ]);
});

Flight::route('PUT /admin_messages/@id', function($id){
    $data = Flight::request()->data->getData();
    $id_column = Flight::request()->query['id_column'] ?? "id";
    
    Flight::json([
        'message' => "Admin message edited successfully",
        'data' => Flight::admin_messagesService()->update_admin($data, $id, $id_column)
    ]);
});

Flight::route('DELETE /admin_messages/@id', function($id){
    Flight::admin_messagesService()->delete($id);
    Flight::json(['message' => "Admin message deleted successfully"]);
});

?>