<?php
include_once __DIR__ . '/BaseDao.php';

class UserDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = "users";
        parent::__construct($this->table_name);

    }

 

    public function get_by_role($role){
        return $this->query('SELECT * FROM ' . $this->table_name . ' WHERE role = :role', ['role' => $role]);
    }

    public function get_all_usersnames($role){
        return $this->query('SELECT id, name, surname FROM ' . $this->table_name . ' WHERE role = :role', ['role' => $role]);
    }

    public function get_by_id($id){
        return $this->query_unique('SELECT * FROM ' . $this->table_name . ' WHERE id = :id', ['id' => $id]);
    }

    public function get_basic_data_by_id($id){
        return $this->query_unique('SELECT id, name, surname, phone_number, email, current_address, username FROM ' . $this->table_name . ' WHERE id = :id', ['id' => $id]);
    }

    public function get_by_username($username){
        return $this->query_unique('SELECT id, username, password FROM ' . $this->table_name . ' WHERE username = :username', ['username' => $username]);
    }


    public function get_all_users(){
        return $this->get_all();
    }

    public function add_user($entity){
        return $this->add($entity);
    }

    public function update_user($entity, $id, $id_column = "id"){
        return $this->update($entity, $id, $id_column);
    }

    public function delete_user($id){
        return $this->delete($id);
    }
}
?>