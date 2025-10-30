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


    public function get_all_types(){
        return $this->get_all();
    }

    public function add_type($entity){
        return $this->add($entity);
    }

    public function update_type($entity, $id, $id_column = "id"){
        return $this->update($entity, $id, $id_column);
    }

    public function delete_type($id){
        return $this->delete($id);
    }
}
?>