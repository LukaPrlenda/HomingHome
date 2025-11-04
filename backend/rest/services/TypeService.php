<?php
require_once 'BaseService.php';
require_once __DIR__ . "/../dao/TypeDao.php";

class TypeService extends BaseService{
    public function __construct(){
        parent::__construct(new TypeDao);
    }

    public function get_by_type($type){
        return $this->dao->get_by_type($type);
    }


    public function get_all_types(){
        return $this->dao->get_all_types();
    }

    public function add_type($entity){
        return $this->dao->add_type($entity);
    }

    public function update_type($entity, $id, $id_column = "id"){
        return $this->dao->update_type($entity, $id, $id_column);
    }

    public function delete_type($id){
        return $this->dao->delete_type($id);
    }
}
?>