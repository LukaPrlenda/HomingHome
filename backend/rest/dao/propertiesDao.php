<?php
require_once __DIR__ . '/baseDao.php';

class PropertiesDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = "properties";
        parent::__construct($this->table_name);
    }

    public function get_all_area(){
        return $this->query('SELECT id, area  FROM ' . $this->table_name, []);
    }

    public function get_sum_area(){
        return $this->query('SELECT SUM(area) AS total_area  FROM ' . $this->table_name, []);
    }
}
?>