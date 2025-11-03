<?php
require_once 'BaseService.php';
require_once __DIR__ . "/../dao/Admin_messagesDao.php";

class Admin_messagesService extends BaseService{
    public function __construct(){
        parent::__construct(new Admin_messagesDao);
    }

    public function get_by_user_id($user_id){
        if(!is_numeric($user_id) || $user_id < 0)
            throw new Exception ("Id must be a positive number");
        
        return $this->dao->get_by_user_id($user_id);
    }

    public function get_by_property_id($property_id){
        if(!is_number($property_id) || $property_id < 0)
            throw new Exception ("Id must be a positive number");

        return $this->dao->get_by_property_id($property_id);
    }


    public function get_all_admin_messages(){
        return $this->dao->get_all_admin_messages();
    }

    public function add_to_admin($entity){
        return $this->data->add_to_admin($entity);
    }

    public function update_admin($entity, $id, $id_column = "id"){
        return $this->dao->update_admin($entity, $id, $id_column);
    }

    public function delete_admin($id){
        return $this->dao->delete_admin($id);
    }
}
?>