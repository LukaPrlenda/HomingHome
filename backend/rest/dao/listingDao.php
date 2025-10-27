<?php
require_once __DIR__ . '/baseDao.php';

class ListingDao extends BaseDao{
    protected $table_name;

    public function __construct(){
        $this->table_name = "listings";
        parent::__construct($this->table_name);
    }


    public function get_all(){
        return $this->query('SELECT * FROM ' . $this->table_name, []);
    }

    public function get_address_by_status($status){
        return $this->query('SELECT p.location, l.id AS listing_id, l.property_id FROM ' . $this->table_name . ' l JOIN properties p ON l.property_id = p.id WHERE l.status = :status', ['status' => $status])
    }

    public function get_by_status($status){
        return $this->query('SELECT p.*, l.status, l.id AS listing_id, t.type FROM ' . $this->table_name . ' l JOIN properties p ON l.property_id = p.id WHERE l.status = :status', ['status' => $status])
    }

    public function get_first_by_status($status){
        return $this->query_unique('SELECT p.*, l.status, l.id AS listing_id, t.type FROM ' . $this->table_name . ' l JOIN properties p ON l.property_id = p.id WHERE l.status = :status', ['status' => $status])
    }

    public function get_first_by_type($type){
        return $this->query('SELECT p.*, l.status, l.id AS listing_id, t.type FROM ' . $this->table_name . ' l JOIN properties p ON l.property_id = p.id JOIN types t ON t.id = p.type_id  WHERE t.type = :type', ['type' => $type])
    }

    public function get_by_type_and_status($type, $status){
        return $this->query('SELECT p.*, l.status, l.id AS listing_id, t.type FROM ' . $this->table_name . ' l JOIN properties p ON l.property_id = p.id JOIN types t ON t.id = p.type_id  WHERE l.status = :Active AND t.type = :type', ['status' => $status, 'type' => $type])
    }


    /*
    public function get_status(){
       return $this->query('SELECT p.*, l.status, l.id AS listing_id FROM listings l JOIN properties p ON l.property_id = p.id WHERE l.status = "Active"', []);
    }
    */

}
?>