<?php namespace Daos;

class ImageDAO extends SingletonDAO implements IDAO {

  private $pdo;

  public function __construct() {
    $this->pdo = Connection::getInstance();
  }

  public function SelectByID($id) {
    try {
      $stmt = $this->pdo->Prepare("SELECT * FROM Images WHERE id_image = ?  LIMIT 1");
      if ($stmt->execute(array($id))) {
        if ($result = $stmt->fetch()) {
          return $result['path'];
        }
      }
    } catch (\PDOException $e) {
      throw $e;
    }
  }

  public function Insert($object){}
  public function Delete($object){}
  public function SelectAll(){}
  public function Update($object){}
} ?>
