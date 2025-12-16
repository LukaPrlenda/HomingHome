<?php
require_once __DIR__ . '/BaseDao.php';

class AuthDao extends BaseDao {
    protected $table_name;

    public function __construct(){
        $this->table_name = "users";
        parent::__construct($this->table_name);

    }



    public function get_by_username($username){
        return $this->query_unique('SELECT id, username, role, password FROM ' . $this->table_name . ' WHERE username = :username', ['username' => $username]);
    }

    public function get_by_email($email){
        return $this->query_unique('SELECT id, email FROM ' . $this->table_name . ' WHERE email = :email', ['email' => $email]);
    }
}

?>