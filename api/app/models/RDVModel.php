<?php
require_once('../app/config/db.php');
class RDVModel {
    private $conn;

    public function __construct()
  {
    $db = new Database;
    $this->conn = $db->connect();
  }
    public function create($clientId,$client_date,$hour){
        $query = 'insert into RDV (clientId,client_date,hour) values (:clientId,:client_date,:hour)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':clientId', $clientId);
        $stmt->bindParam(':client_date', $client_date);
        $stmt->bindParam(':hour', $hour);
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
    function read($date,$hour){
    // Create query
    $query = 'select * from RDV where client_date = :date AND hour = :hour';
    // Prepare statement
    $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':hour', $hour);
    // Execute query
    if($stmt->execute()){
        return $stmt;
        } else
            return false;
    
  }
}