<?php
require_once 'BaseService.php';
require_once __DIR__ . "/../dao/ListingDao.php";

class PropertiesService extends BaseService{
    public function __construct(){
        parebt::__construct(new PropertiesDao);
    }

    public function get_all_area(){
        return $this->dao->get_all_area();
    }

    public function get_sum_area(){
        return $this->dao->get_sum_area();
    }

    
    public function get_all_properties(){
        return $this->dao->get_all_properties();
    }

    public function add_property($entity){
        return $this->dao->add_property($entity);
    }

    public function update_property($entity, $id, $id_column = "id"){
        return $this->dao->update_property($entity, $id, $id_column);
    }

    public function delete_property($id){
        return $this->dao->delete_property($id);
    }
}
?>