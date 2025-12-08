<?php
require_once 'BaseService.php';
require_once __DIR__ . "/../dao/ListingDao.php";

class ListingService extends BaseService{
    public function __construct(){
        parent::__construct(new ListingDao);
    }

    
    public function get_address_by_status($status){
        return $this->dao->get_address_by_status($status);
    }

    public function get_by_status($status){
        return $this->dao->get_by_status($status);
    }

    public function get_by_status_and_owner_id($status, $user_id){
        return $this->dao->get_by_status_and_owner_id($status, $user_id);
    }
    
    public function get_first_by_status($status){
        return $this->dao->get_first_by_status($status);
    }

    public function get_first_by_type_and_status($type, $status){
        return $this->dao->get_first_by_type_and_status($type, $status);
    }

    public function get_by_type_and_status($type, $status){
        return $this->dao->get_by_type_and_status($type, $status);
    }

    public function get_by_id_and_status($id, $status){
        return $this->dao->get_by_id_and_status($id, $status);
    }

    public function get_first_N_of_status($status, $number){
        if(!is_numeric($number) || $number < 0)
            throw new Exception ("The number of listings must be a positive number.");

        return $this->dao->get_first_N_of_status($status, $number);
    }

    public function get_all_listings(){
        return $this->dao->get_all_listings();
    }

    public function add_listing($entity){
        return $this->dao->add_listing($entity);
    }

    public function update_listing($entity, $id, $id_column = "id"){
        return $this->dao->update_listing($entity, $id, $id_column);
    }

    public function delete_listing($id){
        return $this->dao->delete_listing($id);
    }
}
?>