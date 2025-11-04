<?php
require_once 'BaseService.php';
require_once __DIR__ . "/../dao/InterestDao.php";

class InterestService extends BaseService{
    public function __construct(){
        parent::__construct(new InterestDao);
    }

    public function get_by_status($status){
        return $this->data->get_by_status($status);
    }

    public function get_by_status_and_interested_id($status, $user_id){
        return $this->data->get_by_status_and_interested_id($status, $user_id);
    }

    public function get_by_status_and_owner_id($status, $user_id){
        return $this->data->get_by_status_and_owner_id($status, $user_id);
    }


    public function get_all_interests(){
        return $this->data->get_all_interests();
    }

    public function add_interest($entity){
        return $this->data->add_interest($entity);
    }

    public function update_interest($entity, $id, $id_column = "id"){
        return $this->data->update_interest($entity, $id, $id_column);
    }

    public function delete_interest($id){
        return $this->data->delete_interest($id);
    }
}
?>