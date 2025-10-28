<?php
require_once __DIR__ . "/../config.php";

class BaseDao{
    protected $connection;
    private $table_name;

    public function __construct($table_name){
        $this->table_name = $table_name;

        try{
            $this->connection = new PDO(
                "mysql:host=" . Config::DB_HOST() . ";dbname=" . Config::DB_NAME() . ";port=" . Config::DB_PORT(),
                Config::DB_USER(),
                Config::DB_PASSWORD(),
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e){
            throw $e;
        }
    }

    
    protected function query($query, $param){
        $stmt = $this->connection->prepare($query);
        $stmt->execute($param);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function query_unique($query, $params){
        $results = $this->query($query, $params);
        return reset($results);
    }

    protected function add($entity){
        $query = "INSERT INTO " . $this->table_name . " (";
        $queryValues = ") VALUES (";

        foreach($entity as $column => $_){
            $query .= $column . ", ";
            $queryValues .= ":" . $column . ", ";
        }

        $query = substr($query, 0, -2);
        $queryValues = substr($queryValues, 0, -2);

        $query .= $queryValues . ")";

        $stmt = $this->connection->prepare($query);
        $stmt->execute($entity);

        $entity["id"] = $this->connection->lastInsertId();
        return $entity;
    }

    protected function update($entity, $id, $id_column = "id"){
        $query = "UPDATE " . $this->table_name . " SET ";
        foreach($entity as $column => $_){
            $query .= $column . " = :" . $column . ", ";
        }

        $query = substr($query, 0, -2);

        $query .= " WHERE " . $id_column . " = :id";

        $stmt = $this->connection->prepare($query);
        $entity["id"] = $id;
        $stmt->execute($entity);

        return $entity;
    }

    protected function delete($id){
        $stmt = $this->connection->prepare("DELETE FROM " . $this->table_name . " WHERE id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }


    protected function get_all(){
        return $this->query('SELECT * FROM ' . $this->table_name, []);
    }
}

?>