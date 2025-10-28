<?php
include_once __DIR__ . '/baseDao.php';

class UserDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = "users";
        parent::__construct($this->table_name);

    }

 
    public function get_all_users(){
        return $this->get_all();
    }

    public function get_by_role($is_admin){
        return $this->query('SELECT * FROM ' . $this->table_name . ' WHERE is_admin = :is_admin', ['is_admin' => $is_admin]);
    }


    public function get_all_usersnames($is_admin){
        return $this->query('SELECT id, name, surname FROM ' . $this->table_name . ' WHERE is_admin = :is_admin', ['is_admin' => $is_admin]);
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
}
?>