<?php

Flight::route('GET /listing/address/@status', function($status){
    Flight::json(Flight::listingService()->get_address_by_status($status));
});

Flight::route('GET /listing/@status', function($status){
    Flight::json(Flight::listingService()->get_by_status($status));
});

Flight::route('GET /listing/first/@status', function($status){
    Flight::json(Flight::listingService()->get_first_by_status($status));
});

Flight::route('GET /listing/first/@status/@type', function($status, $type){
    Flight::json(Flight::listingService()->get_first_by_type_and_status($type, $status));
});

Flight::route('GET /listing/@status/@type', function($status, $type){
    Flight::json(Flight::listingService()->get_by_type_and_status($type, $status));
});

Flight::route('GET /listing/first_N/@status/@number', function($status, $number){
    Flight::json(Flight::listingService()->get_first_N_of_status($status, $number));
});

Flight::route('GET /listing', function(){
    Flight::json(Flight::listingService()->get_all_listings());
});

Flight::route('POST /listing', function(){
    $request = Flight::request()->data->getData();

    Flight::json([
        'message' => "Listing added successfully",
        'data' => Flight::listingService()->add_listing($request)
    ]);
});

Flight::route('PUT /listing/@id', function($id){
    $data = Flight::request()->data->getData();
    $id_column = Flight::request()->query['id_column'] ?? "id";
    
    Flight::json([
        'message' => "Listing edited successfully",
        'data' => Flight::listingService()->update_listing($data, $id, $id_column)
    ]);
});

Flight::route('DELETE /listing/@id', function($id){
    Flight::listingService()->delete_listing($id);
    Flight::json(['message' => "Listing deleted successfully"]);
});

?>