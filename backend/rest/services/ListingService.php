<?php
require_once 'BaseService.php';
require_once __DIR__ . "/../dao/ListingDao.php";

class ListingService extends BaseService{
    public function __construct(){
        parent::__construct(new ListingDao);
    }

    public function get_address_by_status($status){
        return $this->data->get_address_by_status($status);
    }

    public function get_by_status($status){
        return $this->data->get_by_status($status);
    }

    public function get_first_by_type_and_status($type, $status){
        return $this->data->get_first_by_type_and_status($type, $status);
    }

    public function get_by_type_and_status($type, $status){
        return $this->data->get_by_type_and_status($type, $status);
    }

    public function get_first_N_of_status($status, $number){
        if(!is_numeric($number) || $number < 0)
            throw new Exception ("Number or listings to get must be a positive number");

        return $this->data->get_first_N_of_status($status, $number);
    }

    public function get_all_listings(){
        return $this->data->get_all_listings();
    }

    public function add_listing($entity){
        return $this->data->add_listing($entity);
    }

    public function update_listing($entity, $id, $id_column = "id"){
        return $this->data->update_listing($entity, $id, $id_column);
    }

    public function delete_listing($id){
        return $this->data->delete_listing($id);
    }
}
?>