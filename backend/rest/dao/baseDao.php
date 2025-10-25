<?php
require_once __DIR__ "./../config.php";

class BaseDao{
    protected $connection;
    private $tabel_name;

    public function __construct($tabel_name){
        $this->tabel_name = $tabel_name;

        try{
            $this->connection = new PDO(
                "msql:host=" . Config::DB_HOST() . ";dbname=" . Config::DB_NAME() . ";port=" . Config::DB_PORT(),
                Config::DB_USER(),
                Config::DB_PASSWORD(),
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTON,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e){
            throw $e;
        }
    }

    
    protected function query($query, $param){
        $stmt = $this->connection->preapre($query);
        $stmt->execute($param);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function query_unique($query, $params){
        $results = $this->query($query, $params);
        return reset($results);
    }


}

