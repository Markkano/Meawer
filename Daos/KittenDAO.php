<?php namespace Daos;

use Models\Kitten;

class KittenDAO extends SingletonDAO implements IDAO {

  private $pdo;
  private $imageDAO;

  private $table = 'Kittens';

  public function __construct() {
    $this->pdo = Connection::getInstance();
  }

  public function SelectByID($id) {
    try {
      $stmt = $this->pdo->Prepare("SELECT * FROM ".$this->table." WHERE id_kitten = ?  LIMIT 1");
      if ($stmt->execute(array($id))) {
        if ($result = $stmt->fetch()) {
          $kitten = new Kitten(
            $result['username'],
            $result['email'],
            $result['password'],
            $result['name'],
            $result['surname'],
            $result['bornDate'],
            $result['registerDate'],
            $this->imageDAO->SelectByID($result['image']),
            $this->imageDAO->SelectByID($result['backgroundImage'])
          );
          $kitten->setIdKitten($result['id_kitten']);
          return $kitten;
        }
      }
    } catch (\PDOException $e) {
      throw $e;
    }
  }

  public function SelectByUsername($username) {
    try {
      $stmt = $this->pdo->Prepare("SELECT * FROM ".$this->table." WHERE username = ?  LIMIT 1");
      if ($stmt->execute(array($username))) {
        if ($result = $stmt->fetch()) {
          $kitten = new Kitten(
            $result['username'],
            $result['email'],
            $result['password'],
            $result['name'],
            $result['surname'],
            $result['born_date'],
            $result['register_date'],
            $result['id_image'],
            $result['id_background_image']
          );
          $kitten->setIdKitten($result['id_kitten']);
          return $kitten;
        }
      }
    } catch (\PDOException $e) {
      throw $e;
    }
  }

  public function SelectAll() {
    try {
      $list = array();
      $stmt = $this->pdo->Prepare("SELECT * FROM ".$this->table."");
      if ($stmt->execute()) {
        while ($result = $stmt->fetch()) {
          $kitten = new Kitten(
            $result['username'],
            $result['email'],
            $result['password'],
            $result['name'],
            $result['surname'],
            $result['bornDate'],
            $result['registerDate'],
            $result['image'],
            $result['backgroundImage']
          );
          $kitten->setIdKitten($result['id_kitten']);
          array_push($list, $kitten);
        }
        return $list;
      }
    } catch (\PDOException $e) {
      throw $e;
    }
  }

  public function Insert($object) {}
  public function Delete($object) {}
  public function Update($object) {}
} ?>
