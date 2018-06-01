<?php namespace Daos;

use Daos\Connection as Connection;
use Daos\MeawDAO as MeawDAO;
use Daos\KittenDAO as KittenDAO;
use Models\Kitten;

abstract class PurrDAO {

  private static $table = 'Purrs_x_Meaw';

  public static function SelectAllFromMeaw($id_meaw) {
    try {
      $list = array();
      $stmt = Connection::Prepare("SELECT id_kitten FROM ".self::$table." WHERE id_meaw = ?");
      if ($stmt->execute(array($id_meaw))) {
        while ($result = $stmt->fetch()) {
          $kitten = KittenDAO::SelectByID($result['id_kitten']);
          array_push($list, $kitten);
        }
        return $list;
      }
    } catch (\PDOException $e) {
      throw $e;
    }
  }

  public static function Insert($id_meaw, $id_kitten) {
    try {
      $stmt = Connection::Prepare("INSERT INTO ".self::$table." (id_kitten, id_meaw) VALUES (?,?)");
      $stmt->execute(array(
        $id_kitten,
        $id_meaw
      ));
    } catch (\PDOException $e) {
      throw $e;
    }
  }

  public static function Delete($id_meaw, $id_kitten) {
    try {
      $stmt = Connection::Prepare("DELETE FROM ".self::$table." WHERE id_kitten = ? AND id_meaw = ?");
      $stmt->execute(array(
        $id_kitten,
        $id_meaw
      ));
    } catch (\PDOException $e) {
      throw $e;
    }
  }

  public static function SelectByID($id) {
    throw new \Exception("Not supported by our application yet.", 1);
  }

  public static function SelectAll() {
    throw new \Exception("Not supported by our application yet.", 1);
  }

  public static function Update($object) {
    throw new \Exception("Not supported by our application yet.", 1);
  }
} ?>
