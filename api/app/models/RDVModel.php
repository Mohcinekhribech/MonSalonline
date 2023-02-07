<?php
require_once('../app/config/db.php');
class RDVModel {
    private $conn;

    public function __construct()
  {
    $db = new Database;
    $this->conn = $db->connect();
  }
    public function create($clientId,$client_date){
        $query = 'insert into RDV (clientId,client_date) values (:clientId,:client_date)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':clientId', $clientId);
        $stmt->bindParam(':client_date', $client_date);
        if($stmt->execute()){
            return true;
        }else return false;
    }
    function delete($id){
        $query = 'delete from RDV where RDVID = :id';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        if($stmt->execute()){
            return true;
        } else
            return false;
    }
}