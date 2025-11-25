<?php
require_once __DIR__ . '/BaseDao.php';

class AuthDao extends BaseDao {
    protected $table_name;

    public function __construct(){
        $this->table_name = "users";
        parent::__construct($this->table_name);

    }



        public function get_by_username($username){
        return $this->query_unique('SELECT id, username, password FROM ' . $this->table_name . ' WHERE username = :username', ['username' => $username]);
    }
}

?>