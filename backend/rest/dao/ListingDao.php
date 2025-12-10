<?php
require_once __DIR__ . '/BaseDao.php';

class ListingDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = "listings";
        parent::__construct($this->table_name);
    }



    public function get_address_by_status($status){
        return $this->query('SELECT p.location, l.id AS listing_id, l.property_id FROM ' . $this->table_name . ' l JOIN properties p ON l.property_id = p.id WHERE l.status = :status', ['status' => $status]);
    }

    public function get_by_status($status){
        return $this->query('SELECT p.*, l.status, l.id AS listing_id, t.type FROM ' . $this->table_name . ' l JOIN properties p ON l.property_id = p.id JOIN types t ON t.id = p.type_id WHERE l.status = :status', ['status' => $status]);
    }

    public function get_by_status_and_owner_id($status, $user_id){
        return $this->query('SELECT p.*, l.status, l.id AS listing_id, t.type FROM ' . $this->table_name . ' l JOIN properties p ON l.property_id = p.id JOIN types t ON t.id = p.type_id WHERE l.status = :status AND p.user_id = :user_id', ['status' => $status, 'user_id' => $user_id]);
    }

    public function get_first_by_status($status){
        return $this->query_unique('SELECT p.*, l.status, l.id AS listing_id, t.type FROM ' . $this->table_name . ' l JOIN properties p ON l.property_id = p.id JOIN types t ON t.id = p.type_id WHERE l.status = :status', ['status' => $status]);
    }

    public function get_first_by_type_and_status($type, $status){
        return $this->query_unique('SELECT p.*, l.status, l.id AS listing_id, t.type FROM ' . $this->table_name . ' l JOIN properties p ON l.property_id = p.id JOIN types t ON t.id = p.type_id  WHERE l.status = :status AND t.type = :type', ['status' => $status, 'type' => $type]);
    }

    public function get_by_type_and_status($type, $status){
        return $this->query('SELECT p.*, l.status, l.id AS listing_id, t.type FROM ' . $this->table_name . ' l JOIN properties p ON l.property_id = p.id JOIN types t ON t.id = p.type_id  WHERE l.status = :status AND t.type = :type', ['status' => $status, 'type' => $type]);
    }

    public function get_by_id_and_status($id, $status){
        return $this->query_unique('SELECT p.*, l.status, l.id AS listing_id, t.type FROM ' . $this->table_name . ' l JOIN properties p ON l.property_id = p.id JOIN types t ON t.id = p.type_id  WHERE l.status = :status AND l.property_id = :id', ['status' => $status, 'id' => $id]);
    }

    public function get_first_N_of_status($status, $number){
        return $this->query('SELECT p.*, l.status, l.id AS listing_id, t.type FROM ' . $this->table_name . ' l JOIN properties p ON l.property_id = p.id JOIN types t ON t.id = p.type_id  WHERE l.status = :status LIMIT ' . $number, ['status' => $status]);
    }


    public function get_all_listings(){
        return $this->get_all();
    }
    public function add_listing($entity){
        return $this->add($entity);
    }

    public function update_listing($entity, $id, $id_column = "id"){
        return $this->update($entity, $id, $id_column);
    }

    public function delete_listing($id){
        return $this->delete($id);
    }
}
?>