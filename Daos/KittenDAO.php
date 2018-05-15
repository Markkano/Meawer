<?php namespace Daos;

use Daos\Connection as Connection;
use Daos\ImageDAO as ImageDAO;
use Models\Kitten;

abstract class KittenDAO implements IDAO {

  private static $table = 'Kittens';

  public static function SelectByID($id) {
    try {
      $stmt = Connection::Prepare("SELECT * FROM ".self::$table." WHERE id_kitten = ?  LIMIT 1");
      if ($stmt->execute(array($id))) {
        if ($result = $stmt->fetch()) {
          $kitten = new Kitten(
            $result['username'],
            $result['email'],
            $result['password'],
            $result['name'],
            $result['surname'],
            $result['born_date'],
            $result['register_date'],
            $result['image'],
            $result['background_image']
          );
          $kitten->setIdKitten($result['id_kitten']);
          return $kitten;
        }
      }
    } catch (\PDOException $e) {
      throw $e;
    }
  }

  public static function SelectByEmail($email) {
    try {
      $stmt = Connection::Prepare("SELECT * FROM ".self::$table." WHERE email = ?  LIMIT 1");
      if ($stmt->execute(array($email))) {
        if ($result = $stmt->fetch()) {
          $kitten = new Kitten(
            $result['username'],
            $result['email'],
            $result['password'],
            $result['name'],
            $result['surname'],
            $result['born_date'],
            $result['register_date'],
            $result['image'],
            $result['background_image']
          );
          $kitten->setIdKitten($result['id_kitten']);
          return $kitten;
        }
      }
    } catch (\PDOException $e) {
      throw $e;
    }
  }

  public static function SelectByUsername($username) {
    try {
      $stmt = Connection::Prepare("SELECT * FROM ".self::$table." WHERE username = ?  LIMIT 1");
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
            $result['image'],
            $result['background_image']
          );
          $kitten->setIdKitten($result['id_kitten']);
          return $kitten;
        }
      }
    } catch (\PDOException $e) {
      throw $e;
    }
  }

  public static function SelectAll() {
    try {
      $list = array();
      $stmt = Connection::Prepare("SELECT * FROM ".self::$table."");
      if ($stmt->execute()) {
        while ($result = $stmt->fetch()) {
          $kitten = new Kitten(
            $result['username'],
            $result['email'],
            $result['password'],
            $result['name'],
            $result['surname'],
            $result['born_date'],
            $result['register_date'],
            $result['image'],
            $result['background_image']
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

  public static function Insert($object) {
    throw new \Exception("Not supported by our application yet.", 1);
  }

  public static function Delete($object) {
    throw new \Exception("Not supported by our application yet.", 1);
  }

  public static function Update($object) {
    throw new \Exception("Not supported by our application yet.", 1);
  }
} ?>
