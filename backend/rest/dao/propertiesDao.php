<?php
require_once __DIR__ . '/BaseDao.php';

class PropertiesDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = "properties";
        parent::__construct($this->table_name);
    }


    public function get_all_properties(){
        return $this->get_all();
    }

    public function get_all_area(){
        return $this->query('SELECT id, area  FROM ' . $this->table_name, []);
    }

    public function get_sum_area(){
        return $this->query('SELECT SUM(area) AS total_area  FROM ' . $this->table_name, []);
    }
    
        

    public function add_property($entity){
        return $this->add($entity);
    }

    public function update_property($entity, $id, $id_column = "id"){
        return $this->update($entity, $id, $id_column);
    }

    public function delete_property($id){
        return $this->delete($id);
    }
}
?>