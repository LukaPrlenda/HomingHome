<?php
include_once __DIR__ . '/BaseDao.php';

class TypeDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = "types";
        parent::__construct($this->table_name);

    }

 

    public function get_by_type($type){
        return $this->query('SELECT * FROM ' . $this->table_name . ' WHERE type = :type', ['type' => $type]);
    }
}
?>