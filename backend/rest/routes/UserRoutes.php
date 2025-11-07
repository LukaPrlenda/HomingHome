<?php

Flight::route('GET /user/role/@is_admin', function($is_admin){
    Flight::json(Flight::userService()->get_by_role($is_admin));
});

Flight::route('GET /user/usersnames/@is_admin', function($is_admin){
    Flight::json(Flight::userService()->get_all_usersnames($is_admin));
});

Flight::route('GET /user/@id', function($id){
    Flight::json(Flight::userService()->get_by_id($id));
});

Flight::route('GET /user/basic_data/@id', function($id){
    Flight::json(Flight::userService()->get_basic_data_by_id($id));
});

Flight::route('GET /user/username/@username', function($username){
    Flight::json(Flight::userService()->get_by_username($username));
});

Flight::route('GET /user', function(){
    Flight::json(Flight::userService()->get_all_users());
});

Flight::route('POST /user', function(){
    $request = Flight::request()->data->getData();

    Flight::json([
        'message' => "User added successfully",
        'data' => Flight::userService()->add_user($request)
    ]);
});

Flight::route('PUT /user/@id', function($id){
    $data = Flight::request()->data->getData();
    $id_column = Flight::request()->query['id_column'] ?? "id";
    
    Flight::json([
        'message' => "User edited successfully",
        'data' => Flight::userService()->update_user($data, $id, $id_column)
    ]);
});

Flight::route('DELETE /user/@id', function($id){
    Flight::userService()->delete_user($id);
    Flight::json(['message' => "User deleted successfully"]);
});

?>