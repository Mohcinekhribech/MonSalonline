<?php
require_once('../app/config/db.php');
class clientModel
{
  private $conn;
  public $clientId;
  public $Nom;
  public $Prenom;
  public $Num_tel;
  public $Referance;


  // Constructor with DB
  public function __construct()
  {
    $db = new Database;
    $this->conn = $db->connect();
  }
  // Get Posts
  public function read()
  {
    // Create query
    $query = 'SELECT *
    FROM RDV
    INNER JOIN client
    ON RDV.clientId = client.clientId';
    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();
    return $stmt;
  }
  
  public function read_single($id){
    if(isset($id)){
      $query = 'SELECT *
      FROM RDV
      INNER JOIN client
      ON RDV.clientId = client.clientId where client.clientId = :clientId';
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':clientId',$id);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $this->Nom = $row['Nom'];
      $this->Prenom = $row['Prenom'];
      $this->Num_tel = $row['Num_tel'];
      $this->Referance = $row['Referance'];
    }
  }
  public function verify($R){
    $query = 'SELECT * from client where Referance = :Referance';
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':Referance', $R);
    $stmt->execute();
    return $stmt;
  }
  // Create Post
  public function create()
  {
    // Create query
    $query = 'INSERT INTO client SET Nom = :Nom, Prenom = :Prenom, Num_tel = :Num_tel, Referance = :Referance';


    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Clean data
    $this->Nom = htmlspecialchars(strip_tags($this->Nom));
    $this->Prenom = htmlspecialchars(strip_tags($this->Prenom));
    $this->Num_tel = htmlspecialchars(strip_tags($this->Num_tel));
    $this->Referance = htmlspecialchars(strip_tags($this->Referance));

    // Bind data
    $stmt->bindParam(':Nom', $this->Nom);
    $stmt->bindParam(':Prenom',  $this->Prenom);
    $stmt->bindParam(':Num_tel', $this->Num_tel);
    $stmt->bindParam(':Referance', $this->Referance);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }else{
      return false;
    }
    
  }

  // Update Post
  public function update()
  {
    // Create query
    $query = 'UPDATE client SET Nom = :Nom, Prenom = :Prenom, Num_tel = :Num_tel, Referance = :Referance
                                WHERE clientId = :clientId';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->Nom = htmlspecialchars(strip_tags($this->Nom));
    $this->Prenom = htmlspecialchars(strip_tags($this->Prenom));
    $this->Num_tel = htmlspecialchars(strip_tags($this->Num_tel));
    $this->Referance = htmlspecialchars(strip_tags($this->Referance));
    $this->clientId = htmlspecialchars(strip_tags($this->clientId));

    // Bind data
    $stmt->bindParam(':Nom', $this->Nom);
    $stmt->bindParam(':Prenom', $this->Prenom);
    $stmt->bindParam(':Num_tel', $this->Num_tel);
    $stmt->bindParam(':Referance', $this->Referance);
    $stmt->bindParam(':clientId', $this->clientId);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }
    return false;
  }

  // Delete Post
  public function delete($id)
  {
    // Create query
    $query = 'DELETE FROM client WHERE clientId = :clientId';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->clientId = htmlspecialchars(strip_tags($id));

    // Bind data
    $stmt->bindParam(':clientId', $id);

    // Execute query
    if ($stmt->execute()) {
      return true;
    }
    return false;
  }
}
