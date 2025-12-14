<?php
require_once 'BaseService.php';
require_once __DIR__ . "/../dao/InterestDao.php";

class InterestService extends BaseService{
    public function __construct(){
        parent::__construct(new InterestDao);
    }

    
    public function get_by_status($status){
        return $this->dao->get_by_status($status);
    }

    public function get_by_status_and_interested_id($status, $user_id){
        return $this->dao->get_by_status_and_interested_id($status, $user_id);
    }

    public function get_by_status_and_owner_id($status, $user_id){
        return $this->dao->get_by_status_and_owner_id($status, $user_id);
    }

    public function get_by_status_and_owner_id_first_N($status, $user_id, $number){
        return $this->dao->get_by_status_and_owner_id_first_N($status, $user_id, $number);
    }

    public function get_by_status_interested_id_and_property_id($status, $user_id, $property_id){
        return $this->dao->get_by_status_interested_id_and_property_id($status, $user_id, $property_id);
    }

    public function get_all_interests(){
        return $this->dao->get_all_interests();
    }

    public function add_interest($entity){
        $previous = $this->get_by_status_interested_id_and_property_id("Active", $entity['user_id'], $entity['property_id']);

        if(!empty($previous))
            return ['success' => false, 'error' => 'There is already an Active interest in this property from you.'];
        return ['success' => true, 'data' => $this->dao->add_interest($entity)];
    }

    public function update_interest($entity, $id, $id_column = "id"){
        return $this->dao->update_interest($entity, $id, $id_column);
    }

    public function delete_interest($id){
        return $this->dao->delete_interest($id);
    }
}
?>