<?php
require_once __DIR__ . '/BaseDao.php';

class Admin_messagesDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = "admin_messages";
        parent::__construct($this->table_name);
    }

    public function get_all_admin_messages(){
        return $this->get_all();
    }

    public function get_by_user_id($user_id){
        return $this->query('SELECT *  FROM ' . $this->table_name . ' WHERE user_id = :user_id', ['user_id' => $user_id]);
    }

    public function get_by_property_id($property_id){
        return $this->query('SELECT *  FROM ' . $this->table_name . ' WHERE property_id = :property_id', ['property_id' => $property_id]);
    }


    public function add_to_admin($entity){
        return $this->add($entity);
    }

    public function update_admin($entity, $id, $id_column = "id"){
        return $this->update($entity, $id, $id_column);
    }

    public function delete_admin($id){
        return $this->delete($id);
    }
}
?>