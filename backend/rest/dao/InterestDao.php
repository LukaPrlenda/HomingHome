<?php
require_once __DIR__ . '/BaseDao.php';

class InterestDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = "interests";
        parent::__construct($this->table_name);
    }


    
    public function get_by_status($status){
        return $this->query('SELECT p.*, i.id AS interest_id, i.user_id AS interested_user_id, i.status, i.message, u.name AS intrested_name, u.surname AS intrested_surname, u.phone_number AS intrested_phone, u.email AS intrested_gmail FROM interests i JOIN properties p ON i.property_id = p.id JOIN users u ON i.user_id = u.id WHERE i.status = :status', ['status'=> $status]);
    }

    public function get_by_status_and_interested_id($status, $user_id){
        return $this->query('SELECT p.location FROM ' . $this->table_name . ' i JOIN properties p ON i.property_id = p.id WHERE i.user_id = :user_id AND i.status = :status', ['status' => $status, 'user_id' => $user_id]);
    }

    public function get_by_status_and_owner_id($status, $user_id){
        return $this->query('SELECT p.*, i.id AS interest_id, i.user_id AS intrested_user_id, i.status, i.message, u.name AS intrested_name, u.surname AS intrested_surname, u.phone_number AS intrested_phone, u.email AS intrested_gmail FROM ' . $this->table_name . ' i JOIN properties p ON i.property_id = p.id JOIN users u ON i.user_id = u.id WHERE p.user_id = :user_id AND i.status = :status', ['status' => $status, 'user_id' => $user_id]);
    }


    public function get_all_interests(){
        return $this->get_all();
    }

    public function add_interest($entity){
        return $this->add($entity);
    }

    public function update_interest($entity, $id, $id_column = "id"){
        return $this->update($entity, $id, $id_column);
    }

    public function delete_interest($id){
        return $this->delete($id);
    }
}
?>